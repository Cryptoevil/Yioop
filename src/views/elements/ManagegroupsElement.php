<?php
/**
 * SeekQuarry/Yioop --
 * Open Source Pure PHP Search Engine, Crawler, and Indexer
 *
 * Copyright (C) 2009 - 2019  Chris Pollett chris@pollett.org
 *
 * LICENSE:
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * END LICENSE
 *
 * @author Mallika Perepa (Creator), Chris Pollett (rewrote)
 * @license https://www.gnu.org/licenses/ GPL3
 * @link https://www.seekquarry.com/
 * @copyright 2009 - 2019
 * @filesource
 */
namespace seekquarry\yioop\views\elements;

use seekquarry\yioop as B;
use seekquarry\yioop\configs as C;
use seekquarry\yioop\library as L;

/**
 * Used to draw the admin screen on which users can create groups, delete
 * groups and add and delete users and roles to a group
 *
 * @author Mallika Perepa (started) Chris Pollett (rewrite)
 */
class ManagegroupsElement extends Element
{
    /**
     * Renders the screen in which groups can be created, deleted, and added or
     * deleted
     *
     * @param array $data  contains antiCSRF token, as well as data on
     *     available groups or which user is in what group
     */
    public function render($data)
    {
        $admin_or_group = "admin";
        $toggle = "";
        if (!empty($data['HIDE_ACTIVITIES']) && !$_SERVER["MOBILE"]) {
             $admin_or_group = "group";
        }
        $admin_url = htmlentities(B\controllerUrl("admin", true));
        $token_string = C\CSRF_TOKEN . "=" . $data[C\CSRF_TOKEN];
        ?>
        <div class="current-activity" >
        <?php
        switch ($data['FORM_TYPE']) {
            case "changeowner":
                $this->renderChangeOwnerForm($data);
                break;
            case "inviteusers":
                $this->renderInviteUsersForm($data);
                break;
            case "search":
                $this->renderSearchForm($data);
                break;
            case "statistics":
                if (!C\GROUP_ANALYTICS_MODE || C\GROUP_ANALYTICS_MODE == "0") {
                    return;
                }
                $this->renderGroupStatistics($data);
                if ($_SERVER["MOBILE"]) { ?>
                    <div class="clear">&nbsp;</div><?php
                }
                e("</div>"); // close current-activity div
                return;
            case "graphstats":
                if (!C\GROUP_ANALYTICS_MODE || C\GROUP_ANALYTICS_MODE == "0") {
                    return;
                }
                $this->renderGraphStats($data);
                if ($_SERVER["MOBILE"]) { ?>
                    <div class="clear">&nbsp;</div><?php
                }
                e("</div>"); // close current-activity div
                return;
            default:
                $this->renderGroupsForm($data);
        }
        if (isset($data['browse']) && $data['browse'] == 'true') {
            $data['TABLE_TITLE'] = tl('managegroups_element_not_my_groups');
        } else {
            $data['TABLE_TITLE'] = tl('managegroups_element_groups');
        }
        $context = "";
        if ($data['FORM_TYPE'] == 'search' ||
            !empty($data['context']) && $data['context'] == 'search') {
            $context = 'context=search&amp;';
        }
        $data['ACTIVITY'] = 'manageGroups';
        $data['VIEW'] = $this->view;
        $data['NO_FLOAT_TABLE'] = true;
        $this->view->helper("pagingtable")->render($data);
        ?>
        <table class="role-table table-margin">
            <tr>
                <th><?= tl('managegroups_element_groupname')?></th>
                <th><?= tl('managegroups_element_groupowner')?></th>
                <?php if (!$_SERVER["MOBILE"]) { ?>
                <th><?= tl('managegroups_element_registertype')?></th>
                <th><?= tl('managegroups_element_memberaccess')?></th>
                <th><?= tl('managegroups_element_voting')?></th>
                <th><?= tl('managegroups_element_post_lifetime')?></th>
                <?php } ?>
                <th colspan='2'><?=tl('managegroups_element_actions') ?></th>
            </tr>
        <?php
            $group_url = $admin_url . $token_string ;
            $base_url = $group_url . "&amp;{$context}a=manageGroups";
            $group_url .= "&amp;{$context}a=groupFeeds&amp;just_group_id=";
            if (isset($data['browse'])) {
                $base_url .= "&amp;browse=".$data['browse'];
            }
            foreach (['START_ROW', 'END_ROW', 'NUM_SHOW'] as $limit) {
                if (!empty($data[$limit])) {
                    $base_url .= "&amp;".strtolower($limit)."=".$data[$limit];
                }
            }
            $is_root = ($_SESSION['USER_ID'] == C\ROOT_ID);
            $delete_url = $base_url . "&amp;arg=deletegroup&amp;";
            $unsubscribe_url = $base_url . "&amp;arg=unsubscribe&amp;";
            $join_url = $base_url . "&amp;arg=joingroup&amp;";
            $statistics_url = $base_url . "&amp;arg=statistics&amp;";
            $add_url = $base_url . "&amp;arg=addgroup&amp;";
            $edit_url = $base_url . "&amp;arg=editgroup&amp;";
            $transfer_url = $base_url . "&amp;arg=changeowner&amp;";
            $mobile_columns = ['GROUP_NAME', 'OWNER'];
            $ignore_columns = ["GROUP_ID", "OWNER_ID", "JOIN_DATE",
                "NUM_MEMBERS"];
            if (isset($data['browse'])) {
                $igore_columns[] = 'STATUS';
            }
            $access_columns = ["MEMBER_ACCESS"];
            $dropdown_columns = ["MEMBER_ACCESS", "REGISTER_TYPE",
                "VOTE_ACCESS", "POST_LIFETIME"];
            $choice_arrays = [
                "MEMBER_ACCESS" => ["ACCESS_CODES", "memberaccess"],
                "REGISTER_TYPE" => ["REGISTER_CODES", "registertype"],
                "VOTE_ACCESS" => ["VOTING_CODES", "voteaccess"],
                "POST_LIFETIME" => ["POST_LIFETIMES", "postlifetime"],
            ];
            $stretch = ($_SERVER["MOBILE"]) ? 1 : 1.5;
            foreach ($data['GROUPS'] as $group) {
                e("<tr>");
                foreach ($group as $col_name => $group_column) {
                    if (in_array($col_name, $ignore_columns) || (
                        $_SERVER["MOBILE"] && !in_array($col_name,
                        $mobile_columns))) {
                        continue;
                    }
                    if (in_array($col_name, $mobile_columns)) {
                        if (strlen($group_column) >
                            $stretch * C\NAME_TRUNCATE_LEN) {
                            $group_column = wordwrap($group_column,
                                $stretch * C\NAME_TRUNCATE_LEN, "\n", true);
                        }
                    }
                    if ($col_name == "STATUS") {
                        $group_column =
                            $data['MEMBERSHIP_CODES'][$group[$col_name]];
                        if ($group['STATUS'] == C\ACTIVE_STATUS) {
                            continue;
                        }
                    }
                    if ($col_name == "MEMBER_ACCESS" &&
                        isset($group['STATUS'])&&
                        $group['STATUS'] != C\ACTIVE_STATUS) {
                        continue;
                    }
                    if (in_array($col_name, $dropdown_columns)) {
                        ?><td>
                        <?php
                        $choice_array = $choice_arrays[$col_name][0];
                        $arg_name = $choice_arrays[$col_name][1];
                        if ($group['GROUP_ID'] == C\PUBLIC_GROUP_ID ||
                            $group["OWNER_ID"] != $_SESSION['USER_ID']) {
                            ?><span class='gray'><?php
                                if ($col_name == "REGISTER_TYPE" &&
                                    $data[$choice_array][$group[$col_name]] >=
                                    C\LOW_JOIN_FEE) {
                                    e(tl('managegroups_element_join_fee'));
                                } else if ($col_name == "REGISTER_TYPE" &&
                                    empty($data[$choice_array][
                                    $group[$col_name]])) {
                                    e($data['REGISTER_CODES'][C\NO_JOIN]);
                                    $group['REGISTER_TYPE'] = C\NO_JOIN;
                                } else {
                                    e($data[$choice_array][$group[$col_name]]);
                                }
                                ?>
                                </span><?php
                        } else {
                            ?>
                            <form  method="get">
                            <input type="hidden" name="c" value="admin" />
                            <input type="hidden" name="<?=C\CSRF_TOKEN ?>"
                                value="<?= $data[C\CSRF_TOKEN] ?>" />
                            <input type="hidden" name="a" value="manageGroups"
                            />
                            <input type="hidden" name="arg" value="<?=
                                $arg_name ?>" />
                            <?php
                            if (!empty($context)) {
                                ?>
                                <input type="hidden" name="context"
                                    value="search" />
                                <?php
                            }
                            ?>
                            <input type="hidden" name="group_id" value="<?=
                                $group['GROUP_ID'] ?>" />
                            <?php
                            $this->view->helper("options")->render(
                                "update-$arg_name-{$group['GROUP_ID']}",
                                $arg_name, $data[$choice_array],
                                $group[$col_name], true);
                            ?>
                            </form>
                        <?php
                        }
                        ?>
                        </td>
                        <?php
                    } else if ($col_name == 'OWNER') {
                        if ($group['GROUP_ID'] != C\PUBLIC_GROUP_ID &&
                            (($is_root && empty($data['browse'])) ||
                            $group["OWNER_ID"] == $_SESSION['USER_ID'])) {
                            e("<td><b><a href='".$transfer_url."group_id=".
                                $group['GROUP_ID']."'>$group_column".
                                "</a></b><br/ >[".
                            tl('managegroups_element_num_users',
                            $group['NUM_MEMBERS'])."]");
                        } else {
                            e("<td><b>$group_column</b><br/ >[".
                            tl('managegroups_element_num_users',
                            $group['NUM_MEMBERS'])."]");
                        }
                        if (($is_root ||
                            $group['OWNER_ID'] == $_SESSION['USER_ID']) &&
                            C\GROUP_ANALYTICS_MODE &&
                            C\GROUP_ANALYTICS_MODE != "0") {
                            ?><br />[<a href="<?=$statistics_url .
                                'group_id='.
                                $group['GROUP_ID'].'&amp;user_id=' .
                                $_SESSION['USER_ID'] ?>"><?=
                                tl('managegroups_element_statistics')
                            ?></a>]<?php
                        }
                        e("</td>");
                    } else if ($col_name == 'GROUP_NAME' &&
                        (!isset($data['browse']) || !$data['browse']
                            || in_array($group['REGISTER_TYPE'],
                            [C\PUBLIC_JOIN, C\PUBLIC_BROWSE_REQUEST_JOIN] ) ) &&
                        ($group['MEMBER_ACCESS'] != C\GROUP_PRIVATE ||
                        $group["OWNER_ID"] == $_SESSION['USER_ID'] ||
                            $is_root)){
                        e("<td><a href='".
                            htmlentities(B\feedsUrl($admin_or_group,
                            $group['GROUP_ID'], true)) . $token_string . "' >".
                            $group_column."</a> [<a href=\""
                            . htmlentities(B\wikiUrl("Main", true,
                            $admin_or_group , $group['GROUP_ID'])) .
                            $token_string ."\">"
                            . (tl('managegroups_element_group_wiki'))
                            . "</a>]</td>");
                    } else {
                        e("<td>$group_column</td>");
                    }
                }
                ?>
                <td><?php
                    if ($group['OWNER_ID'] != $_SESSION['USER_ID']||
                        $group['GROUP_NAME'] == 'Public') {
                        if (isset($group['STATUS']) &&
                            $group['STATUS'] == C\INVITED_STATUS) {
                            ?><a href="<?=$join_url . 'group_id='.
                                $group['GROUP_ID'].'&amp;user_id=' .
                                $_SESSION['USER_ID'] ?>"><?=
                                tl('managegroups_element_join')
                            ?></a><?php
                        } else {
                            e('<span class="gray">'.
                                tl('managegroups_element_edit').'</span>');
                        }
                    } else {
                        ?><a href="<?= $edit_url . 'group_id='.
                            $group['GROUP_ID'] ?>"><?=
                            tl('managegroups_element_edit')?></a><?php
                    }?></td>
                <td class="center"><?php
                    if ($group['GROUP_NAME'] == 'Public') {
                        e('<span class="gray">'.
                            tl('managegroups_element_delete').'</span>');
                    } else if (isset($data['browse']) &&
                        $data['browse'] == 'true') {
                        if ( $group['REGISTER_TYPE'] == C\NO_JOIN &&
                            $_SESSION['USER_ID']  != C\ROOT_ID) {
                            e('<span class="gray">'.
                                tl('managegroups_element_join') . '</span>');
                        } else {
                            $has_fee = ($group['REGISTER_TYPE'] >=
                                C\LOW_JOIN_FEE);
                            $confirm = ($has_fee) ? ' onclick="javascript:'.
                                'return confirm(\''.
                                tl('managegroups_element_fee_warning',
                                    $group['REGISTER_TYPE']).'\')" '
                                : "";
                            ?><a <?=$confirm ?> href="<?= $add_url . 'name='.
                                urlencode($group['GROUP_NAME']).'&amp;user_id='.
                                $_SESSION['USER_ID'] ?>"><?=
                                tl('managegroups_element_join')
                            ?></a><?php
                            if ($has_fee) {
                                e('<br /><span class="gray">'.
                                    tl('managegroups_element_num_credits',
                                    $group['REGISTER_TYPE']) . '</span>');
                            }
                        }
                    } else if ($_SESSION['USER_ID']!=$group['OWNER_ID']) {?>
                        <a href="<?= $unsubscribe_url . 'group_id='.
                            $group['GROUP_ID'].'&amp;user_id=' .
                            $_SESSION['USER_ID'] ?>"><?php
                            if (isset($group['STATUS']) &&
                                $group['STATUS'] == C\INVITED_STATUS) {
                                e(tl('managegroups_element_decline'));
                            } else {
                                e(tl('managegroups_element_unsubscribe'));
                            }
                        ?></a></td><?php
                    }  else {?>
                        <a onclick='javascript:return confirm("<?=
                        tl('managegroups_element_delete_operation') ?>");'
                        href="<?= $delete_url . 'group_id='.
                        $group['GROUP_ID'] ?>"><?=
                        tl('managegroups_element_delete')?></a><?php
                    }?></td>
                </tr>
            <?php
            }
        ?>
        </table>
        <?php if ($_SERVER["MOBILE"]) { ?>
            <div class="clear">&nbsp;</div>
        <?php } ?>
        </div>
        <?php
    }
    /**
     * Draws the add groups and edit groups forms
     *
     * @param array $data consists of values of groups fields set
     *     so far as well as values of the drops downs on the form
     */
    public function renderGroupsForm($data)
    {
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $base_url = $admin_url.C\CSRF_TOKEN."=".$data[C\CSRF_TOKEN].
            "&amp;a=manageGroups&amp;visible_users=".$data['visible_users'];
        $browse_url = $base_url . '&amp;arg=search&amp;browse=true';
        $editgroup = ($data['FORM_TYPE'] == "editgroup") ? true: false;
        $creategroup = ($data['FORM_TYPE'] == "creategroup") ? true: false;
        $addgroup = !$editgroup && !$creategroup;
        if ($editgroup) {
            e("<div class='float-opposite'><a href='$base_url'>".
                tl('managegroups_element_addgroup_form')."</a></div>");
            e("<h2>".tl('managegroups_element_group_info'). "</h2>");
        } else if ($creategroup) {
            e("<h2>".tl('managegroups_element_create_group'));
            e("&nbsp;" . $this->view->helper("helpbutton")->render(
            "Create Group", $data[C\CSRF_TOKEN]). "</h2>");
        } else {
            e("<h2>".tl('managegroups_element_add_group'). "</h2>");
        }
        ?>
        <form id="group-form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="c" value="admin" />
        <input type="hidden" name="<?= C\CSRF_TOKEN ?>" value="<?=
            $data[C\CSRF_TOKEN] ?>" />
        <input type="hidden" name="a" value="manageGroups" />
        <input type="hidden" name="add_refer" value="0" />
        <input type="hidden" name="arg" value="<?=$data['FORM_TYPE'] ?>" />
        <input type="hidden" id="visible-users" name="visible_users"
            value="<?= $data['visible_users'] ?>" />
        <input type="hidden" name="group_id" value="<?=
            $data['CURRENT_GROUP']['id'] ?>" />
        <table class="name-table">
        <tr><th class="table-label"><label for="group-name"><?=
            tl('managegroups_element_groupname') ?></label>:</th>
            <td><input type="text" id="group-name"
                name="name"  maxlength="<?= C\SHORT_TITLE_LEN ?>"
                value="<?= $data['CURRENT_GROUP']['name'] ?>"
                class="narrow-field" <?php
                if (!empty($data['CURRENT_GROUP']['name'])) {
                    e(' disabled="disabled" ');
                }
                ?> /></td><?php
                if ($addgroup) { ?>
                    <td>[<a href="<?=$browse_url ?>"><?=
                        tl('managegroups_element_browse') ?></a>]
                    <?=$this->view->helper("helpbutton")->render(
                            "Browse Groups", $data[C\CSRF_TOKEN])
                    ?></td>
                <?php
                }
        ?></tr>
        <?php
        if ($creategroup || $editgroup) { ?>
            <tr><th class="table-label"><label for="register-type"><?=
                tl('managegroups_element_register')?></label>:</th>
                <td><?php
                    $this->view->helper("options")->render(
                        "register-type", "register", $data["REGISTER_CODES"],
                         $data['CURRENT_GROUP']['register']);
                    ?></td></tr>
            <tr><th class="table-label"><label for="member-access"><?=
                tl('managegroups_element_memberaccess')?></label>:</th>
                <td><?php
                    $this->view->helper("options")->render(
                        "member-access", "member_access", $data["ACCESS_CODES"],
                        $data['CURRENT_GROUP']['member_access']);
                    ?></td></tr>
            <tr><th class="table-label"><label for="vote-access"><?=
                tl('managegroups_element_voting')?></label>:</th>
                <td><?php
                    $this->view->helper("options")->render(
                        "vote-access", "vote_access", $data["VOTING_CODES"],
                        $data['CURRENT_GROUP']['vote_access']);
                    ?></td></tr>
            <tr><th class="table-label"><label for="post-lifetime"><?=
                tl('managegroups_element_post_lifetime')?></label>:</th>
                <td><?php
                    $this->view->helper("options")->render(
                        "post-lifetime", "post_lifetime",
                        $data["POST_LIFETIMES"],
                        $data['CURRENT_GROUP']['post_lifetime']);
                    ?></td></tr>
            <tr><th class="table-label"><label for="encryption"><?=
                tl('managegroups_element_encryption')?></label>:</th>
                <?php
                if ($editgroup) {
                    ?>
                    <td><input type="text" id="encryption"
                        name="encryption"
                        value="<?= ($data['CURRENT_GROUP']['encryption'] == 1) ?
                              "Enabled" : "Disabled" ?>"
                        class="narrow-field" <?php
                        if (isset($data['CURRENT_GROUP']['encryption'])) {
                            e(' disabled="disabled" ');
                        }
                    ?> /></td><?php
                }
                if ($creategroup) { ?>
                <td><?php
                    $this->view->helper("options")->render(
                        "encryption", "encryption",
                        $data["ENCRYPTION_CODES"],
                        $data['CURRENT_GROUP']['encryption']);
                    ?></td>
                    <?php
                }
            ?></tr>
            <?php
        }
        if ($editgroup) {
            ?>
            <tr><th class="table-label" style="vertical-align:top;
                padding-top:9px;"><?=
                tl('managegroups_element_feed') ?>:</th>
                <td><div class='light-gray-box'>
                <div class="center">
                    [<a href="javascript:toggleDisplay('upload-toggle')"
                        ><?=tl('managegroups_element_import_discussions')?></a>]
                </div>
                <div id='upload-toggle' class='none' >
                <div id='discussion-upload'
                    class="media-upload-box" >&nbsp;</div>
                <?php
                    $this->view->helper("fileupload")->render(
                        'discussion-upload',
                        'DISCUSSION_DATA', 'discussion-data',
                        min(L\metricToInt(ini_get('upload_max_filesize')),
                        L\metricToInt(ini_get('post_max_size'))),
                        'text', []);
                ?>
                </div></div></td>
                </tr>
            <tr><th class="table-label" style="vertical-align:top;
                padding-top:9px;"><?=
                tl('managegroups_element_group_users') ?>:</th><?php
                $user_cols = "";
                if ($_SERVER["MOBILE"]) {
                    e('<td></td></tr><tr>');
                    $user_cols = " colspan='2' ";
                }?><td <?=$user_cols;?> ><div class='light-gray-box'>
                <div class="center">
                    [<a href="javascript:toggleUserCollection('visible-users')"
                        ><?=tl('managegroups_element_num_users',
                        $data['NUM_USERS_GROUP'])?></a>]<?php
                        if ($data['visible_users'] == 'true') {
                            $context = "";
                            if (!empty($data['context'])) {
                                $context = '&amp;context=search';
                            }
                            $sort_string = urlencode(json_encode(
                                $data['USER_SORTS']));
                            $action_url = "$base_url$context&amp;group_id=".
                                $data['CURRENT_GROUP']['id'].
                                "&amp;user_filter=" . $data['USER_FILTER'] .
                                "&amp;user_sorts=" . $sort_string;
                            $with_selected_actions = [
                                -1 => tl('managegroups_element_with_selected'),
                                $action_url . "&amp;arg=banuser&amp;" =>
                                    tl('managegroups_element_ban'),
                                $action_url . "&amp;arg=deleteuser&amp;" =>
                                    tl('managegroups_element_delete'),
                                $action_url . "&amp;arg=activateuser&amp;" =>
                                    tl('managegroups_element_activate')
                            ];
                            $this->view->helper("options")->render(
                                "with-selected-users", "with_selected",
                                $with_selected_actions, -1, '
                                    var ids_string = arrayIntoFormVariable(
                                        user_ids, "user_ids");
                                    window.location =
                                        this[this.selectedIndex].value +
                                        ids_string;
                                ');
                        } ?>
                </div>
                <?php
                if ($data['visible_users'] == 'true') {
                    $action_url = "$base_url&amp;arg=editgroup".
                        "$context&amp;group_id=" . $data['CURRENT_GROUP']['id'].
                        "&amp;user_filter=".$data['USER_FILTER'];
                    $sort_urls = ['USER_NAME' => '', 'JOIN_DATE'  => '',
                        'STATUS' => ''];
                    foreach ($sort_urls as $field => $url) {
                        $user_sorts = $data['USER_SORTS'];
                        $sort_dir = (empty($user_sorts[$field]) ||
                            $user_sorts[$field]=='ASC') ? 'DESC' : 'ASC';
                        unset($user_sorts[$field]);
                        $user_sorts = array_merge([$field => $sort_dir],
                            $user_sorts);
                        $user_sorts = urlencode(json_encode($user_sorts));
                        $sort_urls[$field] =
                            "$action_url&amp;user_sorts=$user_sorts";
                    }
                    ?>
                    <table><th></th>
                    <th><a href='<?=$sort_urls['USER_NAME'] ?>'><?=
                        tl('managegroups_element_name') ?></a></th><?php
                    if (!$_SERVER["MOBILE"]) { ?>
                        <th><a href='<?=$sort_urls['JOIN_DATE'] ?>'><?=
                            tl('managegroups_element_join_date') ?></a></th>
                    <?php
                    } ?>
                    <th><a href='<?=$sort_urls['STATUS'] ?>'><?=
                        tl('managegroups_element_status') ?></a></th>
                    <th class='center' colspan='2'><?=
                        tl('managegroups_element_action') ?></th>
                    <?php
                    $stretch = ($_SERVER["MOBILE"]) ? 1 :2;
                    foreach ($data['GROUP_USERS'] as $user_array) {
                        $action_url = $base_url."&amp;user_ids=" .
                            $user_array['USER_ID'] . "$context&amp;group_id=".
                            $data['CURRENT_GROUP']['id'].
                            "&amp;user_filter=".$data['USER_FILTER'] .
                            "&amp;user_sorts=$sort_string";
                        $out_name = $user_array['USER_NAME'];
                        $is_owner = $data['CURRENT_GROUP']['owner'] ==
                            $user_array['USER_NAME'];
                        if (strlen($out_name) > $stretch *
                            C\NAME_TRUNCATE_LEN) {
                            $out_name = wordwrap($out_name,
                                $stretch * C\NAME_TRUNCATE_LEN, "\n", true);
                        }
                        $join_date = (empty($user_array["JOIN_DATE"])) ? 0:
                            $user_array["JOIN_DATE"];
                        e("<tr><td><input type='checkbox' class='user-id'".
                            " name=" . $user_array['USER_ID']. " ".
                            (($is_owner) ? "disabled='disabled'": "").
                            " value= " . $user_array['USER_ID'] . " />");
                        e("</td><td><b>". $out_name. "</b></td>");
                        if (!$_SERVER["MOBILE"]) {
                            e("<td>" . date('m/d/Y', $join_date). "</td>");
                        }
                        if ($is_owner) {
                            e("<td>".
                            $data['MEMBERSHIP_CODES'][$user_array['STATUS']] .
                                "</td>");

                            e("<td>" . tl('managegroups_element_groupowner') .
                                "</td>");
                            e("<td><span class='gray'>".
                                tl('managegroups_element_delete').
                                "</span></td>");
                        } else {
                            e("<td>".$data['MEMBERSHIP_CODES'][
                                $user_array['STATUS']]);
                            e("</td>");
                            $limit = false;
                            if (!empty($data['USER_FILTER']) ||
                                (isset($data['NUM_USERS_GROUP']) &&
                                $data['NUM_USERS_GROUP'] >
                                C\NUM_RESULTS_PER_PAGE)) {
                                $limit = isset($data['GROUP_LIMIT']) ?
                                    "&amp;group_limit=" .$data['GROUP_LIMIT']
                                    : "";
                            }
                            switch ($user_array['STATUS']) {
                                case C\INACTIVE_STATUS:
                                    e("<td><a href='$action_url".
                                        "&amp;arg=activateuser$limit'>".
                                        tl('managegroups_element_activate').
                                        '</a></td>');
                                    break;
                                case C\ACTIVE_STATUS:
                                    e("<td><a href='$action_url".
                                        "&amp;arg=banuser$limit'>".
                                        tl('managegroups_element_ban').
                                        '</a></td>');
                                    break;
                                case C\SUSPENDED_STATUS:
                                    e("<td><a href='$action_url".
                                        "&amp;arg=activateuser$limit'>".
                                        tl('managegroups_element_activate')
                                        .'</a></td>');
                                    break;
                                default:
                                    e("<td></td>");
                                    break;
                            }
                            e("<td><a href='$action_url&amp;arg=deleteuser".
                                "$limit'>".
                                tl('managegroups_element_delete')."</a></td>");
                        }
                        e("</tr>");
                    }
                    $center = ($_SERVER["MOBILE"]) ? "" : 'class="center"';
                    if ($data['USER_FILTER'] != "" ||
                        (isset($data['NUM_USERS_GROUP']) &&
                        $data['NUM_USERS_GROUP'] > C\NUM_RESULTS_PER_PAGE)) {
                        $limit = isset($data['GROUP_LIMIT']) ?
                            $data['GROUP_LIMIT']:  0;
                        ?>
                        <tr>
                        <td class="right"><?php
                            if ($limit >= C\NUM_RESULTS_PER_PAGE) {
                                ?><a href='<?= $action_url .
                                    "&amp;arg=editgroup&amp;group_limit=".
                                    ($limit - C\NUM_RESULTS_PER_PAGE) ?>'
                                    >&lt;&lt;</a><?php
                            }
                            ?>
                            </td>
                            <td colspan="2" class="center">
                                <input class="very-narrow-field center"
                                    name="user_filter" type="text"
                                    maxlength="<?= C\NAME_LEN ?>"
                                    value='<?= $data['USER_FILTER'] ?>' /><br />
                                <button type="submit" name="change_filter"
                                    value="true"><?=
                                    tl('managegroups_element_filter')
                                    ?></button>
                                </td>
                            <td class="left"><?php
                            if ($data['NUM_USERS_GROUP'] > $limit +
                                C\NUM_RESULTS_PER_PAGE) {
                                ?><a href='<?=$action_url.
                                    "&amp;arg=editgroup&amp;group_limit=".
                                    ($limit + C\NUM_RESULTS_PER_PAGE) ?>'
                                    >&gt;&gt;</a>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                    <td colspan="4" <?=$center ?>>&nbsp;&nbsp;[<a href='<?=
                        $action_url ?>&amp;arg=inviteusers'><?=
                        tl('managegroups_element_invite')?></a>]&nbsp;&nbsp;
                    </td>
                    </tr>
                    </table>
                </div>
                </td></tr>
            <?php
            } else {
                e("</div></td></tr>");
            }
        }
        ?>
        <tr><td colspan="2" class="center"><button class="button-box"
            type="submit"><?= tl('managegroups_element_save')
            ?></button></td>
        </tr>
        </table>
        </form>
        <script>
        function toggleUserCollection(collection_name)
        {
            var collection = elt(collection_name);
            collection.value = (collection.value == 'true')
                ? 'false' : 'true';
            elt('group-form').submit();
        }
        var user_ids = [];
        function arrayIntoFormVariable(arr, form_var)
        {
            arr_string = arr.join("*");
            return form_var + '=' + arr_string;
        }
        function updateCheckedUserIds(event)
        {
            var form = this.form;
            if (this.checked) {
              user_ids[user_ids.length] = this.value;
            } else {
                var index = user_ids.indexOf(this.value);
                if (index > -1) {
                     user_ids.splice(index, 1);
                }
            }
        }
        </script>
        <?php
    }
    /**
     * Draws form used to invite users to the current group
     * @param array $data from the admin controller with a
     *     'CURRENT_GROUP' field providing information about the
     *     current group as well as info about the current CSRF_TOKEN
     */
    public function renderInviteUsersForm($data)
    {
        $context = "";
        if (!empty($data['context'])) {
            $context = '&amp;context=search';
        }
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $base_url = $admin_url . C\CSRF_TOKEN."=".$data[C\CSRF_TOKEN].
            "&amp;a=manageGroups&amp;visible_users=true$context".
            "&amp;arg=editgroup&amp;".
            "group_id=" . $data['CURRENT_GROUP']['id'];
        ?>
        <div class='float-opposite'><a href='<?= $base_url ?>'><?=
            tl('managegroups_element_group_info') ?></a></div>
        <h2><?= tl('managegroups_element_invite_users_group') ?></h2>
        <form id="group-form" method="post">
        <input type="hidden" name="c" value="admin" />
        <input type="hidden" name="<?= C\CSRF_TOKEN ?>" value="<?=
            $data[C\CSRF_TOKEN] ?>" />
        <input type="hidden" name="a" value="manageGroups" />
        <input type="hidden" name="arg" value="<?=
            $data['FORM_TYPE']?>" />
        <?php
            if (!empty($data['context'])) {
                ?>
                <input type="hidden" name="context" value="search" />
                <?php
            }
        ?>
        <input type="hidden" name="group_id" value="<?=
            $data['CURRENT_GROUP']['id'] ?>" />
        <div>
        <b><label for="group-name"><?=
            tl('managegroups_element_groupname') ?></label>:</b>
            <input type="text" id="group-name"
                name="name"  maxlength="<?= C\SHORT_TITLE_LEN ?>"
                value="<?= $data['CURRENT_GROUP']['name'] ?>"
                class="narrow-field" disabled="disabled" />
        </div>
        <div>
        <b><label for="users-names"><?=
            tl('managegroups_element_usernames') ?></label></b>
        </div>
        <?php $center = (!$_SERVER["MOBILE"]) ? 'class="center"' : ""; ?>
        <div <?= $center ?>>
        <textarea class="short-text-area" id='users-names'
            name='users_names'></textarea>
        <button class="button-box"
            type="submit"><?=tl('managegroups_element_invite')
            ?></button>
        </div>
        </form>
        <?php
    }
    /**
     * Draws the form used to change the owner of a group
     * @param array $data from the admin controller with a
     *     'CURRENT_GROUP' field providing information about the
     *     current group as well as info about the current CSRF_TOKEN
     */
    public function renderChangeOwnerForm($data)
    {
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $base_url = $admin_url . C\CSRF_TOKEN."=".$data[C\CSRF_TOKEN].
            "&amp;a=manageGroups";
        ?>
        <div class='float-opposite'><a href='<?=$base_url ?>'><?=
            tl('managegroups_element_addgroup_form') ?></a></div>
        <h2><?= tl('managegroups_element_transfer_group_owner') ?></h2>
        <form id="group-form" method="post">
        <input type="hidden" name="c" value="admin" />
        <input type="hidden" name="<?= C\CSRF_TOKEN ?>" value="<?=
            $data[C\CSRF_TOKEN] ?>" />
        <input type="hidden" name="a" value="manageGroups" />
        <input type="hidden" name="arg" value="<?=$data['FORM_TYPE'] ?>" />
        <input type="hidden" name="group_id" value="<?=
            $data['CURRENT_GROUP']['id'] ?>" />
        <table class="name-table">
        <tr>
            <th class="table-label"><label for="group-name"><?=
                tl('managegroups_element_groupname')?></label>:</th>
            <td><input type="text" id="group-name"
                name="name"  maxlength="<?= C\SHORT_TITLE_LEN ?>"
                value="<?= $data['CURRENT_GROUP']['name'] ?>"
                class="narrow-field" disabled="disabled" /></td>
        </tr>
        <tr>
            <th class="table-label"><label for="new-owner"><?=
                tl('managegroups_element_new_group_owner') ?></label>:</th>
            <td><input type="text"  id='new-owner'
                name='new_owner' maxlength="<?= C\NAME_LEN ?>"
                class="narrow-field" /></td>
        </tr>
        <tr>
            <th>&nbsp;</th><td>&nbsp;<button class="button-box"
                type="submit"><?=tl('managegroups_element_change_owner')
                ?></button></td>
        </tr>
        </table>
        </form>
        <?php
    }
    /**
     * Draws group statistics related to number of users, popular threads
     * and wiki pages.
     *
     * @param array $data from the admin controller with a
     *     'CURRENT_GROUP' field providing information about the
     *     current group as well as info about the current CSRF_TOKEN
     */
    public function renderGroupStatistics($data)
    {
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $base_url = $admin_url . C\CSRF_TOKEN."=" . $data[C\CSRF_TOKEN].
            "&amp;a=manageGroups";
        $graph_stats_url = $base_url. "&amp;arg=graphstats&amp;group_id=".
            $data['CURRENT_GROUP']['id'];
        ?>
        <div class='float-opposite'><a href='<?=$base_url ?>'><?=
            tl('managegroups_element_addgroup_form') ?></a></div>
        <h2><?= tl('managegroups_element_group_statistics',
        $data['CURRENT_GROUP']['name']) ?></h2>
        <form>
        <div>
        <b><label for='title-filter'><?=
        tl('managegroups_element_filter')?></label></b>
        <input type="text" class="narrow-field" name='filter'
            id='title-filter' value="<?=$data['FILTER']?>" />
        <input type="hidden" name='<?=C\CSRF_TOKEN?>'
            value='<?=$data[C\CSRF_TOKEN]?>' />
        <input type="hidden" name='arg' value='statistics' />
        <input type="hidden" name='group_id' value='<?=
            $data['CURRENT_GROUP']['id'] ?>' />
        <input type="hidden" name='a' value='manageGroups' />
        <input type="hidden" name='c' value='admin' />
        <button type='submit' name='filter_go'
            class="button-box"><?=tl('managegroups_element_go') ?></button>
        </div></form>
        <?php
        $stat_types = [
            C\GROUP_IMPRESSION => tl('managegroups_element_group_views'),
            C\THREAD_IMPRESSION => tl('managegroups_element_thread_views'),
            C\WIKI_IMPRESSION => tl('managegroups_element_wiki_views'),
            ];
        $time_periods = [
           C\ONE_HOUR => tl('managegroups_element_last_hour'),
           C\ONE_DAY => tl('managegroups_element_last_day'),
           C\ONE_MONTH => tl('managegroups_element_last_month'),
           C\ONE_YEAR => tl('managegroups_element_last_year'),
           C\FOREVER => tl('managegroups_element_all_time'),
        ];
        foreach ($stat_types as $field => $heading) {
            ?><h3><?=$heading ?></h3><?php
            foreach ($time_periods as  $time_period => $period_heading) {
                if ($field == C\GROUP_IMPRESSION) {
                    if (empty($data['STATISTICS'][$field][
                        $time_period][0]['NUM_VIEWS'])) {
                        e("<p><b>$period_heading</b>: ".
                            tl('managegroups_element_no_activity').
                            "</p>");
                    } else {
                        if ($time_period == C\ONE_HOUR ||
                           $time_period == C\FOREVER ||
                           C\DIFFERENTIAL_PRIVACY) {
                            e("<p><b>$period_heading</b>: ".
                                $data['STATISTICS'][$field]
                                [$time_period][0]['NUM_VIEWS'].
                                "</p>");
                        } else {
                            e("<p><b>$period_heading</b>:
                                <a href='" . $graph_stats_url .
                                "&amp;impression=" . $field .
                                "&amp;time=" . $time_period .
                                "&amp;item=" . $data['STATISTICS'][$field]
                                [$time_period][0]['ID']."'> ".
                                $data['STATISTICS'][$field]
                                [$time_period][0]['NUM_VIEWS'].
                                "</a></p>");
                        }
                    }
                } else {
                    if (!empty($data['STATISTICS'][$field][
                        $time_period])) {
                        ?><h4><?=$period_heading ?>:</h4><?php
                        foreach ($data['STATISTICS'][$field][
                            $time_period] as $item_name => $item_data) {
                            if ($time_period == C\ONE_HOUR ||
                                $time_period == C\FOREVER ||
                                C\DIFFERENTIAL_PRIVACY) {
                                e("<p>$item_name: ". $item_data[0]['NUM_VIEWS'].
                                "</p>");
                            } else {
                                e("<p>$item_name: <a href='" . $graph_stats_url.
                                    "&amp;impression=".$field.
                                    "&amp;time=".$time_period.
                                    "&amp;item=".$item_data[0]['ID']."'> ".
                                    $item_data[0]['NUM_VIEWS'].
                                    "</a></p>");
                            }
                        }
                    } else {
                        e("<p><b>$period_heading</b>: ".
                            tl('managegroups_element_no_activity').
                            "</p>");
                    }
                }
            }
        }
    }
    /**
     * Draws the search for groups forms
     *
     * @param array $data consists of values of role fields set
     *     so far as well as values of the drops downs on the form
     */
    public function renderSearchForm($data)
    {
        $controller = "admin";
        $activity = "manageGroups";
        $view = $this->view;
        if (isset($data['browse'])) {
            $title = tl('managegroups_element_discover_groups');
            $title .= "&nbsp;" . $view->helper("helpbutton")->render(
            "Discover Groups", $data[C\CSRF_TOKEN]);
        } else {
            $title = tl('managegroups_element_search_group');
        }
        $return_form_name = tl('managegroups_element_addgroup_form');
        $fields = [
            tl('managegroups_element_groupname') => "name",
            tl('managegroups_element_groupowner') => "owner",
            tl('managegroups_element_registertype') =>
                ["register", $data['EQUAL_COMPARISON_TYPES']],
            tl('managegroups_element_memberaccess') =>
                ["access", $data['EQUAL_COMPARISON_TYPES']],
            tl('managegroups_element_post_lifetime') =>
                ["lifetime", $data['EQUAL_COMPARISON_TYPES']]
        ];
        $dropdowns = [
            "register" => $data['REGISTER_CODES'],
            "access" => $data['ACCESS_CODES'],
            "voting" => $data['VOTING_CODES'],
            "lifetime" => $data['POST_LIFETIMES']
        ];
        $view->helper("searchform")->render($data, $controller, $activity,
            $view, $title, $return_form_name, $fields, $dropdowns);
    }
    /**
     * Draws chart of the group statistics in terms of number
     * of views in different time periods.
     *
     * @param array $data from the social component controller
     *     containing statistical information of specific group item
     *     including time period, number of views, update timestamp
     */
    public function renderGraphStats($data)
    {
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $base_url = $admin_url . C\CSRF_TOKEN."=".$data[C\CSRF_TOKEN].
            "&amp;a=manageGroups&amp;arg=statistics&amp;group_id=".
            $data['CURRENT_GROUP']['id'];
        ?>
        <div class='float-opposite'><a href='<?=$base_url ?>'><?=
            tl('managegroups_element_back') ?></a></div>
        <?php
        $stat_types = [
            C\GROUP_IMPRESSION => tl('managegroups_element_group_views'),
            C\THREAD_IMPRESSION => tl('managegroups_element_thread_views'),
            C\WIKI_IMPRESSION => tl('managegroups_element_wiki_views'),
            ];
        $time_periods = [
           C\ONE_HOUR => tl('managegroups_element_last_hour'),
           C\ONE_DAY => tl('managegroups_element_last_day'),
           C\ONE_MONTH => tl('managegroups_element_last_month'),
           C\ONE_YEAR => tl('managegroups_element_last_year'),
           C\FOREVER => tl('managegroups_element_all_time'),
        ];
        $total_view = 0;
        if (array_key_exists(C\ONE_DAY, $data['STATISTICS'])) {
            $period = C\ONE_DAY;
            $column_name = tl('managegroups_element_hour');
            $dt_format = "m-d-Y H:i";
        } else if (array_key_exists(C\ONE_MONTH, $data['STATISTICS'])) {
            $period = C\ONE_MONTH;
            $column_name = tl('managegroups_element_day');
            $dt_format = "m-d-Y";
        } else if (array_key_exists(C\ONE_YEAR, $data['STATISTICS'])) {
            $period = C\ONE_YEAR;
            $column_name = tl('managegroups_element_month');
            $dt_format = "m-d-Y";
        }
        ?>
        <h2><?= $data['CURRENT_GROUP']['name']." ".
            $stat_types[$data['STATISTICS'][$period][0]['TYPE']]." : ".
            $time_periods[$period] ?></h2>
        <div id="chart"></div>
        <table class="stat-table table-center">
            <tr>
                <th><?= $column_name ?></th>
                <th><?= tl('managegroups_element_num_visits')?></th>
            </tr>
        <?php
        foreach ($data['STATISTICS'] as $statistics => $statistics_array) {
            foreach ($statistics_array as $key => $statistics_value) {
                ?>
                <tr>
                <?php
                $timestamp = $statistics_value['UPDATE_TIMESTAMP'];
                $dt = date($dt_format, $timestamp);
                $total_view += $statistics_value['VIEWS'];
                ?>
                <td><?= $dt ?></td>
                <td><?= $statistics_value['VIEWS'] ?></td>
                </tr>
                <?php
            }
        }
        ?>
        <tr>
            <th>Total</th>
            <td><?= $total_view ?></td>
        </tr>
        </table>
        <?php
    }
}

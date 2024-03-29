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
 * @author Chris Pollett chris@pollett.org
 * @license https://www.gnu.org/licenses/ GPL3
 * @link https://www.seekquarry.com/
 * @copyright 2009 - 2019
 * @filesource
 */
namespace seekquarry\yioop\views;

use seekquarry\yioop as B;
use seekquarry\yioop\configs as C;
use seekquarry\yioop\library\CrawlConstants;

/**
 * View used to draw and allow editing of group feeds when not in the admin view
 * (so activities panel on side is not present.) This is also used to draw
 * group feeds for public feeds when not logged.
 *
 * @author Chris Pollett
 */
class GroupView extends View implements CrawlConstants
{
    /** This view is drawn on a web layout
     * @var string
     */
    public $layout = "web";
    /**
     * Draws a minimal container with a GroupElement in it on which a group
     * feed can be drawn
     *
     * @param array $data with fields used for drawing the container and feed
     */
    public function renderView($data) {
        $logo = C\LOGO;
        $logged_in = !empty($data["ADMIN"]);
        $base_query = $data['PAGING_QUERY'];
        $other_base_query = $data['OTHER_PAGING_QUERY'];
        $token_string = ($logged_in) ? C\CSRF_TOKEN."=".$data[C\CSRF_TOKEN]
            : "";
        if ($_SERVER["MOBILE"]) {
            $logo = C\M_LOGO;
        }
        if (C\PROFILE) {
        ?>
        <div class="top-bar"><?php
            $this->element("signin")->render($data);
        ?>
        </div><?php
        }
        ?>
        <h1 class="group-heading"><a href="<?=C\BASE_URL ?><?php
            if ($logged_in) {
                e("?$token_string");
            }
            ?>"><img class='logo'
            src="<?= C\BASE_URL . $logo ?>" alt="<?= $this->logo_alt_text
            ?>" /></a><span> - <?php
        if (isset($data['JUST_THREAD'])) {
            if (isset($data['WIKI_PAGE_NAME'])) {
                $wiki_url = htmlentities(B\wikiUrl(
                    $data['WIKI_PAGE_NAME'], true,
                    $data['CONTROLLER'],$data['PAGES'][0]["GROUP_ID"])).
                    $token_string;
                $group_base_query = $base_query . $token_string;
                $group_name = $data['PAGES'][0][self::SOURCE_NAME];
                $paths = [$group_base_query =>
                    tl('group_view_page_thread',
                    $data['WIKI_PAGE_NAME'], $group_name),
                    $group_base_query . "&amp;f=rss" =>
                    tl('group_view_page_thread_rss',
                    $data['WIKI_PAGE_NAME'], $group_name),
                    $wiki_url => tl('group_view_wiki_page',
                    $data['WIKI_PAGE_NAME'], $group_name)
                    ];
                $groupsfeed_url = htmlentities(B\feedsUrl("group",
                    "", false, $data['CONTROLLER'])).
                    $token_string;
                $this->element("groupfeed")->renderPath($data, $paths,
                     "", $groupsfeed_url,
                     $data['PAGES'][0][self::SOURCE_NAME]);
            } else {
                $groupfeed_url = htmlentities(B\feedsUrl("group",
                    $data['PAGES'][0]["GROUP_ID"], false,
                    $data['CONTROLLER'])). $token_string;
                $groupfeed_group_url = htmlentities(B\feedsUrl("group",
                    $data['PAGES'][0]["GROUP_ID"], true, "group")).
                    $token_string;
                $groupwiki_url = htmlentities(B\wikiUrl("Main", true,
                    $data['CONTROLLER'],$data['PAGES'][0]["GROUP_ID"])).
                    $token_string;
                $group_base_query = B\feedsUrl("", "", true,
                    $data['CONTROLLER']) . $token_string;
                $paths = [$base_query => $data['SUBTITLE'],
                    $base_query . "&amp;f=rss" =>
                    tl("group_view_rss", $data['SUBTITLE']),
                    $groupfeed_url =>
                        $data['PAGES'][0][self::SOURCE_NAME],
                    $groupfeed_group_url."&amp;f=rss" =>
                        tl("group_view_rss",
                        $data['PAGES'][0][self::SOURCE_NAME])
                    ];
                $this->element('groupfeed')->renderPath($data, $paths,
                     $groupwiki_url, $group_base_query,
                     $data['PAGES'][0][self::SOURCE_NAME]);
            }
        } else if (isset($data['JUST_GROUP_ID'])){
            $groupfeed_url = htmlentities(B\feedsUrl("group",
                $data['JUST_GROUP_ID'], false, $data['CONTROLLER'])).
                $token_string;
            $groupfeed_group_url = htmlentities(B\feedsUrl("group",
                $data['JUST_GROUP_ID'], true, "group")).
                $token_string;
            $groupwiki_url = htmlentities(B\wikiUrl("Main", true,
                $data['CONTROLLER'], $data['JUST_GROUP_ID'])).
                $token_string;
            $group_base_query = B\feedsUrl("", "", true,
                $data['CONTROLLER']) . $token_string;
            $paths = [
                $groupfeed_url => tl("group_view_groupfeed",
                    $data['SUBTITLE']),
                $groupfeed_group_url."&amp;f=rss" =>
                    tl("group_view_rss", $data['SUBTITLE'])];
            $this->element('groupfeed')->renderPath($data, $paths,
                 $groupwiki_url, $group_base_query, $data['SUBTITLE']);
        } else if (isset($data['JUST_USER_ID'])) {
            if (empty($data['PAGES'][0]["USER_NAME"])) {
                e(tl("group_view_no_path_info"));
            } else {
                $viewed_user_name = $data['PAGES'][0]["USER_NAME"];
                $userfeed_url = htmlentities(B\feedsUrl("user",
                    $data['JUST_USER_ID'], true, $data['CONTROLLER'])).
                    $token_string;
                $group_base_all = B\feedsUrl("", "", true,
                    $data['CONTROLLER']) . $token_string;
                $paths = [
                    $userfeed_url => tl("group_view_userfeed",
                        $viewed_user_name),
                    $userfeed_url."&amp;f=rss" =>
                        tl("group_view_userrss", $viewed_user_name)];
                $this->element('groupfeed')->renderPath($data, $paths,
                     $group_base_all, $userfeed_url, $viewed_user_name,
                     "user");
            }
        } else {
            $paths = [];
            $this->element('groupfeed')->renderPath($data, $paths, "",
                $base_query, tl('group_view_myfeeds'), "just_group_and_thread");
        }
        if (!isset($data['JUST_THREAD']) && !isset($data['JUST_GROUP_ID']) &&
            !isset($data['JUST_USER_ID'])) {
            ?><span style="position:relative;top:5px;" >
            <a href="<?= $base_query. 'v=ungrouped&amp;'. $token_string
             ?>" ><img
            src="<?=C\BASE_URL ?>resources/list.png" /></a>
            <a href="<?= $base_query. 'v=grouped&amp;' . $token_string ?>" ><img
            src="<?=C\BASE_URL ?>resources/grouped.png" /></a>
            </span><?php
        }
        ?></span>
        </h1>
        <?php
        if (isset($data["AD_LOCATION"]) &&
            in_array($data["AD_LOCATION"], ['top', 'both'] ) ) { ?>
            <div class="top-adscript group-ad-static"><?=
            $data['TOP_ADSCRIPT']
            ?></div>
            <?php
        }
        if (isset($data['ELEMENT'])) {
            $element = $data['ELEMENT'];
            $this->element($element)->render($data);
        }
        $this->element("help")->render($data);
        if (C\PROFILE) { ?>
            <script>
            /*
                Used to warn that user is about to be logged out
             */
            function logoutWarn()
            {
                doMessage(
                    "<h2 class='red'><?php
                    e(tl('group_view_auto_logout_one_minute'))?></h2>");
            }
            /*
                Javascript to perform autologout
             */
            function autoLogout()
            {
                document.location='<?=C\BASE_URL ?>?a=signout';
            }
            //schedule logout warnings
            var sec = 1000;
            var minute = 60 * sec;
            var autologout = <?=C\AUTOLOGOUT ?> * sec;
            setTimeout("logoutWarn()", autologout - minute);
            setTimeout("autoLogout()", autologout);
            </script><?php
        }
    }
}

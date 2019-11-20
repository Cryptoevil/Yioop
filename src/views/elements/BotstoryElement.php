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
namespace seekquarry\yioop\views\elements;

use seekquarry\yioop as B;
use seekquarry\yioop\configs as C;

/**
 * Element responsible for displaying the bot story features
 * that someone can use to create for their own chat bot.
 *
 * @author Chris Pollett rewrite of file created by Harika Nukala
 */
class BotstoryElement extends Element
{
    /**
     * Used to draw the Bot Story action forms which are used to configure
     * new Group Chat Bots
     * @param array $data associative array of info from the ChatBotComponent
     *      needed to draw the form
     */
    public function render($data)
    {
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $token_string = C\CSRF_TOKEN . "=" . $data[C\CSRF_TOKEN];
        $pre_base_url = $admin_url . $token_string;
        $base_url = $pre_base_url . "&amp;a=botStory&amp;";
        $add_pattern_url = $base_url . "pattern_form_type=addpattern";
        $base_url .= "pattern_form_type=" . $data['PATTERN_FORM_TYPE'];
        ?>
        <div class="current-activity">
            <?php
            $editpattern = ($data['PATTERN_FORM_TYPE'] == "editpattern") ?
                true : false;
            if ($editpattern) { ?>
                <div class='float-opposite'><a href='<?=$add_pattern_url?>'>
                    <?=tl('botstory_element_addpattern_form') ?></a></div>
                <h2><?= tl('botstory_element_edit_pattern') . " " .
                    $this->view->helper("helpbutton")->render(
                    "Bot Story Patterns", $data[C\CSRF_TOKEN]) ?></h2><?php
            } else { ?>
                <h2><?= tl('botstory_element_add_pattern') . " " .
                    $this->view->helper("helpbutton")->render(
                    "Bot Story Patterns", $data[C\CSRF_TOKEN]) ?></h2><?php
            }
            ?>
            <form id="patternForm" method="post">
            <input type="hidden" name="c" value="admin" />
            <input type="hidden" name="<?= C\CSRF_TOKEN ?>" value="<?=
                $data[C\CSRF_TOKEN] ?>" />
            <input type="hidden" name="a" value="botStory" />
            <input type="hidden" name="arg" value="<?=
                $data['PATTERN_FORM_TYPE'] ?>" />
            <?php
            if (!empty($data['CURRENT_PATTERN']['pattern_id'])) { ?>
                <input type="hidden" name="pattern_id" value="<?=
                    $data['CURRENT_PATTERN']['pattern_id'] ?>" /><?php
            } ?>
            <table class="name-table">
            <tr><th><?=tl('botstory_element_request') ?></th><td><input
                type="text" name="request"
                maxlength="<?= C\MAX_DESCRIPTION_LEN ?>"
                value="<?= $data['CURRENT_PATTERN']['request'] ?>"
                class="wide-field" /></td>
            </tr>
            <tr><th><?=tl('botstory_element_trigger_state') ?></th><td><input
                type="text" name="trigger_state"  maxlength="<?= C\NAME_LEN  ?>"
                value="<?= $data['CURRENT_PATTERN']['trigger_state'] ?>"
                class="narrow-field" /></td>
            </tr>
            <tr><th><?=tl('botstory_element_remote_message') ?></th><td><input
                type="text" name="remote_message"  maxlength="<?=
                C\MAX_DESCRIPTION_LEN  ?>" value="<?=
                $data['CURRENT_PATTERN']['remote_message'] ?>"
                class="wide-field" />
                </td>
            </tr>
            <tr><th><?=tl('botstory_element_result_state') ?></th><td><input
                type="text" name="result_state"  maxlength="<?= C\NAME_LEN  ?>"
                value="<?= $data['CURRENT_PATTERN']['result_state'] ?>"
                class="narrow-field" /></td>
            </tr>
            <tr><th><?=tl('botstory_element_response') ?></th><td><input
                type="text" name="response"  maxlength="<?=
                C\MAX_DESCRIPTION_LEN  ?>" value="<?=
                $data['CURRENT_PATTERN']['response'] ?>" class="wide-field" />
                </td>
            </tr>
            <tr><td></td><td class="center"><button class="button-box"
                type="submit"><?= tl('botstory_element_save') ?></button></td>
            </tr>
            </table>
            </form>
            <table class="search-sources-table">
            <tr>
            <th><?= tl('botstory_element_pattern_header') ?></th>
            <th colspan="3"><?= tl('botstory_element_actions')?>
            </th>
            </tr><?php
            foreach ($data['PATTERNS'] as $pattern) {
                ?>
                <tr>
                <td><i><?= tl('botstory_element_request') ?></i> <?=
                    $pattern['REQUEST'] ?><br />
                <i><?= tl('botstory_element_trigger_state') ?></i> <?=
                    $pattern['TRIGGER_STATE'] ?><br />
                <i><?= tl('botstory_element_remote_message') ?></i> <?=
                    $pattern['REMOTE_MESSAGE'] ?><br />
                <i><?= tl('botstory_element_result_state') ?></i> <?=
                    $pattern['RESULT_STATE'] ?><br />
                <i><?= tl('botstory_element_response') ?></i> <?=
                    $pattern['RESPONSE'] ?>
                </td>
                <td><a href="<?=$pre_base_url . "&amp;a=botStory&amp;" .
                    "pattern_form_type=editpattern&amp;pattern_id=" .
                    $pattern['PATTERN_ID'] ?>"><?=
                    tl('botstory_element_editpattern')
                        ?></a></td>
                <td><a onclick='javascript:return confirm("<?=
                    tl('botstory_element_delete_operation')
                    ?>");' href="<?=$pre_base_url . "&amp;a=botStory&amp;" .
                    "arg=deletepattern&amp;pattern_id=" .
                    $pattern['PATTERN_ID'] ?>"><?=
                    tl('botstory_element_deletepattern') ?></a></td>
                </tr>
                <?php
            } ?>
            </table>
        </div>
        <?php
    }
}

<?php
/**
 * SeekQuarry/Yioop --
 * Open Source Pure PHP Search Engine, Crawler, and Indexer
 *
 * Copyright (C) 2009 - 2019 Chris Pollett chris@pollett.org
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
 * @author Sreenidhi Muralidharan
 * @license https://www.gnu.org/licenses/ GPL3
 * @link https://www.seekquarry.com/
 * @copyright 2009 - 2019
 * @filesource
 */
namespace seekquarry\yioop\views\elements;

use seekquarry\yioop as B;
use seekquarry\yioop\configs as C;

/**
 * Element used to handle configurations of Yioop related to authentication,
 * captchas, and recovery of missing passwords
 *
 * @author Sreenidhi Muralidharan/Chris Pollett
 */
class SecurityElement extends Element
{
    /**
     * Method that draws forms to to select either among a text or a
     * graphical captcha
     *
     * @param array $data holds data on the profile elements which have been
     *     filled in as well as data about which form fields to display
     */
    public function render($data)
    {
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $localize_url = $admin_url .C\CSRF_TOKEN."=".$data[C\CSRF_TOKEN] .
            "&amp;a=manageLocales&amp;arg=editstrings&amp;selectlocale=" .
            $data['LOCALE_TAG'];
        ?>
        <div class = "current-activity">
        <h2><?= tl('security_element_auth_captcha') ?></h2>
        <form class="top-margin" method="post">
            <input type="hidden" name="c" value="admin" />
            <input type="hidden" name="a" value="security"/>
            <input type="hidden" name="<?= C\CSRF_TOKEN ?>" value="<?=
                $data[C\CSRF_TOKEN] ?>" />
            <input type="hidden" name="arg" value="updatetypes"/>
            <div class="top-margin">
            <fieldset>
                <legend><b><?=
                tl('security_element_auth_and_access').
                "&nbsp;" . $this->view->helper("helpbutton")->render(
                    "Authentication Type", $data[C\CSRF_TOKEN])
                ?>
                </b></legend>
                <div><b><label for="authentication-mode"><?=
                    tl('security_element_authentication_type')?></label></b>
                    <?php $this->view->helper("options")->render(
                        "authentication-mode", "AUTHENTICATION_MODE",
                         $data['AUTHENTICATION_MODES'],
                         $data['AUTHENTICATION_MODE']);
                    if (isset($data['ZKP_UNAVAILABLE']) &&
                        $data['ZKP_UNAVAILABLE']) {
                        e('<div class="red">'.
                            tl('security_element_zero_unavailable')."</div>");
                    } ?>
                </div>
                <div class="top-margin"><b><label for="timezone"><?=
                    tl('security_element_site_timezone') ?></label></b>
                <input type="text" id="timezone"
                    name="TIMEZONE" class="extra-wide-field" value='<?=
                    $data["TIMEZONE"] ?>' /></div>
                <div class="top-margin"><b><label for="token-name"><?=
                    tl('security_element_token_name') ?></label></b>
                <input type="text" id="token-name"
                    name="CSRF_TOKEN" class="extra-wide-field" value='<?=
                    $data["CSRF_TOKEN"] ?>' /></div>
                <div class="top-margin"><b><label for="cookie-name"><?=
                    tl('security_element_session_name') ?></label></b>
                <input type="text" id="cookie-name"
                    name="SESSION_NAME" class="extra-wide-field" value='<?=
                    $data["SESSION_NAME"] ?>' /></div>
                <div class="top-margin"><b><label for="autologout"><?=
                    tl('security_element_autologout')?></label></b>
                <?php
                    $this->view->helper("options")->render(
                    "autologout", "AUTOLOGOUT",  $data['AUTOLOGOUT_TIMES'],
                     $data['AUTOLOGOUT']);?></div>
            </fieldset>
            </div>
            <div class="top-margin">
            <fieldset>
                <legend><label
                for="privacy-mode"><b><?php
                e(tl('security_element_privacy'));
                e("&nbsp;" . $this->view->helper("helpbutton")->render(
                    "Privacy", $data[C\CSRF_TOKEN]))
                ?></b>
                </label></legend>
                <table>
                <tr><td>
                <label><b><?=
                    tl('security_element_differential_privacy')?></b></label>
                </td><td>
                <?php
                $this->view->helper("options")->render("privacy-mode",
                    "DIFFERENTIAL_PRIVACY", $data['PRIVACY_MODES'],
                    $data['DIFFERENTIAL_PRIVACY']);
                ?>
                </td></tr><tr><td>
                <label for="group-analytics-mode"><b><?php
                e(tl('security_element_group_analytics'));
                ?></b>
                </label>
                </td><td>
                <?php
                $this->view->helper("options")->render("group-analytics-mode",
                    "GROUP_ANALYTICS_MODE", $data['GROUP_ANALYTICS_MODES'],
                    $data['GROUP_ANALYTICS_MODE']);
                ?>
                </td></tr><tr><td>
                <label
                for="search-analytics-mode"><b><?php
                e(tl('security_element_search_analytics'));
                ?></b>
                </label>
                </td><td>
                <?php
                $this->view->helper("options")->render("search-analytics-mode",
                    "SEARCH_ANALYTICS_MODE", $data['SEARCH_ANALYTICS_MODES'],
                    $data['SEARCH_ANALYTICS_MODE']);
                ?>
                </td></tr></table>
            </div>
            <div class="top-margin">
            <fieldset>
                <legend><label
                for="captcha-mode"><b><?php
                e(tl('security_element_captcha_type'));
                e("&nbsp;" . $this->view->helper("helpbutton")->render(
                    "Captcha Type", $data[C\CSRF_TOKEN]))
                ?></b>
                </label></legend>
                <?php
                    $this->view->helper("options")->render("captcha-mode",
                        "CAPTCHA_MODE", $data['CAPTCHA_MODES'],
                        $data['CAPTCHA_MODE']);
                ?>
            </fieldset>
            </div>
            <div class="top-margin">
            <fieldset>
                <legend><label
                for="recovery-mode"><b><?php
                e(tl('security_element_recovery_type'));
                e("&nbsp;" . $this->view->helper("helpbutton")->render(
                    "Recovery Type", $data[C\CSRF_TOKEN]))
                ?></b>
                </label></legend>
                <?php
                    $this->view->helper("options")->render("recovery-mode",
                        "RECOVERY_MODE", $data['RECOVERY_MODES'],
                        $data['RECOVERY_MODE']);
                ?>
            </fieldset>
            </div>
            <div class="top-margin center"><button
                class="button-box" type="submit"><?=tl('security_element_save')
                ?></button>
            </div>
        </form>
        <h2><?=tl('security_element_captcha_recovery_questions') ?></h2>
        <?php
        if ($data['CAN_LOCALIZE']) { ?>
            <div class="top-margin">[<a href="<?=
                $localize_url.'&amp;filter=register_view_recovery'.
                '&amp;previous_activity=security' ?>" ><?=
                 tl('security_element_edit_recovery') ?></a>]
            </div>
            <div class="top-margin">[<a href="<?=
                $localize_url.'&amp;filter=register_view_question'.
                    '&amp;previous_activity=security'
                    ?>" ><?= tl('security_element_edit_captcha') ?></a>]
            </div>
            <?php
        } else { ?>
            <div class="top-margin">[<b class="gray"><?=
                tl('security_element_edit_recovery') ?></b>]
            </div>
            <div class="top-margin">[<b class="gray"><?=
                tl('security_element_edit_captcha') ?></b>]
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }
}

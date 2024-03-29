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

use seekquarry\yioop\configs as C;

/**
 * View responsible for drawing the admin pages of the SeekQuarry search engine
 * site.
 *
 * @author Chris Pollett
 */
class AdminView extends View
{
    /** This view is drawn on a web layout
     * @var string
     */
    public $layout = "web";

    /**
     * Renders the list of admin activities and draws the current activity
     * Renders the Javascript to autologout after an hour
     *
     * @param array $data  what is contained in this array depend on the current
     * admin activity. The $data['ELEMENT'] says which activity to render
     */
    public function renderView($data)
    {
        $logo = C\LOGO;
        if ($_SERVER["MOBILE"]) {
            $logo = C\M_LOGO;
        }
        $hide_activities = "";
        if (!empty($data['HIDE_ACTIVITIES']) && !$_SERVER["MOBILE"]) {
            $hide_activities = "hide-activities";
        }
        ?>
        <div class="top-bar"><?php
        if (C\PROFILE) {
            $this->element("signin")->render($data);
        }
        ?>
        </div>
        <h1 class="admin-heading logo"><a href="<?= C\BASE_URL . "?" .
            C\CSRF_TOKEN."=".$data[C\CSRF_TOKEN] ?>"><img
            src="<?= C\BASE_URL . $logo ?>" alt="<?= $this->logo_alt_text
                ?>" /></a><span> - <?php
            e(tl('admin_view_admin'));
            if (!$_SERVER["MOBILE"]) {
                e(' ['.$data['CURRENT_ACTIVITY'].']');
            }
            ?></span></h1>
        <div class="content-container <?=$hide_activities ?>" ><?php
        $this->element("activity")->render($data);
        $this->element("help")->render($data);
        if (isset($data['ELEMENT'])) {
            $element = $data['ELEMENT'];
            $this->element($element)->render($data);
        }
        if (C\PROFILE) { ?>
            <script>
            /*
                Used to warn that user is about to be logged out
             */
            function logoutWarn()
            {
                doMessage(
                    "<h2 class='red'><?php
                        e(tl('admin_view_auto_logout_one_minute'))?></h2>");
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

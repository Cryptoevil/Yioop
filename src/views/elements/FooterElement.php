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
 * Element responsible for drawing footer links on search view and static view
 * pages
 *
 * @author Chris Pollett
 */
class FooterElement extends Element
{
    /**
     * Element used to render the login screen for the admin control panel
     *
     * @param array $data many data from the controller for the footer
     *     (so far none)
     */
    public function render($data)
    {
        $logged_in = isset($data['ADMIN']) && $data['ADMIN'];
        $tools = (isset($data[C\CSRF_TOKEN]) && $logged_in) ?
            B\moreUrl(true) . C\CSRF_TOKEN . "=" . $data[C\CSRF_TOKEN] :
            B\moreUrl();
            ?>
        <div class="center">
        <?php
        if (tl('footer_element_blog') != 'footer_element_blog') {
            ?>
            - <a href="<?=B\directUrl('blog') ?>"><?=
            tl('footer_element_blog') ?></a><?php
        }
        ?> -
        <?php
        if (tl('footer_element_privacy') != 'footer_element_privacy') {
            ?>
            <a href="<?=B\directUrl('privacy') ?>"><?=
            tl('footer_element_privacy') ?></a><?php
        }
        ?> -
        <?php
        if (tl('footer_element_terms') != 'footer_element_terms') {
            ?>
            <a href="<?=B\directUrl('terms') ?>"><?=
            tl('footer_element_terms') ?></a><?php
        }
        ?> -
        <?php
        if (tl('footer_element_tools') != 'footer_element_tools') {
            ?>
            <a href="<?= $tools ?>"><?=
            tl('footer_element_tools') ?></a><?php
        }
        ?> -
        <?php
        if (tl('footer_element_bot') != 'footer_element_bot') {
            ?>
            <a href="<?=B\directUrl('bot') ?>"><?=
            tl('footer_element_bot') ?></a> - <?php if ($_SERVER["MOBILE"]) {
                e('<br /> - ');
            }
        }
        if (tl('footer_element_developed_seek_quarry') !=
            'footer_element_developed_seek_quarry') {
            ?>
            <a href="https://www.seekquarry.com/"><?=
            tl('footer_element_developed_seek_quarry') ?></a><?php
        }
        ?> -
        </div>
        <div class="center">
        <?php
        if (tl('footer_element_copyright_site') !=
            'footer_element_copyright_site') {
            e(tl('footer_element_copyright_site'));
            ?> - <a href="<?=C\BASE_URL ?>"><?=
            tl('footer_element_this_search_engine')
            ?></a><?php
        }
        ?>
        </div>
    <?php
    }
}

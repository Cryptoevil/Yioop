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
 * Contains the forms for managing search sources for news, etc.
 * Also, contains form for managing subsearches which appear in SearchView
 *
 * @author Chris Pollett
 */
class SearchsourcesElement extends Element
{
    /**
     * Renders search source, subsearch forms or renders the results of
     * testing a search source
     *
     * @param array $data available Search sources and subsearches or
     *      feed test results
     */
    public function render($data)
    {
        if ($data['SOURCE_FORM_TYPE'] == "testsource") {
            $this->renderFeedTestResults($data);
        } else {
            $this->renderForms($data);
        }
    }
    /**
     * Renders the results of testing a search source
     *
     * @param array $data available Search sources and subsearches or
     *      feed test results
     */
    public function renderFeedTestResults($data)
    {
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $token_string = C\CSRF_TOKEN . "=" . $data[C\CSRF_TOKEN];
        $pre_base_url = $admin_url . $token_string;
        $base_url = $pre_base_url . "&amp;a=searchSources&amp;" .
            "arg=editsource&amp;ts={$data['ts']}";
        ?>
        <div class="current-activity">
            <div class='float-opposite'><a href='<?= $base_url ?>'><?=
                tl('searchsources_element_editsource_form') ?></a></div>
        <?=$data['FEED_TEST_RESULTS'];?></div>
        <?php
    }
    /**
     * Renders search source and subsearch forms
     *
     * @param array $data available Search sources  and subsearches
     */
    public function renderForms($data)
    {
        $admin_url = htmlentities(B\controllerUrl('admin', true));
        $token_string = C\CSRF_TOKEN . "=" . $data[C\CSRF_TOKEN];
        $pre_base_url = $admin_url . $token_string;
        $base_url = $pre_base_url . "&amp;a=searchSources";
        $localize_url = $pre_base_url . "&amp;a=manageLocales".
            "&amp;arg=editstrings&amp;selectlocale=".$data['LOCALE_TAG'].
            "&amp;previous_activity=searchSources";
        $scrape_feeds = [tl('searchsources_element_channelpath') => 0,
            tl('searchsources_element_item_regex') => 1,
            tl('searchsources_element_titlepath') => 2,
            tl('searchsources_element_descpath') => 3,
            tl('searchsources_element_linkpath') => 4,
            tl('searchsources_element_image_xpath') => 5
        ];
        $type_fields = [
            "rss" => [tl('searchsources_element_image_xpath') => 0 ],
            "json" => $scrape_feeds,
            "html" => $scrape_feeds,
            "regex" => $scrape_feeds,
            "feed_podcast" => [tl('searchsource_element_alt_link_text') => 4,
                tl('searchsources_element_wiki_destination') => 5
            ],
            "scrape_podcast" => [
                tl('searchsources_element_aux_url_xpath') => 0,
                tl('searchsources_element_link_xpath_text') => 4,
                tl('searchsources_element_wiki_destination') => 5],
        ];
        ?>
        <div class="current-activity">
        <?php if ($data["SOURCE_FORM_TYPE"] == "editsource") {
            ?>
            <div class='float-opposite'><a href='<?= $base_url ?>'><?=
                tl('searchsources_element_addsource_form') ?></a></div>
            <h2><?= tl('searchsources_element_edit_media_source')?></h2>
            <?php
        } else {
            ?>
            <h2><?= tl('searchsources_element_add_media_source')?>
            <?= $this->view->helper("helpbutton")->render(
                "Media Sources", $data[C\CSRF_TOKEN]) ?>
            </h2>
            <?php
        }
        ?>
        <form id="addSearchSourceForm" method="post">
        <input type="hidden" name="c" value="admin" />
        <input type="hidden" name="<?= C\CSRF_TOKEN ?>" value="<?=
            $data[C\CSRF_TOKEN] ?>" />
        <input type="hidden" name="a" value="searchSources" />
        <input type="hidden" name="arg" value="<?=
            $data['SOURCE_FORM_TYPE']?>" />
        <?php
        if ($data['SOURCE_FORM_TYPE'] == "editsource") {
            ?>
            <input type="hidden" name="ts" value="<?= $data['ts'] ?>" />
            <?php
        }
        ?>
        <table class="name-table">
        <tr><td><label for="source-type"><b><?=
            tl('searchsources_element_sourcetype')?></b></label></td><td>
            <?php $this->view->helper("options")->render("source-type",
            "type", $data['SOURCE_TYPES'],
                $data['CURRENT_SOURCE']['type']); ?></td></tr>
        <tr><td><label for="source-name"><b><?=
            tl('searchsources_element_sourcename')?></b></label></td><td>
            <input type="text" id="source-name" name="name"
                value="<?=$data['CURRENT_SOURCE']['name'] ?>"
                maxlength="<?= C\LONG_NAME_LEN ?>"
                class="wide-field" <?php
                if ($data["SOURCE_FORM_TYPE"] == "editsource") {
                    e("disabled='disabled'");
                } ?>/></td></tr>
        <tr><td><label for="source-url"><b><?=
            tl('searchsources_element_url')?></b></label></td><td>
            <input type="url" id="source-url" name="source_url"
                value="<?=$data['CURRENT_SOURCE']['source_url'] ?>"
                maxlength="<?=C\MAX_URL_LEN ?>"
                class="wide-field" /></td></tr>
        <tr><td><label for="source-locale-tag"><b id="locale-text"><?=
            tl('searchsources_element_locale_tag')?></b></label></td><td>
            <?php $this->view->helper("options")->render("source-locale-tag",
                "language", $data['LANGUAGES'],
                 $data['CURRENT_SOURCE']['language']); ?></td></tr>
        <tr><td><label for="source-category"><b id="category-text"><?php
            e(tl('searchsources_element_category'));
            $aux_info_len = C\MAX_URL_LEN;
            $num_sub_aux_fields = 6;
            $sub_aux_len = floor(C\MAX_URL_LEN/$num_sub_aux_fields);
            ?></b></label></td><td>
            <input type="text" id="source-category" name="category"
                value="<?= (empty($data['CURRENT_SOURCE']['category'])) ?
                    "news" : $data['CURRENT_SOURCE']['category'] ?>"
                maxlength="<?= $aux_info_len ?>" class="wide-field" /></td></tr>
        <tr><td><label for="source-expires"><b id="expires-text"><?php
            e(tl('searchsources_element_expires'));
            ?></b></label></td><td><?php
            $this->view->helper("options")->render("source-expires",
            "expires", $data['PODCAST_EXPIRES'],
             $data['CURRENT_SOURCE']['category']); ?></td></tr>
        <tr><td colspan="2" class="instruct"><span id='instruct'><?=
            tl('searchsources_element_feed_instruct')
            ?></span><span id='instruct-regex'><?=
            tl('searchsources_element_regex_instruct')
            ?></span></td></tr>
        <tr><td><label for="item-path"><b><span id="aux-url-xpath"><?=
            tl('searchsources_element_aux_url_xpath');
            ?></span><span id="channel-text"><?=
            tl('searchsources_element_channelpath') ?></span></b></label>
            </td><td id='channel-aux'><input type="text"
                id="channel-path" name="channel_path"
                value="<?= $data['CURRENT_SOURCE']['channel_path'] ?>"
                maxlength="<?= $sub_aux_len ?>"
                class="wide-field" /></td></tr>
        <tr><td><label for="item-path"><b id="item-text"><?=
            tl('searchsources_element_item_text') ?></b><b
            id="item-text-regex"><?= tl('searchsources_element_item_regex')
            ?></b></label></td><td>
            <input type="text" id="item-path" name="item_path"
                value="<?=$data['CURRENT_SOURCE']['item_path'] ?>"
                maxlength="<?= $sub_aux_len ?>"
                class="wide-field" /></td></tr>
        <tr><td><label for="title-path"><b id="title-text"><?=
            tl('searchsources_element_titlepath')?></b></label></td><td>
            <input type="text" id="title-path" name="title_path"
                value="<?= $data['CURRENT_SOURCE']['title_path'] ?>"
                maxlength="<?= $sub_aux_len ?>"
                class="wide-field" /></td></tr>
        <tr><td><label for="description-path"><b id="description-text"><?=
            tl('searchsources_element_descpath')?></b></label></td><td>
            <input type="text" id="description-path" name="description_path"
                value="<?= $data['CURRENT_SOURCE']['description_path'] ?>"
                maxlength="<?= $sub_aux_len ?>"
                class="wide-field" /></td></tr>
        <tr><td><label for="date-path"><b><span id="link-text"><?=
            tl('searchsources_element_linkpath')?></span><span
            id='link-xpath-text'><?= tl('searchsources_element_link_xpath_text')
                ?></span><span id='alt-link-text'><?=
                tl('searchsource_element_alt_link_text')
                ?></span></b></label></td><td>
            <input type="text" id="link-path" name="link_path"
                value="<?= $data['CURRENT_SOURCE']['link_path'] ?>"
                maxlength="<?= $sub_aux_len ?>"
                class="wide-field" /></td></tr>
        <tr><td><label for="image-xpath"><b><span id="xpath-text"><?=
            tl('searchsources_element_image_xpath')?></span><span
                id="wiki-page-text"><?=
                tl('searchsources_element_wiki_destination');
                ?></span></b></label></td><td>
            <input type="text" id="image-xpath" name="image_xpath"
                value="<?= $data['CURRENT_SOURCE']['image_xpath'] ?>"
                maxlength="<?=C\MAX_URL_LEN ?>"
                class="wide-field" /></td></tr>
        <tr><td></td><td class="center"><button class="button-box"
            type="submit"><?=tl('searchsources_element_submit')
            ?></button></td></tr>
        </table>
        </form>
        <?php
        $data['FORM_TYPE'] = "";
        $data['TABLE_TITLE'] = tl('searchsources_element_media_sources');
        $data['NO_FLOAT_TABLE'] = true;
        $data['ACTIVITY'] = 'searchSources';
        $data['VIEW'] = $this->view;
        $data['NO_SEARCH'] = true;
        $paging_items = ['SUBstart_row', 'SUBend_row', 'SUBnum_show'];
        $paging1 = "";
        foreach ($paging_items as $item) {
            if (isset($data[strtoupper($item)])) {
                $paging1 .= "&amp;".$item."=".$data[strtoupper($item)];
            }
        }
        $paging2 = "";
        $paging_items = ['start_row', 'end_row', 'num_show'];
        foreach ($paging_items as $item) {
            if (isset($data[strtoupper($item)])) {
                $paging2 .= "&amp;".$item."=".$data[strtoupper($item)];
            }
        }
        $data['PAGING'] = $paging1;
        $this->view->helper("pagingtable")->render($data);
        ?>
        <table class="search-sources-table">
        <tr><th><?= tl('searchsources_element_medianame') ?></th>
            <th colspan="3"><?= tl('searchsources_element_action')
                ?></th></tr><?php
        foreach ($data['MEDIA_SOURCES'] as $source) {
            $encode_source = urlencode(urlencode($source['NAME']));
            $current_aux_fields = empty($type_fields[$source['TYPE']]) ?
                $type_fields['rss']: $type_fields[$source['TYPE']];
            $aux_info_parts = explode("###", $source['AUX_INFO']);
            ?>
            <tr><td><?php
            $is_feed = false;
            if (in_array($source['TYPE'], ["rss", "html", 'json', 'regex'])) {
                $is_feed = true;
                ?><a href="<?=B\subsearchUrl('news', true) . $token_string
                    ?>&amp;q=media:<?=$source['CATEGORY'] ?>:<?=$encode_source
                    ?>"><?=$source['NAME'] ?></a>
                <?php
            } else { ?>
                <b><?= $source['NAME'] ?></b>
                <?php
            }
            ?><br />
                <b><?=tl('searchsources_element_sourcetype'); ?></b>
                <?= $data['SOURCE_TYPES'][$source['TYPE']] ?><br />
                <b><?=tl('searchsources_element_locale_tag'); ?></b>
                <?= $source['LANGUAGE'] ?><br />
                <b><?=($is_feed) ? tl('searchsources_element_category')
                    : tl('searchsources_element_expires'); ?></b>
                <?php
                    if (in_array($source['TYPE'], ["feed_podcast",
                        "scrape_podcast"])) {
                            echo $data['PODCAST_EXPIRES'][$source['CATEGORY']];
                    } else {
                        echo $source['CATEGORY'];
                    }
                ?><br />
                <b><?= tl('searchsources_element_url') ?></b>
                <pre><?= $source['SOURCE_URL']?></pre><?php
                foreach ($current_aux_fields as $aux_name => $aux_index) {
                    ?><b><?=$aux_name ?></b><br />
                    <pre><?= $aux_info_parts[$aux_index]?></pre><?php
                } ?>
            </td>
            <td><a href="<?=$base_url."&amp;arg=testsource&amp;ts=".
                $source['TIMESTAMP'] . $paging1 . $paging2 ?>"><?=
                tl('searchsources_element_testmedia')
            ?></a></td>
            <td><a href="<?=$base_url."&amp;arg=editsource&amp;ts=".
                $source['TIMESTAMP'] . $paging1 . $paging2 ?>"><?=
                tl('searchsources_element_editmedia')
            ?></a></td>
            <td><a onclick='javascript:return confirm("<?=
                tl('searchsources_element_delete_operation') ?>");' href="<?=
                $base_url."&amp;arg=deletesource&amp;ts=".
                $source['TIMESTAMP'] . $paging1 . $paging2 ?>"><?=
                tl('searchsources_element_deletemedia')
            ?></a></td></tr>
            <?php
        } ?>
        </table>
        <?php if ($data["SEARCH_FORM_TYPE"] == "editsubsearch") {
            ?>
            <div id='subsearch-section'
                class='float-opposite'><a href='<?= $base_url ?>'><?=
                tl('searchsources_element_addsearch_form') ?></a></div>
            <h2 id="subsearch-head"><?=
            tl('searchsources_element_edit_subsearch') ?></h2>
            <?php
        } else {
            ?>
            <h2 id="subsearch-head"><?=
                tl('searchsources_element_add_subsearch')?>
            <?= $this->view->helper("helpbutton")->render(
                "Subsearches", $data[C\CSRF_TOKEN]) ?></h2>
            <?php
        }
        ?>
        <form id="SearchSourceForm" method="post" action='#subsearch-head'>
        <input type="hidden" name="c" value="admin" />
        <input type="hidden" name="<?= C\CSRF_TOKEN ?>" value="<?=
            $data[C\CSRF_TOKEN] ?>" />
        <input type="hidden" name="a" value="searchSources" />
        <input type="hidden" name="arg" value="<?=$data['SEARCH_FORM_TYPE']
            ?>" />
        <table class="name-table">
        <tr><td><label for="subsearch-folder-name"><b><?=
            tl('searchsources_element_foldername') ?></b></label></td><td>
            <input type="text" id="subsearch-folder-name" name="folder_name"
                value="<?= $data['CURRENT_SUBSEARCH']['folder_name'] ?>"
                <?php
                if ($data['SEARCH_FORM_TYPE'] == 'editsubsearch') {
                    e("disabled='disabled'");
                }
                ?>
                maxlength="80" class="wide-field" /></td></tr>
        <tr><td><label for="index-source"><b><?=
            tl('searchsources_element_indexsource')?></b></label></td><td>
            <?php $this->view->helper("options")->render("index-source",
            "index_identifier", $data['SEARCH_LISTS'],
                $data['CURRENT_SUBSEARCH']['index_identifier']); ?></td></tr>
        <tr>
        <td class="table-label"><label for="per-page"><b><?=
            tl('searchsources_element_per_page') ?></b></label></td>
            <td><?php
            $this->view->helper("options")->render("per-page", "per_page",
                $data['PER_PAGE'], $data['CURRENT_SUBSEARCH']['per_page']); ?>
        </td></tr>
        <tr><td></td><td class="center"><button class="button-box"
            type="submit"><?= tl('searchsources_element_submit')
            ?></button></td></tr>
        </table>
        </form>
        <?php
        $data['SUBFORM_TYPE'] = "";
        $data['TABLE_TITLE'] = tl('searchsources_element_subsearches');
        $data['TARGET_FRAGMENT'] = "subsearch-head";
        $data['NO_FLOAT_TABLE'] = true;
        $data['ACTIVITY'] = 'searchSources';
        $data['VIEW'] = $this->view;
        $data['VAR_PREFIX'] = "SUB";
        $data['PAGING'] = $paging2;
        $this->view->helper("pagingtable")->render($data);
        ?>
        <table class="search-sources-table">
        <tr><th><?= tl('searchsources_element_dirname') ?></th>
            <th><?= tl('searchsources_element_index') ?></th>
            <?php
            if (!$_SERVER["MOBILE"]) { ?>
                <th><?=tl('searchsources_element_localestring') ?></th>
                <th><?= tl('searchsources_element_perpage') ?></th>
                <?php
            }
            ?>
            <th colspan="3"><?= tl('searchsources_element_actions')?></th></tr>
        <?php
        foreach ($data['SUBSEARCHES'] as $search) {
            if(empty($data["SEARCH_LISTS"][trim($search['INDEX_IDENTIFIER'])])){
                continue;
            }
        ?>
        <tr><td><b><?=$search['FOLDER_NAME'] ?></b></td>
            <td><?= "<b>" .
                $data["SEARCH_LISTS"][trim($search['INDEX_IDENTIFIER'])] .
                "</b><br />".$search['INDEX_IDENTIFIER'] ?></td><?php
            if (!$_SERVER["MOBILE"]) {
                ?>
                <td><?= $search['LOCALE_STRING'] ?></td>
                <td><?= $search['PER_PAGE'] ?></td><?php
            }
            ?>
            <td><a href="<?=$base_url."&amp;arg=editsubsearch&amp;fn=".
                $search['FOLDER_NAME'].$paging1.$paging2.
                "#subsearch-section" ?>"><?=
                tl('searchsources_element_editsource')
            ?></a></td>
            <td><?php
            if ($data['CAN_LOCALIZE']) { ?>
                <a href='<?=$localize_url."&amp;filter=".
                    $search['LOCALE_STRING']
                    ?>' ><?=tl('searchsources_element_localize')?></a><?php
            } else { ?>
                <span class="gray"><?= tl('searchsources_element_localize')
                ?></span><?php
            }
            ?>
            </td>
            <td><a onclick='javascript:return confirm("<?=
                tl('searchsources_element_delete_operation') ?>");'
                href="<?=$base_url.'&amp;arg=deletesubsearch&amp;fn='.
                $search['FOLDER_NAME'].$paging1.$paging2 ?>"><?=
                tl('searchsources_element_deletesubsearch')
            ?></a></td></tr>
        <?php
        } ?>
        </table>
        </div>
        <script>
        <?php
        $channel_string = json_encode(
            html_entity_decode($data['CURRENT_SOURCE']['channel_path']));
        ?>
        function switchSourceType()
        {
            var stype = elt("source-type");
            channel_string = <?= $channel_string ?>;
            channel_inner = '<input type="text"' +
                'id="channel-path" name="channel_path" '+
                'value="' + channel_string + '" ' +
                'maxlength="<?= $sub_aux_len ?>" ' +
                'class="wide-field" />';
            aux_inner = '<textarea class="short-text-area" ' +
                'id="channel-path" name="channel_path">' +
                channel_string +'</textarea>';
            stype = stype.options[stype.selectedIndex].value;
            if (stype == "html" || stype == 'json' || stype == 'regex') {
                setDisplay("source-thumbnail", false);
                if (stype == 'regex') {
                    setDisplay("instruct-regex", true);
                    setDisplay("item-text-regex", true);
                    setDisplay("item-text", false);
                    setDisplay("instruct", false);
                } else {
                    setDisplay("instruct-regex", false);
                    setDisplay("item-text-regex", false);
                    setDisplay("item-text", true);
                    setDisplay("instruct", true);
                }
                setDisplay("channel-text", true);
                elt('channel-aux').innerHTML = channel_inner;
                setDisplay("aux-url-xpath", false);
                setDisplay("wiki-page-text", false);
                setDisplay("channel-path", true);
                setDisplay("item-path", true);
                setDisplay("title-text", true);
                setDisplay("title-path", true);
                setDisplay("description-text", true);
                setDisplay("description-path", true);
                setDisplay("category-text", true);
                setDisplay("source-category", true);
                setDisplay("expires-text", false);
                setDisplay("source-expires", false);
                setDisplay("link-text", true);
                setDisplay("link-xpath-text", false);
                setDisplay("alt-link-text", false);
                setDisplay("link-path", true);
                setDisplay("xpath-text", true);
                setDisplay("image-xpath", true);
                setDisplay("locale-text", true);
                setDisplay("source-locale-tag", true);
                if (elt('source-category').value == "") {
                    elt('source-category').value = "news";
                }
            } else if (stype == "feed_podcast") {
                setDisplay("source-thumbnail", false);
                setDisplay("instruct", false);
                setDisplay("instruct-regex", false);
                setDisplay("channel-text", false);
                setDisplay("wiki-page-text", true);
                setDisplay("aux-url-xpath", false);
                setDisplay("channel-path", false);
                setDisplay("item-text", false);
                setDisplay("item-text-regex", false);
                setDisplay("item-path", false);
                setDisplay("title-text", false);
                setDisplay("title-path", false);
                setDisplay("description-text", false);
                setDisplay("description-path", false);
                setDisplay("category-text", false);
                setDisplay("source-category", false);
                setDisplay("expires-text", true);
                setDisplay("source-expires", true);
                setDisplay("link-text", false);
                setDisplay("link-xpath-text", false);
                setDisplay("alt-link-text", true);
                setDisplay("link-path", true);
                setDisplay("xpath-text", false);
                setDisplay("image-xpath", true);
                setDisplay("locale-text", true);
                setDisplay("source-locale-tag", true);
                elt('source-category').value = "";
            }  else if (stype == "scrape_podcast") {
                setDisplay("source-thumbnail", false);
                setDisplay("instruct", false);
                setDisplay("instruct-regex", false);
                setDisplay("channel-text", false);
                setDisplay("wiki-page-text", true);
                setDisplay("aux-url-xpath", true);
                elt('channel-aux').innerHTML = aux_inner;
                setDisplay("channel-path", true);
                setDisplay("item-text", false);
                setDisplay("item-text-regex", false);
                setDisplay("item-path", false);
                setDisplay("title-text", false);
                setDisplay("title-path", false);
                setDisplay("description-text", false);
                setDisplay("description-path", false);
                setDisplay("category-text", false);
                setDisplay("source-category", false);
                setDisplay("expires-text", true);
                setDisplay("source-expires", true);
                setDisplay("link-text", false);
                setDisplay("link-xpath-text", true);
                setDisplay("alt-link-text", false);
                setDisplay("link-path", true);
                setDisplay("xpath-text", false);
                setDisplay("image-xpath", true);
                setDisplay("locale-text", true);
                setDisplay("source-locale-tag", true);
                elt('source-category').value = "";
            } else {
                setDisplay("source-thumbnail", false);
                setDisplay("instruct", true);
                setDisplay("instruct-regex", false);
                setDisplay("channel-text", false);
                setDisplay("wiki-page-text", false);
                setDisplay("aux-url-xpath", false);
                setDisplay("channel-path", false);
                setDisplay("item-text", false);
                setDisplay("item-text-regex", false);
                setDisplay("item-path", false);
                setDisplay("title-text", false);
                setDisplay("title-path", false);
                setDisplay("description-text", false);
                setDisplay("description-path", false);
                setDisplay("category-text", true);
                setDisplay("source-category", true);
                setDisplay("expires-text", false);
                setDisplay("source-expires", false);
                setDisplay("link-text", false);
                setDisplay("link-xpath-text", false);
                setDisplay("alt-link-text", false);
                setDisplay("link-path", false);
                setDisplay("xpath-text", true);
                setDisplay("image-xpath", true);
                setDisplay("locale-text", true);
                setDisplay("source-locale-tag", true);
                if (elt('source-category').value == "") {
                    elt('source-category').value = "news";
                }
            }
        }
        </script>
    <?php
    }
}

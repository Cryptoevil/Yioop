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
use seekquarry\yioop\library as L;

/**
 * Class to draw statistics and charts about trending news feed terms
 *
 * @author Chris Pollett
 */
class TrendingElement extends Element
{
    /**
     * Used to draw either trending news feed term scores or charts
     *
     * @param array $data contains stats to draw
     */
    public function render($data)
    {
        if (empty($data['CHART_DATA'])) {
            $this->renderHourlyDailyWeekly($data);
        } else {
            $this->renderTermChart($data);
        }
    }
    /**
     * Used to draw top NUM_TRENDING hourly, daily, weekly term scores
     *
     * @param array $data contains stats to draw
     */
    public function renderHourlyDailyWeekly($data)
    {
        $logged_in = isset($data["ADMIN"]) && $data["ADMIN"];
        $date_map = [
            C\ONE_HOUR => tl('trending_element_hourly'),
            C\ONE_DAY => tl('trending_element_daily'),
            C\ONE_WEEK => tl('trending_element_weekly'),
        ];
        $token = ($logged_in) ? $data[C\CSRF_TOKEN] : "";
        $token_string_amp = ($logged_in) ?
            C\CSRF_TOKEN . "=" . $data[C\CSRF_TOKEN]."&amp;" : "";
        ?><h2 class="trending"><?=tl('trending_element_trending_terms');
            ?></h2><?php
        if(isset($data['TREND_DATA'])) {
            ?><div class="trending-container"><?php
            foreach($data['TREND_DATA'] as $period => $occurrences) { ?>
                <div class="trending-float">
                    <p><b><?=$date_map[$period]?></b></p>
                    <table class="trending-table">
                        <tr class="trending-tr">
                        <th class="trending-th"> <?=
                            tl('trending_element_term')?></th>
                        <th class="trending-th"><?=
                            tl('trending_element_score'); ?></th>
                        </tr><?php
                    foreach($occurrences as $item) { ?>
                        <tr>
                        <td class="trending-th"><a href="<?=
                            B\subsearchURL("news" , true) . $token_string_amp .
                            "q=" . $item['TERM'] ?>"><?=
                            $item['TERM']?></a></td><?php
                        if ($period == C\ONE_HOUR) {
                            ?><td class="trending-th"><?=
                            number_format($item['OCCURRENCES'], 2);?></td>
                            <?php
                        } else {
                            ?><td class="trending-th"><a href="<?=
                            B\directUrl("trending", true) .
                            $token_string_amp . "arg=chart&" .
                            "period=$period&term=" . urlencode($item['TERM']);
                            ?>"><?=
                            number_format($item['OCCURRENCES'], 2);?></a></td>
                            <?php
                        } ?>
                        </tr>
                        <?php
                } ?></table>
                </div>
                <?php
            } ?>
            </div>
            <div class="trending-footer" ><b><?=
                tl('trending_element_date', date('r')) ?></b></div><?php
        }
    }
    /**
     * Used to draw a chart of term scores for a time period
     *
     * @param array $data contains chart info about term
     */
    public function renderTermChart($data)
    {
        $title_map = [
            C\ONE_DAY => tl('trending_element_hourly_trend', $data['TERM']),
            C\ONE_WEEK => tl('trending_element_daily_trend', $data['TERM']),
        ];
        ?><h2 class="trending"><?=$title_map[$data['PERIOD']]; ?></h2>
        <div id="chart"></div>
        <div class="trending-footer" ><b><?=
            tl('trending_element_date', date('r')) ?></b></div><?php
    }
}

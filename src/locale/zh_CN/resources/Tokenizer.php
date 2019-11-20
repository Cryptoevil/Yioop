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
 * @author Chris Pollett chris@pollett.org
 * @license https://www.gnu.org/licenses/ GPL3
 * @link https://www.seekquarry.com/
 * @copyright 2009 - 2019
 * @filesource
 */
namespace seekquarry\yioop\locale\zh_CN\resources;

use seekquarry\yioop\library\PhraseParser;

/**
 * Chinese specific tokenization code. Typically, tokenizer.php
 * either contains a stemmer for the language in question or
 * it specifies how many characters in a char gram
 *
 * @author Chris Pollett
 */

class Tokenizer
{
    /**
     * A list of frequently occurring terms for this locale which should
     * be excluded from certain kinds of queries. This is also used
     * for language detection
     * @array
     */
    public static $stop_words = ['一', '人', '里', '会', '没', '她', '吗', '去',
        '也', '有', '这', '那', '不', '什', '个', '来', '要', '就', '我', '你',
        '的', '是', '了', '他', '么', '们', '在', '说', '为', '好', '吧', '知道',
        '我的', '和', '你的', '想', '只', '很', '都', '对', '把', '啊', '怎', '得',
        '还', '过', '不是', '到', '样', '飞', '远', '身', '任何', '生活', '够',
        '号', '兰', '瑞', '达', '或', '愿', '蒂', '別', '军', '正', '是不是',
        '证', '不用', '三', '乐', '吉', '男人', '告訴', '路', '搞', '可是',
        '与', '次', '狗', '决', '金', '史', '姆', '部', '正在', '活', '刚',
        '回家', '贝', '如何', '须', '战', '不會', '夫', '喂', '父', '亚', '肯定',
        '女孩', '世界'];
    /**
     * Removes the stop words from the page (used for Word Cloud generation
     * and language detection)
     *
     * @param mixed $data either a string or an array of string to remove
     *      stop words from
     * @return mixed $data with no stop words
     */
    public static function stopwordsRemover($data)
    {
        static $pattern = "";
        if (empty($pattern)) {
            $pattern = '/(' . implode('|', self::$stop_words) . ')/u';
        }
        $data = preg_replace($pattern, '', $data);
        return $data;
    }
    /**
     * A word segmenter.
     * Such a segmenter on input thisisabunchofwords would output
     * this is a bunch of words
     *
     * @param string $pre_segment  before segmentation
     * @return string with words separated by space
     */
    public static function segment($pre_segment)
    {
        return PhraseParser::reverseMaximalMatch($pre_segment, "zh-CN",
            ['/\d+/', '/[a-zA-Z]+/']);
    }
}

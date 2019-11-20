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
namespace seekquarry\yioop\tests;

use seekquarry\yioop\configs as C;
use seekquarry\yioop\library as L;
use seekquarry\yioop\library\CrawlConstants;
use seekquarry\yioop\library\IndexShard;
use seekquarry\yioop\library\LinearAlgebra as LA;
use seekquarry\yioop\library\UnitTest;

/**
 * Used to test that the IndexShard class can properly add new documents
 * and retrieve those documents by word. Checks that doc offsets can be
 * updated, shards can be saved and reloaded
 *
 * @author Chris Pollett
 */
class IndexShardTest extends UnitTest
{
    /**
     * Construct some index shard we can add documents to
     */
    public function setUp()
    {
        $this->test_objects['shard'] = new IndexShard(C\WORK_DIRECTORY.
            "/shard.txt", 0);
        $this->test_objects['shard2'] = new IndexShard(C\WORK_DIRECTORY.
            "/shard2.txt", 0);
        $this->test_objects['shard3'] = new IndexShard(C\WORK_DIRECTORY.
            "/shard3.txt", 0);
    }
    /**
     * Deletes any index shard files we may have created
     */
    public function tearDown()
    {
        set_error_handler(null);
        @unlink(C\WORK_DIRECTORY."/shard.txt");
        @unlink(C\WORK_DIRECTORY."/shard2.txt");
        @unlink(C\WORK_DIRECTORY."/shard3.txt");
        set_error_handler(C\NS_CONFIGS . "yioop_error_handler");
    }
    /**
     * Check if can store documents into an index shard and retrieve them
     */
    public function addDocumentsGetPostingsSliceByIdTestCase()
    {
        $docid = "AAAAAAAA";
        $doc_hash = "BBBBBBBB";
        $doc_hosts_url = "CCCCCCCC";
        $docid .= $doc_hash . $doc_hosts_url;
        $offset = 5;
        $word_counts = [
            'BBBBBBBB' => [1, 3],
            'CCCCCCCC' => [4, 9, 16],
            'DDDDDDDD' => [5, 25, 125],
        ];
        $meta_ids = ["EEEEEEEE", "FFFFFFFF"];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_counts, $meta_ids, ["EEEEEEEE"], true);
        $this->assertEqual($this->test_objects['shard']->len_all_docs, 8,
            "Len All Docs Correctly Counts Length of First Doc");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('CCCCCCCC', true), 5);
        $this->assertTrue(isset($c_data[$docid]),
            "Doc lookup by word works");
        // add a second document and check
        $docid = "HHHHHHHH";
        $doc_hash = "IIIIIIII";
        $doc_hosts_url = "JJJJJJJJ";
        $docid .= $doc_hash. $doc_hosts_url;
        $offset = 7;
        $word_counts = [
            'CCCCCCCC' => [1, 4, 9],
            'GGGGGGGG' => [6],
        ];
        $meta_ids = ["YYYYYYYY"];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_counts, $meta_ids, [], true);
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('CCCCCCCC', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Work lookup first item of two works");
        $this->assertTrue(isset($c_data["HHHHHHHHIIIIIIIIJJJJJJJJ"]),
            "Work lookup second item of two works");
        $this->assertEqual(count($c_data), 2,
            "Exactly two items were found in two item case");
        //add a meta word lookup
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('EEEEEEEE', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Doc lookup by meta word works");
        $this->assertEqual(count($c_data), 1,
            "Doc lookup by meta word works has correct count");
        // add a third document and check
        $docid = "KKKKKKKK";
        $doc_hash = "LLLLLLLL";
        $doc_hosts_url = "MMMMMMMM";
        $docid .= $doc_hash. $doc_hosts_url;
        $offset = 10;
        $word_counts = [
            'BBBBBBBB' => [1, 3],
            'DDDD' => [1, 4, 9],
            'GG' => [6],
        ];
        $meta_ids = ["YYYYYYYY"];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_counts, $meta_ids, [], true);
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('BBBBBBBB', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Doc lookup by meta word works");
        $this->assertTrue(isset($c_data["KKKKKKKKLLLLLLLLMMMMMMMM"]),
            "Doc lookup by meta word works");
        $this->assertEqual(count($c_data), 2,
            "Doc lookup by meta word works has correct count");
    }
    /**
     * Check if can store link documents into an index shard and retrieve them
     */
    public function addLinkGetPostingsSliceByIdTestCase()
    {
        $docid = "AAAAAAAABBBBBBBBCCCCCCCC"; //set up link doc
        $offset = 5;
        $word_counts = [
            'MMMMMMMM' => [1, 3, 5],
            'NNNNNNNN' => [2, 4, 6],
            'OOOOOOOO' => [7, 8, 9],
        ];
        $meta_ids = ["PPPPPPPP", "QQQQQQQQ"];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_counts, $meta_ids);
        $this->assertEqual($this->test_objects['shard']->len_all_link_docs, 9,
            "Len All Docs Correctly Counts Length of First Doc");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('MMMMMMMM', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Link Doc lookup by word works");
        $docid = "AAAAAAAA";
        $doc_hash = "BBBBBBBB";
        $docid .= $doc_hash."EEEEEEEE";
        $offset = 10;
        $word_counts = [
            'BBBBBBBB' => [1],
            'CCCCCCCC' => [2],
            'MMMMMMMM' => [6],
        ];
        $meta_ids = ["EEEEEEEE", "FFFFFFFF"];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_counts, $meta_ids, true);
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('MMMMMMMM', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Link Doc lookup by word works 1st of two");
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBEEEEEEEE"]),
            "Link Doc lookup by word works 2nd doc");
        $this->assertEqual(count($c_data), 2,
            "Link Doc lookup by word works has correct count");
        $docid = "AAAAAAAA";
        $doc_hash = "BBBBBBBB";
        $docid .= $doc_hash."GGGGGGGG";
        $offset = 21;
        $word_counts = [
            'DDDDDDDD' => [1, 4],
            'LLLLLLLL' => [7, 9],
            'NNNNNNNN' => [2],
        ];
        $meta_ids = ["EEEEEEEE", "FFFFFFFF"];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_counts, $meta_ids, true);
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('NNNNNNNN', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Link Doc lookup by word works 1st of two");
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBGGGGGGGG"]),
            "Link Doc lookup by word works 2nd doc");
            $this->assertFalse(isset($c_data["AAAAAAAABBBBBBBBEEEEEEEE"]),
            "Link Doc lookup should not have third document");
        $this->assertEqual(count($c_data), 2,
            "Link Doc lookup by word works has correct count");
    }
    /**
     * Check that appending two index shards works correctly
     */
    public function appendIndexShardTestCase()
    {
        $docid = "AAAAAAAA"; //it actually shouldn't matter if have one or more
            // 8 byte doc_keys, both should be treated as documents
        $offset = 5;
        $word_lists = [
            'BBBBBBBB' => [1],
            'CCCCCCCC' => [2],
            'DDDDDDDD' => [6],
        ];
        $meta_ids = ["EEEEEEEE", "FFFFFFFF"];
        //adding a document to the first shard
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids, true);
        $docid = "KKKKKKKKGGGGGGGGHHHHHHHH";
        $offset = 20;
        $word_lists = [
            'ZZZZZZZZ' => [9],
            'DDDDDDDD' => [4],
        ];
        $meta_ids = [];
        //adding a document to the second shard
        $this->test_objects['shard2']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $docid = "GGGGGGGG";
        $offset = 6;
        $word_lists = [
            'DDDDDDDD' => [3],
            'IIIIIIII' => [4],
            'JJJJJJJJ' => [5],
        ];
        $meta_ids = ["KKKKKKKK"];
        //adding another document to the second shard
        $this->test_objects['shard2']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $this->test_objects['shard']->appendIndexShard(
            $this->test_objects['shard2']);
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('BBBBBBBB', true), 5);
        $tmp = array_keys($c_data);
        $this->assertTrue(isset($c_data["AAAAAAAA"]),
            "Data from first shard present 1");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('CCCCCCCC', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAA"]),
            "Data from first shard present 2");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('DDDDDDDD', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAA"]),
            "Data from first shard present 3");
        $this->assertTrue(isset($c_data["KKKKKKKKGGGGGGGGHHHHHHHH"]),
            "Data from second shard present 1");
        $this->assertTrue(isset($c_data["GGGGGGGG"]),
            "Data from third shard present 1");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('EEEEEEEE', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAA"]),
            "Data from first shard present 4");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('FFFFFFFF', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAA"]),
            "Data from first shard present 5");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('ZZZZZZZZ', true), 5);
        $this->assertTrue(isset($c_data["KKKKKKKKGGGGGGGGHHHHHHHH"]),
            "Data from second shard present 2");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('IIIIIIII', true), 5);
        $this->assertTrue(isset($c_data["GGGGGGGG"]),
            "Data from third shard present 2");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('JJJJJJJJ', true), 5);
        $this->assertTrue(isset($c_data["GGGGGGGG"]),
            "Data from third shard present 3");
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('KKKKKKKK', true), 5);
        $this->assertTrue(isset($c_data["GGGGGGGG"]),
            "Data from third shard present 4");
        $docid = "HHHHHHHHDDDDDDDD";
        $offset = 50;
        $word_lists = [
            'YYYYYYYY' => [3, 7],
        ];
        $meta_ids = [];
        //adding a document to the third shard
        $this->test_objects['shard3']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $this->test_objects['shard']->appendIndexShard(
            $this->test_objects['shard3']);
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('YYYYYYYY', true), 5);
        $this->assertTrue(isset($c_data["HHHHHHHHDDDDDDDD"]),
            "Data from third shard present 5");
    }
    /**
     * Check that changing document offsets works
     */
    public function changeDocumentOffsetTestCase()
    {
        $docid = "AAAAAAAASSSSSSSS";
        $offset = 0;
        $word_lists = [
            'BBBBBBBB' => [1]
        ];
        $meta_ids = [];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $docid = "AAAAAAAAEEEEEEEEFFFFFFFF";
        $offset = 0;
        $word_lists = [
            'BBBBBBBB' => [1]
        ];
        $meta_ids = [];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $docid = "CCCCCCCCFFFFFFFF";
        $offset = 0;
        $word_lists = [
            'BBBBBBBB' => [1],
            'ZZZZZZZZ' => [1]
        ];
        $meta_ids = [];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $docid = "QQQQQQQQEEEEEEEEFFFFFFFF";
        $offset = 0;
        $word_lists = [
            'BBBBBBBB' => [1]
        ];
        $meta_ids = [];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $docid = "DDDDDDDD";
        $offset = 0;
        $word_lists = [
            'BBBBBBBB' => [1]
        ];
        $meta_ids = [];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $new_doc_offsets = [
            "AAAAAAAASSSSSSSS" => 5,
            "AAAAAAAAEEEEEEEEFFFFFFFF" => 10,
            "QQQQQQQQEEEEEEEEFFFFFFFF" => 9,
            "DDDDDDDD" => 7,
        ];
        $this->test_objects['shard']->changeDocumentOffsets($new_doc_offsets);
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('BBBBBBBB', true), 5);
        $predicted_offsets = [
            "AAAAAAAASSSSSSSS" => 5,
            "CCCCCCCCFFFFFFFF" => 0,
            "AAAAAAAAEEEEEEEEFFFFFFFF" => 10,
            "QQQQQQQQEEEEEEEEFFFFFFFF" => 9,
            "DDDDDDDD" => 7,
        ];
        $i = 0;
        foreach ($predicted_offsets as $key =>$offset) {
            $this->assertTrue(isset($c_data[$key]),
                "Summary key matches predicted $key");
            $this->assertEqual($c_data[$key][CrawlConstants::SUMMARY_OFFSET],
                $offset,  "Summary offset matches predicted offset $offset");
            $i++;
        }
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('ZZZZZZZZ', true), 5);
        $this->assertEqual($c_data['CCCCCCCCFFFFFFFF']
                [CrawlConstants::SUMMARY_OFFSET],
                0,  "Summary offset matches predicted second word");
        // adding new document after changing offset once
        $docid = "AAAAAAAASSSSSSSD";
        $offset = 0;
        $word_lists = [
            'BBBBBBBB' => [1]
        ];
        $meta_ids = [];
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_lists, $meta_ids);
        $new_doc_offsets = [
            "QQQQQQQQEEEEEEEEFFFFFFFF" => 10,
            "DDDDDDDD" => 6,
        ];
        $this->test_objects['shard']->changeDocumentOffsets($new_doc_offsets);
        $c_data = $this->test_objects['shard']->getPostingsSliceById(
            L\crawlHashWord('BBBBBBBB', true), 6);
        $predicted_offsets = [
            "AAAAAAAASSSSSSSS" => 5,
            "CCCCCCCCFFFFFFFF" => 0,
            "AAAAAAAAEEEEEEEEFFFFFFFF" => 10,
            "QQQQQQQQEEEEEEEEFFFFFFFF" => 10,
            "DDDDDDDD" => 6,
        ];
        foreach ($predicted_offsets as $key =>$offset) {
            $this->assertTrue(isset($c_data[$key]),
                "Summary key matches predicted $key");
            $this->assertEqual($c_data[$key][CrawlConstants::SUMMARY_OFFSET],
                $offset,  "Summary offset matches predicted offset $offset");
            $i++;
        }
    }
    /**
     * Used to test the functions related to add auxiliary document keys
     * the document key of a document in an IndexShard.
     */
    public function documentKeyTestCase()
    {
        $shard = $this->test_objects['shard'];
        $to_pack = [99, 5, 12];
        $packed = $shard->packValues($to_pack);
        $unpacked = $shard->unpackValues($packed);
        $this->assertEqual($unpacked[0], $to_pack,
            "Pack unpack array int values no offset");
        $this->assertEqual($unpacked[1], 8,
            "Pack unpack array int values with 0 offset offset correct");
        $unpacked = $shard->unpackValues("\x00\x00". $packed, 2);
        $this->assertEqual($unpacked[0], $to_pack,
            "Pack unpack array int values with offset");
        $this->assertEqual($unpacked[1], 10,
            "Pack unpack array int values with 2 offset offset correct");
        $to_pack = [.1, .3, .55, .66, .2];
        $packed = $shard->packValues($to_pack, "f");
        $unpacked = $shard->unpackValues($packed, 0, "f");
        $this->assertTrue(LA::distance($unpacked[0], $to_pack) < 0.01,
            "Pack unpack array float values no offset");
        $this->assertEqual($unpacked[1], 12,
            "Pack unpack array float values with 0 offset offset correct");
        $unpacked = $shard->unpackValues("\x00\x00". $packed, 2, 'f');
        $this->assertTrue(LA::distance($unpacked[0], $to_pack) < 0.01,
            "Pack unpack array float values with offset");
        $this->assertEqual($unpacked[1], 14,
            "Pack unpack array float values with 2 offset offset correct");
        $description_scores = [10 => .3, 21 => .1, 198 => .55];
        $user_ranks = [.88, .99, .77];
        $packed = $shard->packAuxiliaryDocumentKeys($description_scores,
            $user_ranks);
        $unpacked = $shard->unpackAuxiliaryDocumentKeys($packed);
        $this->assertEqual(array_keys($unpacked[0]),
            array_keys($description_scores),
            "Description score positions match after pack unpack");
        $this->assertTrue(LA::distance($unpacked[0],$description_scores) < 0.01,
            "Description scores close after pack unpack");
        $this->assertTrue(LA::distance($unpacked[1], $user_ranks) < 0.01,
            "User ranks close after pack unpack");
        $description_scores = [];
        $packed = $shard->packAuxiliaryDocumentKeys($description_scores,
            $user_ranks);
        $unpacked = $shard->unpackAuxiliaryDocumentKeys($packed);
        $this->assertEqual(array_keys($unpacked[0]),
            array_keys($description_scores),
            "Empty description score positions match after pack unpack");
        $this->assertTrue(LA::distance($unpacked[0],$description_scores) < 0.01,
            "Empty description scores close after pack unpack");
        $this->assertTrue(LA::distance($unpacked[1], $user_ranks) < 0.01,
            "User ranks close after pack unpack empty description score case");
        $description_scores = [10 => .3, 21 => .1, 198 => .55];
        $user_ranks = [];
        $packed = $shard->packAuxiliaryDocumentKeys($description_scores,
            $user_ranks);
        $unpacked = $shard->unpackAuxiliaryDocumentKeys($packed);
        $this->assertEqual(array_keys($unpacked[0]),
            array_keys($description_scores), "Description score positions ".
            "match after pack unpack, empty user rank");
        $this->assertTrue(LA::distance($unpacked[0],$description_scores) < 0.01,
            "Description scores close after pack unpack, empty user rank");
        $this->assertTrue(LA::distance($unpacked[1], $user_ranks) < 0.01,
            "User ranks empty after pack unpack empty user rank case");
        $description_scores = [];
        $user_ranks = [];
        $packed = $shard->packAuxiliaryDocumentKeys($description_scores,
            $user_ranks);
        $unpacked = $shard->unpackAuxiliaryDocumentKeys($packed);
        $this->assertEqual(array_keys($unpacked[0]),
            array_keys($description_scores), "Description score positions ".
            "match after pack unpack, empty all case");
        $this->assertTrue(LA::distance($unpacked[0],$description_scores) < 0.01,
            "Description scores close after pack unpack, empty all case");
        $this->assertTrue(LA::distance($unpacked[1], $user_ranks) < 0.01,
            "User ranks empty after pack unpack empty all case");
    }
    /**
     * Check that save and load work
     */
    public function saveLoadTestCase()
    {
        $docid = "AAAAAAAABBBBBBBBCCCCCCCC";
        $offset = 5;
        $word_counts = [
            'BBBBBBBB' => [1],
            'CCCCCCCC' => [2],
            'DDDDDDDD' => [6],
        ];
        $meta_ids = ["EEEEEEEE", "FFFFFFFF"];
        //test saving and loading to a file
        $this->test_objects['shard']->addDocumentWords($docid,
            $offset, $word_counts, $meta_ids, true);
        $this->test_objects['shard']->save();
        $this->test_objects['shard2'] = IndexShard::load(C\WORK_DIRECTORY.
            "/shard.txt");
        $word_info = $this->test_objects['shard']->getWordInfo(
            L\crawlHashWord('FFFFFFFF'));
        $this->assertEqual($this->test_objects['shard2']->len_all_docs, 3,
            "Len All Docs Correctly Counts Length of First Doc");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('BBBBBBBB', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Doc lookup by word works");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('CCCCCCCC', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Doc lookup 2 by word works");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('DDDDDDDD', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Doc lookup 2 by word works");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('EEEEEEEE', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Doc lookup 2 by word works");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('FFFFFFFF', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Doc lookup 2 by word works");
        // test saving and loading from a string
        $out_string = $this->test_objects['shard']->save(true);
        $this->test_objects['shard2'] = IndexShard::load("shard.txt",
            $out_string);
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('BBBBBBBB', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "String Load Doc lookup by word works");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('CCCCCCCC', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "String Load Doc lookup 2 by word works");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('DDDDDDDD', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "String Load Doc lookup 2 by word works");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('EEEEEEEE', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "String Load Doc lookup 2 by word works");
        $c_data = $this->test_objects['shard2']->getPostingsSliceById(
            L\crawlHashWord('FFFFFFFF', true), 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "String Load Doc lookup 2 by word works");
        // Check if save without dictionary preserves postings
        $word_info = $this->test_objects['shard']->getWordInfo(
            L\crawlHashWord('FFFFFFFF'));
        $this->test_objects['shard']->saveWithoutDictionary();
        $shard = new IndexShard(C\WORK_DIRECTORY .
            "/shard.txt", 0, C\NUM_DOCS_PER_GENERATION, true);
        $c_data = $shard->getPostingsSlice($word_info[0],
            $word_info[0], $word_info[1], 5);
        $this->assertTrue(isset($c_data["AAAAAAAABBBBBBBBCCCCCCCC"]),
            "Save without dictionary test works");
    }
}

<?php
/**
 * learn the function str_getcsv
 * load csv string into an array.
 * 
 */

use PHPUnit\Framework\TestCase;

class StrGetcsvTest extends TestCase {

    public function testBasicParseCSV() {

        $csvString = "abc,1,,3,again,";

        $result = str_getcsv($csvString);

        // the result should be an array.
        $this->assertTrue(gettype($result) === "array");

        // check the size of the array.
        $this->assertEquals(count($result), 6);

        // verify value of the first column
        $this->assertEquals($result[0], 'abc');
        // each column will be string type.
        $this->assertEquals($result[1], '1');
        // empty column will be null
        $this->assertEquals($result[2], null);

        // we could use empty function to check.
        $this->assertTrue(empty($result[2]));
        $this->assertTrue(empty($result[5]));
    }


    /**
     * try to convert CSV to key/value array.
     */
    function testCSV2KeyValue() {

        $rankingFile = '/usr/rd/AgentReva/files/ranking/NeighbourhoodData.csv';

        $rankingCSV = file_get_contents($rankingFile);
        $rankingsRows = preg_split('/\n\r|\n|\r/', $rankingCSV);
        $rankings = [];
        // shit the first row, which is header.
        array_shift($rankingsRows);
        foreach($rankingsRows as $row) {
            $rankingRow = str_getcsv($row);
            $rankings[$rankingRow[0]] = $row;
        }

        var_dump($rankings);
    }
}

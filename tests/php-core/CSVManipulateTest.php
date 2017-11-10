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
}

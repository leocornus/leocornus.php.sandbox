<?php
/**
 * test how PHP handle and manipulate numbers.
 *
 * - convert string to number, integer, float, etc.
 * - formating a number.
 *
 */

use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase {

    public function testNumberFormat() {

        $strNumber = "325000.0000000";

        // string to float.
        $floatNumber = floatval($strNumber);

        // format number.
        $formatNumber = number_format($floatNumber, 2);


        // check the formated number.
        $this->assertEquals($formatNumber, "325,000.00");
    }
}

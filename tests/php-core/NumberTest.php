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

    /**
     * number_format will handle float number decimals and
     * some current format.
     */
    public function testNumberFormat() {

        $strNumber = "325000.0000000";

        // string to float.
        $floatNumber = floatval($strNumber);

        // format number.
        $formatNumber = number_format($floatNumber, 2);
        // check the formated number.
        $this->assertEquals($formatNumber, "325,000.00");

        // format number to integer.
        $formatNumber = number_format($floatNumber, 0);
        $this->assertEquals($formatNumber, "325,000");
    }

    /**
     * using str_pad to adding 0 in front of an integer.
     *
     */
    public function testStringPad() {

        // the input number.
        $numbers = [1, 12, 123];

        // the formated result.
        $formatted = [];

        foreach($numbers as $number) {
            // adding leading 0 
            $formatted[] = str_pad($number, 3, "0", STR_PAD_LEFT);
        }

        $this->assertEquals($formatted[0], '001');
        $this->assertEquals($formatted[1], '012');
        $this->assertEquals($formatted[2], '123');
    }
}

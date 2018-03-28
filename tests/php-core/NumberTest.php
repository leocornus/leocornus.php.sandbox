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
     * calculate the EMI, estemated motgage payment.
     */
    function testCalcuateMonthlyPayment() {
        $list = "325000.000000000";
        $listValue = floatval($list);

        $principal = $listValue - ($listValue * 0.2);

        $rate = 0.025 / 12; // interest rate of 2.5%
        $months = 300; // 25 years ammortizaion

        // Calculating principal assuming 20% Downpayment
        $principal = $listValue - ($listValue * 0.2);

        $roiComp = pow((1 + $rate), $months);

        $roiCompNumer = $rate * $roiComp;
        $roiCompDenom = $roiComp - 1;

        $emi = $principal * ($roiCompNumer / $roiCompDenom);

        $emi = ceil($emi);
        $this->assertEquals($emi, 1167.0);
        $this->assertEquals(number_format($emi, 2), "1,167.00");
    }

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

        // string to int value.
        $intNumber = intval($strNumber);
        $this->assertEquals($intNumber, 325000);
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

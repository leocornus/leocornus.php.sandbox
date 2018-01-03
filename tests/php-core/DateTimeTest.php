<?php
/**
 * test how PHP handle and manipulate date and time.
 *
 * - get date and time
 * - formating date and time.
 *
 */

use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase {

    /**
     * how to get date time!
     */
    function testGetDate() {

        // get current date time.
        $now = getdate();
        // it will return an array:
        $this->assertEquals(gettype($now), 'array');

        // timestamp, seconds since the unix epoch!
        // system dependent, typically -2,147,483,648 through 2,147,483,647
        // Unix Epoch is set as January 1 1970 00:00:00 GMT.
        $time = $now[0];
        $this->assertTrue($time > 0);

        // get date from a timestamp.
        $endDate = getdate("2147483647");
        //print_r($endDate);
        $this->assertEquals($endDate[0], 2147483647);
        // end at year 2038
        $this->assertEquals($endDate['year'], 2038);
        // month January
        $this->assertEquals($endDate['month'], 'January');
        // day of month
    }
}

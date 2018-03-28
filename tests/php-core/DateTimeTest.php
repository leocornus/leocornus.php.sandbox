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
        //print_r($now);
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

    /**
     * try to get understand the local.and timezone.
     * 
     * timezone could be set in php.ini:
     * http://php.net/manual/en/datetime.configuration.php#ini.date.timezone
     */
    function testLocal() {

        $currentLocal = setlocale(LC_ALL, 0);
        $currentLocal = setlocale(LC_TIME, 0);
        //print_r($currentLocal);

        $timezone = date_default_timezone_get();
        // the default timezone is UTC, the Coordinated Universal Time.
        // https://www.timeanddate.com/time/aboututc.html
        // basically the London, Engliand time.
        $this->assertEquals('UTC', $timezone);
    }

    /**
     * basic date time format.
     */
    function testBasicDateTimeFormat() {

        // using the timestamp when we build this test case
        // as a datetime.
        $timestamp = 1515002897;
        $testDate = getdate($timestamp);
        // it was 2018.
        $this->assertEquals($testDate['year'], 2018);

        // Now we try some different formats:

        // FIXME: NOT WORKING!!!
        // need set the local first.
        //setlocale(LC_TIME, 'America/Toronto');
        $timezone = date_default_timezone_set('America/Toronto');
        $str = strftime('%Y-%m-%d', $timestamp);

        // America/Toronto is a valid timezone.
        $this->assertTrue($timezone);
        $this->assertEquals('2018-01-03', $str);

        //$dateObjet = new DateTime($str, new DateTimeZone('UTC'));
        // @ prefix is required when using the timestamp for DateTime object.
        $dateObject = new DateTime('@' . $timestamp);
        print_r($dateObject);
        // this is actually UTC timezone.
        $this->assertEquals($dateObject->timezone, '+00:00');

        $dateObject->setTimezone(new DateTimeZone('America/Toronto'));
        $this->assertEquals('2018-01-03', $dateObject->format('Y-m-d'));
    }
}

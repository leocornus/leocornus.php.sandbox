<?php
/**
 * learn php functions to manipulate strings.
 */

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase {

    public function testCapitalize() {

        $src = "hello world";

        // capitalize
        $ret = ucfirst($src);
        $this->assertEquals($ret, "Hello world");

        // capitalize each word.
        $ret = ucwords(strtolower($src));
        $this->assertEquals($ret, "Hello World");
    }
}

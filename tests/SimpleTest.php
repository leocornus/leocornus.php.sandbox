<?php

use PHPUnit\Framework\TestCase;

/**
 * a very simple test case.
 */
class SimpleTest extends TestCase {

    public function testAdd() {

        $this->assertEquals(1 + 1, 2);
    }

}

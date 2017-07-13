<?php
/**
 * learn the function preg_match
 * 
 * how PHP perform a regular expression match
 */

use PHPUnit\Framework\TestCase;

class PregMatchTest extends TestCase {

    public function testExtractSrcFromImgTag() {

        $imgUrl = 'https://path.com/to/image.jpg';

        $source = '<img src="' . $imgUrl. '" width="40"/>';
        $pattern = '/src="([^"]*)"/i';
        $matches = array();

        // perform the match
        $theReturn = preg_match($pattern, $source, $matches);

        // we have found the match.
        $this->assertTrue($theReturn === 1);

        // verify.
        // the first entry will always be the whole match.
        $this->assertEquals($matches[0], 'src="'. $imgUrl . '"');
        $this->assertEquals($matches[1], $imgUrl);
    }
}

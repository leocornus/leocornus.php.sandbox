<?php
/**
 * quick test to explore the metadata from Exchangeable Image File (EXIF) format.
 *
 * Exif version 2.2 http://exif.org/Exif2-2.PDF,
 * It was established in April, 2002
 *
 * PHP language need compiled with --enable-exif and --enable-mbstring to 
 * suport all exif functions.
 */

use PHPUnit\Framework\TestCase;

class ImageMetadataTest extends TestCase {

    // define the image file path.
    protected static $imageFile;
    // image file which doesn't has exif data.
    protected static $noneExifImage;
    // image file which has partial exif data.
    protected static $partialExifImage;

    public static function setUpBeforeClass() {

        // assume the testing images are in the same folder.
        $folder = dirname(__FILE__);
        //echo $folder;
        // file name is case sentive!
        self::$imageFile = $folder . "/20140127.JPG";
        // image file which doesn't has exif data at all.
        self::$noneExifImage = $folder. "/IMG_4020.PNG";
        // image with some exif data but missing timestamp
        self::$partialExifImage = $folder. "/IMG_4016.JPG";
    }

    /** 
     * try to get image type.
     */
    public function testImagetype() {

        // get the imageType
        $imageType = exif_imagetype(self::$imageFile);

        // 2 will be jpeg type.
        $this->assertEquals($imageType, 2);

        // full list of image types could be found on page:
        // http://php.net/manual/en/function.exif-imagetype.php

        // try the image file without exif data.
        $imageType = exif_imagetype(self::$noneExifImage);
        // NOTE: we still can get the image type.
        $this->assertEquals($imageType, 3);
    }

    /**
     * get a list of metadata.
     */
    public function testGetMetadata() {

        // read all metadata using default settings.
        //echo self::$imageFile;
        // Add the @ operator to ignore some errors.
        $exif = @exif_read_data(self::$imageFile);
        //print_r($exif);

        // check the file name.
        $this->assertEquals($exif['FileName'], '20140127.JPG');

        // process the date time.
        $strDate = $exif['DateTimeOriginal'];
        $this->assertEquals(substr($strDate, 0, strlen('2014:01:27')), 
                            '2014:01:27');

        // date for prefix 20170127
        $prefixDate = str_replace(":", '', substr($strDate, 0, 10));
        $this->assertEquals($prefixDate, '20140127');

        // timestamp for prefix 20170127
        $prefixDate = str_replace(":", '', $strDate);
        $this->assertEquals($prefixDate, '20140127 054557');

        // date for category 2017-01-27
        $catDate = str_replace(":", '-', substr($strDate, 0, 10));
        $this->assertEquals($catDate, '2014-01-27');
    }

    /**
     * try to read a image witch has no exif data at all!
     */
    public function testGetNoMetadata() {

        // Add the @ operator to ignore some errors.
        $exif = @exif_read_data(self::$noneExifImage);
        // the return will be FALSE, if there is no EXIF data.
        $this->assertFalse($exif);
    }

    /**
     */
    public function testPartialMetadata() {

        $exif = @exif_read_data(self::$partialExifImage);
        print_r($exif);

        // check the file name.
        $this->assertEquals($exif['FileName'], 'IMG_4016.JPG');

        // this one doesn't have DateTimeOriginal.
        $strDate = $exif['DateTimeOriginal'];
        $this->assertEquals($strDate, '');
        $this->assertTrue(empty($strDate));

        // the timestamp.
        $timestamp = $exif['FileDateTime'];
        $theDate = getDate($timestamp);
        print_r($theDate);
    }
}

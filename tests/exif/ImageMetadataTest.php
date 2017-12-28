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

    public static function setUpBeforeClass() {

        // assume the testing images are in the same folder.
        $folder = dirname(__FILE__);
        //echo $folder;
        // file name is case sentive!
        self::$imageFile = $folder . "/20140127.JPG";
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
    }

    /**
     * get a list of metadata.
     */
    public function testGetMetadata() {

        // read all metadata using default settings.
        //echo self::$imageFile;
        // Add the @ operator to ignore some errors.
        $exif = @exif_read_data(self::$imageFile);
        print_r($exif);

        // check the file name.
        $this->assertEquals($exif['FileName'], '20140127.JPG');
    }
}

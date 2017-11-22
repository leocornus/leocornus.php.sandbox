<?php
/**
 * simple test about how PHP handle and manipulate files.
 *
 *
 */

use PHPUnit\Framework\TestCase;

class FileHandleTest extends TestCase {

    /**
     * test save and read xml files
     */
    public function testSaveXMLFiles() {

        // we will save the file in the same folder.
        //$folder = basename(__DIR__); 
        $folder = dirname(__FILE__);
        $fileName = $folder . "/test.xml";

        //echo $fileName;
        $fileContent = <<<EOT
<?xml version="1.0" encoding="utf-8"?>
<docs>
  <doc>
    <Address>1106 76th</Address>
    <City>OAKLAND</City>
    <Province>CA</Province>
  </doc>
</docs>
EOT;

        file_put_contents($fileName, $fileContent);

        // read the file and verify the content.

        $theContent = file_get_contents($fileName);
        $theXML = simplexml_load_string($theContent);

        // check the formated number.
        $this->assertEquals($theXML->doc->Address, "1106 76th");

        // remove the test file.
        $this->assertTrue(unlink($fileName));
    }

    /**
     * test save and read csv file.
     */
    public function testSaveReadCSV() {

        // the testing file name.
        $folder = dirname(__FILE__);
        $fileName = "{$folder}/test.csv";

        // the csv content.
        $fileContent = <<<EOT
123
345
4567
12890134
EOT;

        // write to the file.
        file_put_contents($fileName, $fileContent);

        // read and process.
        $readContent = file_get_contents($fileName);
        $csvContent = preg_split('/\n\r|\n|\r/', $readContent);
        //var_dump($csvContent);
        $this->assertEquals($csvContent[0], '123');
        $this->assertEquals($csvContent[2], '4567');
        $this->assertEquals($csvContent[3], '12890134');

        // remove the test file.
        $this->assertTrue(unlink($fileName));
    }
}

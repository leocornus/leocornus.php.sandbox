<?php
/**
 * test how PHP handle and manipulate files.
 *
 *
 */

use PHPUnit\Framework\TestCase;

class FileHandleTest extends TestCase {

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
    <Adress>1106 76th</Adress>
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
        $this->assertEquals($theXML->doc->Adress, "1106 76th");
    }
}

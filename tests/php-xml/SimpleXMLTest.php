<?php
/**
 * test how PHP handle and manipulate XML.
 *
 */

use PHPUnit\Framework\TestCase;

class SimpleXMLTest extends TestCase {

    public function testLoadXMLFromString() {

        $xmlString = <<<EOT
<?xml version="1.0" encoding="utf-8"?>
<Photos>
  <BoardID>2</BoardID>
  <ListingNumber>40783548</ListingNumber>
  <Count>4</Count>
  <Photo>
    <MainLink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/0/0/0/3427d74baa0336da86b845344b16dcc1/63/a50384b1d17814b288aa7a851a6b0d5d/40783548.JPG</MainLink>
    <ThumbLink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/0/0/0/3427d74baa0336da86b845344b16dcc1/63/a50384b1d17814b288aa7a851a6b0d5d/40783548.JPG</ThumbLink>
    <LargeLink/>
    <Priority>0</Priority>
  </Photo>
  <Photo>
    <MainLink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/1/0/0/565e6c0510daf1e5e09627b893362f01/63/a50384b1d17814b288aa7a851a6b0d5d/40783548-1.JPG</MainLink>
    <ThumbLink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/1/0/0/565e6c0510daf1e5e09627b893362f01/63/a50384b1d17814b288aa7a851a6b0d5d/40783548-1.JPG</ThumbLink>
    <LargeLink/>
    <Priority>1</Priority>
  </Photo>
  <Photo>
    <MainLink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/2/0/0/f14840e102e694ce592b489dcfa04a96/63/a50384b1d17814b288aa7a851a6b0d5d/40783548-2.JPG</MainLink>
    <ThumbLink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/2/0/0/f14840e102e694ce592b489dcfa04a96/63/a50384b1d17814b288aa7a851a6b0d5d/40783548-2.JPG</ThumbLink>
    <LargeLink/>
    <Priority>2</Priority>
  </Photo>
  <Photo>
    <MainLink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/3/0/0/2149b9e042554ce9f1fa84f2c1902f0b/63/a50384b1d17814b288aa7a851a6b0d5d/40783548-3.JPG</MainLink>
    <ThumbLink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/3/0/0/2149b9e042554ce9f1fa84f2c1902f0b/63/a50384b1d17814b288aa7a851a6b0d5d/40783548-3.JPG</ThumbLink>
    <LargeLink/>
    <Priority>3</Priority>
  </Photo>
</Photos>
EOT;

        // string to xml.
        $theXML = simplexml_load_string($xmlString);
        //var_dump($theXML);

        // check element text.
        $this->assertEquals($theXML->BoardID, "2");
        //var_dump($theXML->Photo);
        $this->assertEquals($theXML->Photo[0]->MainLink, "http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/0/0/0/3427d74baa0336da86b845344b16dcc1/63/a50384b1d17814b288aa7a851a6b0d5d/40783548.JPG");
        $this->assertEquals($theXML->Photo[0]->ThumbLink, "http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40783548/0/0/0/3427d74baa0336da86b845344b16dcc1/63/a50384b1d17814b288aa7a851a6b0d5d/40783548.JPG");
    }
}

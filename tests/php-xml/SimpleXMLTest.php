<?php
/**
 * test how PHP handle and manipulate XML.
 *
 */

use PHPUnit\Framework\TestCase;

class SimpleXMLTest extends TestCase {

    public function testLoadXMLFromString() {

        $xmlString = <<<EOT
<photos><boardid>2</boardid><listingnumber>40795639</listingnumber><count>9</count><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/0/0/0/5778214fa97b2267dc0984532d829256/46/bc980b69550331cf400d63cc8ecd1969/40795639.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/0/0/0/5778214fa97b2267dc0984532d829256/46/bc980b69550331cf400d63cc8ecd1969/40795639.JPG</thumblink><largelink></largelink><priority>0</priority></photo><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/1/0/0/e0866092fe22ee3e527cfdae6e5e0cbc/46/bc980b69550331cf400d63cc8ecd1969/40795639-1.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/1/0/0/e0866092fe22ee3e527cfdae6e5e0cbc/46/bc980b69550331cf400d63cc8ecd1969/40795639-1.JPG</thumblink><largelink></largelink><priority>1</priority></photo><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/2/0/0/356327509475f89470646af8fda11bed/46/bc980b69550331cf400d63cc8ecd1969/40795639-2.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/2/0/0/356327509475f89470646af8fda11bed/46/bc980b69550331cf400d63cc8ecd1969/40795639-2.JPG</thumblink><largelink></largelink><priority>2</priority></photo><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/3/0/0/3af660350c51d29d5c84ed683d9028f5/46/bc980b69550331cf400d63cc8ecd1969/40795639-3.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/3/0/0/3af660350c51d29d5c84ed683d9028f5/46/bc980b69550331cf400d63cc8ecd1969/40795639-3.JPG</thumblink><largelink></largelink><priority>3</priority></photo><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/4/0/0/ed9bfae261022a9e3b859c934b4a877a/46/bc980b69550331cf400d63cc8ecd1969/40795639-4.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/4/0/0/ed9bfae261022a9e3b859c934b4a877a/46/bc980b69550331cf400d63cc8ecd1969/40795639-4.JPG</thumblink><largelink></largelink><priority>4</priority></photo><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/5/0/0/bc6dba9a7274187ca2b1b768a7a27b86/46/bc980b69550331cf400d63cc8ecd1969/40795639-5.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/5/0/0/bc6dba9a7274187ca2b1b768a7a27b86/46/bc980b69550331cf400d63cc8ecd1969/40795639-5.JPG</thumblink><largelink></largelink><priority>5</priority></photo><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/6/0/0/1823debed221d480d9dda4ba1b8deb7d/46/bc980b69550331cf400d63cc8ecd1969/40795639-6.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/6/0/0/1823debed221d480d9dda4ba1b8deb7d/46/bc980b69550331cf400d63cc8ecd1969/40795639-6.JPG</thumblink><largelink></largelink><priority>6</priority></photo><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/7/0/0/700b2070c7f523068fdaa63936d4cdda/46/bc980b69550331cf400d63cc8ecd1969/40795639-7.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/7/0/0/700b2070c7f523068fdaa63936d4cdda/46/bc980b69550331cf400d63cc8ecd1969/40795639-7.JPG</thumblink><largelink></largelink><priority>7</priority></photo><photo><mainlink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/8/0/0/66d4b66c09cf2104728919c127545504/46/bc980b69550331cf400d63cc8ecd1969/40795639-8.JPG</mainlink><thumblink>http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/8/0/0/66d4b66c09cf2104728919c127545504/46/bc980b69550331cf400d63cc8ecd1969/40795639-8.JPG</thumblink><largelink></largelink><priority>8</priority></photo></photos>
EOT;

        // string to xml.
        $theXML = simplexml_load_string($xmlString);

        // check element text.
        $this->assertEquals($theXML->boardid, "2");
        var_dump($theXML->photo);
        $this->assertEquals($theXML->photo->mainlink, "http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/0/0/0/5778214fa97b2267dc0984532d829256/46/bc980b69550331cf400d63cc8ecd1969/40795639.JPG");
        $this->assertEquals($theXML->photo->thumblink, "http://cdnparap30.paragonrels.com/ParagonImages/Property/P3/MAXEBRDI/40795639/0/0/0/5778214fa97b2267dc0984532d829256/46/bc980b69550331cf400d63cc8ecd1969/40795639.JPG");
    }
}

<?php
/**
 * learn the function str_getcsv
 * load csv string into an array.
 * 
 */

use PHPUnit\Framework\TestCase;

class StrGetcsvTest extends TestCase {

    public function testBasicParseCSV() {

        $csvString = "abc,1,,3,again,";

        $result = str_getcsv($csvString);

        // the result should be an array.
        $this->assertTrue(gettype($result) === "array");

        // check the size of the array.
        $this->assertEquals(count($result), 6);

        // verify value of the first column
        $this->assertEquals($result[0], 'abc');
        // each column will be string type.
        $this->assertEquals($result[1], '1');
        // empty column will be null
        $this->assertEquals($result[2], null);

        // we could use empty function to check.
        $this->assertTrue(empty($result[2]));
        $this->assertTrue(empty($result[5]));
    }


    /**
     * try to convert CSV to key/value array.
     */
    function testCSV2KeyValue() {

        //$rankingFile = '/usr/rd/AgentReva/files/ranking/NeighbourhoodData.csv';
        //$rankingCSV = file_get_contents($rankingFile);

        $rankingCSV = <<<EOT
neighbourhoodname,SchoolRanking_i,SchoolStars_i,transitRank_i,TransitStars__i,entertainmnetRank__i,entertainmentStars_i,housingRank_i,housingStars_i,crimeRank_i,crimeStars_i,shoppingRank_i,shoppingStars_i,healthRank_i,healthStars_i,communityRank_i,communityStars_i,diversityRank_i,diversityStars_i,employmentRank_i,employmentStars_i
Agincourt North,41,4,111,2,93,2,18,5,77,3,97,2,136,1,110,2,41,4,103,2
Agincourt South-Malvern West,36,4,107,2,34,4,42,4,114,1,42,4,89,2,103,2,57,3,29,4
Alderwood,67,3,105,2,115,1,67,3,42,4,119,1,43,4,85,2,118,1,24,5
Annex,43,4,20,5,51,4,35,4,131,1,4,5,93,2,16,5,129,1,26,5
Banbury-Don Mills,9,5,128,1,32,4,21,5,83,3,109,2,47,4,86,2,22,5,12,5
Bathurst Manor,3,5,106,2,91,2,99,2,44,4,103,2,30,4,127,1,124,1,64,3
Bay Street Corridor,23,5,13,5,82,3,50,4,132,1,13,5,75,3,64,3,43,4,9,5
Bayview Village,133,1,119,1,131,1,15,5,24,5,90,2,1,5,109,2,30,4,23,5
Bayview Woods-Steeles,61,3,88,2,109,2,16,5,7,5,126,1,10,5,115,1,62,3,116,1
Bedford Park-Nortown,31,4,115,1,53,4,27,5,96,2,38,4,53,4,63,3,92,2,16,5
Beechborough-Greenbrook,122,1,66,3,128,1,38,4,45,4,78,3,39,4,96,2,51,4,59,3
Bendale,99,2,103,2,63,3,20,5,120,1,49,4,92,2,100,2,14,5,36,4
Birchcliffe-Cliffside,87,2,97,2,24,5,120,1,95,2,93,2,52,4,73,3,133,1,84,3
Black Creek,118,1,70,3,48,4,110,2,119,1,60,3,131,1,38,4,15,5,111,2
Blake-Jones,125,1,9,5,35,4,128,1,36,4,30,4,58,3,52,4,113,1,75,3
Briar Hill-Belgravia,136,1,60,3,126,1,34,4,75,3,9,5,91,2,77,3,44,4,34,4
Markland Woods,33,4,95,2,138,1,44,4,3,5,123,1,15,5,102,2,71,3,81,3
Milliken,27,5,104,2,60,3,14,5,100,2,48,4,97,2,135,1,40,4,45,4
Mimico,59,3,69,3,86,2,40,4,93,2,102,2,126,1,84,3,105,2,51,4
Morningside,109,2,121,1,112,2,56,4,88,2,135,1,38,4,117,1,29,4,124,1
Moss Park,66,3,26,5,11,5,91,2,121,1,5,5,112,2,42,4,72,3,5,5
EOT;

        $rankingsRows = preg_split('/\n\r|\n|\r/', $rankingCSV);
        $rankings = [];
        // shit the first row, which is header.
        array_shift($rankingsRows);
        foreach($rankingsRows as $row) {
            $rankingRow = str_getcsv($row);
            $rankings[$rankingRow[0]] = $rankingRow;
        }

        //var_dump($rankings);
        $this->assertEquals($rankings['Mimico'], 
                            ['Mimico',59,3,69,3,86,2,40,4,93,2,102,2,126,1,84,3,105,2,51,4]);
        $this->assertEquals($rankings['Black Creek'][2], 1);
    }
}

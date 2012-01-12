<?php

require 'ZendTestHelper.php';

/**
 * testing the Zend Db resource plugin.
 */
class ZendDbResourceTest extends PHPUnit_Framework_TestCase {

    public function setUp() {

        // trying to set up things for this test cases.
        $application = Zend_Registry::get('Zend_Application');
        $bootstrap = $application->getBootstrap();
        $bootstrap->bootstrap('db');
        $this->dbAdapter = $bootstrap->getResource('db');
        $this->options = $bootstrap->getOption('resources');
        $this->logger = Zend_Registry::get('logger');
    }

    public function testIsDbExist() {

        // check if the database is exist or not.
        try {
            // try to establish the connection to database.
            // different database server may have different output.
            // for SQLite3, the adapter will try to create the database
            // file if the file is not exist.  the db file is set up in
            // application.ini.
            $conn = $this->dbAdapter->getConnection();
            $this->logger->info('Connection to Database Sucess!');
            // get all available tables
            $talbes = $conn->listTables();
            if (empty($tables)) {
                $this->logger->info("We got an empty database!");
            } else {
                $tableCount = count($tables);
                $this->logger->info("There are " . $tableCount . "table(s)");
                $index = 0;
                foreach ($tables as $tableName) {
                    $index = $index + 1;
                    $this->logger->info("Table " . $index . " of " . 
                                        $tableCount . ": " . $tableName);
                }
            }
        } catch (Zend_Db_Adapter_Exception $e) {
            $this->logger->err('Adapter Exception: ' . 
                               $e->getMessage());
        } catch (Zend_Exception $e) {
            $this->logger->err('Exception: ' . $e->getMessage());
        }
    }
}

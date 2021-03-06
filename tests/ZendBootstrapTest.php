<?php

require 'ZendTestHelper.php';

/**
 * a very simple test case.
 */
class ZendBootstrapTest extends PHPUnit_Framework_TestCase {

    //protected static $app;

    public function setUp() {

        $application = Zend_Registry::get('Zend_Application');
        $application->getBootstrap()->bootstrap();
        $config = new Zend_Config($application->getOptions());
        Zend_Registry::set('config', $config);
    }

    public function testRegistry() {

        //$registry = Zend_Registry::getInstance();
        //$this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_ARRAY ("array"),
        //                  $registry);
        //foreach ($registry as $index => $value) {
        //    print "Registry index $index contains:\n";
        //    var_dump($value);;
        //}

        $config = Zend_Registry::get('config');
        //#var_dump($config);
        $this->assertEquals($config->testingkey, 'testing value');
        //$this->assertEquals($config->resources->db->adapter, 'pdo_mysql');
        //$this->assertEquals($config->cloud->s3->key, 'AKIAIQQJHQT6DGHADS5A');
        $logger = Zend_Registry::get('logger');

        $logger->log('The first logging message', Zend_Log::DEBUG);
        $logger->log('The first INFO logging message', Zend_Log::INFO);
        $logger->debug('testing debug using the debug method');
        $logger->warn('warning message');
        $logger->emerg('emerg message');
        $logger->crit('crit message');
        $logger->alert('alert()');
        $logger->err('err()');
        $logger->notice('notice()');
        $logger->info('info()');
    }
}

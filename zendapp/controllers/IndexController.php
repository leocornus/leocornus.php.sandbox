<?php

class IndexController extends Zend_Controller_Action {

    protected $_dbAdapter = null;
    protected $_logger = null;
    protected $_redirector = null;

    public function init() {

        /* Initialize action controller here */
        $app = Zend_Registry::get('Zend_Application');
        $bootstrap = $app->getBootstrap();
        $bootstrap->bootstrap('db');
        $this->_dbAdapter = $bootstrap->getResource('db');

        $this->_logger = Zend_Registry::get('logger');
        
        $this->_redirector = $this->_helper->getHelper('Redirector');
    }

    public function indexAction() {

        // action body
        $tables = $this->_dbAdapter->listTables();
        if (empty($tables)) {
            // no table exist in the current database, redirect 
            // to installation page.
            $this->_logger->info("Empty Database, Load Installation page!");
            $this->_redirector->gotoUrl('/install/index');
        }
    }
}

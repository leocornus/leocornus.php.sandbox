<?php

class InstallController extends Zend_Controller_Action {

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

        // get the initial schema and initial data and display 
        // them on the page.
        $this->view->schemaSql = 
            file_get_contents(APPLICATION_PATH . '/scripts/schema.sqlite.sql');
        $this->view->dataSql = 
            file_get_contents(APPLICATION_PATH . '/scripts/data.sqlite.sql');

        // double check to make sure the database is empty.
        // if it's not empty, redirect to homepage.
        $this->view->tableExist = false;
        $tables = $this->_dbAdapter->listTables();
        if (!empty($tables)) {
            $this->view->tableExist = true;
            return;
        }

        $request = $this->getRequest();
        $installForm = new Zendapp_Form_Install();

        if ($request->isPost()) {
            if ($installForm->isValid($request->getPost())) {
                $type = $installForm->getValue('installType');
                // install schema first,
                $this->_dbAdapter->getConnection()->exec($this->view->schemaSql);

                // check the install type, if need populate data, then
                if ($type === 'withData') {
                    $this->_dbAdapter->getConnection()->exec($this->view->dataSql);
                }
                // redirect to home.
                $this->_redirector->gotoUrl('/');
            }
        }

        $this->view->form = $installForm;
    }
}

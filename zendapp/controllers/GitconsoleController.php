<?php

class GitconsoleController extends Zend_Controller_Action {

    protected $_logger = null;

    public function init() {
    
        // get the logger.
        $this->_logger = Zend_Registry::get('logger');
    }

    public function indexAction() {

        $request = $this->getRequest();
        $statusForm = new Zendapp_Form_Gitstatus();
        $commitForm = new Zendapp_Form_Gitcommit();

        if ($request->isPost()) {
            // get the submit button first to decide which form we are 
            // working on?
            if (array_key_exists('commit', $request->getPost())) {
                // handle commit.
                if ($commitForm->isValid($request->getPost())) {
                }
            }

            if (array_key_exists('checkStatus', $request->getPost()) ||
                array_key_exists('checkLogs', $request->getPost())) {

                // handle check status or logs.
                if ($statusForm->isValid($request->getPost())) {
                    $basePath = $statusForm->getValue('basePath');
                    $this->_logger->info("Change working directory to: " .
                                         $basePath);
                    chdir($basePath);
                    if ($statusForm->getValue('checkStatus')) {
                        $action = $statusForm->getValue('checkStatus');
                        $rawResult = shell_exec('git status');
                    }
                    if ($statusForm->getValue('checkLogs')) {
                        $action = $statusForm->getValue('checkLogs');
                        $rawResult = shell_exec('git log');
                    }
    
                    $this->view->action = $action;
                    $this->view->rawResult = $rawResult;
                }
            }
        }

        $this->view->statusForm = $statusForm;
        $this->view->commitForm = $commitForm;
        //$commitForm->setDecorators(array(
        //    array('ViewScript', array('viewScript' => 'gitconsole/commitForm.phtml'))
        //));
    }

    /**
     * prepare a array of changed files in the following format:
     *
     * Array (
     *   'file path' => 'status'
     * )
     *
     * file path will be the relative path to the basepath.
     * status could be new, modified, delete
     */
    public function changeList($basePath) {

        // change the working direction.
        chdir($basePath);
        $rawStatus = shell_exec('git status ' . $basePath);

    }
}

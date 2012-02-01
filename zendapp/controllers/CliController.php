<?php

class CliController extends Zend_Controller_Action {

    public function indexAction() {

        $request = $this->getRequest();
        $cliForm = new Zendapp_Form_Cli();
        if ($request->isPost()) {
            if ($cliForm->isValid($request->getPost())) {
                $workingDir = $cliForm->getValue('workingDir');
                $command = $cliForm->getValue('command');
                chdir($workingDir);
                $this->view->result = shell_exec($command);
            }
        }

        $this->view->form = $cliForm;
    }
}

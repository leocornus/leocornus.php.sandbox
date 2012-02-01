<?php

class Zendapp_Form_Gitstatus extends Zend_Form {

    public function init() {

        $this->setMethod('post');

        $this->addElement('text', 'basePath', array(
            'label' => 'Git Working Folder: ',
            'size' => 60,
            'required' => true,
            )
        );
        $this->setDefault('basePath', shell_exec('pwd'));

        // Add the submit button
        $this->addElement('submit', 'checkStatus', array(
            'ignore'   => true,
            'label'    => 'Check Status',
        ));

        $this->addElement('submit', 'checkLogs', array(
            'ignore'   => true,
            'label'    => 'Check Logs',
        ));
    }
}

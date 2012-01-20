<?php

class Zendapp_Form_Cli extends Zend_Form {

    public function init() {

        $this->setMethod('post');

        $this->addElement('text', 'workingDir', array(
            'label' => 'Set Your Working Directory:',
            'size' => 80,
            'required' => true,
            )
        );
        $this->setDefault('workingDir', shell_exec('pwd'));

        $this->addElement('text', 'command', array(
            'label' => 'Enter Your Shell Command Here:',
            'size' => 40,
            'required' => true,
            )
        );
        //$this->setDefault('installType', 'noData');

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Execute',
        ));
    }
}

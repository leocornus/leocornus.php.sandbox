<?php

class Zendapp_Form_Install extends Zend_Form {

    public function init() {

        $this->setMethod('post');

        $this->addElement('radio', 'installType', array(
            'label' => 'Please select installation type: ',
            'multiOptions' => array(
                'noData' => 'Install Schema Only',
                'withData' => 'Populate Testing Data',
                ),
            'required' => true,
            )
        );
        $this->setDefault('installType', 'noData');

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Install',
        ));
    }
}

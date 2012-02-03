<?php

class Zendapp_Form_Gitcommit extends Zend_Form {

    public function init() {

        $this->setMethod('post');

        $aTableRow = array(
                'ViewHelper',
                'Description',
                'Errors',
                array(array('data' => 'HtmlTag'), array('tag' => 'td')),
                array('Label', array('tag' => 'td')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
            );

        $mBox = $this->createElement('multiCheckbox', 'modifieds', array(
            'label' => 'Modified Files, Select to Commit',
            'required' => true,
            'multiOptions' => array(
                'fileone' => 'File One',
                'filetwo' => 'File Two'
                ),
            ));

        $name = $this->createElement('text', 'authorName', array(
            'label' => 'Author Full Name:',
            'size' => 36,
            'required' => true,
            )
        );
        $name->setDecorators($aTableRow);

        $email = $this->createElement('text', 'authorEmail', array(
            'label' => 'Author Email Address:',
            'size' => 36,
            'required' => true,
            )
        );
        //$this->setDefault('installType', 'noData');
        $email->setDecorators($aTableRow);

        $pass = $this->createElement('password', 'accessKey', array(
            'label' => 'Access Key:',
            'size' => 36,
            'required' => true,
            )
        );
        $pass->setDecorators($aTableRow);

        $comment = $this->createElement('text', 'comment', array(
            'label' => 'Commit Comment:',
            'size' => 80,
            'required' => true,
            )
        );
        $comment->setDecorators($aTableRow);

        // Add the submit button
        $submit = $this->createElement('submit', 'commit', array(
            'ignore'   => true,
            'label'    => 'Commit',
        ));
        $submit->setDecorators(array(
                'ViewHelper',
                'Description',
                'Errors',
                array(array('data' => 'HtmlTag'), 
                      array('tag' => 'td', 'colspan'=>'2', 'align'=>'center')),
                array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
            ));

        $this->addElements(array(
                $mBox, $name, $email, $pass, $comment, $submit
            ));

        $this->setDecorators(array(
                array('ViewScript', array('viewScript' => 'gitconsole/commitForm.phtml'))
            ));
    }
}

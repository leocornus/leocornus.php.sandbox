<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    /**
     * initialize the doctype resource
     */
    protected function _initDoctype() {

        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initAutoloadModules() {

        $moduleLoader = new Zend_Application_Module_Autoloader(
                            array(
                              'namespace' => 'Zendapp',
                              'basePath' => APPLICATION_PATH)
                          );
        return $moduleLoader;
    }

    /**
     * initialize the application logger as a class resources.
     *
     * this will be replace with plugin resources after upgrade to Zend 1.11.x.
     */
    protected function _initApplicationLogger() {

        $config = new Zend_Config($this->getOptions());

        // set up logger for logging message.
        // Zend logger requires a timezone setting, otherwise it will through 
        // out a warning message.
        date_default_timezone_set($config->logging->timezone);
        $this->bootstrap('log');
        $logger = $this->getResource('log');
        Zend_Registry::set('logger', $logger);
        $logger->info("application logger initialization done!");
        unset($logger);
    }

    /**
     * Here is the start point for this application.
     */
    public function run() {

        Zend_Registry::set('config', new Zend_Config($this->getOptions()));

        parent::run();
    }
}

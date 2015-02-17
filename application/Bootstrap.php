<?php
require_once '../library/Plugins/Layout.php';

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

   /* protected function _initLoaderResource()
    {
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
            'basePath'  => APPLICATION_PATH . '/../application',
            'namespace' => 'Application'
        ));

        $modules = array("admin");

        foreach ($modules as $module){
            $autoLoader = new Zend_Application_Module_Autoloader(array(
                "namespace"=>ucfirst($module),
                "basePath"=>APPLICATION_PATH."/modules/".strtolower($module)
            ));
        }
    }

    protected function _initPlugins(){
        $this->bootstrap('frontController');
        //$this->bootstrap('loadAclConfig');

        $plugin = new Controller_Plugin_Layout();
        $this->frontController->registerPlugin($plugin);

        $plugin = new Controller_Plugin_Acl();
        $this->frontController->registerPlugin($plugin);
    }*/

}


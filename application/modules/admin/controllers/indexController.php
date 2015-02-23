<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 17/02/2015
 * Time: 10:42 AM
 */

class Admin_IndexController extends Zend_Controller_Action
{

    public function preDispatch()
    {
        if (!Application_Service_Authentication::getInstance()->isAuthentication()) {
                $this->_redirect('/admin/login');
        }else{
            if(Application_Service_Authentication::getInstance()->getTypeUser()==2){
                $this->_redirect('/admin/login');
            }
        }
    }

    public function init()
    {
        $this->view->controller = $this->getRequest()->getControllerName();
        $this->view->action = $this->getRequest()->getActionName();
    }

    public function indexAction(){

    }

}
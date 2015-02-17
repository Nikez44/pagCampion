<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 17/02/2015
 * Time: 10:42 AM
 */

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->controller = $this->getRequest()->getControllerName();
        $this->view->action = $this->getRequest()->getActionName();
    }

    public function indexAction(){

    }

    public function usersAction(){
        // action body
        $user = new Application_Model_UserMapper();
        $this->view->entries = $user->fetchAll();
    }

}
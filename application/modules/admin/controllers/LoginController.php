<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 23/02/2015
 * Time: 10:52 AM
 */

class Admin_LoginController extends Zend_Controller_Action{

    public function indexAction(){
        $this->_helper->layout()->disableLayout();

        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams();

            $authenticationService = Application_Service_Authentication::getInstance();

            if ($authenticationService->login($data)) {

                if (Application_Service_Authentication::getInstance()->getTypeUser() == Application_Model_TypeUser::$typeUserArray['CLIENTE']) {
                    $this->view->message = "No tienes permiso para entrar a este modulo";
                } else {
                    $this->_redirect('admin');
                }
            } else {
                $this->view->error = "Usuario o contraseña incorrectos";
            }
        }

    }

    public function logoutAction(){
        $authentication = Application_Service_Authentication::getInstance();
        $authentication->logout();
        $this->_redirect('admin/login');
    }

}
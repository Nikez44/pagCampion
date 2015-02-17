<?php

class Admin_UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->view->controller = $this->getRequest()->getControllerName();
        $this->view->action = $this->getRequest()->getActionName();
    }

    public function indexAction()
    {

    }

    public function modifyAction()
    {

        $request = $this->getRequest();
        $data = $request->getParams();

        if ($this->getRequest()->isPost()) {

            $user = new Application_Model_User($data);
            $mapper = new Application_Model_UserMapper();

            if (isset($data['btnDelete'])) {
                $mapper->delete($user);

            } else {
                $mapper->save($user);
            }

        }
        return $this->redirect('admin/index/users');
    }

}


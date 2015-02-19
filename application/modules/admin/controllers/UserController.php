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
        $user = new Application_Model_Mapper_User();
        $this->view->entries = $user->findAll();
    }

    public function editAction()
    {

        $request = $this->getRequest();
        $data = $request->getParams();

        if ($this->getRequest()->isPost()) {

            $id = $data['id'];
            $mapper = new Application_Model_Mapper_User();
            $user = $mapper->findOneBy($id);

            if (isset($data['btnDelete'])) {


            } else {
               $this->view->user = $user;
            }

        }

    }



}


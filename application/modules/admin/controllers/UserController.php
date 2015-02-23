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
        $userService = new Application_Service_User();
        $this->view->entries = $userService->findAll();
    }

    public function newAction(){

        if($this->getRequest()->isPost()){

            $data = $this->getRequest()->getParams();

            $monthService = new Application_Service_MonthFormat();
            $month = $monthService->changeMonthFormat($data['inputMonth']);

            $dateBirth = $data['inputYear'] . "-" . $month . "-" . $data['inputDay'];
            $data['dateBirth'] = $dateBirth;

            $user = new Application_Model_User();
            $user->createFromArray($data);

            $userService = new Application_Service_User();
            $userService->addUser($user);

            $this->_helper->redirector('index');
        }

    }

    /**
     *
     */
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');

        $userService = new Application_Service_User();
        $this->view->user = $userService->findById($id);

    }

    /**
     * @return mixed
     */
    public function deleteAction(){

        $id = $this->getRequest()->getParam('id');
        $userService = new Application_Service_User();
        $user = $userService->findById($id);
        $userService->delete($user);

        $this->_helper->redirector('index');

    }

    public function updateAction(){

        if($this->getRequest()->isPost()){

            $data = $this->getRequest()->getParams();

            $id = $data['id'];
            $typeUserId = $data['typeUser'];

            $monthService = new Application_Service_MonthFormat();
            $month = $monthService->changeMonthFormat($data['inputMonth']);

            $dateBirth = $data['inputYear'] . "-" . $month . "-" . $data['inputDay'];
            $data['dateBirth'] = $dateBirth;

            $user = new Application_Model_User();
            $user->createFromArray($data);

            $typeService = new Application_Service_TypeUser();
            $type = $typeService->findById($typeUserId);

            $user->setId($id);
            $user->setTypeUser($type);

            $userService = new Application_Service_User();
            $userService->update($user);

            $this->_helper->redirector('index');
        }

    }


}


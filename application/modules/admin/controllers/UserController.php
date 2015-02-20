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

            $month = $this->changeMonthFormat($data);
            $dateBirth = $data['inputYear'] . "-" . $month . "-" . $data['inputDay'];
            $data['dateBirth'] = $dateBirth;

            $user = new Application_Model_User();
            $user->createFromArray($data);

            $userService = new Application_Service_User();
            $userService->addUser($user);

            //Agrega el objeto TypeUser a la clase
            $newType = new Application_Service_TypeUser();
            $typeUser = $newType->findById($data['typeUser']);
            $user->setTypeUser($typeUser);

            $this->_redirect('/admin/user/');
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

        $this->_redirect('/admin/user/');

    }

    public function updateAction(){

        if($this->getRequest()->isPost()){

            $data = $this->getRequest()->getParams();

            $id = $data['id'];
            $typeUserId = $data['typeUser'];

            $month = $this->changeMonthFormat($data);
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

            $this->_redirect('/admin/user/');
        }

    }

    public function changeMonthFormat($data)
    {
        switch ($data['inputMonth']) {
            case "Enero":
                $month = "1";
                break;
            case "Febrero":
                $month = "2";
                break;
            case "Marzo":
                $month = "3";
                break;
            case 'Abril':
                $month = "4";
                break;
            case 'Mayo':
                $month = "5";
                break;
            case 'Junio':
                $month = "6";
                break;
            case 'Julio':
                $month = "7";
                break;
            case 'Agosto':
                $month = "8";
                break;
            case 'Septiembre':
                $month = "9";
                break;
            case 'Octubre':
                $month = "10";
                break;
            case 'Noviembre':
                $month = "11";
                break;
            case 'Diciembre':
                $month = "12";
                break;
        }
        return $month;
    }



}


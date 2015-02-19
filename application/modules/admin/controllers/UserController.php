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

    public function newAction(){

        if($this->getRequest()->isPost()){

            $data = $this->getRequest()->getParams();

            $month = $this->changeMonthFormat($data);
            $dateBirth = $data['inputYear'] . "-" . $month . "-" . $data['inputDay'];
            $data['dateBirth'] = $dateBirth;

            $user = new Application_Model_User();
            $user->createFromArray($data);

            $userMapper = new Application_Model_Mapper_User();
            $userMapper->insert($user);

            //Agrega el objeto TypeUser a la clase
            $newType = new Application_Model_Mapper_TypeUser();
            $typeUser = $newType->findOneBy($data['typeUser']);
            $user->setTypeUser($typeUser);

            return $this->_helper->redirector('index');
        }

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


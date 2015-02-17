<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

    }

    public function signAction()
    {
        $request = $this->getRequest();

        if ($this->getRequest()->isPost()) {
            $data = $request->getParams();

            $month = $this->changeMonthFormat($data);

            $dateBirth = $data['inputYear'] . "-" . $month . "-" . $data['inputDay'];
            $data['dateBirth'] = $dateBirth;
            $user = new Application_Model_User($data);
            $mapper = new Application_Model_UserMapper();
            $mapper->save($user);

            return $this->_helper->redirector('index');
        }
    }

    /*public function modifyAction()
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

        return $this->_helper->redirector('index');
    }*/

    public function loginAction()
    {

        $request = $this->getRequest();
        $data = $request->getParams();

        if ($this->getRequest()->isPost()) {

            $mapper = new Application_Model_UserMapper();

            $email = $data['inputEmail'];

            $user = $mapper->findByEmail($email);

            echo $user->getId();
            echo $user->getName();
            echo $user->getDateBirth();
            echo $user->getPassword();

        }

    }


    public function registerAction()
    {

    }

    /**
     * @param $data
     * @return string
     */
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


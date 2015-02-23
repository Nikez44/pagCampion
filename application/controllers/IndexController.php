<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function enterpriseAction()
    {

    }

    public function catalogAction()
    {

    }

    public function servicesAction()
    {

    }

    public function clientsAction(){

    }

    public function videosAction()
    {

    }

    public function seminewAction()
    {

    }

    public function eventsAction()
    {

    }

    public function loginAction(){

    }

    public function contactAction()
    {

    }

    public function sendemailAction()
    {

        $request = $this->getRequest();
        $data = $request->getParams();

        if ($this->getRequest()->isPost()) {

            $name = $data["inputName"];
            $email = $data["inputEmail"];
            $message = $data["inputMessage"];

            $emailService = new Application_Service_Email();

            $emailService->sentEmail($email, $name, $message);
        }

    }


}


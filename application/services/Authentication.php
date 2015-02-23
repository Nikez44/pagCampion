<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 23/02/2015
 * Time: 09:42 AM
 */

class Application_Service_Authentication {

    private $auth;
    private static $instance;

    public static function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new Application_Service_Authentication();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->auth = Zend_Auth::getInstance();
    }

    public function login($params){

        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter ->setTableName('user')
            ->setIdentityColumn('name')
            ->setCredentialColumn('password')
            ->setIdentity($params['userName'])
            ->setCredential($params['password']);
        $result = $this->auth->authenticate($authAdapter);

        if ($result->isValid()) {
            $userRow = $authAdapter->getResultRowObject();
            $userMapper = new Application_Model_Mapper_User();
            $user = $userMapper->findOneBy($userRow->id);

            if($user->getTypeUser()->getId() == Application_Model_TypeUser::$typeUserArray['ADMINISTRADOR']){
                $session = new Zend_Session_Namespace('campion');
                $session->user = $user;
                $this->auth->getStorage()->write($authAdapter->getResultRowObject());
                return true;
            }else
                if($user->getTypeUser()->getId() == Application_Model_TypeUser::$typeUserArray['CLIENTE']){
                $session = new Zend_Session_Namespace('campion');
                $session->user = $user;
                $this->auth->getStorage()->write($authAdapter->getResultRowObject());
                return true;
            }
        }else{
            return false;
        }

    }

    public function logout()
    {
        $this->auth->clearIdentity();
    }

    public function getTypeUser(){
        $identity = $this->auth->getIdentity();
        return $identity->type_user_id;
    }

    public function isAuthentication()
    {
        if ($this->auth->hasIdentity()) {
            return true;
        } else {
            return false;
        }
    }

}
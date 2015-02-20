<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 20/02/2015
 * Time: 08:27 AM
 */

class Application_Service_User {

    private $_userMapper;

    public function __construct(){
        $this->_userMapper = new Application_Model_Mapper_User();
    }

    public function findAll(){
        return $this->_userMapper->findAll();
    }

    public function findById($id){
        return $this->_userMapper->findOneBy($id);
    }

    public function addUser(Application_Model_User $user){
        return $this->_userMapper->insert($user);
    }

    public function delete(Application_Model_User $user){
        $this->_userMapper->delete($user);
    }

    public function update(Application_Model_User $user){
        return $this->_userMapper->update($user);
    }

}
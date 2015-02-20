<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 20/02/2015
 * Time: 08:30 AM
 */

class Application_Service_TypeUser {

    private $_typeUserMapper;

    public function __construct(){
        $this->_typeUserMapper = new Application_Model_Mapper_TypeUser();
    }

    public function findAll(){
        return $this->_typeUserMapper->findAll();
    }

    public function findById($id){
        return $this->_typeUserMapper->findOneBy($id);
    }

}
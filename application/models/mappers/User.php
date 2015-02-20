<?php

class Application_Model_Mapper_User implements Application_Model_Mapper_Abstract{

    protected $_userDbTable;

    //Metodos implementados


    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->_userDbTable = new Application_Model_DbTable_User();
    }

    /**
     * Insert object
     * @param unknown $obj
     */
    public function insert($obj)
    {
        $data = array(
            'name' => $obj->getName(),
            'last_name' => $obj->getLastName(),
            'email' => $obj->getEmail(),
            'password' => $obj->getPassword(),
            'type_user_id' => $obj->getTypeUser(),
            'date_birth' => $obj->getDateBirth(),
            'sex' => $obj->getSex()
        );

        $id = $this->_userDbTable->insert($data);
        $obj->setId($id);
        return $obj;
    }

    /**
     * Update object
     * @param unknown $obj
     * @param unknown $id
     */
    public function update($obj)
    {
        $data = array(
            'name' => $obj->getName(),
            'last_name' => $obj->getLastName(),
            'email' => $obj->getEmail(),
            'password' => $obj->getPassword(),
            'type_user_id' => $obj->getTypeUser()->getId(),
            'date_birth' => $obj->getDateBirth(),
            'sex' => $obj->getSex()
        );

        $id=$this->_userDbTable->update($data, "id = ".$obj->getId());
        $obj->setId($id);
        return $obj;
    }

    /**
     * Delete object
     * @param unknown $obj
     */
    public function delete($obj)
    {
        $this->_userDbTable->delete("id = ".$obj->getId());
    }

    /**
     * Find one by
     * @param unknown $id
     * @param string $bandera
     */
    public function findOneBy($id)
    {
        $row = $this->_userDbTable->fetchRow($this->_userDbTable->select()->where("id=?",$id))->toArray();

        $mapperTypeUser = new Application_Model_Mapper_TypeUser();
        $typeUser = $mapperTypeUser->findOneBy($row["type_user_id"]);
        $user = new Application_Model_User();
        $user->createFromDbTable($row);
        $user->setTypeUser($typeUser);
        return $user;
    }

    /**
     * Find all elements
     */
    public function findAll()
    {
        $userArray = array();
        $result = $this->_userDbTable->fetchAll()->toArray();
        foreach($result as $row){
            $mapperTypeUser = new Application_Model_Mapper_TypeUser();
            $typeUser = $mapperTypeUser->findOneBy($row["type_user_id"]);
            $user = new Application_Model_User();
            $user->createFromDbTable($row);
            $user->setTypeUser($typeUser);
            array_push($userArray, $user);
        }
        return $userArray;
    }

    /**
     * Find elements
     * @param array $filter
     */
    public function find(array $filter)
    {
        // TODO: Implement find() method.
    }

}
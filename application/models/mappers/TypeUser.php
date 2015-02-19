<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 19/02/2015
 * Time: 08:33 AM
 */

class Application_Model_Mapper_TypeUser implements Application_Model_Mapper_Abstract{

    private $_typeUserDbTable;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->_typeUserDbTable = new Application_Model_DbTable_TypeUser();
    }

    /**
     * Insert object
     * @param unknown $obj
     */
    public function insert($obj)
    {
        // TODO: Implement insert() method.
    }

    /**
     * Update object
     * @param unknown $obj
     * @param unknown $id
     */
    public function update($obj)
    {
        // TODO: Implement update() method.
    }

    /**
     * Delete object
     * @param unknown $obj
     */
    public function delete($obj)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Find one by
     * @param unknown $id
     * @param string $bandera
     */
    public function findOneBy($id)
    {
        $row = $this->_typeUserDbTable->fetchRow($this->_typeUserDbTable->select()->where("id=?",$id))->toArray();
        $typeUser = new Application_Model_TypeUser();
        $typeUser->createFromDbTable($row);
        return $typeUser;
    }

    /**
     * Find all elements
     */
    public function findAll()
    {
        $userArray = array();
        $result = $this->_typeUserDbTable->fetchAll()->toArray();
        foreach($result as $row){
            $typeUser = new Application_Model_TypeUser();
            $typeUser->createFromDbTable($row);
            array_push($userArray, $typeUser);
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
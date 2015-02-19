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
            'type_user_id' => $obj->getTypeUser(),
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

    /*public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_User');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_User $user)
    {
        $data = array(
            'name' => $user->getName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'type_user_id' => $user->getTypeUserId(),
            'date_birth' => $user->getDateBirth(),
            'sex' => $user->getSex(),
        );

        if (null === ($id = $user->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_User $user)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();

        $user->setId($row->id)
            ->setName($row->name)
            ->setLastName($row->last_name)
            ->setEmail($row->email)
            ->setPassword($row->password)
            ->setTypeUserId($row->type_user_id)
            ->setDateBirth($row->date_birth)
            ->setSex($row->sex);
    }

    public function findById($id){

        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();

        $user = new Application_Model_User();

        $user->setId($row->id)
            ->setName($row->name)
            ->setLastName($row->last_name)
            ->setEmail($row->email)
            ->setPassword($row->password)
            ->setTypeUserId($row->type_user_id)
            ->setDateBirth($row->date_birth)
            ->setSex($row->sex);

        return $user;
    }

    public function findByEmail($email)
    {

        $result = $this->getDbTable()->fetchAll("email = '$email'");
        $row = $result->current();

        $user = new Application_Model_User();

        $user->setId($row->id)
            ->setName($row->name)
            ->setLastName($row->last_name)
            ->setEmail($row->email)
            ->setPassword($row->password)
            ->setTypeUserId($row->type_user_id)
            ->setDateBirth($row->date_birth)
            ->setSex($row->sex);

        return $user;
    }

    public function delete(Application_Model_User $user)
    {
        $id = $user->getId();
        $result = $this->getDbTable()->find($id);
        $row = $result->current();
        $row->delete();
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_User();

            $entry->setId($row->id)
                ->setName($row->name)
                ->setLastName($row->last_name)
                ->setEmail($row->email)
                ->setPassword($row->password)
                ->setTypeUserId($row->type_user_id)
                ->setDateBirth($row->date_birth)
                ->setSex($row->sex);
            $entries[] = $entry;
        }
        return $entries;
    }*/


}
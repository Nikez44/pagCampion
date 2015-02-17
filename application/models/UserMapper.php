<?php

class Application_Model_UserMapper
{

    protected $_dbTable;

    public function setDbTable($dbTable)
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
            ->setDateBirth($row->date_birth)
            ->setSex($row->sex);
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
                ->setDateBirth($row->date_birth)
                ->setSex($row->sex);
            $entries[] = $entry;
        }
        return $entries;
    }

}
<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';

    protected $_primary = 'id';

    protected $_referenceMap = array('Type_user' => array(
        'columns' => 'type_user_id',
        'refTableClass' => 'Application_Model_DbTable_TypeUser',
        'ferColumns' => 'id'
    ));

}


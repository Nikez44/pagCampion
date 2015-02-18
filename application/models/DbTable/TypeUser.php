<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18/02/2015
 * Time: 11:49 AM
 */

class Application_Model_DbTable_TypeUser extends Zend_Db_Table_Abstract{

    protected $_name = 'type_user';

    protected $_primary = 'id';

    protected $_dependentTables = array('Application_Model_DbTable_User');

}
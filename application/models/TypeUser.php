<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 19/02/2015
 * Time: 08:49 AM
 */

class Application_Model_TypeUser extends Application_Model_Abstract{

    protected $id;
    protected $name;
    public static $typeUserArray = array('ADMINISTRADOR'=>1, 'CLIENTE'=>2);

    /**
     * @return array
     */
    public static function getTypeUserArray()
    {
        return self::$typeUserArray;
    }

    /**
     * @param array $typeUserArray
     */
    public static function setTypeUserArray($typeUserArray)
    {
        self::$typeUserArray = $typeUserArray;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}
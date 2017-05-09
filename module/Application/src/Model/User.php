<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 9/5/2017
 * Time: 4:44 PM
 */

namespace Application\Model;

/**
 * Class User
 *
 * @package Application\Model
 */
class User
{

    private $id;

    private $username;

    /**
     * User constructor.
     * @param $id
     * @param $username
     * @param $password
     */
    public function __construct($id = null, $username = null, $password = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

}
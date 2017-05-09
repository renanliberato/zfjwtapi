<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 9/5/2017
 * Time: 4:47 PM
 */

namespace Application\Model;

class UserTable
{
    /**
     * @var User[]
     */
    private $userList;

    public function __construct()
    {
        $this->userList = [
            new User(1, "jose", "jose")
        ];
    }

    public function fetchAll()
    {
        return $this->userList;
    }

    public function getByUsernameAndPassword($username, $password)
    {
        foreach ($this->userList as $user) {
            if ($user->getUsername() == $username &&
                $user->getPassword() == $password) {
                return $user;
            }
        }

        return null;
    }

}
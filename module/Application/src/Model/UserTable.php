<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 9/5/2017
 * Time: 4:47 PM
 */

namespace Application\Model;

/**
 * Class UserTable
 *
 * @package Application\Model
 */
class UserTable
{
    /**
     * @var User[]
     */
    private $userList;

    /**
     * Example list initialization
     */
    public function __construct()
    {
        $this->userList = [
            new User(1, "jose", "jose"),
            new User(1, "jose2", "jose2"),
            new User(1, "jose2", "jose2")
        ];
    }

    /**
     * Try to find a user inside the list with the username and passwords given.
     *
     * @param $username
     * @param $password
     *
     * @return User|null
     */
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
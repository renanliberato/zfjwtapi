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
            new User(1, "jose"),
            new User(2, "jose2"),
            new User(3, "jose2")
        ];
    }

    /**
     * Try to find a user inside the list with the username given.
     *
     * @param $username
     *
     * @return User|null
     */
    public function getByUsername($username)
    {
        foreach ($this->userList as $user) {
            if ($user->getUsername() == $username) {
                return $user;
            }
        }

        return null;
    }

}
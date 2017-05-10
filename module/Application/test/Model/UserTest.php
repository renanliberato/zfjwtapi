<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 9/5/2017
 * Time: 7:14 PM
 */

namespace ApplicationTest\Model;


use Application\Model\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @var User
     */
    private $user;

    public function setUp()
{
    $this->user = new User();
}

    public function testClassHasAllAttributes()
    {
        $this->assertClassHasAttribute("id", User::class);
        $this->assertClassHasAttribute("username", User::class);
    }

    public function testObjectIsAUserInstance()
    {
        $this->assertInstanceOf(User::class, $this->user);
        $this->assertInternalType('object', $this->user);
    }

    public function testInstantiatedObjectHasAllAttributes()
    {
        $this->assertObjectHasAttribute("id", $this->user);
        $this->assertObjectHasAttribute("username", $this->user);
    }

    public function testEmptyAttributesMayReturnNull()
    {
        $this->assertNull($this->user->getId());
        $this->assertNull($this->user->getUsername());
    }

    public function testFilledAttributesMayReturnItsValues()
    {
        $id = 1;
        $username = "myusername";
        $this->user->setId($id);
        $this->user->setUsername($username);
        $this->assertEquals($id, $this->user->getId());
        $this->assertEquals($username, $this->user->getUsername());
    }

}
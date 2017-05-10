<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 9/5/2017
 * Time: 8:49 PM
 */

namespace ApplicationTest\Model;


use Application\Model\UserTable;
use PHPUnit\Framework\TestCase;

class UserTableTest extends TestCase
{
    /**
     * @var UserTable
     */
    private $userTable;

    public function setUp()
    {
        $this->userTable = new UserTable();
    }

    public function testObjectIsInitializedWithAUserList()
    {
        $userList = $this->userTable->getUserList();

        $this->assertContainsOnly('object', $userList);
        $this->assertTrue(count($userList) > 0);
    }

    public function testGetByUsernameReturnsNullIfNoArguments()
    {
        $this->assertNull($this->userTable->getByUsername());
    }

    public function testGetByUsernameReturnsNullIfNotFound()
    {
        $this->assertNull($this->userTable->getByUsername("nonexistent"));
    }
}
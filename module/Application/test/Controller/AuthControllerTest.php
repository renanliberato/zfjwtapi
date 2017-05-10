<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 9/5/2017
 * Time: 4:58 PM
 */

namespace ApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class AuthControllerTest extends AbstractHttpControllerTestCase
{
    const URL = "/auth";

    public function setUp()
    {
        $this->setApplicationConfig(
            include(__DIR__.'/../../../../config/application.config.php')
        );

        parent::setUp();
    }

    public function testIfGetIsNotAllowed()
    {
        $this->getRequest()->setMethod("GET");
        $this->dispatch(self::URL);
        $response = $this->getResponse();

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testIfEmptyBodyIsNotAllowed()
    {
        $this->getRequest()->setMethod("POST");
        $this->dispatch(self::URL);
        $response = $this->getResponse();

        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testIfNonExistentUserIsNotAllowed()
    {
        $this->getRequest()->setMethod("POST")->setContent(json_encode([
            "username" => "nonexistent"
        ]));

        $this->dispatch(self::URL);
        $response = $this->getResponse();

        $this->assertEquals(403, $response->getStatusCode());
    }

    public function testIfExistingUserIsAllowed()
    {
        $this->getRequest()->setMethod("POST")->setContent(json_encode([
            "username" => "jose"
        ]));

        $this->dispatch(self::URL);
        $response = $this->getResponse();

        $jsonBody = $response->getContent();

        $objectBody = json_decode($jsonBody);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertObjectHasAttribute("token", $objectBody);
        $this->assertEquals(3, count(explode('.', $objectBody->token)));
    }
}

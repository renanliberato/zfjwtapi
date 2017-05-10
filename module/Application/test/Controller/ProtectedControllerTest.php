<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 10/5/2017
 * Time: 12:27 AM
 */

namespace ApplicationTest\Controller;

use Firebase\JWT\JWT;
use Zend\Http\Header\Authorization;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ProtectedControllerTest extends AbstractHttpControllerTestCase
{

    const URL = "/protected";

    public function setUp()
    {
        $this->setApplicationConfig(
            include(__DIR__.'/../../../../config/application.config.php')
        );

        parent::setUp();
    }

    public function testMayNotAuthorizeWhenNotPassingAToken()
    {
        $this->getRequest()->setMethod("GET");
        $this->dispatch(self::URL);
        $response = $this->getResponse();

        $this->assertEquals(401, $response->getStatusCode());
    }

    public function testMayNotAuthorizeWhenPassingAnInvalidToken()
    {
        $request = $this->getRequest();

        $request->setMethod("GET");
        $request->getHeaders()->addHeader(new Authorization("Bearer asjffç1jfl21jfkçleqw"));

        $this->dispatch(self::URL);
        $response = $this->getResponse();

        $this->assertEquals(401, $response->getStatusCode());
    }

    public function testMayNotAuthorizeWhenPassingAnExpiredToken()
    {
        $request = $this->getRequest();

        $request->setMethod("GET");
        $request->getHeaders()->addHeader(new Authorization("Bearer ".$this->getExpiredToken()));

        $this->dispatch(self::URL);
        $response =  $this->getResponse();

        $this->assertEquals(401, $response->getStatusCode());
    }

    public function testMayAuthorizeWhenPassingAValidToken()
    {
        $request = $this->getRequest();

        $request->setMethod("GET");
        $request->getHeaders()->addHeader(new Authorization("Bearer ".$this->getToken()));

        $this->dispatch(self::URL);
        $response =  $this->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    private function getExpiredToken()
    {
        $key = $this->getKey();

        return JWT::encode([
            'exp' => strtotime('-15 minutes')
        ], $key);
    }

    private function getToken()
    {
        $key = $this->getKey();

        return JWT::encode([
            'exp' => strtotime('+15 minutes')
        ], $key);
    }

    private function getKey()
    {
        return $this->getApplication()->getServiceManager()->get('Config')['auth']['key'];
    }
}

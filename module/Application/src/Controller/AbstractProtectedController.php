<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 10/5/2017
 * Time: 12:22 AM
 */

namespace Application\Controller;

use Exception;
use Firebase\JWT\JWT;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class AbstractProtectedController extends AbstractActionController
{

    /**
     * Validate if a token is provided in the header Authorization, after the prefix "Bearer ".
     * If the token isn't provided, returns a 401 response.
     *
     * @param MvcEvent $e
     * @return mixed|\Zend\Stdlib\ResponseInterface
     */
    public function onDispatch(MvcEvent $e)
    {
        $request = $e->getRequest();

        $authorizationHeader = $request->getHeaders()->get('Authorization');

        if (!$authorizationHeader) {
            $response = $e->getResponse();
            $response->setStatusCode(401);
            return $response;
        }

        $token = str_replace("Bearer ", "", $authorizationHeader->getFieldValue());

        $key = $e->getApplication()->getServiceManager()->get('Config')['auth']['key'];

        try {
            JWT::decode($token, $key, ['HS256']);

            return parent::onDispatch($e);
        } catch (Exception $exception) {
            $response = $e->getResponse()->setStatusCode(401);

            return $response;
        }
    }
}

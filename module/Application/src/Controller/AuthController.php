<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 9/5/2017
 * Time: 4:22 PM
 */

namespace Application\Controller;


use Application\Model\UserTable;
use Firebase\JWT\JWT;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class AuthController extends AbstractActionController
{
    /**
     * @var UserTable
     */
    private $userTable;

    /**
     * @var string jwt key
     */
    private $key;

    /**
     * AuthController constructor.
     *
     * @param UserTable $userTable
     * @param $key
     */
    public function __construct(UserTable $userTable, $key)
    {
        $this->userTable = $userTable;
        $this->key = $key;
    }

    /**
     * Method configured to receive a POST request.
     *
     * @return \Zend\Stdlib\ResponseInterface|JsonModel
     */
    public function postAction()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            $response = $this->getResponse();
            $response->setStatusCode(404);

            return $response;
        }

        $body = json_decode($request->getContent());

        if (empty($body->username)) {
            $response = $this->getResponse();
            $response->setStatusCode(400);

            return $response;
        }


        $existentUser = $this->userTable->getByUsername(
            $body->username
        );

        if (!$existentUser) {
            $response = $this->getResponse();
            $response->setStatusCode(403);

            return $response;
        }

        $token = [
            "exp" => strtotime("+15 minute"),
            "subject" => $existentUser->getId()
        ];

        $jwtToken = JWT::encode($token, $this->key);

        return new JsonModel([
            'token' => $jwtToken
        ]);
    }
}
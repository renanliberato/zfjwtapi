<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 9/5/2017
 * Time: 4:22 PM
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class AuthController extends AbstractActionController
{
    public function postAction()
    {
        return new JsonModel(['token' => 'djfalçsfjasdçlf']);
    }
}
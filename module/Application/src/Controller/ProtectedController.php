<?php
/**
 * Created by IntelliJ IDEA.
 * User: renan
 * Date: 10/5/2017
 * Time: 12:05 AM
 */

namespace Application\Controller;


use Zend\View\Model\JsonModel;

class ProtectedController extends AbstractProtectedController
{

    /**
     * Protected route example.
     *
     * @return JsonModel
     */
    public function indexAction()
    {
        return new JsonModel(['data' => 'Protected content =D']);
    }
}
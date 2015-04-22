<?php

class Core_RoleController extends Zend_Controller_Action
{

    public function indexAction()
    {
    }

    public function listAction()
    {
        if ($this->_request->isPost()) {
            if (!isset ($_SERVER ['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER ['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
                throw new Exception ();
            }
            $this->_helper->getHelper('viewRenderer')->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout();

            $db = Puppy_Core_Db::getConnection();
            $modelManager = Puppy_Core_Model_Manager::getInstance();
            $modelManager->setDbConnection($db);
            $modelManager->registerModel('core_Role');
            $roles = $modelManager->core_Role->queryAllRoles();

            $this->_response->setHeader('content-type', 'application/json;charset=utf-8');
            $this->_response->setBody(json_encode($roles));
        }else{
            exit();
        }
    }

    public function detailAction()
    {
        if ($this->_request->isPost()) {
            if (!isset ($_SERVER ['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER ['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
                throw new Exception ();
            }
            $this->_helper->getHelper('viewRenderer')->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout();

            $params = $this->_request->getParams();
            if (!array_key_exists('code', $params) || !preg_match('/^[A-Z]{2}$/', $params['code']))
                exit();

            $db = Puppy_Core_Db::getConnection();
            $modelManager = Puppy_Core_Model_Manager::getInstance();
            $modelManager->setDbConnection($db);
            $modelManager->registerModel('core_Role');
            $role = $modelManager->core_Role->queryRoleDetail($params['code']);

            $this->_response->setHeader('content-type', 'application/json;charset=utf-8');
            $this->_response->setBody(json_encode($role));
        }else{
            exit();
        }

    }

    public function addAction()
    {
    }

    public function updateAction()
    {
    }


}

<?php

class Core_UserController extends Zend_Controller_Action {

	public function listAction()
	{
		
	}

	public function detailAction()
	{
		$this->_helper->getHelper('viewRenderer')->setNoRender();
		$this->_helper->getHelper('layout')->disableLayout();
		
		$uid = $this->_request->getParam ( 'uid' );
		if (empty ( $uid ) || ! preg_match ( '/^(\d+)$/', $uid ))
			exit ();
		
		$db = Puppy_Core_Db::getConnection ();
		$modelManager = Puppy_Core_Model_Manager::getInstance ();
		$modelManager->setDbConnection ( $db );
		$modelManager->registerModel ( 'user' );
		
		$user = $modelManager->user->getUserDetail ( $uid, array (
				'accountname',
				'email',
				'rolename',
				'comname' ) );
		
		$this->_response->setHeader('content-type', 'text/html;charset=utf-8');
		$this->_response->setBody(var_dump($user));
	}
}

?>
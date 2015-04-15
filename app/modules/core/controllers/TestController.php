<?php

class TestController extends Zend_Controller_Action {
	
	public function test1Action()
	{
		$this->_helper->layout->setLayout ( 'core/layout' );
		
		$db = Puppy_Core_Db::getConnection ();
		$modelManager = Puppy_Core_Model_Manager::getInstance ();
		$modelManager->setDbConnection ( $db );
		$modelManager->registerModel ( 'user' );
		
		$user = $modelManager->user->getUserDetail ( 46, array (
				'accountname',
				'email',
				'rolename',
				'comname' 
		) );
		$this->view->assign('currentUser',$user);
	}

	public function test2Action()
	{
		$this->_helper->viewRenderer->setNoRender ( true );
		header ( 'content-type:text/html;charset=utf-8' );
		ob_start ();
		phpinfo ();
		$info = ob_get_contents ();
		$file = fopen ( 'test2.txt', 'w' );
		fwrite ( $file, $info );
		fclose ( $file );
		echo 'php info wroten...';
	}

	public function upgradeAction()
	{
		$this->_helper->viewRenderer->setNoRender ( true );
		header ( 'content-type:text/html;charset=utf-8' );
		
		echo 'System upgrade...';
	}
}

?>
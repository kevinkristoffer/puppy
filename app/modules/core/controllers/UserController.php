<?php

class UserController extends Zend_Controller_Action {

	public function detailAction()
	{
		$this->_helper->viewRenderer->setNoRender ( true );
		header ( 'content-type:text/html;charset=utf-8' );
		
		$uid = $this->_request->getParam ( 'uid' );
		if (empty ( $uid ) || ! preg_match ( '/^(\d+)$/', $uid ))
			exit ();
		
		echo '<p>Request User ID:'.$uid.'</p>';
	}
}

?>
<?php


class IndexController extends Zend_Controller_Action{
	
	public function indexAction(){
		
		$this->_helper->viewRenderer->setNoRender ( true );
		header ( 'content-type:text/html;charset=utf-8' );
		
		echo 'This is index page';
	}
	
}

?>
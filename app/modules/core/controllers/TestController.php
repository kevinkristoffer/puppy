<?php
class TestController extends Zend_Controller_Action {

	public function test1Action()
	{
		$this->_helper->viewRenderer->setNoRender ( true );
		header ( 'content-type:text/html;charset=utf-8' );
		
		echo '<p>Hello World</p>';
		
		Puppy::loadClass ( 'Puppy_Core_Db' );
		$db = Puppy_Core_Db::getConnection ();
		$query = "select count(*) total from main " . "where startdate between 20120101 and 20120231";
		$result = $db->query ( $query )->fetch ();
		echo '<p>Total:' . $result->total . '</p>';
	}

	public function test2Action()
	{
		$this->_helper->viewRenderer->setNoRender ( true );
		header ( 'content-type:text/html;charset=utf-8' );
		ob_start();
		phpinfo();
		$info=ob_get_contents();
		$file=fopen('test2.txt', 'w');
		fwrite($file, $info);
		fclose($file);
		echo 'php info wroten...';
	}
	
	public function userAction(){
		$this->_helper->viewRenderer->setNoRender ( true );
		header ( 'content-type:text/html;charset=utf-8' );
		echo '<p>user action...</p>';
	}

	public function upgradeAction()
	{
		$this->_helper->viewRenderer->setNoRender ( true );
		header ( 'content-type:text/html;charset=utf-8' );
		
		echo 'System upgrade...';
	}
}

?>
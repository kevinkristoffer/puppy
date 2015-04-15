<?php

class Puppy_View_Helper_Core_SideNav extends Zend_View_Helper_Abstract {

	public function sideNav()
	{
		$ssdb = Puppy_Core_Cache_SimpleSSDB::getInstance ( 'master' );
		$forums = null;
		if ($ssdb->exists ( 'forums' ))
		{
			$forumsJSON = $ssdb->get ( 'forums' );
			$forums = Zend_Json::decode ( $forumsJSON, Zend_Json::TYPE_OBJECT );
		} else
		{
			$db = Puppy_Core_Db::getConnection ();
			$modelManager = Puppy_Core_Model_Manager::getInstance ();
			$modelManager->setDbConnection ( $db );
			$modelManager->registerModel ( 'forum' );
			$forums = $modelManager->forum->getForums ( 6, 0 );
			
			$ssdb->set ( 'forums', Zend_Json::encode ( $forums ) );
		}
		
		$this->view->assign ( 'forums', $forums );
		$this->view->assign ( 'sidebarInfo', 'This Is Action Implementation Sidebar.' );
		$output = $this->view->render ( 'test/sidenav.phtml' );
		return $output;
	}
}

?>
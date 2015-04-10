<?php

class Puppy_Core_Db {

	public static function getPrefix()
	{
		if (! Zend_Registry::isRegistered ( 'db_prefix' ))
		{
			$config = Puppy::getIniConfig ( 'db' );
			Zend_Registry::set ( 'db_prefix', $config ['db'] ['params'] ['prefix'] );
		}
		return Zend_Registry::get ( 'db_prefix' );
	}

	public static function getConnection()
	{
		if (! Zend_Registry::isRegistered ( 'db' ))
		{
			$config = Puppy::getIniConfig ( 'db' );
			$db = Zend_Db::factory ( $config ['db'] ['adapter'], $config ['db'] ['params'] );
			$db->setFetchMode ( Zend_Db::FETCH_OBJ );
			$db->query ( "SET CHARACTER SET 'utf8'" );
			Zend_Registry::set ( 'db', $db );
		}
		return Zend_Registry::get ( 'db' );
	}
}

?>
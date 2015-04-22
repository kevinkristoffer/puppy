<?php

class Puppy_Model_Core_Role extends Puppy_Core_Model {

	public function queryAllRoles()
	{
		$select = $this->_db->select ()
			->from ( array (
				'a' => $this->_prefix . 'core_role' ), array (
				'rolecode',
				'rolename',
				'currentstatus' => new Zend_Db_Expr ( "case when validflag='Y' then 'valid' else 'invalid' end" ) ) );
		$result = $select->query ()
			->fetchAll ();
		return $result;
	}
}

<?php

class Puppy_Model_Core_Role extends Puppy_Core_Model
{
    /**
     * @return array
     */
    public function queryAllRoles()
    {
        $select = $this->_db->select()->from(array('a' => $this->_prefix . 'core_role'), array('rolecode',
            'rolename',
            'currentstatus' => new Zend_Db_Expr ("case when validflag='Y' then 'valid' else 'invalid' end")));
        $result = $select->query()->fetchAll();
        return $result;
    }

    /**
     * @param string $rolecode
     * @return mixed
     */
    public function queryRoleDetail($rolecode)
    {
        $select=$this->_db->select()->from(array('a'=>$this->_prefix.'core_role'))->where('rolecode=?',$rolecode);
        $result=$select->query()->fetch();
        return $result;
    }
}

<?php

class Puppy_Model_Core_User extends Puppy_Core_Model
{

    public function queryUser($username, $password)
    {
        $select = $this->_db->select()
            ->from(array('a' => $this->_prefix . 'core_user'), null)
            ->join(array('b' => $this->_prefix . 'core_role'), 'a.rolecode=b.rolecode', null)
            ->columns(array('authid',
                'accountname',
                'validflag'), 'a')
            ->columns(array('rolecode',
                'rolename'), 'b')
            ->where('a.authid=?', $username)
            ->where('a.credential=?', md5($password));
        $rs = $select->query()->fetch();
        return $rs;
    }

    public function queryUserList()
    {

    }

    public function queryUserDetail()
    {

    }
}
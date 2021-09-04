<?php

class UserModel extends Model
{
    private $user;
    private $users;

    public function userAdd($login, $password, $name)
    {
        $fnames = implode(", ", array('login', 'password', 'name'));
        $fvalues = implode(", ", array("'$login'", "PASSWORD('$password')", "'$name'"));
        $sql = "INSERT INTO ".DBTBL_USERS." ($fnames) VALUES ($fvalues);";
        return MyDB::query($sql);
    }

    public function userUpdate($id, $login, $password, $name, $fname='id')
    {
        $data = array('name' => "'$name'",'login'=>"'$login'",'password'=>"PASSWORD('$password')");
        $fnames = '';
        foreach ($data as $key => $value)
            $fnames .= " $key = $value,";
        $fnames = substr($fnames, 0, -1);
        $sql = "UPDATE ".DBTBL_USERS." SET $fnames WHERE $fname = '$id';";
        return MyDB::query($sql);
    }

    public function userDelete($fvalue, $fname='id')
    {
        $sql = "DELETE FROM ".DBTBL_USERS. " WHERE $fname = '$fvalue';";
        return MyDB::query($sql);
    }

    public function getUser($id)
    {
        $arr = array("login", "id","name");
        $this->user = $this->getUsers('id', "'$id'",$arr);
        if(count($this->user) == 1)
            $this->user = $this->user[0];
        return $this->user;
    }

    public function getUsers($fname = "", $fvalue = "")
    {
        $where = "";
        if ($fname != "")
            $where = " WHERE $fname = $fvalue";
        $sql = "SELECT * FROM ".DBTBL_USERS." ".$where.";";
        $this->users = MyDB::query($sql);
        return $this->users;
    }

    public function getUserByLogin($login)
    {
        $this->user = $this->getUsers('login', "'$login'");
        if(count($this->user) == 1)
            $this->user = $this->user[0];
        $id = !(is_null($this->user)) ? @$this->user['id'] : 0;
        return $id;
    }

    public function checkUser($login, $password)
    {
        $sql = "SELECT * FROM " . DBTBL_USERS . " WHERE login = '$login' AND password = PASSWORD('$password');";
        $tmp = MyDB::query($sql);
        if(count($tmp) == 1)
            $tmp = $tmp[0];
        $id = (is_null($tmp)) ? 0 : @$tmp['id'];
        return $id;
    }
}
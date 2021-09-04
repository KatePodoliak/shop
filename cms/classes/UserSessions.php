<?php

class UserSessions extends Sessions
{
    private $mysqli;
    private $idUser;

    public function __construct($path = '')
    {
        $this->mysqli = MyDB::connect();
        parent::__construct($path);
    }

    public function checkSession()
    {
        $id = $this->getIdSession();
        $sql = "SELECT idUser FROM " . DBTBL_SESSIONS . " where idSession = '$id'";
        $res = MyDB::query($sql);
        if (count($res) > 0) {
            $res = $res[0];
        }
        $this->idUser = (is_null($res)) ? 0 : $res['idUser'];
        $this->idUser = (is_null($res)) ? 0 : $res['idUser'];
        return $this->idUser;
    }

    public function addSession($idUser, $idSession)
    {
        $fnames = implode(", ", array('idSession', 'idUser', 'dateReg', 'accessLast'));
        $fvalues = implode(", ", array("'$idSession'", "'$idUser'", "CURDATE()", 'NOW()'));
        $sql = "INSERT INTO " . DBTBL_SESSIONS . " ($fnames) values ($fvalues);";
        return MyDB::query($sql);
    }

    public function deleteSession($idSession)
    {
        $sql = "DELETE FROM " . DBTBL_SESSIONS . " WHERE idSession = '$idSession';";
        return MyDB::query($sql);
    }

    public function getUserId()
    {
        return $this->idUser;
    }
}

?>
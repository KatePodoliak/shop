<?php

class MyDB
{
    private static $mysqli = null;

    public static function connect()
    {
        if(is_null(self::$mysqli)){
            self::$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if(self::$mysqli->connect_errno){
                echo "<br>Failed to connect to MySQL: (" . self::$mysqli->connect_errno . ") " . self::$mysqli->connect_error;
                return;
            }
        }
        return self::$mysqli;
    }
    
    public static function query($sql){
        $data = Array();
        if(!is_null(self::$mysqli))
        {
            if($res = self::$mysqli->query($sql))
            {
                if(is_bool($res))
                    return $res;
                while( $row = $res->fetch_assoc())
                    $data[] = $row;
                $res->free();
            }
        }
        return $data;
    }
}
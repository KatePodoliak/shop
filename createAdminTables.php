<?php
include_once 'connect.php';

$mysqli = myDB::connect();
createTables($mysqli);

function createTables($mysqli)
{        
    if (!$mysqli->query("DROP TABLE IF EXISTS ".DBTBL_USERS.";"))
        echo "<b>Error!</b> Can't drop table ".DBTBL_USERS.": " . $mysqli->error . "<br><br>";
    if (!$mysqli->query("DROP TABLE IF EXISTS ".DBTBL_SESSIONS.";")) 
        echo "<b>Error!</b> Can't drop table ".DBTBL_SESSIONS.": " . $mysqli->error . "<br><br>";
    if (!$mysqli->query("DROP TABLE IF EXISTS ".DBTBL_NEWS.";"))
        echo "<b>Error!</b> Can't drop table ".DBTBL_NEWS.": " . $mysqli->error . "<br><br>";

    $sql = Array();

    $sql[] = "CREATE TABLE ".DBTBL_USERS."
        (
            id       INT AUTO_INCREMENT   PRIMARY KEY,
            login    VARCHAR(80) NOT NULL UNIQUE,
            password VARCHAR(80) NOT NULL,
            name     VARCHAR(80) NOT NULL DEFAULT ''

        );";

    $sql[] = "CREATE TABLE ".DBTBL_SESSIONS."
        (
            id          INT AUTO_INCREMENT PRIMARY KEY,
            idSession   VARCHAR(80) NOT NULL,
            idUser      INT         NOT NULL,
            dateReg     DATETIME    NOT NULL,
            accessLast  DATETIME
        );";
        
    $sql[] = "CREATE TABLE ".DBTBL_NEWS."
        (
            id          INT AUTO_INCREMENT PRIMARY KEY,
            url         VARCHAR(80) NOT NULL,
            name        VARCHAR(80) NOT NULL,
            content     TEXT        NOT NULL,
            dateAdd     DATETIME
        );";

    for($i = 0; $i<count($sql); $i++){
        if (!$mysqli->query($sql[$i]))
            echo "<b>Error!</b> Can't create table: " . $mysqli->error . "<br><br>";
    }
}
?>
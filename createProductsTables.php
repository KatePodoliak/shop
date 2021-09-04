<?php
include_once 'connect.php';

$mysqli = myDB::connect();
createTables($mysqli);

function createTables($mysqli)
{        
    if (!$mysqli->query("DROP TABLE IF EXISTS ".DBTBL_PRODUCTS.";"))
        echo "<b>Error!</b> Can't drop table ".DBTBL_PRODUCTS.": " . $mysqli->error . "<br><br>";
    if (!$mysqli->query("DROP TABLE IF EXISTS ".DBTBL_SECTIONS.";"))
        echo "<b>Error!</b> Can't drop table ".DBTBL_SECTIONS.": " . $mysqli->error . "<br><br>";
    if (!$mysqli->query("DROP TABLE IF EXISTS ".DBTBL_PARAMS.";"))
        echo "<b>Error!</b> Can't drop table ".DBTBL_PARAMS.": " . $mysqli->error . "<br><br>";
    if (!$mysqli->query("DROP TABLE IF EXISTS ".DBTBL_IMG.";"))
        echo "<b>Error!</b> Can't drop table ".DBTBL_IMG.": " . $mysqli->error . "<br><br>";

    $sql = Array();

    $sql[] = "CREATE TABLE ".DBTBL_SECTIONS."
        (
            id   INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(40) NOT NULL UNIQUE
        );";

    $sql[] = "CREATE TABLE ".DBTBL_PRODUCTS."
        (
            id         INT AUTO_INCREMENT   PRIMARY KEY,
            name       VARCHAR(50)          NOT NULL,
            brand       VARCHAR(50)         NOT NULL,
            img        VARCHAR(250)         NOT NULL,
            price      DECIMAL(10,2)        NOT NULL,
            code       VARCHAR(50)          NOT NULL UNIQUE,
            idSection  INT                  NOT NULL
        );";

    $sql[] = "CREATE TABLE ".DBTBL_PARAMS."
         (
            id          INT AUTO_INCREMENT PRIMARY KEY,
            name        VARCHAR(100)       NOT NULL DEFAULT '',
            value       VARCHAR(200)       NOT NULL DEFAULT '',
            idProduct   INT                NOT NULL
        );";

    $sql[] = "CREATE TABLE ".DBTBL_IMG."
        (
            id          INT AUTO_INCREMENT  PRIMARY KEY,
            name        VARCHAR(250)        NOT NULL,
            idProduct   INT                 NOT NULL
        );";

    for($i = 0; $i<count($sql); $i++){
        if (!$mysqli->query($sql[$i]))
            echo "<b>Error!</b> Can't create table: " . $mysqli->error . "<br><br>";
    }
}
?>
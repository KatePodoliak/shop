<?php
	include_once "../include/config.php";
	include_once '../classes/MyDB.php';

	spl_autoload_register(function ($class_name){
	    $inc_file = $class_name . '.php';
	    if (file_exists('models/' .$inc_file))
	        include_once 'models/' .$inc_file;
	    else if (file_exists("controllers/" . $inc_file))
	        include_once "controllers/" . $inc_file;
	    else if (file_exists("classes/" . $inc_file))
	        include_once "classes/" . $inc_file;
	});

	$mysqli = MyDB::connect();
?>
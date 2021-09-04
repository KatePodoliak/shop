<?php
	include_once 'include/config.php';
	include_once "include/library.php";
	include_once 'classes/MyDB.php'; 

	spl_autoload_register(function ($class_name){
		$inc_file = $class_name . '.php';
	   	if (file_exists("cms/models/" .$inc_file))
	        include_once "cms/models/" .$inc_file;
		if (file_exists("cms/classes/" . $inc_file))
	        include_once "cms/classes/" . $inc_file;
	});

	$mysqli = MyDB::connect();

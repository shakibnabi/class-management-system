<?php 
//database.php

define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'cms');

function DBCONN()
{
	$options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			    PDO::ATTR_PERSISTENT => false,
			    PDO::ATTR_EMULATE_PREPARES => false,
			    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
              );
	try {

		$db = new PDO(DB_DRIVER.':host='.DB_SERVER.';dbname='.DB_DATABASE,DB_USER,DB_PASS,$options);
		
	} catch (Exception $e) {
		
		echo $e->getMessage();
		die;
	}

	return $db;
}

 ?>

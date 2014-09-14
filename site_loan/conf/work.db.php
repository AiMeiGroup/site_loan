<?php
//$main_database = array(
//	'host' => '127.0.0.1',
//	'port' => 33066,
//	'database' => 'rms',
//	'user' => 'root',
//	'password' => 'abcd*123456',
//	'charset' => 'utf8',
//);

$main_database = array(
	'host' => '127.0.0.1',
	'port' => 3306,
	'database' => 'rms',
	'user' => 'root',
	'password' => 'abcd*12345',
	'charset' => 'utf8',
);

return array(
	'session' => $main_database,
	'user' => $main_database,
	'requestmanage' => $main_database,
	'postman' => array(
		'host' => '192.168.85.214',
		'port' => 33066,
		'database' => 'postman',
		'user' => 'root',
		'password' => 'abcd*12345',
		'charset' => 'utf8',
	),
);


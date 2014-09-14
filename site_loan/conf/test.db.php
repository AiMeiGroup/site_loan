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
	'host' => '192.168.85.213',
	'port' => 3306,
	'database' => 'rms-test',
	'user' => 'rms',
	'password' => 'abcd*1234',
	'charset' => 'utf8',
);

return array(
	'session' => $main_database,
	'user' => $main_database,
	'requestmanage' => $main_database,
);


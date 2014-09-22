<?php
$default_id_maker = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'default',
	'start' => '1',
);

$person_id_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'person',
	'start' => '1',
);

$role_id_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'role',
	'start' => '1',
);

$task_id_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'task',
	'start' => '1',
);

$comment_id_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'comment',
	'start' => '1',
);

$bug_id_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'bug',
	'start' => '1',
);

$bug_comment_id_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'bug_comment',
	'start' => '1',
);

$user_id_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'user',
	'start' => '1',
);

$version_id_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'version',
	'start' => '1',
);


$dept_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'dept',
	'start' => '1',
);

$market_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'market',
	'start' => '10000000',
);

$menu_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'sys_menu',
	'start' => '1',
);


$user_group_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'sys_user_group',
	'start' => '1',
);

$sys_model_make = array(
	'maker' => '\App\Api\Dao\IdMakerTable',
	'name' => 'sys_model',
	'start' => '1',
);

return array(
	'default' => $default_id_maker,
	'user' => $user_id_make,
	'dept' => $dept_make,
	'person' => $person_id_make,
	'role' => $role_id_make,
	'version' => $version_id_make,
	'comment' => $comment_id_make,
	'task' => $task_id_make,
	'bug' => $bug_id_make,
	'bug_comment' => $bug_comment_id_make,
	'market' => $market_make,
	'sys_user_group' => $user_group_make,
	'sys_menu' => $menu_make,
	'sys_model' => $sys_model_make,

);

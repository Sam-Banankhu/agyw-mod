<?php
ob_start();
date_default_timezone_set("Africa/Blantyre");

$action = $_GET['action'];
require 'controller.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
// if($action == 'logout2'){
// 	$logout = $crud->logout2();
// 	if($logout)
// 		echo $logout;
// }

if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'update_user'){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'save'){
	$save = $crud->save();
	header('Content-Type: application/json');
	echo $save;
}

if($action == 'search'){
	$results = $crud->search();
	if($results)
		echo $results;
}

if($action == 'get'){
	$results = $crud->get();
	if($results)
		echo $results;
}

if($action == 'fetch'){
	$results = $crud->fetch();
	if($results)
		echo $results;
}

if($action == 'verify'){
	$results = $crud->verify();
	if($results)
		echo $results;
}

ob_end_flush();
?>

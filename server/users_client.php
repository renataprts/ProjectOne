<?php
include ("users.php");



if(isset($_GET['users'])){
	if(isset($_GET['users_id'])){
		$usersClass = new Users();
		$users_info = $usersClass->get_user_info($_GET['users_id']);
	    echo json_encode($users_info);
	}
}

if(isset($POST['username']) && isset($POST['password'])){
	$users = new Users();
	$users->insert_user($POST['username'], $POST['password']);
	
	
}


?>
<?php
include ("users.php");



if(isset($_GET['users'])){
	if(isset($_GET['users_id'])){
		$usersClass = new Users();
		$users_info = $usersClass->get_user_info($_GET['users_id']);
	    echo json_encode($users_info);
	}
}

if(isset($_POST['username']) && isset($_POST['password'])){
	$users = new Users();
	$users->insert_user($_POST['username'], $_POST['password']);
	
}


if(isset($_GET['username'])){
	$usersClass = new Users();
	$users_info = $usersClass->get_user_username($_GET['username']);
	var_dump($users_info);
	if($_GET['username'] == $users_info['username']){
		echo "I GOT THE SAME VALUE!";	
	} else {
		echo "I GOT WRONG VALUES!";	
	}
	
}

if(isset($_GET['password'])){
	$usersClass = new Users();
	$users_info = $usersClass->get_user_password($_GET['password']);
	var_dump($users_info);
	if($_GET['password'] == $users_info['password']){
		echo "I GOT THE SAME PASSWORD VALUE!";	
	} else {
		echo "I GOT WRONG PASSWORD VALUES!";	
	}
	
}



?>
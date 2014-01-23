<?php
include ("users.php");

if(isset($_GET['allusers'])){
	$users = new Users();
	echo json_encode($users->get_all_users());
	
}

if(isset($_GET['user'])){
	if(isset($_GET['id'])){
		$users = new Users();
	    echo json_encode($users->get_user_by_id($_GET['id']));
	}
}


?>
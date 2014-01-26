<?php
include ("user.php");
if (isset($_GET['user'])){
	if(isset($_GET['username']) && isset($_GET['password'])){
		$userClass = new User();
		$user_id = $userClass->get_userid($_GET['user_name'], $_GET['password']);
		$user_info = $userClass->get_user_info($user_id);
		echo json_encode($user_info);
	}
}

?>

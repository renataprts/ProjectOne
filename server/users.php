<?php
include ("../db/user_db.php");
include ("../db/picture_db.php");

class User{
	
	private $userDB;
	private $picDB;
	
	function __construct(){
		$userDB = new User_db();
		$picDB = new Picture_db();
	}
	
	function get_user_info($id){
		$this->userDB->set_user_id($id);
		$this->picDB->set_user_id($id);
		
		$userDB= $this->userDB->get_user_by_id();
		$picDB = $this->picDB->get_pictures_by_user_id();
		
		$user["pics"] = $pics;
		
		return $user;
	}
	
	function get_user_id($username, $password) {
		$this->userDB->set_user_name($username);
		$this->userDB->set_pasword($password);
		$id = $this->userDB->get_user_id_by_name_pass();
		
		return $id;
		}
}

?>

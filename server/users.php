<?php
include ("../db/users_db.php");
include ("../db/portfolios_db.php");


class Users{
	private $usersDB;
	private $portfoliosDB;
	
	function __construct(){
		$this->usersDB = new Users_db();
		$this->portfoliosDB = new Portfolios_db();
			
		}
		
	function get_user_info($id){
		$this->usersDB->set_user_id($id);
		$this->portfoliosDB->set_user_id($id);
			
		$users = $this->usersDB->get_user_by_id();
		$portfolios = $this->portfoliosDB->get_portfolios_by_user_id();
			
		$users["portfolios"] = $portfolios;
			
		return $users;
		
	}
	
	
	function insert_user($username, $password){
		$this->usersDB->set_username($username);
		$password = md5($password);
		$this->usersDB->set_password($password);
		$id = $this->usersDB->insert_users();
		if(is_numeric($id)){
			return $id;
		}
	}
	
	function login($username, $password){
		
	}
	
	
	function get_user_username($username){
		$this->usersDB->set_username($username);
			
		$users = $this->usersDB->get_user_by_username();
			
		$users["username"] = $username;
			
		return $users;
		
	}
	
	
	function get_user_password($password){
		$this->usersDB->set_password($password);
			
		$users = $this->usersDB->get_user_by_password();
			
		$users["password"] = $password;
			
		return $users;
		
	}
	
	
	
}

/*
$users = new Users();
$userinf = $users->get_user_info(2);
echo "<pre>";
var_dump($userinf["portfolios"]);
echo "</pre>";
*/
?>
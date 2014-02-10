<?php
include("connect.php");

class Users_db {
	private $c_con;
	private $users_id;
	private $username;
	private $password;
	
	
	
	function __construct(){
		global $con;
		$this->c_con = $con;
		
	}
	
	function get_all_users(){
	global $con;
	$query = "SELECT * FROM users";
    $result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	 while ($row = mysqli_fetch_array($result)){
	     $arr[$row['id']] = $row;  
    }
    return $arr;
		
	}
	
	function get_user_by_id(){
	$query = "SELECT * FROM users WHERE id=".$this->users_id;
    $result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	 while ($row = mysqli_fetch_array($result)){
	$arr[$row['id']] = $row;  
}
    return $arr;
		
	}
	
	function set_user_id($id){
		$this->users_id = $id;
	}
	
	

	
	function set_username($name){
			$this->username = $name;
			
		}
		
	function set_password($password){
			
			$this->password = $password;
		}
		
	function insert_users(){
	$query = "INSERT INTO users (username, password) VALUES ($this->username, $this->password)";
	$result = mysqli_query($this->c_con, $query);
	
	if ($result) {
		echo "Successfully...";
		return mysqli_insert_id();

}
			
		}
	
}

/*
$users = new Users_db();
$allusers = $users->get_all_users();

echo "<pre>";
var_dump($allusers);
echo "</pre>";


$users = new Users_db();
$users->set_user_id(2);
$theUser = $users->get_user_by_id();

echo "<pre>";
var_dump($theUser);
echo "</pre>";
*/

?>
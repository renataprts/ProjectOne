<?php
include("connect.php");

class User_db {
	private $c_con;
	private $user_id;
	
	
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
		$query = "SELECT * FROM users WHERE id=".$this->user_id;
    $result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	 while ($row = mysqli_fetch_array($result)){
	$arr[$row['id']] = $row;  
}
    return $arr;
		
	}
	
	function set_user_id($id){
	   $this->user_id = $id;
}
}

/*
$users = new User_db();
$allusers = $users->get_all_users();

echo "<pre>";
var_dump($allusers);
echo "</pre>";


$users = new User_db();
$users->set_user_id();
$theUser = $users->get_user_by_id();

echo "<pre>";
var_dump($theUser);
echo "</pre>";
*/

?>
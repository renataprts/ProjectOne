<?php
include("connect.php");

class Portfolios_db {
	private $c_con;
	private $portfolios_id;
	private $users_id;
	
	
	
	function __construct(){
		global $con;
		$this->c_con = $con;
		
	}
	
	function get_all_portfolios(){
	global $con;
	$query = "SELECT * FROM portfolios";
    $result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	 while ($row = mysqli_fetch_array($result)){
	$arr[$row['id']] = $row;  
}
    return $arr;
		
	}
	
	
	
	function get_portfolios_by_id(){
	$query = "SELECT * FROM portfolios WHERE id=".$this->portfolios_id;
    $result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	 while ($row = mysqli_fetch_array($result)){
	$arr[$row['id']] = $row;  
}
    return $arr;
	
	}
	
	function get_portfolios_by_user_id(){
		$query = "SELECT * FROM portfolios
		LEFT JOIN users_portfolios ON users_portfolios.portfolios_id = portfolios.id
		LEFT JOIN users ON users.id = users_portfolios.users_id
		WHERE users.id = ".$this->users_id;
		
		$result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	 while ($row = mysqli_fetch_array($result)){
	$arr[$row['id']] = $row;  
}
    return $arr;
	
	}
	
	function set_portfolios_id($id){
		$this->portfolios_id = $id;
	}
	
	function set_user_id($id){
		$this->users_id = $id;
		
	}
	
}
	
/*
$ports = new Portfolios_db();
$allportfolios = $ports->get_all_portfolios();

echo "<pre>";
var_dump($allportfolios);
echo "</pre>";


$users = new Portfolios_db();
$users->set_user_id(4);
$theUser = $users->get_portfolios_by_user_id();

echo "<pre>";
var_dump($theUser);
echo "</pre>";



$users = new Portfolios_db();
$users->set_user_id(1);
$theUser = $users->get_portfolios_by_user_id();

echo "<pre>";
var_dump($theUser);
echo "</pre>";
*/

?>
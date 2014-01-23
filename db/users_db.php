<?php
include("connect.php");

class Users_db {
	
	private $user_id;
	
	function set_user_id($id){
		$this->user_id = $id;
	}
	
	function get_user_id($id){
		return $this->user_id;
	}
	
	function get_users(){
		global $con;
		$query = "SELECT * FROM users";
		$result = mysqli_query($con, $query);
		
		$users = array();
		$users_data = array();
		while ($row = mysqli_fetch_array($result)){
			$users_data['username'] = $row['username'];
			$users_data['description'] = $row['description'];
			$users_data['avatar'] = $row['avatar'];
			$users[$row['id']] = $users_data;
}

    //var_dump($users); //HERE FOR TESTING PURPOSES
    return $users;
		
	}
	
	function get_user_by_id(){
		global $con;
		
		//"$this->" is to call the variable outside of the function
		$query = "SELECT * FROM users WHERE id = ".$this->user_id;
		$result = mysqli_query($con, $query);
		
		
		$users_data = array();
		while ($row = mysqli_fetch_array($result)){
			$users_data['username'] = $row['username'];
			$users_data['description'] = $row['description'];
			$users_data['avatar'] = $row['avatar'];
			
}

    //var_dump($users); //HERE FOR TESTING PURPOSES
    return $users_data;
		
	}

}

/*$mydb = new User_db();
$allusers = $mydb->get_users();

foreach($allusers as $id => $user_arr){
	
	$mydb->set_user_id($id);
    $mydb->get_user_by_id();
}*/



?>
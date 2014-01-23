<?php
include ("../db/users_db.php");

class Users{
	private $users_db;
	
	function __construct(){
		$this->users_db = new Users_db();
		//just to show you what it does when it starts echo "Start This";
		
	}
	
	
	function get_all_users(){
		return $this->users_db->get_users();
		
		
}

     function get_user_by_id($id){
		 $this->users_db->set_user_id($id);
		 return $this->users_db->get_user_by_id();
	 }

}

/*$users = new Users();
$var = $users->get_all_users();
$var2 = $users->get_user_by_id(1);

var_dump($var);
var_dump($var2);
*?

?>
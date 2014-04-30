<?php
include ("../db/users_db.php");
include ("../db/portfolios_db.php");


class Portfolios{
	private $usersDB;
	private $portfoliosDB;
	
	function __construct(){
		$this->usersDB = new Users_db();
		$this->portfoliosDB = new Portfolios_db();
			
		}
		
		function get_portfolios_info($id){
		$this->portfoliosDB->set_portfolios_id($id);
		
			
		$portfolios = $this->portfoliosDB->get_portfolios_by_id();
		
			
		$portfolios["portfolios"] = $portfolios;
			
		return $portfolios;
		
	}
		
	
	function insert_portfolios($splashlink, $title, $description){
		$this->portfoliosDB->set_splashlink($splashlink);
		$this->portfoliosDB->set_title($title);
		$this->portfoliosDB->set_description($description);
		$id = $this->portfoliosDB->insert_portfolios();
		return $id;
		
	}
	
	
	function get_portfolios_splashlink($splashlink){
		$this->portfoliosDB->set_splashlink($splashlink);
			
		$portfolios = $this->portfoliosDB->get_portfolios_by_splashlink();
			
		$portfolios["splashlink"] = $splashlink;
			
		return $portfolios;
		
	}
	
	
	function get_portfolios_title($title){
		$this->portfoliosDB->set_title($title);
			
		$portfolios = $this->portfoliosDB->get_portfolios_by_title();
			
		$portfolios["title"] = $title;
			
		return $portfolios;
		
	}
	
	
		function get_portfolios_description($description){
		$this->portfoliosDB->set_description($description);
			
		$portfolios = $this->portfoliosDB->get_portfolios_by_description();
			
		$portfolios["description"] = $description;
			
		return $portfolios;
		
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
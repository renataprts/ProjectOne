<?php
include("connect.php");

class Image_db {
	private $c_con;
	private $image_id;
	private $portfolios_id;
	
	
	
	function __construct(){
		global $con;
		$this->c_con = $con;
		
	}
	
	function get_all_image(){
	global $con;
	$query = "SELECT * FROM image";
    $result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	 while ($row = mysqli_fetch_array($result)){
	     $arr[$row['id']] = $row;  
    }
    return $arr;
		
	}
	
	function get_image_by_id(){
	$query = "SELECT * FROM image WHERE id=".$this->image_id;
    $result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	if($result){
		while ($row = mysqli_fetch_array($result)){
			$arr[$row['id']] = $row;  
		}
	}
    return $arr;
		
	
	}
	
	function get_image_by_portfolios_id(){
		$query = "SELECT * FROM image
		LEFT JOIN portfolios_image ON portfolios_image.image_id = image.id
		LEFT JOIN portfolios ON portfolios.id = portfolios_image.portfolios_id
		WHERE portfolios.id = ".$this->portfolios_id;
		
		$result = mysqli_query($this->c_con, $query);
	
	$arr = array();
	 while ($row = mysqli_fetch_array($result)){
	$arr[$row['id']] = $row;  
}
    return $arr;
	
	}
	
	function set_image_id($id){
		if(is_numeric($id)){
			$this->img_id = $id;
		} else{
				$this->error = "PICTURE ID IS NOT VALID";
				
			}
			
		}
	
	
	function set_portfolios_id($id){
		if(is_numeric($id)){
			$this->port_id = $id;
		} else{
				$this->error = "PORTFOLIO ID IS NOT VALID";
				
			}
			
		}
}

/*
$image = new Image_db();
$allimage = $image->get_all_image();

echo "<pre>";
var_dump($allimage);
echo "</pre>";


$image = new Image_db();
$image->set_image_id(2);
$theImage = $image->get_image_by_id();

echo "<pre>";
var_dump($theImage);
echo "</pre>";
*/

?>
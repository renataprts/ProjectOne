<?php
ini_set("display_errors",1);
$con=mysqli_connect("localhost", "root" , "root" , "projectOne");

if(mysqli_connect_errno()){
	//failed to connect
	echo "failed to connect" .mysqli_connect_error();
}

$username=$_POST['username'];
$password=$_POST['password'];


$query = "INSERT INTO Users (username, password) VALUES ('$username','$password')";
$result = mysql_query($query);
if ($result) {
echo "Successfully...<br>";

}

?>
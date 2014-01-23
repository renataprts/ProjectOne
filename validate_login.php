<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHP Include Website Template</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body>

<div id="contentvalidateLogin">

<div id="validate">
<?php
$username= $_POST["username"];

$password = $_POST['password'];



$con=mysql_connect("localhost","renatapr_user","brigadeiros");
if(! $con)
{
        die('Connection Failed'.mysql_error());
}
mysql_select_db("renatapr_database",$con);



$result=mysql_query("select * from email_activation where username='$username' AND password='$password'");


$row=mysql_fetch_array($result);

if($row["username"]!=$username && $row["password"]!=$password)
        echo"Please try again!" . "<br>" . "If you are not registered click on the button" . "<br/>" . "<br/>" . '<a href="registration.php"><img src="images/registrationBtn.png"></a>' . "<br>";
   else
        echo"Welcome!To leave a comment <br/> just click on the button" . "<br/>" . "<br/>" . '<a href="comment.php"><img src="images/commentBtn.png" /></a>';
 ?>
</div> 
</div>  
       


</div>
</body>
</html>
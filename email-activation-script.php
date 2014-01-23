<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHP Include Website Template</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
 
<body>
<div id="contentScript">
  
<div id="emailActivation">

<?php
ini_set("display_errors",1);

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$db_host = "localhost";
$db_name = "renatapr_database";
$db_use = "renatapr_user";
$db_pass = "brigadeiros";
$link = mysql_connect($db_host, $db_use, $db_pass);
mysql_select_db($db_name, $link);
$chars = array("1","2","3","4","5","6","7","8","9");
$length = 6;
$textstr = "";
for ($i=0; $i<$length; $i++) {
   $textstr .= $chars[rand(0, count($chars)-1)];
}
$query = "INSERT INTO email_activation (firstname, lastname, username, email, password, activation) VALUES ('$firstname', '$lastname', '$username','$email','$password','$textstr')";
$result = mysql_query($query);
if ($result) {
echo "Successfully...<br>";
$mail_to="$email";
$mail_subject="Email Activation";
$mail_body = "This is the email to activate your account.\n";
$mail_body.="Your activation code is: $textstr \n";
$mail_body.="Click the following link to activate your account.\n";
$mail_body.="<a href='activation-form.php?username=$username&activation=$textstr'>Click here</a>";
$sent = mail($mail_to,$mail_subject,$mail_body, "Content-type: text/html; From: renataprts@yahoo.com");
echo "An activation code was sent to your email.Click the following link to activate your account:<br><a href='activation-form.php?username=$username&activation=$textstr'>Click here</a>";
}else{
echo "Failed to sent email activation code";
}
?>
</div>



</div> 

</body>
</html>
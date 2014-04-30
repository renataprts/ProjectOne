<?php
  include("connect.php");
  $id=$_GET['image_id'];
  $sql="SELECT * from portfolios where id='$id'";
 
  $query=mysql_query($sql) or die(mysql_error());
 
  while($result=mysql_fetch_array($query)){		
    header("Content-type:".$result['type']);
    header('Content-Disposition: inline; filename="'.$result['name'].'"');
    echo $result['splashlink'];			
  }
?>
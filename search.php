<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css">
<title>Untitled Document</title>
</head>

<?php

 
 // Otherwise we connect to our Database 
 mysql_connect("localhost", "root", "root") or die(mysql_error()); 
 mysql_select_db("projectOne") or die(mysql_error()); 
 


    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM portfolios
            WHERE (`splashlink` LIKE '%".$query."%') OR (`title` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['splashlink']."</h3>".$results['title']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
	}
 ?> 
<body>
<div class="header">
    
    <div id="topLogo">
        <a href="../projectone/home.html"><img src="../projectone/images/logo.png"></a>
    </div>
    <div id="topText">
          <p>
          <a href="../projectone/index.html"class="nounderline">Sign Up</a> &nbsp;&nbsp;&nbsp;&nbsp;
          <a href="../projectone/login.html"class="nounderline">Sign In </a>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="../projectone/Homeportfolio.html"class="nounderline"> Upload</a>
          </p>
     </div>
    
    <div id="searchBox">
        <form action="../projectone/search.php" method="GET">
              <input type="text" name="query" style="width: 300px; height: 35px; "/>
              <input type="submit" value="Search" style="width: 80px; height: 75px; font-size:24px; "/>
         </form>
    </div> 
</div>

<div class="content">
	
	
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<title>Project1</title>

<link href="style.css" rel="stylesheet" type="text/css">
</head>
<style>
/*HENRY's CODES*/
#portfolios {
	background-color:none;
	color:#FFF;
	margin-left:50px;
	margint-top:105px;
	width:50px;
	height:50px;
}
</style>



<script>
$(document).ready(function(e){
	
	/*var port_id = 1; //gets porfolio with id 1, figure out which port id the user has made and put it in this variable
	$.get("server/portfolios_client.php", {portfolios:true , portfolios_id:port_id}, function(data){
		var j_data = $.parseJSON(data); //parse th data into a JSON object
		var title = "<h1>"+j_data[port_id].title+"</h1>"; //puts the porfolio title into an html tag
		var desc = "<h3>"+j_data[port_id].description+"</h3>"; //puts the description into an html tag	
		var splash = "<img src='"+j_data[port_id].splashlink+"' />"; //puts the splashlink into an html tag
		$("#portfolios").append(title+desc+splash); //append them into a div I created below
    });*/
	//CODE END
	
	$("#insert_but").click(function(e){
		
  var splashlink = $("#splashlink").val();
  var title = $("#title").val();
  var description = $("#description").val();
  
  
  $.post("server/portfolios_client.php", {splashlink:splashlink, title:title, description:description}, function(data){
	  //console.log(data);
	 
	  var port_id = parseInt(data);
	  $.get("server/portfolios_client.php", {portfolios:true , portfolios_id:port_id}, function(n_data){
		console.log(n_data, port_id);
		var j_data = $.parseJSON(n_data); //parse th data into a JSON object
		var title = "<h1>"+j_data[port_id].title+"</h1>"; //puts the porfolio title into an html tag
		var desc = "<h3>"+j_data[port_id].description+"</h3>"; //puts the description into an html tag	
		var splash = "<img src='"+j_data[port_id].splashlink+"' />"; //puts the splashlink into an html tag
		  alert('Succesfull upload');
		$("#portfolios").append(title+desc+splash); //append them into a div I created below
    });
 });
       $.get("server/portfolios_client.php", {portfolios:true , portfolios_id:true}, function(data){
	         //var j_data = $.parseJSON(data);
	         console.log(data);

       });
  });
  
  
  /*$.get("server/portfolios_client.php", {}, function(n_data){
		var j_data = $.parseJSON(n_data); //parse th data into a JSON object
		//the loop to loop through individual data in each object
		for (var key in j_data){ //key is the porfolio id so replace the port id with key
			var title = "<h1>"+j_data[port_id].title+"</h1>"; //puts the porfolio title into an html tag
			var desc = "<h3>"+j_data[port_id].description+"</h3>"; //puts the description into an html tag	
			var splash = "<img src='"+j_data[port_id].splashlink+"' />"; //puts the splashlink into an html tag
			$("#portfolios").append(title+desc+splash); //append them into a div I created below
		}
		
    });*/
});
</script>





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
	<!--HENRY's CODES-->
    <div id='portfolios'>
    
    </div>
    <!--CODE END-->
    
	<div id="subContent">
		<div id="PortinsertForm">

		Splash Image:&nbsp; <input type='text' id='splashlink' style="width: 300px; height: 35px; "/><div>
        <input name="userfile" type="file" /><br><br></div>
		Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type='text' id='title' style="width: 300px; height: 35px; "/><br><br>
		Description:&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' id='description' style="width: 300px; height: 35px; "/><br>
		<input type='button' value='Insert' id='insert_but' style="width: 80px; height: 75px; font-size:24px; " />

		</div>
	</div>
</div>

</body>
</html>

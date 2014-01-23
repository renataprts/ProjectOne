<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHP Include Website Template</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>
<script>
$(document).ready(function(){
	$.ajaxSetup({cache:false});
	$.getScript('//connect.facebook.net/en_UK/all.js', function(){
		//console.log(FB);
		FB.init({
		appId:"327663217374210",
		channelUrl:"//localhost:8888/articles/channel.html",
		xfbml: true
		});
		FB.Event.subscribe('auth.login', function(resp){
					console.log(resp);
					FB.api("/me", function(m_resp){
							console.log(m_resp);
						$.post("facebook_login.php", {"insert":true, "fb":resp.authResponse.userID, "username":m_resp.name}, function(p_resp){
							console.log(p_resp);
						window.location="http://canadamaisinfo.com/SophiesBriggs/comment.php"
							});
						});
			});
			
			
			//console.log(FB);
			FB.getLoginStatus(function(resp){
				console.log(resp);
				if(resp.status=="not_authorized"){
						console.log("na");
					
				}	
				else if(resp.status=="unknown"){
						console.log("un");
					
				}
				if(resp.status=="connected"){
					//console.log(resp);
					var num = resp.authResponse.userID;
					$.get("facebook_login.php", {"fb":resp.authResponse.userID}, function(p_resp){
						
					});
						FB.api("/me", function(resp){
						console.log(resp);
					});
					
				}
			});
		
		});
	});
			
			
</script>



<body>
<?php include "layout.php"?>

<div id="contentLogin">





<div id="loginForm"> 
<p1>If you are not registered,<br> please click on the registration button<br /><br /><a href="registration.php"> 
<img src="images/registreBtn.png"></a></p1><br /><br /><br /><br />    
<form method="post" action="validate_login.php" >
<label for="username">Username:</label>
<input type="text" id="username" name="username"><br /><br />
<label for="password">Password:</label>
<input type="password" id="password" name="password"><br /><br />
<div id="lower">
<input type="checkbox"><label for="checkbox">Keep me logged in</label>
<input type="submit" id="submit" value="Login">
</div><!--/ lower-->
</form>
</div>


   

<div id ='fb-root'></div>
<script>
 window.fbAsyncInit = function() {
    FB.init({
      appId      : '327663217374210',
      channelUrl:"//localhost:8888/articles/channel.html", 
      status     : true, 
      cookie     : true, 
      xfbml      : true  
    });
FB.Event.subscribe('auth.authResponseChange', function(response) {
  
    if (response.status === 'connected') {
     
      testAPI();
    } else if (response.status === 'not_authorized') {
      
      FB.login();
    } else {
    
      FB.login();
    }
  });
  
  };

(function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }
</script>


<div id="loginBtn"><fb:login-button width="200" max-rows="1"></fb:login-button></div>

<div id="logoutBtn">
<script>
function fbLogout() {
        FB.logout(function (response) {
            //Do what ever you want here when logged out like reloading the page
            window.location="http://canadamaisinfo.com/SophiesBriggs/index.php"
        });
    }
</script>

<span id="fbLogout" onclick="fbLogout()"><a class="fb_button fb_button_medium"><span class="fb_button_text"><input type="button" value="Logout"></span></a></span></div>



</div>






</body>
</html>
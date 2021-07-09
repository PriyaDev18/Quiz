<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Educurve Quiz</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
	<div class="header">
		<h2>Educurve Quiz

	<ul class="HorizontalBar">
		<li><a href="index.php">Home</a></li>
		<li><a href="login.php">Login</a></li>
	</ul>
</div>

 <div class="popup popup-close" id="popupBox" >
    <div class="popup-cont">
      <button type="button" class="close">×</button>
       <div class="alert">
        <strong>Warning!</strong> <br>
        <p id="msg-lbl">This functionality is disabled!!!.</p>
       </div>
       
    </div>
  </div>

<div>
 <ol class="how-to">
	<li>You can test your programming skills with this Quiz.</li>
	<li>If you have already signed up click Login Button</li>
	<li>Are you new to this click on Sign up Button</li>
	<li>You can retake the test multiple times.</li>
	<li>While clicking on the Submit your total score will be displayed.</li>
	
</ol>
</div>
<div class="button-grid">
	<div class="signup">
	<a href="register.php"><div class="btn">
	Sign Up
	</div></a>
  </div>
  <div class="login">
	<a href="login.php"><div class="btn">Log In
	</div> </a>
 </div>
</div>


<div class="footer">
	<h3>Copy rights reserved</h3>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="JS/validation.js"></script>
<script type="text/javascript">
	var redirect="";
	var popupEle="";
	$(document).bind("contextmenu",function(e){
		if( e.button == 2 ) {
           popupEle="popupBox";
         	popupOpen(popupEle);
            return false;
        } else {
            return true;
        }
    });
    $('.close').click(function(){
    popupClose(popupEle,redirect);
    
  });
</script>
</script>
</body>
</html>
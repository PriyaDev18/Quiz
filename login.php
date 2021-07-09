

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
<body class="bg">
	

<div class="popup popup-close" id="popupBox" >
    <div class="popup-cont">
      <button type="button" class="close">×</button>
       <div class="alert">
        <strong>Warning!</strong> <br>
        <p id="msg-lbl">This functionality is disabled!!!.</p>
       </div>
       
    </div>
  </div>
<div class="login-block">
	<div class="login-header">
	<h2>Educurve Quiz
    </div>
	<div class="login-div">
			<div>
	<h3>LOGIN</h3>
	</div>
	<form method="post"action="signin.php">
		<div>
	 	<label for="exampleInputPassword1">User Name</label>
     	<input type="text" placeholder="User Name" id="firstname" class="" name="firstname" required>
 		</div>
 		<div>
       <label for="exampleInputPassword1">Password</label>
       <input type="password" class="" id="password" name="password" placeholder="Password" required  autocomplete="off" data-error="Please enter your Subject" />
      <input type="submit" name="save" class="btn" value="Login" id="butlogin"> 
  		</div>
  		 </form>
	</div>
 
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

</body>
</html>
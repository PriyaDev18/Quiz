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
    <!-- <li><a href="index.html">Settings</li>
    <li><a href="index.html">About us</li> -->
  </ul>
</div>
<div class="reg-wrapper">
  <button type="button" class="hidden" id="popupBtn">Open popup
  </button>
  <div class="popup popup-close" id="popupBox" >
    <div class="popup-cont">
      <button type="button" class="close">×</button>
       <div class="alert">
        <strong>Warning!</strong> <br>
        <p id="msg-lbl">This alert box could indicate a successful or positive action.</p>
       </div>
       
    </div>
  </div>


<div class="register-block">
   <h4 class="reg-title">Register Here</h4>
    <form  method='post' autocomplete="off" id="regForm">
  <div>
   <label for="exampleInputPassword1">User Name</label>
     <input type="text" placeholder="User Name" id="firstname" class="reg-inp" name="firstname" required>
 </div>
 
     <div>
       <label for="exampleInputPassword1">Email</label>
       <input type="email" class="reg-inp" id="email" name="email" placeholder="Email" required data-error="Please enter your email">
      <span class="check-mail hidden">*Password maximum have 8 characters*  </span>
      </div>
      <div>
      <label for="exampleInputPassword1"> Mobile Number</label>
      <input type="text" class="reg-inp" id="mobile" name="mobile" placeholder="Mobile number" required data-error="Please enter your mobile number">
  </div>
  <div>
       <label for="exampleInputPassword1">Password</label>
       <input type="password" class="reg-inp" id="password" name="password" placeholder="Password" required  autocomplete="off" data-error="Please enter your Subject" />
      <span class="check-len">*Password maximum have 8 characters*  </span><span class="hidden spec-char">*Alteast have one speacial character*</span>
  </div>
  <div>
       <label for="exampleInputPassword1">Confirm Password</label>
       <input type="password" class="reg-inp" id="confirm_password" placeholder="Confirm Password" required data-error="Please enter your Subject">
   </div>
   <div>
        <input type="button" name="save" class="btn hvr-hover" value="Sign Up"id="regsave">
    </div>
  </form>
 </div>
</div>

<div class="footer">
  <h3>Copy rights reserved</h3>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="JS/validation.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   
   

    $("<div id='dim-bg' class='dim dim-close'></div>").insertAfter(".header");
    var popupEle="";
    var redirect="";
    /* disable right click*/
     $(document).bind("contextmenu",function(e){
    if( e.button == 2 ) {
      $('#msg-lbl').text("This functionality is disabled!!!.");
           popupEle="popupBox";
          popupOpen(popupEle);
            return false;
        } else {
            return true;
        }
    });
  $('#popupBtn').click(function(){
    $("#popupBox").removeClass('popup-close');
    $("#popupBox").addClass('popup-open');
    $('#dim-bg').addClass("dim-open");
    $('#dim-bg').removeClass("dim-close");
  });
  
  $('.close').click(function(){
    popupClose(popupEle,redirect);
    
  });

  /* register btn click functionality*/
  $('#regsave').on('click', function() {
      $("#regsave").attr("disabled", "disabled");
      var username = $('#firstname').val();
      var email = $('#email').val();
      var mobile = $('#mobile').val();
      var password = $('#password').val();
      var confirm_password = $('#confirm_password').val();
      if(username!="" && email!="" && mobile!="" && password!="" && confirm_password!=""){
        $.ajax({
        url: "register_insert.php",
        type: "POST",
         data: {
           username: username,
           email: email,
           mobile: mobile,
           password: password,
         },
        cache: false,
        success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        console.log(dataResult);
        if(dataResult.statusCode==200){
         $("#regsave").removeAttr("disabled");
         $('.popup-cont').addClass('success-popup');
         $('.alert strong').text('Success!!');
         $('#msg-lbl').text("Registered Successfully");
         $('#popupBtn').click(); 
         redirect="login.php";
         popupEle="popupBox";
         popupOpen(popupEle);     
                
       }
        else if(dataResult.statusCode==201){
        $('.alert strong').text('Warning!!');
        $('#msg-lbl').text('Error occured !')
        $('#popupBtn').click();  
            
       }
        else if(dataResult.statusCode==202){
        $('#msg-lbl').text('The user already exist!!')
        $('#popupBtn').click();
        setTimeout(function(){ 
        location.reload();
        }, 600);   
        
        }
        }
        });
       }
        else{
        $('#msg-lbl').text('Please fill all the field !!')
        popupEle="popupBox";
        redirect="";
         popupOpen(popupEle);

        }
    });

}); 
</script>
</body>
</html>
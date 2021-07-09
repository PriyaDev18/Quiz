<?php 
session_start();

include './retrive.php';

$qus = new retrive;
$qus->qus_show($conn);
$score = new retrive;
$score->score_show($conn);

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
		<li class="score-list"><a href="#">Score</a></li>
		
		
	</ul>
</div>


<div class="quiz-block">

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
	<div class="score-board hidden">
	 	<button type="button" class="score-close">×</button>
	 	<label class="username hidden"><?php echo $_SESSION['username'];?></label>
	 	<label class="userid hidden"><?php echo $_SESSION['id'];?></label>
		<h3>User:<?php echo $_SESSION['username'];?></h3>
		<table>
			<thead>
				<?php
					$id = $_SESSION['id'];
                    $sql="SELECT * from score_details WHERE user_id=$id ";
                    
                    $result = mysqli_query($conn, $sql);
                    $numrows=mysqli_num_rows($result);
                    if($numrows>0){
                    while( $row = mysqli_fetch_assoc($result) ){
                        echo
                        "<tr>
                        <td>Date : $row[date]</td>
                        <td>Score: $row[score]</td>
                        </tr>";
                        }
                    }
                    else{
                    	echo "No score found!!";
                    }
                    ?>
			</thead>
		</table>
		
    </div>
	 <div class="popup score-block popup-close" id="scoreDiv">
	 	<button type="button" class="score-close">×</button>
		<h3>Congrdualtions!!!You have  Completed Successfully!!!</h3>
		<h4 >Your Score is <span class="score"></span></h4>
		
		
    </div>
    
<form method="post"  id="form1"  action="retrive.php">
<?php 
  $i=1;
  foreach($qus->qus as $qust) {?>
 <div class="ques-block" ans_value=<?php echo $qust['ans'];?>>
		<h3><?php echo $i; ?>&nbsp;<?php echo $qust['question'];?></h3>
		<div class="ans-block">
		<?php if(isset($qust['ans1']) ){ ?>
		<div class="ans-wrap" value="0">
		a)&nbsp;<?php echo $qust['ans1']; ?>

		</div>
		<?php }?>
		<?php if(isset($qust['ans2']) ){ ?>
		<div class="ans-wrap" value="1">
			b)&nbsp;<?php echo $qust['ans2']; ?>
		</div>
		<?php }?>
		<?php if(isset($qust['ans3']) ){ ?>
		<div class="ans-wrap" value="2">
			c)&nbsp;<?php echo $qust['ans3']; ?>
		</div>
		<?php }?>
		<?php if(isset($qust['ans4']) ){ ?>
		<div class="ans-wrap" value="3">
			d)&nbsp;<?php echo $qust['ans4']; ?>
		</div>

		<?php }?>
	</div>
 </div>
    <?php $i++; }?>
  </form>
 </div>

 <div class="submit-block">
 	<div>
	<button type="button" class="submit btn">Submit</button>
   </div>
	<div class="retake btn">
		Retest
	</div>
</div>
	
</div>
 

<div class="footer">
	<h3>Copy rights reserved</h3>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="JS/validation.js"></script>
<script type="text/javascript">
 $(document).ready(function() {	

 	var redirect="";
 	var popupEle="";
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
 	$("<div id='dim-bg' class='dim dim-close'></div>").insertAfter(".header");
 	var successImg='<span class="correct-img"><img src="Images/correct.png"></span>';
 	var wrongImg='<span class="wrong-img"><img src="Images/wrong.png"></span>';
$('.ans-block .ans-wrap').click(function(){
	$(this).closest('.ans-block').find('.ans-select').removeClass('ans-select');
   if($(this).hasClass('ans-select')){
	$(this).removeClass('ans-select');
}
else{
$(this).toggleClass('ans-select');
}
});
var finalscore=0;
var attempt="";
$('.submit').click(function(){
	if($('.ans-select').length==10){
  $('.ans-select').each(function(i,e){
  	var user_ans=$(e).attr('value');
  	var corr_ans=$(e).closest('.ques-block').attr('ans_value');
  	if(user_ans==corr_ans){
  	$(e).append(successImg);
  	$(e).addClass('success-ans');
  	finalscore+=1;
  	}
  	else{
	$(e).append(wrongImg);
	$(e).addClass('wrong-ans').removeClass('ans-select');
	$(e).closest('.ans-block').find('.ans-wrap[value='+corr_ans+']').addClass('success-ans');
	$(e).closest('.ans-block').find('.ans-wrap[value='+corr_ans+']').append(successImg)
  	}
  });
  $('.score').text(finalscore);
   var username = $('.username').text();
      var user_id = $('.userid').text();
      var score = $('.score').text();
      if(username!="" && user_id!="" && score!=""){
     	console.log(score);
        $.ajax({
        url: "score.php",
        type: "POST",
         data: {
           username: username,
           user_id: user_id,
           score: score,
         },
        cache: false,
        success: function(dataResult){
        var dataResult = JSON.parse(dataResult);
        console.log(dataResult);
        if(dataResult.statusCode==200){
        popupEle="scoreDiv";
   	    redirect="";
   	    attempt="true";
       popupOpen(popupEle);
       $('.ans-wrap').attr('disabled');    
      }
}
})
}
}
  else{
  	$('.alert strong').text('Warning!!');
    $('#msg-lbl').text('Please Fill out all questions !')
    redirect="";
    popupEle="popupBox";
    popupOpen(popupEle);  
  }
});

$('.close').click(function(){
popupClose(popupEle,redirect);
});
    
$('.retake').click(function(){
	$("html, body").animate({ scrollTop: 0 }, "slow");
	setTimeout(function(){ location.reload();
     }, 1200);
    });

  $('.score-list').click(function(){
  	$('.score-board').removeClass('hidden');
  });
  $('.score-close').click(function(){
  	$('.score-board').addClass('hidden');
  	if(attempt=="true"){
  		redirect="quiz.php";
  		setTimeout(function(){ $('.score-list').click();
     }, 1200);
  		
  	}
  	popupClose(popupEle,redirect);
  });
});
</script>
</body>
</html>
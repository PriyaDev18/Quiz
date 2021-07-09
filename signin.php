<?php

ob_start();
   session_start();
include("./retrive.php");
$login=new retrive;

$firstname=$_POST["firstname"];
$password=$_POST["password"];
$check_select=$login->signin($conn,$firstname,$password);
/*print_r($check_select);exit();
$numrows=mysqli_num_rows($check_select);

print_r($numrows);exit();
*/

if($login->signin($conn,$firstname,$password))
{
   
   header("Location:./quiz.php");
   
}
else
	{
		header("Location:./index.php");
	}
?>
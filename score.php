<?php
include_once("./connection/DBconnection.php");
$DBConnection = new DBConnection();
$userid = "";
$username = "";

$score = "";
if (isset($_POST['username'])) {
    $username = stripslashes($_POST['username']);
    $user_id = stripslashes($_POST['user_id']);
    $score = stripslashes($_POST['score']);
   /* $select = "SELECT * FROM `user_info` WHERE mobile = '$mobile'";
    $check_select = mysqli_query($conn, $select);
    $numrows = mysqli_num_rows($check_select);*/
    
        $query = "insert into score_details (user_id,username,score) values (' $user_id','$username','$score')";
        
        /*print_r($query);exit();*/
        $result = mysqli_query($conn, $query);
        $this_id = $conn->insert_id;
        /*print_r($this_id);exit();*/
        
        if ($result) {
            echo json_encode(array("statusCode" => 200));

        } else {
            echo json_encode(array("statusCode" => 201));
        }
    
}
?>
<?php
include_once("./connection/DBconnection.php");
$DBConnection = new DBConnection();
$mobile = "";
$username = "";
$email = "";
$password = "";
if (isset($_POST['mobile'])) {
    $username = stripslashes($_POST['username']);
    $mobile = stripslashes($_POST['mobile']);
    $email = stripslashes($_POST['email']);
    $password = stripslashes($_POST['password']);
    $select = "SELECT * FROM `user_info` WHERE mobile = '$mobile'";
    $check_select = mysqli_query($conn, $select);
    $numrows = mysqli_num_rows($check_select);
    if ($numrows == 0) {
        $query = "insert into user_info (username,mobile, email, password) values ('$username','$mobile','$email','$password')";
        
        /*print_r($query);exit();*/
        $result = mysqli_query($conn, $query);
        $this_id = $conn->insert_id;
        /*print_r($this_id);exit();*/
        $select_id = "SELECT * FROM `user_info` WHERE id = '$this_id'";
        $check_select_id = mysqli_query($conn, $select_id);
        $fetcher = mysqli_fetch_assoc($check_select_id);
        if ($result) {
            echo json_encode(array("statusCode" => 200));

        } else {
            echo json_encode(array("statusCode" => 201));
        }
    } else if ($numrows > 0) {
        echo json_encode(array("statusCode" => 202));
    }
}
?>
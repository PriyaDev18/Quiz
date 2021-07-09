<?php

class DBconnection {

    function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quizdb";
        $conn = new mysqli($servername, $username, $password,$dbname);
        /* print_r($conn);exit(); */
        // Check connection
        if ($conn->connect_error) {
            header("Location: defaultPage.php");
            die("Connection failed: " . $conn->connect_error);
        } else {
        $GLOBALS['conn'] = new mysqli($servername, $username, $password, $dbname);
        }
    }
}
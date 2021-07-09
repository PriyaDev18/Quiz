<?php
include_once("./connection/DBconnection.php");
$DBconnection = new DBconnection();

class retrive{


public $qus;
public $score;


    public function qus_show($conn) {

        $sql = "select * from questions ORDER BY RAND ( ) limit 10";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $this->qus[] = $row;
        }
	  return $this->qus;
 }
  public function score_show($conn) {

        $sql = "select * from score_details";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $this->score[] = $row;
        }
      return $this->score;
 }

 public function signin($conn,$username,$password) {
        $sql = "SELECT * FROM user_info WHERE username='$username' AND password='$password'";

        /*$sql = "SELECT user_info.id, user_info.username, user_info.password,score_details.user_id,score_details.score,score_details.date FROM user_info LEFT JOIN score_details ON user_info.id = score_details.user_id WHERE user_info.username='$username' AND user_info.password='$password'";*/
        $result = mysqli_query($conn, $sql);
        $query= mysqli_fetch_assoc($result);
        
        
        $result->fetch_array(MYSQLI_ASSOC);


        if($result->num_rows>0)
        {   
        $_SESSION['id']=$query['id'];
        $_SESSION['username']=$query['username'];
        
        return true;
        }
        else
        {
            return false;
        } 
         }


}

?>
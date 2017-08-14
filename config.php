<?php
 $host ="localhost";
 $username = "root";
 $password = "";
 $db = "timesheet";
 $conn = mysqli_connect($host,$username,$password,$db);
    if(!$conn){
        die("Connection Error");
    }
?>
<?php

session_start();
require 'dbconfig/config.php';

 $user1=json_decode(file_get_contents('php://input'),true);


   $username=$user1['name'];
   $colreg=$user1['colreg'];
   $dept=$user1['department'];
   $year=$user1['year'];
   $query="SELECT * FROM student WHERE Colreg='$colreg'";
   $query_run=mysqli_query($con,$query);
   if(mysqli_num_rows($query_run)>0)
   {
        $_SESSION['Colreg']=$colreg;
        $_SESSION['Username']=$username;
        $_SESSION['Year']=$year;
        $_SESSION['Department']=$dept;
        print 'success';
   }
   

?>
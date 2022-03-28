<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $conn = mysqli_connect($servername,$username,$password);

   mysqli_select_db($conn,"project1");

   if(!$conn){
       echo "not connected";
   }

?>
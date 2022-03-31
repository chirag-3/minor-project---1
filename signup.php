<?php
include "conn.php";
 session_start();
 if(!empty($_SESSION['email'])){
     header("location: index.php");
 }
 if(isset($_POST['done']))
 {
     $cname = $_POST['cname'];
     $email = trim($_POST['email']);
     $password = trim($_POST['password']);
     $email = trim($email);
     $password = trim($password);
     if(strlen($email)==0 || strlen($password)==0){
        echo "<script> 
        window.alert('Neither email-id nor password can be empty');
        </script>";
     }
     else{
     $q = "SELECT `email_id` FROM `users` WHERE `email_id`='$email'";
     $result = mysqli_query($conn,$q);
     if(mysqli_num_rows($result)>0){
        echo "<script> 
        window.alert('This email-id has already been used please use some other email-id');
        </script>";
     }
     else{
     $q = "INSERT INTO `users` (`company name`,`email_id`,`password`) values (
     '$cname','$email','$password')";

    mysqli_query($conn,$q);
    header("location: index.php?mssg=your account has been created");
     }
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="stylingsignup.css">
</head>
<body>
   <form method="post">
       <label for="cname">Comapany name </label>
       <br>
       <input type="text" id="cname" name="cname">
       <br>
       <label for="email">Email Id </label>
       <br>
       <input type="email" id="email" name="email">
       <br>
       <label for="password">Password </label>
       <br>
       <input type="password" id="password" name="password">
       <br>
       <input type="submit" name="done" id="submit" value="SUBMIT">
       <br>
   </form>     
</body>
</html>
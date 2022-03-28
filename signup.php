<?php
include "conn.php";
 if(isset($_POST['done']))
 {
    //  $hname = $_POST['hname'];
     $cname = $_POST['cname'];
    //  $contact = $_POST['contact'];
    //  $address = $_POST['address'];
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
    //  $password = password_hash($password,PASSWORD_DEFAULT);
     $q = "SELECT `email_id` FROM `users` WHERE `email_id`='$email'";
     $result = mysqli_query($conn,$q);
     if(mysqli_num_rows($result)>0){
        //  echo "this email id has already been used, use some othe email id";
        echo "<script> 
        window.alert('This email-id has already been used please use some other email-id');
        </script>";
     }
     else{
     $q = "INSERT INTO `users` (`company name`,`email_id`,`password`) values (
     '$cname','$email','$password')";

     mysqli_query($conn,$q);

    //  echo "<script> window.confirm('YEPS'); </script>";
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
       <!-- <label for="hname">Handler Name : </label> -->
       <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
       <!-- <input type="text" id="hname" name="hname"> -->
       <!-- <br> -->
       <label for="cname">Comapany name : </label>
       <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
       <input type="text" id="cname" name="cname">
       <br>
       <label for="email">Email Id : </label>
       <input type="email" id="email" name="email">
       <br>
       <!-- <label for="address">Address : </label>
       &nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text" id="address" name="address">
       <br> -->
       <!-- <label for="contact"> Mobile no: </label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
       <!-- <input type="number" id="contact" name="contact">
       <br> -->
       <!-- <label for="avgfun">Average function in month : </label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="number" id="avgfun" name="avgfun"> -->
       <!-- <br> -->
       <label for="password">Password : </label>
       <input type="password" id="password" name="password">
       <br>
       <input type="submit" name="done" id="submit">
       <br>
   </form>    
   <!-- <script>
       
       document.getElementById("submit").onclick=function(){
                if(flag==1){
                window.alert("you account has been made");
                }
       }
   </script>     -->
    
</body>
</html>
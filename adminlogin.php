<?php
   include "conn.php";
   session_start();
   if(!empty($_SESSION['admin_email'])){
    header('location: index.php');
}
   if(isset($_POST['done']))
   {
       $email = trim($_POST['email']);
       $password = trim($_POST['password']);

       if(strlen($email)==0 || strlen($password)==0)
       {
           echo "
           <script>
              window.alert('Neither email nor password can be empty');
           </script>
           ";
       }
       else
       {
            $q = "SELECT * FROM `admins` where `email`='$email'";
            $result = mysqli_query($conn,$q);

            if(mysqli_num_rows($result)==0)
            {
                echo "
                <script>
                   window.alert('This email has not been registered');
                </script>
                "; 
            }
            else
            {
                $entry = mysqli_fetch_assoc($result);
                if($entry['password']!=$password){
                    echo "
                    <script>
                       window.alert('password is incorrect');
                    </script>
                    ";
                }
                else
                {
                    $_SESSION['admin_email'] = $email;
                    // header('location: adminaccount.php?email='.$email);
                    header('location: adminaccount.php');
                }
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
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="stylingsignup.css">
</head>

<body>
<form method="post">
    <label for="cname">Email-id</label>
    <br>
    <input type="text" name="email">
    <br>
    <label for="cname">Password</label>
    <br>
    <input type="password" name="password">
    <br>
    <input type="submit" id="submit" name="done" value="SUBMIT">
</form>      
</body>
</html>
<?php
   include "conn.php";
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
            $q = "SELECT * FROM `users` where `email_id`='$email'";
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
                    $cname = $entry['company name'];
                    header('location: account.php?email='.$email.'&cname='.$cname);
                    // header('location: account.php');
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
</head>

<body>
    <form method="post">
        Email-id : <input type="text" name="email"><br>
        Password : <input type="password" name="password"><br>
        <input type="submit" id="submit" name="done">
    </form>    
</body>
</html>
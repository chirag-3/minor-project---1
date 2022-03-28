<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account</title>
    <link rel="stylesheet" href="stylingadminaccount.css">
</head>
<body>
<table> 
               <tr>
                <th>Email-Id</th><th>Company Name</th><th>Donor name</th><th>contact</th><th>address</th><th>date</th><th>time</th><th>Description</th>
               </tr>
   <?php
     include "conn.php";
     $q = "SELECT * FROM donations";

     $result = mysqli_query($conn,$q);
     
     if(mysqli_num_rows($result)>0)
     {
         while($entry = mysqli_fetch_assoc($result))
         {
             echo "
               <tr>
                <td>".$entry['email']."</td><td>".$entry['company name']."</td><td>".$entry['donor name'].
                "</td><td>".$entry['contact']."</td><td>".$entry['address']."</td><td>".$entry['date'].
                "</td><td>".$entry['time']."</td><td>".$entry['description']."</td>
               </tr>
             ";
         }
     }

   ?>
    </table>
    <button>
       <a href="index.php">LOGOUT</a>
  </button>
    
</body>
</html>
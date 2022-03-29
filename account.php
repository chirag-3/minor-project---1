<?php
    include 'conn.php'; 
    session_start();
    if(empty($_SESSION['email'])){
      header('location: index.php');
  }
    // $email = $_GET['email'];
    // $cname = $_GET['cname'];
    $email = $_SESSION['email'];
    $cname = $_SESSION['cname'];
    if(isset($_POST['done']))
    {
        $dname = $_POST['dname'];
        $contact = $_POST['contact'];
        $address = trim($_POST['address']);
        $date = $_POST['date'];
        $time = $_POST['time'];
        $discription = trim($_POST['discription']);


        if(strlen($address)==0 || strlen($discription)==0 || empty($date) || empty($time) || empty($contact))
        {
            echo "
            <script>
               window.alert('Except for name nothing can be left empty');
            </script>
            ";
        }
        else
        {
          $q = "INSERT INTO donations (`email`,`company name`,`donor name`,`contact`,`address`,
          `date`,`time`,`description`) values ('$email','$cname','$dname','$contact','$address',
          '$date','$time','$discription')";
          mysqli_query($conn,$q);
          header('location: index.php?mssg=your entry has been recorded and you have been logged out');
        }
    }
    if(isset($_POST['logout'])){
      session_unset();
      session_destroy();
     //  echo "<br>yeps<br>";
      header("location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link rel="stylesheet" href="stylingaccount.css">
</head>
<body>
<form method="post">
       <label for="cname">Company Name : </label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text" id="cname" value=<?php echo $cname ?> readonly>
       <br>
       <label for="email">Email-Id</label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="email" id="email" value=<?php echo $email ?> readonly>
       <br>
       <label for="dname">Name : </label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text" id="dname" name="dname">
       <br>
       <label for="contact">Contact No : </label>
       <input type="number" id="contact" name="contact">
       <br>
       <label for="address">Address : </label>
       &nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text" id="address" name="address">
       <br>
       <label for="date">Date : </label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="date" id="date" name="date">
       <br>
       <label for="time">Time : </label>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="time" id="time" name="time">
       <br>
       <label for="discription">Food Discription  : </label>
       &nbsp;&nbsp
       <input type="text" id="discription" name="discription">
       <br>
       <input type="submit" name="done" id="submit">
       <br>
   </form> 
   <form method="post">  
    <button type="submit" value="LOGOUT" name="logout" >LOGOUT</button>
   </form>
   <button>
       <a href="index.php">HOMEPAGE</a>
  </button>
   <br>
   PAST HISTORY
   <br>
   <table> 
               <tr>
                <th>contact</th><th>address</th><th>date</th><th>time</th><th>Description</th>
               </tr>
   <?php
     $q = "SELECT * FROM donations where `email`='$email'";

     $result = mysqli_query($conn,$q);
     
     if(mysqli_num_rows($result)>0)
     {
         while($entry = mysqli_fetch_assoc($result))
         {
             echo "
               <tr>
                <td>".$entry['contact']."</td><td>".$entry['address']."</td><td>".$entry['date'].
                "</td><td>".$entry['time']."</td><td>".$entry['description']."</td>
               </tr>
             ";
         }
     }

   ?>
    </table>
   <script>
       
       let date = new Date();
    //    console.log(date);
       date.setDate(date.getDate()+1);
       let day =  date.getDate();
       let month = date.getMonth()+1;
       let year = date.getFullYear(); 
       console.log(year);
       console.log(month);
       console.log(day);
       if(day<10)
         day = "0"+day;
       if(month<10)
         month = "0"+month;
       let m = year+"-"+month+"-"+day;
       console.log(m);
       document.getElementById('date').min=m;
       date.setDate(date.getDate()+30);
       day =  date.getDate();
       month = date.getMonth()+1;
       year = date.getFullYear();
       if(day<10)
         day = "0"+day;
       if(month<10)
         month = "0"+month;
       let M = year+"-"+month+"-"+day;
       document.getElementById('date').max=M;
    </script>    
</body>
</html>
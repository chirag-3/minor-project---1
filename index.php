<?php
   session_start();
   if(array_key_exists('mssg',$_GET))
   {
    $mssg = $_GET['mssg'];
    if(trim($mssg)=="your account has been created")
    { 
    echo "
     <script>
       window.alert('your account has been created');
     </script>
     ";
    }
    else
    {
        echo "
        <script>
          window.alert('your entry has been recorded and you have been redirected to home page');
        </script>
        "; 
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
    <title>Food Donation Point</title>
    <link rel="stylesheet" href="indexstyling.css">
</head>
<body>
   <header id="loggd">
       FOOD DONATION POINT
   </header>  
   <?php
      if(empty($_SESSION['email']) && empty($_SESSION['admin_email'])){

      }
      else 
      { 
        if(empty($_SESSION['admin_email'])){ ?>
          <div id="logged">
          Logged in as <?php echo $_SESSION['email'] ?>
        </div>
      <?php  }
        else 
        {  ?>
          <div id="logged">
          Logged in as <?php echo $_SESSION['admin_email'] ?>
        </div> 
      <?php  }
      }
   ?>
   <?php if(empty($_SESSION['email']) && empty($_SESSION['admin_email'])){?>
   <div id="btns"> 
    <button><a href="userlogin.php">USER LOGIN</a></button>
    <button><a href="adminlogin.php">ADMIN LOGIN</a></button>
    <!-- <button><a href="donatenow.html">DONATE NOW</a></button> -->
    <button><a href="signup.php">SIGN UP</a></button>
    <!-- <button><a href="editdonation.html">EDIT DONATION</a></button> -->
    <button><a href="contactus.html">CONTACT US</a></button>
   </div> 
   <?php } else {?>
    <div id="btns"> 
    <form method="post">  
    <button type="submit" value="LOGOUT" name="logout" >LOGOUT</button>
   </form>
    <!-- <button><a href="donatenow.html">DONATE NOW</a></button> -->
    <?php if(empty($_SESSION['admin_email'])){ ?> 
    <button><a href="account.php">ACCOUNT PAGE</a></button>
    <?php } else { ?> 
    <button><a href="adminaccount.php">ADMIN ACCOUNT PAGE</a></button>
    <?php } ?>   
    <!-- <button><a href="editdonation.html">EDIT DONATION</a></button> -->
    <button><a href="contactus.html">CONTACT US</a></button>
   </div>
    <?php } ?>

   <div id="aboutus">
    <h2>ABOUT US</h2>
    <div id="content">
    Food is one of the necessities of humans, and it stands first among all basic needs - food,<br> shelter, and 
clothing. It is important as it nourishes the human body- sustains<br> the very existence of humans. 
However, with the rising population and development of this <br>country, food wastage has risen to a new 
high.
<br>
We have developed a website which will serve as an intermediate<br> between the peopel who want to donate
and the people who face food scarcity. 
<br>
In not just India but all around the world many functions are organised <br>daily on various different occasions.
Like marraiges, birthdays etc.Lots, of food gets<br> wasted in these functions as more food is produced and people
consume less. On our website <br>the people organising the function can register in advance, so that we can go later
and collect <br>food that has not been consumed and distrubute among the needy.
<br>
Other people also who wish to donate food can use our website. 
</div>
  </div>
</body>
</html>

<?php
  session_start();
  //cause we include every header in every page of the website
  //means we will have a session on every page thus making the user being logged in on every single page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="..\css\index.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>

<body>
  
  <header>
    <div class="container">
      <img src="..\img\Adam logo.png" alt="moi" class="logo">
    <nav>
      <ul>
        <li><a href="#">about me</a></li>
        <li><a href="#">experience</a></li>
        <li><a href="#">contact</a></li>
        <?php
        //to make a page on weather the user is logged in or not
          if(isset($_SESSION["userid"])){
            //if this data exists then jalan code ni
            echo "<li><a href='./profile.php'>Profile page</a></li>";//bila echo "" kalau nak buat string within that pakai '' NOT ""
            echo "<li><a href='../includes/logout.php'>Log out</a></li>";
          }else{
            echo "<li><a href='./loginPage.php'>login</a></li>";    
            echo "<li><a href='./signUpPage.php'>Sign Up</a></li>";
          }
        ?>
          </ul>
    </nav>
    </div>
  </header>

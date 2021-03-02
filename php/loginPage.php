<?php
  include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="container">
    <form action="../includes/login.inc.php" method="POST"> <!--inc is just php that user tak nampak-->
        <label>username:</label>
        <input type="text" id="username" name="username" placeholder="username/email"><br>
        <label>password</label>
        <input type="password" id="password" name="password" placeholder="password"><br>
        <input type="submit" name="submit" value="Log in">
    </form>
</body>
</html>

<?php
  if(isset($_GET["error"])){//error dalam uri
    
    if($_GET["error"]=="emptyinput"){
      echo "Fill in all the fields!";
    }
    
    else if($_GET["error"]=="wronglogin"){
      echo "Incorrect credentials";
    }
  
  }
?>

<?php
  include_once 'footer.php';
?>
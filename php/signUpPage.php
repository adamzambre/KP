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
    <form action="../includes/signup.inc.php" method="post"> <!--inc is just php that user tak nampak--> 
        <label>Full Name:</label>
        <input type="text" id="fullName" name="fullName" placeholder="Full Name"><br>    
        
        <label>email:</label>
        <input type="text" id="email" name="email" placeholder="email"><br>    
        
        <label>username:</label>
        <input type="text" id="username" name="username" placeholder="username"><br>
        
        <label>password</label>
        <input type="password" id="password" name="password" placeholder="password"><br>
        
        <label>Retype password</label>
        <input type="password" id="Rpassword" name="Rpassword" placeholder="password"><br>
        
        <input type="submit" name="submit" value="Sign me up!">
    </form>
</body>
</html>

<?php
  if(isset($_GET["error"])){//error dalam uri
    
    if($_GET["error"]=="emptyinput"){
      echo "Fill in all the fields!";
    }
    
    else if($_GET["error"]=="invaliduid"){
      echo "Choose a proper username";
    }
    
    else if($_GET["error"]=="invalidemail"){
      echo "Choose a proper email!";
    }
    
   else if($_GET["error"]=="passwordsdontmatch"){
      echo "Passwords doesnt match!";
    }
    
    else if($_GET["error"]=="stmtfailed"){
      echo "Something went wrong, try again!";
    }
    
    else if($_GET["error"]=="usernametaken"){
      echo "Username already taken!";
    }
    
    else if($_GET["error"]=="none"){
      echo "You have signed up!";
    }
  
  }
?>

<?php
  include_once 'footer.php';
?>

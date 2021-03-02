<?php

if(isset($_POST["submit"])){//we do this sebab nak elak orang masuk signup page dari url 
    echo "it works";
    $name = $_POST["fullName"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $Rpassword = $_POST["Rpassword"];
    
    //error handling (to check if user sign up correctly)
    require_once "dbh.inc.php";
    require_once "functions.inc.php";//using functions from this page

    if(emptyInputSignup($name,$email,$username,$password,$Rpassword)!==false){//check empty inputs
        header("location: ../php/signUpPage.php?error=emptyinput");
        exit();//stops the script from running
    }
    if(invalidUid($username)!==false){//check if proper username or email
        header("location: ../php/signUpPage.php?error=invaliduid");
        exit();//stops the script from running
    }
    if(invalidEmail($email)!==false){//check if proper email
        header("location: ../php/signUpPage.php?error=invalidemail");
        exit();//stops the script from running
    }
    if(pwdMatch($password,$Rpassword)!==false){//check if passwordmatch
        header("location: ../php/signUpPage.php?error=passwordsdontmatch");
        exit();//stops the script from running
    }
    if(uidExist($conn,$username,$email)!==false){//check if username dah ada dalam database
        header("location: ../php/signUpPage.php?error=usernametaken");
        exit();//stops the script from running
    }

    createUser($conn,$name,$email,$username,$password);

}else{
    header("location: ../php/signUpPage.php");//function in php to send user where
    exit();
}
?>
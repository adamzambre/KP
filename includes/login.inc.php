<?php

if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputLogin($username,$password)!==false){//check empty inputs
            header("location: ../php/loginPage.php?error=emptyinput");
            exit();//stops the script from running
        }

        loginUser($conn,$username,$password);
        
}else{
    header("locate: ../php/loginPage.php");
    exit();
}
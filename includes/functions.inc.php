<?php

function emptyInputSignup($name,$email,$username,$password,$Rpassword) {
    $results;
    if(empty($name)||empty($email)||empty($username)||empty(password)||empty($Rpassword)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}


function invalidUid($username) {
    $results;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){//search algorithm 
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}


function invalidemail($email) {
    $results;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){//built in php function to validate email
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function pwdMatch($password,$Rpassword) {
    $results;
    if($password!==$Rpassword){//built in php function to validate email
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function uidExist($conn,$username,$email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    //? is a placeholder cause we dont want to immidieatly send user input terus ke database
    //so what we do is we hantar dulu OUR sql statement to the database first then fill in the placeholder later by providing our prepared statement
    $stmt = mysqli_stmt_init($conn);//creating our prepared statement BLUB 
    if(!mysqli_stmt_prepare($stmt,$sql)/*run the sql statment within the database*/){//check if our sql statement is correct
        header("location: ../php/signUpPage.php?error=stmtfailed");//function in php to send user where
         exit();
    }

    mysqli_stmt_bind_param($stmt,"ss"/*what am i submitting,2s sebab dua string*/,$username,$email);//BLUB then tying it to the sql statement to make sure tak run dalam database without input from user then letak input from user seperately
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);
    //all the things that are happening in this function is tied to our statement stmt

    if($row=mysqli_fetch_assoc($resultData)){//if dpt data frm the database jadi tru
        return $row;
    }else{
         $result=false;
        return $result;
    }

     mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$username,$password){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("location: ../php/signUpPage.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);//to hash password using the default hash
    
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);//tertulis stmnt instead of stmt :')
    mysqli_stmt_close($stmt);
    header("location: ../php/signUpPage.php?error=none");
    exit();
}

function emptyInputLogin($username,$password) {
    $results;
    if(empty($username)||empty($password)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function loginUser($conn,$username,$password){
    $uidExist=uidExist($conn,$username,$username);

    if($uidExist===false){
        header("location: ../php/loginPage.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $uidExist["usersPwd"];//this is an associative array
    $checkPwd=password_verify($password,$passwordHashed);

    if($checkPwd==false){//klu pwd salah
        header("location: ../php/loginPage.php?error=wronglogin");
        exit();
    }else if($checkPwd==true){//klu pwd betul kita kena create session with any data from website
        session_start();
        $_SESSION["userid"]=$uidExist["usersId"];//create a global variable called session
        $_SESSION["useruid"]=$uidExist["usersUid"];
        header("location: ../php/index.php");
        exit();
    }
}

<?php
//dbh stands for database handler cause this will be the file taht connects to the database
//we will just refer variables within this file to refer to the database

    $serverName="localhost";
    $dbUserName="root";
    $dbPassword="";
    $dbName="websiteadam";
    //mysqli (benda yang replace mysql sebab mysql tak secure) lagi bagus for procedural php
    //pdo is for object
    
    $conn = mysqli_connect($serverName, $dbUserName, $dbPassword ,$dbName);
    
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());//kill off whatever we're doing
    }
//we dont need to have ending tag sebab bahaya cause even if u press space below the closing tag boleh kacau the whol program
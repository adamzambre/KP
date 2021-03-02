<?php
session_start();
session_unset();//frees all session variables
session_destroy();//destroy all data registered to session

header("location: ../php/index.php");
exit();
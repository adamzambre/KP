<?php
  include_once 'header.php';
?>
<?php
        //to make a page on weather the user is logged in or not
          if(isset($_SESSION["userid"])){
            //if this data exists then jalan code ni
            echo "Hello there ". $SESSION["userid"];//bila echo "" kalau nak buat string within that pakai '' NOT ""
          }
        ?>
<?php
  include_once 'footer.php';
?>

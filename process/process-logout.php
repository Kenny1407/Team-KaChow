<?php
  session_start();
  //to destroy all the array
  session_destroy(); //or
  //unset($_SESSION['username']); //the difference here is unset only destroy specific session
// log-out redirect to the home page
  header('Location: ../front-page.php')
 ?>

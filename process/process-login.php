<?php
session_start();
require_once('../resources/db-properties.php');
require_once('../service/service-logs.php');



  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    if (!$username || !$password) {
      throw new Exception('Incomplete credentails');

    }

    @ $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    //validation if connected to database properly
    $dbError = mysqli_connect_errno();
    if ($dbError) {
      throw new Exception('Could not connect to database. Error');
    }

    $isActive = true;
    //select $query
    $query = 'select * from user_info where username = ? and password = ? and active = ?';
    $stmt = $db->prepare($query);
    $hasedPassword = hash('sha512',$password);
    $stmt->bind_param('ssi', $username, $hasedPassword, $isActive);
    $stmt->execute();
    loginLogs();
    $result = $stmt->get_result();
    //fetch_assoc pointer
    if ($result->fetch_assoc()) {
      $_SESSION['username'] = $username;
      //if there something fetched redirected to the location
      header('Location: ../index.php');
    }else {
      //if none throw exception
      throw new Exception('Incorrect Credentials');

    }
  } catch (Exception $e) {
    header('Location: ../front-page.php?error='.$e->getMessage());
  }


 ?>

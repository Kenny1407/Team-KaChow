<?php
    require_once('../resources/db-properties.php');
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/6e896293bb.js" crossorigin="anonymous"></script>

  </head>
    <body>
            <?php

              //get the value of the checkout form
              $address = $_POST['address'];
              $city = $_POST['city'];
              $province = $_POST['province'];
              $zip = $_POST['zip'];
            

              // checking if the input is complete or no

                try {

                  // 127.0.0.1 = localhost
                  @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_ecomproject_db');

                  $dbError = mysqli_connect_errno();
                  if ($dbError) {
                    throw new Exception('Error: Could not connect to database. '.
                      'Please try again later. '.$dbError, 1);
                  }
                  //inserting new registered user to db
                  // must be the name name in the db.sql
                  //WHERE id='".$_GET['id']."' "
                // $query =  "SELECT * FROM user_info";
                $query = "UPDATE user_info SET ADDRESS = ?, CITY = ?, PROVINCE = ?, ZIP = ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param("ssss", $address, $city,$province,$zip);
                  $stmt->execute();
                  echo '<script>window.location="../confirm-checkout.php"</script>';
                $stmt->close();

              } catch (Exception $e) {
                echo $e->getMessage();
              }

             ?>

       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
       integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
       integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
       integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>

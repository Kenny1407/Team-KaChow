<?php

  require_once('../view-comp/header.php');
?>
<div class="card-header">
  Book Results
</div>
<div class="card-body">
  <?php




    $searchTerm = $_POST['searchTerm'];

    try {
      if (!$searchTerm) {
        throw new Exception('You have not entered search details. Please go back and try again.', 1);
      }

      // 127.0.0.1 = localhost
      @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_ecomproject_db');


      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. '.
          'Please try again later. '.$dbError, 1);
      }


      $query = 'SELECT
          WHERE  LIKE \'%'.$searchTerm.'%\';';


      $result = $db->query($query);

      $resultCount = $result->num_rows;

      echo '<p>Result for ' .$searchTerm. '<br>';
      echo '<p>Number of Product found: '. $resultCount;





      echo '<div class="row">';
      for ($ctr = 0; $ctr < $resultCount; $ctr++) {
        $row = $result -> fetch_assoc();
      ?>
        <div class="card col-4 mx-1">
          <div class="card-body">
            <img class="my-3" src="<?php echo $row ['pic_url']; ?>" width="200 rem" alt="Product">
            <h6><?php echo $row['NAME'];?></h6>
            <p>
              <?php echo $row['PRICE']?>
            </p>
          </div>
        </div>
      <?php
      }
      echo '</div>';
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  ?>
  <br/>
  <a class="btn btn-secondary" href="index.php">Go Back</a>
</div>
<?php require_once('../view-comp/footer.php');?>

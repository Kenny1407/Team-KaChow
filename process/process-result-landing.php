<?php
  require_once('../resources/db-properties.php');
?>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/6e896293bb.js" crossorigin="anonymous"></script>

<div class="card-header">
  Product Result
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


      $query = "SELECT * FROM product_table WHERE NAME LIKE '%$searchTerm%'";
      $result = $db->query($query);

      $resultCount = $result->num_rows;

      echo '<div class="row" style="text-align:center;">';
      for ($ctr = 0; $ctr < $resultCount; $ctr++) {
        $row = $result -> fetch_assoc();
      ?>
        <div class="card col-2 mx-1">
          <div class="card-body">
            <img class="my-2" src="../images/<?php echo $row ['pic_url']; ?>" width="200 rem" alt="Product">
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
  <a class="btn btn-secondary" href="../landing-page.php">Go Back</a>
</div>
<?php require_once('../view-comp/footer.php');?>

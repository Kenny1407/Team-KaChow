<?php
  require_once('view-comp/header.php');
  require_once('resources/db-properties.php');
  require_once('service/service-logs.php');

 ?>


<h2 style="text-align:center">Checkout Summary</h2>
<div class="container" style="border-style:solid; height:60%;" >

  <div class="table-responsive">
    <table class="table table-bordered">
      <tr>
        <th width="40%">Item Name</th>
        <th width= "40%">Image</th>
        <th width="10%">Quantity</th>
        <th width="20%">Price</th>
        <th width="15%">Total</th>
      </tr>
      <?php
      if(!empty($_SESSION["shopping_cart"]))
      {
        $total = 0;
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
      ?>


      <tr>
        <td><?php echo $values["item_name"];?></td>
        <td><img src = "<?php echo $values["item_image"];?>" width="150px" height="150px"></td>
        <td><?php echo $values["item_quantity"]; ?></td>
        <td>$ <?php echo $values["item_price"]; ?></td>
        <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
      </tr>
      <?php
          $total = $total + ($values["item_quantity"] * $values["item_price"]);
        }
      ?>
      <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td></td>
      </tr>
    </table>
      <?php
      }
      ?>
      <?php
      try {

        // 127.0.0.1 = localhost
        @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_ecomproject_db');

        $dbError = mysqli_connect_errno();
        if ($dbError) {
          throw new Exception('Error: Could not connect to database. '.
            'Please try again later. '.$dbError, 1);
        }


        $query = $query = "SELECT * FROM user_info WHERE USERNAME='".$_SESSION['username']."' ";
        $result = $db->query($query);
        checkoutLogs();

        $resultCount = $result->num_rows;


          $row = $result -> fetch_assoc();
          $MOP = $_POST['radiobutton'];
        ?>
           <h5>Will Be Delivery To:</h5>
           <h7 class="text-danger" style="text-align:center;"><?php echo $row ['ADDRESS']; echo ' '. $row ['CITY']; echo ' '. $row['PROVINCE']; echo ' '.$row['ZIP']; ?></h7>
           <br>
           <h8> You have selected: <?php echo $_POST['radiobutton'];?></h8>

            <br><br><br><br><br><br>
            <a class="btn btn-info" href="check-out.php">Cancel</a>
             <a  class="btn btn-success "href="confirmed-out.php" style="float:right;" onclick="checkoutLogs()">Confirm</a>

        <?php

          echo '</div>';
        } catch (Exception $e) {
          echo $e->getMessage();
        }
    ?>


</div>

 <?php
 require_once('view-comp/footer.php');
  ?>

<?php
  require_once('view-comp/header.php');
  require_once('resources/db-properties.php');

    try {

      // 127.0.0.1 = localhost
      @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_ecomproject_db');

      $dbError = mysqli_connect_errno();
      if ($dbError) {
        throw new Exception('Error: Could not connect to database. '.
          'Please try again later. '.$dbError, 1);
      }


      $query = $query = "SELECT * FROM user_info ORDER BY ID ASC";
      $result = $db->query($query);

      $resultCount = $result->num_rows;

      echo '<div class="row">';
      for ($ctr = 0; $ctr < $resultCount; $ctr++) {
        $row = $result -> fetch_assoc();
 ?>
 <link rel="stylesheet" href="css/checkout.css">
 <?php
       }
   echo '</div>';
   } catch (Exception $e) {
   echo $e->getMessage();
     }
?>



     <h2>Responsive Checkout Form</h2>

     <div class="row">
       <div class="col-75">
         <div class="container">
           <form action="process/process-checkout.php" method="post">
             <div class="row">

               <div class="col-50">
                 <div class="form-group" style="display:inline-block">
                  <h4>Payment Option</h4>
                  <img src="images/codimage2.png" alt="Photo" style="height:70px; margin-left:20px;">
                  <img src="images/creditcard.png" alt="Photo" style="height:90px; margin-left:50px;">
                  <br>
                <input type="radio" name="radiobutton" id="radiocheck1" style="margin-left:40px;" value="COD">
                <input type="radio" name="radiobutton" id="radiocheck2" style="margin-left:128px;" value="CREDIT">
                  <br>
                  <span>Cash On Delivery</span>
                  <span style="margin-left:25px;">Credit Card</span>
                </div>
                <h3>Billing Information</h3>
                 <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                 <input type="text" id="fname" name="fullname" value="<?php echo ucwords($row['FIRST_NAME']); echo ' '.ucwords($row['MIDDLE_NAME']);
                 echo '. '. ucwords($row['LAST_NAME']); ?>" required="required" >
                 <label for="email"><i class="fa fa-envelope"></i> Email</label>
                 <input type="text" id="email" name="email" value="<?php echo $row['EMAIL_ADDRESS']; ?>" required="required">
                 <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                 <input type="text" id="address" name="address" placeholder="542 W. 15th Street" required="required">
                 <label for="city"><i class="fa fa-institution"></i> City</label>
                 <input type="text" id="city" name="city" placeholder="Manila" required="required">

                 <div class="row">
                   <div class="col-50">
                     <label for="state">Province</label>
                     <input type="text" id="province" name="province" placeholder="NCR" required="required">
                   </div>
                   <div class="col-50">
                     <label for="zip">Zip</label>
                     <input type="text" id="zip" name="zip" placeholder="10001" required="required">
                   </div>
                 </div>
               </div>

               <div class="col-50">
                 <br><br><br>
                 <h3>Payment</h3>
                 <label for="fname">Accepted Cards</label>
                 <div class="icon-container">
                   <i class="fa fa-cc-visa" style="color:navy;"></i>
                   <i class="fa fa-cc-amex" style="color:blue;"></i>
                   <i class="fa fa-cc-mastercard" style="color:red;"></i>
                   <i class="fa fa-cc-discover" style="color:orange;"></i>
                 </div>
                 <label for="cname">Name on Card</label>
                 <input type="text" id="cname" name="cardname"placeholder="Pedro Penduko" required="required">
                    <br><br>
                 <label for="ccnum">Credit card number</label>
                 <input type="tel" inputmode="numeric" id="ccnum" name="cardnumber" pattern="[0-9\s]{13,19}" placeholder="xxxx xxxx xxxx xxxx" required="required">
                 <br><br><br>
                 <label for="expmonth">Exp Month</label>
                 <input type="month" id="expmonth" name="expmonth" placeholder="September" required="required">
                 <br><br><br>
                 <div class="row">
                   <div class="col-50">
                     <label for="expyear">Exp Year</label>
                     <input type="date" id="expyear" name="expyear" placeholder="2018" required="required">
                   </div>
                   <div class="col-50">
                     <label for="cvv">CVV</label>
                     <input type="text" id="cvv" name="cvv" placeholder="352" required="required">
                   </div>
                 </div>
               </div>

             </div>

             <input type="submit" value="Continue to checkout" name ="checkoutsubmit" class="btn btn-primary">
             <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
           </form>
         </div>
       </div>
       <div class="col-25">


       <!-- <?php
      // if(!empty($_SESSION["shopping_cart"]))
       {
        //  $total = 0;
        //  foreach($_SESSION["shopping_cart"] as $keys => $values)
          {
        // ?>
         <div class="container">
           <h4>Cart <span class="price" style="color:black">
           <i class="fa fa-shopping-cart"></i>Price</span></h4>
        //   <p>//<?php echo $values["item_name"];?><span class="price">$ <?php echo $values["item_price"]; ?> </span></p>
           <?php
           }
            ?>
         </div>
       </div>
    </div>
  <?php

  }
   ?>

<?php
require_once('view-comp/footer.php');
 ?>
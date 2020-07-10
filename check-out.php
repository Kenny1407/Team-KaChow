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
} catch (Exception $e) {
echo $e->getMessage();
}
?>
<script type="text/javascript">
submitForms = function(){
  document.getElementById("form1").submit();
  document.getElementById("form2").submit();
 }

</script>


     <div class="row">
       <div class="col-75">
         <div class="container">

             <div class="row">

               <div class="col-50">
                 <div class="form-group" style="display:inline-block">
                  <h4>Payment Option</h4>
                  <img src="images/codimage2.png" alt="Photo" style="height:70px; margin-left:20px;">
                  <img src="images/creditcard.png" alt="Photo" style="height:90px; margin-left:50px;">
                  <br>
                <form action="confirm-checkout.php" id="form1" method="post">
                <input type="radio" name="radiobutton" id="radiocheck1"  style="margin-left:40px;" value="COD">
                <input type="radio" name="radiobutton" id="radiocheck2" style="margin-left:128px;" value="CREDIT">
                  <br>
                 <form action="process/process-checkout.php" id="form2" method="post">
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
                <?php
                   if(['ADDRESS']==null){
                     echo '<input type="text" id="address" name="address" placeholder="542 W. 15th Street" required="required">';
                   } else {
                     echo '<input type="text" id="address" name="address" placeholder ="542 W. 15th Street" required="required" value="'. $row['ADDRESS'] .'">';
                   }
                 ?>
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <?php
                   if(['CITY']==null){
                     echo '<input type="text" id="city" name="city" placeholder="Manila" required="required">';
                   } else {
                     echo '<input type="text" id="city" name="city" placeholder ="Manila" required="required" value="'. $row['CITY'] .'">';
                   }
                 ?>

                <div class="row">
                  <div class="col-50">
                    <label for="state">Province</label>
                    <?php
                     if(['PROVINCE']==null){
                       echo '<input type="text" id="province" name="province" placeholder="NCR" required="required">';
                     }else {
                       echo '<input type="text" id="province" name="province" placeholder ="NCR" required="required" value="'. $row['ADDRESS'] .'">';
                     }
                     ?>

                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <?php
                     if(['ZIP']==null){
                       echo '<input type="text" id="zip" name="zip" placeholder="1231" required="required">';
                     }else {
                       echo '<input type="text" id="zip" name="zip" placeholder ="1231" required="required" value="'. $row['ZIP'] .'">';
                     }
                     ?>

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
                 <div id="card">


                 <label for="cname">Name on Card</label>
                 <input type="text" id="cname" name="cardname"placeholder="Pedro Penduko" required="required">
                    <br><br>
                 <label for="ccnum">Credit card number</label>
                 <input type="tel" inputmode="numeric" id="ccnum" name="cardnumber" pattern="[0-9\s]{13,19}" placeholder="xxxx xxxx xxxx xxxx" required="required">
                 <br><br><br>
                 <label for="expmonth">Exp Month</label>
                 <input type="text" id="expmonth" name="expmonth" placeholder="September" required="required">
                 <br><br><br>
                 <div class="row">
                   <div class="col-50">
                     <label for="expyear">Exp Year</label>
                     <input type="year" id="expyear" name="expyear" placeholder="2022" required="required">
                   </div>
                   <div class="col-50">
                     <label for="cvv">CVV</label>
                     <input type="text" id="cvv" name="cvv" placeholder="352" required="required">
                   </div>
                 </div>
               </div>
               </div>
             </div>

             <input type="submit" value="Continue to checkout" name ="checkoutsubmit" onclick="submitForms()" class="btn btn-primary">
             <a href="product-page.php" class="btn btn-secondary">Continue Shopping</a>
           </form>
         </div>
       </div>
    </div>


<?php
require_once('view-comp/footer.php');
 ?>

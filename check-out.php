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


      $query = $query = "SELECT * FROM user_info WHERE USERNAME='".$_SESSION['username']."'";
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
  return true;
 }

</script>


     <div class="row">
       <div class="col-75">
         <div class="container">

             <div class="row">

               <div class="col-50">
                 <div class="form-group" style="display:inline-block">
                 <form action="process/process-checkout.php" id="form2" method="post">

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



             <input type="submit" value="Continue to checkout" name ="checkoutsubmit" onclick="submitForms()" class="btn btn-primary">

             <a href="product-page.php" class="btn btn-secondary">Continue Shopping</a>
           </form>
         </div>
       </div>
    </div>


<?php
require_once('view-comp/footer.php');
 ?>

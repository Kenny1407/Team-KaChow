<?php
require_once('view-comp/header.php');
 ?>

 <h4 style="text-align:center;">Payment Option</h4>
 <div class="container" style="text-align:center; border-style:solid;">


 <img src="images/codimage2.png" alt="Photo" style="height:70px; margin-left:20px;">
 <img src="images/creditcard.png" alt="Photo" style="height:90px; margin-left:50px;">
 <br>
<form action="confirm-checkout.php" method="post">

      <input type="radio" name="radiobutton" id="radiocheck1"  checked onclick="show(1)" style="margin-right:50px;" value="COD">
      <input type="radio" name="radiobutton" id="radiocheck2" onclick="show(0)" style="margin-left:80px;" value="CREDIT" autofocus>
      <br>
      <span>Cash On Delivery</span>
      <span style="margin-left:25px;">Credit Card</span>


<script type="text/javascript">
  function show(x){
    if(x==0){
      document.getElementById('card').style.display = 'block';
    }else {
      document.getElementById('card').style.display = 'none';
      return;
    }
  }
</script>

    <div id="card">
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
        <br>
        <div id="card">
        <label for="cname">Name on Card</label>
        <input type="text" id="cname" name="cardname"placeholder="Pedro Penduko" >
           <br><br>
        <label for="ccnum">Credit card number</label>
        <input type="tel" inputmode="numeric" id="ccnum" name="cardnumber" pattern="[0-9\s]{16}" placeholder="xxxx xxxx xxxx xxxx" >
        <br><br>
        <label for="expmonth">Exp Month</label>
        <input type="text" id="expmonth" name="expmonth" placeholder="September" >
        <br><br>
        <label for="expyear">Exp Year</label>
        <input type="year" id="expyear" name="expyear" placeholder="2022">
        <br><br>
        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" placeholder="352" >
          </div>
        </div>
      </div>
      <center><a href="check-out.php" class="btn btn-secondary">Go Back</a>
        <input type="submit" name="MOD" value="Submit" class="btn btn-primary">
          </center>
      </form>
      </div>
      <br>

 <?php
 require_once('view-comp/footer.php');
  ?>

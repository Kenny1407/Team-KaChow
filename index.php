<?php
require_once('view-comp/header.php');
require_once('resources/db-properties.php');


if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id","item_image");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]

			);
			array_push($_SESSION['shopping_cart'], $item_array);
      echo '<script>alert("Item is Added to the cart")</script>';

		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="add-to-cart.php"</script>';
			}
		}
	}
}
 ?>


 <div class="container"style="width: 100%; height:50px;">
     <form action="process/process-result.php" method="post">
       <div class="form-group" style=" display: flex; width: 100%; margin-bottom: 15px;">
         <label for="searchTerm"></label>
         <button class="btn" style="padding: 10px; background: dodgerblue; color: white; min-width: 50px; text-align: center;"><i class="fas fa-search"></i></button>
         <input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Search in KaChow"/>
         <a href="add-to-cart.php" class="btn btn-primary">Cart</a>
   </div>
     </form>
   </div>
 <br><br><br>
 <?php
   try {

     // 127.0.0.1 = localhost
     @ $db = new mysqli('127.0.0.1:3306', 'student', '123qwe', 'php_ecomproject_db');

     $dbError = mysqli_connect_errno();
     if ($dbError) {
       throw new Exception('Error: Could not connect to database. '.
         'Please try again later. '.$dbError, 1);
     }


     $query = $query = "SELECT * FROM product_table ORDER BY ID ASC";
     $result = $db->query($query);

     $resultCount = $result->num_rows;

     echo '<div class="row">';
     for ($ctr = 0; $ctr < $resultCount; $ctr++) {
       $row = $result -> fetch_assoc();
     ?>

     <form method="post" action="product-details.php?id=<?php echo $row["ID"]; ?>">
       <div class="card" style="margin-left:40px; left:30%; border-radius: 30px; border: 5px; border-color:black; border-style:solid; position: auto;">
         <div class="card-body" style="height:450px;">
          <a href="product-details.php?id=<?php echo $row["ID"]; ?>"><img style="height:300px; width:300px;" src="images/<?php echo $row ['pic_url']; ?>"
						 width="200 rem" alt="Product" class="img-responsive"></a>
           <h4 style="text-align:center;" class="text-info"><?php echo $row['NAME'];?></h6>
           <h5 class="text-danger" style="text-align:center;">$ <?php echo $row ['PRICE']; ?></h5>
            <center><input type="submit" style="margin-top: 5px;" class="btn btn-success" value="Product Details"></center>
         </div>
       </div>
     </form>
     <?php
     }
     echo '</div>';
   } catch (Exception $e) {
     echo $e->getMessage();
   }
 ?>


<?php
require_once('view-comp/footer.php');
 ?>

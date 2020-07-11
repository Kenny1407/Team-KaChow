<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  </head>
    <body>

       <div class="container"style="width: 100%; height:50px; padding: 10px;">
           <form action="process/process-result-landing.php" method="post">
             <div class="form-group" style=" display: flex; width: 100%; margin-bottom: 15px;">
               <label for="searchTerm"></label>
               <button class="btn" style="padding: 10px; background: dodgerblue; color: white; min-width: 50px; text-align: center;"><i class="fas fa-search"></i></button>
               <input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Search in KaChow"/>
         </div>
           </form>
         </div>
       <h2 style="text-align:center">TEAM-KACHOW E COMMERCE</h2>
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

           <form method="post" action="front-page.php">
             <div class="card" style="margin-left:40px; left:30%; border-radius: 30px; border: 5px; border-color:black; border-style:solid; position: auto;">
               <div class="card-body" style="height:450px;">
                <a href="front-page.php"><img style="height:250px; width:250px;" src="<?php echo $row ['pic_url']; ?>"
      						 width="200 rem" alt="Product" class="img-responsive"></a>
                 <h4 style="text-align:center;" class="text-info"><?php echo $row['NAME'];?></h6>
                 <h5 class="text-danger" style="text-align:center;">$ <?php echo $row ['PRICE']; ?></h5>
                  <center><input type="submit" style="margin-top: 5px;" class="btn btn-success" value="Buy Now"></center>
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

    </body>
</html>

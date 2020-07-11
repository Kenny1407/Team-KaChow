<?php
require_once('service/service-logs.php');
require_once('model/user_info.php');


   //https secure
   if ($_SERVER['HTTPS'] != 'on') {
     header ('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
     exit;
   }
  ?>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width-device-width, initial-scale-1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/6e896293bb.js" crossorigin="anonymous"></script>
        <style media="screen">
        body {
             background: url("images/front-page-image.jpg");
             /* no-repeat (image) center center fixed */
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover;
            }
        </style>

    </head>
      <body>
      <form class="form-signin" action="process/process-login.php" method="post">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
          <!-- Logo here if we have logo now -->
          <div href="index.php" class="navbar-brand">KaChowMerce</div>
          <div class="collaps navbar-collapse">
            <ul class="navbar-nav" style="margin-left: 750px;">
              <!-- Login form -->
              <li>
                <input type="text" id = "username" name="username" class="form-control" placeholder="Username" required autofocus
                 width="40" height="40"/>
              </li>
              <li>
                <input type="password" id = "password" name="password" class="form-control" placeholder="Password" required />
              </li>
              <li>
                <button class="btn btn-primary mx-2" type="sumbit">Log In</button>
              </li>
            </ul>
          </div>
        </div>
       <?php if (isset($_GET['error'])) { ?>
         <div class="alert alert-danger">
           <?php echo $_GET['error'] ?>
         </div>
       <?php } ?>
     </form>

     <div class="container" style="width: 30%; height:740px; border-style:ridge; background-color: white; padding: 5px; margin-right: 50px; float:right;">
       <div class="card-title">
         <center><h2>No Account Yet?</h2>
         <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSign up now!</h4>
         <div class="card-body">

            <!-- Register form  -->
           <form action="process/process-register.php" method="post">
             <div class="form-group" style="text-align:center;">
               <label for=""><b>Username:  </b></label>
               <input class="form-control "type="text" name="username" id="username" placeholder="Username" required autofocus style="text-align:center;">
             </div>
             <div class="form-group" style="text-align:center;">
               <label for="">Email: <b/></label>
                <input class="form-control "type="text" name="email" id="email" placeholder="Email Address" required autofocus style="text-align:center;">
             </div>
             <div class="form-group" style="text-align:center;">
               <label for=""><b>Password:  </b></label>
               <input class="form-control" type="password" id="password" name="password"  placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
               title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required autofocus style="text-align:center;">
             </div>
             <div class="form-group" style="text-align:center;">
               <label for="">First Name:  </b></label>
               <input class="form-control"type="text" name="firstname" id="firstname" placeholder="First Name" required autofocus style="text-align:center;">
               <label for=""><b>Last Name: </b></label>
               <input class="form-control"type="text" name="lastname" id="lastname" placeholder="Last Name" required autofocus style="text-align:center;">
               <label for=""><b>Middle Name:  </b></label>
               <input class="form-control"type="text" name="middlename" id="middlename" placeholder="Middle Name"  autofocus style="text-align:center;">
               <label for=""><b>Suffix Name:  </b></label>
               <input class="form-control"type="text" name="suffixname" id="suffixname" placeholder="Suffix Name"  autofocus style="text-align:center;">
             </div>
             <div class="form-group">
               <center><button type="submit" class="btn btn-primary">Register</button></center>
             </div>
           </form>
         </div>
       </div>
     </div>





        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
     </body>
 </html>

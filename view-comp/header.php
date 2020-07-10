
<?php
  session_start();
// if the user accidentally or intentionally go to the log-in page without logging in, they will be redicrect to the front page again and an error will appear
  if (!isset($_SESSION['username'])) {
    header('Location: front-page.php?error=Unauthoried access');
    exit;
  }

  //https secure
  // if (@$_SERVER['HTTPS'] == 'on') {
  //   header ('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  //   exit;
    if (@$_SERVER['HTTPS'] != 'on') {
      header ('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
      exit;
    }
  //}
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/6e896293bb.js" crossorigin="anonymous"></script>


  </head>
    <body>
      <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div href="index.php" class="navbar-brand">KaChowMerce</div>
        <div class="collaps navbar-collapse">
          <ul class="navbar-nav" style="margin-left: 1220px;">
            <li>
              <?php echo '<font color=white font size="4"><b>'.$_SESSION ['username'].'</font></b>' ?>
            </li>
            <li "nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="margin-left:1340px;">
                <a class="dropdown-item" href="process/process-logout.php">Logout</a>
              </div>
            </li>
            </ul>
          </div>
        </div>

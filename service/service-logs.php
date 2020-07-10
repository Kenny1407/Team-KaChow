<?php



  define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

function registerLogs () {

    $date = date('H:i, jS F Y');
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $username = $_POST['username'];

    $outputString = $date."\t"
    .$ipAddress. " - \t"
    .$username."\r\n";

    $file = @ fopen(DOCUMENT_ROOT.'/Team-KaChow/resources/registration.txt', 'ab');



    fwrite($file, $outputString, strlen($outputString));
    fclose($file);
}


function loginLogs () {

  $date = date('H:i, jS F Y');
  $ipAddress = $_SERVER['REMOTE_ADDR'];
  $username = $_POST['username'];

  $outputString = $date."\t"
  .$ipAddress. " - \t"
  .$username."\r\n";

  $file = @ fopen(DOCUMENT_ROOT.'/Team-KaChow/resources/login.txt', 'ab');



      fwrite($file, $outputString, strlen($outputString));
      fclose($file);
}
function checkoutLogs () {

  $date = date('H:i, jS F Y');
  $ipAddress = $_SERVER['REMOTE_ADDR'];
  $username = $_SESSION ['username'];

  $outputString = $date."\t"
  .$ipAddress. " - \t"
  .$username."\r\n";

  $file = @ fopen(DOCUMENT_ROOT.'/Team-KaChow/resources/checkout.txt', 'ab');



      fwrite($file, $outputString, strlen($outputString));
      fclose($file);
}




 ?>

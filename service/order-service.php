<?php

require_once('front-page.php');
require_once('resources/db-properties.php');

define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

    function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



function getRegistration($user){



    echo '<br/>' .DOCUMENT_ROOT;
  $date = date('H:i, jS F Y');

  $outputString = $date."\t"
  .$user." Username\t"
  .$ip."IP";

  $file = @ fopen(DOCUMENT_ROOT.'/Team-KaChow/recources/registration.txt', 'ab');


  if(!$file){
    echo '<p><strong>You cannot register at this moment.</strong></p>';
  } else {
      flock($file, LOCK_EX);
      fwrite($file, $outputString, strlen($outputString));
      flock($file, LOCK_UN);

      fclose($file);
  }
}




 ?>

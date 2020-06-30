
<?php
class Product{
  private $username;
  private $firstname;
  private $lastname;


  public function __construct(){
    $username = "";
  }

  public function instantiate($username, $firstname,  $lastname){
    $this->username = $username;
    $this->$firstname = $firstname;
    $this->$lastname = $lastname;
  }

  public function __get($fieldName){
    return $this->$fieldName;
  }

  public function __set($fieldName, $fieldValue){
    $this->$fieldName = $fieldValue;
  }
}
?>

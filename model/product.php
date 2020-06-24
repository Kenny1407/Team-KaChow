
<?php
class Product{
  private $name;
  private $price;
  private $qty;
  private $img;


  public function __construct(){
    $qty = 0;
  }

  public function instantiate($name, $price,  $qty, $img){
    $this->name = $name;
    $this->price = $price;
    $this->qty = $qty;
    $this->img = $img;
  }

  public function __get($fieldName){
    return $this->$fieldName;
  }

  public function __set($fieldName, $fieldValue){
    $this->$fieldName = $fieldValue;
  }
}
?>

<?php
class orderProduct
{
  public $id;
  public $name;
  public $price;
  public $new_price;
  public $qty;
  public $unit;
  public $sum;

  public function __construct($id, $name, $new_price, $price, $unit, $qty, $sum)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->new_price = $new_price;
    $this->qty = $qty;
    $this->unit = $unit;
    $this->sum = $sum;
  }
}

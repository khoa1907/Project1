<?php
class Product
{
  public $id;
  public $name;
  public $price;
  public $newprice;
  public $date;
  public $amount;
  public $sold;
  public $unit;
  public $image = [];

  public function __construct(
    $id,
    $name,
    $price,
    $newprice,
    $date,
    $amount,
    $sold,
    $unit,
    $image
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->newprice = $newprice;
    $this->date = $date;
    $this->amount = $amount;
    $this->sold = $sold;
    $this->unit = $unit;
    $this->image = $image;
  }
}
<?php
include_once '../../../library/dbhelper.php';
include_once '../models/Product.php';


class addProductController
{
  public function __construct()
  {
  }

  public function getProduct()
  {
    $sql = 'SELECT product_id FROM sanpham ORDER BY product_id DESC LIMIT 1';
    $product_id = executeSingleResult($sql)['product_id'] + 1;

    if (!empty($_POST)) {
      if (isset($_POST['name'])) {
        $name = $_POST['name'];
      }
      if (isset($_POST['price'])) {
        $price = $_POST['price'];
      }
      if (isset($_POST['image'])) {
        $image = explode(',', $_POST['image']);
      }
      if (isset($_POST['newprice'])) {
        $newprice = $_POST['newprice'];
      }
      if (isset($_POST['date'])) {
        $date = $_POST['date'];
      }
      if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
      }
      $sold = 0;
      if (isset($_POST['unit'])) {
        $unit = $_POST['unit'];
      }
      $product = new Product(
        $product_id,
        $name,
        $price,
        $newprice,
        $date,
        $amount,
        $sold,
        $unit,
        $image
      );
      return $product;
    }
  }

  public function addProduct($product)
  {
    if (!empty($product)) {
      $sql =
        'insert into sanpham(product_id, name, price, newprice, date, amount, sold, unit) values("' .
        $product->id .
        '","' .
        $product->name .
        '","' .
        $product->price .
        '","' .
        $product->newprice .
        '","' .
        $product->date .
        '","' .
        $product->amount .
        '","' .
        $product->sold .
        '","' .
        $product->unit .
        '")';
      execute($sql);
    }
  }

  public function addImage($product)
  {
    $sql = 'SELECT pic_id FROM hinhanh ORDER BY pic_id DESC LIMIT 1';
    $pic_id = executeSingleResult($sql)['pic_id'] + 1;
    if (!empty($product)) {
      for ($i = 0; $i < count($product->image); $i++) {
        $sql =
          'insert into hinhanh(pic_id, product_id, pic) values("' .
          $pic_id .
          '","' .
          $product->id .
          '","' .
          $product->image[$i] .
          '")';
        execute($sql);
        $pic_id = $pic_id + 1;
      }
    }
  }
}
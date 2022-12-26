<?php
require_once '../models/Product.php';
require_once '../../../library/dbhelper.php';
class editProductController
{
  public function __construct()
  {
  }

  public function getProduct($id)
  {
    $productList = [];
    $sql1 = 'SELECT * FROM sanpham where product_id = ' . $id . '';
    $productList = executeResult($sql1);

    $id = $productList[0]['product_id'];
    $name = $productList[0]['name'];
    $price = $productList[0]['price'];
    $newprice = $productList[0]['newprice'];
    $date = $productList[0]['date'];
    $amount = $productList[0]['amount'];
    $sold = $productList[0]['sold'];
    $unit = $productList[0]['unit'];
    $image = [];

    $sql2 = 'SELECT pic from hinhanh where hinhanh.product_id = ' . $id . '';
    $imageList = executeResult($sql2);
    for ($j = 0; $j < count($imageList); $j++) {
      $image[$j] = $imageList[$j]['pic'];
    }

    $product = new Product(
      $id,
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

  public function getNewProduct($id)
  {
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
      $newproduct = new Product(
        $id,
        $name,
        $price,
        $newprice,
        $date,
        $amount,
        $sold,
        $unit,
        $image
      );
      return $newproduct;
    }
  }

  public function updateProduct($newproduct, $id)
  {
    $sql1 = 'delete from hinhanh where product_id = ' . $id . '';
    execute($sql1);
    $sql2 = 'update sanpham 
    set name = "' . $newproduct->name . '",
        price = "' . $newproduct->price . '",
        newprice = "' . $newproduct->newprice . '",
        date = "' . $newproduct->date . '",
        amount = "' . $newproduct->amount . '",
        sold = "' . $newproduct->sold . '",
        unit = "' . $newproduct->unit . '"
    where product_id = ' . $id . '';
    execute($sql2);
  }

  public function addImage($newproduct)
  {
    $sql = 'select * from hinhanh';
    $pic_id = count(executeResult($sql)) + 10;
    if (!empty($newproduct)) {
      for ($i = 0; $i < count($newproduct->image); $i++) {
        $sql =
          'insert into hinhanh(pic_id, product_id, pic) values("' .
          $pic_id .
          '","' .
          $newproduct->id .
          '","' .
          $newproduct->image[$i] .
          '")';
        execute($sql);
        $pic_id = $pic_id + 1;
      }
    }
    echo '<script>alert("Bạn đã cập nhật thông tin sản phẩm thành công!")</script>';
    echo '<script>window.location.href = "listProductView.php";</script>';
  }
}
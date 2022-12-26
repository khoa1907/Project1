<?php
require_once '../models/Product.php';
require_once '../../../library/dbhelper.php';
class productController
{
  public function __construct()
  {
  }

  public function getProductList()
  {
    $list = [];
    $sql = 'SELECT * FROM sanpham';
    $productList = executeResult($sql);

    for ($i = 0; $i < count($productList); $i++) {
      $id = $productList[$i]['product_id'];
      $name = $productList[$i]['name'];
      $price = $productList[$i]['price'];
      $newprice = $productList[$i]['newprice'];
      $date = $productList[$i]['date'];
      $amount = $productList[$i]['amount'];
      $sold = $productList[$i]['sold'];
      $unit = $productList[$i]['unit'];
      $image = [];

      $sql = 'SELECT pic from hinhanh where hinhanh.product_id = ' . $id . '';
      $imageList = executeResult($sql);

      for ($j = 0; $j < count($imageList); $j++) {
        $image[] = $imageList[$j]['pic'];
      }

      $list[] = new Product(
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
    }

    return $list;
  }

  public function deleteProduct($id)
  {
    $sql = $sql = 'delete from donhang_sanpham where product_id = ' . $id . '';
    execute($sql);
    $sql = $sql = 'delete from sanpham where product_id = ' . $id . '';
    execute($sql);
    echo '<script>window.location.href = "listProductView.php";</script>';
  }

  public function deleteImage($id)
  {
    $sql = $sql = 'delete from hinhanh where product_id = ' . $id . '';
    execute($sql);
  }
}
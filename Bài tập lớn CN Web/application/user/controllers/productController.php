<?php
require_once '../models/Product.php';
require_once '../models/TmpProduct.php';
require_once '../../../library/dbhelper.php';

class productController
{
  public function getDetailProduct($pid)
  {
    $sql = 'select * from sanpham where product_id = ' . $pid . '';

    $product = executeResult($sql);
    $id = $product[0]['product_id'];
    $name = $product[0]['name'];
    $price = $product[0]['price'];
    $newprice = $product[0]['newprice'];
    $date = $product[0]['date'];
    $amount = $product[0]['amount'];
    $sold = $product[0]['sold'];
    $unit = $product[0]['unit'];
    $image = [];

    $sql = 'SELECT pic from hinhanh where hinhanh.product_id = ' . $id . '';
    $imageList = executeResult($sql);

    for ($j = 0; $j < count($imageList); $j++) {
      $image[] = $imageList[$j]['pic'];
    }

    return new Product(
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

  public function getTmpProduct($product)
  {
    if (!empty($_POST)) {
      if (isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        if ($qty > $product->amount) {
          echo '<script>alert("Số lượng sản phẩm không đủ! Vui lòng chọn lại số sản phẩm cần mua!");</script>';
          die();
        } else {
          if ($product->newprice == null) {
            $sum = $qty * $product->price;
          } else {
            $sum = $qty * $product->newprice;
          }
          $tmpProduct = new TmpProduct(
            $product->id,
            $product->name,
            $product->newprice,
            $product->price,
            $product->unit,
            $qty,
            $sum
          );
          return $tmpProduct;
        }
      }
    }
  }

  public function addTmpProduct($tmpProduct)
  {
    $explode_content = explode('-', $_SESSION['value']);
    $total = $explode_content[0];
    $total += $tmpProduct->qty;
    global $check;
    $check = false;

    $list = [];

    if ($explode_content[0] == 0) {
      $list[] = $tmpProduct;
    } else {
      for ($i = 0; $i < (count($explode_content) - 1) / 7; $i++) {
        if ($tmpProduct->id == $explode_content[7 * $i + 1]) {
          $check = true;
          $tmp = new TmpProduct(
            $explode_content[7 * $i + 1],
            $explode_content[7 * $i + 2],
            $explode_content[7 * $i + 3],
            $explode_content[7 * $i + 4],
            $explode_content[7 * $i + 5],
            $explode_content[7 * $i + 6] + $tmpProduct->qty,
            ($explode_content[7 * $i + 7] / $explode_content[7 * $i + 6]) *
              ($explode_content[7 * $i + 6] + $tmpProduct->qty)
          );
          $list[] = $tmp;
        } else {
          $tmp = new TmpProduct(
            $explode_content[7 * $i + 1],
            $explode_content[7 * $i + 2],
            $explode_content[7 * $i + 3],
            $explode_content[7 * $i + 4],
            $explode_content[7 * $i + 5],
            $explode_content[7 * $i + 6],
            $explode_content[7 * $i + 7]
          );
          $list[] = $tmp;
        }
      }
      if ($check == false) {
        $list[] = $tmpProduct;
      }
    }

    $_SESSION['value'] = $total;
    for ($i = 0; $i < count($list); $i++) {
      $_SESSION['value'] .= '-' . $list[$i]->id;
      $_SESSION['value'] .= '-' . $list[$i]->name;
      $_SESSION['value'] .= '-' . $list[$i]->new_price;
      $_SESSION['value'] .= '-' . $list[$i]->price;
      $_SESSION['value'] .= '-' . $list[$i]->unit;
      $_SESSION['value'] .= '-' . $list[$i]->qty;
      $_SESSION['value'] .= '-' . $list[$i]->sum;
    }

    echo '<script>alert("Thêm vào giỏ hàng thành công!"); window.location.href = "cartView.php";</script>';
  }
}

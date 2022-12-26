<?php
require_once '../models/orderProduct.php';
require_once '../../../library/dbhelper.php';

class orderDetailController
{
  public function getDetailProduct($pid)
  {
    $sql = 'select * from donhang_sanpham where  order_id= ' . $pid . '';
    $product = executeResult($sql);
    $list = [];

    for ($i = 0; $i < count($product); $i++) {
      $id = $product[$i]['product_id'];
      $qty = $product[$i]['qty'];

      $sql = 'select * from sanpham where  product_id= ' . $id . '';
      $productDetail = executeSingleResult($sql);
      $name = $productDetail['name'];
      $price = $productDetail['price'];
      $new_price = $productDetail['newprice'];
      $unit = $productDetail['unit'];
      if ($new_price == null) {
        $sum = $price * $qty;
      } else {
        $sum = $new_price * $qty;
      }

      $list[] = new orderProduct($id, $name, $new_price, $price, $unit, $qty, $sum);
    }

    return $list;
  }

  public function updateStatus($list, $id)
  {
    if (!empty($_POST)) {
      if (isset($_POST['status'])) {
        $sql = 'select * from donhang WHERE order_id = ' .
          $id;
        $old_status = executeSingleResult($sql)['status'];
        $status = $_POST['status'];

        if ($old_status == 'hoàn thành') {
          echo '<script>alert("Đơn đã hoàn thành, không thể chỉnh sửa!");</script>';
        } else {

          if ($status == 'đang xử lý' || $status == 'đang giao hàng' || $status == 'hoàn thành') {
            $sql =
              'UPDATE donhang
        SET status = "' .
              $status .
              '"
        WHERE order_id = ' .
              $id;
            execute($sql);
            if ($status == 'hoàn thành') {
              for ($i = 0; $i < count($list); $i++) {
                $sql = 'select * from sanpham where product_id = ' . $list[$i]->id;
                $rs = executeSingleResult($sql);
                $amount = $rs['amount'] - $list[$i]->qty;
                $sold = $rs['sold'] + $list[$i]->qty;

                $sql = 'update sanpham set amount = "' . $amount . '", sold = "' . $sold . '" where product_id = ' . $list[$i]->id;
                execute($sql);
              }
            }
            echo '<script>alert("Update thành công!"); window.location.href = "orderDetailView.php?id=' .
              $id .
              '";</script>';
          } else {
            echo '<script>alert("Vui lòng nhập một trong các trạng thái: đang xử lý, đang giao hàng hoặc hoàn thành!");</script>';
          }
        }
      }
    }
  }
}

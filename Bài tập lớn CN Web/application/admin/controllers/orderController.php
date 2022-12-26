<?php
include_once '../models/Order.php';
include_once '../../../library/dbhelper.php';

class orderController
{
  public function __construct()
  {
  }

  public function getOrderList($status)
  {
    if ($status == 'Toàn bộ') {
      $sql = 'SELECT * FROM donhang';
    } else {
      $sql = 'SELECT * FROM donhang where status="'.$status.'"';
    }
    $list = [];
    $orderList = executeResult($sql);
    $stt = 0;
    for ($i = 0; $i < count($orderList); $i++) {
      $stt++;
      $order_id = $orderList[$i]['order_id'];
      $customer_id = $orderList[$i]['customer_id'];
      $total_price = $orderList[$i]['total'];
      $status = $orderList[$i]['status'];
      $date = $orderList[$i]['date'];

      $sql =
        'SELECT * from thongtinkhach where thongtinkhach.customer_id = ' .
        $customer_id .
        '';
      $customer = executeSingleResult($sql);

      $customer_name = $customer['customername'];
      $address = $customer['address'];
      $phone = $customer['phone'];
      $email = $customer['email'];
      $note = $customer['ghichu'];
      $payment = $customer['hinhthucthanhtoan'];

      $list[] = new Order(
        $stt,
        $order_id,
        $customer_id,
        $customer_name,
        $address,
        $phone,
        $email,
        $note,
        $date,
        $total_price,
        $status,
        $payment
      );
    }
    return $list;
  }
}

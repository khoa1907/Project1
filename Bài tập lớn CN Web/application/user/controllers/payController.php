<?php
include_once '../../../library/dbhelper.php';
include_once '../models/Customer.php';
include_once '../models/Order.php';

class payController
{
  public function __construct()
  {
  }

  public function getCustomer()
  {
    $sql = 'select * from thongtinkhach';
    $customer_id = count(executeResult($sql)) + 1;

    if (!empty($_POST)) {
      if (isset($_POST['customername'])) {
        $customername = $_POST['customername'];
      }
      if (isset($_POST['address'])) {
        $address = $_POST['address'];
      }
      if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
      }
      if (isset($_POST['email'])) {
        $email = $_POST['email'];
      }
      if (isset($_POST['ghichu'])) {
        $ghichu = $_POST['ghichu'];
      }
      if (isset($_POST['hinhthucthanhtoan'])) {
        $hinhthucthanhtoan = $_POST['hinhthucthanhtoan'];
      }
      $customer = new Customer(
        $customer_id,
        $customername,
        $address,
        $phone,
        $email,
        $ghichu,
        $hinhthucthanhtoan
      );
      return $customer;
    }
  }

  public function addCustomer($customer)
  {
    if (!empty($customer)) {
      $sql =
        'insert into thongtinkhach(customer_id, customername, address, phone, email, ghichu, hinhthucthanhtoan) values("' .
        $customer->customer_id .
        '","' .
        $customer->customername .
        '","' .
        $customer->address .
        '","' .
        $customer->phone .
        '","' .
        $customer->email .
        '","' .
        $customer->ghichu .
        '","' .
        $customer->hinhthucthanhtoan .
        '")';
      execute($sql);
    }
  }

  public function addOrderProduct($customer, $total, $list)
  {
    $sql = 'select * from donhang';
    $order_id = count(executeResult($sql)) + 1;
    if (!empty($customer)) {
      $order = new Order(
        $order_id,
        $customer->customer_id,
        $total,
        'đang xử lý',
        date('Y-m-d H:s:i')
      );
      if (!empty($order)) {
        $sql =
          'insert into donhang(order_id, customer_id, total, status, date) values("' .
          $order->order_id .
          '","' .
          $order->customer_id .
          '","' .
          $order->total .
          '","' .
          $order->status .
          '","' .
          $order->date .
          '")';
        execute($sql);
        for ($i = 0; $i < count($list); $i++) {
          $sql =
            'insert into donhang_sanpham(order_id, product_id, qty) values("' .
            $order->order_id .
            '","' .
            $list[$i]->id .
            '","' .
            $list[$i]->qty .
            '")';
          execute($sql);
        }

        echo '<script>alert("Đặt hàng thành công! Vui lòng chờ nhân viên cửa hàng liên hệ xác nhận!"); window.location.href = "homeView.php";</script>';
      }
    }
  }

  public function deleteTemporaryProduct()
  {
    $_SESSION['value'] = '0';
  }
}

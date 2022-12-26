<?php
class Customer
{
  public $customer_id;
  public $customername;
  public $address;
  public $phone;
  public $email;
  public $ghichu;
  public $hinhthucthanhtoan;

  public function __construct(
    $customer_id,
    $customername,
    $address,
    $phone,
    $email,
    $ghichu,
    $hinhthucthanhtoan
  ) {
    $this->customer_id = $customer_id;
    $this->customername = $customername;
    $this->address = $address;
    $this->phone = $phone;
    $this->email = $email;
    $this->ghichu = $ghichu;
    $this->hinhthucthanhtoan = $hinhthucthanhtoan;
  }
}

<?php
class Order
{
  public $stt;
  public $order_id;
  public $customer_id;
  public $customer_name;
  public $address;
  public $phone;
  public $email;
  public $note;
  public $date;
  public $total_price;
  public $status;
  public $payment;

  public function __construct(
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
  ) {
    $this->stt = $stt;
    $this->order_id = $order_id;
    $this->customer_id = $customer_id;
    $this->customer_name = $customer_name;
    $this->address = $address;
    $this->phone = $phone;
    $this->email = $email;
    $this->note = $note;
    $this->date = $date;
    $this->total_price = $total_price;
    $this->status = $status;
    $this->payment = $payment;
  }
}

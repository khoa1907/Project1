<?php
class Order
{
  public $order_id;
  public $customer_id;
  public $total;
  public $status;
  public $date;

  public function __construct($order_id, $customer_id, $total, $status, $date)
  {
    $this->order_id = $order_id;
    $this->customer_id = $customer_id;
    $this->total = $total;
    $this->status = $status;
    $this->date = $date;
  }
}

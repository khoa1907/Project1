<?php
include_once '../models/TmpProduct.php';

class cartController
{
  public function __construct()
  {
  }

  public function showList()
  {
    $explode_content = explode('-', $_SESSION['value']);
    $list = [];
    for ($i = 0; $i < (count($explode_content) - 1) / 7; $i++) {
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
    return $list;
  }

  public function showBill()
  {
    $explode_content = explode('-', $_SESSION['value']);
    $total[0] = $explode_content[0];
    $total[1] = 0;
    for ($i = 0; $i < (count($explode_content) - 1) / 7; $i++) {
      $total[1] += $explode_content[7 * $i + 7];
    }
    return $total;
  }

  public function delete($id)
  {
    $explode_content = explode('-', $_SESSION['value']);
    $total = $explode_content[0];
    $list = [];
    for ($i = 0; $i < (count($explode_content) - 1) / 7; $i++) {
      if ($explode_content[7 * $i + 1] == $id) {
        $total -= $explode_content[7 * $i + 6];
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
    echo '<script>window.location.href = "cartView.php";</script>';
  }
}
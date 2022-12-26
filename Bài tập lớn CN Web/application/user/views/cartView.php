<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../public/css/style.css" />
  <title>Fresh Fruit</title>
</head>

<body>
  <!-------------------------header------------------------------->
  <header>
    <div class="header-container">
      <div class="logo">
        <a href="homeView.php"><img src="../../../public/img/logo.jpg" alt="logo" /></a>
      </div>
      <div class="menu">
        <ul>
          <li><a href="homeView.php">TRANG CHỦ</a></li>
          <li><a href="listProductView.php">SẢN PHẨM</a></li>
          <li><a href="aboutUsView.php">VỀ CHÚNG TÔI</a></li>
                    <li><a href="../../admin/views/loginView.php">ĐĂNG NHẬP</a></li>
          
        </ul>
      </div>
      <div class="icon">
        <ul>
          <li class="selected">
            <a href="cartView.php"><img src="../../../public/img/shopping-bag.png" alt="shopping-bag" /></a>
          </li>
        </ul>
        <?php
        include_once '../controllers/cartController.php';
        $cartController = new cartController();
        $bill = $cartController->showBill();
        echo '<p>(' . $bill[0] . ')</p>';
        ?>
      </div>
    </div>
  </header>
  <div class="menu-2">
    <ul>
      <li><a href="homeView.php">TRANG CHỦ</a></li>
      <li><a href="listProductView.php">SẢN PHẨM</a></li>
      <li><a href="aboutUsView.php">VỀ CHÚNG TÔI</a></li>
    </ul>
  </div>
  <!-------------------------cart--------------------------------->
  <div class="cart-container">
    <div class="cart-content-left">
      <table>
        <tr>
          <th>TÊN SẢN PHẨM</th>
          <th>ĐƠN GIÁ</th>
          <th>SỐ LƯỢNG</th>
          <th>THÀNH TIỀN</th>
          <th></th>
        </tr>
        <?php
        $list = $cartController->showList();
        for ($i = 0; $i < count($list); $i++) {
          echo '<tr>
            <td>' .
            $list[$i]->name .
            '</td>
            <td>
              <div class="cart-content-left-product-price">
                <p>';
          if ($list[$i]->new_price == null) {
            echo number_format($list[$i]->price, 0, ',', '.');
          } else {
            echo number_format($list[$i]->new_price, 0, ',', '.');
          }
          echo 'đ / ' .
            $list[$i]->unit .
            ' kg</p>
              </div>
              <div class="cart-content-left-product-old-price">
                <p>';
          if ($list[$i]->new_price == null) {
            echo '*';
          } else {
            echo number_format($list[$i]->price, 0, ',', '.') .
              'đ / ' .
              $list[$i]->unit .
              ' kg';
          }
          echo '</p>
              </div>
            </td>
            <td>
              <p>' .
            $list[$i]->qty .
            '</p>
            </td>
            <td>
              <p>' .
            number_format($list[$i]->sum, 0, ',', '.') .
            'đ</p>
            </td>
            <td>
            <a id="delete' .
            $list[$i]->id .
            '" href="" onclick="ask(' .
            $list[$i]->id .
            ')"><button>Xóa</button></a>
            </td>
            </tr>';
        }
        echo '<script>
        function ask(id) {
        if (confirm("Xóa sản phẩm này?")) {
          document.getElementById("delete" + id).setAttribute("href", "cartView.php?id=" + id);
        } else {
          document.getElementById("delete" + id).setAttribute("href", "cartView.php");
        }
        }
        </script>';
        if (isset($_GET['id']) && $_GET['id'] != null) {
          $cartController->delete($_GET['id']);
        }
        ?>
      </table>
    </div>
    <div class="cart-content-right">
      <table>
        <tr>
          <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
        </tr>
        <?php echo '<tr>
          <td>TỔNG SẢN PHẨM</td>
          <td>' .
          $bill[0] .
          '</td>
        </tr>
        <tr>
          <td>THÀNH TIỀN</td>
          <td>' .
          number_format($bill[1], 0, ',', '.') .
          'đ</td>
        </tr>
        <tr>
          <td>TẠM TÍNH</td>
          <td>' .
          number_format($bill[1], 0, ',', '.') .
          'đ</td>
        </tr>'; ?>
      </table>
      <div class="cart-content-right-button">
        <a href="listProductView.php"><button>TIẾP TỤC MUA HÀNG</button></a>
        <a href="payView.php"><button>THANH TOÁN</button></a>
      </div>
    </div>
  </div>
  <!-------------------------tip---------------------------------->
  <div class="tip">
    <h2>Lợi ích khi ăn hoa quả</h2>
    <br />
    <p>
      " Ăn hoa quả là một phần của chế độ ăn uống lành mạnh. Ăn các loại thực
      phẩm như trái cây có hàm lượng calo thấp hơn thay vì một số thực phẩm
      khác có hàm lượng calo cao hơn có thể hữu ích trong việc giúp giảm lượng
      calo tiêu thụ, từ đó giúp người dùng kiểm soát cân nặng. Ăn một chế độ
      ăn nhiều rau và trái cây có thể làm giảm nguy cơ mắc bệnh tim, bao gồm
      đau tim và đột quỵ. Ăn một chế độ ăn nhiều rau và trái cây có thể bảo vệ
      cơ thể chống lại một số loại ung thư. Trái cây có thể giúp tăng lượng
      chất xơ và kali, là những chất dinh dưỡng quan trọng mà nhiều người dùng
      không có đủ trong chế độ ăn uống của họ. "
    </p>
  </div>
  <!-------------------------footer------------------------------->
  <footer>
    <p class="info">
      Địa chỉ: Số 50 Thái Thịnh, Đống Đa, Hà Nội <br />
      Điện thoại: 0123456789 <br />
      Email: freshfruit6789@gmail.com
    </p>

    <div class="contact">
      <a href="https://www.facebook.com/"><img src="../../../public/img/facebook.png" alt="facebook" /></a>
      <a href="https://www.instagram.com/"><img src="../../../public/img/instagram.png" alt="instagram" /></a>
      <a href="https://www.youtube.com/"><img src="../../../public/img/youtube.png" alt="youtube" /></a>
    </div>
  </footer>
</body>

</html>
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
          <li class="selected">
            <a href="listProductView.php">SẢN PHẨM</a>
          </li>
          <li><a href="aboutUsView.php">VỀ CHÚNG TÔI</a></li>
                    <li><a href="../../admin/views/loginView.php">ĐĂNG NHẬP</a></li>
          
        </ul>
      </div>
      <div class="icon">
        <ul>
          <li>
            <a href="cartView.php"><img src="../../../public/img/shopping-bag.png" alt="shopping-bag" /></a>
          </li>
        </ul>
        <?php
        include_once '../controllers/cartController.php';
        $controller = new cartController();
        $bill = $controller->showBill();
        echo '<p>(' . $bill[0] . ')</p>';
        ?>
      </div>
    </div>
  </header>
  <div class="menu-2">
    <ul>
      <li><a href="homeView.php">TRANG CHỦ</a></li>
      <li class="selected"><a href="listProductView.php">SẢN PHẨM</a></li>
      <li><a href="aboutUsView.php">VỀ CHÚNG TÔI</a></li>
    </ul>
  </div>
  <!-------------------------product content---------------------->
  <div class="product-content">
    <?php
    $pid = $_GET['id'];
    include_once '../controllers/productController.php';
    $productController = new productController();
    $product = $productController->getDetailProduct($pid);

    echo '    <div class="product-content-left">
      <div class="product-content-left-big-img">
        <img src="../../../' .
      $product->image[0] .
      '" alt="" />
      </div>';
    if (count($product->image) > 1) {
      echo '<div class="product-content-left-small-img">';
      for ($i = 0; $i < count($product->image); $i++) {
        echo '<img src="../../../' . $product->image[$i] . '" alt="" /> ';
      }
      echo '</div>';
    }
    echo '</div>
    <div class="product-content-right">
      <div class="product-content-right-product-name">
        <h2>' .
      $product->name .
      '</h2>
      </div>
      <div class="product-content-right-product-price">
        <p>';
    if ($product->newprice == null) {
      echo number_format($product->price, 0, ',', '.');
    } else {
      echo number_format($product->newprice, 0, ',', '.');
    }
    echo 'đ / ' .
      $product->unit .
      ' kg</p>
      </div>
      <div class="product-content-right-product-old-price">
        <p>';
    if ($product->newprice == null) {
      echo '*';
    } else {
      echo number_format($product->price, 0, ',', '.') .
        'đ / ' .
        $product->unit .
        ' kg';
    }
    echo '</p>
      </div>
      <div class="product-content-right-product-status">
        <p>Tình trạng: Còn ' .
      $product->amount .
      ' sản phẩm</p>
      </div>
      <form method="post">
      <div class="product-content-right-quantity">
        <label for="qty">Số lượng:</label>
        <input id="qty" type="number" min="1" value="1" name="qty"/>
      </div>
      <div class="product-content-right-button">
        <button>Thêm vào giỏ hàng</button>
      </div>
      </form>
    </div>';
    if (!empty($_POST)) {
      $tmpProduct = $productController->getTmpProduct($product);
      $productController->addTmpProduct($tmpProduct);
    }
    ?>
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
  <script src="../../../public/js/productScript.js"></script>
</body>

</html>
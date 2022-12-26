<?php
session_start();

if (!isset($_SESSION['value'])) {
  $_SESSION['value'] = 0;
}
?>
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
                    <li class="selected"><a href="homeView.php">TRANG CHỦ</a></li>
                    <li><a href="listProductView.php">SẢN PHẨM</a></li>
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
            <li class="selected"><a href="homeView.php">TRANG CHỦ</a></li>
            <li><a href="listProductView.php">SẢN PHẨM</a></li>
            <li><a href="aboutUsView.php">VỀ CHÚNG TÔI</a></li>
        </ul>
    </div>
    <!-------------------------slider------------------------------->
    <br />
    <div class="slider">
        <div class="slider-container">
            <img src="../../../public/img/slide-1.jpg" alt="" />
            <img src="../../../public/img/slide-2.jpg" alt="" />
            <img src="../../../public/img/slide-3.jpg" alt="" />
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <!-------------------------new arrival-------------------------->

    <h2 class="list-title">HÀNG MỚI VỀ</h2>

    <div class="product-container">

        <?php
        include_once '../controllers/homeController.php';
        $listProductController = new homeController();
        $list = $listProductController->getNewList();

        for ($i = 0; $i < count($list); $i++) {
          echo '<div class="product-item">
            <a href="productView.php?id=' .
            $list[$i]->id .
            '"><img src="../../../' .
            $list[$i]->image[0] .
            '" alt="Sản phẩm ' .
            $list[$i]->id .
            '" /></a>
            <a href="productView.php?id=' .
            $list[$i]->id .
            '">
            <p class="name">' .
            $list[$i]->name .
            ' (' .
            $list[$i]->unit .
            'kg)</p>
            </a>
            <p class="price">';
          if ($list[$i]->newprice == null) {
            echo number_format($list[$i]->price, 0, ',', '.');
          } else {
            echo number_format($list[$i]->newprice, 0, ',', '.');
          }
          echo 'đ / ' .
            $list[$i]->unit .
            ' kg</p>
            <p class="old-price">';
          if ($list[$i]->newprice == null) {
            echo '*';
          } else {
            echo number_format($list[$i]->price, 0, ',', '.') .
              'đ / ' .
              $list[$i]->unit .
              ' kg';
          }
          echo '</p>
            </div>';
        }
        ?>
    </div>

    <!-------------------------best seller-------------------------->
    <h2 class="list-title">SIÊU KHUYỄN MÃI</h2>
    <div class="product-container">
        <?php
        include_once '../controllers/homeController.php';
        $listProductController = new homeController();
        $list = $listProductController->getHotList();

        for ($i = 0; $i < count($list); $i++) {
          echo '<div class="product-item">
            <a href="productView.php?id=' .
            $list[$i]->id .
            '"><img src="../../../' .
            $list[$i]->image[0] .
            '" alt="Sản phẩm ' .
            $list[$i]->id .
            '" /></a>
            <a href="productView.php?id=' .
            $list[$i]->id .
            '">
            <p class="name">' .
            $list[$i]->name .
            ' (' .
            $list[$i]->unit .
            'kg)</p>
            </a>
            <p class="price">';
          if ($list[$i]->newprice == null) {
            echo number_format($list[$i]->price, 0, ',', '.');
          } else {
            echo number_format($list[$i]->newprice, 0, ',', '.');
          }
          echo 'đ / ' .
            $list[$i]->unit .
            ' kg</p>
            <p class="old-price">';
          if ($list[$i]->newprice == null) {
            echo '*';
          } else {
            echo number_format($list[$i]->price, 0, ',', '.') .
              'đ / ' .
              $list[$i]->unit .
              ' kg';
          }
          echo '</p>
            </div>';
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
        <p class="info">
            <a href="../../admin/views/loginView.php">Đăng nhập với tư cách admin</a>
        </p>

    </footer>
    <script src="../../../public/js/homeScript.js"></script>
</body>

</html>
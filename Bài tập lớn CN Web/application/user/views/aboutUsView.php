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
          <li class="selected">
            <a href="aboutUsView.php">VỀ CHÚNG TÔI</a>
                    <li><a href="../../admin/views/loginView.php">ĐĂNG NHẬP</a></li>
            
          </li>
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
      <li><a href="listProductView.php">SẢN PHẨM</a></li>
      <li class="selected"><a href="aboutUsView.php">VỀ CHÚNG TÔI</a></li>
    </ul>
  </div>
  <!-------------------------picture about us--------------------->
  <br />
  <div class="about-us-picture">
    <img src="../../../public/img/about-us.jpg" alt="About Us" />
  </div>
  <!-------------------------content------------------------------>
  <div class="about-us-container">
    <h1>ABOUT US</h1>
    <div class="about-us-content">
      <img src="../../../public/img/about-us-1.jpg" alt="About Us 1" />
      <div class="about-us-intro">
        <h3>Cửa hàng</h3>
        <h4>Rộng rãi, thoáng mát</h4>
        <p>
          Cửa hàng chúng tôi được xây dựng tại mặt đường chính với diện tích
          rộng lớn, được trang trí với không gian thoáng mát nhiều cây xanh.
          Khi quý khách bước vào cửa hàng sẽ được tận hưởng một không gian
          thoáng mát sảng khoái khi mua hàng.
        </p>
      </div>
    </div>
    <div class="about-us-content">
      <div class="about-us-intro">
        <h3>Sản phẩm</h3>
        <h4>Tươi ngon, An toàn</h4>
        <p>
          Sản phẩm của chúng tôi được nhập từ các tỉnh thành trên cả nước, hoa
          quả được nhập và lựa chọn kỹ càng tại chính nông trại vì vậy mà độ
          tươi và ngon của hoa quả rất đảm bảo. Sản phẩm của chúng tôi được
          đảm bảo kiểm định 100% không sử dụng thuốc bảo quản.
        </p>
      </div>
      <img src="../../../public/img/about-us-2.jpg" alt="About Us 2" />
    </div>
    <div class="about-us-content">
      <img src="../../../public/img/about-us-3.jpg" alt="About Us 3" />
      <div class="about-us-intro">
        <h3>Phục vụ</h3>
        <h4>Tận tình, chu đáo</h4>
        <p>
          Khi quý khách hàng đến cửa hàng chúng tôi, quý khách sẽ được nhân
          viên phụ vụ tận tình chu đáo, nếu quý khách ở xa không đến trực tiếp
          cửa hàng, quý khách có thể đặt hàng tại trang web, chúng tôi sẽ liên
          hệ trực tiếp để tư vấn cho quý khách.
        </p>
      </div>
    </div>
    <div class="about-us-content-2">
      <img src="../../../public/img/about-us-1.jpg" alt="About Us 1" />
      <div class="about-us-intro">
        <h3>Cửa hàng</h3>
        <h4>Rộng rãi, thoáng mát</h4>
        <p>
          Cửa hàng chúng tôi được xây dựng tại mặt đường chính với diện tích
          rộng lớn, được trang trí với không gian thoáng mát nhiều cây xanh.
          Khi quý khách bước vào cửa hàng sẽ được tận hưởng một không gian
          thoáng mát sảng khoái khi mua hàng.
        </p>
      </div>
    </div>
    <div class="about-us-content-2">
      <img src="../../../public/img/about-us-2.jpg" alt="About Us 2" />
      <div class="about-us-intro">
        <h3>Sản phẩm</h3>
        <h4>Tươi ngon, An toàn</h4>
        <p>
          Sản phẩm của chúng tôi được nhập từ các tỉnh thành trên cả nước, hoa
          quả được nhập và lựa chọn kỹ càng tại chính nông trại vì vậy mà độ
          tươi và ngon của hoa quả rất đảm bảo. Sản phẩm của chúng tôi được
          đảm bảo kiểm định 100% không sử dụng thuốc bảo quản.
        </p>
      </div>
    </div>
    <div class="about-us-content-2">
      <img src="../../../public/img/about-us-3.jpg" alt="About Us 3" />
      <div class="about-us-intro">
        <h3>Phục vụ</h3>
        <h4>Tận tình, chu đáo</h4>
        <p>
          Khi quý khách hàng đến cửa hàng chúng tôi, quý khách sẽ được nhân
          viên phụ vụ tận tình chu đáo, nếu quý khách ở xa không đến trực tiếp
          cửa hàng, quý khách có thể đặt hàng tại trang web, chúng tôi sẽ liên
          hệ trực tiếp để tư vấn cho quý khách.
        </p>
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
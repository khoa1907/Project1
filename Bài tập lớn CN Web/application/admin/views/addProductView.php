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
        <a href="../../user/views/homeView.php"><img src="../../../public/img/logo.jpg" alt="logo" /></a>
      </div>
      <div class="menu">
        <ul>
          <li class="selected"><a href="listProductView.php">QUẢN LÝ SẢN PHẨM</a></li>
          <li>
            <a href="orderView.php">QUẢN LÝ ĐƠN HÀNG</a>
          </li>
            <li><a href="../../user/views/homeView.php">ĐĂNG XUẤT</a></li>
          
        </ul>
      </div>
    </div>
  </header>


  <br /><br /><br /><br /><br /><br /><br />
  <!--Admin-->
  <div class="admin add--product">
    <h2 class="admin__title">Thêm sản phẩm</h2>
    <div class="admin__add-product">
      <form method="POST">
        <div class="form-group">
          <label class="form-label">Tên sản phẩm:</label>
          <input required name="name" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label">Chọn ảnh:</label>
          <input required name="image" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label">Giá bán:</label>
          <input required name="price" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label">Giá khuyến mãi (nếu có):</label>
          <input name="newprice" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label">Ngày bán:</label>
          <input required name="date" class="form-control" type="date">
        </div>
        <div class="form-group">
          <label class="form-label">Số lượng còn lại:</label>
          <input required name="amount" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label">Đơn vị bán:</label>
          <input required name="unit" class="form-control">
        </div>
        <div class="btn-admin">
          <input type="submit" value="Gửi" class="btn-add-input">
        </div>
      </form>
      <?php
      include_once '../controllers/addProductController.php';
      $addProductController = new addProductController();
      $product = $addProductController->getProduct();
      if (!empty($_POST)) {
        $addProductController->addProduct($product);
        $addProductController->addImage($product);
        echo '<script>alert("Bạn đã thêm sản phẩm thành công!")</script>';
        echo '<script>window.location.href = "listProductView.php";</script>';
      }
      ?>
    </div>
  </div>

</body>

</html>
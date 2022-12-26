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
          <li class="selected"><a href="">QUẢN LÝ SẢN PHẨM</a></li>
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
    <h2 class="admin__title">Chỉnh sửa thông tin sản phẩm</h2>
    <div class="admin__add-product">
      <?php
      include_once '../controllers/editProductController.php';
      $editProductController = new editProductController();
      if (isset($_GET['id']) && $_GET['id'] != null) {
        $product = $editProductController->getProduct($_GET['id']);
      }
      ?>
      <form method="POST">
        <div class="form-group">
          <label class="form-label">Tên sản phẩm:</label>
          <?php
          echo '<input required name="name" class="form-control" value="' . $product->name . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">Chọn ảnh:</label>
          <input required name="image" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label class="form-label">Giá bán:</label>
          <?php
          echo '<input required name="price" class="form-control" value="' . $product->price . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">Giá khuyến mãi:</label>
          <?php
          echo '<input required name="newprice" class="form-control" value="' . $product->newprice . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">Ngày bán:</label>
          <?php
          echo '<input required name="date" class="form-control" type="date" value="' . $product->date . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">Số lượng còn lại:</label>
          <?php
          echo '<input required name="amount" class="form-control" value="' . $product->amount . '">'
          ?>
        </div>
        <div class="form-group">
          <label class="form-label">Đơn vị bán:</label>
          <?php
          echo '<input required name="unit" class="form-control" value="' . $product->unit . '">'
          ?>
        </div>
        <div class="btn-admin">
          <input type="submit" value="Thay đổi" class="btn-edit-page">
        </div>
      </form>
      <?php
      if (!empty($_POST)) {
        $newproduct = $editProductController->getNewProduct($_GET['id']);
        $editProductController->updateProduct($newproduct, $_GET['id']);
        $editProductController->addImage($newproduct);
      }
      ?>
    </div>
  </div>
</body>

</html>
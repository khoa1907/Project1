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

  <!-----------------------product---------------------------->
  <br /><br /><br /><br /><br /><br /><br />
  <!--Admin-->
  <div class="admin">
    <h2 class="admin__title">Danh sách sản phẩm</h2>
    <table class="admin__table">
      <thead>
        <tr>
          <th width="50px">Mã</th>
          <th width="100px">Hình ảnh</th>
          <th width="150px">Tên Sản Phẩm</th>
          <th width="100px">Giá bán</th>
          <th width="150px">Giá Khuyến Mãi</th>
          <th width="100px">Ngày bán</th>
          <th width="150px">Số lượng còn lại</th>
          <th width="150px">Số lượng đã bán</th>
          <th width="100px">Đơn vị bán</th>
          <th width="50px"></th>
          <th width="50px"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once '../controllers/productController.php';
        $productController = new productController();
        $list = $productController->getProductList();

        for ($i = 0; $i < count($list); $i++) {
          echo '<tr>
                      <td>
                        <p class="admin__stt">' . $list[$i]->id . '</p>
                      </td>
                      <td>
                        <img class="admin__image" src="../../../' . $list[$i]->image[0] . '" style = "max-width: 100px" />
                      </td>
                      <td>
                        <p class="admin__name">' . $list[$i]->name . '</p>
                      </td>
                      <td>
                        <p class="admin__price">' . number_format($list[$i]->price, 0, ',', '.') . '</p>
                      </td>
                      <td>
                        <p class="admin__newprice">' . number_format($list[$i]->newprice, 0, ',', '.') . '</p>
                      </td>
                      <td>
                        <p class="admin__date">' . $list[$i]->date . '</p>
                      </td>
                      <td>
                        <p class="admin__amount">' . $list[$i]->amount . '</p>
                      </td>
                      <td>
                        <p class="admin__sold">' . $list[$i]->sold . '</p>
                      </td>
                      <td>
                        <p class="admin__unit">' . $list[$i]->unit . 'kg</p>
                      </td>
                      <td>
                      <a id="edit' . $list[$i]->id . '" href="" onclick="editProduct(' . $list[$i]->id . ')" class="btn-edit"><button>Sửa</button></a>
                      </td>
                      <td>
                        <a id="delete' . $list[$i]->id . '" href="" onclick="deleteProduct(' . $list[$i]->id . ')" class="btn-delete"><button>Xóa</button></a>
                      </td>
                    </tr>';
        }
        ?>
      </tbody>
    </table>
    <div class="admin__list-button">
      <a href="addProductView.php" class="btn-change">Thêm sản phẩm</a>
    </div>
  </div>

  <script>
    function deleteProduct(id) {
      var option = confirm("Xóa sản phẩm này?")
      if (option) {

        document.getElementById("delete" + id).setAttribute("href", "listProductView.php?id=" + id);

      } else {
        document.getElementById("delete" + id).setAttribute("href", "listProductView.php");
      }

    }
  </script>
  
  <?php
  if (isset($_GET['id']) && $_GET['id'] != null) {
    $productController->deleteImage($_GET['id']);
    $productController->deleteProduct($_GET['id']);
  }
  ?>

  <script>
    function editProduct(id) {
      var option = confirm("Bạn muốn thay đổi thông tin sản phẩm này?")
      if (option) {
        document.getElementById("edit" + id).setAttribute("href", "editProductView.php?id=" + id);

      } else {
        document.getElementById("delete" + id).setAttribute("href", "listProductView.php");
      }

    }
  </script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../public/css/login.css">
    <title>Đăng nhập</title>
</head>

<body style="background: url(https://img5.thuthuatphanmem.vn/uploads/2021/12/27/mau-background-trai-cay-3d-dep_044218988.jpg); background-size: cover;background-position-y:-60px ;">
    <?php
    include_once '../controllers/loginController.php';
    $loginController = new loginController();
    $loginController->login();
    ?>
    <div id="wrapper">
        <form id="form-login" method="post">
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Tên đăng nhập" id="email" name="use_name">
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Mật khẩu" id="pwd" name="use_pass">
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>

</body>

</html>
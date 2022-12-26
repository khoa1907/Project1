<?php
require_once('../../../library/dbhelper.php');
class loginController
{
	public function __construct()
	{
	}

	public function login()
	{
		if (!empty($_POST)) {
			$use_name = $_POST['use_name'];
			$use_pass = $_POST['use_pass'];
			//tao ket noi db
			$connect = new mysqli("localhost", "root", "", "quanlicuahang");
			mysqli_set_charset($connect, "utf8"); //unicode
			if ($connect->connect_error) {  //ktra ket noi co thanh cong khong
				var_dump($connect->connect_error);
				die();
			}
			$query = "select*from taikhoan where username = '" . $use_name . "' and pass = '" . $use_pass . "'";
			$result = mysqli_query($connect, $query);
			$data = array();
			while ($row = mysqli_fetch_array($result, 1)) {
				$data[] = $row;
			}
			$connect->close();  // dong ket noi
			if ($data != null && count($data) > 0) {
				header('Location: ../views/listProductView.php');
			} else {
				echo '<script>alert("Tài khoản hoặc mật khẩu sai!"); window.location.href = "loginView.php";</script>';
			};
		}
	}
}

<?php
	session_start();
	include_once("../libs/DataProvider.php");

	//Kiểm tra có người dùng có đăng nhập với quyền admin hay chưa?
	 if(!isset($_SESSION["MaLoaiTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] != 2)
		DataProvider::ChangeURL("../index.php");
	$c = 0;
	if(isset($_GET["c"]))
		$c = $_GET["c"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lý MobileShop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="header">
		<a href="index.php">
			Hệ thống quản lý MobileShop
		</a>
	</div>
	<div id="menu">
		<?php
			include_once("modules/mMenu.php");
			include_once("modules/mLogin.php");
		?>
		
	</div>
	<div id="content">
		<?php
			switch ($c) {
				case 0:
					include_once("pages/pIndex.php");
					break;
				case 1:
					include_once("pages/quanlytaikhoan/pIndex.php");
					break;
				case 2:
					include_once("pages/quanlysanpham/pIndex.php");
					break;
				case 3:
					include_once("pages/quanlyloaisanpham/pIndex.php");
					break;
				case 4:
					include_once("pages/quanlynhasanxuat/pIndex.php");
					break;
				case 5:
					include_once("pages/quanlydondathang/pIndex.php");
					break;
				default:
					include_once("pages/pError.php");
					break;
			}
		?>
	</div>
	<div id="footer">
		Design By @IoT
	</div>
</body>
</html>
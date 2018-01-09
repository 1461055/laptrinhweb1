<h1>Quản lý tài khoản</h1>
<?php 
	$a = 1;
	if(isset($_GET["a"]))
		$a = $_GET["a"];
	switch($a){
		case 1:
			include_once("pages/quanlytaikhoan/pDanhSachTaiKhoan.php");
			break;
		case 2:
			include_once("pages/quanlytaikhoan/pCapNhatTaiKhoan.php");
			break;
		default:
			break;
	}
?>
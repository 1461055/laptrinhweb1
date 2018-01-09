<h1>Quản lý Điện thoại</h1>
<?php 
	$a = 1;
	if(isset($_GET["a"]))
		$a = $_GET["a"];
	switch($a){
		case 1:
			include_once("pages/quanlysanpham/pDanhSachDienthoai.php");
			break;
		case 2:
			include_once("pages/quanlySanPham/pCapNhatDienThoai.php");
			break;
		case 3:
			include_once("pages/quanlySanPham/pThemDienThoai.php");
			break;
		default:
			include_once("pages/pError.php");
			break;
	}
?>
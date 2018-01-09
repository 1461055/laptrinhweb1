<h1>Quản lý đơn đặt hàng</h1>
<?php 
	$a = 1;
	if(isset($_GET["a"]))
		$a = $_GET["a"];

	switch($a)
	{
		case 1:
			include_once("pages/quanlydondathang/pDanhSachDonHang.php");
			break;
		case 2:
			include_once("pages/quanlydondathang/pChiTietDonHang.php");
			break;
		default: 
			include_once("pages/pError.php");
			break;
	}
?>
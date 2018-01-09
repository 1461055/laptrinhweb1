<h1>Quản lý nhà sản xuất</h1>
<?php 
	$a = 1;
	if(isset($_GET["a"]))
		$a = $_GET["a"];

	switch($a)
	{
		case 1:
			include_once("pages/quanlynhasanxuat/pDanhSachNhaSanXuat.php");
			break;
		case 2:
			include_once("pages/quanlynhasanxuat/pCapNhatNhaSanXuat.php");
			break;
		case 3:
			include_once("pages/quanlynhasanxuat/pThemNhaSanXuat.php");
			break;
		default: 
			include_once("pages/pError.php");
			break;
	}
?>
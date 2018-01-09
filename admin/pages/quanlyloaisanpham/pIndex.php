<h1>Quản lý loại điện thoại</h1>
<?php 
	$a = 1;
	if(isset($_GET["a"]))
		$a = $_GET["a"];

	switch($a)
	{
		case 1:
			include_once("pages/quanlyloaisanpham/pDanhSachLoaiSanPham.php");
			break;
		case 2:
			include_once("pages/quanlyloaisanpham/pCapNhatLoaiSanPham.php");
			break;
		case 3:
			include_once("pages/quanlyloaisanpham/pThemLoaiSanPham.php");
			break;
		default: 
			include_once("pages/pError.php");
			break;
	}
?>
<?php
	//thêm sản phẩm vào giỏ hàng
	include "libs/ShoppingCart.php" ;

	if(isset($_SESSION["GioHang"])!= null)
	{
		$giohang = unserialize($_SESSION["GioHang"]);
	}
	else
		$giohang = new ShoppingCart();
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		$giohang->Add($id);
		$_SESSION["GioHang"] = serialize($giohang);
		DataProvider::ChangeURL("index.php?a=5");

	}

	$sub = 1;
	if(isset($_GET["sub"]))
		$sub =$_GET["sub"];

	switch($sub){
		case 1:
			include "pages/GioHang/pDanhSach.php";
			break;
		case 2:
			include "pages/GioHang/pThongBaoDatHangThanhCong.php";
			break;
		default:
			DataProvider::ChangeURL("index.php?a=404");
			break;
	}
 ?>
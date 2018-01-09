<?php
	include_once("../../../libs/DataProvider.php");

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		$ten = $_GET["txtTenLoaiSanPham"];
		$sql = "UPDATE LoaiSanPham SET TenLoaiSanPham = '$ten' WHERE MaLoaiSanPham = $id";
		
		DataProvider::ExecuteQuery($sql);
	}

	DataProvider::ChangeURL("../../index.php?c=3");
?>
<?php
	include_once("../../../libs/DataProvider.php");

	if(isset($_GET["txtTenLoaiSanPham"]))
	{
		$ten = $_GET["txtTenLoaiSanPham"];
			
		$sql = "INSERT INTO LoaiSanPham(TenLoaiSanPham, BiXoa) VALUES('$ten',0)";
		DataProvider::ExecuteQuery($sql);
	}

	DataProvider::ChangeURL("../../index.php?c=3");
?>
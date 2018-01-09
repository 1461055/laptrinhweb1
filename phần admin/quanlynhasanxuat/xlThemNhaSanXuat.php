<?php
	include_once("../../../libs/DataProvider.php");

	if(isset($_GET["txtTenNhaSanXuat"]))
	{
		$tennhasanxuat = $_GET["txtTenNhaSanXuat"];

		$sql = "INSERT INTO NhaSanXuat(TenNhaSanXuat, BiXoa) VALUES('$tennhasanxuat', 0)";

		DataProvider::ExecuteQuery($sql);
	}

	DataProvider::ChangeURL("../../index.php?c=4");
?>
<?php
 	include_once("../../../libs/DataProvider.php");

 	if(isset($_GET["txtTenNhaSanXuat"]))
 	{
 		
 		$tennhasanxuat = $_GET["txtTenNhaSanXuat"];
 		$id = $_GET["id"];

		$sql = "UPDATE NhaSanXuat SET TenNhaSanXuat = '$tennhasanxuat' WHERE MaNhaSanXuat = $id";
		
		echo $sql;
		
		DataProvider::ExecuteQuery($sql);
 	}
 	DataProvider::ChangeURL("../../index.php?c=4");
?>
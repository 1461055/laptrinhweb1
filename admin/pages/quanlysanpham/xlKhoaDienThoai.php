<?php
	include_once("../../../libs/DataProvider.php");

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];

		//kiểm tra có sản phầm có trong đơn hàng đang muốn xóa hay chưa?
		$sql = "SELECT COUNT(*) FROM ChiTietDonDatHang WHERE MaSanPham = $id";
		$result = DataProvider::ExecuteQuery($sql);
		$row = mysqli_fetch_array($result);
		if($row[0] == 0)
		{
			//Thực hiên xóa sản phẩm này khỏi database
			$sql = "DELETE FROM SanPham WHERE MaSanPham = $id";
		}
		else
		{
			//Thực hiện khóa sản phẩm do đã có trong đơn hàng
			$sql = "UPDATE SanPham SET BiXoa = 1 - BiXoa WHERE MaSanPham = $id";
		}

		DataProvider::ExecuteQuery($sql);
	}

	DataProvider::ChangeURL("../../index.php?c=2");
?>
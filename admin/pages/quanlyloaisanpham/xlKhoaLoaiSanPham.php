<?php 
	include_once("../../../libs/DataProvider.php");

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		
		//Kiểm tra loại sản phẩm này đã có sản phẩm nào trong table SanPham hay chưa?
		$sql = "SELECT COUNT(*) FROM SanPham WHERE MaLoaiSanPham = $id";
		$result = DataProvider::ExecuteQuery($sql);
		$row = mysqli_fetch_array($result);
		if($row[0] == 0)
		{
			//Thực hiện xóa loại sản phẩm ra khỏi DB
			$sql = "DELETE FROM LoaiSanPham WHERE MaLoaiSanPham = $id";
		}
		else
		{
			//Thực hiện khóa loại sản phẩm do đã có sản phầm của loại này rồi!
			$sql = "UPDATE LoaiSanPham SET BiXoa = 1 - BiXoa WHERE MaLoaiSanPham = $id";
		}
		
		DataProvider::ExecuteQuery($sql);
	}

	DataProvider::ChangeURL("../../index.php?c=3");
?>

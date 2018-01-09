<?php 
	include_once("../../../libs/DataProvider.php");

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		
		//Kiểm tra nhà sản xuất này đã có sản phẩm nào trong table SanPham hay chưa?
		$sql = "SELECT COUNT(*) FROM SanPham WHERE MaNhaSanXuat = $id";
		$result = DataProvider::ExecuteQuery($sql);
		$row = mysqli_fetch_array($result);
		if($row[0] == 0)
		{
			//Thực hiện xóa nsx ra khỏi DB
			$sql = "DELETE FROM NhaSanXuat WHERE MaNhaSanXuat = $id";
		}
		else
		{
			//Thực hiện khóa nsx do đã có sản phầm của nhà sản xuất này
			$sql = "UPDATE NhaSanXuat SET BiXoa = 1 - BiXoa WHERE MaNhaSanXuat = $id";
		}
		
		DataProvider::ExecuteQuery($sql);
	}

	DataProvider::ChangeURL("../../index.php?c=4");
?>

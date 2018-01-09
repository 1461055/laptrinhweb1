<?php
	if(!isset($_GET["id"]))
		DataProvider::ChangeURL("index.php?c=404");

	$id = $_GET["id"];
	$sql = "SELECT MaNhaSanXuat, TenNhaSanXuat FROM NhaSanXuat WHERE MaNhaSanXuat = $id";
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_array($result);
?>
<form action="pages/quanlynhasanxuat/xlCapNhatNhaSanXuat.php" method="get" onsubmit="return Check();" enctype="multipart/form-data">
	<fieldset>
		<legend>Cập nhật thông tin nhà sản xuất</legend>
		<div>
			<span>Tên nhà sản xuất</span>
			<input type="text" name="txtTenNhaSanXuat" value="<?php echo $row["TenNhaSanXuat"]; ?>" />
		</div>	
		<div>			
			<input type="hidden" name="id" value="<?php echo $row["MaNhaSanXuat"]; ?>" />
			<input type="submit" value="CẬP NHẬT" />
		</div>
		<div id="error"></div>
	</fieldset>
</form>
<script type="text/javascript">
	function Check()
	{
		var ten = document.getElementById("txtTenNhaSanXuat");
		var err = document.getElementById("error");
		if(ten.value == "")
		{
			err.innerHTML = "Tên nhà sản xuất không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		return true;
	}
</script>
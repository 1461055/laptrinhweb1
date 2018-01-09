<?php
	if(!isset($_GET["id"]))
		DataProvider::ChangeURL("index.php?c=404");

	$id = $_GET["id"];
	$sql = "SELECT MaLoaiSanPham, TenLoaiSanPham, BiXoa FROM LoaiSanPham";
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_array($result);
?>
<form action="pages/quanlyloaisanpham/xlCapNhatLoaiSanPham.php" method="get" onsubmit="return Check();">
	<fieldset>
		<legend>Cập nhật thông tin loại sản phẩm</legend>
		<div>
			<span>Tên loại sản phẩm</span>
			<input type="text" name="txtTenLoaiSanPham" id="txtTenLoaiSanPham" value="<?php echo $row["TenLoaiSanPham"]; ?>" />
			<input type="hidden" name="id" value="<?php echo $row["MaLoaiSanPham"]; ?>" />
			<input type="submit" value="CẬP NHẬT" />
		</div> 
		<div id="error"></div>
	</fieldset>
</form>
<script type="text/javascript">
	function Check()
	{
		var ten = document.getElementById("txtTenLoaiSanPham");
		var err = document.getElementById("error");
		if(ten.value == "")
		{
			err.innerHTML = "Tên loại sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		return true;
	}
</script>
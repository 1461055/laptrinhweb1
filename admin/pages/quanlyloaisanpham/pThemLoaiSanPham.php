<form action="pages/quanlyloaisanpham/xlThemLoaiSanPham.php" method="get" onsubmit="return Check();">
	<fieldset>
		<legend>Thêm loại sản phẩm</legend>
		<div>
			<span>Tên loại sản phẩm</span>
			<input type="text" name="txtTenLoaiSanPham" id="txtTenLoaiSanPham"  />
			<input type="submit" value="THÊM MỚI" />
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
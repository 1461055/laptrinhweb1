<form action="pages/quanlynhasanxuat/xlThemNhaSanXuat.php" method="get" onsubmit="return Check();" enctype="multipart/form-data">
	<fieldset>
		<legend>Thêm mới nhà sản xuất</legend>
		<div>
			<span>Tên nhà sản xuất</span>
			<input type="text" name="txtTenNhaSanXuat" id="txtTenNhaSanXuat" />
		</div>
		<div>			
			<input type="submit" value="THÊM MỚI" />
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
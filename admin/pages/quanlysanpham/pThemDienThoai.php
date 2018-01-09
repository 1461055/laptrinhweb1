<form action="pages/quanlysanpham/xlThemDienThoai.php" method="post" onsubmit="return Check();" enctype="multipart/form-data">
	<fieldset class="themdienthoai">
		<legend>Thêm điện thoại</legend>
		<div>
			<span>Tên sản phẩm:</span>
			<input type="text" name="txtTenSanPham" id="txtTenSanPham"/>
			<i id="errorTenSanPham"></i>
		</div>
		<div>
			<span>Nhà sản xuất</span>
			<select name="cmbNhaSanXuat">
				<?php
					$sql = "SELECT MaNhaSanXuat, TenNhaSanXuat FROM NhaSanXuat WHERE BiXoa = 0"; 
					$result = DataProvider::ExecuteQuery($sql);
					while($row = mysqli_fetch_array($result)){
						?>
							<option value="<?php echo $row["MaNhaSanXuat"]; ?>"><?php echo $row["TenNhaSanXuat"]; ?></option>
						<?php
					}
				?>
			</select>
		</div>
		<div>
			<span>Loại điện thoại</span>
			<select name="cmbLoaiSanPham">
				<?php
					$sql = "SELECT MaLoaiSanPham,TenLoaiSanPham FROM LoaiSanPham WHERE BiXoa = 0";
					$result = DataProvider::ExecuteQuery($sql);
					while($row = mysqli_fetch_array($result))
					{
						?>
							<option value="<?php echo $row["MaLoaiSanPham"]; ?>"><?php echo $row["TenLoaiSanPham"]; ?></option>
						<?php
					}
				?>
			</select>
		</div>
		<div>
			<span>Giá</span>
			<input type="text" name="txtGia" id="txtGia" />
			<i id="errorGiaBan"></i>
		</div>
		<div>
			<span>Số lượng tồn</span>
			<input type="text" name="txtSoLuongTon" id="txtSoLuongTon"/>
			<i id="errorSoLuongTon"></i>
		</div>
		<div>
			<span>Mô tả</span>
			<textarea name="txtMoTa"></textarea>
		</div>
		<div>
			<span>Xuất xứ</span>
			<input type="text" name="txtXuatXu" id="txtXuatXu"/>
			<i id="errorXuatXu"></i>
		</div>
		<div>
			<span>Hình sản phẩm:</span>
			<input type="file" name="fHinhAnh" />
		</div>
		<div>
			<input type="submit" value="THÊM MỚI" />
		</div>
	</fieldset>
</form>
<script type="text/javascript">
	function Check()
	{
		var ten = document.getElementById("txtTenSanPham");
		var err = document.getElementById("errorTenSanPham");
		if(ten.value == "")
		{
			err.innerHTML = "Tên sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		var ten = document.getElementById("txtGia");
		var err = document.getElementById("errorGiaBan");
		if(ten.value == "")
		{
			err.innerHTML = "Giá sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		var ten = document.getElementById("txtSoLuongTon");
		var err = document.getElementById("errorSoLuongTon");
		if(ten.value == "")
		{
			err.innerHTML = "Số lượng tồn sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";
		
		var ten = document.getElementById("txtxuatXu");
		var err = document.getElementById("errorXuatXu");
		if(ten.value == "")
		{
			err.innerHTML = "Xuất xứ sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		return true;
	}
</script>
<?php
	if(!isset($_GET["id"]))
		DataProvider::ChangeURL("index.php?c=404");

	$id=$_GET["id"]; 
	$sql = "SELECT sp.MaSanPham, sp.TenSanPham, sp.MoTa, sp.XuatXu, sp.MaNhaSanXuat, nsx.TenNhaSanXuat, sp.GiaBan, sp.NgayNhap, sp.SoLuongBan, sp.SoLuongTon, sp.MaLoaiSanPham, lsp.TenLoaiSanPham, sp.SoLuongXem, sp.HinhAnh, sp.BiXoa FROM sanpham sp, loaisanpham lsp, nhasanxuat nsx WHERE sp.MaLoaiSanPham = lsp.MaLoaiSanPham AND sp.MaNhaSanXuat = nsx.MaNhaSanXuat AND sp.MaSanPham = $id";
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_array($result);
?>
<form action="pages/quanlysanpham/xlCapNhatDienThoai.php" method="post" onsubmit="return Check(); " enctype="multipart/form-data">
	<fieldset class="themdienthoai">
		<legend>Cập nhật thông tin Mobile</legend>
		<div>
			<span>Tên sản phẩm:</span>
			<input type="text" name="txtTenSanPham" id="txtTenSanPham" value="<?php echo $row["TenSanPham"]; ?>" />
			<i id="errorTenSanPham"></i>
		</div>
		<div>
			<span>Nhà sản xuất</span>
			<select name="cmbNhaSanXuat">
				<?php
					$sql = "SELECT MaNhaSanXuat, TenNhaSanXuat FROM NhaSanXuat WHERE BiXoa = 0"; 
					$result = DataProvider::ExecuteQuery($sql);
					while($row1 = mysqli_fetch_array($result)){
						?>
							<option value="<?php echo $row1["MaNhaSanXuat"]; ?>" <?php if($row["MaNhaSanXuat"] == $row1["MaNhaSanXuat"]) echo "selected"; ?>><?php echo $row1["TenNhaSanXuat"]; ?></option>
						<?php
					}
				?>
			</select>
		</div>
		<div>
			<span>Loại điện thoại</span>
			<select name="cmbLoaiSanPham">
				<?php
					$sql = "SELECT MaLoaiSanPham, TenLoaiSanPham FROM LoaiSanPham WHERE BiXoa = 0";
					$result = DataProvider::ExecuteQuery($sql);
					while($row1 = mysqli_fetch_array($result))
					{
						?>
							<option value="<?php echo $row1["MaLoaiSanPham"]; ?>" <?php if($row["MaLoaiSanPham"]== $row1["MaLoaiSanPham"]) echo "selected"; ?>><?php echo $row1["TenLoaiSanPham"]; ?></option>
						<?php
					}
				?>
			</select>
		</div>
		<div>
			<span>Giá</span>
			<input type="text" name="txtGia" id="txtGia" value="<?php echo $row["GiaBan"]; ?>" />
			<i id="errorGiaBan"></i>
		</div>
		<div>
			<span>Số lượng bán</span>
			<input type="text" name="txtSoLuongBan" id="txtSoLuongBan" value="<?php echo $row["SoLuongBan"]; ?>" />
			<i id="errorSoLuongBan"></i>
		</div>
		<div>
			<span>Số lượng tồn</span>
			<input type="text" name="txtSoLuongTon" id="txtSoLuongTon" value="<?php echo $row["SoLuongTon"]; ?>" />
			<i id="errorSoLuongTon"></i>
		</div>
		<div>
			<span>Mô tả</span>
			<textarea name="txtMoTa"><?php echo $row["MoTa"]; ?></textarea>
		</div>
		<div>
			<span>Xuất xứ</span>
			<input type="text" name="txtXuatXu" id="txtXuatXu" value="<?php echo $row["XuatXu"]; ?>" />
			<i id="errorXuatXu"></i>
		</div>
		
		<div>
			<span>Hình sản phẩm:</span>
			<input type="file" name="fHinhAnh" /><br />
			<img src="../images/<?php  echo $row["HinhAnh"]; ?>" width="150"/>
		</div>
		<div>
			<input type="hidden" name="id" value="<?php echo $row["MaSanPham"]; ?>" />
			<input type="submit" value="CẬP NHẬT" />
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

		var ten = document.getElementById("txtSoLuongBan");
		var err = document.getElementById("errorSoLuongBan");
		if(ten.value == "")
		{
			err.innerHTML = "Số lượng bán sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		var ten = document.getElementById("txtXuatXu");
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
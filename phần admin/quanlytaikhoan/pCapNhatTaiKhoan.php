<form action="pages/quanlytaikhoan/xlCapNhatTaiKhoan.php" method="get">
	<fieldset>
		<legend>Cập nhật thông tin tài khoản</legend>
		<?php
			if(isset($_GET["id"]))
			{
				$id = $_GET["id"];
				$sql = "SELECT TenTaiKhoan, MaLoaiTaiKhoan FROM TaiKhoan WHERE MaTaiKhoan = $id";
				$result = DataProvider::ExecuteQuery($sql);
				$row = mysqli_fetch_array($result);
				$TenTaiKhoan = $row["TenTaiKhoan"];
				$MaLoaiTaiKhoan = $row["MaLoaiTaiKhoan"];				
			}
		?>
		<div>
			<span>Tên tài khoản:</span>
			<?php echo $TenTaiKhoan; ?>
		</div>
		<div>
			<span>Loại tài khoản:</span>
			<select name="cmbLoaiTaiKhoan">
				<?php
					$sql = "SELECT MaLoaiTaiKhoan, LoaiTaiKhoan FROM LoaiTaiKhoan";
					$result = DataProvider::ExecuteQuery($sql);
					while($row = mysqli_fetch_array($result))
					{
						if($row["MaLoaiTaiKhoan"] == $MaLoaiTaiKhoan)
							echo "<option value='".$row["MaLoaiTaiKhoan"]."' selected/>".$row["LoaiTaiKhoan"]." </option>";
						else
							echo "<option value='".$row["MaLoaiTaiKhoan"]."'>".$row["LoaiTaiKhoan"]."</option>";
					}
				?>
			</select>
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
		</div>
		<div>
			<input type="submit" value="CẬP NHẬT">
		</div>
	</fieldset>
</form>
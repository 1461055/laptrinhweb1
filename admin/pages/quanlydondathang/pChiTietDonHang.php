<?php
	if(!isset($_GET["id"]))
		DataProvider::ChangeURL("index.php?c=404");
	$id = $_GET["id"];
	$sql = "SELECT ddt.MaDonDatHang, ddt.NgayLap, ddt.TongThanhTien, tk.TenHienThi, tk.NoiSong ,ddt.MaTinhTrang, tt.TenTinhTrang FROM DonDatHang ddt, TaiKhoan tk, TinhTrang tt WHERE ddt.MaTaiKhoan = tk.MaTaiKhoan AND ddt.MaTinhTrang = tt.MaTinhTrang AND ddt.MaDonDatHang = $id";
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_array($result);
?>
<fieldset>
	<legend>Thông tin đơn hàng</legend>
	<div>
		<span>Mã đơn đặt hàng:</span>
		<?php echo $row["MaDonDatHang"]; ?>
	</div>
	<div>
		<span>Ngày đặt hàng:</span>
		<?php echo $row["NgayLap"]; ?>
	</div>
	<div>
		<span>Tên khách hàng:</span>
		<?php echo $row["TenHienThi"]; ?>
	</div>
	<div>
		<span>Địa chỉ giao hàng:</span>
		<?php echo $row["NoiSong"]; ?>
	</div>
	<div>
		<span>Tổng tiền:</span>
		<?php echo $row["TongThanhTien"]; ?>
	</div>
	<div>
		<a href="pages/quanlydondathang/xlDonHang.php?a=2&id=<?php echo $id; ?>" class="btnGiaoHang">
			GIAO HÀNG
		</a>
		<a href="pages/quanlydondathang/xlDonHang.php?a=3&id=<?php echo $id; ?>" class="btnThanhToan">
			THANH TOÁN
		</a>
		<a href="pages/quanlydondathang/xlDonHang.php?a=4&id=><?php echo $id; ?>" class="btnHuy">
			HỦY
		</a>
		<a href="#" onclick="window.print(); " class="btnInDonHang">
			IN ĐƠN HÀNG
		</a>
	</div>
</fieldset>
<h3>Đơn hàng</h3>
<table cellspacing="0" border="1">
	<tr>
		<th width="100">STT</th>
		<th width="300">Tên sản phẩm</th>
		<th width="200">Hình ảnh</th>
		<th width="200">Số lượng</th>
		<th width="200">Giá bán</th>
	</tr>
	<?php
		$sql = "SELECT sp.TenSanPham, sp.HinhAnh, ct.SoLuong, ct.GiaBan FROM ChiTietDonDatHang ct, SanPham sp WHERE ct.MaSanPham = sp.MaSanPham AND ct.MaDonDatHang = $id";
		
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		while($row = mysqli_fetch_array($result))
		{
			?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row["TenSanPham"]; ?></td>
					<td>
						<img src="../images/<?php echo $row["HinhAnh"]; ?>" height = "100">
					</td>
					<td><?php echo $row["SoLuong"]; ?></td>
					<td><?php echo $row["GiaBan"]; ?></td>
				</tr>
			<?php
		}
	?>
</table>

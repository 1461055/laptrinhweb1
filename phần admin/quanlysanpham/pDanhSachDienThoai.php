<a href="index.php?c=2&a=3">
	THÊM SẢN PHẨM MỚI <br/>
	<img src="images/add.png">
</a>
<table cellspacing="0" border="1">
	<tr>
		<th width="50">STT</th>
		<th width="100">Tên sản phẩm</th>
		<th width="150">Hình ảnh</th>
		<th width="50">Mô tả</th>
		<th width="50">Nhà sản xuất</th>
		<th width="50">Ngày nhập</th>
		<th width="30">Số lược bán</th>
		<th width="30">Số lượng tồn</th>
		<th width="30">Số lượng xem</th>
		<th width="50">Điện thoại loại</th>	
		<th width="50">Xuất xứ</th>
		<th width="50">Giá bán</th>
		<th width="50">Trạng thái</th>
		<th width="200">Thao tác</th>
	</tr>
	<?php
		$sql = "SELECT sp.MaSanPham, sp.TenSanPham, sp.MoTa, sp.XuatXu, nsx.TenNhaSanXuat, sp.GiaBan, sp.NgayNhap, sp.SoLuongBan, sp.SoLuongTon, lsp.TenLoaiSanPham, sp.SoLuongXem, sp.HinhAnh, sp.BiXoa FROM sanpham sp, loaisanpham lsp, nhasanxuat nsx WHERE sp.MaLoaiSanPham = lsp.MaLoaiSanPham and sp.MaNhaSanXuat = nsx.MaNhaSanXuat ORDER BY sp.MaSanPham DESC";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		while($row = mysqli_fetch_array($result))
		{
			?>
				<tr>
					<td><?php echo $i++ ?></td>
					<td><?php echo $row["TenSanPham"]; ?></td>
					<td>
						<img src="../images/<?php echo $row["HinhAnh"]; ?>" height = "100"/>
					</td>
					<td>
						<?php 
							if(strlen($row["MoTa"]) > 20)
								$sMoTa = substr($row["MoTa"], 0, 20)."...";
							else
							 	$sMoTa = $row["MoTa"]; 
							echo $sMoTa;
						?>
						<div class="fullMoTa">
							<?php echo $row["MoTa"]; ?>
						</div>
					</td>
					<td><?php echo $row["TenNhaSanXuat"]; ?></td>	
					<td><?php echo $row["NgayNhap"]; ?></td>
					<td><?php echo $row["SoLuongBan"]; ?></td>
					<td><?php echo $row["SoLuongTon"]; ?></td>
					<td><?php echo $row["SoLuongXem"]; ?></td>
					<td><?php echo $row["TenLoaiSanPham"]; ?></td>					
					<td><?php echo $row["XuatXu"]; ?></td>	
					<td><?php echo $row["GiaBan"]; ?></td>				
					<td>
						<?php
						 	if($row["BiXoa"] == 1) 
						 		echo "<img src='images/lock.png' />";
						 	else
						 		echo "<img src='images/danghoatdong.png' />";
						 ?>
					</td>
					<td>
						<a href="pages/quanlysanpham/xlKhoaDienThoai.php?id=<?php echo $row["MaSanPham"] ?>">
							<img src="images/unlock.png" />
						</a>	
						<a href="index.php?c=2&a=2&id=<?php echo $row["MaSanPham"] ?>">
							<img src="images/edit.png">
						</a>					
					</td>
				</tr>
			<?php
		}
	?>
</table>
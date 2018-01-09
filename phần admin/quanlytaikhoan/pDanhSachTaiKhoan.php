<table cellspacing="0" border="1">
	<tr>
		<th width="50">Mã tài khoản</th>
		<th width="150">Tên tài khoản</th>
		<th width="150">Tên hiển thị</th>
		<th width="100">Ngày sinh</th>
		<th width="200">Nơi sống</th>
		<th width="80">Tình trạng</th>
		<th width="100">Loại tài khoản</th>
		<th width="170">Thao tác</th>
	</tr>
	<?php

		$sql = "SELECT tk.MaTaiKhoan, tk.TenTaiKhoan, tk.TenHienThi, tk.NgaySinh, tk.NoiSong, tk.BiXoa, ltk.LoaiTaiKhoan FROM TaiKhoan tk, LoaiTaiKhoan ltk WHERE tk.MaLoaiTaiKhoan = ltk.MaLoaiTaiKhoan"; 
		$result = DataProvider::ExecuteQuery($sql);
		while($row = mysqli_fetch_array($result))
		{
			?>
				<tr>
					<td><?php echo $row["MaTaiKhoan"]; ?></td>
					<td><?php echo $row["TenTaiKhoan"]; ?></td>
					<td><?php echo $row["TenHienThi"]; ?></td>
					<td><?php echo $row["NgaySinh"]; ?></td>
					<td><?php echo $row["NoiSong"]; ?></td>
					<td>
						<?php 
							if($row["BiXoa"] == 1)
								echo "<img src='images/lock.png' />";
							else
								echo "<img src='images/danghoatdong.png' />";
							
						?>
					</td>
					<td><?php echo $row["LoaiTaiKhoan"]; ?></td>
					<td>
						<a href="pages/quanlytaikhoan/xlKhoaTaiKhoan.php?id=<?php echo $row["MaTaiKhoan"] ?>">
							<img src="images/unlock.png" />
						</a>
						<a href="index.php?c=1&a=2&id=<?php echo $row["MaTaiKhoan"] ?>">
							<img src="images/edit.png" />
						</a>
					
					</td>
				</tr>
			<?php
		}
	?>
</table>
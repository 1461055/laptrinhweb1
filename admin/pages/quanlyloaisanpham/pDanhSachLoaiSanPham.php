<a href="index.php?c=3&a=3">
	THÊM MỚI LOẠI SẢN PHẨM <br />
	<img src="images/add.png">
</a>
<table cellspacing="0" border="1">
	<tr>
		<th width="100">STT</th>
		<th width="400">Tên loại sản phẩm</th>
		<th width="200">Tình trạng</th>
		<th width="300">Thao tác</th>
	</tr>
	<?php
		$sql = "SELECT MaLoaiSanPham, TenLoaiSanPham, BiXoa FROM LoaiSanPham ORDER BY MaLoaiSanPham DESC";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		while ($row = mysqli_fetch_array($result))
		{
			?>
				<tr>
					<td><?php echo $i++?></td>
					<td><?php echo $row["TenLoaiSanPham"]; ?></td>
					<td>
						<?php
							if($row["BiXoa"] == 1)
								echo "<img src='images/lock.png' />";
							else
								echo "<img src='images/danghoatdong.png' />";
						?>
					</td>
					<td>
						<a href="pages/quanlyloaisanpham/xlKhoaLoaiSanPham.php?id=<?php echo $row["MaLoaiSanPham"] ?>">
							<img src="images/unlock.png" />
						</a>
						<a href="index.php?c=3&a=2&id=<?php echo $row["MaLoaiSanPham"] ?>">
							<img src="images/edit.png" />
						</a>
					</td>
				</tr>
			<?php
		}
	?>
</table>

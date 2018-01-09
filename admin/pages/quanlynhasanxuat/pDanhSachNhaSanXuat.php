<a href="index.php?c=4&a=3">
	THÊM NHÀ SẢN XUẤT MỚI<br/>
	<img src="images/add.png">
</a>
<table cellspacing="0" border="1">
	<tr id="danhsachnsx">
		<th width="150">STT</th>
		<th width="300">Nhà sản xuất</th>
		<th width="150">Tình trạng</th>
		<th width="400">Thao tác</th>
	</tr>
	<?php
		$sql = "SELECT MaNhaSanXuat, TenNhaSanXuat, BiXoa FROM NhaSanXuat ORDER BY MaNhaSanXuat DESC";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		while($row = mysqli_fetch_array($result))
		{
			?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row["TenNhaSanXuat"]; ?></td>
					<td>
						<?php
							if($row["BiXoa"] == 1)
								echo "<img src='images/lock.png' />";
							else
								echo "<img src='images/danghoatdong.png' />";
						?>
					</td>
					<td>
						<a href="pages/quanlynhasanxuat/xlKhoaNhaSanXuat.php?id=<?php echo $row["MaNhaSanXuat"] ?>">
							<img src="images/unlock.png" />
						</a>
						<a href="index.php?c=4&a=2&id=<?php echo $row["MaNhaSanXuat"] ?>">
							<img src="images/edit.png" />
						</a>
					</td>
				</tr>
			<?php
		}
	?>
</table>
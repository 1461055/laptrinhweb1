<div style="font-size: 25px; color: red; margin-top: 15px">
<marquee behavior="alternate" width="10%" >>>	
</marquee>Sản phẩm bán chạy nhất<marquee behavior="alternate" width="10%">
<< </marquee>
</div>
<?php
	$sql = "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY SoLuongBan DESC LIMIT 0, 9";
	$result = DataProvider::ExecuteQuery($sql);
	while($row = mysqli_fetch_array($result))
	{
		?>
			<div class="box">
				<a href="index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>">
					<img src="images/<?php echo $row["HinhAnh"]; ?>" />
				</a>
				<div class="pname"><?php echo $row["TenSanPham"]; ?></div>
				<div class="pprice">Giá: <?php echo $row["GiaBan"]; ?>đ</div>
				<div class="action">
				    <a href="index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>">Chi tiết</a>
				</div>            
			</div>
		<?php		
	}
?>
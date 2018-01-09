<div id="quanlygiohang">
	<h1>Quản lý giỏ hàng</h1>
		<table >
			<tr >
				<th width="20">STT</th>
				<th width="100">Tên sản phẩm</th>
				<th width="60">Hình</th>
				<th width="50">Giá</th>
				<th width="50">Số lượng</th>
				<th width="50">Thao tác</th>
			</tr>
			<?php 
				$tongtien = 0;
				if(isset($_SESSION["GioHang"]))
				{
					$sosp = count($giohang->listProduct);
					for($i = 0; $i < $sosp; $i++)
					{
						$id = $giohang->listProduct[$i]->id;
						$sql= "SELECT * FROM sanpham WHERE MaSanPham = $id";
						$result =  DataProvider::ExecuteQuery($sql);
						$row = mysqli_fetch_array($result); // hiển thị dữ liệu trả về sử dụng hàm
						?>
						<form name="frmGioHang" action="pages/GioHang/xlCapNhatGioHang.php" method="post"><!-- xuly -->
							
							<tr>
								<td>1</td>
								<td>
									<?php 
										echo $row["TenSanPham"];
									?>

								</td>
								<td >
									<img src="images/<?php echo $row["HinhAnh"]; ?>" width="100" height="100" />
								</td>
								<td>
									<?php 
										echo $row["GiaBan"];
									?>
								</td>
								<td>
									<input type="text" name="txtSL" value="<?php echo $giohang->listProduct[$i]->num; ?>" width="45" size="5" />
    			                    <input type="hidden" name="hdID" value="<?php echo $giohang->listProduct[$i]->id; ?>" />
								</td>
								<td>
									<input type="submit" value="Cập nhật số lượng"/>
								</td>
							</tr>
							
						</form>
						<?php 
							$tongtien += $row["GiaBan"]* $giohang->listProduct[$i]->num;
						}
				}
					$_SESSION["TongGia"] = $tongtien;
			?>
		</table><br><br>
		<div class="pprice" style=" float:right; margin-right: 300px;">
			Tổng thành tiền: 
			<?php 
				echo $tongtien; 
			?>đ
		</div>
		<a href="pages/GioHang/xlDatHang.php" >
			<img src="imgs/dathang.png" width="100">
		</a>
</div>

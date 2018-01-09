
<?php
	if(isset($_GET["id"]))
		$id = $_GET["id"];
	else
		DataProvider::ChangeURL("index.php?a=404");

	$sql = "SELECT s.MaSanPham, s.TenSanPham, s.GiaBan, s.SoLuongTon, s.SoLuongXem, s.HinhAnh, s.MoTa, n.TenNhaSanXuat,
	 l.TenLoaiSanPham, s.MaLoaiSanPham 
	 FROM SanPham s, NhaSanXuat n, LoaiSanPham l 
	 WHERE s.BiXoa = 0 AND s.MaNhaSanXuat = n.MaNhaSanXuat 
	 AND s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaSanPham = $id";
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_array($result);
	
   
 
	if($row == null)
		DataProvider::ChangeURL("index.php?a=404");
?>
<div id="chitietsp">
    <div>      
        <span class="productname"><?php echo $row["TenSanPham"]; ?></span>
     </div>
	<div id="chitietleft">
    	<img src="images/<?php echo $row["HinhAnh"]; ?>">
    </div>
    <div id="chitietright">
    	
        <div>
        	<span class="label">Giá:</span>
            <span class="gia"><?php echo $row["GiaBan"]; ?> đ</span>
        </div>
        <div>
        	<span class="label">Hãng sản xuất:</span>
            <span class="nhasx"><?php echo $row["TenNhaSanXuat"]; ?></span>
        </div>
        <div>
        	<span class="label">Loại sản phẩm:</span>
            <span class="data"><?php echo $row["TenLoaiSanPham"]; ?></span>
        </div>
        <div>
        	<span class="label">Số lượng:</span>
            <span class="data"><?php echo $row["SoLuongTon"]; ?> sản phẩm</span>
        </div>
        <div>
        	<span class="label">Số lược xem:</span>
            <span class="data"><?php echo $row["SoLuongXem"] + 1; ?> lược</span>
        </div>
        <div class="pgiohang">
        	<?php
        		if(isset($_SESSION["MaTaiKhoan"]))
        		{
        			?>
        				<a href="index.php?a=5&id=<?php echo $row["MaSanPham"]; ?>">
			                <img src="imgs/buynow.png" width="100" style="margin-top: -100; margin-right: 30" >
			            </a>
        			<?php
        		}
        	?>
        </div>
     </div>
     <div id="mota">
     	<?php echo $row["MoTa"]; ?>
     </div>    
</div>	
<?php
	//Cập nhật lại số lược xem vào CSDL
	$SoLuongXem = $row["SoLuongXem"] + 1;
	$sql = "UPDATE SanPham SET SoLuongXem = $SoLuongXem WHERE MaSanPham = $id";
	DataProvider::ExecuteQuery($sql);
?>
<?php
    $LoaiSanPham = $row["MaLoaiSanPham"];
    $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 AND MaLoaiSanPham = $LoaiSanPham ORDER BY SoLuongBan DESC LIMIT 0, 6";
    $result = DataProvider::ExecuteQuery($sql);
    while($row = mysqli_fetch_array($result))
    {
        ?>
            <div class="box">
                <a href="index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>">
                     <img src="images/<?php echo $row["HinhAnh"]; ?> " />
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
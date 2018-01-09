<?php
	include_once("../../../libs/DataProvider.php");

	if(isset($_POST["txtTenSanPham"]))
	{
		$tensanpham = $_POST["txtTenSanPham"];
		$nhasanxuat = $_POST["cmbNhaSanXuat"];
		$loaisanpham= $_POST["cmbLoaiSanPham"];
		$gia = $_POST["txtGia"];
		$slton = $_POST["txtSoLuongTon"];
		

		if(isset($_POST["txtMoTa"]))
			$mota = $_POST["txtMoTa"];
		else
			$mota = "";

		$xuatxu = $_POST["txtXuatXu"];
		
		//Thực hiện upload file
		move_uploaded_file($_FILES["fHinhAnh"]["tmp_name"], "../../../images/".$_FILES["fHinhAnh"]["name"]);

		if(file_exists("../../../images/".$_FILES["fHinhAnh"]["name"]))
			$hinhanh = $_FILES["fHinhAnh"]["name"];
		else
			$hinhanh = "errorUpload.png";

		$ngaynhap = date("Y-m-d H:i:s");

		$sql = "INSERT INTO SanPham(TenSanPham, MoTa, XuatXu, MaNhaSanXuat, GiaBan, NgayNhap,  SoLuongBan, SoLuongTon, MaLoaiSanPham, SoLuongXem, HinhAnh) 
				VALUES('$tensanpham', '$mota', '$xuatxu', $nhasanxuat, $gia,'$ngaynhap', 0, $slton, $loaisanpham, 0, '$hinhanh')";

		DataProvider::ExecuteQuery($sql);
	}

	DataProvider::ChangeURL("../../index.php?c=2");
?>
<?php
	include_once("../../../libs/DataProvider.php");

	if(isset($_POST["txtTenSanPham"]))
	{
		$tensanpham = $_POST["txtTenSanPham"];
		$nhasanxuat = $_POST["cmbNhaSanXuat"];
		$loaisanpham= $_POST["cmbLoaiSanPham"];
		$gia = $_POST["txtGia"];
		$slban = $_POST["txtSoLuongBan"];
		$slton = $_POST["txtSoLuongTon"];
		$id = $_POST["id"];

		if(isset($_POST["txtMoTa"]))
			$mota = $_POST["txtMoTa"];
		else
			$mota = "";

		$xuatxu = $_POST["txtXuatXu"];
		//$ngaynhap = date("Y-m-d H:i:s");

		if(isset($_FILES["fHinhAnh"]) && $_FILES["fHinhAnh"]["size"] > 0)
		{
			//Thực hiện upload file
			move_uploaded_file($_FILES["fHinhAnh"]["tmp_name"], "../../../images/".$_FILES["fHinhAnh"]["name"]);

			if(file_exists("../../../images/".$_FILES["fHinhAnh"]["name"]))
				$hinhanh = $_FILES["fHinhAnh"]["name"];
			else
				$hinhanh = "errorUpload.png";

			$sql = "UPDATE SanPham SET TenSanPham = '$tensanpham', MaNhaSanXuat = $nhasanxuat, MaLoaiSanPham = $loaisanpham, GiaBan = $gia, SoLuongBan = $slban, SoLuongTon = $slton, MoTa = '$mota', XuatXu = '$xuatxu', HinhAnh = '$hinhanh' WHERE MaSanPham = $id";

		}
		else
		{
			$sql = "UPDATE SanPham SET TenSanPham = '$tensanpham', MaNhaSanXuat = $nhasanxuat, MaLoaiSanPham = $loaisanpham, GiaBan = $gia, SoLuongBan = $slban, SoLuongTon = $slton, MoTa = '$mota', XuatXu = '$xuatxu' WHERE MaSanPham = $id";
		}

		echo $sql;
		
		DataProvider::ExecuteQuery($sql);
	}

	DataProvider::ChangeURL("../../index.php?c=2");
?>
<?php 
	session_start();
	include "../../libs/dataprovider.php";
	include "../../libs/ShoppingCart.php";
	// POST tham số truyền dữ liệu đi được ẩn bên trong form 
	//get truyền dữ liệu qua địa chỉ URl

	if(isset($_POST["txtSL"]))
	{
		$sl = $_POST["txtSL"];
		if(is_nan($sl) == false)
		{
			//Nếu số lượng là số thì mới xử lý
			$id = $_POST["hdID"];
			$giohang = unserialize($_SESSION["GioHang"]); // nhận một biến tuần tự đơn và chuyển đổi nó trở thành một giá trị PHP.
			if($sl > 0)
			{
				// xử lý cập nhất số lượng mới

				$giohang->update($id, $sl);
				$_SESSION["GioHang"]  = serialize($giohang); // serialize Lấy giá trị các thành phần form, mã hóa các giá trị này thành giá trị chuỗi
			}
			else
			{
				if($sl == 0)
				{
					$giohang->delete($id);

					$_SESSION["GioHang"] = serialize($giohang);
				}

			}

		DataProvider::ChangeURL("../../index.php?a=5");

		}
		else
		{
			// nếu số lượng mới khoog là số thì không xử lý mặt định quay về trang quản lý giỏ hàng
			DataProvider::ChangeURL("../../index.php?a=5");

		}
	}
	else
	{
		DataProvider::ChangeURL("../../index.php?a=404");
	}
 ?>
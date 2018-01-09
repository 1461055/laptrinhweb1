<?php
	session_start();
	require_once "libs/DataProvider.php";
	$_SESSION["path"] = $_SERVER["REQUEST_URI"];	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile Shop</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div  class="wrapper">
		<?php 
			include_once('modules/header.php');
			include_once('modules/sidebar.php');

		 ?>
		 <div id="content">
		 <?php 
		 		$a = 1;
		 		if(isset($_GET['a'])== true)
		 			$a = $_GET['a'];
		 		switch($a){
		 			case 1:
		 				include_once('pages/pindex.php');
		 				break;
		 			case 2:
		 				include_once('pages/psanphamtheohang.php');
		 				break;
		 			case 3:
		 				include_once('pages/psanphamtheoloai.php');
		 				break;
		 			case 4:
		 				include_once('pages/pchitietsanpham.php');	
		 				break;
		 			case 5:
						include_once('pages/GioHang/pIndex.php');
						break;
		 			case 6:
		 				include_once('pages/taikhoan/pindex.php');
		 				break;
		 			case 7:
		 				include_once('pages/pTimKiemSanPham.php');
		 				break;
		 			default:
		 				include_once('pages/thongbaoloi.php');
		 				break;
		 		}
		  ?>
		 	
		 </div>
		 <?php include_once('modules/footer.php'); ?>
	</div>	
	
</body>

</html>
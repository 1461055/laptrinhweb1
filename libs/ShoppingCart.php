<?php
	class Product{
		var $id;
		var $sl;
	}
	
	class ShoppingCart{
		var $listProduct;
		
		public function __construct(){
			$this->listProduct = array();
		}
		
		public function update($id, $sl){
			for($i = 0; $i < count($this->listProduct); $i++){
				if($this->listProduct[$i]->id == $id){
					$this->listProduct[$i]->num = $sl;		
				}
			}
		}
		
		public function delete($id){
			for($i = 0; $i < count($this->listProduct); $i++){
				if($this->listProduct[$i]->id == $id)
					array_splice($this->listProduct,$i, 1); //array_splice tách mảng(mảng, vị trí bắt đầu, số phần tử)
			}
		}
		
		public function add($id){
			if(count($this->listProduct) == 0){
				//Kiểm tra nếu Chưa có sản phảm trong giỏ hàng
				$p = new Product();
				$p->id = $id;
				$p->num = 1;
				
				$this->listProduct[] = $p;
			}
			else{
				//Kiểm tra nếu có sản phẩm trong giỏ hàng rồi
				//cần kiểm tra sản phẩm đó đã tồn tại trong giỏ hàng chưa
				//nếu đã có rồi thì chỉ cần cập nhật số lượng lên 1
				//nếu chưa có thì thềm mới sản phẩm đó vào giỏ hàng
				
				for($i = 0; $i < count($this->listProduct); $i++){
					if($this->listProduct[$i]->id == $id)
						break;
				}
				
				if($i == count($this->listProduct)){
					//Nếu  đã duyệt hết giỏ hàng mà ko có sản phẩm cần thềm vào
					//Thêm sản phẩm mới vào giỏ hàng.	
					$p = new Product();
					$p->id = $id;
					$p->num = 1;
					
					$this->listProduct[] = $p;
				}
				else{
					$this->listProduct[$i]->num++;
				} 
					
			}
				
		}
	}
?>
<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class giuong
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		/*public function search_giuong($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM tbl_giuong WHERE giuongName LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

		}*/
		public function insert_giuong($data,$files){

			
			$giuongName = mysqli_real_escape_string($this->db->link, $data['giuongName']);
			$phong = mysqli_real_escape_string($this->db->link, $data['phong']);
			$loaigiuong = mysqli_real_escape_string($this->db->link, $data['loaigiuong']);

			//$giuong_desc = mysqli_real_escape_string($this->db->link, $data['giuong_desc']);
			//$price = mysqli_real_escape_string($this->db->link, $data['price']);
			//$type = mysqli_real_escape_string($this->db->link, $data['type']);
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			
			
			if($giuongName=="" || $phong=="" || $loaigiuong=="" ){
				$alert = "<span class='error'>Không được để trống.</span>";
				return $alert;
			}else{
				
				$query = "INSERT INTO tbl_giuong(giuongName,phongId,loaigiuong) VALUES('$giuongName','$phong','$loaigiuong')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm giường thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm giường không thành công</span>";
					return $alert;
				}
			}
		}
		public function show_giuong(){
			//Select * from bảng tbl_giuong,tbl_toanha,tbl_phong 
			$query = "

			SELECT * FROM tbl_giuong INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId  
			INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId 
			order by tbl_giuong.giuongId asc";

			// $query = "SELECT * FROM tbl_giuong order by giuongId desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function show_giuong_trong(){
			//Select * from bảng tbl_giuong,tbl_toanha,tbl_phong 
			$query = "

			SELECT * FROM tbl_giuong INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId  
			INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId
			where trangthai = '0' 
			order by tbl_giuong.giuongId desc";

			// $query = "SELECT * FROM tbl_giuong order by giuongId desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function getgiuongbyId($id){
			$query = "SELECT * FROM tbl_giuong where giuongId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_giuong($data,$files,$id){

		
			$giuongName = mysqli_real_escape_string($this->db->link, $data['giuongName']);
			$phong = mysqli_real_escape_string($this->db->link, $data['phong']);
			$loaigiuong = mysqli_real_escape_string($this->db->link, $data['loaigiuong']);


			//$giuong_desc = mysqli_real_escape_string($this->db->link, $data['giuong_desc']);
			//$price = mysqli_real_escape_string($this->db->link, $data['price']);
			//$type = mysqli_real_escape_string($this->db->link, $data['type']);
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			

			if($giuongName=="" || $phong=="" || $loaigiuong==""  ){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{

					$query = "UPDATE tbl_giuong SET

					giuongName = '$giuongName',
					phongId = '$phong',
					loaigiuong = '$loaigiuong'
					WHERE giuongId = '$id'";
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Cập nhật giường thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Cập nhật giường không thành công</span>";
						return $alert;
					}
			}

		}
		public function del_giuong($id){
			$query = "DELETE FROM tbl_giuong where giuongId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa không thành công</span>";
				return $alert;
			}
		
			
		}
		public function getgiuong_feathered()
		{
			$query = "SELECT * FROM tbl_giuong where type = '0'";
			$result = $this->db->select($query);
			return $result;	
		}
		public function getgiuong_new()
		{
			$query = "SELECT * FROM tbl_giuong order by giuongId desc limit 4";
			$result = $this->db->select($query);
			return $result;	
		}
		public function get_details($id)
		{
			$query = "

			SELECT * FROM tbl_giuong INNER JOIN tbl_toanha ON tbl_giuong.catId = tbl_toanha.catId 

			INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId WHERE tbl_giuong.giuongId ='$id'

			";

			// $query = "SELECT * FROM tbl_giuong order by giuongId desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function insert_slider($data,$files){
			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sliderName=="" || $type==""){
				$alert = "<span class='error'>Không được để trống</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Kích thước ảnh không quá 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{	
				    $alert = "<span class='success'>Bạn chỉ có thể tải lên:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm slider thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm slider không thành công</span>";
						return $alert;
					}
				}
				
				
			}
		}
		public function show_slider()
		{
			$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list()
		{
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type)
		{
			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type= '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id)
		{
			$query = "DELETE FROM tbl_slider where sliderId= '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa không thành công</span>";
				return $alert;
			}
		}
		public function get_all_giuong()
		{
			$query = "SELECT * FROM tbl_giuong";
			$result = $this->db->select($query);
			return $result;
		} 
		public function get_giuong_new()
		//lấy ra giường từng trang
		{
			$sp_tungtrang = 4;
			if(!isset($_GET['trang']))
			{
				$trang = 1;
			}
			else
			{
				$trang = $_GET['trang'];
			}
			//xét vị trí giường để truy xuất trang số.
			$tung_trang = ($trang-1)*$sp_tungtrang;
			$query = "SELECT * FROM tbl_giuong order by giuongId desc LIMIT $tung_trang,$sp_tungtrang";
			$result = $this->db->select($query);
			return $result;
		} 
		/*public function insert_slider($data,$files){
			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sliderName=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Kích thước ảnh không quá 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Slider Added Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Slider Added Not Success</span>";
						return $alert;
					}
				}
				
				
			}
		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id){
			$query = "DELETE FROM tbl_slider where sliderId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Slider Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Slider Deleted Not Success</span>";
				return $alert;
			}
		}
		public function del_wlist($proid,$customer_id){
			$query = "DELETE FROM tbl_wishlist where giuongId = '$proid' AND customer_id='$customer_id'";
			$result = $this->db->delete($query);
			return $result;
		}
		//END BACKEND 
		public function getgiuong_feathered(){
			$query = "SELECT * FROM tbl_giuong where type = '0' order by RAND() LIMIT 8 ";
			$result = $this->db->select($query);
			return $result;
		} 
		
		public function getgiuong_new(){
			$sp_tungtrang = 4;
			if(!isset($_GET['trang'])){
				$trang = 1;
			}else{
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang-1)*$sp_tungtrang;
			$query = "SELECT * FROM tbl_giuong order by giuongId desc LIMIT $tung_trang,$sp_tungtrang";
			$result = $this->db->select($query);
			return $result;
		} 
		public function get_all_giuong(){
			$query = "SELECT * FROM tbl_giuong";
			$result = $this->db->select($query);
			return $result;
		} 
		public function get_details($id){
			$query = "

			SELECT tbl_giuong.*, tbl_toanha.catName, tbl_phong.phongName 

			FROM tbl_giuong INNER JOIN tbl_toanha ON tbl_giuong.catId = tbl_toanha.catId 

			INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId WHERE tbl_giuong.giuongId = '$id'

			";

			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestDell(){
			$query = "SELECT * FROM tbl_giuong WHERE phongId = '6' order by giuongId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestOppo(){
			$query = "SELECT * FROM tbl_giuong WHERE phongId = '3' order by giuongId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestHuawei(){
			$query = "SELECT * FROM tbl_giuong WHERE phongId = '4' order by giuongId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestSamsung(){
			$query = "SELECT * FROM tbl_giuong WHERE phongId = '2' order by giuongId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_compare($customer_id){
			$query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_wishlist($customer_id){
			$query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertCompare($giuongid, $customer_id){
			
			$giuongid = mysqli_real_escape_string($this->db->link, $giuongid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_compare = "SELECT * FROM tbl_compare WHERE giuongId = '$giuongid' AND customer_id ='$customer_id'";
			$result_check_compare = $this->db->select($check_compare);

			if($result_check_compare){
				$msg = "<span class='error'>giuong Already Added to Compare</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_giuong WHERE giuongId = '$giuongid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$giuongName = $result["giuongName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_compare(giuongId,price,image,customer_id,giuongName) VALUES('$giuongid','$price','$image','$customer_id','$giuongName')";
			$insert_compare = $this->db->insert($query_insert);

			if($insert_compare){
						$alert = "<span class='success'>Added Compare Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Added Compare Not Success</span>";
						return $alert;
					}
			}
		}
		public function insertWishlist($giuongid, $customer_id){
			$giuongid = mysqli_real_escape_string($this->db->link, $giuongid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_wlist = "SELECT * FROM tbl_wishlist WHERE giuongId = '$giuongid' AND customer_id ='$customer_id'";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "<span class='error'>giuong Already Added to Wishlist</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_giuong WHERE giuongId = '$giuongid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$giuongName = $result["giuongName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO tbl_wishlist(giuongId,price,image,customer_id,giuongName) VALUES('$giuongid','$price','$image','$customer_id','$giuongName')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span class='success'>Added to Wishlist Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Added to Wishlist Not Success</span>";
						return $alert;
					}
			}
		}*/


	}
?>
<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class hopdong
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function insert_hopdong($data,$files){

			
			$sohopdong = mysqli_real_escape_string($this->db->link, $data['sohopdong']);
			$giuong = mysqli_real_escape_string($this->db->link, $data['giuong']);
			$khachhang = mysqli_real_escape_string($this->db->link, $data['khachhang']);
			$ngayBd = mysqli_real_escape_string($this->db->link, $data['ngayBd']);
			$ngayKt = mysqli_real_escape_string($this->db->link, $data['ngayKt']);
            

			
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if($sohopdong=="" || $giuong=="" || $khachhang=="" || $ngayBd=="" || $ngayKt=="" ||  $file_name ==""){
				$alert = "<span class='error'>Không được để trống.</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$query = "INSERT INTO tbl_hopdong(soHđ,giuongId,khachhangId,ngayBd,ngayKt,image_hopdong,adminId) VALUES('$sohopdong','$giuong','$khachhang','$ngayBd','$ngayKt','$unique_image','1')";
				$result = $this->db->insert($query);
				$query1 = "UPDATE tbl_giuong SET
				trangthai = '1'
				WHERE giuongId = '$giuong'";
				$result1 = $this->db->update($query1);
				if($result){
					$alert = "<span class='success'>Thêm hợp đồng thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm hợp đồng không thành công</span>";
					return $alert;
				}
			}
			
			
		}
		public function show_hopdong(){
			//Select * from bảng tbl_hopdong,tbl_toanha,tbl_hopdong 
			$query = "

			SELECT * FROM tbl_hopdong INNER JOIN tbl_khachhang ON tbl_hopdong.khachhangId = tbl_khachhang.khachhangId 
            INNER JOIN tbl_giuong ON tbl_hopdong.giuongId = tbl_giuong.giuongId INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId
			order by tbl_hopdong.hopdongId desc";

			// $query = "SELECT * FROM tbl_hopdong order by hopdongId desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function gethopdongbyId($id){
			$query = "SELECT * FROM tbl_hopdong where hopdongId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_hopdong($data,$files,$id){

		
			$sohopdong = mysqli_real_escape_string($this->db->link, $data['sohopdong']);
			$giuong = mysqli_real_escape_string($this->db->link, $data['giuong']);
			$khachhang = mysqli_real_escape_string($this->db->link, $data['khachhang']);
			$ngayBd = mysqli_real_escape_string($this->db->link, $data['ngayBd']);
			$ngayKt = mysqli_real_escape_string($this->db->link, $data['ngayKt']);
            

			
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sohopdong=="" || $giuong=="" || $ngayBd=="" || $ngayKt=="" ){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Kích thước ảnh nhỏ hơn 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>Bạn chỉ có thể tải lên:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>Bạn chỉ có thể tải lên:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE tbl_hopdong SET
					soHđ = '$sohopdong',
					giuongId = '$giuong',
					khachhangId = '$khachhang', 
					ngayBd = '$ngayBd', 
					ngayKt = '$ngayKt', 
					image_hopdong = '$unique_image'
					WHERE hopdongId = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_hopdong SET
					soHđ = '$sohopdong',
					giuongId = '$giuong',
					khachhangId = '$khachhang', 
					ngayBd = '$ngayBd', 
					ngayKt = '$ngayKt'	
					WHERE hopdongId = '$id'";
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Cập phòng thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Cập nhật phòng không thành công</span>";
						return $alert;
					}
			}

		}
		public function del_hopdong($id,$id1){
			$id1 = mysqli_real_escape_string($this->db->link, $id1);
			$id = mysqli_real_escape_string($this->db->link, $id);
			// $query1 = "UPDATE tbl_giuong SET
			// trangthai = '0'
			// WHERE giuongId = '$id'";
			// $result1 = $this->db->update($query1);
			$query = "DELETE FROM tbl_hopdong where hopdongId = '$id'";
			$result = $this->db->delete($query);

			$query1 = "UPDATE tbl_giuong SET
			trangthai = '0'
			WHERE giuongId = '$id1'";
			$result1 = $this->db->update($query1);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa không thành công</span>";
				return $alert;
			}
		
			
		}
		public function get_hopdong_chitiet($id)
			{
				$query = "
	
				SELECT * FROM tbl_hopdong INNER JOIN tbl_toanha ON tbl_hopdong.toanhaId = tbl_toanha.toanhaId 
				where tbl_hopdong.hopdongId = '$id'
				order by tbl_hopdong.hopdongId desc";
	
				// $query = "SELECT * FROM tbl_hopdong order by hopdongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}

		public function get_hopdong_by_admin($id)
			{
				$query = "
	
				SELECT * FROM `tbl_hopdong` INNER JOIN tbl_admin ON tbl_hopdong.adminId = tbl_admin.adminId WHERE tbl_hopdong.hopdongId = $id";
	
				// $query = "SELECT * FROM tbl_hopdong order by hopdongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}
		public function show_admin()
			{
				$query = "
	
				SELECT * FROM `tbl_admin`";
	
				// $query = "SELECT * FROM tbl_hopdong order by hopdongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}	
		public function get_hopdong_by_khachhang($id)
			{
				$query = "
	
				SELECT * FROM `tbl_hopdong` INNER JOIN tbl_khachhang ON tbl_hopdong.khachhangId = tbl_khachhang.khachhangId WHERE tbl_hopdong.hopdongId = $id";
	
				// $query = "SELECT * FROM tbl_hopdong order by hopdongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}
		public function get_user_by_hopdong($id)
			{
				$query = "
	
				SELECT * FROM `tbl_hopdong` INNER JOIN tbl_khachhang ON tbl_hopdong.khachhangId = tbl_khachhang.khachhangId WHERE tbl_hopdong.khachhangId = $id";
	
				// $query = "SELECT * FROM tbl_hopdong order by hopdongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}
		
		public function get_hopdong_by_id($id)
			{
				$query = "
	
				SELECT * FROM `tbl_hopdong` INNER JOIN tbl_giuong on tbl_hopdong.giuongId = tbl_giuong.giuongId 
				INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId
				INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId
				WHERE tbl_hopdong.hopdongId = $id";
	
				// $query = "SELECT * FROM tbl_hopdong order by hopdongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}
			public function get_show_hopdong_khachhang($id)
			{
				$query = "
	
				SELECT * FROM `tbl_hopdong` INNER JOIN tbl_giuong on tbl_hopdong.giuongId = tbl_giuong.giuongId 
				INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId
				INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId
				WHERE tbl_hopdong.khachhangId = $id";
	
				// $query = "SELECT * FROM tbl_hopdong order by hopdongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}

	}
?>



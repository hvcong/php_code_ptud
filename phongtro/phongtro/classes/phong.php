<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class phong
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function insert_phong($data,$files){

			
			$phongName = mysqli_real_escape_string($this->db->link, $data['phongName']);
			$toanha = mysqli_real_escape_string($this->db->link, $data['toanha']);
			$tang = mysqli_real_escape_string($this->db->link, $data['tang']);
			$gia = mysqli_real_escape_string($this->db->link, $data['price']);

			
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			
			if($phongName=="" || $toanha=="" || $tang=="" || $gia=="" || $file_name ==""){
				$alert = "<span class='error'>Không được để trống.</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$query = "INSERT INTO tbl_phong(phongName,toanhaId,tang,price,image_phong) VALUES('$phongName','$toanha','$tang','$gia','$unique_image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm phòng thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm phòng không thành công</span>";
					return $alert;
				}
			}
		}
		public function show_phong(){
			//Select * from bảng tbl_phong,tbl_toanha,tbl_phong 
			$query = "

			SELECT * FROM tbl_phong INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId 

			order by tbl_phong.phongName asc";

			// $query = "SELECT * FROM tbl_phong order by phongId desc";

			$result = $this->db->select($query);
			return $result;
		}
		public function getphongbyId($id){
			$query = "SELECT * FROM tbl_phong where phongId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_phong($data,$files,$id){

		
			$phongName = mysqli_real_escape_string($this->db->link, $data['phongName']);
			$toanha = mysqli_real_escape_string($this->db->link, $data['toanha']);
			$tang = mysqli_real_escape_string($this->db->link, $data['tang']);
			$gia = mysqli_real_escape_string($this->db->link, $data['price']);

			
			//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($phongName=="" || $toanha=="" || $tang=="" || $gia=="" ){
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
					$query = "UPDATE tbl_phong SET
					phongName = '$phongName',
					toanhaId = '$toanha', 
					tang = '$tang', 
					price = '$gia', 
					image_phong = '$unique_image'
					WHERE phongId = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_phong SET
					phongName = '$phongName',
					toanhaId = '$toanha', 
					tang = '$tang', 
					price = '$gia'		
					WHERE phongId = '$id'";
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
		public function del_phong($id){
			$query = "DELETE FROM tbl_phong where phongId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa không thành công</span>";
				return $alert;
			}
		
			
		}
		public function get_phong_chitiet($id)
			{
				$query = "
	
				SELECT * FROM tbl_phong INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId 
				where tbl_phong.phongId = '$id'
				order by tbl_phong.phongId desc";
	
				// $query = "SELECT * FROM tbl_phong order by phongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}
			public function get_giuong_chitiet_tang1($id)
			{
				$query = "
	
				SELECT * FROM tbl_giuong INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId
				WHERE tbl_phong.phongId = $id AND tbl_giuong.loaigiuong = 'giuong tang 1'";
	
				// $query = "SELECT * FROM tbl_phong order by phongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}
			public function get_giuong_chitiet_tang2($id)
			{
				$query = "
	
				SELECT * FROM tbl_giuong INNER JOIN tbl_phong ON tbl_giuong.phongId = tbl_phong.phongId INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId
				WHERE tbl_phong.phongId = $id AND tbl_giuong.loaigiuong = 'giuong tang 2'";
	
				// $query = "SELECT * FROM tbl_phong order by phongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}
			public function showadmin()
			{
				$query = "
				SELECT * FROM tbl_admin";
	
				// $query = "SELECT * FROM tbl_phong order by phongId desc";
	
				$result = $this->db->select($query);
				return $result;
			}



			
			public function update_admin($data){

		
				$adminName = mysqli_real_escape_string($this->db->link, $data['adminname']);
				$ngaysinh = mysqli_real_escape_string($this->db->link, $data['ngaysinh']);
				$sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
				$adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
				$cmnd = mysqli_real_escape_string($this->db->link, $data['cmnd']);
				$diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);

				if($adminName=="" || $ngaysinh=="" || $sdt=="" || $adminEmail=="" || $cmnd=="" || $diachi==""  ){
					$alert = "<span class='error'>Fields must be not empty</span>";
					return $alert;
				}else{
					
						//Nếu người dùng không chọn ảnh
						$query = "UPDATE tbl_admin SET
						adminName = '$adminName',
						adminEmail = '$adminEmail',
						diachi = '$diachi', 
						cmnd = '$cmnd', 
						ngaysinh = '$ngaysinh',
						cmnd = '$cmnd'	
						WHERE adminId = '1'";

					$result = $this->db->update($query);
						if($result){
							$alert = "<span class='success'>Cập nhật thành công</span>";
							return $alert;
						}else{
							$alert = "<span class='error'>Cập nhật không thành công</span>";
							return $alert;
						}
				}
	
			}
		

	}
?>
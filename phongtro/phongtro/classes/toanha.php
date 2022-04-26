
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
class toanha
{
	private $db;
	private $fm;
	public function __construct()
	{
			$this->db =new Database();
			$this->fm =new Format();
	}	

	public function insert_toanha($data,$files){

			
		$toanhaName = mysqli_real_escape_string($this->db->link, $data['toanhaName']);
		$diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);
		
		//$giuong_desc = mysqli_real_escape_string($this->db->link, $data['giuong_desc']);
		//$price = mysqli_real_escape_string($this->db->link, $data['price']);
		//$type = mysqli_real_escape_string($this->db->link, $data['type']);
		//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		
		if($toanhaName=="" || $diachi=="" || $file_name ==""){
			$alert = "<span class='error'>Không được để trống.</span>";
			return $alert;
		}else{
			move_uploaded_file($file_temp,$uploaded_image);
			$query = "INSERT INTO tbl_toanha(toanhaName,diachi,image) VALUES('$toanhaName','$diachi','$unique_image')";
			$result = $this->db->insert($query);
			if($result){
				$alert = "<span class='success'>Thêm tòa nhà thành công</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Thêm tòa nhà không thành công</span>";
				return $alert;
			}
		}
	}
	public function show_toanha()
		{
		$query="SELECT * FROM tbl_toanha order by toanhaId asc";
		$result=$this->db->select($query);	
		return $result;
		}
	public function show_giuongtrong_by_toanha($id)
		{
		$query="SELECT * FROM tbl_giuong INNER JOIN tbl_phong 
		ON tbl_giuong.phongId=tbl_phong.phongId
		INNER JOIN tbl_toanha 
		ON tbl_phong.toanhaId=tbl_toanha.toanhaId
		where tbl_phong.toanhaId = $id";
		$result=$this->db->select($query);	
		return $result;
		}	
	public function show_toanhaview()
		// {
		// 	$query="SELECT * FROM tbl_toanha order by toanhaId desc";
		// 	$result=$this->db->select($query);	
		// 	return $result;
		// }
		{
			$query="SELECT *,count(phongName) AS sophong FROM tbl_toanha INNER JOIN tbl_phong ON tbl_toanha.toanhaId = tbl_phong.toanhaId WHERE tbl_toanha.toanhaId = tbl_phong.toanhaId GROUP BY tbl_toanha.toanhaId ";
			$result=$this->db->select($query);	
			return $result;
		}
	public function gettoanhabyId($id)
	{
		$query = "SELECT * FROM tbl_toanha where toanhaId= '$id' ";
		$result = $this->db->select($query);
		return $result;	
	}
	
	public function update_toanha($data,$files,$id){
	
		$toanhaName = mysqli_real_escape_string($this->db->link, $data['toanhaName']);
		$diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);

		
		//$giuong_desc = mysqli_real_escape_string($this->db->link, $data['giuong_desc']);
		//$price = mysqli_real_escape_string($this->db->link, $data['price']);
		//$type = mysqli_real_escape_string($this->db->link, $data['type']);
		//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;


		if($toanhaName=="" || $diachi=="" ){
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
				$query = "UPDATE tbl_toanha SET
				toanhaName = '$toanhaName',
				diachi = '$diachi',
				image = '$unique_image'
				WHERE toanhaId = '$id'";
				
			}else{
				//Nếu người dùng không chọn ảnh
				$query = "UPDATE tbl_toanha SET

				toanhaName = '$toanhaName',
				diachi = '$diachi',
				WHERE toanhaId = '$id'";
			}
			$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Cập nhật tòa nhà thành công</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Cập nhật tòa nhà không thành công</span>";
					return $alert;
				}
		}

	}	
	public function del_toanha($id){
		$query = "DELETE FROM tbl_toanha where toanhaId = '$id'";
		$result = $this->db->delete($query);
		if($result){
			$alert = "<span class='success'>Xóa thành công</span>";
			return $alert;
		}else{
			$alert = "<span class='error'>Xóa không thành công</span>";
			return $alert;
		}
	
		
	}
	/*public function gettoanhabyId($id)
	{
			$query = "SELECT * FROM tbl_toanha where toanhaId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_toanha_fontend()
		{
			$query = "SELECT * FROM tbl_toanha order by toanhaId desc";
			$result = $this->db->select($query);
			return $result;
		}*/
		public function get_giuong_by_toanha($id)
		{
			$query = "SELECT * FROM tbl_giuong WHERE toanhaId='$id' order by toanhaId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_toanha($id)
		{
			$query = "SELECT tbl_giuong.*,tbl_toanha.toanhaName,tbl_toanha.toanhaId FROM tbl_giuong,tbl_toanha WHERE tbl_giuong.toanhaId=tbl_toanha.toanhaId AND tbl_giuong.toanhaId ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		//font end
		public function get_phong_by_toanha($id)
		{
			$query = "

			SELECT * FROM tbl_phong INNER JOIN tbl_toanha ON tbl_phong.toanhaId = tbl_toanha.toanhaId 
			where tbl_phong.toanhaId = '$id'
			order by tbl_phong.phongName asc";

			// $query = "SELECT * FROM tbl_phong order by phongId desc";

			$result = $this->db->select($query);
			return $result;
		}

}
?>
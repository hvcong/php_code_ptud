
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
class khachhang
{
	private $db;
	private $fm;
	public function __construct()
	{
			$this->db =new Database();
			$this->fm =new Format();
	}	

	public function insert_khachhang($data){

			
		$khachhangName = mysqli_real_escape_string($this->db->link, $data['khachhangName']);
		$cmnd = mysqli_real_escape_string($this->db->link, $data['cmnd']);
		$sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
		$diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$matkhau = mysqli_real_escape_string($this->db->link, $data['password']);

		
		
		//$giuong_desc = mysqli_real_escape_string($this->db->link, $data['giuong_desc']);
		//$price = mysqli_real_escape_string($this->db->link, $data['price']);
		//$type = mysqli_real_escape_string($this->db->link, $data['type']);
		//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		
		
		if($khachhangName=="" || $cmnd=="" || $sdt=="" || $diachi=="" || $email=="" || $matkhau==""){
			$alert = "<span class='error'>Không được để trống.</span>";
			return $alert;
		}else{
			$query = "INSERT INTO tbl_khachhang(khachhangName,cmnd,sdt,diachi,email,password) VALUES('$khachhangName','$cmnd','$sdt','$diachi','$email','$matkhau')";
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
	public function show_khachhang()
		// {
		// 	$query="SELECT * FROM tbl_khachhang order by khachhangId desc";
		// 	$result=$this->db->select($query);	
		// 	return $result;
		// }
		{
			$query="SELECT * FROM tbl_khachhang";
			$result=$this->db->select($query);	
			return $result;
		}
	public function getkhachhangbyId($id)
	{
		$query = "SELECT * FROM tbl_khachhang where khachhangId= '$id' ";
		$result = $this->db->select($query);
		return $result;	
	}
	
	public function update_khachhang($data,$id){
	
		$khachhangName = mysqli_real_escape_string($this->db->link, $data['khachhangName']);
		$cmnd = mysqli_real_escape_string($this->db->link, $data['cmnd']);
		$sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
		$diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$matkhau = mysqli_real_escape_string($this->db->link, $data['password']);


		
		//$giuong_desc = mysqli_real_escape_string($this->db->link, $data['giuong_desc']);
		//$price = mysqli_real_escape_string($this->db->link, $data['price']);
		//$type = mysqli_real_escape_string($this->db->link, $data['type']);
		//Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
	

		if($khachhangName=="" || $cmnd=="" || $sdt=="" || $diachi=="" || $email=="" || $matkhau=="" ){
			$alert = "<span class='error'>Fields must be not empty</span>";
			return $alert;
		}else{
				//Nếu người dùng không chọn ảnh
				$query = "UPDATE tbl_khachhang SET
				khachhangName = '$khachhangName',
				cmnd = '$cmnd',
				sdt = '$sdt',
				diachi = '$diachi',
				email = '$email',
				password = '$matkhau'
				WHERE khachhangId = '$id'";
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
	public function del_khachhang($id){
		$query = "DELETE FROM tbl_khachhang where khachhangId = '$id'";
		$result = $this->db->delete($query);
		if($result){
			$alert = "<span class='success'>Xóa thành công</span>";
			return $alert;
		}else{
			$alert = "<span class='error'>Xóa không thành công</span>";
			return $alert;
		}
	
		
	}
	/*public function getkhachhangbyId($id)
	{
			$query = "SELECT * FROM tbl_khachhang where khachhangId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_khachhang_fontend()
		{
			$query = "SELECT * FROM tbl_khachhang order by khachhangId desc";
			$result = $this->db->select($query);
			return $result;
		}*/
		public function get_khachhang($id)
		{
			$query = "SELECT * FROM tbl_khachhang WHERE khachhangId='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_khachhang($id)
		{
			$query = "SELECT tbl_giuong.*,tbl_khachhang.khachhangName,tbl_khachhang.khachhangId FROM tbl_giuong,tbl_khachhang WHERE tbl_giuong.khachhangId=tbl_khachhang.khachhangId AND tbl_giuong.khachhangId ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		
		//font end
}
?>
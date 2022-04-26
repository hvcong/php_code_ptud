<?php
$filepath = realpath(dirname(__FILE__));
include ($filepath.'/../lib/session.php');
Session::checkLogin1();
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
/*include("../lib/session.php");
SESSION::checkLogin();
include("../lib/database.php");
include("../helpers/format.php");*/
?>

<?php
class userlogin
{
	private $db;
	private $fm;
	public function __construct()
	{
			$this->db =new Database();
			$this->fm =new Format();
	}	
	public function login_khachang($email,$password)
		{
			$email= $this->fm->validation($email);
			$password= $this->fm->validation($password);
			$email= mysqli_real_escape_string($this->db->link, $email);
			$password= mysqli_real_escape_string($this->db->link, $password);
			if(empty($email) || empty($password))
			{
				$alert = 'User hoặc Pass không được để trống.';
				return $alert;
			} else
			{
				$query="SELECT * FROM tbl_khachhang WHERE email = '$email'AND password ='$password' LIMIT 1";
				$result=$this->db->select($query);	
				if($result != false)
				{
					$value = $result->fetch_assoc();
					SESSION::set('userlogin',true);
					SESSION::set('khachhangId',$value['khachhangId']);
					SESSION::set('email',$value['email']);
					SESSION::set('khachhangName',$value['khachhangName']);
					header('location:index.php');
				} else
				{
					$alert = 'User hoặc Pass không đúng.';
				return $alert;	
				}
			}
	}

}
?>
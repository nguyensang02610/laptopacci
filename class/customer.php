<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class customer
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	//Hàm đăng kí
	public function insert_customer($date)
	{
		$ho = mysqli_real_escape_string($this->db->link, $date['ho']);
		$ten = mysqli_real_escape_string($this->db->link, $date['ten']);
		$email = mysqli_real_escape_string($this->db->link, $date['email']);
		$password = mysqli_real_escape_string($this->db->link, $date['password']);
		$diachi = mysqli_real_escape_string($this->db->link, $date['diachi']);
		$phone = mysqli_real_escape_string($this->db->link, $date['phone']);
		if ($email == "") {
			$alert = "<input disabled class='input--style-3' type='text' placeholder='Không được để trống các trường thông tin'>";
			return $alert;
		} else {
			$check_email = "SELECT * FROM tbl_customer WHERE email= '$email' LIMIT 1";
			$result_check = $this->db->select($check_email);
			if ($result_check) {
				$alert = "<input disabled class='input--style-3' type='text' placeholder='Email này đã được đăng ký'>";
				return $alert;
			} else {
				$query = "INSERT INTO tbl_customer(ho,ten,email,password,diachi,phone) VALUES('$ho','$ten','$email','$password','$diachi','$phone') ";
				$result = $this->db->insert($query);
				if ($result) {
					//Khi đăng kí thành công sẽ đang nhập luôn
					$alert = "<script type='text/javascript'> alert ('Đăng kí thành công');</script>";
					Session::set('customer_login', true);
					Session::set('customer_email', $email);
					Session::set('customer_ho', $ho);
					Session::set('customer_ten', $ten);
					echo "<script> window.location = 'index.php' </script>";
					return $alert;
				} else {
					$alert = "<script type='text/javascript'> alert ('Đăng kí không thành công. Liên hệ Admin để biết thêm chi tiết.');</script>";
					return $alert;
				}
			}
		}
	}
	//Hàm đăng nhập
	public function login_customer($date)
	{
		//Khởi tạo biến
		$email =  $date['email'];
		$password = $date['password'];
		if ($email == '' || $password == '') {
			$alert = "<p style='font-size:17px;color:red'>Không đc để trống tài khoản hoặc mật khẩu</p>";
			return $alert;
		} else {
			$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
			$result_check = $this->db->select($check_login);
			if ($result_check == true) {
				$value = $result_check->fetch_assoc();
				Session::set('customer_login', true);
				Session::set('customer_id', $value['customer_id']);
				Session::set('customer_ho', $value['ho']);
				Session::set('customer_ten', $value['ten']);
				Session::set('customer_diachi', $value['diachi']);
				Session::set('customer_phone', $value['phone']);
				echo "<script> window.location = 'index.php' </script>";
			} else {
				$alert = "<p style='font-size:17px;color:red'>Tài khoản hoặc mật khẩu không đúng.</p>";
				return $alert;
			}
		}
	}
	//Hiển thị người dùng qua id
	public function show_customers($id)
	{
		$query = "SELECT * FROM tbl_customer WHERE customer_id='$id' ";
		$result = $this->db->select($query);
		return $result;
	}
	//Hiển thị người dùng
	public function show_all_customers()
	{
		$query = "SELECT * FROM tbl_customer";
		$result = $this->db->select($query);
		return $result;
	}
	//Update thông tin sản phẩm khách hàng
	public function update_customers($data, $id)
	{
		$ho = mysqli_real_escape_string($this->db->link, $data['ho']);
		$ten = mysqli_real_escape_string($this->db->link, $data['ten']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
		$diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);

		if ($ten == "" || $ho == "" || $diachi == "" || $email == "" || $phone == "") {
			$alert = "<script type='text/javascript'> alert ('Không được để trống các trường thông tin.');</script>";
			return $alert;
		} else {
			$query = "UPDATE tbl_customer SET ho='$ho',ten='$ten',phone='$phone',diachi='$diachi',email='$email' WHERE customer_id ='$id'";
			$result = $this->db->update($query);
			if ($result) {
				$alert = "<script type='text/javascript'> alert 'Lưu thông tin thành công.';</script>";
				return $alert;
			} else {
				$alert = "<script type='text/javascript'> alert 'ERROR Không lưu được thông tin..';</script>";
				return $alert;
			}
		}
	}

	public function change_password($data, $id, $pass)
	{
		$old_pass = mysqli_real_escape_string($this->db->link, $data['old_pass']);
		$new_pass = mysqli_real_escape_string($this->db->link, $data['new_pass']);
		$retype_pass = mysqli_real_escape_string($this->db->link, $data['retype_new_pass']);
		
		if ($new_pass != $retype_pass) 
		{
			$alert = "<script type='text/javascript'> alert ('Hai mật khẩu nhập không giống nhau.');</script>";
			return $alert;
		} elseif($pass != $old_pass)
		{
			$alert = "<script type='text/javascript'> alert 'Mật khẩu cũ không đúng.';</script>";
			return $alert;
		}
		else
		{
			$query = "UPDATE tbl_customer SET password = '$retype_pass' where customer_id = '$id' ";
			$result = $this->db->update($query);
			if ($result) {
				$alert = "<script type='text/javascript'> alert 'Đổi mật khẩu thành công.';</script>";
				return $alert;
			} else {
				$alert = "<script type='text/javascript'> alert 'ERROR Không đổi được mật khẩu..';</script>";
				return $alert;
			}
		}
	}
}
?>
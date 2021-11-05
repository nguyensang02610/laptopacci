<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');
?>


 
<?php
/**
 * 
 */
class user
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function show_all_nhanvien()
	{
		$query = "select * from tbl_user ";
		$result = $this->db->select($query);
		return $result;
	}

	public function delete_nhanvien($id)
	{
		$query = "DELETE FROM tbl_nhanvien where id = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<script type='text/javascript'> alert ('Xóa nhân viên thành công');</script>";
			return $alert;
		} else {
			$alert = "<script type='text/javascript'> alert ('ERROR . Xóa không thành công');</script>";
			return $alert;
		}
	}
	public function insert_nhanvien($date)
	{
		$name = mysqli_real_escape_string($this->db->link, $date['name']);
		$diachi = mysqli_real_escape_string($this->db->link, $date['diachi']);
		$ngaysinh = mysqli_real_escape_string($this->db->link, $date['ngaysinh']);
		$chucvu = mysqli_real_escape_string($this->db->link, $date['chucvu']);
		$quyen = mysqli_real_escape_string($this->db->link, $date['quyen']);
		$phone = mysqli_real_escape_string($this->db->link, $date['phone']);
		//Kiểm tra hình ảnh
		$file_size = $_FILES['image']['size'];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		//lấy đuôi file
		$file_1 = $_FILES['image']['name'];
		//Lấy tên
		$div = explode('.', $file_1);
		$file_ext = strtolower(end($div));
		$file_1 = $_FILES['image']['tmp_name']; //ảnh 1
		$len = 10;
		$anh_1 = substr(md5(mt_rand()), 0, $len) . '.' . $file_ext; //ảnh 1
		$uploaded_image_1 = "uploads/nhanvien/" . $anh_1; //ảnh 1


		if ($name == '') {
			$alert = "<script type='text/javascript'> alert ('Không được để trống tên nhân viên.');</script>";
			return $alert;
		} else {
			move_uploaded_file($file_1, $uploaded_image_1); //up anh 1
			$query = "INSERT INTO tbl_user(name,diachi,ngaysinh,chucvu,quyen,phone,image) VALUES('$name','$diachi','$ngaysinh','$chucvu','$quyen','phone','$anh_1') ";
			$result = $this->db->insert($query);
			if ($result) {
				$alert = "<script type='text/javascript'> alert ('Thêm mới nhân viên thành công.');</script>";
				return $alert;
			} else {
				$alert = "<script type='text/javascript'> alert ('ERROR không thêm được nhân viên.');</script>";
				return $alert;
			}
		}
	}
}
?>
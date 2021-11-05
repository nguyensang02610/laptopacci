<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class nhanvien
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
        $query = "select * from tbl_nhanvien ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getnv_byId($id)
    {
        $query = "select * from tbl_nhanvien where id = '$id' ";
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
        $password = mysqli_real_escape_string($this->db->link, $date['password']);
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
            $query = "INSERT INTO tbl_nhanvien(hoten,diachi,ngaysinh,chucvu,quyen,phone,password,image) VALUES('$name','$diachi','$ngaysinh','$chucvu','$quyen','$phone','$password','$anh_1') ";
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

    public function update_nhanvien($date, $id)
	{
		$name = mysqli_real_escape_string($this->db->link, $date['name']);
        $diachi = mysqli_real_escape_string($this->db->link, $date['diachi']);
        $ngaysinh = mysqli_real_escape_string($this->db->link, $date['ngaysinh']);
        $chucvu = mysqli_real_escape_string($this->db->link, $date['chucvu']);
        $quyen = mysqli_real_escape_string($this->db->link, $date['quyen']);
        $phone = mysqli_real_escape_string($this->db->link, $date['phone']);
        $password = mysqli_real_escape_string($this->db->link, $date['password']);
		
		$file_size = $_FILES['image']['size'];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		//lấy đuôi file
		$file_1 = $_FILES['image']['name'];
		//Lấy tên
		$div = explode('.', $file_1);
		$file_ext = strtolower(end($div));
		$file_1 = $_FILES['image']['tmp_name'];//ảnh 1
		$len = 10;
		$anh_1 = substr(md5(mt_rand()), 0 ,$len). '.' . $file_ext;//ảnh 1
		$uploaded_image_1 = "uploads/brand_image/" . $anh_1;//ảnh 1
		if ($name == '')
		{
			$alert = "<script type='text/javascript'> alert ('Không được để trống tên nhân viên.');</script>";
			return $alert;
		}  
		else 
		{
			if(!empty($file_1))
			{
				//Nếu người dùng chọn ảnh
				if ($file_size > 2048000) {
					$alert = "<script type='text/javascript'> alert ('Kích thước ảnh quá to tải lại ảnh khác đi.');</script>";
					return $alert;
				} 
				elseif (in_array($file_ext, $permited) === false) 
				{
					$alert = "<h2 class='h2_text'>Chỉ có thể upload các định dạng ảnh :-".implode(', ', $permited)."</h2>";
					return $alert;
				}
				move_uploaded_file($file_1, $uploaded_image_1);//up anh 1
				$query = "UPDATE tbl_nhanvien SET hoten = '$name', diachi = '$diachi' , ngaysinh = '$ngaysinh', chucvu = '$chucvu', quyen = '$quyen', phone = '$phone', password = '$password, image = '$anh_1' where id = '$id' ";
			}
			else
			{
				$query = "UPDATE tbl_nhanvien SET hoten = '$name', diachi = '$diachi' , ngaysinh = '$ngaysinh', chucvu = '$chucvu', quyen = '$quyen', phone = '$phone', password = '$password' where id = '$id' ";
			}
			$result = $this->db->update($query);
			if($result){
				$alert = "<script type='text/javascript'> alert ('Sửa thông tin nhân viên thành công.');</script>";
				return $alert;
			}else{
				$alert = "<script type='text/javascript'> alert ('ERROR. Chưa sửa được thông tin nhân viên.');</script>";
				return $alert;
			}
		}
	}

}
?>
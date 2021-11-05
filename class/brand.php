<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');

?>


<?php
/**
 * 
 */
class brand
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insert_brand($date, $files)
	{
		$brand_name = mysqli_real_escape_string($this->db->link, $date['brand_name']);
		//Kiểm tra hình ảnh
		$file_size = $_FILES['image']['size'];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		//lấy đuôi file
		$file_1 = $_FILES['image']['name'];
		//Lấy tên
		$div = explode('.', $file_1);
		$file_ext = strtolower(end($div));

		$file_1 = $_FILES['image']['tmp_name'];//ảnh 1
		$file_2 = $_FILES['img_2']['tmp_name'];//ảnh 2

		$len = 10;
		$anh_1 = substr(md5(mt_rand()), 0 ,$len). '.' . $file_ext;//ảnh 1
		$anh_2 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 2

		$uploaded_image_1 = "uploads/brand_image/" . $anh_1;//ảnh 1
		$uploaded_image_2 = "uploads/brand_image/" . $anh_2;//ảnh 2


		if ($brand_name == '')
		{
			$alert = "<script type='text/javascript'> alert ('Không được để trống tên danh mục.');</script>";
			return $alert;
		} 
		else 
		{
			move_uploaded_file($file_1, $uploaded_image_1);//up anh 1
			move_uploaded_file($file_2, $uploaded_image_2);//up anh 2

			$query = "INSERT INTO tbl_brand(brand_name,image,banner_image) VALUES('$brand_name','$anh_1','$anh_2') ";
			$result = $this->db->insert($query);
			if ($result) {
				$alert = "<script type='text/javascript'> alert ('Thêm mới danh mục thành công.');</script>";
				return $alert;
			} else {
				$alert = "<script type='text/javascript'> alert ('ERROR không thêm được danh mục.');</script>";
				return $alert;
			}
		}
	}

	

	public function update_brand($date, $id)
	{
		$brand_name = mysqli_real_escape_string($this->db->link, $date['brand_name']);
		
		$file_size = $_FILES['image']['size'];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		//lấy đuôi file
		$file_1 = $_FILES['image']['name'];
		//Lấy tên
		$div = explode('.', $file_1);
		$file_ext = strtolower(end($div));

		$file_1 = $_FILES['image']['tmp_name'];//ảnh 1
		$file_2 = $_FILES['img_2']['tmp_name'];//ảnh 2

		$len = 10;
		$anh_1 = substr(md5(mt_rand()), 0 ,$len). '.' . $file_ext;//ảnh 1
		$anh_2 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 2

		$uploaded_image_1 = "uploads/brand_image/" . $anh_1;//ảnh 1
		$uploaded_image_2 = "uploads/brand_image/" . $anh_2;//ảnh 2
		if ($brand_name == '')
		{
			$alert = "<script type='text/javascript'> alert ('Không được để trống tên danh mục.');</script>";
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
				move_uploaded_file($file_2, $uploaded_image_2);//up anh 2
				$query = "UPDATE tbl_brand SET brand_name = '$brand_name', image= '$anh_1', banner_image = '$anh_2' where brand_id = '$id' ";
			}
			else
			{
				$query = "UPDATE tbl_brand SET brand_name = '$brand_name' where brand_id = '$id' ";
			}
			$result = $this->db->update($query);
			if($result){
				$alert = "<script type='text/javascript'> alert ('Sửa danh mục sản phẩm thành công.');</script>";
				return $alert;
			}else{
				$alert = "<script type='text/javascript'> alert ('ERROR. Chưa sửa được danh mục.');</script>";
				return $alert;
			}
		}
	}

	public function show_brand()
	{
		$query = "SELECT * FROM tbl_brand ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getbrandbyId($id)
	{
		$query = "SELECT * FROM tbl_brand where brand_id = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getbrandbyName($name)
	{
		$query = "SELECT * FROM tbl_brand where brand_name like '%$name%'";
		$result = $this->db->select($query);
		return $result;
	}


	

	public function del_brand($id)
	{
		$query = "DELETE FROM tbl_brand where brand_id = '$id' ";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<script type='text/javascript'> alert ('Xóa danh mục sản phẩm thành công.');</script>";
			return $alert;
		} else {
			$alert = "<script type='text/javascript'> alert ('Error Không xóa được danh mục sản phẩm.');</script>";
			return $alert;
		}
	}
}
?>
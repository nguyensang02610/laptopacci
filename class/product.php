<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../library/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class product //Lớp sản phẩm
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database(); //Khởi tạo hàm db và format
		$this->fm = new Format();
	}
	public function insert_product($date, $files)
	{
		//Tạo biến đưa vào csdl
		$price = mysqli_real_escape_string($this->db->link, $date['price']);
		$price_discount = mysqli_real_escape_string($this->db->link, $date['price_discount']);
		$sl_nhap = mysqli_real_escape_string($this->db->link, $date['sl_nhap']);
		$brand = mysqli_real_escape_string($this->db->link, $date['brand']);
		$tensp = mysqli_real_escape_string($this->db->link, $date['tensp']);
		$tensp_shortcut = mysqli_real_escape_string($this->db->link, $date['tensp_shortcut']);
		$cpu = mysqli_real_escape_string($this->db->link, $date['cpu']);
		$cpu_shortcut = mysqli_real_escape_string($this->db->link, $date['cpu_shortcut']);
		$hedieuhanh = mysqli_real_escape_string($this->db->link, $date['hedieuhanh']);
		$gpu = mysqli_real_escape_string($this->db->link, $date['gpu']);
		$gpu_shortcut = mysqli_real_escape_string($this->db->link, $date['gpu_shortcut']);
		$ram = mysqli_real_escape_string($this->db->link, $date['ram']);
		$ram_shortcut = mysqli_real_escape_string($this->db->link, $date['ram_shortcut']);
		$ssd = mysqli_real_escape_string($this->db->link, $date['ssd']);
		$ssd_shortcut = mysqli_real_escape_string($this->db->link, $date['ssd_shortcut']);
		$manhinh = mysqli_real_escape_string($this->db->link, $date['manhinh']);
		$manhinh_shortcut = mysqli_real_escape_string($this->db->link, $date['manhinh_shortcut']);
		$wifi = mysqli_real_escape_string($this->db->link, $date['wifi']);
		$banphim = mysqli_real_escape_string($this->db->link, $date['banphim']);
		$kichthuoc = mysqli_real_escape_string($this->db->link, $date['kichthuoc']);
		$trongluong = mysqli_real_escape_string($this->db->link, $date['trongluong']);
		$description = mysqli_real_escape_string($this->db->link, $date['description']);
		//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
		
		// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$file_size = $_FILES['image']['size'];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		//Lấy ảnh tử html input
		$file_name_anhbia = $_FILES['image']['name'];//ảnh bìa
		//Lấy temp file ảnh
		$file_temp = $_FILES['image']['tmp_name'];//ảnh bìa
		$file_1 = $_FILES['img_1']['tmp_name'];//ảnh 1
		$file_2 = $_FILES['img_2']['tmp_name'];//ảnh 2
		$file_3 = $_FILES['img_3']['tmp_name'];//ảnh 3
		$file_4 = $_FILES['img_4']['tmp_name'];//ảnh 4
		$file_5 = $_FILES['img_5']['tmp_name'];//ảnh 5
		$file_6 = $_FILES['img_6']['tmp_name'];//ảnh 6
		//tạo tệp ảnh khi lưu vào db
		$div = explode('.', $file_name_anhbia);

		$file_ext = strtolower(end($div));
		//tạo tệp ảnh khi lưu vào db
		$len = 10;
		$anh_bia = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh bìa
		$anh_1 = substr(md5(mt_rand()), 0 ,$len). '.' . $file_ext;//ảnh 1
		$anh_2 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 2
		$anh_3 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 3
		$anh_4 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 4
		$anh_5 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 5
		$anh_6 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 6
		//tải ảnh vào thư mục
		$uploaded_image = "uploads/" . $anh_bia;//ảnh bìa
		$uploaded_image_1 = "uploads/" . $anh_1;//ảnh 1
		$uploaded_image_2 = "uploads/" . $anh_2;//ảnh 2
		$uploaded_image_3 = "uploads/" . $anh_3;//ảnh 3
		$uploaded_image_4 = "uploads/" . $anh_4;//ảnh 4
		$uploaded_image_5 = "uploads/" . $anh_5;//ảnh 5
		$uploaded_image_6 = "uploads/" . $anh_6;//ảnh 6

		if ($tensp == '') 
		{
			$alert =  "<h2 class='h2_text'>Không được để trống thông tin sản phẩm </h2>";
			return $alert;
		} 
		else 
		{
			move_uploaded_file($file_temp, $uploaded_image);//up anh bia
			move_uploaded_file($file_1, $uploaded_image_1);//up anh 1
			move_uploaded_file($file_2, $uploaded_image_2);//up anh 2
			move_uploaded_file($file_3, $uploaded_image_3);//up anh 3
			move_uploaded_file($file_4, $uploaded_image_4);//up anh 4
			move_uploaded_file($file_5, $uploaded_image_5);//up anh 5
			move_uploaded_file($file_6, $uploaded_image_6);//up anh 6

			$query = "INSERT INTO tbl_product(price,price_discount,sl_nhap,tonkho,brand,tensp,tensp_shortcut,cpu,cpu_shortcut,hedieuhanh,gpu,gpu_shortcut,ram,ram_shortcut,ssd,ssd_shortcut,manhinh,manhinh_shortcut,wifi,banphim,kichthuoc,trongluong,description,image,img_1,img_2,img_3,img_4,img_5,img_6) 
			VALUES('$price', '$price_discount', '$sl_nhap','$sl_nhap', '$brand', '$tensp', '$tensp_shortcut', '$cpu', '$cpu_shortcut', '$hedieuhanh', '$gpu', '$gpu_shortcut', '$ram', '$ram_shortcut', '$ssd', '$ssd_shortcut', '$manhinh', '$manhinh_shortcut', '$wifi', '$banphim', '$kichthuoc','$trongluong','$description', '$anh_bia','$anh_1','$anh_2','$anh_3','$anh_4','$anh_5','$anh_6') ";
			$result = $this->db->insert($query);
			if ($result) 
			{
				$alert = "<h2 class='h2_text'>Thêm sản phẩm thành công.</h2>";
				return $alert;
			} 
			else 
			{
				$alert = "<h2 class='h2_text'>Lỗi khi thêm sản phẩm</h2>";
				return $alert;
			}
		}
	}

	//Hàm update sản phẩm	
	public function update_product($date,$files,$id){
	
		$price = mysqli_real_escape_string($this->db->link, $date['price']);
		$price_discount = mysqli_real_escape_string($this->db->link, $date['price_discount']);
		$sl_nhap = mysqli_real_escape_string($this->db->link, $date['sl_nhap']);
		$brand = mysqli_real_escape_string($this->db->link, $date['brand']);
		$tensp = mysqli_real_escape_string($this->db->link, $date['tensp']);
		$tensp_shortcut = mysqli_real_escape_string($this->db->link, $date['tensp_shortcut']);
		$cpu = mysqli_real_escape_string($this->db->link, $date['cpu']);
		$cpu_shortcut = mysqli_real_escape_string($this->db->link, $date['cpu_shortcut']);
		$hedieuhanh = mysqli_real_escape_string($this->db->link, $date['hedieuhanh']);
		$gpu = mysqli_real_escape_string($this->db->link, $date['gpu']);
		$gpu_shortcut = mysqli_real_escape_string($this->db->link, $date['gpu_shortcut']);
		$ram = mysqli_real_escape_string($this->db->link, $date['ram']);
		$ram_shortcut = mysqli_real_escape_string($this->db->link, $date['ram_shortcut']);
		$ssd = mysqli_real_escape_string($this->db->link, $date['ssd']);
		$ssd_shortcut = mysqli_real_escape_string($this->db->link, $date['ssd_shortcut']);
		$manhinh = mysqli_real_escape_string($this->db->link, $date['manhinh']);
		$manhinh_shortcut = mysqli_real_escape_string($this->db->link, $date['manhinh_shortcut']);
		$wifi = mysqli_real_escape_string($this->db->link, $date['wifi']);
		$banphim = mysqli_real_escape_string($this->db->link, $date['banphim']);
		$kichthuoc = mysqli_real_escape_string($this->db->link, $date['kichthuoc']);
		$trongluong = mysqli_real_escape_string($this->db->link, $date['trongluong']);
		$description = mysqli_real_escape_string($this->db->link, $date['description']);
		//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
		// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$file_size = $_FILES['image']['size'];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		//Lấy ảnh tử html input
		$file_name_anhbia = $_FILES['image']['name'];//ảnh bìa
		//Lấy temp file ảnh
		$file_temp = $_FILES['image']['tmp_name'];//ảnh bìa
		$file_1 = $_FILES['img_1']['tmp_name'];//ảnh 1
		$file_2 = $_FILES['img_2']['tmp_name'];//ảnh 2
		$file_3 = $_FILES['img_3']['tmp_name'];//ảnh 3
		$file_4 = $_FILES['img_4']['tmp_name'];//ảnh 4
		$file_5 = $_FILES['img_5']['tmp_name'];//ảnh 5
		$file_6 = $_FILES['img_6']['tmp_name'];//ảnh 6
		//tạo tệp ảnh khi lưu vào db
		$div = explode('.', $file_name_anhbia);

		$file_ext = strtolower(end($div));
		//tạo tệp ảnh khi lưu vào db
		$len = 10;
		$anh_bia = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh bìa
		$anh_1 = substr(md5(mt_rand()), 0 ,$len). '.' . $file_ext;//ảnh 1
		$anh_2 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 2
		$anh_3 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 3
		$anh_4 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 4
		$anh_5 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 5
		$anh_6 = substr(md5(mt_rand()), 0 ,$len) . '.' . $file_ext;//ảnh 6
		//tải ảnh vào thư mục
		$uploaded_image = "uploads/" . $anh_bia;//ảnh bìa
		$uploaded_image_1 = "uploads/" . $anh_1;//ảnh 1
		$uploaded_image_2 = "uploads/" . $anh_2;//ảnh 2
		$uploaded_image_3 = "uploads/" . $anh_3;//ảnh 3
		$uploaded_image_4 = "uploads/" . $anh_4;//ảnh 4
		$uploaded_image_5 = "uploads/" . $anh_5;//ảnh 5
		$uploaded_image_6 = "uploads/" . $anh_6;//ảnh 6

		if($tensp == ""){
			$alert = "<h2 class='h2_text'>Không đc để trống tên sản phẩm.</h2>";
			return $alert; 
		}
		else
		{
			if(!empty($file_name_anhbia))
			{
				//Nếu người dùng chọn ảnh
				if ($file_size > 204800000) {
					$alert = "<h2 class='h2_text'>Kích thước ảnh quá to tải lại ảnh khác đi.</h2>";
					return $alert;
				} 
				elseif (in_array($file_ext, $permited) === false) 
				{
					$alert = "<h2 class='h2_text'>Chỉ có thể upload các định dạng ảnh :-".implode(', ', $permited)."</h2>";
					return $alert;
				}
				//Up load ảnh vào host
				move_uploaded_file($file_temp, $uploaded_image);//up anh bia
				move_uploaded_file($file_1, $uploaded_image_1);//up anh 1
				move_uploaded_file($file_2, $uploaded_image_2);//up anh 2
				move_uploaded_file($file_3, $uploaded_image_3);//up anh 3
				move_uploaded_file($file_4, $uploaded_image_4);//up anh 4
				move_uploaded_file($file_5, $uploaded_image_5);//up anh 5
				move_uploaded_file($file_6, $uploaded_image_6);//up anh 6
				$query = "UPDATE tbl_product SET price = $price , price_discount = $price_discount, sl_nhap = $sl_nhap, brand = '$brand', tensp = '$tensp', tensp_shortcut = '$tensp_shortcut',cpu = '$cpu' ,cpu_shortcut = '$cpu_shortcut', hedieuhanh = '$hedieuhanh' , gpu = '$gpu',gpu_shortcut = '$gpu_shortcut' ,ram = '$ram',ram_shortcut ='$ram_shortcut' ,ssd = '$ssd' ,ssd_shortcut ='$ssd_shortcut' ,manhinh = '$manhinh' ,manhinh_shortcut = '$manhinh_shortcut' ,wifi = '$wifi' ,banphim = '$banphim' ,kichthuoc = '$kichthuoc' ,trongluong = '$trongluong' ,description = '$description',image = '$anh_bia',img_1 = '$anh_1',img_2 = '$anh_2',img_3 = '$anh_3',img_4 = '$anh_4',img_5 = '$anh_5',img_6 = '$anh_6' WHERE product_id = $id ";	
			}
			else
			{	
				//$query = "UPDATE tbl_product SET price = $price , price_discount = $price_discount, sl_nhap = $sl_nhap, brand = '$brand', tensp = '$tensp', tensp_shortcut = '$tensp_shortcut' ,cpu = '$cpu' ,cpu_shortcut = '$cpu_shortcut' ,hedieuhanh = '$hedieuhanh' ,gpu = '$gpu',gpu_shortcut = '$gpu_shortcut' ,ram = '$ram',ram_shortcut = '$ram_shortcut' ,ssd = '$ssd',ssd_shortcut = '$ssd_shortcut' ,manhinh = '$manhinh' ,manhinh_shortcut = '$manhinh_shortcut' ,wifi = '$wifi' ,banphim = '$banphim' ,kichthuoc = '$kichthuoc' ,trongluong = '$trongluong' ,description = '$description' WHERE product_id = $id ";
				//Nếu người dùng không chọn ảnh\
				$query = "UPDATE tbl_product SET price = $price , price_discount = $price_discount, sl_nhap = $sl_nhap, brand = '$brand', tensp = '$tensp', tensp_shortcut = '$tensp_shortcut',cpu = '$cpu' ,cpu_shortcut = '$cpu_shortcut', hedieuhanh = '$hedieuhanh' , gpu = '$gpu',gpu_shortcut = '$gpu_shortcut' ,ram = '$ram',ram_shortcut ='$ram_shortcut' ,ssd = '$ssd' ,ssd_shortcut ='$ssd_shortcut' ,manhinh = '$manhinh' ,manhinh_shortcut = '$manhinh_shortcut' ,wifi = '$wifi' ,banphim = '$banphim' ,kichthuoc = '$kichthuoc' ,trongluong = '$trongluong' ,description = '$description' WHERE product_id = $id ";
			}

			$result = $this->db->update($query);
				if($result){
					$alert = "<script type='text/javascript'> alert ('Sửa sản phẩm thành công');</script>";
					return $alert;
				}else{
					$alert = "<script type='text/javascript'> alert ('Lỗi. Chưa sửa đc sản phẩm');</script>";
					return $alert;
				}
		}
	}

	public function search_product($name)
	{
		$query = "select * from tbl_product where tensp like '%$name%'";
		$result = $this->db->select($query);
		return $result;
	}

	public function show_product_byId($id)
	{
		$query = "select * from tbl_product where product_id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function show_product_hot()
	{
		$query = "select * from tbl_product ORDER BY sp_daban DESC LIMIT 5";
		$result = $this->db->select($query);
		return $result;
	}

	public function del_product($id)
	{
		$query = "DELETE FROM tbl_product where product_id = '$id' ";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<script type='text/javascript'> alert ('Xóa sản phẩm thành công');</script>";
			return $alert;
		} else {
			$alert = "<script type='text/javascript'> alert ('Xóa sản phẩm không thành công');</script>";
			return $alert;
		}
	}

	//function show sản phẩm
	public function show_product()
	{
		$query = "select * from tbl_product";
		$result = $this->db->select($query);
		return $result;
	}

	public function show_product_bybrand($brand)
	{
		$query = "select * from tbl_product where brand like '%$brand%'";
		$result = $this->db->select($query);
		return $result;
	}

	public function show_product_list()
	{
		$query = "select * from tbl_product";
		//==============================================================
		// $query = 
		// "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

		//  FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
		// 					INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
		//  order by tbl_product.productId desc ";
		//==============================================================
		// $query = "SELECT * FROM tbl_product order by productId desc ";
		$result = $this->db->select($query);
		return $result;
	}

	//class dlide sản phẩm
	public function insert_slider($date, $files)
	{
		$sliderName = mysqli_real_escape_string($this->db->link, $date['sliderName']);
		$type = mysqli_real_escape_string($this->db->link, $date['type']);
		//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db

		// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');

		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		// $file_current = strtolower(current($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;


		if ($sliderName == "" || $type == "") {
			$alert = "<span class='error'>Fields must be not empty</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				//Nếu người dùng chọn ảnh
				if ($file_size > 2048000) {

					$alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				} elseif (in_array($file_ext, $permited) === false) {
					// echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
					$alert = "<span class='success'>You can upload only:-" . implode(', ', $permited) . "</span>";
					return $alert;
				}
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image') ";
				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'>Slider Added Successfully</span>";
					return $alert;
				} else {
					$alert = "<span class='error'>Slider Added NOT Success</span>";
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

	public function show_product_warehouse()
	{
		$query =
			"SELECT tbl_product.*, tbl_warehouse.*

			 FROM tbl_product INNER JOIN tbl_warehouse ON tbl_product.productId = tbl_warehouse.id_sanpham
								
			 order by tbl_warehouse.sl_ngaynhap desc ";


		$result = $this->db->select($query);
		return $result;
	}

	public function update_type_slider($id, $type)
	{

		$type = mysqli_real_escape_string($this->db->link, $type);
		$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
		$result = $this->db->update($query);
		return $result;
	}

	public function del_slider($id)
	{
		$query = "DELETE FROM tbl_slider where sliderId = '$id' ";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Slider Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='success'>Slider Deleted Not Success</span>";
			return $alert;
		}
	}

	// Hàm update số lượng sản phẩm
	public function update_quantity_product($data, $files, $id)
	{
		$product_more_quantity = mysqli_real_escape_string($this->db->link, $data['product_more_quantity']); //Số lượng sản phẩm thêm
		$product_remain = mysqli_real_escape_string($this->db->link, $data['product_remain']); //Số sản phẩm còn lại

		if ($product_more_quantity == "") {

			$alert = "<span class='error'>Số lượng ko đc để trống</span>";
			return $alert;
		} else {
			$qty_total = $product_more_quantity + $product_remain;
			//Nếu người dùng không chọn ảnh
			$query = "UPDATE tbl_product SET
				
				tonkho = '$qty_total'

				WHERE product_id = '$id'";
		}
		$query_warehouse = "INSERT INTO tbl_warehouse(id_sanpham,sl_nhap) VALUES('$id','$product_more_quantity') ";
		$result_insert = $this->db->insert($query_warehouse);
		$result = $this->db->update($query);

		if ($result) {
			$alert = "<span class='success'>Thêm số lượng thành công</span>";
			return $alert;
		} else {
			$alert = "<span class='error'>Thêm số lượng không thành công</span>";
			return $alert;
		}
	}

	public function del_wlist($proid, $customer_id)
	{
		$query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id' ";
		$result = $this->db->delete($query);
		return $result;
	}
	public function getproductbyId($id)
	{
		$query = "SELECT * FROM tbl_product where product_id = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}
	//Kết thúc Backend

	public function getproduct_featheread()
	{
		$query = "SELECT * FROM tbl_product where type = '0' order by productId desc LIMIT 4 ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getproduct_new()
	{
		$query = "SELECT * FROM tbl_product order by product_id DESC LIMIT 4 ";
		$result = $this->db->select($query);
		return $result;
	}

	public function get_details($id)
	{
		$query =
			"SELECT *
			 FROM tbl_product 
			 WHERE product_id = '$id'
			 ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getLastestDell()
	{
		$query = "SELECT * FROM tbl_product where brandId = '10' order by product_id desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function getLastestHuawei()
	{
		$query = "SELECT * FROM tbl_product where brandId = '8' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function getLastestApple()
	{
		$query = "SELECT * FROM tbl_product where brandId = '7' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function getLastestSamsum()
	{
		$query = "SELECT * FROM tbl_product where brandId = '6' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function get_compare($customer_id)
	{
		$query = "SELECT * FROM tbl_compare where customer_id = '$customer_id' order by id desc";
		$result = $this->db->select($query);
		return $result;
	}

	public function get_wishlist($customer_id)
	{
		$query = "SELECT * FROM tbl_wishlist where customer_id = '$customer_id' order by id desc";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertCompare($productid, $customer_id)
	{
		$productid = mysqli_real_escape_string($this->db->link, $productid);
		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

		$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id ='$customer_id'";
		$result_check_compare = $this->db->select($check_compare);

		if ($result_check_compare) {
			$msg = "<span class='error'>Sản phẩm đã được thêm vào so sánh</span>";
			return $msg;
		} else {

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];



			$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_compare = $this->db->insert($query_insert);

			if ($insert_compare) {
				$alert = "<span class='success'>Thêm sản phẩm vào so sánh thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Thêm sản phẩm vào so sánh thất bại</span>";
				return $alert;
			}
		}
	}

	public function insertWishlist($productid, $customer_id)
	{
		$productid = mysqli_real_escape_string($this->db->link, $productid);
		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

		$check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
		$result_check_wlist = $this->db->select($check_wlist);

		if ($result_check_wlist) {
			$msg = "<span class='error'>Product Added to Wishlist</span>";
			return $msg;
		} else {

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			$query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if ($insert_wlist) {
				$alert = "<span class='success'>Thêm sản phẩm vào wishlist thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Thêm sản phẩm vào wishlist thất bại</span>";
				return $alert;
			}
		}
	}
}
?>
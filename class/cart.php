<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../library/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class cart
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function add_to_cart($id, $quantity)
		{
			$sId = session_id();
			
			$query = "SELECT * FROM tbl_product WHERE product_id = '$id' ";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result['tensp'];
			$price = $result['price_discount'];
			$image = $result['image'];
			if($result['tonkho']>$quantity){
			
				$query_insert = "INSERT INTO tbl_cart(productId,productName,quantity,sId,price,image) VALUES('$id','$productName','$quantity','$sId','$price','$image' ) ";
				$insert_cart = $this->db->insert($query_insert);
				if($result){
					echo "<script> window.location = 'cart.php' </script>";
				}else {
					echo "<script> window.location = './admin/404.html' </script>";
				}
			}else{
				$msg = "<span class='erorr'> Số lượng ".$quantity." bạn đặt quá số lượng chúng tôi chỉ còn ".$result['tonkho']." cái</span> ";
				return $msg;
			}
		}

		public function get_product_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_quantity_Cart($proId,$cartId, $quantity)
		{
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$proId = mysqli_real_escape_string($this->db->link, $proId);

			$query_product = "SELECT * FROM tbl_product WHERE product_id = '$proId' ";
			$result_product = $this->db->select($query_product)->fetch_assoc();

			if($quantity<$result_product['tonkho'])
            {
				$query = "UPDATE tbl_cart SET

				quantity = '$quantity'
				WHERE cartId = '$cartId'";

				$result = $this->db->update($query);
				if ($result) {
					echo "<script> window.location = 'cart.php' </script>";
				}else {
					$msg = "<span class='erorr'> Product Quantity Update NOT Succesfully</span> ";
					return $msg;
				}
			}else{
				$msg = "<span class='erorr'> Số lượng ".$quantity." bạn đặt quá số lượng chúng tôi chỉ còn ".$result_product['tonkho']." cái</span> ";
				return $msg;
			}

		}
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				header('Location:cart.php');
			}else{
				$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
				return $msg;
			}
		}

		public function check_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function check_order($customer_id)
		{
			// $sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_all_data_cart()
		{
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function insertOrder($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					$customer_id = $customer_id;
					$query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
					$insert_order = $this->db->insert($query_order);
				}
			}


		}

		public function insertOrder_2($customer_id)
		{
			$len = 10;
			$order_code = substr(md5(mt_rand()), 0 ,$len);
			//Thêm mới 1 đơn hàng bằng mã khách hàng trước bằng id lhachs hàng
			$query_insert_order = "INSERT INTO tbl_order(customer_id,order_code) VALUES ('$customer_id','$order_code')";
			$id_order = $this->db->insert_return($query_insert_order);
			$tong_sl = 0;//Khởi tạo tổng sl sản phẩm
			$tong_gia = 0;//Khởi tạo tổng tiền sản phẩm

			$sId = session_id();//Lấy seesion hiện tại
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product)
			{
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];//Product id
					$productName = $result['productName'];//Tên sản phẩm đc chèn vào giở hàng
					$quantity = $result['quantity'];//;Số lượng của sản phẩm đó trong giỏ hàng
					$price = $result['price'] * $quantity;//Tổng tiền bằng số lượng * giá tiền trong giỏ hàng
					$query_insert_detail = "INSERT INTO tbl_order_details(id_order,id_sanpham,tensp,soluong,thanhtien) VALUES ('$id_order','$productid','$productName','$quantity','$price')";//Thêm sản phẩm vào bằng chi tiết giỏ hàng
					$insert_order = $this->db->insert($query_insert_detail);
					$tong_sl += $quantity;
					$tong_gia += $price;
				}
			}
			$address = Session::get('customer_diachi');
			$phone = Session::get('customer_phone');
			$ho = Session::get('customer_ho');
			$ten = Session::get('customer_ten');
			$name = $ho.' '.$ten;
			$query_update = "UPDATE tbl_order SET quantity = $tong_sl, price = $tong_gia ,ho_ten = '$name' , address = '$address', phone = '$phone', status = 0 WHERE id = '$id_order'"; //(quantity,price,status) VALUES ('$tong_sl','$tong_gia',0)
			$query_order = $this->db->update($query_update);
			return $query_order;
		}

		public function get_all_order($customer_id)
		{
			$query =  "SELECT * FROM tbl_order where customer_id = '$customer_id'";
			$get_order = $this->db->select($query);
			return $get_order;
		}
		
		public function order_notification()
		{
			$query =  "SELECT * FROM tbl_order order by date_order LIMIT 5";
			$get_order = $this->db->select($query);
			return $get_order;
		}

		public function get_order_byID($id)
		{
			$query =  "SELECT * FROM tbl_order where id = '$id'";
			$get_order = $this->db->select($query);
			return $get_order;
		}

		public function cancel_order($order_id)
		{
			$query = "UPDATE tbl_order SET status = 4 where id = $order_id ";
			$result = $this->db->update($query);
			if ($result)
			{
				$alert = "<script type='text/javascript'> alert ('Hủy đơn hàng thành công.');</script>";
				return $alert;
			}
			else
			{
				$alert = "<script type='text/javascript'> alert ('Không hủy đc đơn hàng.');</script>";
				return $alert;
			}
		}

		public function update_status($status,$order_id)
		{
			$query = "UPDATE tbl_order SET status = '$status' where id = $order_id ";
			$result = $this->db->update($query);
			if ($result)
			{
				$alert = "<script type='text/javascript'> alert ('Cập nhật trạng thái đơn hàng thành công.');</script>";
				return $alert;
			}
			else
			{
				$alert = "<script type='text/javascript'> alert ('Không cập nhật được trạng thái đơn hàng.');</script>";
				return $alert;
			}
		}

		public function order_susscess($order_id)
		{
			$query = "UPDATE tbl_order SET status = 3 where id = '$order_id' ";
			$result = $this->db->update($query);
			// if ($result)
			// {
			// 	$alert = "<script type='text/javascript'> alert ('Không cập nhật được trạng thái đơn hàng.');</script>";
			// 	return $alert;
			// }
			// else
			// {
			// 	$alert = "<script type='text/javascript'> alert ('Không cập nhật được trạng thái đơn hàng.');</script>";
			// 	return $alert;
			// }
		}

		public function get_order_with_in4()
		{
			$query = "SELECT id, ho, ten, address, tbl_order.phone , status, quantity , price , date_order FROM tbl_order, tbl_customer WHERE tbl_order.customer_id = tbl_customer.customer_id";
			$get_order = $this->db->select($query);
			return $get_order;
		}

		public function get_order_with_orderID($id_order)
		{
			$query = "SELECT * FROM tbl_order_details  WHERE id_order = '$id_order'";
			$get_order = $this->db->select($query);
			return $get_order;
		}

		public function getAmountPrice($customer_id)
		{
			$query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id)
		{
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		
		public function shifted($id,$proid,$qty,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$proid = mysqli_real_escape_string($this->db->link, $proid);
			$qty = mysqli_real_escape_string($this->db->link, $qty);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query_select = "SELECT * FROM tbl_product WHERE productId='$proid'";
			$get_select = $this->db->select($query_select);

			if($get_select){
				while($result = $get_select->fetch_assoc()){
					$soluong_new = $result['tonkho'] - $qty;
					$qty_soldout = $result['sp_daban'] + $qty;

					$query_soluong = "UPDATE tbl_product SET

					tonkho = '$soluong_new',sp_daban = '$qty_soldout' WHERE product_id = '$proid'";
					$result = $this->db->update($query_soluong);
				}
			}

			$query = "UPDATE tbl_order SET

			status = '1'

			WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";


			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> Update Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
				return $msg;
			}
		}

	}
 ?>
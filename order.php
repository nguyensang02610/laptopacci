<?php
include 'include/header.php';
// include 'inc/slider.php';
?>
<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
	header('Location:login.php');
}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="css/order.css">

<div class="container-xl table-content">
	<div class="table-title">
		<div class="row">
			<div class="col-sm-4">
				<h2>Chi tiết <b>ĐƠN ĐẶT HÀNG</b></h2>
			</div>
		</div>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th style="width:8%">ID Đơn hàng</th>
				<th style="width:20%">Ngày đặt hàng</th>
				<th scope="col">Số lượng sản phẩm</th>
				<th scope="col">Trạng thái đơn hàng</th>
				<th scope="col">Tổng tiền</th>
				<th scope="col">Chi tiết</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$customer_id = Session::get('customer_id');
			$list_order = $ct->get_all_order($customer_id);
			$i = 0;
			if ($list_order) {
				while ($result = $list_order->fetch_assoc()) {
					$i++;
			?>
					<tr>
						<th scope="row">#<?php echo $result['id'] ?></th>
						<td><?php echo $result['date_order'] ?></td>
						<td><?php echo $result['quantity'] ?></td>
						<td>
							<?php
							$status = $result['status'];
							if ($status == 0) {
									echo "<div style='color:red'>
								<i class='bi bi-clock'></i>
								Đang chờ xử lý
								</div>";
							} else if ($status == 1) {
									echo "<div style='color:blue'>
								<i class='bi bi-check-lg'></i>
								Đã xử lý
								</div>";
							} else if ($status == 2) {
									echo "<div style='color:blue'>
								<i class='bi bi-truck'></i>
								Đang giao hàng
								</div>";
							} else if ($status == 3) {
									echo "<div style='color:green'>
								<i class='bi bi-box'></i>
								Đã giao hàng
								</div>";
							} else {
									echo "<div style='color:red'>
								<i class='bi bi-x-lg'></i>
								Đã hủy
								</div>";
							}
							?>
						</td>
						<td><?php echo $fm->currency_format($result['price']) ?></td>
						<td><a href="order_detail.php?order_id=<?php echo $result['id'] ?>" title="Các sản phẩm đã đặt"><i class="bi bi-arrow-right-circle" style="color: blue;font-size:30px"></i></a></td>
					</tr>
			<?php
				}
			}
			?>
		</tbody>
	</table>
</div>

<?php
include 'include/footer.php';
// include 'inc/slider.php';
?>
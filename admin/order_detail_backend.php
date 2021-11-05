<?php include './inc/header.php'; ?>

<link rel="stylesheet" href="./css/order_detail.css">

<?php
if (isset($_GET['order']) and $_GET['order'] == NULL) {
	//echo "<script> alert ('Ko nhận đc id sp') ;</script>";
	//echo "<script> window.location = 'product_list.php' </script>";
} else {
	$id_order = $_GET['order']; // Lấy productid trên host
}
?>

<?php
    $fm = new Format();
    $ct = new cart();
    $order_list = $ct->get_order_byID($id_order);
    $result_order = $order_list->fetch_assoc();
?>

<div class="page-content container content_div" style="max-width: 1435px;">
	<div class="page-header text-blue-d2">
		<h1 class="page-title text-secondary-d1">
			Đơn hàng
			<small class="page-info">
				<i class="fa fa-angle-double-right text-80"></i>
				ID: #<?php echo $id_order ?>
			</small>
		</h1>

		<div class="page-tools">
			<div class="action-buttons">
				<a class="btn bg-white btn-light mx-1px text-95" href="print_bill.php?order_id=<?php echo $id_order ?>" target="_blank" data-title="Print">
					<i class="mr-1 bi bi-printer text-primary-m1 text-120 w-2"></i>
					In hóa đơn xuất kho
				</a>
			</div>
		</div>
	</div>

	<div class="container px-0" style="max-width: 1377px;">
		<div class="row mt-4">
			<div class="col-12 col-lg-14">
				<div class="row">
					<div class="col-12">
						<div class="text-center text-150">
							<i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
							<span class="text-default-d3">Chi tiết đặt đơn</span>
						</div>
					</div>
				</div>
				<!-- .row -->

				<hr class="row brc-default-l1 mx-n1 mb-4" />

				<div class="row">
					<div class="col-sm-6">
						<div>
							<span class="text-sm text-grey-m2 align-middle">Gửi đến :</span>
							<span class="text-600 text-110 text-blue align-middle"><?php echo $result_order['ho_ten'] ?></span>
						</div>
						<div class="text-grey-m2">
							<div class="my-1">
								Địa chỉ : <i style="color : #478fcc!important;font-size:18px"><?php echo $result_order['address'] ?></i>
							</div>
							<div class="my-1"><i class="bi bi-telephone-fill text-secondary"></i> <b class="text-600"><?php echo $result_order['phone'] ?></b></div>
						</div>
					</div>
					<!-- /.col -->

					<div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
						<hr class="d-sm-none" />
						<div class="text-grey-m2">
							<div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
								Invoice
							</div>

							<div class="my-2"><i class="bi bi-circle-fill text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID Đơn hàng :</span>#<?php echo $id_order ?></div>

							<div class="my-2"><i class="bi bi-circle-fill text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Ngày đặt hàng :</span><?php echo $result_order['date_order'] ?></div>

							<div class="my-2" style="display: flex;"><i class="bi bi-circle-fill text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Trạng thái : &nbsp;</span>
							<?php
                                        $status = $result_order['status'];
                                        if ($status == 0) {
                                            echo "<div style='color:red'>
                                            Đang chờ xử lý
                                            </div>";
                                        } else if ($status == 1) {
                                            echo "<div style='color:blue'>
                                            Đã xử lý
                                            </div>";
                                        }
										else if ($status == 2) {
                                            echo "<div style='color:blue'>
                                            Đang giao hàng
                                            </div>";
                                        }
                                        else if ($status == 3)
                                        {
                                            echo "<div style='color:green'>
                                            Đã giao hàng
                                            </div>";
                                        }
                                        else
                                        {
                                            echo "<div style='color:red'>
                                            Đã hủy
                                            </div>";
                                        }
                                        ?>
							 <span class="badge badge-warning badge-pill px-25"></span></div>
						</div>
					</div>
					<!-- /.col -->
				</div>

				<div class="mt-4">
					<div class="row text-600 text-white bgc-default-tp1 py-25">
						<div class="d-none d-sm-block col-1">#ID</div>
						<div class="col-9 col-sm-5">Tên sản phẩm</div>
						<div class="d-none d-sm-block col-4 col-sm-2">Số lượng</div>
						<div class="d-none d-sm-block col-sm-2">Giá trên 1 sản phẩm</div>
						<div class="col-2">Tổng tiền</div>
					</div>

					<div class="text-95 text-secondary-d3">
						<?php
						$list_product = $ct->get_order_with_orderID($id_order);
						if ($list_product) {
							while ($result = $list_product->fetch_assoc()) {
						?>
								<div class="row mb-2 mb-sm-0 py-25">
									<div class="d-none d-sm-block col-1"><?php echo $result['id_sanpham'] ?></div>
									<div class="col-9 col-sm-5 text_sp"><?php echo $result['tensp'] ?></div>
									<?php
									$sl = $result['soluong'];
									$tongtien = $result['thanhtien'];
									$unit = $tongtien / $sl;
									?>
									<div class="d-none d-sm-block col-2"><?php echo $sl ?></div>
									<div class="d-none d-sm-block col-2 text-95"><?php echo $fm->currency_format($unit) ?></div>
									<div class="col-2 text-secondary-d2"><?php echo $fm->currency_format($tongtien) ?></div>
								</div>

						<?php
							}
						}
						?>
					</div>
					<div class="row border-b-2 brc-default-l2"></div>

					<div class="row mt-3">
						<div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
							Thông tin chung về đơn hàng đã đặt
						</div>

						<div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
							<div class="row my-2 align-items-center bgc-primary-l3 p-2">
								<div class="col-7 text-right">
								Tổng giá trị đơn hàng (đã có thuế VTA):
								</div>
								<div class="col-5">
									<span class="text-150 text-success-d3 opacity-2"><?php echo $fm->currency_format($result_order['price']) ?></span>
								</div>
							</div>
						</div>
					</div>
					<hr />
					<!-- <div class="order_status">
							<div>
								Chuyển trạng thái : <a href="?order_id=<?php echo $id_order?>">Đang giao hàng</a>
							</div>
					</div> -->

					<div>
						<span class="text-secondary-d1 text-105">Thank you for your business</span>
						<!-- <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Gọi Footer-->
<?php include "./inc/footer.php"; ?>

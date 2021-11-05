<?php include './include/header.php'; ?>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="css/payment.css">
<!-- Body-->
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder_2($customer_id);
    $delCart = $ct->del_all_data_cart();
    if ($insertOrder)
    {
        echo "<script> window.location = 'susscess_order.html' </script>";
    }
    else
    {
        echo "<script> atler 'Đơn hàng chưa được thành công, vui lòng liên hệ chủ website.' </script>";
    }
}
?>

<main class="page payment-page">
    <section class="payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2>Thông tin thanh toán</h2>
            </div>
            <form method="POST">
                <div class="products">
                    <h3 class="title">Checkout</h3>
                    <?php
                    $get_product_cart = $ct->get_product_cart();
                    if ($get_product_cart) {
                        $subtotal = 0;
                        $qty = 0;
                        $i = 0;
                        while ($result = $get_product_cart->fetch_assoc()) {
                            $i++;
                    ?>
                            <div class="item">
                                <span class="price">
                                    <?php
                                    $total = $result['price'] * $result['quantity'];
                                    echo $fm->currency_format($total);
                                    ?>
                                </span>
                                <p class="item-name"><?php echo $result['productName'] ?></p>
                                <p class="item-description">Số lượng : <?php echo $result['quantity'] ?></p>
                            </div>
                    <?php
                            $subtotal += $total;
                            $qty = $qty + $result['quantity'];
                        }
                    }
                    ?>
                    <?php
                    $subtotal = $subtotal+($subtotal * 0.1);
                    Session::set('sum', $subtotal);
                    Session::set('qty', $qty);
                    ?>
                    <div class="total">Tổng thanh toán<span class="price"><?php echo $fm->currency_format($subtotal); ?></span></div>
                </div>
                <div class="card-details">
                    <h3 class="title">Thông tin địa chỉ nhận hàng</h3>
                    <div class="row">
                        <?php
                        $id = Session::get('customer_id');
                        $get_customers = $cs->show_customers($id);
                        if ($get_customers) {
                            while ($result = $get_customers->fetch_assoc()) {

                        ?>
                                <!-- Họ tên -->
                                <div class="form-group col-sm-7">
                                    <label for="card-holder">Họ tên người nhận</label>
                                    <input disabled id="card-holder" type="text" class="form-control" placeholder="<?php echo $result['ho']; ?><?php echo $result['ten']; ?>" aria-label="Card Holder" aria-describedby="basic-addon1">
                                </div>
                                <!-- Số điện thoại -->
                                <div class="form-group col-sm-4">
                                    <label for="cvc">Số điện thoại</label>
                                    <input disabled id="cvc" type="text" class="form-control" placeholder="<?php echo $result['phone']; ?>" aria-label="Card Holder" aria-describedby="basic-addon1">
                                </div>
                                <!-- Địa chỉ -->
                                <div class="form-group col-sm-11" style="margin-top:18px">
                                    <label for="card-number">Địa chỉ</label>
                                    <input disabled id="card-number" type="text" class="form-control" placeholder="<?php echo $result['diachi']; ?>" aria-describedby="basic-addon1">
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- Họ tên -->
                        <div class="form-group col-sm-12">
                            <a href="?orderid=order"><button type="button" class="btn btn-primary btn-block">Xác nhận đặt đơn</button></a>
                            <a href="https://sandbox.vnpayment.vn/paymentv2/vpcpay.html?vnp_Amount=1806000&vnp_Command=pay&vnp_CreateDate=20210801153333&vnp_CurrCode=VND&vnp_IpAddr=127.0.0.1&vnp_Locale=vn&vnp_OrderInfo=Thanh+toan+don+hang+%3A5&vnp_OrderType=other&vnp_ReturnUrl=https%3A%2F%2Fdomainmerchant.vn%2FReturnUrl&vnp_TmnCode=DEMOV210&vnp_TxnRef=5&vnp_Version=2.1.0&vnp_SecureHash=3e0d61a0c0534b2e36680b3f7277743e8784cc4e1d68fa7d276e79c23be7d6318d338b477910a27992f5057bb1582bd44bd82ae8009ffaf6d141219218625c42"><button type="button" class="btn btn-primary btn-block">Thanh toán online</button></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<!-- Body-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Gọi Footer-->
<?php include "./include/footer.php"; ?>
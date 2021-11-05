<!-- Gọi header -->
<?php include './include/header.php'; ?>

<?php
if (isset($_GET['cartid'])) {
    $cartid = $_GET['cartid'];
    $delcart = $ct->del_product_cart($cartid);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $cartId = $_POST['cartId'];
    $proId = $_POST['proId'];
    $quantity = $_POST['quantity'];
    $update_quantity_Cart = $ct->update_quantity_Cart($proId, $cartId, $quantity); // hàm check catName khi submit lên
    if ($quantity <= 0) {
        $delcart = $ct->del_product_cart($cartId);
    }
}
?>
<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
<link rel="stylesheet" href="./css/cart.css">
<!-- Giao diện giỏ hàng -->
<div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_menu">
                        <div style="border-right: solid 3px red;padding-right: 20px;"><img src="./img/logo.svg" style="width:50px"></div>
                        <div class="cart_title">Giỏ Hàng</small></div>
                    </div>
                    <!-- Lấy thông báo giỏ hàng -->
                    <?php
                    if (isset($update_quantity_Cart)) {
                        echo $update_quantity_Cart;
                    }
                    ?>
                    <?php
                    if (isset($delcart)) {
                        echo $delcart;
                    }
                    ?>
                    <?php
                    if (isset($delcart)) {
                        echo $delcart;
                    }
                    ?>
                    <!-- Lấy thông báo giỏ hàng -->

                    <!-- Lấy thông báo giỏ hàng -->
                    <div class="cart_items">
                        <ul class="cart_list" style="padding-left: 5px!important;">
                            <?php
                            $get_product_cart = $ct->get_product_cart();
                            if ($get_product_cart) {
                                $subtotal = 0;
                                $qty = 0;
                                while ($result = $get_product_cart->fetch_assoc()) {
                            ?>
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="./admin/uploads/<?php echo $result['image'] ?>" alt="" /></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col" style="width:52%">
                                                <div class="cart_item_title">Tên sản phẩm</div>
                                                <div class="cart_item_text"><?php echo $result['productName'] ?></div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Số lượng</div>
                                                <div class="cart_item_text">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId'] ?>" />
                                                        <input type="hidden" name="proId" min="0" value="<?php echo $result['productId'] ?>" />
                                                        <input type="number" style="width: 60%;" name="quantity" min="0" value="<?php echo $result['quantity'] ?>" />
                                                        <input type="submit" name="submit" value="Cập nhật" />
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Giá</div>
                                                <div class="cart_item_text"><?php echo $fm->format_currency($result['price']) . " VNĐ" ?></div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Tổng tiền sản phẩm</div>
                                                <div class="cart_item_text">
                                                    <?php
                                                    $total = $result['price'] * $result['quantity'];
                                                    echo $fm->format_currency($total) . " VNĐ";
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title"> &nbsp; &nbsp;Thao tác</div>
                                                <div class="cart_item_text"><a href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></div>
                                            </div>
                                            <!-- Xử lỷ php tổng tiền đơn hàng phía dưới -->
                                    <?php
                                    $subtotal += $total;
                                    $qty = $qty + $result['quantity'];
                                }
                            }
                                    ?>
                                    <!-- Xử lỷ php tổng tiền đơn hàng phía dưới -->
                                        </div>
                                    </li>
                        </ul>
                    </div>
                    <!-- Xử lỷ kiểm tra đơn hàng -->
                    <?php
                    $check_cart = $ct->check_cart();
                    if ($check_cart) {
                    ?>
                        <!-- Xử lỷ kiểm tra đơn hàng -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Tổng tiền giỏ hàng:</div>
                                <div class="order_total_amount">
                                    <!-- PHP lưu tổng tiền -->
                                    <?php echo $fm->format_currency($subtotal) . " VNĐ";
                                    Session::set('sum', $subtotal);
                                    Session::set('qty', $qty);
                                    ?>
                                    <!-- PHP lưu tổng tiền -->
                                </div>
                                <br>
                                <div class="order_total_title">Giá thành sau thuế VAT(10%) :</div>
                                <div class="order_total_amount">
                                    <!-- PHP lưu tổng tiền -->
                                    <?php
                                    $vat = $subtotal * 0.1;
                                    $grandTotal = $subtotal + $vat;
                                    echo $fm->format_currency($grandTotal) . " VNĐ";
                                    ?>
                                    <!-- PHP lưu tổng tiền -->
                                </div>
                            </div>
                        </div>
                        <h2 style="text-align: center;color:red">
                            <!-- xử lý khi ko sp trong giỏ hàng -->
                        <?php
                    } else {
                        echo '<h2 style="margin-left: 8.33333333%;margin-top:20px">Giỏ của bạn hiện đang không có gì.</h2>';
                    }
                        ?>
                        <!-- xử lý khi ko sp trong giỏ hàng -->
                        </h2>
                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_clear">Tiếp tục mua sắm</button>
                            <a href="payment.php"><button type="button" class="button cart_button_checkout">Thanh toán</button></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Giao diện giỏ hàng -->
<!-- Gọi Footer-->
<?php include "./include/footer.php"; ?>
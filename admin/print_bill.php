<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="./css/print.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script> -->
    <title>Test Hóa đơn</title>
</head>

<?php include '../class/cart.php' ?>

<?php
if (isset($_GET['order_id']) and $_GET['order_id'] == NULL) {
    //echo "<script> alert ('Ko nhận đc id sp') ;</script>";
    //echo "<script> window.location = 'product_list.php' </script>";
} else {
    $id_order = $_GET['order_id']; // Lấy productid trên host
}
?>

<?php
$fm = new Format();
$ct = new cart();
$change_status = $ct -> update_status(2,$id_order);
$order_list = $ct->get_order_byID($id_order);
$result_order = $order_list->fetch_assoc();
?>

<body onload="window.print();">
    <!--onload="window.print();" -->
    <div id="page" class="page">
        <div class="header">
            <div class="logo"><img src="./img/logo.png" width="120px"></div>
            <div class="company">Công Ty TNHH MTV Apple</div>
        </div>
        <br />
        <div class="title">
            HÓA ĐƠN THANH TOÁN
            <br>
            (Khiên phiếu xuất hàng)
            <br>
            <br>
            Đơn Hàng : #<b><?php echo $id_order ?></b>
        </div>
        <br />
        <br />
        <div>
            <div class="customer">
            Khách hàng : <?php echo $result_order['ho_ten']?>
            </div>
            <div class="customer">
            SĐT : <?php echo $result_order['phone']?>
            </div>
            <div class="customer">
            Địa chỉ giao hàng : <?php echo $result_order['address']?>
            </div>
        </div>
        <table class="TableData">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>

            <?php
            $list_product = $ct->get_order_with_orderID($id_order);
            $i = 0;
            if ($list_product) {
                while ($result = $list_product->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td class="cotSTT"><?php echo $i ?></td>
                        <td class="cotTenSanPham"><?php echo $result['tensp'] ?></td>
                        <?php
                        $sl = $result['soluong'];
                        $tongtien = $result['thanhtien'];
                        $unit = $tongtien / $sl;
                        ?>
                        <td class="cotGia"><?php echo $fm->currency_format($unit) ?></td>
                        <td class="cotSoLuong"><?php echo $sl ?></td>
                        <td class="cotSo"><?php echo $fm->currency_format($tongtien) ?></td>
                    </tr>
            <?php
                }
            }
            ?>

            <tr>
                <td colspan="4" class="tong">Tổng cộng</td>
                <td class="cotSo"><?php echo $fm->currency_format($result_order['price']) ?></td>
            </tr>
        </table>
        <div class="footer-left"><br />
            Khách hàng </div>
        <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
        ?>
        <div class="footer-right"> Hà Nội, ngày <?php echo date("d") ?> tháng <?php echo date("m") ?> năm <?php echo date("Y") ?> <br />
            Nhân viên </div>
    </div>
</body> 
</html>
<?php include './inc/header.php'; ?>

<?php
// gọi class category
$cart = new cart();
$fm = new Format();
?>

<?php
if (isset($_GET['order_id']) AND  $_GET['order_id'] != NULL) 
{
    $id = $_GET['order_id'];
    $cancel_order = $cart ->cancel_order($id);
    if (isset($cancel_order))
    {
        echo $cancel_order;
    }
} 
else 
{
    //echo "Lỗi ko nhận đc id và id là rỗng";
}
?>


<link rel="stylesheet" type="text/css" href="css/product_list.css" media="screen" />

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <a href="danhmucsp_add.php"><button type="button" class="btn btn-outline-success" style="margin-bottom : 20px"><i class="bi bi-plus-lg"></i>&nbsp Thêm đơn hàng OFFLINE</button></a> -->
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text_center" id="dataTable" width="100%" cellspacing="0">
                    <colgroup>
                        <col style="width:7%">
                        <col style="width:13%">
                        <col style="width:25%">
                        <col style="width:12%">
                        <col style="width:12%">
                        <col style="width:10%">
                        <col style="width:10%">
                        <col style="width:18%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>ID đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Số lượng sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>Xử lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $order_list = $cart->get_order_with_in4();
                        $i = 0;
                        if ($order_list) {
                            while ($result = $order_list->fetch_assoc()) {
                                $i++;
                        ?>

                                <tr>
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['ho'] .' '. $result['ten'] ?></td>
                                    <td><?php echo $result['address'] ?></td>
                                    <td><?php echo $result['phone'] ?></td>
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
                                        }
                                        else if ($status == 2) {
                                            echo "<div style='color:blue'>
                                            <i class='bi bi-truck'></i>
                                            Đang giao hàng
                                            </div>";
                                        }
                                        else if ($status == 3)
                                        {
                                            echo "<div style='color:green'>
                                            <i class='bi bi-box'></i>
                                            Đã giao hàng
                                            </div>";
                                        }
                                        else
                                        {
                                            echo "<div style='color:red'>
                                            <i class='bi bi-x-lg'></i>
                                            Đã hủy
                                            </div>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><?php echo $fm->currency_format($result['price']);?></td>
                                    <td>
                                        <?php
                                            $id_1 =  $result['id'];
                                            if ($status == 0)
                                            {
                                                $mg = "<a href='?order_id=$id_1' ><button class='btn_1'><i class='bi bi-x'></i>Hủy đơn</button></a>";
                                                echo $mg;
                                            }
                                        ?>
                                        <a href="order_detail_backend.php?order=<?php echo $result['id'];?>">
                                            <button class="btn_2"><i class="bi bi-list"></i>Xử lý</i></button>
                                        </a>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Số lượng sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>Xử lý</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Load jqury -->
<?php include 'inc/footer.php'; ?>
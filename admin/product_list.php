<?php include 'inc/header.php'; ?>
<?php include '../class/product.php';  ?>
<?php require_once '../helpers/format.php'; ?>

<?php
    $pd = new product();
    $fm = new Format();
?>
<!-- Hàm xóa sản phẩm -->
<?php
if (isset($_GET['product_id']) AND  $_GET['product_id'] != NULL) 
{
    $id = $_GET['product_id'];
    echo $id;
    $delProduct = $pd->del_product($id);
} 
else 
{
    //echo "Lỗi ko nhận đc id và id là rỗng";
}
?>
<!-- Css và js của bảng -->
<!-- css wwebmvc -->
<!-- <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" /> -->
<!-- BEGIN: load jquery -->
<link rel="stylesheet" type="text/css" href="css/product_list.css" media="screen" />

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text_center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width:10%">ID Sản phẩm</th>
                            <th style="width:35%">Tên sản phẩm</th>
                            <th>Giá gốc</th>
                            <th>Giá khuyến mãi</th>
                            <th>Tồn kho</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Ngày tạo</th>
                            <th>Xử lý</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá gốc</th>
                            <th>Giá khuyến mãi</th>
                            <th>Tồn kho</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Ngày tạo</th>
                            <th>Xử lý</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $pdlist = $pd->show_product_list();
                        $i = 0;
                        if ($pdlist) {
                            while ($result = $pdlist->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?php echo $result['product_id']; ?></td>
                                    <td><?php echo $result['tensp_shortcut']; ?></td>
                                    <td><?php echo $fm->currency_format($result['price']); ?></td>
                                    <td><?php echo $fm->currency_format($result['price_discount']); ?></td>
                                    <td><?php echo $result['tonkho']; ?></td>
                                    <td><img class="image_product" src="./uploads/<?php echo $result['image'];?>"></td>
                                    <td><?php echo $result['time_created']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="?product_id=<?php echo $result['product_id'] ?>">
                                            <button class="btn_1"><i class="bi bi-x">Xóa</i></button>
                                        </a>
                                        <a href="productedit.php?product_id=<?php echo $result['product_id']?>">
                                            <button class="btn_2"><i class="bi bi-pencil">Sửa</i></button>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
<!-- Load jqury -->
<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
<script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
<script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
<script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- END: load jquery -->
<script type="text/javascript" src="js/table/table.js"></script>
<script src="js/setup.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        setSidebarHeight();
    });
</script>

<!-- Load jqury -->
<?php include 'inc/footer.php'; ?>
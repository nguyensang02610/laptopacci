<?php include 'inc/header.php'; ?>
<?php include '../class/nhanvien.php';  ?>
<?php require_once '../helpers/format.php'; ?>

<?php
$fm = new Format();
$nv = new nhanvien();
?>
<!-- Hàm xóa sản phẩm -->
<?php
if (isset($_GET['nhanvien_id']) AND $_GET['nhanvien_id'] != NULL) {
    $id = $_GET['nhanvien_id'];
    $delete_nv  = $nv->delete_nhanvien($id);
    if (isset($delete_nv))
    {
        echo $delete_nv;
    }
} else {
    //echo "Lỗi ko nhận đc id và id là rỗng";
}
?>
<!-- Css và js của bảng -->

<link rel="stylesheet" type="text/css" href="css/product_list.css" media="screen" />

<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="nhanvien_add.php"><button type="button" class="btn btn-outline-success" style="margin-bottom : 20px"><i class="bi bi-plus-lg"></i>&nbsp Thêm mới nhân viên</button></a>
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách nhân viên</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text_center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <colgroup>
                            <col style="width:7%">
                            <col style="width:13%">
                            <col style="width:25%">
                            <col style="width:12%">
                            <col style="width:12%">
                        </colgroup>
                        <tr>
                            <th>ID</th>
                            <th>Tên nhân viên</th>
                            <th>Địa chỉ</th>
                            <th>Ngày sinh</th>
                            <th>Chức vụ</th>
                            <th>Ảnh</th>
                            <th>Số điện thoại</th>
                            <th>Thông tin</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên nhân viên</th>
                            <th>Địa chỉ</th>
                            <th>Ngày sinh</th>
                            <th>Chức vụ</th>
                            <th>Ảnh</th>
                            <th>Số điện thoại</th>
                            <th>Thông tin</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $nhanvien_list= $nv->show_all_nhanvien();
                        if ($nhanvien_list) {
                            while ($result = $nhanvien_list->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td>#<?php echo $result['id']; ?></td>
                                    <td><?php echo $result['hoten']; ?></td>
                                    <td><?php echo $result['diachi']; ?></td>
                                    <td><?php echo $result['ngaysinh']; ?></td>
                                    <td><?php echo $result['chucvu']; ?></td>
                                    <td><img class="image_product" src="./uploads/nhanvien/<?php echo $result['image']; ?>"  ></td>
                                    <td><?php echo $result['phone']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="?nhanvien_id=<?php echo $result['id'] ?>">
                                            <button class="btn_1"><i class="bi bi-x">Xóa</i></button>
                                        </a>
                                        <a href="nhanvien_edit.php?nhanvien_id=<?php echo $result['id'] ?>">
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
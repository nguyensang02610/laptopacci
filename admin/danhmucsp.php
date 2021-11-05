<?php include './inc/header.php'; ?>
<?php include '../class/brand.php'; ?>

<?php
// gọi class category
    $brand = new brand();
?>

<?php
    if (isset($_GET['brand_id']) AND  $_GET['brand_id'] != NULL) 
    {
        //echo "<h2>Bạn vừa bấm nút xóa</h2>";
        $id = $_GET['brand_id']; // Lấy catid trên host
        $delBrand = $brand->del_brand($id);
    } 
    else 
    {
        //echo "Lỗi ko nhận đc id và id là rỗng";
    }
?>

<?php
    if (isset($delBrand))
    {
        echo $delBrand;
    }
?>

<link rel="stylesheet" type="text/css" href="css/product_list.css" media="screen" />

<div class="container-fluid">
    <!-- Page Heading -->
    <a href="danhmucsp_add.php"><button type="button" class="btn btn-outline-success" style="margin-bottom : 20px"><i class="bi bi-plus-lg"></i>&nbsp Thêm danh mục mới</button></a>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
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
                            <th style="width:10%">ID danh mục</th>
                            <th style="width:20%">Tên danh mục</th>
                            <th style="width:23%">Hình ảnh</th>
                            <th style="width:23%">Banner nhãn hàng</th>
                            <th style="width:18%">Ngày tạo</th>
                            <th>Xử lý</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Banner nhãn hàng</th>
                            <th>Ngày tạo</th>
                            <th>Xử lý</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $brand_list = $brand->show_brand();
                        $i = 0;
                        if ($brand_list) {
                            while ($result = $brand_list->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?php echo $result['brand_id']; ?></td>
                                    <td><?php echo $result['brand_name']; ?></td>
                                    <td><img class="image_product-1" src="./uploads/brand_image/<?php echo $result['image']; ?>"></td>
                                    <td><img class="image_product-2" src="./uploads/brand_image/<?php echo $result['banner_image']; ?>"></td>
                                    <td><?php echo $result['date_create']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="?brand_id=<?php echo $result['brand_id'] ?>">
                                            <button class="btn_1"><i class="bi bi-x">Xóa</i></button>
                                        </a>
                                        <a href="danhmucsp_edit.php?brand_id=<?php echo $result['brand_id'] ?>">
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

<!-- Load jqury -->
<?php include 'inc/footer.php'; ?>
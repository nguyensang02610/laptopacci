<?php include './inc/header.php'; ?>
<?php include '../class/brand.php'; ?>

<?php
// gọi class brand
$brand = new brand();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $insert_brand = $brand->insert_brand($_POST, $_FILES);
}
?>
<link rel="stylesheet" href="./css/product_add.css">

<div>
    <form class="needs-validation" novalidate="" method="post" action="" enctype="multipart/form-data">
        <div class="add_form">
            <h4 class="mb-3">Thêm mới danh mục sản phẩm</h4>
            <div class="row g-3">
                <!-- Tên sản phẩm -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Tên danh mục sản phẩm</label>
                        <input type="text" name="brand_name" class="form-control" placeholder="" required="">
                        <br>
                        <!-- Ảnh 1 -->
                        <div class="input_image">
                            <div class="upload_file">
                                <label for="id_image" class="form-label">Ảnh bìa</label>
                                <br>
                                <input type="file" name="image" onchange="preview_image_10(this);">
                            </div>
                            <div>
                                <img id="preview_10" src="#" alt="Ảnh bìa">
                            </div>
                        </div>
                        <br>
                        <div class="input_image">
                            <div class="upload_file">
                                <label for="id_image" class="form-label">Ảnh Banner</label>
                                <br>
                                <input type="file" name="img_2" onchange="preview_image_11(this);">
                            </div>
                            <div >
                                <img id="preview_11" src="#" alt="Ảnh banner">
                            </div>
                        </div>
                        <input class=" btn btn-primary btn" value="Thêm danh mục" type="submit" style="margin-top:50px;"></input>
                        <!-- Ảnh 1 -->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
if (isset($insert_brand)){
    echo $insert_brand;
}
?>
<script src="./js/product_add.js"></script>
<?php include './inc/footer.php'; ?>
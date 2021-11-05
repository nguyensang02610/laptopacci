<?php include 'inc/header.php'; ?>
<?php include '../class/brand.php'; ?>

<?php
$brand = new brand();
if (isset($_GET['brand_id']) and $_GET['brand_id'] == NULL) {
    //echo "<script> alert ('Ko nhận đc id sp') ;</script>";
    echo "<script> window.location = 'danhmucsp.php' </script>";
} else {
    $id = $_GET['brand_id']; // Lấy productid trên host  
    //echo $id;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])) {
    $updateBrand = $brand->update_brand($_POST, $id); // hàm check catName khi submit lên
}
?>

<div>
    <?php
    $get_brand_by_id = $brand->getbrandbyId($id);
    if ($get_brand_by_id) {
        while ($result_brand = $get_brand_by_id->fetch_assoc()) {
    ?>
            <form class="needs-validation" novalidate="" method="post" action="" enctype="multipart/form-data">
                <div class="add_form">
                    <h4 class="mb-3">Sửa danh mục sản phẩm</h4>
                    <div class="row g-3">
                        <!-- Tên sản phẩm -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Tên danh mục sản phẩm</label>
                                <input type="text" name="brand_name" class="form-control" placeholder="" value="<?php echo $result_brand['brand_name'] ?>">
                                <br>
                                <!-- Ảnh 1 -->
                                <div class="input_image">
                                    <div class="upload_file">
                                        <label for="id_image" class="form-label">Ảnh bìa</label>
                                        <br>
                                        <input type="file" name="image" onchange="preview_image_10(this);">
                                    </div>
                                    <div>
                                        <img id="preview_10" src="uploads/brand_image/<?php echo $result_brand['image'] ?>" alt="Ảnh bìa" width=360>
                                    </div>
                                </div>
                                <br>
                                <div class="input_image">
                                    <div class="upload_file">
                                        <label for="id_image" class="form-label">Ảnh Banner</label>
                                        <br>
                                        <input type="file" name="img_2" onchange="preview_image_11(this);">
                                    </div>
                                    <div>
                                        <img id="preview_11" src="uploads/brand_image/<?php echo $result_brand['banner_image']  ?>" alt="Ảnh banner" width=800>
                                    </div>
                                </div>
                                <input class=" btn btn-primary btn" value="Sửa danh mục" type="submit" style="margin-top:50px;"></input>
                                <!-- Ảnh 1 -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    <?php
        }
    }
    ?>
    <?php
        if (isset($updateBrand)) {
            echo $updateBrand;
        }
    ?>
</div>


<link rel="stylesheet" href="./css/product_add.css">

<script src="./js/product_add.js"></script>
<?php include './inc/footer.php'; ?>
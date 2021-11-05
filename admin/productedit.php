<?php include 'inc/header.php'; ?>
<?php include '../class/product.php';  ?>
<?php include '../class/brand.php';  ?>
<?php include '../class/hedieuhanh.php';  ?>

<?php
    $pd = new product();
    if (isset($_GET['product_id']) AND $_GET['product_id'] == NULL) {
        //echo "<script> alert ('Ko nhận đc id sp') ;</script>";
        echo "<script> window.location = 'product_list.php' </script>";
    } 
    else 
    {
        $id = $_GET['product_id']; // Lấy productid trên host
        //echo $id;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit']))
    {
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST và thực hiện hàm update sản phẩm trong class product
        $updateProduct = $pd -> update_product($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
?>
<link rel="stylesheet" href="./css/product_add.css">
<!-- Js và csss priview ảnh -->
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<!-- Js và csss priview ảnh -->
    <div>
        <?php
        $get_product_by_id = $pd->show_product_byId($id);
        if ($get_product_by_id) {
            while ($result_product = $get_product_by_id->fetch_assoc()) {
                # code...
        ?>
            <form class="needs-validation" method="POST" action="" enctype="multipart/form-data" style="display: flex;">
                <div class="add_form">
                    <h4 class="mb-3">Sửa thông tin sản phẩm</h4>

                    <div class="row g-3">
                        <!-- Tên sản phẩm -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Tên sản phẩm</label>
                                <input type="text" name="tensp" class="form-control" placeholder="" value="<?php echo $result_product['tensp'] ?>"  >

                            </div>
                            <!-- Tên rút gọn sản phẩm -->
                            <div class="col-xl-4 block_input">
                                <label for="tensp_shortcut" class="form-label">Tên rút gọn sản phẩm</label>
                                <input type="text" class="form-control" name="tensp_shortcut" placeholder="" value="<?php echo $result_product['tensp_shortcut'] ?>"  >
                                
                            </div>
                        </div>
                        <!-- Brand -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="price" class="form-label">Thương hiệu sản phẩm</label>
                                <select class="form-select" name="brand" aria-label="Default select example">
                                    <!-- <option></option> -->
                                    <?php
                                    $brand = new brand();
                                    $brand_list = $brand->show_brand();
                                    if ($brand_list) {
                                        while ($result = $brand_list->fetch_assoc()) {

                                    ?>
                                    <option 
                                    <?php
                                        if ($result['brand_name'] == $result_product['brand'])
                                        {
                                            echo 'selected';
                                        }
                                    ?>
                                    value="<?php echo $result['brand_name'];?>"> 
                                    <?php echo $result['brand_name']?>
                                    </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- Vế 1 -->
                                </select>
                            </div>
                        </div>
                        <!-- Gía + số lượng nhập cho sp -->
                        <div class="input_product">
                            <div class="col-md-3 block_input">
                                <label for="price" class="form-label">Giá gốc sp</label>
                                <input type="number" id="numbers" class="form-control"  name="price" placeholder="" value="<?php echo $result_product['price'] ?>"  >

                            </div>
                            <!-- Gía giảm -->
                            <div class="col-md-3 block_input">
                                <label for="price_discount" class="form-label">Giá Sale</label>
                                <input type="number" id="numbers" class="form-control numbers" name="price_discount" placeholder="" value="<?php echo $result_product['price_discount']; ?>"  >

                            </div>
                            <!-- SL Nhập -->
                            <div class="col-md-2 block_input">
                                <label for="sl_nhap" class="form-label">Số lượng nhập</label>
                                <input type="number" class="form-control"  name="sl_nhap" placeholder="" value="<?php echo $result_product['sl_nhap'] ?>" >

                            </div>
                        </div>
                        <!-- Hệ điều hành -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Hệ điều hành</label>
                                <select class="form-select" name="hedieuhanh" aria-label="Default select example">
                                    <!-- <option></option> -->
                                    <?php
                                    $window = new hedieuhanh();
                                    $window_list = $window -> show_hdh();
                                    if ($window_list) 
                                    {
                                        while ($result = $window_list->fetch_assoc()) {

                                    ?>
                                    <option 
                                    <?php
                                        if ($result['hdh_name'] === $result_product['hedieuhanh'])
                                        {
                                            echo 'selected';
                                        }
                                    ?>
                                    value="<?php echo $result['hdh_name'];?>"> 
                                    <?php echo $result['hdh_name']?>
                                    </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Tên CPU -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Tên CPU</label>
                                <input type="text" class="form-control" name="cpu" placeholder="" value="<?php echo $result_product['cpu'] ?>"  >

                            </div>
                            <!-- Tên rút gọn sản phẩm -->
                            <div class="col-xl-4 block_input">
                                <label for="tensp_shortcut" class="form-label">Tên CPU rút gọn</label>
                                <input type="text" class="form-control" name="cpu_shortcut" placeholder="" value="<?php echo $result_product['cpu_shortcut'] ?>"  >

                            </div>
                        </div>
                        <!-- VGA CARD MÀN HÌNH -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Card màn hình</label>
                                <input type="text" class="form-control" name="gpu" placeholder="" value="<?php echo $result_product['gpu'] ?>"  >

                            </div>
                            <!-- Tên rút gọn sản phẩm -->
                            <div class="col-xl-4 block_input">
                                <label for="tensp_shortcut" class="form-label">Tên Card màn hình rút gọn</label>
                                <input type="text" class="form-control" name="gpu_shortcut" placeholder="" value="<?php echo $result_product['gpu_shortcut'] ?>"  >

                            </div>
                        </div>
                        <!-- RAM -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">RAM</label>
                                <input type="text" class="form-control" name="ram" placeholder="" value="<?php echo $result_product['ram'] ?>"  >

                            </div>
                            <!-- Tên rút gọn sản phẩm -->
                            <div class="col-xl-4 block_input">
                                <label for="tensp_shortcut" class="form-label">Tên RAM rút gọn</label>
                                <input type="text" class="form-control" name="ram_shortcut" placeholder="" value="<?php echo $result_product['ram_shortcut'] ?>"  >

                            </div>
                        </div>
                        <!-- Ổ CỨNG SSD -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Thông số ổ cứng</label>
                                <input type="text" class="form-control" name="ssd" placeholder="" value="<?php echo $result_product['ssd'] ?>"  >

                            </div>
                            <!-- Tên rút gọn sản phẩm -->
                            <div class="col-xl-4 block_input">
                                <label for="tensp_shortcut" class="form-label">Thông số ổ cứng rút gọn</label>
                                <input type="text" class="form-control" name="ssd_shortcut" placeholder="" value="<?php echo $result_product['ssd_shortcut'] ?>"  >

                            </div>
                        </div>
                        <!-- Màn hình -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Thông số màn hình</label>
                                <input type="text" class="form-control" name="manhinh" placeholder="" value='<?php echo $result_product["manhinh"] ?>'  >

                            </div>
                            <!-- Tên rút gọn sản phẩm -->
                            <div class="col-xl-4 block_input">
                                <label for="tensp_shortcut" class="form-label">Thông số màn hình rút gọn</label>
                                <input type="text" class="form-control" name="manhinh_shortcut" placeholder="" value='<?php echo $result_product["manhinh_shortcut"] ?>'  >

                            </div>
                        </div>
                        <!-- Wifi -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Kết nối mạng</label>
                                <input type="text" class="form-control" name="wifi" placeholder="" value="<?php echo $result_product['wifi'] ?>"  >

                            </div>
                        </div>
                        <!-- Bàn phím -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Thông số bàn phím</label>
                                <input type="text" class="form-control" name="banphim" placeholder="" value="<?php echo $result_product['banphim'] ?>"  >

                            </div>
                        </div>
                        <!-- Kích thước -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Kích thước</label>
                                <input type="text" class="form-control" name="kichthuoc" placeholder="" value="<?php echo $result_product['kichthuoc'] ?>"  >

                            </div>
                        </div>
                        <!-- Trọng lượng -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Trọng lượng</label>
                                <input type="text" class="form-control" name="trongluong" placeholder="" value="<?php echo $result_product['trongluong'] ?>"  >

                            </div>
                        </div>
                        <!-- Mô tả -->
                        <div class="input_product">
                            <div class="col-xl-7 block_input">
                                <label for="firstName" class="form-label">Mô tả</label>
                                <!-- <input type="text" class="form-control" id="firstName" placeholder="" value=""  > -->
                                <textarea name="description" class="txt_desci"><?php echo $result_product['description'] ?></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="image_input_form">
                    <h4 class="mb-3">Hình ảnh sản phẩm</h4>
                    <!-- Ảnh bìa -->
                    <div class="input_image">
                        <div class="upload_file">
                            <label for="id_image" class="form-label">Ảnh bìa sản phẩm</label>
                            <br>
                            <input type="file" name="image" onchange="preview_thumbail(this);">
                        </div>
                        <div class="preview_image">
                            <img id="preview_img" src="./uploads/<?php echo $result_product['image'] ?>" alt="Ảnh bìa">
                        </div>
                    </div>
                    <!-- Ảnh nội dung 1 -->
                    <div class="input_image">
                        <div class="upload_file">
                            <label for="id_image" class="form-label">Ảnh mô tả 1</label>
                            <br>
                            <input type="file" name="img_1" onchange="preview_image_1(this);">
                        </div>
                        <div class="preview_image">
                            <img id="preview_1" src="./uploads/<?php echo $result_product['img_1'] ?>" alt="Ảnh mô tả 1">
                        </div>
                    </div>
                    <!-- Ảnh nội dung 2 -->
                    <div class="input_image">
                        <div class="upload_file">
                            <label for="id_image" class="form-label">Ảnh mô tả 2</label>
                            <br>
                            <input type="file" name="img_2" onchange="preview_image_2(this);">
                        </div>
                        <div class="preview_image">
                            <img id="preview_2" src="./uploads/<?php echo $result_product['img_2'] ?>" alt="Ảnh mô tả 2">
                        </div>
                    </div>
                    <!-- Ảnh nội dung 3 -->
                    <div class="input_image">
                        <div class="upload_file">
                            <label for="id_image" class="form-label">Ảnh mô tả 3</label>
                            <br>
                            <input type="file" name="img_3" onchange="preview_image_3(this);">
                        </div>
                        <div class="preview_image">
                            <img id="preview_3" src="./uploads/<?php echo $result_product['img_3'] ?>" alt="Ảnh mô tả 3">
                        </div>
                    </div>
                    <!-- Ảnh nội dung 4 -->
                    <div class="input_image">
                        <div class="upload_file">
                            <label for="id_image" class="form-label">Ảnh mô tả 4</label>
                            <br>
                            <input type="file" name="img_4" onchange="preview_image_4(this);">
                        </div>
                        <div class="preview_image">
                            <img id="preview_4" src="./uploads/<?php echo $result_product['img_4'] ?>" alt="Ảnh mô tả 4">
                        </div>
                    </div>
                    <!-- Ảnh nội dung 5 -->
                    <div class="input_image">
                        <div class="upload_file">
                            <label for="id_image" class="form-label">Ảnh mô tả 5</label>
                            <br>
                            <input type="file" name="img_5" onchange="preview_image_5(this);">
                        </div>
                        <div class="preview_image">
                            <img id="preview_5" src="./uploads/<?php echo $result_product['img_5'] ?>" alt="Ảnh mô tả 5">
                        </div>
                    </div>
                    <!-- Ảnh nội dung 6 -->
                    <div class="input_image">
                        <div class="upload_file">
                            <label for="id_image" class="form-label">Ảnh mô tả 6</label>
                            <br>
                            <input type="file" name="img_6" onchange="preview_image_6(this);">
                        </div>
                        <div class="preview_image">
                            <img id="preview_6" src="./uploads/<?php echo $result_product['img_6'] ?>" alt="Ảnh mô tả 6">
                        </div>
                    </div>
                    <input class="w-25 btn btn-primary btn" value="Sửa sản phẩm" type="submit" style="margin-top:50px;"></input>
                    <?php
                        if (isset($updateProduct)) {
                            echo $updateProduct;
                        }
                    ?>
                </div>
            </form>
    <?php
        }
        }
    ?>
    </div>
<script src="https://cdn.tiny.cloud/1/jhe2xt88y8r5djtdzpsbs22ugp7iaorihbp3jv36d9awtcmw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>
<script src="./js/product_add.js"></script>
<?php include './inc/footer.php'; ?>
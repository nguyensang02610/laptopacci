<?php include './inc/header.php'; ?>
<?php include '../class/brand.php'; ?>
<?php include '../class/product.php'; ?>
<?php include '../class/hedieuhanh.php'; ?>
<?php
    // gọi class product
    $pd = new product();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertProduct = $pd -> insert_product($_POST, $_FILES); // hàm check catName khi submit lên
    }
?>

 <?php
    $brand = new brand();
    $hdh = new hedieuhanh();
 ?> 
<link rel="stylesheet" href="./css/product_add.css">
<!-- Js và csss priview ảnh -->
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<!-- Js và csss priview ảnh -->
<div>
    <form class="needs-validation" novalidate="" method="post" action="" enctype="multipart/form-data" style="display: flex;">
        <div class="add_form">
            <h4 class="mb-3">Thêm mới sản phẩm</h4>
            <div class="row g-3">
                <!-- Tên sản phẩm -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="tensp" class="form-control" placeholder=""  required="">
                          
                    </div>
                    <!-- Tên rút gọn sản phẩm -->
                    <div class="col-xl-4 block_input">
                        <label for="tensp_shortcut" class="form-label">Tên rút gọn sản phẩm</label>
                        <input type="text" class="form-control" name="tensp_shortcut" placeholder=""  required="">
                         
                    </div>
                </div>
                <!-- Brand -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="price" class="form-label">Danh mục sản phẩm</label>
                        <select class="form-select" name="brand" aria-label="Default select example">
                        <?php 
                            $brandlist = $brand->show_brand();
                            if($brandlist)
                            {
                                while ($result = $brandlist->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['brand_name'] ?>"><?php echo $result['brand_name'] ?></option>
                            
                        <?php 
                            }
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <!-- Gía + số lượng nhập cho sp -->
                <div class="input_product">
                    <div class="col-md-3 block_input">
                        <label for="price" class="form-label">Giá gốc sp</label>
                        <input type="number" class="form-control"  name="price" placeholder="" >
                         
                    </div>
                    <!-- Gía giảm -->
                    <div class="col-md-3 block_input">
                        <label for="price_discount" class="form-label">Giá Sale</label>
                        <input type="number" class="form-control"  name="price_discount" placeholder="" >
                         
                    </div>
                    <!-- SL Nhập -->
                    <div class="col-md-2 block_input">
                        <label for="sl_nhap" class="form-label">Số lượng nhập</label>
                        <input type="number" class="form-control " step="100000" name="sl_nhap" placeholder="" value="" required="">
                         
                    </div>
                </div>
                <!-- Hệ điều hành -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Hệ điều hành</label>
                        <select class="form-select" name="hedieuhanh" aria-label="Default select example">
                        <?php 
                            $hdh_list = $hdh -> show_hdh();
                            if($hdh_list)
                            {
                                while ($result = $hdh_list->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['hdh_name'] ?>"><?php echo $result['hdh_name'] ?></option>
                            
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
                        <input type="text" class="form-control" name="cpu" placeholder="" >  
                    </div>
                    <!-- Tên rút gọn sản phẩm -->
                    <div class="col-xl-4 block_input">
                        <label for="tensp_shortcut" class="form-label">Tên CPU rút gọn</label>
                        <input type="text" class="form-control" name="cpu_shortcut" placeholder="">
                         
                    </div>
                </div>
                <!-- VGA CARD MÀN HÌNH -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Card màn hình</label>
                        <input type="text" class="form-control" name="gpu" placeholder="" >
                          
                    </div>
                    <!-- Tên rút gọn sản phẩm -->
                    <div class="col-xl-4 block_input">
                        <label for="tensp_shortcut" class="form-label">Tên Card màn hình rút gọn</label>
                        <input type="text" class="form-control" name="gpu_shortcut" placeholder="" >
                         
                    </div>
                </div>
                <!-- RAM -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">RAM</label>
                        <input type="text" class="form-control" name="ram" placeholder="" >
                          
                    </div>
                    <!-- Tên rút gọn sản phẩm -->
                    <div class="col-xl-4 block_input">
                        <label for="tensp_shortcut" class="form-label">Tên RAM rút gọn</label>
                        <input type="text" class="form-control" name="ram_shortcut" placeholder="" >
                         
                    </div>
                </div>
                <!-- Ổ CỨNG SSD -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Thông số ổ cứng</label>
                        <input type="text" class="form-control" name="ssd" placeholder="" >
                          
                    </div>
                    <!-- Tên rút gọn sản phẩm -->
                    <div class="col-xl-4 block_input">
                        <label for="tensp_shortcut" class="form-label">Thông số ổ cứng rút gọn</label>
                        <input type="text" class="form-control" name="ssd_shortcut" placeholder="">
                         
                    </div>
                </div>
                <!-- Màn hình -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Thông số màn hình</label>
                        <input type="text" class="form-control" name="manhinh" placeholder="" >
                          
                    </div>
                    <!-- Tên rút gọn sản phẩm -->
                    <div class="col-xl-4 block_input">
                        <label for="tensp_shortcut" class="form-label">Thông số màn hình rút gọn</label>
                        <input type="text" class="form-control" name="manhinh_shortcut" placeholder="" >
                         
                    </div>
                </div>
                <!-- Wifi -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Kết nối mạng</label>
                        <input type="text" class="form-control" name="wifi" placeholder="" >
                          
                    </div>
                </div>
                <!-- Bàn phím -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Thông số bàn phím</label>
                        <input type="text" class="form-control" name="banphim" placeholder="" >
                          
                    </div>
                </div>
                <!-- Kích thước -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Kích thước</label>
                        <input type="text" class="form-control" name="kichthuoc" placeholder="" >
                          
                    </div>
                </div>
                <!-- Trọng lượng -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Trọng lượng</label>
                        <input type="text" class="form-control" name="trongluong" placeholder="" 
                        >
                          
                    </div>
                </div>
                <!-- Mô tả -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Mô tả</label>
                        <!-- <input type="text" class="form-control" id="firstName" placeholder="" value="" required=""> -->
                        <textarea name="description" class="txt_desci"></textarea>
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
                        <img id="preview_img" src="#" alt="Ảnh bìa">
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
                        <img id="preview_1" src="#" alt="Ảnh mô tả 1">
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
                        <img id="preview_2" src="#" alt="Ảnh mô tả 2">
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
                        <img id="preview_3" src="#" alt="Ảnh mô tả 3">
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
                        <img id="preview_4" src="#" alt="Ảnh mô tả 4">
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
                        <img id="preview_5" src="#" alt="Ảnh mô tả 5">
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
                        <img id="preview_6" src="#" alt="Ảnh mô tả 6">
                    </div>
                </div>
                <input class="w-25 btn btn-primary btn" value="Thêm sản phẩm" type="submit" style="margin-top:50px;"></input>
                <?php if(isset($insertProduct)){echo $insertProduct;}?>
            </div>
    </form>                        
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
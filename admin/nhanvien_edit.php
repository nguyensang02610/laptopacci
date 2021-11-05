<?php include 'inc/header.php'; ?>
<?php include '../class/nhanvien.php'; ?>

<?php
$nv = new nhanvien();
if (isset($_GET['nhanvien_id']) and $_GET['nhanvien_id'] == NULL) {
    //echo "<script> alert ('Ko nhận đc id sp') ;</script>";
    echo "<script> window.location = 'nhanvien.php' </script>";
} else {
    $id = $_GET['nhanvien_id']; // Lấy productid trên host  
    //echo $id;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])) {
    $updatenv = $nv->update_nhanvien($_POST, $id); // hàm check catName khi submit lên
}
?>

<div>
            <form class="needs-validation" novalidate="" method="post" action="" enctype="multipart/form-data">
                <div class="add_form">
                    <h4 class="mb-3">Sửa thông tin nhân viên</h4>
                    <div class="row g-3">
                        <!-- Tên sản phẩm -->
                        <div class="input_product" style="display: flex;">
                            <div class="col-xl-7 block_input">
                                <?php
                                $get_nv = $nv -> getnv_byId($id);
                                if ($get_nv) 
                                {
                                    while ($result = $get_nv->fetch_assoc()) {
                                ?>
                                <label for="firstName" class="form-label">Tên nhân viên</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $result['hoten']?>" required="">
                                <br>
                                <label for="firstName" class="form-label">Địa chỉ</label>
                                <input type="text" name="diachi" class="form-control" value="<?php echo $result['diachi']?>" required="">
                                <br>
                                <label for="firstName" class="form-label">Ngày sinh</label>
                                <input type="date" name="ngaysinh" class="form-control" value="<?php echo $result['ngaysinh']?>" required="">
                                <br>
                                <label for="firstName" class="form-label">Chức vụ</label>
                                <input type="text" name="chucvu" class="form-control" value="<?php echo $result['chucvu']?>" required="">
                                <br>
                                <label for="firstName" class="form-label">Quyền</label>
                                <input type="text" name="quyen" class="form-control" value="<?php echo $result['quyen']?>" required="">
                                <br>
                                <label for="firstName" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $result['phone']?>" required="">
                                <br>
                                <label for="firstName" class="form-label">Mật khẩu đăng nhập</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $result['password']?>" required="">
                                <br>
                                <input class=" btn btn-primary btn" value="Xác nhận sửa thông tin nhân viên" type="submit" style="margin-top:50px;"></input>
                                <!-- Ảnh 1 -->
                            </div>
                            <!-- Ảnh 1 -->
                            <div class="input_image">
                                    <div class="upload_file">
                                        <label for="id_image" class="form-label">Ảnh cá nhân</label>
                                        <br>
                                        <input type="file" name="image" onchange="preview_image_10(this);">
                                    </div>
                                    <div>
                                        <img id="preview_10" src="uploads/nhanvien/<?php echo $result['image'] ?>" alt="Ảnh bìa" width=360>
                                    </div>
                                    
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
    if (isset($updatenv)) {
        echo $updatenv;
    }
    ?>
</div>


<link rel="stylesheet" href="./css/product_add.css">

<script src="./js/product_add.js"></script>
<?php include './inc/footer.php'; ?>
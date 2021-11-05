<?php include './inc/header.php'; ?>
<?php include '../class/nhanvien.php'; ?>

<?php
// gọi class nhân viên
$nv = new nhanvien();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $insert_nv = $nv->insert_nhanvien($_POST);
    if (isset($insert_nv))
    {
        echo $insert_nv;
    }
}
?>

<link rel="stylesheet" href="./css/product_add.css">

<div>
    <form class="needs-validation" novalidate="" method="post" action="" enctype="multipart/form-data" style="display: flex;">
        <div class="add_form">
            <h4 class="mb-3">Thêm mới nhân viên</h4>
            <div class="row g-3">
                <!-- Tên sản phẩm -->
                <div class="input_product">
                    <div class="col-xl-7 block_input">
                        <label for="firstName" class="form-label">Tên nhân viên</label>
                        <input type="text" name="name" class="form-control" placeholder="" required="">
                        <br>
                        <label for="firstName" class="form-label">Địa chỉ</label>
                        <input type="text" name="diachi" class="form-control" placeholder="" required="">
                        <br>
                        <label for="firstName" class="form-label">Ngày sinh</label>
                        <input type="date" name="ngaysinh" class="form-control" placeholder="" required="">
                        <br>
                        <label for="firstName" class="form-label">Chức vụ</label>
                        <input type="text" name="chucvu" class="form-control" placeholder="" required="">
                        <br>
                        <label for="firstName" class="form-label">Quyền</label>
                        <input type="text" name="quyen" class="form-control" placeholder="" required="">
                        <br>
                        <label for="firstName" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" placeholder="" required="">
                        <br>
                        <label for="firstName" class="form-label">Mật khẩu đăng nhập</label>
                        <input type="text" name="password" class="form-control" placeholder="" required="">
                        <br>
                        <!-- Ảnh 1 -->
                        <div class="input_image">
                            <div class="upload_file">
                                <label for="id_image" class="form-label">Ảnh cá nhân</label>
                                <br>
                                <input type="file" name="image" onchange="preview_image_10(this);">
                            </div>
                            <div>
                                <img id="preview_10" src="#" alt="Ảnh bìa">
                            </div>
                        </div>
                        <br>
                        <input class=" btn btn-primary btn" value="Thêm nhân viên" type="submit" style="margin-top:50px;"></input>
                        <!-- Ảnh 1 -->
                    </div>
                </div>
            </div>
        </div>
        <div class="note">
            <h4 class="mb-3">Ghi chú mức phân quyền :</h4>
            <br>
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary"> 0 : Quản lý</li>
                <li class="list-group-item list-group-item-secondary">1 : Nhân viên </li>
                <li class="list-group-item list-group-item-success">2 : Thủ quỹ</li>
            </ul>
        </div>
    </form>
</div>

<script src="./js/product_add.js"></script>
<?php include './inc/footer.php'; ?>
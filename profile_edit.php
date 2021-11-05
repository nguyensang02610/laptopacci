<!--Call Header-->
<link rel="stylesheet" href="./css/profile_edit.css">
<?php include './include/header.php'; ?>
<title>Thông tin cá nhân</title>
<?php
$id_kh = Session::get('customer_id');
$thongtinkh = $cs->show_customers($id_kh);
$result = $thongtinkh->fetch_assoc();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])) {
  // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST và thực hiện hàm update sản phẩm trong class product
  $updateKH = $cs->update_customers($_POST, $id_kh); // hàm check catName khi submit lên
  if (isset($updateKH)) {
    echo $updateKH;
  }
}
?>

<div class="container rounded bg-white mt-5 mb-5">
  <div class="row" style="box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15)!important;">
    <div class="col-md-3 border-right">
      <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src="./img/banner.png" style="width:250px;margin-top:80px"></div>
    </div>
    <div class="col-md-8 border-right">
      <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="text-right">Cập nhật Thông tin cá nhân</h4>
          <form method="GET">
        </div>
        <div class="row mt-2">
          <div class="col-md-6"><label class="labels">Họ</label><input type="text" class="form-control" name="ho" value="<?php echo $result['ho'] ?>"></div>
          <div class="col-md-6"><label class="labels">Tên</label><input type="text" class="form-control" name="ten" value="<?php echo $result['ten'] ?>"></div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="text" class="form-control" name="phone" value="<?php echo $result['phone'] ?>"></div>
          <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" class="form-control" name="diachi" value="<?php echo $result['diachi'] ?>"></div>
          <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="email" value="<?php echo $result['email'] ?>"></div>
        </div>
        <div class="mt-5 text-center">
          <a href="change_password.php"><button class="btn btn-primary-1" type="button" style="margin-right: 20px;" onclick="document.getElementById('id01').style.display='block'">Đổi mật khẩu</button></a>
          <button class="btn btn-primary profile-button" type="submit">Lưu thông tin</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!--Call Footer-->
<?php include './include/footer.php'; ?>
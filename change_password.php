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
    $id_kh = Session::get('customer_id');
    $db = $cs->show_customers($id_kh);
	$result = $db->fetch_assoc();
    $ps = $result['password'];
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])) {
  // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST và thực hiện hàm update sản phẩm trong class product
  $changePassword = $cs->change_password($_POST,$id_kh,$ps); // hàm check catName khi submit lên
  if (isset($changePassword)) {
    echo $changePassword;
  }
}
?>

<!--Form đăng nhập-->
<div id="id01" class="modal_1">
  <form class="modal-content animate" method="post">
    <div class="container">
      <label for="text"><b>Nhập mật khẩu cũ</b></label>
      <input type="password" class="myInput" name="old_pass" required>

      <label for="password"><b>Nhập mật khẩu mới</b></label>
      <input type="password" class="myInput" name="new_pass" required>

      <label for="password"><b>Nhập lại mật khẩu</b></label>
      <input type="password" id="myInput" name="retype_new_pass" required>
      <button type="submit" class="button_1">Đổi mật khẩu</button>
    </div>
  </form>
</div>
<!--Form đăng nhập-->

<!--Call Footer-->
<?php include './include/footer.php'; ?>
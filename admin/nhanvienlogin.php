<?php
// gọi file adminlogin
include '../class/nhanvien_login.php';
?>
<?php
// gọi class adminlogin
$class = new nhanvien_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $login_check = $class->nhanvien_login($phone, $password); // hàm check ssdt and Pass khi submit lên
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/loading.css" rel="stylesheet">
<link href="css/nhanvien_login.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./js/loading.js"></script>

</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0" style="width: 1200px;margin: auto;">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <form method="POST">
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Số điện thoại</h6>
                            </label> <input class="mb-4" type="text" name="phone"> </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Mật khẩu</h6>
                            </label> <input type="password" name="password">
                        </div>
                        <div class="form-group">
                            <p style="color:red">
                                <?php
                                if (isset($login_check)) {
                                    echo $login_check;
                                }
                                ?>
                            </p>
                        </div>
                        <div class="row px-3 mb-4">
                        </div>
                        <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Đăng nhập</button> </div>
                    </form>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Chưa có tài khoản ? <a class="text-danger ">Liên hệ admin</a></small> </div>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
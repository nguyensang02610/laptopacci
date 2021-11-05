<!-- Xử lý php -->
<?php 
	include './include/header.php';
	// include 'inc/slider.php';
 ?>

<!-- Hàm kiểm tra đa login hay chưa -->
<?php
    $login_check = Session::get('customer_login');
    if ($login_check) 
    {
        echo "<script> window.location = 'home.php' </script>";
    }
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST);
    }
 ?>
<!-- Xử lý php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Form Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gradient p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Thông tin đăng kí</h2>
                    <!-- Form submit -->
                    <form method="POST">
                        <!-- Họ tên -->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Họ" name="ho">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Tên" name="ten">
                                </div>
                            </div>
                        </div>
                        <!-- email  -->
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Email" name="email">
                        </div>
                        <!-- mật khẩu  -->
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Mật khẩu" name="password">
                        </div>
                        <!-- Địa chỉ  -->
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Địa chỉ" name="diachi">
                        </div>
                        <!-- Số điện thoại  -->
                        <div class="row row-space">
                            <div>
                                <div class="input-group">
                                    <input class="input--style-2" type="tel" placeholder="Số điện thoại" name="phone">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-3">
                                <div class="input-group-1">
                                    <?php
                                    if (isset($insertCustomer))
                                        echo $insertCustomer;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Nút Submit  -->
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Đăng kí</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
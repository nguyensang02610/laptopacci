<?php
include "./library/session.php";
Session::init();
?>
<?php

include './library/database.php';
include './helpers/format.php';

spl_autoload_register(function ($class) {
    include_once "class/" . $class . ".php";
});
$br = new brand();
$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cs = new customer();
$product = new product();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/favicon.png" rel="icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/bootrap.css">
    <!-- MY CSS -->
    <link rel="stylesheet" href="./css/mycss.css">
    <link rel="stylesheet" href="./css/lienhe.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/loading.css">
    <!-- Loading icon-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/loading.js"></script>
</head>

<body>
    
    <!--Header-->
    <div class="load">
        <img src="./img/icons/cute-loading.gif">
    </div>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <nav class="navbar navbar-expand-xl navbar-light">
                        <div class="container-fluid">
                            <a href="./index.php" class="navbar-brand"><img src="./img/rog-logo@3x.png" alt="logo" class="img-fluid"></a>
                            <button class="navbar-toggler" style="background-color: red;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon" style="background-color: red;"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="./index.php">Trang chủ</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Sản phẩm
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <?php
                                            $brand_list = $br ->show_brand();
                                            if ($brand_list) {
                                                while ($result = $brand_list->fetch_assoc()) {

                                            ?>
                                                    <li><a class="dropdown-item" href="list_product_by_brand.php?brand=<?php echo $result['brand_name']?>"><?php echo $result['brand_name'] ?></a></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                    $login_check = Session::get('customer_login');
                                    if ($login_check == false) {
                                        echo '<li class="nav-item"><a class="nav-link" href="./register.php">Đăng kí thành viên</a></li>';
                                    } else {
                                        echo '<li class="nav-item"><a class="nav-link" href="order.php">Đơn hàng</a></li>';
                                    }
                                    ?>
                                    <!-- <li class="nav-item"><a class="nav-link" href="#">Đơn hàng</a></li> -->
                                    <li class="nav-item dropdown">
                                        <?php
                                        $login_check = Session::get('customer_login');
                                        if ($login_check == false) {
                                            echo '';
                                        } else {
                                            echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Thông tin
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                            <li><a class="dropdown-item" href="profile_edit.php">Sửa thông tin cá nhân</a></li>
                                                            <li><a class="dropdown-item" href="lienhe.php">Liên hệ</a></li>
                                                            <!-- <li><a class="dropdown-item" href="#">Menu 3</a></li> -->
                                                        </ul>';
                                        }
                                        ?>
                                        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Thông tin
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">Menu 1</a></li>
                                            <li><a class="dropdown-item" href="#">Menu 2</a></li>
                                            <li><a class="dropdown-item" href="#">Menu 3</a></li>
                                        </ul> -->
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-4 col-md-3">
                    <div class="header-search mt-2">
                        <div class="search-form">
                            <form method="post" action="product_search.php">
                                <div class="input-group">
                                    <input type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm">
                                    <div class="input-group-addon">
                                        <button type="submit" name="timkiem"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 cart-login">
                    <div class="float-end cart_1 mt-2" style="margin-right: 0px;">
                        <a href="cart.php">
                            <span class="number">
                                <?php
                                $check_cart = $ct->check_cart();
                                if ($check_cart) {
                                    $qty = Session::get("qty");
                                    echo $qty;
                                } else {
                                    echo '~';
                                }
                                ?>
                            </span>
                            <img class="img-fluid" src="./img/cart.png" alt="cart">
                            <span>Giỏ hàng</span>
                        </a>
                    </div>

                    <div class="float-end">
                        <?php
                        $login_check = Session::get('customer_login');
                        if ($login_check == false) {
                            echo '<a href="login.php"><button type="button" class="btn btn-light mt-2 btn-sm" style="color:black">Đăng nhập</button></a>';
                        } else {
                            echo '<a href="?customer_id=' . Session::get('customer_id') . '"><button type="button" class="btn btn-light mt-2 btn-sm" style="color:black">Đăng xuất</button></a>';
                        }
                        ?>
                        <!-- <button type="button" class="btn btn-light mt-2 btn-sm">Đăng nhập</button> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header-->
    <?php
    if (isset($_GET['customer_id'])) {
        session_destroy();
        echo "<script> window.location ='index.php'</script>";
        // $customer_id = $_GET['customer_id'];
        // $delCart = $ct->del_all_data_cart();
        // $delCompare = $ct->del_compare($customer_id);
        // session::destroy();
        // echo "<h2><center>Bạn đã nhấn vào nút đăng xuất</center></h2>";
    }
    ?>
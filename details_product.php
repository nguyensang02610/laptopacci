    <!-- Gọi header -->
    <?php include './include/header.php'; ?>
    <link rel="stylesheet" href="./css/chitietsanpham.css">
    <!--Lấy css của trang-->
    <title>Laptop Asus ROG Strix Scar 15 G533QM-HQ074T</title>
    <style>
        body {
            background-color: #ecedee;
            font-family: var(--bs-font-sans-serif);
        }

        .input-group {
            position: relative;
            margin-bottom: 32px;
            border-bottom: 1px solid #e5e5e5;
        }
    </style>
    <!--dIV 2-->
    <!-- Xử lý php lấy id sản phẩm -->
    <?php
    if (isset($_GET['product_id']) and $_GET['product_id'] == NULL) {
        //echo "<script> alert ('Ko nhận đc id sp') ;</script>";
        echo "<script> window.location = 'product_list.php' </script>";
    } else {
        $id = $_GET['product_id']; // Lấy productid trên host
    }
    ?>
    <!-- Php xử lý mua ngay-->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $insertCart = $ct->add_to_cart($id, $quantity);
    }
    ?>
    <!-- Php xử lý mua ngay-->
    <?php
    $class = new format();
    $getproduct = $product->getproductbyId($id); //lẤY THÔNG sản phẩm từ databasse
    $result = $getproduct->fetch_assoc();
    ?>
            <div class="container mt-5 .mb-5-self">
                <div class="card" style="display: block!important">
                    <div class="row g-0">
                        <div class="col-md-6 border-end">
                            <div class="d-flex flex-column justify-content-center">
                                <div class="main_image">
                                    <img src="./admin/uploads/<?php echo $result['img_1'] ?>" id="main_product_image" width="500" name="anh_1">
                                </div>
                                <div class="thumbnail_images">
                                    <ul id="thumbnail">
                                        <li><img onclick="changeImage(this)" src="./admin/uploads/<?php echo $result['img_1'] ?>" width="60" name="anh_1"></li>
                                        <li><img onclick="changeImage(this)" src="./admin/uploads/<?php echo $result['img_2'] ?>" width="60" name="anh_2"></li>
                                        <li><img onclick="changeImage(this)" src="./admin/uploads/<?php echo $result['img_3'] ?>" width="60" name="anh_3"></li>
                                        <li><img onclick="changeImage(this)" src="./admin/uploads/<?php echo $result['img_4'] ?>" width="60" name="anh_4"></li>
                                        <li><img onclick="changeImage(this)" src="./admin/uploads/<?php echo $result['img_5'] ?>" width="60" name="anh_5"></li>
                                        <li><img onclick="changeImage(this)" src="./admin/uploads/<?php echo $result['img_6'] ?>" width="60" name="anh_6"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 right-side">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="tensp"><?php echo $result['tensp'] ?></h3>
                                </div>
                                <h2 style="color: rgb(237, 0, 0) !important;font-weight: bold;"><?php echo $class->currency_format($result['price_discount']) ?></h2>
                                <h5 class="price" name="price"><?php echo $class->currency_format($result['price']) ?></h5>
                                <?php
                                        if ($result['tonkho']<=0)
                                        {
                                            echo "<button type='button' class='btn btn-danger'>Hết hàng</button>";
                                        }
                                        else
                                        {
                                            echo "<button type='button' class='btn btn-success'>Còn hàng</button>";
                                        }
                                    ?>
                                <div class="ratings">
                                    <!--Cấu hình chi tiết-->
                                    <ul>
                                        <li class="item">
                                            <i class="bi bi-check-circle-fill"> </i>
                                            <div class="item_left">
                                                <p>CPU:</p>
                                            </div>
                                            <div class="item_right">
                                                <p name="cpu"><?php echo $result['cpu'] ?></p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <i class="bi bi-check-circle-fill"> </i>
                                            <div class="item_left">
                                                <p>Hệ điều hành: </p>
                                            </div>
                                            <div class="item_right">
                                                <p name="hedieuhanh"><?php echo $result['hedieuhanh'] ?></p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <i class="bi bi-check-circle-fill"> </i>
                                            <div class="item_left">
                                                <p>GPU: </p>
                                            </div>
                                            <div class="item_right">
                                                <p name="gpu"><?php echo $result['gpu'] ?></p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <i class="bi bi-check-circle-fill"> </i>
                                            <div class="item_left">
                                                <p>RAM: </p>
                                            </div>
                                            <div class="item_right">
                                                <p name="ram"><?php echo $result['ram'] ?></p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <i class="bi bi-check-circle-fill"> </i>
                                            <div class="item_left">
                                                <p>SSD: </p>
                                            </div>
                                            <div class="item_right">
                                                <p name="ssd"><?php echo $result['ssd'] ?></p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <i class="bi bi-check-circle-fill"> </i>
                                            <div class="item_left">
                                                <p>Màn hình: </p>
                                            </div>
                                            <div class="item_right">
                                                <p name="manhinh"><?php echo $result['manhinh'] ?></p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <i class="bi bi-check-circle-fill"> </i>
                                            <div class="item_left">
                                                <p>Kích thước: </p>
                                            </div>
                                            <div class="item_right">
                                                <p name="kichthuoc"><?php echo $result['kichthuoc'] ?></p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <i class="bi bi-check-circle-fill"> </i>
                                            <div class="item_left">
                                                <p>Trọng lượng: </p>
                                            </div>
                                            <div class="item_right">
                                                <p name="trongluong"><?php echo $result['trongluong'] ?></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                        <form method="POST">
                            <!-- Thanh thêm số lượng -->
                            <div class="form-group" style="width:30%!important">
                                <label class="control-label">Thêm số lượng:</label>
                                <p style="margin-bottom: -10px"> &nbsp;</p>
                                <input id="colorful" class="form-control" name="quantity" type="number" value="1" min="1" max="10" />
                            </div>
                            <!-- Thanh thêm số lượng -->
                            <div class="buttons d-flex flex-row mt-5-self gap-3">
                                <!-- <button class="btn btn-outline-dark">MUA NGAY</button> -->
                                <?php   
                                $login_check = Session::get('customer_login');
                                    if ($login_check == false) {
                                        echo '<a href="login.php" target="_self"><button class="btn1 btn-dark">Đăng nhập trước khi mua hàng</button></a>';
                                    }
                                    elseif ($result['tonkho']<=0)
                                    {
                                        echo '<button disable class="btn btn-light">HẾT HÀNG</button>';
                                    }
                                    else
                                    {
                                        echo '<button class="btn btn-dark" type="submit" name="submit">THÊM GIỎ HÀNG</button>';
                                    }
                                    ?>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- chi tiết sản phẩm -->
            <div class="product_detail container mt-5-self-1  mb-5">
                <h3>CHI TIẾT SẢN PHẨM</h3>
                <?php echo $result['description']?>
            </div>
            <script src="./js/bootstrap-number-input.js"></script>
            <script>
                // Remember set you events before call bootstrapSwitch or they will fire after bootstrapSwitch's events
                $("[name='checkbox2']").change(function() {
                    if (!confirm('Do you wanna cancel me!')) {
                        this.checked = true;
                    }
                });

                $('#after').bootstrapNumber();
                $('#colorful').bootstrapNumber({
                    upClass: 'success',
                    downClass: 'danger'
                });
            </script>
            <!-- Gọi Footer-->
            <?php include "./include/footer.php" ?>
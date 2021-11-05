    <?php include './include/header.php'; ?>
    <title>LAPTOP GAMING ASUS</title>
    <link rel="stylesheet" href="css/laptopgaming.css">

    <!--Xử lý php-->
    <?php
    if (isset($_GET['brand']) and $_GET['brand'] == NULL) {
        //echo "<script> alert ('Ko nhận đc id sp') ;</script>";
        echo "<script> window.location = 'product_list.php' </script>";
    } else {
        $id_brand = $_GET['brand']; // Lấy productid trên host
    }
    ?>

    <!--DIV img-->
    <div class="imgheader">
        <?php
        $brand_name = $br->getbrandbyName($id_brand);
        if ($brand_name) {
            $image = $brand_name->fetch_assoc();
            $img = $image['banner_image'];
        }

        ?>
        <img src="./admin/uploads/brand_image/<?php echo $img ?>">
    </div>
    <!--DIV img-->
    <!--Div product-->
    <div class="wapper">
        <div class="div_products">
            <ul data-view="grid" data-bs-toggle="shop-products" class="products products list-unstyled row g-0 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4">

                <?php
                $list_product = $product->show_product_bybrand($id_brand);
                $i = 0;
                if ($list_product) {
                    while ($result = $list_product->fetch_assoc()) {
                        $i++;
                ?>
                        <li class="product type-product">
                            <div class="product_outer">
                                <div class="product-inner product-item__inner">
                                    <!-- Hình ảnh -->
                                    <a href="details_product.php?product_id=<?php echo $result['product_id'] ?>">
                                        <div class="product-thumbnail">
                                            <span class="sale">
                                                -
                                                <span id="giamgia" class="phan_tram">
                                                    <?php echo (int)((($result['price'] - $result['price_discount']) / $result['price']) * 100) ?>%
                                                </span>
                                            </span>
                                            <img alt="thumbail" width="300" height="300" src="./admin/uploads/<?php echo $result['image'] ?>" class="img_thumbail">
                                        </div>
                                        <div class="product_body">
                                            <div href="#">
                                                <h2 class="product_title"><?php echo $result['tensp'] ?></h2>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Hình ảnh -->
                                    <!-- Gía -->
                                    <div class="product_price">
                                        <div class="price_discount">
                                            <span class="giamgia" id="gia2">
                                                <?php echo $fm->currency_format($result['price_discount']) ?>
                                            </span>
                                            <a href="#" class="giohang" aria-label="Thêm vào giỏ hàng">
                                                <i class="bi bi-cart-plus-fill"></i>
                                            </a>
                                        </div>
                                        <div class="price_non-discount">
                                            <?php echo $fm->currency_format($result['price']) ?>
                                        </div>
                                    </div>
                                    <!-- Gía -->
                                    <!-- Cấu hình chi tiết -->
                                    <div style="display: block;width: 100%;">
                                        <div class="product_info">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="left_item"><img src="./img/icon/cpu.png" alt="cpu"></td>
                                                        <td class="right_item"><?php echo $result['cpu_shortcut'] ?></td>
                                                        <td class="left_item"><img src="./img/icon/gpu.png" alt="gpu"></td>
                                                        <td class="right_item"><?php echo $result['gpu_shortcut'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left_item"><img src="./img/icon/ram.png" alt="ram"></td>
                                                        <td class="right_item"><?php echo $result['ram_shortcut'] ?></td>
                                                        <td class="left_item"><img src="./img/icon/ssd.png" alt="ssd"></td>
                                                        <td class="right_item"><?php echo $result['ssd_shortcut'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left_item"><img src="./img/icon/weight.png" alt="weight"></td>
                                                        <td class="right_item"><?php echo $result['trongluong'] ?></td>
                                                        <td class="left_item"><img src="./img/icon/size.png" alt="size"></td>
                                                        <td class="right_item"><?php echo $result['manhinh_shortcut'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Cấu hình chi tiết -->
                                </div>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <!--Div product-->
    <!--Footer-->
    <?php include './include/footer.php'; ?>
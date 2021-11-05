<?php include './include/header.php'; ?>
<title>Tìm kiếm sản phẩm</title>
<link rel="stylesheet" href="css/laptopgaming.css">

<!--Xử lý php-->
<?php
//Xử lý php tìm kiếm
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tukhoa = $_POST['tukhoa'];
    $list_product = $product->search_product($tukhoa);
    $havesp = '<h2 class="havesp">Từ khóa : ' . $tukhoa . '</h2>';
}
?>
<?php
    if (isset($havesp)) {
        echo $havesp;
    }
?>
<!--Div product-->
<div class="wapper">
    <div class="div_products">
        <ul data-view="grid" data-bs-toggle="shop-products" class="products products list-unstyled row g-0 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4">
            <?php
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
            } else {
                $atler =  '<h2 class="txt_alter">Không có sản phẩm nào phù hợp với từ khóa.</h2>';
            }
            ?>
        </ul>
    </div>
</div>
<?php
if (isset($atler)) {
    echo $atler;
}
?>
<!--Div product-->
<!--Footer-->
<?php include './include/footer.php'; ?>
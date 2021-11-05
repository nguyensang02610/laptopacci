<?php include './include/header.php'; ?>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="./css/order_sus.css">

<?php
if (isset($_GET['order']) AND $_GET['order'] != NULL) {
    $id = $_GET['order'];
    $update_order = $ct -> order_susscess($id);
    if (isset($update_order))
    {
        echo $update_order;
    }
} else {
    //echo "Lỗi ko nhận đc id và id là rỗng";
}
?>

<div class="container contact-form">
    <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
    </div>
    <form method="post">
        <h3>Cám ơn bạn đã vì đã mua sắm tại website của chúng tôi<br>Hãy để lại góp ý phía bên dưới</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Gọi Footer-->
<?php include "./include/footer.php"; ?>v
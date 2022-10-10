function changeImage(element) {

    var main_prodcut_image = document.getElementById('main_product_image');
    main_prodcut_image.src = element.src;
}

document.addEventListener("DOMContentLoaded", function(event) {


    const cartButtons = document.querySelectorAll('.cart-button');

    cartButtons.forEach(button => {

        button.addEventListener('click', cartClick);

    });

    function cartClick() {
        let button = this;
        button.classList.add('clicked');
    }



});
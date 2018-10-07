// view basket
viewBasket = function(){
    if(localStorage.getItem("products") != ""){
        var carts = JSON.parse(localStorage.getItem("products"));
        var total = 0;
        var quantiy = 1;
        $.each( carts, function( key, value ) {
            total += (value.price*value.quantity);
            $( ".viewCart" ).append( "<tr><td><input type=\"hidden\" name=\"quantity[]\" value=\""+value.quantity+"\"/><input type=\"hidden\" name=\"price[]\" value=\""+value.price+"\"/><input type=\"hidden\" name=\"product_id[]\" value=\""+value.id+"\"/><image  src=\""+value.image+"\"></td><td>"+value.name+"</td><td>"+value.quantity+"</td><td>"+value.price+"</td><td><span class=\"badge\">"+(value.price*value.quantity)+"</span></td></tr>" );
            if(key+1 == carts.length)
                $( ".viewCart" ).append( "<tr><td>TOTAL</td><td colspan=\"3\" ></td><td><span  class=\"badge\">"+total+"</span></td></tr>" );
        });
    }
}
// clear basket items
clearBasket = function() {
    var arr = [];
    var radioValue = $("input[name='pay_type']:checked").val();
    localStorage.setItem("pay_type", radioValue);
    localStorage.setItem("products", JSON.stringify(arr));
}
//confirmation payment information
confirmPay = function() {
    window.location.replace("/payments/pay/"+localStorage.getItem("pay_type"));
    localStorage.setItem("pay_type", '');
}
$(".colorReq").change(function(){
    var attrId = $( ".colorReq option:selected" ).val();
    var content = '';
    $("#products").html("");
    $.ajax({url: "/products/index/"+attrId,
            dataType: 'json',
            success: function(result){
                console.log('attrId',attrId);
                console.log('json',result);
               for (var x = 0; x < result.length; x++) {
                    content +=  "<div class=\"item  col-xs-4 col-lg-4\"><div class=\"thumbnail\"><img class=\"group list-group-image\" src=\"/uploads/products/main/"+result[x].image+".jpg\" alt=\"\" /><div class=\"caption\"><h4 class=\"group inner list-group-item-heading\">"+result[x].name+"</h4><p class=\"group inner list-group-item-text\">"+result[x].small_desc+"</p><div class=\"row\"><div class=\"col-xs-12 col-md-6\"><p class=\"lead\">$"+result[x].price_gross+"</p></div><div class=\"col-xs-12 col-md-6\"><a class=\"btn btn-success my-cart-btn\" href=\"#\" data-id=\""+result[x].id+"\" data-name=\""+result[x].name+"\" data-summary=\""+result[x].small_desc+"\" data-price=\""+result[x].price_gross+"\" data-quantity=\"1\" data-image=\"/uploads/products/thumb/"+result[x].image+".jpg\">Add to Cart</a></div></div></div></div></div>";
                }
                $(content).appendTo("#products");
            }});
});


$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    viewBasket();

});
// managing for basket operations
$(function () {

    var goToCartIcon = function($addTocartBtn){
        var $cartIcon = $(".my-cart-icon");
        var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
        $addTocartBtn.prepend($image);
        var position = $cartIcon.position();
        $image.animate({
            top: position.top,
            left: position.left
        }, 500 , "linear", function() {
            $image.remove();
        });
    }

    $('.my-cart-btn').myCart({
        currencySymbol: '$',
        classCartIcon: 'my-cart-icon',
        classCartBadge: 'my-cart-badge',
        classProductQuantity: 'my-product-quantity',
        classProductRemove: 'my-product-remove',
        classCheckoutCart: 'my-cart-checkout',
        affixCartIcon: true,
        showCheckoutModal: true,
        numberOfDecimals: 2,
        cartItems: localStorage.getItem("products") != "" ? JSON.parse(localStorage.getItem("products")) : [],
        clickOnAddToCart: function($addTocart){

            goToCartIcon($addTocart);
        },
        afterAddOnCart: function(products, totalPrice, totalQuantity) {
            console.log("afterAddOnCart", products, totalPrice, totalQuantity);
            localStorage.setItem("products", JSON.stringify(products));
        },
        clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
            console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
        },
        checkoutCart: function(products, totalPrice, totalQuantity) {

            console.log('product',products);
            var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
            checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
            $.each(products, function(){

                checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
            });
            window.location.replace("/orders/view");
            console.log("checking out", products, totalPrice, totalQuantity);
        },
        getDiscountPrice: function(products, totalPrice, totalQuantity) {
            console.log("calculating discount", products, totalPrice, totalQuantity);
            return totalPrice * 1;
        }
    });

});
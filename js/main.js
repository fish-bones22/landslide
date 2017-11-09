
$(document).ready(function(){
    /*Popover*/
    $('[data-toggle="popover"]').popover({
        placement : 'right',
        trigger : 'hover'
    });
    $('[data-toggle="popover-cart"]').popover({
        placement : 'bottom',
        trigger : 'hover'
    });
    /*End Popover*/
    /*Remove function*/
    $(".btn-close").click(function(){
        var loopDiv = this.closest(".loop");
        var prodId = $(loopDiv).find(".prod-id").val();

        var userId = $("#user-id").val();
        $.ajax({  
            type: 'GET',  
            url: 'php/helper-functions/removetocart.php', 
            data: { userid: userId, prodid: prodId },
            dataType: 'json',
            success: function(response) {
                if (response >= 0) {
                    $("#total-price").text(response);
                    loopDiv.remove();
                }
            }
        });
    });
    /*End Remove Function*/
    /*active tab*/
    $(".tabmenu").click(function(){
        $(".active").removeClass("active");
    });
    /*End active tab*/
});
/*See more*/
function showHide(shID) {
    if (document.getElementById(shID)) {
        if (document.getElementById(shID+'-show').style.display != 'none') {
            document.getElementById(shID+'-show').style.display = 'none';
            document.getElementById(shID).style.display = 'block';
        }
        else {
            document.getElementById(shID+'-show').style.display = 'inline';
            document.getElementById(shID).style.display = 'none';
        }
    }
}

/*End See more*/

/*Rating Mechanism*/
(function() {

    'use strict';


    var product = document.querySelector('#product');
    var currrating = $("#rating-value").val()

    // Data name for Product
    var data = [
        {
            title: "Rating",
            rating: currrating
        }
    ];

    // Initialize
    (function init() {
        for (var i = 0; i < data.length; i++) {
            addRatingWidget(buildShopItem(data[i]), data[i]);
        }
    })();

    // Rendering data divs by js
    function buildShopItem(data) {
        var productItem = document.createElement('div');

        var html =
            '<h3>' + data.title + '</h3>' +
            '<ul class="c-rating"></ul>' +
            '</div>';

        productItem.classList.add('c-shop-item');
        productItem.innerHTML = html;
        product.appendChild(productItem);

        return productItem;
    }

    // rating callbacks
    function addRatingWidget(productItem, data) {
        var ratingElement = productItem.querySelector('.c-rating');
        var currentRating = data.rating;
        var maxRating = 5;
        var callback = function(rating) { $("#rating-value").val(rating); };
        var r = rating(ratingElement, currentRating, maxRating, callback);
    }

})();
/*End Rating Machanism*/
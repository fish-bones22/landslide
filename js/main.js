/*Popover*/
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'right',
        trigger : 'hover'
    });
});
/*End Popover*/
/*Remove function*/
$(document).ready(function(){
    $(".btn-close").click(function(){
        $("#remove").remove();
    });
});
/*End Remove Function*/
/*Rating Mechanism*/
(function() {

    'use strict';


    var product = document.querySelector('#product');

    // Data name for Product
    var data = [
        {
            title: "Rating",
            rating: 3
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
        var callback = function(rating) { alert(rating); };
        var r = rating(ratingElement, currentRating, maxRating, callback);
    }

})();
/*End Rating Machanism*/
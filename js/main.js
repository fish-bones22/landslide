var openedTab = openedTab || "";
var searchTerm = searchTerm || "";
var alpha = alpha || "";

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

    $("#terms").change(function() {
        if (this.checked) {
            $("#btn-checkout").removeAttr("disabled");
        } else {
            $("#btn-checkout").attr("disabled", "disabled");
        }
    });
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

function updateApprovalOfProduct(id, self, mode_) {

    var loopDiv = self.closest(".product-container");

    $.ajax({  
        type: 'GET',  
        url: 'php/helper-functions/updateapproval.php', 
        data: { prodid: id, mode: mode_ },
        dataType: 'json',
        success: function(response) {
            if (response > 0) {
                loopDiv.remove();
                var url = "admin.php?"
                if (openedTab !== "")
                    url += "tab="+openedTab + "&";
                if (searchTerm !== "") 
                    url += "search="+searchTerm + "&";
                if (alpha !== "") 
                    url += "alpha="+alpha + "&";
                window.location.href = url;
            }
        }
    });

}

function deleteUser(id, self) {

    var loopDiv = self.closest(".user-container");

    $.ajax({  
        type: 'GET',  
        url: 'php/helper-functions/deleteuser.php', 
        data: { usrid: id },
        dataType: 'json',
        success: function(response) {
            if (response > 0) {
                loopDiv.remove();
                var url = "admin.php?"
                if (openedTab !== "")
                    url += "tab="+openedTab;
                window.location.href = url;
            }
        }
    });

}


function goToCheckout() {
    if ((+$("#cart-val").val()) > 0) {
        console.log("ge");
        window.location.href = "/landslide/checkout.php";
    }
}

function searchProduct(search, self, mode_) {

    if (mode = 1) {
        searchTerm = search;
        alpha = "";
    }
    else if (mode = 2) {
        alpha = search;
        searchTerm = "";
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
        
        if (product === null || product === undefined) return;

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
        if (productItem === null || productItem === undefined) return;
        var ratingElement = productItem.querySelector('.c-rating');
        var currentRating = data.rating;
        var maxRating = 5;
        var callback = function(rating) { 
            $("#rating-value").val(rating);
            $("#add-to-cart-btn").removeAttr("disabled");
        };
        var r = rating(ratingElement, currentRating, maxRating, callback);
    }

})();
/*End Rating Machanism*/
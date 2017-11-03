function addToCart(userid, prodid) {
	var rating = $("#rating-value").val();
	$.ajax({  
	    type: 'GET',  
	    url: 'php/helper-functions/addtocart.php', 
	    data: { userid: userid, prodid: prodid, rating: rating },
	    dataType: 'json',
	    success: function(response) {
	    	if (response == 1) {
	    		$("#add-to-cart-btn").text("Added");
	    		$("#add-to-cart-btn").attr("disabled", "");
	    	}
	    }
	});
}
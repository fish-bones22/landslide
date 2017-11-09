$("document").ready(function() {

	$("#status-filter").change(function() {
		var value = +$(this).val();
		console.log(value);
		switch (value) {
			case -1:
				$(".dashboard-product-box").removeAttr("hidden");
				break;
			case  0:
				$(".dashboard-product-box").each(function () {
					console.log($(this).find(".approval"));
					if ($(this).find(".approval").text() !== "Pending") {
						$(this).attr("hidden", "");
					} else {
						$(this).removeAttr("hidden");
					}
				});
				break;
			case  1:
				$(".dashboard-product-box").each(function () {
					if ($(this).find(".approval").text() !== "Approved") {
						$(this).attr("hidden", "");
					} else {
						$(this).removeAttr("hidden");
					}
				});
				break;
			case  2:
				$(".dashboard-product-box").each(function () {
					if ($(this).find(".approval").text() !== "Denied") {
						$(this).attr("hidden", "");
					} else {
						$(this).removeAttr("hidden");
					}
				});
				break;
		}
	});
});
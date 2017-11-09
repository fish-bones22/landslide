var openedTab = openedTab || "";
var searchTerm = searchTerm || "";

$("document").ready(function() {

	if (openedTab !== "") {
		$(".tab-pane").removeClass("active");
		$("#" + openedTab).addClass("active");
	}

	$(".tabmenu a").click(function () {
		openedTab = $(this).attr("href").replace("#", "");
	});

});
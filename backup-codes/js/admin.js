var openedTab = openedTab || "";
var searchTerm = searchTerm || "";
var alpha = alpha || "";

$("document").ready(function() {

	if (openedTab !== "") {
		$(".tab-pane").removeClass("active");
		$("#" + openedTab).addClass("active");
	}

	$(".tabmenu a").click(function () {
		openedTab = $(this).attr("href").replace("#", "");
		window.location.href = "admin.php?tab="+openedTab;
	});

	$(".alpha-link").click(function() {
		alpha = $(this).text();
		window.location.href = "admin.php?tab=list-apps&alpha="+alpha;
	});

	$(".alpha-user-link").click(function() {
		alpha = $(this).text();
		window.location.href = "admin.php?tab=list-users&alpha="+alpha;
	});

});
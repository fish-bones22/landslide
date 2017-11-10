$(document).ready(function() {

	toggleDeveloper();

	$("#dev-toggle").change(function() {
		toggleDeveloper();
	});

});

function toggleDeveloper() {
	if ($("#dev-toggle").prop("checked")) {
		$(".dev-title").text("Upgraded to Developer");
		$(".dev-inp").removeAttr("disabled");
	}
	else {
		$(".dev-title").text("Upgrade to Developer");
		$(".dev-inp").attr("disabled", "disabled");
	}
}
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

function togglePassword() {

	$(".password-toggle").slideToggle();

	if ($(".password-toggle input").prop("disabled")) {
		$(".password-toggle input").removeAttr("disabled");
	} else {
		$(".password-toggle input").attr("disabled", "");
	}

}

function toggleVerifyPassword() {

	$("#verify-password").slideToggle("fast","swing");
	$("#btn-save").slideToggle("fast","swing");

}

var c = 1;
function d() {
	if (c % 5 == 0) {
		$("#d").slideToggle();
	} else {
		$("#d").slideUp();
	}
	c++;
}
function f() {$('#d').slideUp();}
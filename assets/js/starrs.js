function setViewUserCookie(value) {
	var c_value = escape(value);
	document.cookie = 'starrs_viewUser=' + c_value + '; path=/';
}

function getViewUserFromCookie() {
	var nameEQ = "starrs_viewUser=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

function setViewUserSelect() {
	var i;
	if (document.getElementById("viewuser")) {
		var options = document.getElementById("viewuser").options;
	} else {
		var options = 0;
	}
	var viewUser = getViewUserFromCookie();
	if (viewUser == '') {
		return;
	}
	for (i = 0; i < options.length; i++) {
		if (options[i].value == viewUser) {
			document.getElementById("viewuser").selectedIndex = i;
		}
	}
}

$(document).ready(function() {
	$('#create-form .controls input, #modify-form .controls input').blur(function() {
		if ($(this).parent().parent().attr('class').match(/warning/g)) {
			return;
		};
		if ($(this).attr('value') != "") {
			$(this).parent().parent().removeClass("error");
		} else {
			$(this).parent().parent().addClass("error");
		}
	});

	$('#create-form .controls select, #modify-form .controls select').change(function() {
		if ($(this, 'option:selected').attr('value') != "") {
			$(this).parent().parent().removeClass("error");
		} else {
			$(this).parent().parent().addClass("error");
		}
	});

	// Impersonation
	$("#stopImpersonating").click(function() {
		setViewUserCookie("");
	    $("#modal-impersonate").modal('hide');
	    window.location.reload(true);
	});

	$("#modal-impersonate-select").selectize({
	    sortField: 'text'
	});
	
	$("#modal-impersonate-submit").click(function() {
		setViewUserCookie($("#modal-impersonate-select").val());
	    $("#modal-impersonate").modal('hide');
	    window.location.reload(true);
	});

	$("#datatable").tablesorter();

	if (getCookie('starrs_uimode') == "Advanced") {
		// Viewing as Advanced, want a button to Simple
		var icon = document.createElement('span');
		$(icon).addClass("glyphicon glyphicon-apple");
		$('#uitoggle').html(" Simple Mode");
		$('#uitoggle').prepend(icon);
		$('#uitoggle').data('mode', 'Simple');
		$('#uitoggle').attr("title", "Currently viewing in Advanced. Click to switch to Simple.");
	} else if (getCookie('starrs_uimode') == "Simple") {
		// Viewing as Simple, want a button to Advanced
		var icon = document.createElement('span');
		$(icon).addClass("glyphicon glyphicon-flash");
		$('#uitoggle').html(" Advanced Mode");
		$('#uitoggle').prepend(icon);
		$('#uitoggle').data('mode', 'Advanced');
		$('#uitoggle').attr("title", "Currently viewing in Simple. Click to switch to Advanced.");
	} else {
		// No cookie set
		setCookie("starrs_uimode", "Simple", 1500);
	}
});

$('#create-form').submit(function() {
	$.post(undefined, $('#create-form').serialize(), function(data) {
		handlePostRedirect(data);
	});
	return false;
});

$('#modify-form').submit(function() {
	$.post(undefined, $('#modify-form').serialize(), function(data) {
		handlePostRedirect(data);
	});
	return false;
});

function handlePostRefresh(data, saveBtn) {
	if (!data.match(/^\<script\>/g)) {
		$('#modal-error-body').html(data);
		$('#modal-error').modal('show');
		
		if (typeof saveBtn !== "undefined") {
			$(saveBtn).removeClass("disabled");
		}
	} else {
		refresh();
	}
}

function handlePostRedirect(data, saveBtn) {
	if (!data.match(/^\<script\>/g)) {
		$('#modal-error-body').html(data);
		$('#modal-error').modal('show');
		
		if (typeof saveBtn !== "undefined") {
			$(saveBtn).removeClass("disabled");
		}
	} else {
		$('head').html($('head').html() + data);
	}
}

function refresh() {
	window.location.reload(true);
}

// Remove Action Button
$('#action-remove').click(function() {
	$(this).addClass("disabled");
	$('#modal-confirm-btn').attr('href', $('#action-remove').attr('href'));
	$('#modal-confirm').modal('show');
	return false;
});

// Google Chart
// Doesnt automatically resize when window changes, so make it do that.
$(window).resize(function() {
	if ($('#chart_div').html() != null) {
		drawChart();
	}
});

$('[name=hostname],[name=zone],[name=alias]').change(function() {
	var hostname = $('[name=hostname]').attr('value');
	var zone = $('[name=zone]').attr('value');
	$.get("/dns/records/check_hostname/" + zone + "/" + hostname, function(data) {
		if (data != "") {
			$('#inuse').removeClass('imp-hide');
		} else {
			$('#inuse').addClass('imp-hide');
		}
	});
});

$('[name=submit]').click(function() {
	$('#modal-loading').show();
	$(this).addClass('disabled');
});

$('.modal-footer .btn').click(function() {
	$('[name=submit]').removeClass('disabled');
	$('#modal-loading').hide();
});

function assignTip(thing) {
	return function(data) {
		console.debug("eee" + thing.html());
		console.debug("wat" + data);
		thing.attr('title', data);
		$('dt').tooltip({
			placement: 'right',
			container : 'body'
		})
	}
}

function getSchemaFromUrl() {
	return window.location.pathname.split('/')[1];
}

$('#addr_state').tooltip({
	placement: "right",
	container : "body"
});

$('dt').each(function() {
	var obj = $(this);

	$.get("/tooltip/view/" + getSchemaFromUrl() + "/" + $(this).html(), function(data) {
		obj.attr('title', data);
		obj.tooltip('fixTitle', {
			container : 'body'
		});
	});
});

$('th').each(function() {
	var obj = $(this);
	$.get("/tooltip/view/" + getSchemaFromUrl() + "/" + $(this).html(), function(data) {
		obj.attr('title', data);
		obj.tooltip('fixTitle', {
			container : 'body'
		});
	});
});

$('label').each(function() {
	if ($(this).attr('class') == 'checkbox') {
		return;
	}

	var obj = $(this);

	var name = obj.html();
	name = name.replace(/:/, "");
	$.get("/tooltip/view/" + getSchemaFromUrl() + "/" + name, function(data) {
		obj.attr('title', data);
		obj.tooltip('fixTitle', {
			container : 'body'
		});
	});
});

$('dt').tooltip({
	placement: 'right',
	container : 'body'
});

$('th').tooltip({
	placement: 'top',
	container : 'body'
});

$('.control-label').tooltip({
	placement: 'right',
	container : 'body'
});

$('#uitoggle').click(function() {
	var viewMode = $(this).data('mode');

	if (viewMode == "Simple") {
		// Go to simple mode
		setCookie("starrs_uimode", "Simple", 1500);
		refresh();
	} else {
		// Go to advanced mode
		setCookie("starrs_uimode", "Advanced", 1500);
		refresh();
	}
});

function setCookie(c_name, value, exdays) {
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
	document.cookie = c_name + "=" + c_value;
}

function getCookie(c_name) {
	var i, x, y, ARRcookies = document.cookie.split(";");
	for (i = 0; i < ARRcookies.length; i++) {
		x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
		y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
		x = x.replace(/^\s+|\s+$/g, "");
		if (x == c_name) {
			return unescape(y);
		}
	}
}

$('.imp-sbtn').click(function() {
	window.location.href = $(this).attr('href');
});

$('#action-rename').click(function() {
	$(this).addClass("disabled");
	var url = $(this).attr('href');
	$.get(url, function(data) {
		$('#modal-modify .modal-header').html("<h4 class=\"modal-title\">Modify</h4>");
		$('#modal-modify-body').html(data);
		$('#save').attr('href', url);
		$('#modal-modify').modal('show');
	});
	return false;
});

function rawurlencode(str) {
	str = (str + '').toString();
	return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A');
}

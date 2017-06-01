$(document).ready(function() {
	var token = $('#token').val();
	$(".fancyb").fancybox();
	$(".fancya").fancybox({
		type: "ajax"
	});

	if($(".typeahead").length) {
		$.get('/admin/fields', function(data){
	    	$(".typeahead").typeahead({ source:data });
		},'json');
	}

	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(5000).fadeOut(350);
});
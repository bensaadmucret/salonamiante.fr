 jQuery(document).ready(function($) {   	$("#bulk_actions").submit(function() {		var input = jQuery("select[name=action]").val();		if (input == "delete") {			var c = confirm("Are you sure you want to delete these templates?");			return c;		}	});				});
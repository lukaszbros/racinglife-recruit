$(function() {

	$("a.menuItem").click(function(e) {

		e.preventDefault();

		var target = $(this).attr("href");

		$.get(target, function(data) {
  			$('#mainContent').html(data);
		});

	});

});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

$(".delete-user").on('click', function(event) {
	event.preventDefault();

	var that = this;

	var token = $(this).data("token");
	var data = {
		"_token" : token
	};

	$.ajax({
		url: $(that).attr("href"),
		type: 'delete',
		//dataType: 'json',
		data: data,
		success : function(result) {
			if (result.success)
			{
				jQuery(that).parents('tr').remove();
			}
			else
			{
				alert(result.err_msg);
			}
		}
	});
	
});
//# sourceMappingURL=scripts.js.map

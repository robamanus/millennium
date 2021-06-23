$(document).ready(function() {
	$("#add-task").click( function() {
		var from = $("input[name='from']").val();
		var to = $("input[name='to']").val();
		if((from=="") || (to=="")) { alert("Заполните все поля формы!"); return; }
		$.ajax({
			type: "POST",
			url: "get_odd_numbers",
			data: {from:from,to:to},
			dataType: "html",
			success: function(data){
				$("#odd_nums_array").remove();
				$("<div id='odd_nums_array'>"+data+"</div>").appendTo("#result");
				//location.reload();
			}
		});
	});
});
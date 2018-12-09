$(function(){	
	var url_update = baseurl+'employee/update';

	$("#newemployee").on("click", insert_newemployee);

	function insert_newemployee(e){
		e.preventDefault();
		var serialized  = $("form#new_employee").serialize();
		var serializedArray = $("form#new_employee").serializeArray();
		console.log(serializedArray);

		// if (parseFloat($("#berat").val())>0){			
			$.ajax({
				url: url_update,
				type: "POST",
				async: false,
				data: {
					employee: serializedArray
				},
				succes: function (res){
					console.log(res);
				}
			});	
		// }else{
		// 	alert("berat belum diisi");
		// }
	}
	function init(){		
		init_the_birthdate();		
	}

	function init_the_birthdate(){
      $("#birthday").datetimepicker('remove');
      $("#birthday").datetimepicker({
            format: "dd MM yyyy",
            autoclose: true,
            todayBtn: true,
            minView: 'year'
        });
    }


	init();
});
$(function(){	
	var url_insert = baseurl+'employee/add';
	var url_staff_list = baseurl + 'management/employment/list';
	var url_staff_salary = baseurl + 'management/employment/salary';

	$("#newemployee").on("click", insert_newemployee);		
	$("#employee_list_btn").on("click", employee_list);
	$("#employee_salary_btn").on("click", employee_salary);

	function insert_newemployee(e){
		e.preventDefault();
		var serialized  = $("form#new_employee").serialize();
		var serializedArray = $("form#new_employee").serializeArray();
		console.log(serializedArray);

		// if (parseFloat($("#berat").val())>0){			
			$.ajax({
				url: url_insert,
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

	function employee_list(e){
		e.preventDefault();
		console.log('daftar karyawan');
		window.location.href = url_staff_list;
	}

	function employee_salary(e){
		e.preventDefault();
		console.log('salary karyawan');
		window.location.href = url_staff_salary;
	}

	init();
});
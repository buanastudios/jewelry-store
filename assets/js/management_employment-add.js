$(function(){	

	$("#newemployee").on("click", insert_newemployee);

	function insert_newemployee(e){
		e.preventDefault();
		
		
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
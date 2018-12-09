$(function(){
	var url_list = baseurl + 'employee/searchbyterm';
	var $tablen = $("#employee_list");	

	$("#employee_del_btn").on("click", employee_del);
	$("#employee_add_btn").on("click", employee_add);
	$("employee_edit_btn").on("click", employee_edit);

	function init(){		
		init_the_table();
		refresh_the_table();
	}

	function refresh_the_table(url_list){    
    	$tablen.bootstrapTable('refresh', {url: url_list});
    	
  	}

  	function init_the_table(){
		$tablen.bootstrapTable({
	        idField: 'u_id',
	        pagination: true,
	        search: false, 
	        showColumns: false,
	        url: url_list,
	        columns: [{
	                    field: 'state',
	                    title: '#',
	                    checkbox:true
	                  },                                      
	                  // {
	                  //   field: 'trx_date',
	                  //   title: 'Join Date', 
	                  //   halign: 'center',
	                  //   // cellStyle: dateCellStyle,
	                  //   // formatter: dateFormatter
	                  // },                  
	                  // {
	                  //   field: 'u_id',
	                  //   halign: 'center',
	                  //   align: 'left',
	                  //   title: 'NIK#'
	                  // },
	                  {
	                    field: 'fullname',
	                    title: 'Employee Name',
	                    halign: 'center',
	                    align: 'left'
	                  },
					  {
						// field: 'trx_date',
						title: 'Actions', 
						halign: 'center',
						// cellStyle: dateCellStyle,
						formatter: buttonFormatter
					   },                  
	                ]
		});
	}

	function buttonFormatter(){
		return "<button class='employee_edit_btn btn btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
	}

	function employee_add(e){
		e.preventDefault();
	}

	function employee_del(e){
		e.preventDefault();
	}

	function employee_edit(e){
		e.preventDefault();
		console.log($(e));
	}

	init();
});
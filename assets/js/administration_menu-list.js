$(function(){
	var url_list = baseurl + 'employee/searchbyterm';
	var url_staff_add = baseurl + 'management/employment/add';
	var url_staff_salary = baseurl + 'management/employment/salary';

	var $tablen = $("#menu_list");	

	$("#employee_del_btn").on("click", employee_del);
	$("#employee_add_btn").on("click", employee_add);
	$("#employee_edit_btn").on("click", employee_edit);
	$("#employee_salary_btn").on("click", employee_salary);

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
	                    title: 'Menu Name',
	                    halign: 'center',
	                    align: 'left'
	                  },
	                  {
	                    field: 'fullname',
	                    title: 'Parent Menu',
	                    halign: 'center',
	                    align: 'center',
	                    formatter: button4Formatter
	                  },
					  {
						// field: 'trx_date',
						title: 'Accessible by', 
						halign: 'center',
						// cellStyle: dateCellStyle,
						formatter: buttonFormatter
					   },                  
					  {
						// field: 'trx_date',
						title: 'Activated', 
						halign: 'center',
						// cellStyle: dateCellStyle,
						formatter: button2Formatter
					   },
					   {						
						title: 'Move', 
						halign: 'center',
						// cellStyle: dateCellStyle,
						formatter: button3Formatter
					   },
					   {						
						title: '', 
						halign: 'center',
						// cellStyle: dateCellStyle,
						formatter: button1Formatter
					   },                  
	                ]
		});
	}

	function buttonFormatter(){
		var btn = [];
		// btn[0] = "<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
		// btn[1] = "<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
		btn[0] = "<div><input type='checkbox'/>&nbsp;Employee</div>";
		btn[0] += "<div><input type='checkbox'/>&nbsp;Owner</div>";
		var btn_group = btn[0];		
		return btn_group; 
	}

	function button2Formatter(){
		var btn = [];
		// btn[0] = "<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
		// btn[1] = "<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
		btn[0] = "<div class='text-center'><input type='checkbox'/>&nbsp;</div>";
		var btn_group = btn[0];		
		return btn_group; 
	}

	
	function button4Formatter(value, row, index){
		var btn = [];
		btn[0] = "<button class='move_up_btn btn btn-sm btn-outline-primary'><span class='fa fa-exchange-alt'>&nbsp;</span>Change</button>";		
		var btn_group = "<div class='text-left' style='width:100%;'><span style='width:50%;float:left;'>"+value+"</span>&nbsp;<span class='btn-group' style='float:right;text-align:right;'>" + btn[0] + "</span></div>";		
		return btn_group;//"<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
	}

	function button3Formatter(){
		var btn = [];
		btn[0] = "<button class='move_up_btn btn btn-sm btn-outline-primary'><span class='fa fa-arrow-up'>&nbsp;</span>Up</button>";
		btn[1] = "<button class='move_down_btn btn btn-sm btn-outline-primary'><span class='fa fa-arrow-down'>&nbsp;</span>Down</button>";		
		var btn_group = "<div class='text-center'><span class='btn-group'>" + btn[0] + btn[1] + "</span></div>";		
		return btn_group;//"<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
	}

	function button1Formatter(){
		var btn = [];
		btn[0] = "<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
		// btn[1] = "<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-arrow-down'>&nbsp;</span>Move Down</button>";		
		var btn_group = "<div class='text-center'><span class='btn-group'>" + btn[0] + "</span></div>";		
		return btn_group;
	}

	function employee_add(e){
		e.preventDefault();
		console.log('tambahin karyawan');
		window.location.href = url_staff_add;
	}

	function employee_salary(e){
		e.preventDefault();
		console.log('salary karyawan');
		window.location.href = url_staff_salary;
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
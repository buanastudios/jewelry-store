$(function(){
	var url_list = baseurl + 'employee/searchbyterm';
	var url_staff_add = baseurl + 'management/employment/add';
	var url_staff_salary = baseurl + 'management/employment/salary';

	var $tablen = $("#employee_list");	

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
	                    title: 'Karyawan',
	                    halign: 'center',
	                    align: 'left'
	                  },
					  {
						// field: 'trx_date',
						title: '', 
						halign: 'center',
						// cellStyle: dateCellStyle,
						formatter: buttonFormatter
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
		btn[0] = "<div><input type='checkbox'/>&nbsp;Sales</div><div><input type='checkbox'/>&nbsp;Manager</div>";
		var btn_group = btn[0];		
		return btn_group; 
	}

	function button1Formatter(){
		var btn = [];
		btn[0] = "<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
		btn[1] = "<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-save'>&nbsp;</span>Simpan</button>";		
		var btn_group = "<div class='text-center'><span class='btn-group'>" + btn[0] + btn[1] + "</span></div>";		
		return btn_group;//"<button class='employee_edit_btn btn btn-sm btn-primary'><span class='fa fa-edit'>&nbsp;</span>Edit</button>";
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
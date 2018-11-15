$(function(){
	var url_list = baseurl + 'employee/searchbyterm';
	var $tablen = $("#employee_list");	

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
	                  {
	                    field: 'u_id',
	                    halign: 'center',
	                    align: 'left',
	                    title: 'NIK#'
	                  },
	                  {
	                    field: 'fullname',
	                    title: 'Employee Name',
	                    halign: 'center',
	                    align: 'left'
	                  }
	                  ]
		});
	}

	init();
});
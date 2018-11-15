$(function(){
	$('select').select2();
	var $tablen = $("#product_to_schedule");
	var url_list = baseurl+'product/purchasedstock'; 		
	var url_update_schedule = baseurl+'cleaner/updateschedule'; 		
	var cur_postdate = Date("Y-M-d"); 

	function refresh_the_table(url_list){    
	    $tablen.bootstrapTable('refresh', {url: url_list});
	    // $tablenrank.bootstrapTable('refresh'), {url:url_list_rank});
  	}

  	$("#employee").select2({
    tags: false,
    multiple: false,
    tokenSeparators: [',', ' '],
    minimumInputLength: 2,
    minimumResultsForSearch: 10,
    templateResult: function(result) {
        var rs = $("<div />").addClass("row");
        rs.append($("<div />").addClass("col-lg-2 col-md-2 col-sm-2 col-xs-2").html(result.id));
        rs.append($("<div />").addClass("col-lg-10 col-md-10 col-sm-10 col-xs-10").html(result.text));
        // console.log(rs);
        return rs;
    },
    ajax: {
        url: baseurl + 'employee/searchByTerm',
        dataType: "json",
        type: "GET",
        data: function (params) {

            var queryParameters = {
                term: params.term
            }
            return queryParameters;
        },
      
        processResults: function (data) {
//             data = data.data;
            return {
                results: $.map(data.data.rows, function (item) {
                    return {
                        text: item.fullname,
                        id: item.id
                    }
                })
            };
        }
      }
    });

  $tablen.bootstrapTable({
        idField: 'id',
        pagination: true,
        search: false, 
        showColumns: false,
        url: url_list,
        columns: [{
                    field: 'state',
                    title: '#',
                    checkbox:true
                  },                                      
                  {
                    field: 'barcode',
                    title: 'Barcode'
                  },
                  {
                    field: 'product_id',
                    title: 'Gambar'
                  },
                  {
                    field: 'product_name',
                    title: 'Nama Barang'
                  },
                  {
                    field: 'product_class',
                    title: 'Jenis'
                  },
                  {
                    field: 'unit_weight',
                    title: 'Weight'
                  }
                  ]
    });

  	$("#add_to_schedule").on("click", add_to_schedule);

  	function add_to_schedule(o){
  		o.preventDefault();
  		
  		var assignedto = $("#employee").val();
  		var ids = $.map($tablen.bootstrapTable('getSelections'), function (row) {
                  return row.id;
                });

  		$.each(ids,function(index, value){
  			console.log("processing "+ value);
	        $.ajax({
	              type: "POST",
	              url: url_update_schedule,
	              dataType: 'json',
	              data: {
	                      itemid: value,
	                      delegateto: assignedto
	                    },
	              success: function(res) {
	                    console.log("success update");        
	                    refresh_the_table(url_list);
	                  }          
	          });
      	});
  	}
});
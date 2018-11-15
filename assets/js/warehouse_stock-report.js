$(function(){

  // var baseurl = "http://localhost:85/courses/derry/jewelry-store";
	var url_stock = baseurl+'/transaction/stock';   
	var url_list = url_stock;  

	var cur_postdate = Date("Y-M-d"); 
	var $tablen = $("#stock_report");

	function getProductInventory(){			
		$.ajax({
			type: "POST",
			url: url_list,
			dataType: 'json',
			async: false,
			data: {
				// text2display: $('#barcode').val()				
			},
			success: function (result) {
	        	//if (result.isOk == false) alert(result.message);            	
	        	console.log(result.data);
	    	}	
		});		
	}
  	
  	alert(url_list);
  	getProductInventory();
// $tablen.bootstrapTable({
//         idField: 'id',
//         pagination: true,
//         search: false, 
//         showColumns: false,
//         url: url_list,
//         columns: [                          
//                   {
//                     field: 'tanggal_transaksi',
//                     title: 'Date'
//                   },
//                   {
//                     field: 'product_category',
//                     title: 'Item'
//                   },
//                   {
//                     field: 'jumlah',
//                     title: 'Jumlah'
//                   },
//                   {
//                     field: 'weight',
//                     title: 'Weight'
//                   },
//                   {
//                     field: 'keterangan',
//                     title: 'Keterangan'
//                   }]
//     });

});
$(function(){
	var url_inventory = baseurl+'/product/itemList';   		

	var cur_postdate = Date("Y-M-d"); 
	var $tablen = $("#inventory");

	function getProductInventory(){			
		$.ajax({
			type: "POST",
			url: url_inventory,
			dataType: 'json',
			async: false,
			data: {
				// text2display: $('#barcode').val()				
			},
	  		success: refillTable
		});		
	}

    function refillTable(data){
      $tbody = $tablen.append("<tbody />");
      $("thead th", $tablen).addClass("text-center");
      $.each(data.data, function(i,v){        
        var action_buttons = $("<div />").addClass("btn-group")
                                                .append($("<button />").addClass("btn btn-sm btn-warning").html($("<i/>").addClass("fa fa-edit")))
                                                .append($("<button />").addClass("btn btn-sm btn-danger").html($("<i/>").addClass("fa fa-trash")))
        var jenis  = $("<div />").append($("<div />").html(v.product_category)).append($("<div />").html(v.product_class));

        $trow = $("<tr/>")                  
                        .append($("<td />").addClass("text-center").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))
                        .append($("<td />").html(v.barcode))
                        .append($("<td />").html(v.product_name))
                        .append($("<td />").append(jenis))
                        .append($("<td />").addClass("text-right").html(v.weight+ " gram"))
                        .append($("<td />").addClass("text-right").html(i + " pc(s)"))
                        .append($("<td />").html(action_buttons));
        $tbody.append($trow);
      });
    	
      tidyDateColumn();
    }

    function tidyDateColumn(){
    	$tablen.addClass("table-condensed");
    }

    function getBarcodeImage(){   
      $.ajax({
        type: "POST",
        url: url_gen_barcode,
        dataType: 'json',
        async: false,
        data: {
          text2display: barcode
        },
        success: gettingBarcodeImageResponse
      });   
    }

    function init(){    	
  		getProductInventory();
  	}
  	
  	init();
})	
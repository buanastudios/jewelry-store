$(function(){
  	var url_inventory = baseurl+'product/itemList';   		
    var url_add_product = baseurl + 'warehouse/product/add';
    var url_remove_product = baseurl + 'product/remove';
    var url_product_image = baseurl + 'product/itemImage';
  	var cur_postdate = Date("Y-M-d"); 
  	var $tablen = $("#inventory");

    $("#add_product").on("click", addmoreproduct);

    function addmoreproduct(e){
      e.preventDefault();
      window.location.href = url_add_product;
    }

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
                                                .append($("<button />").addClass("btn btn-sm btn-danger btn_row_remove").html($("<i/>").addClass("fa fa-trash")))
        var jenis  = $("<div />").append($("<div />").html(v.product_category)).append($("<div />").html(v.product_class));

        var product_wrapper_left = $("<div />").css("float","left").css("width","50%").html("<img src="+url_product_image+"/"+v.barcode+" style='width: 100%;' />");
        var product_properties_name = $("<div />").css("white-space","nowrap").html(v.product_name);        
        var product_properties_class = $("<div />").addClass("badge").html(v.product_class);        
        var product_properties_weight = $("<div />").addClass("badge").html(v.weight+ " gram");        
        var product_wrapper_right = $("<div />").css("float","right").css("width","40%").css("margin-left","10%").append(product_properties_name).append(product_properties_class).append(product_properties_weight);

        var product_wrapper = $("<div />").css("width","200px").append(product_wrapper_left).append(product_wrapper_right);
        var product_barcode = $("<div />").addClass("text-center").css("height","100px").css("padding","10px").css("background-color","white").append("<img src='http://localhost/courses/derry/jewelry-store/vendor/barcodegen.1d-php5.v2.2.0/html/image.php?code=code128&amp;o=1&amp;dpi=72&amp;t=30&amp;r=1&amp;rot=0&amp;text="+v.barcode+"&amp;f1=Arial.ttf&amp;f2=8&amp;a1=&amp;a2=&amp;a3=' alt='Barcode Image'>");

        $trow = $("<tr/>").attr("barcode",v.barcode)                  
                        .append($("<td />").addClass("text-center align-middle").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))
                        .append($("<td />").html(product_barcode))
                        .append($("<td />").html(product_wrapper))                                              
                        .append($("<td />").addClass("text-right").html(i + " pc(s)"))
                        .append($("<td />").html(action_buttons));
        $tbody.append($trow);

        

      });

      tidyDateColumn();

      $($tbody).on( "click", ".btn_row_remove", remove_row);
    }

    function remove_row(e){
      e.preventDefault();
      var thisRow = $(this).parent().parent().parent();
      var barcode = thisRow.attr("barcode");
      console.log(barcode);
      
      $.ajax({
        type: "POST",        
        url: url_remove_product,
        dataType: 'json',
        async: false,
        data: {
          barcode: barcode
        },
        success : getResponseAfterRemoveRow
      }); 

      thisRow.remove();
    }

    function getResponseAfterRemoveRow(o){
      getProductInventory();
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
        success : gettingBarcodeImageResponse
      });   
    }

    function init(){    	
  		getProductInventory();
  	}
  	
  	init();
})	
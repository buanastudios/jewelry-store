$(function(){
	var url_inventory = baseurl + 'product/itemList';   		
  var url_product   = baseurl + 'product/readystock';
  var url_opname    = baseurl + 'product/opname';
	var cur_postdate = Date("Y-M-d"); 
	var $tablen = $("#inventory");

  $("#barcode_search").on("click", getProductFromBarcode);
  $("#displayAllTable").on("click", getTableProducts);  
  $("#single_opname").on("click", UpdateSingleOpname);

  function UpdateSingleOpname(o){
    o.preventDefault();
    console.log($(".product_barcode").text());
    console.log($("#single_opname_value").val());
  }
  function updateOpnameValue(o){
    o.preventDefault();    
    var update_props =  { 
                          barcode: $(this).attr("barcode"),
                          opnamed_stock: parseInt($(this).parent().parent().parent().find(".stock-input").val())
                        };

    console.log("Updating ... ");
    console.log(update_props);

    if (update_props ['barcode'] != ''){
      $.ajax({
        type: "POST",
        url: url_opname,
        dataType: 'json',
        data: update_props,
        success: function(res){
          console.log(res);
          console.log('consider done');
        }
      });
    };

    //when it's done its row disappear
    $(this).parent().parent().parent().fadeOut('slow');

  }

  function getTableProducts(o){
    o.preventDefault();
    $("#inventory_list").fadeToggle('slow');
  }

  function getProductFromBarcode(e){
    e.preventDefault();

    $("#barcode_search_result").hide();
    
    var barcode = $("#barcode_scanned").val();

    $(".opnamed_barcode").html(barcode);
    $(".opnamed_stock").val('');

    if (barcode != ''){
      $.ajax({
        type: "POST",
        url: url_product,
        dataType: 'json',
        data: {
          barcode: barcode
        },
        success: refresh_the_barcode_search
      });
    };
  }

  function refresh_the_barcode_search(res){
    console.log('result is: ');
    console.log(res.data.length);
    
    console.log(res.data[0].product_name);
    console.log('end of ajax request');
    
    if(parseInt(res.data.length)>0){
      $("#barcode_search_result").fadeToggle('slow');
    }else{
      $("#barcode_search_result").hide();
      console.log("show notif not found barcode");
    }

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
    function opnameAStock(e){
      
    }

    function refillTable(data){
      $tbody = $tablen.append("<tbody />");
      $("thead th", $tablen).addClass("text-center");
      $.each(data.data, function(i,v){        
        var action_buttons = $("<div />").addClass("btn-group")
                                                .append($("<button />").addClass("btn_opname_individual").attr("barcode",v.barcode).addClass("btn btn-sm btn-success").html("Update ").append($("<i/>").addClass("fa fa-check")));

        var jenis  = $("<div />").append($("<div />").addClass("badge").html(v.product_category)).append($("<div />").addClass("badge").html(v.product_class));
        var weight = $("<div />").addClass("badge").html(v.weight + " gram(s)");
        var product = $("<div />").append($("<div />").html(v.product_name)).append(jenis).append(weight);
        var product_image = $("<div />").css("float","left").css("width","50%").append($("<img />").css("width","100%").attr("src","http://localhost/courses/derry/jewelry-store/product/itemImage/CN-010297799"));
        var product_wrapper = $("<div />").append($("<div />").append(product).css("float","right").css("width","40%").css("margin-left","10%"))
                                          .append(product_image);

        $trow = $("<tr/>")                  
                        .append($("<td />").addClass("text-center").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))
                        .append($("<td />").css("white-space","nowrap").html(v.barcode))                        
                        .append($("<td />").append(product_wrapper))                                                
                        .append($("<td />").append($("<input />").addClass("form-control").addClass("stock-input")))
                        .append($("<td />").html(action_buttons));
        $tbody.append($trow);

        
      });
    	$(".btn_opname_individual", $tbody).on("click", updateOpnameValue);
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
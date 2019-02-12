$(function(){
	var url_inventory = baseurl + 'product/itemList';   		
  var url_product   = baseurl + 'product/readystock';
  var url_opname    = baseurl + 'product/opname';
  var url_willbeopname    = baseurl + 'inventory/getOpnameList';
  var url_singlewillbeopname    = baseurl + 'inventory/getOpnameSingleBarcode';
  var url_product_image = baseurl + 'product/itemImage';

	var cur_postdate = Date("Y-M-d"); 
	var $tablen = $("#inventory");

  $("#barcode_search").on("click", getProductFromBarcodeSearch);
  $("#displayAllTable").on("click", getTableProducts);  
  $("#single_opname").on("click", UpdateSingleOpname);  
  $("#cleardateparam").on("click", clear_dateparam);
  $("#barcode_scanned").on("keyup", getProductFromBarcode);
  $("#barcode_scanned").on("change", getProductFromBarcode);

  function UpdateSingleOpname(o){
    o.preventDefault();
    var p = $("#periodformatted").val();
    var u = $("#user_logged").text();
    console.log($(".product_barcode").text());
    console.log($("#single_opname_value").val());
    if (u.length > 9){
      if (p.length > 9){
        var update_props =  { 
                            opname_date: p,
                            barcode: $("#single_opname_barcode").text(),
                            opnamed_stock: $("#single_opname_value").val()
                          };

        console.log("Updating ... ",update_props);

        if (update_props ['barcode'] != ''){
          $.ajax({
            type: "POST",
            url: url_opname,
            dataType: 'json',
            data: update_props,
            success: function(res){
              console.log(res,'consider done');
              alert('consider done');
            }
          });
        };
      }else{
        alert('choose period of opname first');
      }
    }
  }

  function updateOpnameValue(o){
    o.preventDefault();    
    var therow = $(this).parent().parent().parent();
    var p = $("#periodformatted").val();
    var u = $("#user_logged").text();
    if (p.length > 9){
      var update_props =  { 
                          opname_date: p,
                          barcode: $(this).attr("barcode"),
                          opnamed_stock: parseInt(therow.find(".stock-input").val())
                        };

      console.log("Updating ... ");
      console.log(update_props);

      if( u.length > 0){  
        if (update_props ['barcode'] != ''){
            $.ajax({
              type: "POST",
              url: url_opname,
              dataType: 'json',
              data: update_props,
              success: function(res){
                console.log(res);
                console.log('consider done');
                //when it's done its row disappear
                therow.fadeOut('slow');
              }
            });
          };
      }else{
            alert('choose officer first');
      }
    }else{
     alert('choose period of opname first');
    }
  }

  function getTableProducts(o){
    console.log("initiate function: getTableProducts");
    o.preventDefault();
    $("#barcode_search_result").hide();
    var p = $("#periodformatted").val();
    if (p.length > 9){
      getWillOpnameList(p);
      $("#inventory_list").fadeIn('slow');
    }else{
      alert('choose period of opname first'); 
    }    
    // $("#inventory_list").fadeToggle('slow');
    console.log("end of function: getTableProducts");
  }

  function searchSingleBarcodeinOpnamePeriod(barcode, period){
    $.ajax({
        type: "POST",
        url: url_singlewillbeopname,
        dataType: 'json',
        data: {
          barcode: barcode,
          opname_date: period
        },
        success: refresh_the_barcode_search
      });
  }
  function getProductFromBarcodeSearch(e){
    e.preventDefault();
    $("#barcode_search_result").hide();
    
    var barcode = $.trim($("#barcode_scanned").val());
    var p = $("#periodformatted").val();

    $(".opnamed_barcode").html(barcode);
    $(".opnamed_stock").val('');

    if((p.length > 9) && (barcode != '')){
      searchSingleBarcodeinOpnamePeriod(barcode, p);
    }else{
      alert('choose period of opname and barcode'); 
    }
  }
  function getProductFromBarcode(e){
    e.preventDefault();

    $("#barcode_search_result").hide();
    
    var barcode = $.trim($("#barcode_scanned").val());
    var p = $("#periodformatted").val();

    $(".opnamed_barcode").html(barcode);
    $(".opnamed_stock").val('');

    if((p.length > 9) && (barcode != '')){
      searchSingleBarcodeinOpnamePeriod(barcode, p);
    }else{
      $("input.status_notif").val("Choose period of opname and barcode");      
    }
  }

  function refresh_the_barcode_search(res){
    $("#barcode_search_result").hide();
    console.log("show notif not found barcode");
    $("input.status_notif").val("Sorry, barcode is not found in WILL be opname database");

    if(parseInt(res.data.length)>0){
      $("#barcode_search_result").fadeToggle('slow');
      $("input.status_notif").val("");
      console.log(res.data[0].product_name);
      console.log('end of ajax request');

      $(".product_name","#barcode_search_result").html(res.data[0].product_name);
      $(".product_class","#barcode_search_result").html(res.data[0].product_class);
      $(".product_weight","#barcode_search_result").html(res.data[0].weight + " gram(s)");
      $(".product_image","#barcode_search_result").attr('src',url_product_image+"/"+res.data[0].barcode);
    }

    console.log('result is: ');
    console.log(res.data.length);      
  
  }

	// function getProductInventory(){			
	// 	$.ajax({
	// 		type: "POST",
	// 		url: url_willbeopname,
	// 		dataType: 'json',
	// 		async: false,
	// 		data: {
	// 			// text2display: $('#barcode').val()				
	// 		},
	//   		success: refillTable
	// 	});		
	// }

  function getWillOpnameList($opname_date){
   $.ajax({
      type: "POST",
      url: url_willbeopname,
      dataType: 'json',
      async: false,
      data: {
        opname_date: $opname_date
      },
        success: refillTable
    });    
  }
    function opnameAStock(e){
      
    }

    function refillTable(data){
      $tablen.hide();
      $("tbody",$tablen).remove().empty();

      $tbody = $tablen.append("<tbody />");
      $("thead th", $tablen).addClass("text-center");
      $.each(data.data, function(i,v){        
        var action_buttons = $("<div />").addClass("btn-group")
                                                .append($("<button />").addClass("btn_opname_individual").attr("barcode",v.barcode).addClass("btn btn-sm btn-success").html("Update ").append($("<i/>").addClass("fa fa-check")));

        var jenis  = $("<div />").append($("<div />").addClass("badge").html(v.product_category)).append($("<div />").addClass("badge").html(v.product_class));
        var weight = $("<div />").addClass("badge").html(v.weight + " gram(s)");
        var product = $("<div />").append($("<div />").html(v.product_name)).append(jenis).append(weight);
    
        var product_image = $("<div />").css("float","left").css("width","50%").append($("<img />").css("width","100px").attr("src",url_product_image+"/"+v.barcode));
        var product_wrapper = $("<div />").append($("<div />").append(product).css("float","right").css("width","40%").css("margin-left","10%"))
                                          .append(product_image);

        $trow = $("<tr/>")                  
                        .append($("<td />").html("")) //.addClass("text-center").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))
                        .append($("<td />").css("white-space","nowrap").html(v.barcode))                        
                        .append($("<td />").append(product_wrapper))                                                
                        .append($("<td />").append($("<input />").addClass("form-control").addClass("stock-input")))
                        .append($("<td />").html(action_buttons));
        $tbody.append($trow);

        
      });
    	$(".btn_opname_individual", $tbody).on("click", updateOpnameValue);
      tidyDateColumn();
      $tablen.show();
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
      build_picker_day($('#period'));
  	}

    function clear_dateparam(){
      $('#period').val("");
    }
  	
    function build_picker_day(o){
      $(o).datetimepicker('remove');
      $(o).datetimepicker({
            format: "dd MM yyyy",
            autoclose: true,
            todayBtn: true,
            minView: 'year',
            linkField: "periodformatted",
            linkFormat: "yyyy-mm-dd"

        });
    }

  	init();
})	
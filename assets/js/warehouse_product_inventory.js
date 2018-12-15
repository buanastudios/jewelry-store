/** 
 * Author: sakti.buana@arthipesa.com
 * Date: 14/12/2018
 * Time: 06:09 AM
 */

$(function(){
  	var url_inventory = baseurl+'product/itemList';   		
    var url_add_product = baseurl + 'warehouse/product/add';
    var url_remove_product = baseurl + 'product/remove';
    var url_product_image = baseurl + 'product/itemImage';
    var url_export_products = baseurl + 'product/prepareExport';
  	var cur_postdate = Date("Y-M-d"); 
  	var $tablen = $("#inventory");

    $("#add_product").on("click", addmoreproduct);
    $("#deactivate_product_btn").on("click",deactivateSelectedProduct);
    $("#activate_product_btn").on("click",activateSelectedProduct);
    $("#import_products_btn").on("click", importProducts);
    $("#export_products_btn").on("click",exportProducts);

    $("#checkAll").on("change", toggleTickAllRows);

    function exportProducts(){
      var selectedBarcode = $(".checkbox input:checkbox:checked").map(function(){        
        return $(this).parent().parent().attr('barcode');
      }).get();

      console.log(selectedBarcode," are ready to export.");

      $.ajax({
        type: "POST",
        url: url_export_products,
        dataType: 'json',
        async: false,
        data: {
          preparedForExport: selectedBarcode
        },
          success: function(res){
            console.log(res);
          }
      }); 

    }

    function importProducts(){

    }

    // THIS IS THE TOGGLETICKALLROWS FUNCTION WHICH THE NAME IS EXPLAINING ITSELF
    function toggleTickAllRows(e){
      e.preventDefault();
      var status = this.checked;
      console.log(status);

      $(".checkbox input").each(function(){
          this.checked = status;
      });
    }

    // THIS IS THE TOGGLEACTIVATION FUNCTION THAT ACTUALLY WORKS
    function toggleActivation(status=true){
      var selectedRow = $(".checkbox input:checkbox:checked").map(function(){
        // return $(this).val();
        return $(this).parent().parent();
    }).get();
      var selectedBarcode = $(".checkbox input:checkbox:checked").map(function(){        
        return $(this).parent().parent().attr('barcode');
    }).get();
      var selectedToggle = $(".checkbox input:checkbox:checked").map(function(){        
        return $(this).parent().parent().find('.product_status');
    }).get();

      $(selectedToggle).each(function(){
        $("input:checkbox",this).each(function(){
          this.checked = status;
        });
      });      
    }

    function activateSelectedProduct(e){
        e.preventDefault();
        toggleActivation(true);
    }

    // THIS IS THE TESTING FUNCTION FOR TOGGLE-ING
    // function xyx(){
    //   var selectedRow = $(".checkbox input:checkbox:checked").map(function(){
    //     // return $(this).val();
    //     return $(this).parent().parent();      
    //   }).get();

    //   var selectedBarcode = $(".checkbox input:checkbox:checked").map(function(){        
    //     return $(this).parent().parent().attr('barcode');
    // }).get();
    //   var selectedToggle = $(".checkbox input:checkbox:checked").map(function(){        
    //     return $(this).parent().parent().find('.product_status');
    // }).get();

    //   $(selectedToggle).each(function(){
    //     $("input:checkbox",this).each(function(){
    //       this.checked = true;
    //     });
    //   });

    //   console.log(selectedRow);
    //   console.log(selectedBarcode);
    //   console.log(selectedToggle);
        
    // }

    function deactivateSelectedProduct(e){
        e.preventDefault();
        toggleActivation(false);
    }

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
        var product_properties_priceperweight = $("<div />").addClass("badge").html(v.currency+ " " +v.value_perweight);        
        var product_wrapper_right = $("<div />")  
                                                .css("float","right")
                                                .css("width","40%")
                                                .css("margin-left","10%")
                                                .append(product_properties_name)
                                                .append(product_properties_class)
                                                .append(product_properties_weight)
                                                .append(product_properties_priceperweight);

        var product_wrapper = $("<div />").css("width","200px").append(product_wrapper_left).append(product_wrapper_right);
        var product_barcode = $("<div />").addClass("text-center").css("height","100px").css("padding","10px").css("background-color","white").append("<img src='http://localhost/courses/derry/jewelry-store/vendor/barcodegen.1d-php5.v2.2.0/html/image.php?code=code128&amp;o=1&amp;dpi=72&amp;t=30&amp;r=1&amp;rot=0&amp;text="+v.barcode+"&amp;f1=Arial.ttf&amp;f2=8&amp;a1=&amp;a2=&amp;a3=' alt='Barcode Image'>");

        // var product_status = $("<div />").addClass("badge");

        var toggle_ = $("<label />")
                      .addClass("switch");

                      // .append($("<input />").attr("type","checkbox").attr("checked","checked"))
                      // .append($("<span />").addClass("slider round"));

        var product_status = $("<div />").addClass("product_status").append(toggle_);

        if (parseInt(v.status)>0){
            toggle_.append($("<input />").attr("type","checkbox").attr("checked","checked"))
                      .append($("<span />").addClass("slider round"));
          // product_status.addClass("active").append($("<small />").html("<strike>Not</strike> Active"));
        }else{
          toggle_.append($("<input />").attr("type","checkbox"))
                      .append($("<span />").addClass("slider round"));
          // product_status.addClass("inactive").append($("<small />").html("Not Active"));
        }                                         

        var last_column = $("<div />").append(product_status).append(action_buttons);

        $trow = $("<tr/>").attr("barcode",v.barcode)                  
                        .append($("<td />").addClass("text-center align-middle").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))
                        .append($("<td />").html(product_barcode))
                        .append($("<td />").html(product_wrapper))                                              
                        .append($("<td />").addClass("text-right").html(i + " pc(s)"))
                        .append($("<td />").html(last_column));
        $tbody.append($trow);

        

      });

      tidyDateColumn();

      $($tbody).on( "click", ".btn_row_remove", remove_row);
    }

    function remove_row(e){
      e.preventDefault();
      console.log("initiate function: remove_row");
      var thisRow = $(this).parent().parent().parent().parent();
      var barcode = thisRow.attr("barcode");
      console.log("aquiring target: " , $(thisRow));
      console.log("aquiring barcode: " + barcode);
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
      console.log("removed product: "+barcode);
      console.log("end function: remove_row");
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
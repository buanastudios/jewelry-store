/** 
 * Author: sakti.buana@arthipesa.com
 * Date: 14/12/2018
 * Time: 06:09 AM
 */

$(function(){
  	var url_inventory = baseurl+'product/itemList';   		
    var url_inventory_current_stock = baseurl+'product/currentStock';       
    var url_inventory_add_stock = baseurl+'product/addStock';       
    var url_add_product = baseurl + 'warehouse/product/add';
    var url_remove_product = baseurl + 'product/remove';
    var url_product_image = baseurl + 'product/itemImage';
    var url_export_products = baseurl + 'product/prepareExport';
    var url_import_products = baseurl + 'warehouse/product/import';
    var url_opname_products = baseurl + 'warehouse/stock/opname';
    var url_change_product_status = baseurl + 'product/changeProductStatus';
  	var cur_postdate = Date("Y-M-d"); 
  	var $tablen = $("#inventory");

    $("#add_product").on("click", addmoreproduct);
    $("#deactivate_product_btn").on("click",deactivateSelectedProduct);
    $("#activate_product_btn").on("click",activateSelectedProduct);
    $("#import_products_btn").on("click", importProducts);
    $("#export_products_btn").on("click",exportProducts);
    $("#printbarcode_product_btn").on("click", printProductBarcodes);
    $("#checkAll").on("change", toggleTickAllRows);
    $("#opname_product_btn").on("click", opnameProduct);


    function opnameProduct(e){
      e.preventDefault(); 
      window.location.href = url_opname_products;
    }  
    function toggleSwitch(e){
      e.preventDefault();      
      var selectedBarcode = $(this).parent().parent().parent().parent().parent().attr("barcode");
      var isOn = $("input[type=checkbox]", $(this).parent()).prop('checked');
      console.log(selectedBarcode, isOn);      

      // $.ajax({
      //   type: "POST",
      //   url: url_change_product_status,
      //   dataType: 'json',
      //   async: false,
      //   data: {
      //     barcode: selectedBarcode
      //   },
      //   success: function(res){
      //       console.log(res);
      //       alert(res.status);
      //     }
      // }); 

    }
    function printProductBarcodes(e){
      // e.preventDefault();

      // var selectedBarcode = $(".checkbox input:checkbox:checked").map(function(){        
      //   return $(this).parent().parent().attr('barcode');
      // }).get();

      // console.log(selectedBarcode," are ready to print.");

    }


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
            alert(res.status);
          }
      }); 

    }

    function importProducts(e){
      e.preventDefault();
      window.location.href = url_import_products;
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
                                                .append($("<button />").addClass("btn btn-sm btn-outline-success btn_row_add").html($("<i/>").addClass("fa fa-plus")))
                                                // .append($("<button />").addClass("btn btn-sm btn-outline-warning btn_row_edit").html($("<i/>").addClass("fa fa-edit")))
                                                .append($("<button />").addClass("btn btn-sm btn-outline-danger btn_row_remove").html($("<i/>").addClass("fa fa-trash")))
        var jenis  = $("<div />").append($("<div />").html(v.product_category)).append($("<div />").html(v.product_class));

        var product_wrapper_left = $("<div />").css("float","left").css("width","50%").html("<img src="+url_product_image+"/"+v.barcode+" style='width: 100%;' />");
        var product_properties_barcode = $("<div />").css("white-space","nowrap").html(v.barcode);        
        var product_properties_name = $("<div />").css("white-space","nowrap").html(v.product_name);        
        var product_properties_class = $("<div />").addClass("badge").html(v.product_class);        
        var product_properties_weight = $("<div />").addClass("badge").html(v.weight+ " gram");        
        var product_properties_priceperweight = $("<div />").css("white-space","nowrap").append($("<small />").css("white-space","nowrap").html(numeral(v.value_perweight).format('$ 0,0.00')));
        var product_wrapper_right = $("<div />")  
                                                .css("float","right")
                                                .css("width","40%")
                                                .css("margin-left","10%")
                                                .append(product_properties_barcode)
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
        // console.log(v.barcode, v.status);
        if (parseInt(v.status)>0){
            toggle_.append($("<input />").addClass("btn_product_status").attr("type","checkbox").attr("checked","checked"))
                      .append($("<span />").addClass("slider round"));
          // product_status.addClass("active").append($("<small />").html("<strike>Not</strike> Active"));
        }else{
          toggle_.append($("<input />").addClass("btn_product_status").attr("type","checkbox"))
                      .append($("<span />").addClass("slider round"));
          // product_status.addClass("inactive").append($("<small />").html("Not Active"));
        }                                    

        product_status = "";     

        var last_column = $("<div />").append(product_status).append(action_buttons);

        $trow = $("<tr/>").attr("barcode",v.barcode)                  
                        .append($("<td />").addClass("text-center align-middle").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))
                        .append($("<td />").html(product_barcode))
                        .append($("<td />").html(product_wrapper))                                              
                        .append($("<td />").addClass("text-right product_stock").html("0 pc(s)"))
                        .append($("<td />").html(last_column));
        
        $tbody.append($trow);

      });

      tidyDateColumn();
      
      $($tbody).on( "click", ".btn_row_add", add_stock_on_row);
      $($tbody).on( "click", ".btn_row_edit", edit_row);
      $($tbody).on( "click", ".btn_row_remove", remove_row);
      $($tbody).on( "click", ".btn_product_status", toggleSwitch);

      getStocks($tbody);
    }

    function getStocks(o){
      $("td.product_stock", $(o)).each(function( i,v ){        
        var barcode = $(v).parent().attr("barcode");
        //hopely faster
        gettingReadyStocks(barcode, $(v));

        //slower method;
        // var stock_amount = getReadyStock(barcode);
        // if (parseInt(stock_amount) > 1){
        //   stock_amount = stock_amount + " pcs";
        // }else{
        //   stock_amount = stock_amount + " pc";
        // }

        // $(v).html(stock_amount);
      });
    }
    function add_stock_on_row(e){      
      e.preventDefault();
      console.log("initiate function: add_stock_on_row");
      var thisRow = $(this).parent().parent().parent().parent();
      var barcode = thisRow.attr("barcode");
      console.log("aquiring target: " , $(thisRow));
      console.log("aquiring barcode: " + barcode);
      
      console.log("added stock on product: "+barcode);
      console.log("end function: add_stock_on_row");

      $modaladdstock = $("<div />").addClass("modal fade")
                          .attr("id","addStockModal")
                          .attr("barcode", barcode)
                          .attr("tabindex","-1")
                          .attr("role","dialog")
                          .attr("aria-labelledby","exampleModalLabel")
                          .attr("aria-hidden","true");
      $modaldialog = $("<div />").addClass("modal-dialog modal-sm modal-dialog-centered").attr("role","document");
      $modalcontent = $("<div />").addClass("modal-content");
        $modaltitle = $("<h5 />").addClass("modal-title").attr("id","exampleModalLabel").html("Penambahan " + barcode);
        $modalclosebutton = $("<button />").attr("type","button").addClass("close").attr("data-dismiss","modal").attr("aria-label","Close")
                            .append($("<span />").attr("aria-hidden","true").html("&times;"));
        //CONTENT  
          //HEADER
          $modalheader = $("<div />").addClass("modal-header").append($modaltitle).append($modalclosebutton);            
          //BODY
          $modalbody = $("<div />").addClass("modal-body");
              $modalbody_form_group_content = [];
              $modalbody_form_group_content[0] = $("<label />").attr("for","add-new-stock").addClass("col-md-6 col-form-label").html("Jumlah");
              $modalbody_form_group_content[1] = $("<div />").addClass("col-md-6 ml-auto").append($("<input />").attr("type","number").attr("id","add-new-stock").addClass("form-control").val(0));            
            $modalbody_form_group = [];
            $modalbody_form_group[0] = $("<div />").addClass("form-group row").append($modalbody_form_group_content[0]).append($modalbody_form_group_content[1]);          
            $modalbody_form = $("<form />").append($modalbody_form_group[0]);
           $modalbody.append($modalbody_form);
           //FOOTER
           $modalfooter_btn = [];
           $modalfooter_btn[0] = $("<button />").attr("type","button").addClass("btn btn-secondary").attr("data-dismiss","modal").html("Close");
           $modalfooter_btn[1] = $("<button />").attr("type","button").addClass("btn btn-primary btn_add_stock").html("Save");
           $modalfooter = $("<div />").addClass("modal-footer").append($modalfooter_btn[0]).append($modalfooter_btn[1]);            
        //END OF CONTENT

        $modalcontent.append($modalheader).append($modalbody).append($modalfooter);
        $modaldialog.append($modalcontent);
        $modaladdstock.append($modaldialog);

        $("#addStockModal", "body").remove();
        $("body").prepend($modaladdstock);
        $modaladdstock.modal("show");

        $(".btn_add_stock", "#addStockModal").on("click", add_stock);
        $('#addStockModal').on('hidden',function(e){
          $(this).remove();
        });
    }

    function add_stock(e){
      e.preventDefault();      
      var x = $(this).parent().parent();
      var $content = $(this).parent().parent();
      var addedstockvalue = parseInt($("#add-new-stock", $content).val());
      var barcode = $content.parent().parent().attr("barcode");
      console.log("Trying to add new stock ",addedstockvalue, barcode);

      $.ajax({
        type: "POST",        
        url: url_inventory_add_stock,
        dataType: 'json',
        async: false,
        data: {
          barcode: barcode,
          stock: addedstockvalue
        },
        success : getResponseAfterAddStock,
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                } 
      }); 

    }


    function edit_row(e){      
      e.preventDefault();
      console.log("initiate function: edit_row");
      var thisRow = $(this).parent().parent().parent().parent();
      var barcode = thisRow.attr("barcode");
      console.log("aquiring target: " , $(thisRow));
      console.log("aquiring barcode: " + barcode);

      console.log("edit product: "+barcode);
      console.log("end function: edit_row");
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

    function getSuccessResponseAfterAddStock(o){
      getResponseAfterAddStock();
    }

    function getErrorResponseAfterAddStock(o){
      getResponseAfterAddStock();
    }

    function getResponseAfterAddStock(){            
      $('.modal').removeClass('in');
      $('.modal').attr("aria-hidden","true");
      $('.modal').css("display", "none");
      $('.modal-backdrop').remove();
      $('body').removeClass('modal-open');
      
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

    function getReadyStock(barcode){
      var stock_amount = 0;
      $.ajax({
        type: "POST",
        url: url_inventory_current_stock,
        dataType: 'json',
        async: false,
        data: {
          barcode: barcode
        },
        success : function(res){                    
          stock_amount = res.data[0].stock_amount;
        }
      });    
      return stock_amount;
    }

    function gettingReadyStocks (barcode, o){
      var stock_amount = 0;
      var placeholder = $(o);
      $.ajax({
        type: "POST",
        url: url_inventory_current_stock,
        dataType: 'json',        
        data: {
          barcode: barcode
        },
        success : function(res){                    
          stock_amount = res.data[0].stock_amount;
          
          if (parseInt(stock_amount) > 1){
            stock_amount = stock_amount + " pcs";
          }else{
            stock_amount = stock_amount + " pc";
          }

          $(placeholder).html(stock_amount);
        }
      });          
    }

    function init(){    	
      numeral.locale('id');
  		getProductInventory();
  	}
  	
  	init();
})	
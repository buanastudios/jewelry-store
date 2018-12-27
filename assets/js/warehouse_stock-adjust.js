$(function(){
  var url_inventory = baseurl + 'product/itemList';       
  var url_product   = baseurl + 'product/readystock';
  var url_adjustment    = baseurl + 'inventory/adjustment';
  var url_willbeadjusted          = baseurl + 'inventory/getAdjustmentList';
  var url_singlewillbeadjusted    = baseurl + 'inventory/getAdjustmentSingleBarcode';
  var url_product_image = baseurl + 'product/itemImage';
  var url_adjustedlist_per_barcode = baseurl + 'inventory/getAdjustmentListPerBarcode';

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

  function updateAdjustmentValue(o){
    o.preventDefault();    
    var therow = $(this).parent().parent().parent();
    // console.log(therow);
    var p = $("#periodformatted").val();
    var u = $("#user_logged").text();
    if (p.length > 9){
      var update_props =  { 
                          opname_date: p,
                          barcode: $(this).attr("barcode"),
                          adjusted_stock: parseInt(therow.find(".stock-adjustment-input-amount").val()),
                          adjusted_description: $.trim(therow.find(".stock-adjustment-input-description").val())
                        };

      console.log("Updating ... ");
      console.log(update_props);

      therow.find(".stock-adjustment-input-amount").val("");
      therow.find(".stock-adjustment-input-description").val("");

      if( u.length > 0){  
        if (update_props ['barcode'] != ''){
            $.ajax({
              type: "POST",
              url: url_adjustment,
              dataType: 'json',
              data: update_props,
              success: function(res){
                console.log(res);
                console.log('consider done');
                $("input.status_notif").val("Adjustment has made to "+ update_props['barcode']);  
                //when it's done its row disappear
                // therow.fadeOut('slow');
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

  function showListAdjustments(e){
    e.preventDefault();
    console.log("initiate function: showListAdjustments");    
    var p = $("#periodformatted").val();
    var barcode = $(this).attr('barcode');    
    if (p.length > 9){
        console.log('getting adjustments list for barcode:'+barcode);
        getAdjustmentListPerBarcode(barcode, p);
    }else{
      alert('choose period of opname first'); 
    }        
    console.log("end of function: showListAdjustments");
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
        url: url_singlewillbeadjusted,
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

  function getAdjustmentListPerBarcode(barcode, opname_date){
   $.ajax({
      type: "POST",
      url: url_adjustedlist_per_barcode,
      dataType: 'json',      
      data: {
        barcode: barcode,
        opname_date: opname_date
      },
        success: showAdjustmentList
    });    
  }

  function showAdjustmentList(res){
      console.log(res);
      console.log(res.data.data);
      barcode = res.parameters.barcode;
      var x = $.find(".btn_adjustment_individual_list");
      console.log(x);
      var y = $.find(".btn_adjustment_individual_list[barcode="+barcode+"]");
      var placeholder = $(y).parent().parent();
      var line;
      var ul =  $("<div />").addClass("list-group");
      $.each(res.data.data, function (i,v){
        line = $("<li />").addClass("list-group-item").html(v.input_adjustment_date + "&nbsp;&raquo;&nbsp;" + v.stock_adjustment +"&nbsp;pc(s)"+ "&nbsp;&raquo;&nbsp;" + v.adjustment_description);
        line = $("<a />").attr("href", "#").addClass("list-group-item list-group-item-action flex-column align-items-start list-group-item-dark")
                          .append($("<div />").addClass("d-flex w-100 justify-content-between")
                                              .append($("<h6 />").addClass("mb-1").html(v.stock_adjustment+"&nbsp;pc(s)"))
                                              .append($("<small />").html(v.input_adjustment_date))
                                  )
                          .append($("<p />").addClass("mb-1").html("Pernyataan: " + v.adjustment_description))
                          .append($("<small />").html("Oleh "+v.inventory_officer_id))
        $(ul).append($(line));
      });
      $(placeholder).append($(ul));

  }

  function getWillOpnameList($opname_date){
   $.ajax({
      type: "POST",
      url: url_willbeadjusted,
      dataType: 'json',      
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
                                                .append($("<button />").addClass("btn_adjustment_individual").attr("barcode",v.barcode).addClass("btn btn-sm btn-outline-success").html("Save Adjustment").prepend($("<i/>").addClass("fa fa-save").html("&nbsp;")))
                                                .append($("<button />").addClass("btn_adjustment_individual_list").attr("barcode",v.barcode).addClass("btn btn-sm btn-outline-success").html("Adjustments").prepend($("<i/>").addClass("fa fa-list").html("&nbsp;")));
        var product_barcode = $("<div />").append($("<small />").addClass("").css("white-space","nowrap").html(v.barcode));
        var jenis  = $("<div />").append($("<div />").addClass("").html(v.product_category)).append($("<div />").addClass("").html(v.product_class));
        var weight = $("<div />").addClass("").html(v.weight + " gram(s)");

        var product = $("<div />").append($("<div />").html(v.product_name)).append(product_barcode).append(jenis).append(weight);
    
        var product_image = $("<div />").css("float","left").css("width","50%").append($("<img />").css("width","100px").attr("src",url_product_image+"/"+v.barcode));
        var product_wrapper = $("<div />").append($("<div />").append(product).css("float","right").css("width","40%").css("margin-left","10%"))
                                          .append(product_image);
        var row1_adjust = $("<div />").addClass("form-group row")
                          .append($("<label />").addClass("col-sm-4 col-form-label").html("Amount"))
                          .append($("<div />")
                                  .addClass("col-sm-8")
                                  .append($("<input />").attr("type","text").addClass("form-control").attr("placeholder","Amount"))
                                  );
        var row2_adjust = $("<div />").addClass("form-group row")
                          .append($("<div />")
                                  .addClass("col-sm-3")
                                  .append($("<input />").attr("type","text").addClass("form-control stock-adjustment-input-amount").attr("placeholder","Amount"))
                                  )
                          .append($("<div />")
                                  .addClass("col-sm-6")
                                  .append($("<input />").attr("type","text").addClass("form-control stock-adjustment-input-description").attr("placeholder","Description"))
                                  );
        var row3_adjust = action_buttons;

        $trow = $("<tr/>")                  
                        .append($("<td />").css("width","70px").addClass("text-center").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))                        
                        .append($("<td />").css("width","200px").append(product_wrapper))
                        .append($("<td />").css("width","200px")
                                            .append($("<div />")
                                                      .append($("<small />").css("white-space","nowrap")
                                                                  .append($("<span />").html("in System&nbsp;&raquo;&nbsp;"))
                                                                  .append($("<span />").addClass("stock-starting").html(v.stock_starting))
                                                              ) // STOCK IN SYSTEM
                                                      )
                                            .append($("<div />")
                                                      .append($("<small />").css("white-space","nowrap")
                                                                  .append($("<span />").html("when Opname&nbsp;&raquo;&nbsp;"))
                                                                  .append($("<span />").addClass("stock-opname").html(v.stock_opname))
                                                              ) // STOCK OPNAME
                                                      )                                            
                                            .append($("<div />")
                                                    .append($("<small />").css("white-space","nowrap")
                                                                .append($("<span />").html("Adjustment&nbsp;&raquo;&nbsp;"))
                                                                .append($("<span />").addClass("stock-discrepency").html(v.stock_adjustment))
                                                            ) // STOCK DISCREPENCY                                  
                                                    )
                                            .append($("<div />")
                                                    .append($("<small />").css("white-space","nowrap")
                                                                .append($("<span />").html("Discrepency Before Adjustment&nbsp;&raquo;&nbsp;"))
                                                                .append($("<span />").addClass("stock-discrepency").html(v.stock_before_adjustment))
                                                            ) // STOCK DISCREPENCY                                  
                                                    )
                                            .append($("<div />")
                                                    .append($("<small />").css("white-space","nowrap")
                                                                .append($("<span />").html("Discrepency After Adjustment&nbsp;&raquo;&nbsp;"))
                                                                .append($("<span />").addClass("stock-discrepency").html(v.stock_after_adjustment))
                                                            ) // STOCK DISCREPENCY                                  
                                                    )

                                  )
                        .append($("<td />").css("width","300px")
                                           .append($("<div />").append(row2_adjust).append(row3_adjust)));
                        // .append($("<td />").html(action_buttons));
        $tbody.append($trow);

        
      });
      $(".btn_adjustment_individual", $tbody).on("click", updateAdjustmentValue);
      $(".btn_adjustment_individual_list", $tbody).on("click", showListAdjustments);
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
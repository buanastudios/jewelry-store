$(function(){    
  //var baseurl = "http://localhost:85/courses/derry/jewelry-store";
  var url_sales = baseurl+'transaction/sales/history'; 
  var url_purchase = baseurl+'transaction/purchase'; 
  var url_sales_rank = baseurl+'transaction/sales/rank'; 
  var url_purchase_rank = baseurl+'transaction/purchase/rank'; 
  var url_list = url_sales;
  var url_list_p_rank = url_purchase_rank;
  var url_list_s_rank = url_sales_rank;
  
  var cur_postdate = Date("Y-M-d"); 
  var $tablen = $("#transaction_history");
  var $tablenrank_s = $("#cashier_s_transactions");
  var $tablenrank_p = $("#cashier_p_transactions");
  
  function randomToggleTableSource(){
   if (url_list == url_sales){
      url_list = url_purchase;
    }else if(url_list == url_purchase){
      url_list = url_sales;
    }
    console.log(url_list);
  }
  
  function toggleTableSource(o){
    o.preventDefault();
    //console.log($(o).attr('id')); 
    //console.log($(o)); 
    //console.log($(this).id); 
    //console.log($(this).map(function(index,dom){return dom.id}));
    var buttonPressed = $(this).get(0).id;
    switch(buttonPressed){
      case "toggle_sales": url_list = url_sales; break;
      case "toggle_purchase": url_list = url_purchase; break;
      default: url_list = url_sales; 
    }
  
    refresh_the_table(url_list);    
  }

  $(".togglehistory").on("click",toggleTableSource);

  function refresh_the_table(url_list){    
    $tablen.bootstrapTable('refresh', {url: url_list});
    // $tablenrank.bootstrapTable('refresh'), {url:url_list_rank});
  }

  function dateFormatter (value, row, index, options) {
    moment.locale('id');
    return moment(value).format("ll");
  }

  function dateCellStyle(value, row, index, options){
    var styling = {css:{"white-space": "nowrap",} };
    return styling;
  }

  function timeFormatter (value, row, index, options) {
    moment.locale('id');
    return moment(value).format("HH:mm:ss");
  }

  function timeCellStyle(value, row, index, options){
    var styling = {css:{"white-space": "nowrap",} };
    return styling;
  }

  function timesFormatter (value, row, index, options) {
    return value+' x';
  }

  function amountCellStyle(value, row, index, options){
    var styling = {css:{"white-space": "nowrap",} };
    return styling;
  }

  function amountFormatter(value, row, index, options){
    numeral.locale('id');
    var n = numeral(value);
    return n.format('$ 0,0.00');
  }

  function productFormatter (value, row, index, options){    
    var html = "<span>"+row.product_name + "&nbsp;<span class='badge badge-warning'>"+row.product_class+"<span /></span>";
    return html;
  }

  function weightFormatter(value, row, index, options){
     var html = "<span>"+row.unit_weight + " kg </span>";
     return html;
  }

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
                    field: 'trx_date',
                    title: 'Date', 
                    halign: 'center',
                    cellStyle: dateCellStyle,
                    formatter: dateFormatter
                  },
                  {
                    field: 'trx_date',
                    title: 'Time',
                    halign: 'center',
                    cellStyle: timeCellStyle,
                    formatter: timeFormatter
                  },
                  {
                    field: 'invoice_num',
                    halign: 'center',
                    align: 'left',
                    title: 'Invoice#'
                  },
                  {
                    field: 'cashier_name',
                    title: 'Cashier',
                    halign: 'center',
                    align: 'left'
                  },
                  {
                    field: 'product_name',
                    title: 'Product',
                    halign: 'center',
                    align: 'left',
                    formatter: productFormatter
                  },
                  {
                    field: 'unit_weight',
                    title: 'Weight',
                    align: 'right',
                    halign: 'center',
                    formatter: weightFormatter
                  },
                  {
                    field: 'invoice_amount',
                    title: 'Sum',
                    halign: 'center',
                    align: 'right',
                    cellStyle: amountCellStyle,
                    formatter: amountFormatter
                  }]
    });

  $tablenrank_s.bootstrapTable({
        idField: 'id',
        pagination: true,
        search: false, 
        showColumns: false,
        url: url_list_s_rank,
        columns: [                                        
                  {
                    field: 'nama',
                    title: 'Cashier',
                    halign: 'center',
                    align: 'left'
                  },
                  {
                    field: 'sum_trx',
                    title: 'Transactions',
                    halign: 'center',
                    align: 'right',
                    formatter: timesFormatter
                  }]
    });
    
    $tablenrank_p.bootstrapTable({
        idField: 'id',
        pagination: true,
        search: false, 
        showColumns: false,
        url: url_list_p_rank,
        columns: [                                        
                  {
                    field: 'nama',
                    title: 'Cashier',
                    halign: 'center',
                    align: 'left'
                  },
                  {
                    field: 'sum_trx',
                    title: 'Transactions',
                    halign: 'center',
                    align: 'right',
                    formatter: timesFormatter
                  }]
    });

    $("#row_remove").on("click", remove_items);
    $("#rows_refresh").on("click", reload_items);

    function reload_items(e){
      e.preventDefault();
      refresh_the_table(url_list);
    }
    function remove_items(e){
      e.preventDefault();
      var ids = $.map($tablen.bootstrapTable('getSelections'), function(row) {
                    return row.id;
                 });

      $tablen.bootstrapTable('remove', {      field: 'id',      values: ids   });
      $.each(ids, function(index, value) {
          console.log(value);
        // $.ajax({
        //   type: "POST",
        //   url: url_remove,
        //   dataType: 'json',
        //   data: {
        //       id: value
        //       },
        //   success: function(res) {
        //     console.log("success");
        //     var notif = $(".activity", notification_html[4]).html("row# " + value + " has been deleted.");
        //     generateNotification('success', notif);

        //     $tablen.bootstrapTable('refresh', {url: url_list});
        //   }
        // });
      });

    }
});
$(function(){    
  var baseurl = "http://localhost:85/courses/derry/jewelry-store";
  var url_sales = baseurl+'/transaction/sales'; 
  var url_purchase = baseurl+'/transaction/purchase'; 
  var url_list = url_sales;

  
  var cur_postdate = Date("Y-M-d"); 
  var $tablen = $("#transaction_history");
  
  function init(){

  }

  function refresh_the_table(url_list){    
    $tablen.bootstrapTable('refresh', {url: url_list});    
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

  

});
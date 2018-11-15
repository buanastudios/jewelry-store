$(function(){      
  var url_salary_insert = baseurl+'transaction/sales'; 
  var url_transaction = baseurl+'transaction/salary';   
  var url_employee_list = baseurl + 'employee/searchByTerm';
  var $tablen = $("#transactions_list");

  // $("#existed_expense_label").on("change",ensurefirstradioselected);
  // $("#new_expense_label").on("change",ensureradioselected);
  // $("#btn_save_trx").on("click", save_trx);
  // $("#btn_manage_label").on('click', managelabels);
  // 
  $("#makepayment").on('click', makePayment);

  $("#periode").daterangepicker();

  function makePayment(o){
    o.preventDefault();
    var employeeName  = $("#employee").select2('data')[0]['text'];
    var keterangangaji = 'Gaji '+employeeName+' periode '+ $("#periode").val();
    var recap_data = {
      'trx_type':'5',     
      'trx_label_id': '34',
      'trx_amount': $("#salary_amount").val(),
      'trx_description': keterangangaji
    }
    
    console.log(recap_data);

    $.ajax({
      url: baseurl + 'transaction/insert_salary',
      type: 'POST',
      async: false,
      data:recap_data,
      success: function(res){
        console.log(res);
      }
    })

    getTransactions();
  }

  function getTransactions(){     
      $.ajax({
        type: "POST",
        url: url_transaction,
        dataType: 'json',
        async: false,
        data: {
          // text2display: $('#barcode').val()        
        },
          success: refillTable
      });   
    }

  $("#employee").select2({
    tags: false,
    multiple: false,
    tokenSeparators: [',', ' '],
    minimumInputLength: 4,
    minimumResultsForSearch: 10,
    templateResult: function(result) {
        var rs = $("<div />").addClass("row");
        rs.append($("<div />").addClass("col-lg-2 col-md-2 col-sm-2 col-xs-2").html(result.id));
        rs.append($("<div />").addClass("col-lg-10 col-md-10 col-sm-10 col-xs-10").html(result.text));        
        return rs;
    },
    ajax: {
        url: url_employee_list,
        dataType: "json",
        type: "GET",
        data: function (params) {

            var queryParameters = {
                term: params.term
            }
            return queryParameters;
        },
      
        processResults: function (data, params) {
            params.page = params.page || 1;
            return {
                results: $.map(data.data, function (item) {
                    return {
                        text: item.fullname,                        
                        id: item.u_id
                    }
                })
            };
        }
      }
  });

  function refillTable(res){    
    $tbody = $("tbody",$tablen).empty();
      $("thead th", $tablen).addClass("text-center");
      var totalamount = 0;

      
      $.each(res.data, function(i,v){        
        totalamount += parseFloat(v.trx_amount);
        var action_buttons = $("<div />").addClass("btn-group")                                                
                                                .append($("<button />").addClass("btn btn-sm btn-danger").html($("<i/>").addClass("fa fa-trash")));
        $trow = $("<tr/>")                  
                        .append($("<td />").addClass("text-center align-middle").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))
                        .append($("<td />").addClass("text-center align-middle").html(moment(v.trx_date).format("ll")))
                        .append($("<td />").addClass("text-center align-middle").html(moment(v.trx_date).format("HH:mm:ss")))
                        .append($("<td />").addClass("text-center align-middle").html(v.label))
                        .append($("<td />").addClass("text-right align-middle").html(numeral(v.trx_amount).format('$ 0,0.00')))
                        .append($("<td />").addClass("text-left align-middle").html(v.trx_description))                        
                        .append($("<td />").addClass("text-center align-middle").append($(action_buttons)));
          $tbody.append($trow);
      });

      $("#totalinpage").empty().html(numeral(totalamount).format('$ 0,0.00'));
  }

  function init(){
      moment.locale('id');
    numeral.locale('id');    
    getTransactions();
  }

  init();
});
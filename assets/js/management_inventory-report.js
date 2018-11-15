$(function(){
  var url_stock = baseurl+'/transaction/stock';   
  var url_stock_sum = baseurl+'/transaction/stock_sum';   
  var url_list = url_stock;  

  var cur_postdate = Date("Y-M-d"); 
  var $tablen = $("#stock_report");

  function getProductInventorySum(){      
    $.ajax({
      type: "POST",
      url: url_stock_sum,
      dataType: 'json',
      async: false,
      data: {
        // text2display: $('#barcode').val()        
      },
        success: refillSumTable
    });   
  }

  function getProductInventory(){     
    $.ajax({
      type: "POST",
      url: url_stock,
      dataType: 'json',
      async: false,
      data: {
        // text2display: $('#barcode').val()        
      },
        success: refillTable
    });   
  }

    function refillTable(data){
      $.each($("th", $('thead', $tablen)),function(i,v){
        $(v).addClass("text-center");
      });

      $('tbody',$tablen).empty();
      $.each(data.data, iterateData);
      getProductInventorySum();

      tidyDateColumn();
    }

    function tidyDateColumn(){
      var seen = {};
    $.each($("tr", $('tbody', $tablen)),function(i,v){
        // var thet = $(v).find("td:not(:first)").text();
        var tcol = $(v).find("td:first");
        var thet = $(v).find("td:first").text();
        
        if (seen[thet]){
          seen[thet] += 1;            
          // $(tcol).attr("rowspan",seen[thet]);
          $(tcol).remove();         
      }else{
          seen[thet] = 1;
      }
      });     

    $.each($("tr", $('tbody', $tablen)),function(i,v){
      var thekey = $(v).find("td:first").text();
      var tcol = $(v).find("td:first");     
      if (seen[thekey]){          
          $(tcol).attr("rowspan",seen[thekey]);                   
      }
    });

  //    .each(function() {
    //   var txt = $(this).find("td:not(:first)").text();
      
    //   if (seen[txt])
    //     $(this).remove();
    //   else
    //     seen[txt] = true;
    // });
    }

    function iterateData(i,v){                  

      $('tbody',$tablen).append($("<tr/>")
                        .append($("<td/>").addClass("text-center").html(v.trx_date))
                        .append($("<td/>").addClass("text-center").html(v.product_category))                        
                        .append($("<td/>").addClass("quantity_unit").addClass("text-right").append($("<span/>").html(v.count_sum)).append($("<span/>").html("&nbsp;piece")))
                        .append($("<td/>").addClass("weight_unit").addClass("text-right").append($("<span/>").html(v.weight_sum)).append($("<span/>").html("&nbsp;gram")))
                        .append($("<td/>").addClass("quantity_sum").attr('trx_date',v.trx_date).attr('activity',v.description))
                        .append($("<td/>").addClass("weight_sum").attr('trx_date',v.trx_date).attr('activity',v.description))
                        .append($("<td/>").addClass("description_act").addClass("text-center").html(v.description))
                    );      
    }

    function refillSumTable(data){
      $thebody = $('tbody',$tablen);
      $thecolumn = $('td.quantity_sum', $thebody);      
      $theweightcolumn = $('td.weight_sum', $thebody);    

    $the_quantityperunit_column = $('td.quantity_unit', $thebody);      
    $the_weightperunit_column = $('td.weight_unit', $thebody);      
    $the_desc_column = $('td.description_act', $thebody);     

      var seen = {};
      var quantity_sum ={};
      var weight_sum ={};

      $.each($thecolumn, function(i,v){

        var thelabel = $(v).attr('trx_date');       
        var theactivity = $(v).attr('activity');        
        var thekey = thelabel+theactivity;
        $(v).html(thekey);        
        $theweightcolumn.eq(i).html(thekey);

        if (seen[thekey]){
          seen[thekey] += 1;            
          quantity_sum[thekey] += parseFloat($the_quantityperunit_column.eq(i).find("span:first").text());
          weight_sum[thekey] += parseFloat($the_weightperunit_column.eq(i).find("span:first").text());

          $(this).remove();
          $theweightcolumn.eq(i).remove();
          $the_desc_column.eq(i).remove();
      }else{
          seen[thekey] = 1;
          quantity_sum[thekey]= parseFloat($the_quantityperunit_column.eq(i).find("span:first").text());
          weight_sum[thekey]= parseFloat($the_weightperunit_column.eq(i).find("span:first").text());
      }
      });

      // console.log(quantity_sum);
      $.each($thecolumn, function(i,v){
        var thelabel = $(v).attr('trx_date');       
        var theactivity = $(v).attr('activity');        
        var thekey = thelabel+theactivity;

        if (seen[thekey]){          
          $(this).attr("rowspan",seen[thekey]);
          $the_desc_column.eq(i).attr("rowspan",seen[thekey]);
          $theweightcolumn.eq(i).attr("rowspan",seen[thekey]).addClass("text-right").empty()
                      .append($("<span/>").html(weight_sum[thekey]))
                      .append($("<span/>").html("&nbsp;gram"));
          $thecolumn.eq(i).addClass("text-right").empty()
                  .append($("<span />").html(quantity_sum[thekey]))
                  .append($("<span />").html("&nbsp;piece"));

      }
      });

      $.each(data.data, iterateSumData);
    }

    function iterateSumData(i,v){
      var $thebody = $('tbody',$tablen);
      // console.log(v.trx_date+v.description);
      var $thecolumn = $('td.quantity_sum', $thebody);
      $.each($thecolumn, function(i,v){
        // console.log(v);
      });
    }

    function init(){
      monthSelectionButton();
      getProductInventory();
    }

    function monthSelectionButton(){
      var mth = [ 'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'];
      var thebutton;

      $("#monthSelection").empty();
      $("#monthSelection").parent().addClass("text-center")
      $.each(mth, function(i,v){
        thebutton = $("<button/>").addClass("btn").addClass("btn-primary").html(v);
        $("#monthSelection").append(thebutton);
      });
    }

    init();
})  
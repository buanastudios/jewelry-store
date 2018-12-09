$(function(){  
    var url_cashbook_sum = baseurl+'accounting/cashbook_sum';     

    var cur_postdate = Date("Y-M-d");   

    $("#search_book_by_date").on("click",search_cashbook);
    $("[name=rep_type]").on("click", build_picker);  
    $("#cleardateparam").on("click", clear_dateparam);

    function clear_dateparam(){
      $('#period').val("");
    }

    function build_picker(e){      
      var p = $("[name=rep_type]:checked").val();  
      console.log(p);
      var o = $('#period');
      o.val("");

      switch(p){
        case 'daily': build_picker_day(o); break;
        case 'monthly': build_picker_month(o); break;
        case 'yearly': build_picker_year(o); break;
      }
    }

    function build_picker_day(o){
      $(o).datetimepicker('remove');
      $(o).datetimepicker({
            format: "dd MM yyyy",
            autoclose: true,
            todayBtn: true,
            minView: 'year'
        });
    }

    function build_picker_year(o){
      $(o).datetimepicker('remove');
      $(o).datetimepicker({
            format: "yyyy",
            autoclose: true,        
            minView: 4,
            maxView: 4,          
            startView: 4,
      });
    }

    function build_picker_month(o){
      $(o).datetimepicker('remove');
      $(o).datetimepicker({
          format: "MM yyyy",
          autoclose: true,          
          minView: 3,          
          maxView:4,
          startView: 3
      });
    }

    function search_cashbook(){
      $("td[trx_type]","#cashbook").html("0");      

      var terms = $("[name=rep_type]:checked").val();          
      var p = $("#period").val();
      // alert(p);
      var r = [];
      r['terms'] = terms;
      r['day'] = '1';
      r['month'] = '10';
      r['year'] = '2018';

      getCashbook(r);
    }

    function getCashbook(rtype){      
      $.ajax({
        type: "POST",
        url: url_cashbook_sum,
        dataType: 'json',
        async: false,
        data: {
          t: rtype['terms'],
          d: rtype['day'],
          m: rtype['month'],
          y: rtype['year'],
        },
          success: refillSumTable
      });   
    }

    function refillSumTable(data){                
        console.log(data);

        $.each(data.data,iterateData);
        
        var thetrx = [];
          thetrx[1] = parseFloat($("td[trx_type=1]", "#cashbook").html()) * 1;
          thetrx[2] = parseFloat($("td[trx_type=2]", "#cashbook").html()) * -1;
          thetrx[3] = parseFloat($("td[trx_type=3]", "#cashbook").html()) * 1;
          thetrx[4] = parseFloat($("td[trx_type=4]", "#cashbook").html()) * -1;
        
        var totalCash = thetrx[1] + thetrx[2] + thetrx[3] + thetrx[4];
        console.log(totalCash);
        
        $("td[trx_type=sum]","#cashbook").html(totalCash);

        formatting();
    }  
    
    function formatting(){
        var thetrx = [];
          thetrx[0] = parseFloat($("td[trx_type=sum]","#cashbook").html());
          thetrx[1] = parseFloat($("td[trx_type=1]", "#cashbook").html());
          thetrx[2] = parseFloat($("td[trx_type=2]", "#cashbook").html());
          thetrx[3] = parseFloat($("td[trx_type=3]", "#cashbook").html());
          thetrx[4] = parseFloat($("td[trx_type=4]", "#cashbook").html());
        var formatted = [];
        
        $.each(thetrx, function(i,v){
            formatted[i] = numeral(v).format('$ 0,0.00');
            $("td[trx_type="+i+"]", "#cashbook").html(formatted[i]);
        });
        
        $("td[trx_type=sum]", "#cashbook").html(formatted[0]);

    }

    function iterateData(i,v){
      console.log(v);
      var thetable = $("#cashbook");
      var thetrx = [];
          thetrx[1] = $("td[trx_type=1]", thetable);
          thetrx[2] = $("td[trx_type=2]", thetable);
          thetrx[3] = $("td[trx_type=3]", thetable);
          thetrx[4] = $("td[trx_type=4]", thetable);      

      //GRAB CURRENT VAL;
      var curr_val = 0;
      curr_val = parseFloat($(thetrx[v.trx_type]).html()); 
      console.log($(thetrx[v.trx_type]));

      console.log(curr_val);
      var new_val = curr_val + parseFloat(v.trx_amount);
      console.log(new_val);

      $(thetrx[v.trx_type]).html(new_val);
    }

    function init(){      
      numeral.locale('id');
      
    }
    
    init();
})  
$(function(){    
  var baseurl = "http://localhost:85/courses/derry/jewelry-store";
  var url_sales = baseurl+'/transaction/sales'; 
  var url_purchase = baseurl+'/transaction/purchase'; 
  var url_list = getTrxToggle();
  
  var cur_postdate = Date("Y-M-d"); 
  var $tablen = $("#transaction_history"); 

  function getTrxToggle(){
    return url_purchase;
  }
  function init_list(){
    $tablen.bootstrapTable({
        idField: 'u_id',
        pagination: true,
        search: true, 
        url: "http://ummuluthfitextile.com/backend/customer/searchByTerm",
        columns: [{
                    field: 'state',
                    title: '#',
                    checkbox:true
                  },
                  {
                    field: 'u_name',
                    title: 'Employee',
          formatter: profileFormatter
                  },
                  {
                    field: 'role_id',
                    title: 'Role',
                    visible: false,
                  },
                  {
                    field: 'role',
                    title: 'Role'
                  },
                  {
                    field: 'lokasi_nama',
                    title: 'Distirbution Area'
                  },
                  {
                    field: 'created_at',
                    title: 'Registered Date'
                  }]
    });
  
    function profileFormatter(value, row, index, field){
      console.log(row);
      var pp = "<div><img width=28 height=28 src='"+baseurl+'/assets/img/users/'+row.avatar_filename+"-160x160.jpg'/>" +row.fullname + "<br/><small>"+row.email+"</small></div>";   
      return pp;
    }
  }
  function init_list2(){                   
    $tablen.bootstrapTable({      
      idField: 'id',      
      pagination: true,     
      search: true,       
      url: url_list,      
      columns: [{ 
            field: 'state', 
            title: '#',
            checkbox:true 
            },

            {
              field: 'trx_date',
              title: 'Date',
              sortable: true 
            },
            {
              field: 'trx_date',
              title: 'Time',
              sortable: true
            },
            {
              field: 'invoice_num',
              title: 'Invoice#',
              sortable: true 
            },
            {
              field: 'cashier',
              title: 'Cashier',
              sortable: true 
            },
            {
              field: 'products_id',
              title: 'Products',
              sortable: true 
            },
            {
              field: 'unit_weight',
              title: 'Weight',
              sortable: true 
            },
            {
              field: 'invoice_amount',
              title: 'Cash',
              sortable: true 
            },
            {
              field: 'invoice_num',
              title: 'Invoice#',
              sortable: true 
            }
             ]}
    );
  }
  
  init_list();

});
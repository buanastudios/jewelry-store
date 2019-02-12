$(function(){
	var url_transaction 		= baseurl + 'transaction/other_income';
	var url_remove 				= baseurl + 'transaction/other_income/delete';
	var url_insert				= baseurl + 'transaction/insert_income';
	var url_insert_new_label 	= baseurl + 'transaction/insert_newlabel';
	var url_transaction_labels 	= baseurl + 'transaction/grab_existinglabels';
	var url_get_session 		= baseurl + "login/api_retrieve_session";
	var is_session_expired = 0;

	var $tablen = $("#transactions_list");

	$("#existed_income_label").on("change",ensurefirstradioselected);
	$("#new_income_label").on("change",ensureradioselected);
	$("#btn_save_trx").on("click", save_trx);
	$("#btn_manage_label").on('click', managelabels);	
	$(".btn_row_remove").on('click', remove_row);	

	function managelabels(o){
		o.preventDefault();
		// window.location.href=""
	}

	function ensurefirstradioselected(){
		$("#radiolabel1").prop("checked", true);
	}

	function ensureradioselected(){
		$("#radiolabel2").prop("checked", true);
	}

	function displayCurrentSession(res){
		console.log(res.data);
		console.log(res.data.u_id);
		console.log(parseInt(res.data.u_id));
		var ensureInteger = parseInt(res.data.u_id);
		if(ensureInteger>0){
			is_session_expired = 0;
		};

		if (res.data.u_id == undefined){
			is_session_expired = 1;		
		};

		console.log(is_session_expired);
	}

	function getCurrentSession(){		
		$.ajax({
			type: "POST",
			async: false,
			url: url_get_session,
			dataType: 'json',
			async: false,				
			success: displayCurrentSession
		});				
	}



	function save_trx(e){
		e.preventDefault();
		var recap_data = {
			'trx_type':'3',			
			'trx_label_id': gettingRadioLabel(),
			'trx_amount': $("#income_amount").val(),
			'trx_description': $("#trx_description").val()
		}
		
		console.log(recap_data);

		getCurrentSession();
		if (is_session_expired>0){			
			alert("SESSION sudah Expired atau belum memilih NAMA KARYAWAN");
		}else{
			$.ajax({
				url: url_insert,
				type: 'POST',
				async: false,
				data:recap_data,
				success: function(res){
					console.log(res);
				}
			})

			getTransactions();
		}
	}
	
	function gettingRadioLabel(){
		var option1 = $("#radiolabel1").prop("checked");
		var option2 = $("#radiolabel2").prop("checked");		

		if (option2){
			// return $("#new_income_label").val();
			return insertNewRadioLabel($("#new_income_label").val());
		}else{
			return $("#existed_income_label").val();
		}
	}

	function insertNewRadioLabel(theLabel){
		var passed_data = {
			'label': theLabel,
			'trx_type_id': 3
		}

		var theLabelInsertedID = 0;

		$.ajax({
			url: url_insert_new_label,
			type: 'POST',			
			async: false,
			data:passed_data,
			success: function(res){
				console.log(res.success.label_id);
				theLabelInsertedID = res.success.label_id;				
			}
		})
		
		return theLabelInsertedID;		
	}

	function init(){
		moment.locale('id');
		numeral.locale('id');    
		getTransactionLabels();
		getTransactions();
	}

	function refillLabels(res){
		var existing_label = $("#existed_income_label");
		var opt_group = $("<optgroup />").attr('label', 'Jenis Jenis Pendapatan');
		existing_label.empty();		
		
		$.each(res.data, function(i,v){ 
			opt_group.append($("<option />").attr("value",v.id).html(v.label));
		});

		existing_label.append(opt_group);
	}

	function refillTable(res){		
		$tbody = $("tbody",$tablen);
		$tbody.empty();
	    $("thead th", $tablen).addClass("text-center");
	    var totalamount = 0;
	    
	    $.each(res.data, function(i,v){        
	    	totalamount += parseFloat(v.trx_amount);
	    	var rem_button = $("<button />")                                                			
	                			.attr("trx_id",v.invoice_num)
	                			.addClass("btn btn-sm btn-danger btn_row_remove")
	                			.html($("<i/>").addClass("fa fa-trash"));

	    	var action_buttons = $("<div />").addClass("btn-group")                                                
                                                .append(rem_button);
			var transaction_column = $("<div />")
                                                .append($("<div />").html(v.label))
                                                .append($("<div />").html("Kasir: "+ v.fullname));                                                
	    	$trow = $("<tr/>")                  
                        .append($("<td />").addClass("text-center align-middle").addClass("checkbox").append($("<input />").attr("type","checkbox").attr("id","check_"+i)))
                        .append($("<td />").addClass("text-center align-middle").html(moment(v.trx_date).format("ll")))
                        .append($("<td />").addClass("text-center align-middle").html(moment(v.trx_date).format("HH:mm:ss")))
                        .append($("<td />").addClass("text-left align-middle").html(transaction_column))              
                        .append($("<td />").addClass("text-right align-middle").html(numeral(parseFloat(v.trx_amount)).format('$ 0,0.00')))
                        .append($("<td />").addClass("text-left align-middle").html(v.trx_description))                        
                        .append($("<td />").addClass("text-center align-middle").append($(action_buttons)));

        	$tbody.append($trow);        	
	    });

	    $($tbody).on( "click", ".btn_row_remove", remove_row);

	    $("#totalinpage").empty().html(numeral(totalamount).format('$ 0,0.00'));
	}

	function remove_row(x){
		x.preventDefault();
		var trx_id = $(this).attr("trx_id");
		var the_row = $(this).parent().parent().parent();
		$.ajax({
  			type: "POST",
  			url: url_remove,
  			dataType: 'json',
  			async: false,
  			data: {
  				trx_id: trx_id
  			}
  			,
  	  		success: function(res){
  	  			the_row.remove();
  	  			// getTransactions();
  	  		}
  		});		
	}

	function getTransactionLabels(){		
		$.ajax({
  			type: "POST",
  			url: url_transaction_labels,
  			dataType: 'json',
  			async: false,
  			data: {
  				trx_label_id: '3'				
  			},
  	  		success: refillLabels
  		});		
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

	init();
});
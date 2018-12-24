$(function(){
	var num2words = numberToWordsInRupiah;
	var url_gen = baseurl + "barcode/test";	
	var url_product_img = baseurl + "product/itemImage";	
	var url_save = baseurl + "transaction/sales/insert";		
	var url_new_invoice = baseurl + "invoice/api_generate_new";		
	var url_get_session = baseurl + "login/api_retrieve_session";
	var url_print_invoice = baseurl + "invoice/print_6";
	var is_session_expired = 0;
	var purchasenotes	= $("tbody","#purchase_notes");

	function init(){
		numeral.locale('id');
		// var theBody = $("#purchase_notes").children("tbody");
		// theBody.empty();
		// $("span#invoice_total").empty();
		// $("#current_product_price").hide();

		resetall();
	}

	init();

	$("#add_to_cart").on("click", add_to_cart);
	$("#print_invoice").on("click", print_invoice);
	$("#new_invoice").on("click", renew_invoice);

	function hitungEmas (pricepergram, totalgram, adjustment){
		console.log(totalgram + "x" + pricepergram + "+" + adjustment);		
		var a = parseFloat(totalgram);
		var x = parseFloat(pricepergram);
		var c = Math.ceil(a*x);
		var b = c + parseFloat(adjustment);
		console.log(a);
		console.log(x);
		console.log(c);
		console.log(b);
		return b;
	}

	var calcTarget = $("[name=pembulatan]"); 
	var newPrice = $("<input id='new_price_per_gram' type='number' />");

	var theNum = 0;
	$("[name=pembulatan]").val(theNum);

	$(newPrice).on("click",function(o){
		o.preventDefault();
		theNum = 0;
		$(this).val(theNum);
		calcTarget= $(this);
	});

	$("#price_per_gram").on("click", function(e){
		e.preventDefault();
		
		var originPrice = parseFloat($(this).text());
		
		$(this).replaceWith(newPrice.val(originPrice).addClass("form-control"));		
		
		calcTarget = newPrice;
	});

	$("[name=pembulatan]").on("click", function(e){
		e.preventDefault();
		theNum = 0;
		$("[name=pembulatan]").val(theNum);
		calcTarget = $(this);
	});
	

	$(".calc_num").on("click", function(e){
		e.preventDefault();
		console.log($(this).attr("data-num"));
		theNum += $(this).attr("data-num");
		calcTarget.val(theNum);
	});		

	$(".calc_ops.minus").on("click", function(e){
		theNum = $("[name=pembulatan]").val();
		theNum = 0 - parseFloat(theNum);
		calcTarget.val(theNum);		
	});

	$(".calc_ops.remove").on("click", function(e){
		e.preventDefault();
		theNum = $("[name=pembulatan]").val();		
		theNum = (theNum.substring(0,theNum.length - 1));
		calcTarget.val(theNum);
	});

	$(".calc_ops.ok").on("click", function(e){
		e.preventDefault();
		// originalNum = parseFloat($("#product_price").text());		
		originalNum = numeral($("#product_price").text()).value();		
		additionalNum = parseFloat($("[name=pembulatan]").val());
		//theNum = originalNum + additionalNum;		
		weightProduct = parseFloat($("#weight_product").text());

		console.log("Original Num: "+originalNum);
		console.log("Weight Product: "+weightProduct);
		console.log("Additional Num: "+additionalNum);

		theNum = hitungEmas($("#new_price_per_gram").val(),weightProduct,additionalNum);
		$("#price_after_calc").val(theNum);
		//theNum = 0;
		//calcTarget.val(theNum);
	});

	// $("#barcode").on("click", getProduct);
	$('#barcode').keyup(function(e){
		e.preventDefault();	
	  if(e.keyCode == 13) {
	  		//alert("searching "+ $(this).val());

		    //$(this).trigger("enterKey");
		    //
			//}
			e.preventDefault();
			
			console.log('button ENTER is pressed');
			getProduct();
		}
	});

	function gettingProductImageResponse(d){
		console.log(d);
	}

	function gettingBarcodeImageResponse(d){
		$(".imagebarcode").empty();
        $(".imagebarcode").html(d.data);
	}
	function refresh_the_page_with_responses(d){
			console.log(d.data.length);		
			console.log(d.data[0]);

		if (d.data.length>0){
			$(".textproductname").attr("product_id",d.data[0].id);
			$(".textproductname").attr("product_barcode",d.data[0].barcode);
			$("#name_product").html(d.data[0].product_name);
			$(".textproductname").html(d.data[0].product_name);
			$("#category_product").html(d.data[0].product_category);
			$("#used_product").html(d.data[0].is_secondhand);
			$("#class_product").html(d.data[0].product_class);
			$("#weight_product").html(d.data[0].weight);
			$("#product_price").html(numeral(d.data[0].value_perweight).format('$ 0,0.00'));
			$("#new_price_per_gram").val(d.data[0].value_pergram);//numeral(d.data[0].value_pergram).format('$ 0,0.00'));			

			var BarcodeImage = getBarcodeImage();
			var productImage = getProductImage();

			$(".product_image").empty();
			$(".product_image").append(productImage);
			// var getProductImage = $.ajax({
			// 								type: "POST",
			// 								url: url_product_img,
			// 								dataType: 'json',											
			// 								data: {
			// 									barcode: $('#barcode').val()				
			// 								},
			// 								success: gettingProductImageResponse
			// 							});		
			// $.when(getBarcodeImage, getProductImage).done(function(result1, result2) {
			// 	console.log(result1);
			// 	console.log(result2);
   //  			//... do this when both are successful ...
			// });
		}else{
			alert("Data tidak ditemukan.");
		}
		
	}

	function getProductImage(){				
		return $("<img />")	.attr("src",url_product_img+"/"+$('#barcode').val())
							.attr("alt","product Image of "+$('#barcode').val())
							.css("width","200px")
							.css("height","200px");			
	}

	function getBarcodeImage(){		
		$.ajax({
			type: "POST",
			url: url_gen,
			dataType: 'json',
			async: false,
			data: {
				text2display: $('#barcode').val()				
			},
			success: gettingBarcodeImageResponse
		});		
	}

	function getProduct(){			
		console.log("SEARCHING FOR ... " + $("#barcode").val());
		var barcode = $('#barcode').val();
		var abc= baseurl + 'product/readystock/';
		$.ajax({
			type: "POST",
			url: abc,
			dataType: 'json',
			data: {
				barcode: $('#barcode').val()				
			},
			success: refresh_the_page_with_responses
		});

	}

	function add_to_cart(o){				
		o.preventDefault();
		console.log("add_to_cart function is ignited by ..");
		console.log($(o));
		var theBody = $("#purchase_notes").children("tbody");
		theBody.empty();
		// var theTrashButton = $("<button/>").addClass("btn btn-sm btn-warning").append($("<i />").addClass("fa fa-trash"));		
		var theProductName = $("#name_product").text();
		var theProductWeight = parseFloat($("#weight_product").text());
		var theProductPriceAfterCalc = numeral($("#price_after_calc").val()).value();		
		var theProductPricePerGram = theProductPriceAfterCalc/theProductWeight;
		theProductPricePerGram = Number(theProductPricePerGram);

		theProductPricePerGram = parseFloat(theProductPricePerGram.toFixed(2));		
		var theRow = $("<tr />");
		// theRow.append($("<td />").html(theTrashButton));
		theRow.append($("<td />").addClass("fixed_product_name").html(theProductName));
		theRow.append($("<td />").addClass("fixed_product_class").html("3"));
		theRow.append($("<td />").addClass("fixed_product_weight").html(theProductWeight+" gr"));		
		theRow.append($("<td />").addClass("fixed_product_price_per_gram").html(numeral(theProductPricePerGram).format('$ 0,0.00')));
		theRow.append($("<td />").addClass("fixed_product_price_per_unit").html(numeral(theProductPriceAfterCalc).format('$ 0,0.00')));

		theBody.append(theRow);
		$("#invoice_total").html(numeral(theProductPriceAfterCalc).format('$ 0,0.00'));

		$("#invoice_total_wordy").html(num2words(theProductPriceAfterCalc));
		
	}

	function prepare_invoice_print(){

		console.log($("#num_invoice").html());
		console.log($(".fixed_product_name").html());
		console.log($("#trx_date").html());
		console.log($("#user_logged").html());
		console.log($(".fixed_product_weight").html());
		console.log($(".fixed_product_price_per_unit").html());
		console.log($("#invoice_total_wordy").html());

		$("#prep_invoice_num").val($("#num_invoice").html());
		$("#prep_product_name").val($(".fixed_product_name").html());
		$("#prep_invoice_trx_date").val($("#trx_date").html());
		$("#prep_cashier_name").val($("#user_logged").html());
		$("#prep_product_weight").val($(".fixed_product_weight").html());
		$("#prep_invoice_price").val($(".fixed_product_price_per_unit").html());
		$("#prep_invoice_price_word").val($("#invoice_total_wordy").html());

		// $("#num_invoice").html(new_invoice_num);
		// $("#name_product").html('');
		// $("#category_product").html('');
		// $("#weight_product").html('0');
		// $("#product_price").html(numeral(0).format('$ 0.00'));
		// $("#price_after_calc").val('');
		// $("#keterangan_barang").html('');
		// $("#new_price_per_gram").val('');
		// $("#barcode").val('');
		// $("#pembulatan").val('0');
		// $("#class_product").html('');
		// $("#new_price_per_gram").val(0);
		// $("#invoice_total").html(numeral(0).format('$ 0,0.00'));
		// $("#invoice_total_wordy").html(num2words(numeral(0).value()));
	}

	function print_invoice(o){
		o.preventDefault();		
		console.log("trying to print invoice");		
		console.log(is_session_expired);
		getCurrentSession();
		if (is_session_expired>0){			
			alert("SESSION sudah Expired atau belum memilih NAMA KARYAWAN");
		}else{
			var invoicetable	= $("tbody","#purchase_notes");//.children("tbody");		
			if ($("tr",invoicetable).length>0){
				save_invoice(invoicetable);				
			}else{
				console.log('nothing to print');
			};
		}

	}

	function save_invoice(thefixed){		

		var therowof = $("tr",$(purchasenotes));
		var price_per_gram 	= 0;
		var price_per_unit 	= 0;
		var unit_weight 	= 0;
		
		$("td", $(therowof)).each(function(i,v){			
			switch(i){
				case 2: unit_weight = $(v).html(); break;
				case 3: price_per_gram = $(v).html(); break;
				case 4: price_per_unit = $(v).html(); break;
			}
		});

		price_per_gram 	= parseFloat(numeral(price_per_gram).value());
		price_per_unit 	= parseFloat(numeral(price_per_unit).value());
		unit_weight 	= parseFloat(unit_weight);				

		var invoice_prop = 
			{
				invoice_num:  $("#num_invoice").html(),
				product_id : $(".textproductname").attr("product_id"),
				product_barcode : $(".textproductname").attr("product_barcode"),			
				price_per_gram: price_per_gram,
				price_per_unit: price_per_unit,
				unit_weight : unit_weight
			};				

		$.ajax({
			type: "POST",
			async: false,
			url: url_save,
			dataType: 'JSON',			
			data: {	invoice: invoice_prop },
			success: displaySavingResponse,
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                } 
		});
	}

	function displaySavingResponse(res){
		console.log('Insert is a success, now displaying return value and continue trying to print');
		console.log(res)         
        prepare_invoice_print();
		$("#print_invoice_to_paper").attr("action", url_print_invoice);
		$("#print_invoice_to_paper").submit();   

		getNewInvoice();
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

	function renew_invoice(o){
		o.preventDefault();
		console.log("trying to reset/new invoice");
		// resetall();
		getNewInvoice();
	}
	
	function getNewInvoice(){		
		$.ajax({
			type: "POST",
			url: url_new_invoice,
			dataType: 'json',
			async: false,	
			data: {
				trx_type:1
			},		
			success: displayNewInvoice
		});		
	}

	function displayNewInvoice(res){
		console.log(res.data);
		resetall(res.data);
	}

	function resetall(new_invoice_num){
		var theBody = $("#purchase_notes").children("tbody");
		theBody.empty();
		$("#num_invoice").html(new_invoice_num);
		$("#name_product").html('');
		$("#category_product").html('');
		$("#weight_product").html('0');
		$("#product_price").html(numeral(0).format('$ 0.00'));
		$("#price_after_calc").val('');
		$("#keterangan_barang").html('');
		$("#new_price_per_gram").val('');
		$("#barcode").val('');
		$("#pembulatan").val('0');
		$("#class_product").html('');
		$("#new_price_per_gram").val(0);
		$("#invoice_total").html(numeral(0).format('$ 0,0.00'));
		$("#invoice_total_wordy").html(num2words(numeral(0).value()));
	}
});
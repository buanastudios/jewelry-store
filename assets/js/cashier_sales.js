$(function(){
	var num2words = numberToWordsInRupiah;
	var url_gen = baseurl + "barcode/test";	
	var url_product_img = baseurl + "product/itemImage";	
	var url_save = baseurl + "transaction/sales/insert";		

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
		return (totalgram*pricepergram) + adjustment;
	}

	var calcTarget = $("[name=pembulatan"); 
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
	});;
	

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
		originalNum = parseFloat($("#product_price").text());		
		additionalNum = parseFloat($("[name=pembulatan]").val());
		//theNum = originalNum + additionalNum;
		weightProduct = parseFloat($("#weight_product").text());
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
		var theProductWeight = numeral($("#weight_product").text()).value();
		var theProductPriceAfterCalc = numeral($("#price_after_calc").val()).value();
		var theProductPricePerGram = theProductPriceAfterCalc/theProductWeight;
		theProductPricePerGram = Number(theProductPricePerGram);
		theProductPricePerGram = theProductPricePerGram.toFixed(2);
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

	function print_invoice(o){
		o.preventDefault();		
		console.log("trying to print invoice");
		var invoicetable			= $("#purchase_notes").children("tbody");		
		if ($("tr",invoicetable).length>0){
			save_invoice(invoicetable);
		}

	}

	function save_invoice(thefixed){		
		var invoice_prop = 
		{
			invoice_num:  $("#num_invoice").html(),
			product_id : $(".textproductname").attr("product_id"),
			product_barcode : $(".textproductname").attr("product_barcode"),
			unit_price: numeral($("td.fixed_product_price_per_gram",thefixed).html()).value(),
			unit_weight : numeral($("td.fixed_product_weight",thefixed).html()).value()
			};		


		$.ajax({
			type: "POST",
			url: url_save,
			dataType: 'JSON',			
			data: {
					// invoice_num:  $("#num_invoice").html(),
					// product_id : $(".textproductname").attr("product_id"),
					// product_barcode : $(".textproductname").attr("product_barcode"),
					// unit_price: numeral($("td.fixed_product_price_per_gram",thefixed).html()).value(),
					// unit_weight : numeral($("td.fixed_product_weight",thefixed).html()).value(),
					invoice: invoice_prop

			},
			success: function (result) {
            	console.log('ceritanya success insert');
        	}	
		});
	}

	function renew_invoice(o){
		o.preventDefault();
		console.log("trying to reset/new invoice");
		resetall();
	}
	
	function resetall(){
		var theBody = $("#purchase_notes").children("tbody");
		theBody.empty();
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
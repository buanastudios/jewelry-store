$(function(){
	var url_save 	= baseurl + "transaction/purchase/insert";	
	var url_product = baseurl + 'product/readystock';
	var url_product_img = baseurl + "product/itemImage";	

	var barcode = $("#barcode").val();
	var calcTarget = $("[id=berat_sebenarnya]"); 
	var theNum = 0;
	var selectedPurchaseDescription = "";

	init();

	$('#barcode').keyup(function(e){
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

	function init(){
		numeral.locale('id');

		reset_all();
	}

	function reset_all(){
		$("#receive_notes > tbody").empty();		
		$("select").select2();
		$("#total_setelah_potongan").val(0);
		$("#invoice_total").html(numeral(0).format("$ 0,0.00"));
		$("#potongan_harga").val(numeral(0).value());
		$("#berat_sebenarnya").val(numeral(0).value());
		$("#total_potongan").html(numeral(0).format("$ 0,0.00"));


		$("#weight_current_product").html(numeral(0).format("0,0.00"));
		$("#name_product").html("");
		$("#current_product_price").html(numeral(0).format("$ 0,0.00"));
	}

	$(".calc_num").on("click", function(e){
		e.preventDefault();
		console.log($(this).attr("data-num"));		
		theNum += $(this).attr("data-num");
		theNum = parseFloat(theNum);
		calcTarget.val(theNum);
	});		

	$(".calc_ops.remove").on("click", function(e){
		e.preventDefault();
		theNum = calcTarget.val();		
		theNum = (theNum.substring(0,theNum.length - 1));
		calcTarget.val(theNum);
	});

	$(".calc_ops.ok").on("click", function(e){
		e.preventDefault();
		var gram = $("#berat_sebenarnya").val();
		var discount = $("#potongan_harga").val();
		discount = discount/1000;
		console.log(gram);
		console.log(discount);
		var topot = discount*gram;
		$("#total_potongan").html(numeral(topot).format("0,0.00"));
	});

	$('.calc_ops.save').on("click", function(o){
		o.preventDefault();
		// var cp = parseFloat($("#current_product_price").text());
		var cp = numeral($("#current_product_price").html()).value();
		var discount = numeral($("#total_potongan").text()).value();
		var cw = parseFloat($("#berat_sebenarnya").val()/1000);
		
		var tp = parseFloat($("#total_potongan").text());
		var bc = $("#barcode").val();
		var lw	= parseFloat(numeral($("#weight_current_product").html()).value());

		console.log($(".wrong-value","#form_add"));
		var wrv = $(".wrong-value","#form_add").length;
		if (wrv == 0){
			if (( tp > 0 ) && (lw > 0)){		
				add_to_cart(cp,discount,cw);
			}
		}else{
			alert("Maaf, masih ada nilai yang salah. Silahkan diperbaiki dahulu.");
		}
	});

	//potonganharga
	$("#jenis_potongan").on("select2:select", function(e){
		e.preventDefault();

		var data = e.params.data;
		selectedPurchaseDescription = data.text;    	
    	var listDiscount = ['25000','20000','15000','12000','10000','7000'];
		discount = listDiscount[data.id];
		$("#potongan_harga").val(discount);
	});

	$("#berat_sebenarnya").on("change", function(o){
		o.preventDefault();
		var gram = $(this).val();
		var total_potongan = $("#potongan_harga").val()*gram;
		
		var harga_barang = parseFloat(numeral($("#current_product_price").html()).value());
		var berat_barang = parseFloat(numeral($("#weight_current_product").html()).value()) * 1000;
		$("#total_potongan").html(total_potongan);

		//color indicator
		if ((gram > berat_barang) && (gram>0)){
			$(this).addClass("wrong-value");
			$(this).removeClass("correct-value");			
		}

		if ((gram < berat_barang)&& (gram>0)){
			$(this).addClass("correct-value");
			$(this).removeClass("wrong-value");
		}

		if (harga_barang< total_potongan){
			$("#total_potongan").removeClass("correct-value");
			$("#total_potongan").addClass("wrong-value");
		}

		if (harga_barang > total_potongan){
			$("#total_potongan").removeClass("wrong-value");
			$("#total_potongan").addClass("correct-value");
		}

		if (total_potongan == 0){
			$("#total_potongan").removeClass("wrong-value");
			$("#total_potongan").removeClass("correct-value");
		}
	})

	function generateInvoiceNum(){
		var randomNumber = Math.floor(Math.random() * 1000);
		var var2 = moment().format("MMM");		
		var var3 = $("#userlogged").html().substring(0,3);
		var var4 = 40;
		var var5 = "PURC";
		var var6 = moment().format("YYYY");

		return randomNumber + '/' + var2 + '/' + var3 + '/' + var4 + '/' + var5 + '/' + var6;		
	}

	function add_to_cart(currentprice, discount, currentweight){		
		
		var theBody = $("#receive_notes").children("tbody");
		var theInvoice = generateInvoiceNum();
		var theTrashButton = $("<button/>").addClass("btn btn-sm btn-warning").append($("<i />").addClass("fa fa-trash"));		
		var theProductName = $("#name_product").text();		
		var theProductID = $(".product").attr("product_id");		
		var theProductBarcode = $(".product").attr("product_barcode");		
		var theProductPriceAfterCalc = parseFloat(currentprice-discount);		
		theProductPriceAfterCalc = Math.floor(theProductPriceAfterCalc/1000);
		theProductPriceAfterCalc = theProductPriceAfterCalc * 1000;
		var thePurchaseDescription = selectedPurchaseDescription;
		
		var theRow 			= 	$("<tr />").attr("invoice_num",theInvoice);		

		var invoice_column 	= 	$("<div />")
								.append($("<div />").html(theInvoice))
								.append($("<div />").html("Kasir: "+$("#userlogged").html()));		
		var product_column 	= 	$("<div />")
								.append($("<div />").html(theProductName))
								.append($("<div />").html(currentweight+ " gr"))
								.append($("<div />").html(700));

		theRow.append($("<td />").css("text-align","center").css("vertical-align","middle").addClass("text-center").html($("<i />").addClass("fa fa-circle text-primary")));		
		theRow.append($("<td />").addClass("text-left").html(invoice_column));
		theRow.append($("<td />").addClass("text-left").html(product_column));				
		theRow.append($("<td />").html(thePurchaseDescription));
		theRow.append($("<td />").addClass("text-right").html(numeral(theProductPriceAfterCalc).format("$ 0,0.00")));

		theBody.prepend(theRow);
		alltheRow = $("table#receive_notes tbody").find("tr");
		alltheMoney = $("td:eq(7)", alltheRow);
		var screenDisplay = 0;

		$.each(alltheMoney, function(i,v){
			console.log(numeral($(v).html()).value());			
			screenDisplay += numeral($(v).html()).value();			
		});
		
		$("#invoice_total").html(numeral(screenDisplay).format("$ 0,0.00"));	
		

		var invoice = {
			invoice_num: theInvoice,
			product_buyback_weight: currentweight,
			product_buyback_price: theProductPriceAfterCalc,
			product_buyback_discounted_reason: thePurchaseDescription,
			product_buyback_barcode: theProductBarcode,
			product_buyback_id: theProductID
		};
		
		save_invoice(invoice, theRow);

		reset();
	};

	function reset(){
		$("#potongan_harga").val(0);
		$("#berat_sebenarnya").val(0);
		$("#total_potongan").html(0);		
	}

	$("#potongan_harga").on("click",function(o){
		o.preventDefault();
		theNum = 0;
		$(this).val(theNum);
		calcTarget = $(this);
	});
	$("#berat_sebenarnya").on("click",function(o){
		o.preventDefault();
		theNum = 0;
		$(this).val(theNum);
		calcTarget = $(this);
	});

	function getProduct(){			
		console.log("SEARCHING FOR ... " + $("#barcode").val());
		var barcode = $('#barcode').val();		
		$.ajax({
			type: "POST",
			url: url_product+"/"+barcode,
			dataType: 'json',
			data: {
				barcode: $('#barcode').val()				
			},
			success: refresh_the_page_with_responses
		});

	}

	function refresh_the_page_with_responses(d){
			console.log(d.data.length);		
			console.log(d.data[0]);

		if (d.data.length>0){
			$(".product").attr("product_id",d.data[0].id);
			$(".product").attr("product_barcode",d.data[0].barcode);
			$("#name_product").html(d.data[0].product_name);
			$(".product").attr("product_name",d.data[0].product_name);
			$(".product").attr("product_category", d.data[0].product_category);
			$(".product").attr("product_isUsed", d.data[0].is_secondhand);
			$(".product").attr("product_class",d.data[0].product_class);
			$(".product").attr("product_weight", parseFloat(d.data[0].weight));
			$(".product").attr("product_price", parseFloat(d.data[0].value_perweight));
			$(".product img").attr("src", d.data[0].product_img_url);

			$("#weight_current_product").html(numeral(parseFloat(d.data[0].weight)).format('0,0.00'));
			$("#current_product_price").html(numeral(d.data[0].value_perweight).format('$ 0,0.00'));
			$("#new_price_per_gram").val(d.data[0].value_pergram);			
			
			var productImage = getProductImage();
			$(".product_image").empty();
			$(".product_image").append(productImage);

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

	function save_invoice(theInvoice, theRow){						
		$.ajax({
			type: "POST",
			url: url_save,
			async:true,
			dataType: 'JSON',			
			data: {	invoice: theInvoice },
			success: function (result) {
            	console.log('ceritanya success insert');            	
            	var invoiced = result.condition.success.invoice_num;
            	var a = $("#receive_notes").children("tbody").find("tr[invoice_num='"+invoiced+"']");
            	$("td:eq(0)", a).html($("<i/>").addClass("fa fa-check-circle"));
        	},
        	error: function(xhr) {
        			console.log(xhr);
			        alert("fail");
			    }	
		});
	
	}

	function save_invoice1(thefixed){		
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

});
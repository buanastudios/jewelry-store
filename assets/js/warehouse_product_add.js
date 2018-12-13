$(function(){
	//CONSTANTS
	var url_insert = baseurl+'product/add';
	var url_gen = baseurl+"barcode/test";		
	var url_product_category = baseurl+'product/categories';	
	var url_product_class = baseurl+'product/classes';	

	var product_category = [];
	var product_class = [];

	//GETTING THE IMAGES FROM WEBCAM	
	var c_width = 400;
	var c_height = 300;

	$(".video-container").css("width",c_width+"px").css("height",c_height+"px");
	Webcam.set({
		width: c_width,
		height: c_height,
		image_format: 'png',
		jpeg_quality: 100
	});

	Webcam.attach( '#video' );


	function grabTheSnapshot(){				
		// take snapshot and get image data
		Webcam.snap( function(data_uri) {
			// display results in page
			var r = $("<img />").attr("src", data_uri).css("width","100%").css("height","100%");
			$("#canvas").html(r);
			
			$(".canvas-container").css("height","100%");
			console.log(data_uri);
		} );		
			

		console.log('snapped');

	}
	// END OF GRABBING IMAGE FROM WEBCAM
	
	//LIST OF LISTENER a.k.a "buttons"
	$("#snapper").on("click", snap);		
	$("#save_product").on("click", { foo: "bar" }, save_product);


	//LIST OF LISTENER ACTIONABLE
	function snap(o){
		o.preventDefault();
		grabTheSnapshot();
		generateBarcode();
	}

	function generateBarcode(){				        
       var  pcategory = $("#product_category").val();    
       var  pcatabbr = product_category.find(x=>x.id==pcategory).text;       
       var  pclass = $("#product_class").val();    
       var  pissecond = 1;       
       var  timestamp = moment().format("MMDYYYYhhmm");       
       var 	pname = $("#product_name").val();

       if ($('#is_notrefurbished').is(":checked")){
            pissecond = 0;
       }                                    
       
       var combined = pcatabbr+'-'+pclass+pissecond+timestamp;
       console.log(combined);
       console.log(pname);

       $("#product_barcode").val(combined);         
       $("p.textproductname").html(pname);
       generateBarcodeImage(combined);   
	}

	function generateBarcodeImage(barcode){	
		// alert(barcode);
		$.ajax({
			type: "POST",
			url: url_gen,
			dataType: 'json',
			async: false,
			data: {
				text2display: barcode				
			},
			success: function (result) {
            	//if (result.isOk == false) alert(result.message);            	            	
            	$(".imagebarcode").empty();
            	$(".imagebarcode").html(result.data);
        	}	
		});		
	}

	function save_product(e){
		e.preventDefault();
		// alert(e.data.foo);
		// var prod = $("form#product_properties_input").serialize();
		// 
		// 
		var xa = $("img", "#canvas").attr("src");		
		var p = {name: 'product_image', value:xa };

		var isNotRefurbished = 0;

		if ($('#is_notrefurbished').is(":checked")){
            isNotRefurbished = 1;
       	} 
		
		var q = {name: 'product_isNotRefurbished', value:isNotRefurbished };       		 
		
		if (parseFloat($("#berat").val())>0){
			var prodArr = $("form#product_properties_input").serializeArray();
			prodArr.push(p);			
			prodArr.push(q);			

			$.ajax({
				url: url_insert,
				type: "POST",
				async: false,
				data: {
					product: prodArr
				},				
				success: function (res){
					console.log(res);
				}
			});	
		}else{
			alert("Berat Produk belum diisi");
		}
		
	}
	
	function init(){
		//INITATE PRODUCT CATEGORY CHOICES
		console.log("Initation started ... ");

		$.ajax({
			placeholder: 'Pilih Kategori',
			url: url_product_category,
		    dataType: "json",		        	     
		    success: function(res){		    	
		    	product_category = $.map(res.data.rows, function (item) {											
		                    return {
		                        text: item.abbr,
		                        id: item.id
		                    }
		                });

		    	var d = $.map(res.data.rows, function (item) {											
		                    return {
		                        text: item.label,
		                        id: item.id
		                    }
		                });

		    	$("#product_category").select2({
		    		data: d
		    	})
		    }
		});

		$.ajax({
			placeholder: 'Pilih Jenis',
			url: url_product_class,
		    dataType: "json",		        	     
		    success: function(res){		    	
		    	product_class = $.map(res.data.rows, function (item) {											
		                    return {
		                        text: item.abbr,
		                        id: item.id
		                    }
		                });

		    	var d = $.map(res.data.rows, function (item) {											
		                    return {
		                        text: item.label,
		                        id: item.id
		                    }
		                });

		    	$("#product_class").select2({
		    		data: d
		    	})
		    }
		});

		// $("#product_category").select2({		    	   
		// 	placeholder: 'Pilih Kategori',
		// 	minimumInputLength: 0,
		//     ajax: {
		//         url: url_product_category,
		//         dataType: "json",		        	     
		//         processResults: function (data) {				
		//             return {
		//                 results: $.map(data.data.rows, function (item) {											
		//                     return {
		//                         text: item.label,
		//                         id: item.id
		//                     }
		//                 })
		//             };
		//         }
		//       }
		//     });

		$("#product_category1").select2({
		    tags: false,
		    multiple: false,
		    tokenSeparators: [',', ' '],
		    minimumInputLength: 2,
		    minimumResultsForSearch: 10,
		    templateResult: function(result) {
		        var rs = $("<div />").addClass("row");
		        rs.append($("<div />").addClass("col-lg-2 col-md-2 col-sm-2 col-xs-2").html(result.id));
		        rs.append($("<div />").addClass("col-lg-10 col-md-10 col-sm-10 col-xs-10").html(result.text));
		        console.log(result.text);
		        return rs;
		    },
		    ajax: {
		        url: url_product_category,
		        dataType: "json",
		        type: "GET",
		        data: function (params) {

		            var queryParameters = {
		                term: params.term
		            }
		            return queryParameters;
		        },
		      
		        processResults: function (data) {				
		            return {
		                results: $.map(data.data.rows, function (item) {											
		                    return {
		                        text: item.label,
		                        id: item.id
		                    }
		                })
		            };
		        }
		      }
		    });

		console.log("Initation completed ... ");
	}

	init();
});
/** 
 * Author: sakti.buana@arthipesa.com
 * Date: 15 December 2018
* Time: 06:03 AM
 */

$(function(){  	
    var url_insert_product = baseurl+'product/multiadd';
    var url_add_product = baseurl + 'warehouse/product/add';    
    var url_inventory_products = baseurl + 'warehouse/product/inventory';  	
    var url_prepare_import_products = baseurl + 'product/prepareImport';   
    var url_import_products = baseurl + 'product/import';   
    var url_product_check = baseurl + 'product/check';   

  	var $tablen = $("#inventory");      

    $("#plupload-browse-button").on("click", openUploadDialogue);
    $("#add_product_btn").on("click", addProduct);    
    $("#inventory_products_btn").on("click", inventoryProducts);        
    $("#file-form").on("submit",processUpload);
    $("#fileupload-input").change(prepareUpload);

    function processUpload(e){
      e.preventDefault();
      
      var fdo = new FormData();            
      var y = $(this);
      y=$("#fileupload-input")[0].files[0];
      fdo.append('file',y);
      console.log(y,fdo);

      $.ajax({
                url: url_prepare_import_products,
                type: 'POST',
                data: fdo,
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: responseAfterUpload
            });

    }

    function prepareUpload(e){
      e.preventDefault();
      $("#file-form").submit();
    }
    
    function openUploadDialogue(e){
      e.preventDefault();            
      $("#fileupload-input").click();
    }
          
    function responseAfterUpload(e){
        var importingdata;
        var thefile= e.uploaded.file.name;
        thefile = baseurl +'/upload/'+thefile;        

        $.getJSON(thefile, function (data) {
          // console.log(data);
          // console.log(data.tobeExported);
          var resTable = $("<table />").addClass("table table-dark table-striped table-hover no-margin");
          var resTableBody = $("<tbody />");
          resTable.append(resTableBody);

          $.each(data.tobeExported, function (index, value) {
            console.log("check for duplicate based on barcode", value);
            var therow = $("<tr/>").attr("barcode",value);
            var thecolumn_checkbox = $("<td />")
                                                .addClass("text-center align-middle")
                                                .addClass("checkbox")
                                                .append($("<input />").attr("type","checkbox").attr("id","check_"+index));
            var thecolumn_imported = $("<td />").html(value);

            therow.append(thecolumn_checkbox.hide().fadeIn("slow"));
            therow.append(thecolumn_imported.hide().fadeIn("slow"));
            resTableBody.append(therow);

            import_duplicateCheck(value, therow);
            $("#upload-response").css("height","100%");
          });

          $("#upload-response").empty();
          $("#upload-response").append($("<span/>").attr("id","thefile").html(thefile).hide());
          $("#upload-response").append(resTable)

          var responsebuttons = $("<div/>")
                                          .addClass("btn btn-group")
                                          .append($("<button />").attr("id","selectAllImported").addClass("btn btn-outline-primary btn-sm").html("Select All"))
                                          .append($("<button />").attr("id","unselectAllImported").addClass("btn btn-outline-primary btn-sm").html("Unselect All").hide())
                                          .append($("<button />").attr("id","importSelected").addClass("btn btn-outline-primary btn-sm").html("Import Selected"));

          $("#upload-response").prepend(responsebuttons);

          $("#importSelected", "#upload-response").on("click", importSelected);
          $("#selectAllImported", "#upload-response").on("click", selectAllImported);
          $("#unselectAllImported", "#upload-response").on("click", unselectAllImported);

          $.each(data.data, function (index, value) {
            // console.log(value); 

            // importingdata = {product: value};
            // $.post( url_import_products, importingdata ,function( data ) {
            //   // $( ".result" ).html( data );
            //   console.log(data);
            // });
          });
        });

      // var resize_height = 1024; 
      // var resize_width = 1024;
      // var wpUploaderInit = {"browse_button":"plupload-browse-button","container":"plupload-upload-ui","drop_element":"drag-drop-area","file_data_name":"async-upload","url":"http:\/\/satubuana.com\/wp-admin\/async-upload.php","filters":{"max_file_size":"8388608b"},"multipart_params":{"post_id":0,"_wpnonce":"1bf557cf80","type":"","tab":"","short":"1"}};
    }

    function unselectAllImported(e){
        e.preventDefault();
        toggleTickAllRows(false);
        $(this).hide();
        $("#selectAllImported").show();
    }

    function selectAllImported(e){
        e.preventDefault();
        toggleTickAllRows(true);
        $(this).hide();
        $("#unselectAllImported").show();
    }

    function toggleTickAllRows(e){      
      var status = e; //this.checked;
      // console.log(status);

      $(".checkbox input").each(function(){
          this.checked = status;
      });
    }

    function import_duplicateCheck(barcode, therow){
      console.log("checking "+ barcode);
      data = {barcode: barcode};
      isExist = 0;

      $.post( url_product_check, data ,function( res ) {
        // console.log("check result of "+ barcode);         
        if(res.data.length>0){
          isExist = 1;
          rdisplay = $("<span />").html("Importing will overwrite");
          importNowButton = $("<button />").addClass("btn btn-sm btn-warning importnow").html("Import Now");          
        }else{
          isExist = 0;
          rdisplay = $("<span />").html("Safe to import");
          importNowButton = $("<button />").addClass("btn btn-sm btn-success importnow").html("Import Now");
        }
        $(therow).attr('isexist',isExist);
        $(therow).append($("<td />").append(rdisplay.hide().fadeIn("slow")));
        $(therow).append($("<td />").append(importNowButton.hide().fadeIn("slow")));
        // console.log(res, res.data.length);
        $(".importnow", $(therow)).on('click', importNow);
      });

      
    }

    function searchInChecked(nameKey,myArray){
        for (var i=0; i < myArray.length; i++) {
          if (myArray[i].barcode === nameKey) {
              // return myArray[i];
              return myArray[i].isexist;
          }
        }
    }

    function importSelected_without_blob(e){
      e.preventDefault();
      var selectedBarcode = $(".checkbox input:checkbox:checked").map(function(){        
        return $(this).parent().parent().attr('barcode');
      }).get();

      var selectedBarcodeIsExist = $(".checkbox input:checkbox:checked").map(function(){        
        // return $(this).parent().parent().attr('barcode') + ' is ' + $(this).parent().parent().attr('isexist');
        return {'barcode': $(this).parent().parent().attr('barcode'), 'isexist': $(this).parent().parent().attr('isexist')};
      }).get();

      var source = $("#thefile","#upload-response").text();
      // console.log(selectedBarcode, source);
      $.getJSON(source, function(res){
          var filtered = [];
          // console.log(selectedBarcode[0]);
          // var searchBarcode = selectedBarcode[0];
          console.log(selectedBarcodeIsExist);

          // var xl = searchInChecked('CN-010200002',selectedBarcodeIsExist);
          // console.log(xl);

          $.each(res.data, function(i, v) {              
              console.log(v);
              $.each(selectedBarcode, function (iB,vB){
                
                // console.log(v[0].barcode, searchInChecked(v[0].barcode,selectedBarcodeIsExist));
                $.extend(v[0], {isexist:searchInChecked(v[0].barcode,selectedBarcodeIsExist)});
                // console.log(v[0]);

                if (v[0].barcode==vB) {                  
                  filtered.push(v[0]);                  
                  return;
                } 
              });
              // console.log(v,searchBarcode);
              // console.log(v[0].barcode,searchBarcode);
              // if (v[0].barcode==searchBarcode) {
              //     console.log(v);
              //     return;
              // }
          });
          
          console.log(filtered);

          $.ajax({
            url: url_insert_product,
            type: "POST",
            async: false,
            data: {
              product: filtered
            },        
            success: function (res){
              console.log(res);
              //window.location.href = url_product_inventory;
            }
          }); 
      });
    }

    function importSelected(e){
      e.preventDefault();
      var selectedBarcode = $(".checkbox input:checkbox:checked").map(function(){        
        return $(this).parent().parent().attr('barcode');
      }).get();

      var selectedBarcodeIsExist = $(".checkbox input:checkbox:checked").map(function(){                
        return {'barcode': $(this).parent().parent().attr('barcode'), 'isexist': $(this).parent().parent().attr('isexist')};
      }).get();

      var source = $("#thefile","#upload-response").text();
      
      $.getJSON(source, function(res){
          var filtered = [];      
          
          $.each(res.data, function(i, v) {              
              $.extend(v, {isexist:searchInChecked(v.barcode,selectedBarcodeIsExist)});
              $.each(selectedBarcode, function (iB,vB){              
                if (v.barcode==vB) {                  
                    filtered.push(v);                  
                    return;
                } 
              });
          });
          
          console.log(filtered);

          $.ajax({
            url: url_insert_product,
            type: "POST",
            async: false,
            data: {
              product: filtered
            },        
            success: function (res){
              console.log(res);
              //window.location.href = url_product_inventory;
            }
          }); 
      });
    }

    function importProcess(e){
      // e.preventDefault();
      console.log(e.data.find());
    }
    function importNow(e){
      e.preventDefault();
      var x = $(this).parent();
      console.log(x);
    }

    function addProduct(e){
      e.preventDefault();
      window.location.href = url_add_product;
    }

    function inventoryProducts(e){
      e.preventDefault();
      window.location.href = url_inventory_products;
    }
    

    function init(){    	
  		// preparedExportButton();
  	}

  	
  	init();
})	
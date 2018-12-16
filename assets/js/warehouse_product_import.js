/** 
 * Author: sakti.buana@arthipesa.com
 * Date: 15 December 2018
* Time: 06:03 AM
 */

$(function(){  	
    var url_add_product = baseurl + 'warehouse/product/add';    
    var url_inventory_products = baseurl + 'warehouse/product/inventory';  	
    var url_prepare_import_products = baseurl + 'product/prepareImport';   
    var url_import_products = baseurl + 'product/import';   
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
          console.log(data);
          $.each(data.data, function (index, value) {
            console.log(value); 
            importingdata = {product: value};
            $.post( url_import_products, importingdata ,function( data ) {
              // $( ".result" ).html( data );
              console.log(data);
            });
          });
        });

      // var resize_height = 1024; 
      // var resize_width = 1024;
      // var wpUploaderInit = {"browse_button":"plupload-browse-button","container":"plupload-upload-ui","drop_element":"drag-drop-area","file_data_name":"async-upload","url":"http:\/\/satubuana.com\/wp-admin\/async-upload.php","filters":{"max_file_size":"8388608b"},"multipart_params":{"post_id":0,"_wpnonce":"1bf557cf80","type":"","tab":"","short":"1"}};
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
/** 
 * Author: sakti.buana@arthipesa.com
 * Date: 15 December 2018
 * Time: 06:03 AM
 */

$(function(){
  	var url_inventory = baseurl+'product/itemList';   		
    var url_add_product = baseurl + 'warehouse/product/add';
    var url_remove_product = baseurl + 'product/remove';
    var url_product_image = baseurl + 'product/itemImage';
    var url_export_products = baseurl + 'product/prepareExport';  	
  	var $tablen = $("#inventory");

    $("#plupload-browse-button").on("click", openUploadDialogue);

    function openUploadDialogue(e){
      e.preventDefault();      
      $("#fileupload-input").click();
    }

    function init(){    	
  		// preparedExportButton();
  	}

  	
  	init();
})	
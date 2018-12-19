        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-6">
					<h5>Inventory &raquo; Import Products</h5>
				</div>
			</div>        	        	
        	<div class="row">
        		<div class="col-md-12">
        			&nbsp;
        		</div>
        	</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button id="add_product_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-file">&nbsp;</i>Add</button>
                        <button id="inventory_products_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-list">&nbsp;</i>Inventory</button>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    &nbsp;
                </div>
            </div>
        	<div class="row">
        		<div class="col-md-8">
                    
                        
                        <div id="media-upload-notice"></div>
                        <div id="media-upload-error"></div>

            			<div id="plupload-upload-ui" class="hide-if-no-js drag-drop">
                            <div id="drag-drop-area" style="position: relative;">
                                <div class="drag-drop-inside">
                                    <p class="drag-drop-info">Drop files here</p>
                                    <p>or</p>
                                    <p class="drag-drop-buttons">
                                        <button id="plupload-browse-button" type="button" class="btn btn-md btn-outline-warning" style="position: relative; z-index: 1;">Select Files</button>
                                    </p>
                                </div>
                            </div>
                                <!-- <p class="upload-flash-bypass">
                                You are using the multi-file uploader. Problems? Try the <a href="http://satubuana.com/wp-admin/media-new.php?browser-uploader" target="_blank">browser uploader</a> instead.   </p> -->                            
                            <div id="fileupload-wrapper" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 131px; left: 527px; width: 85px; height: 28px; overflow: hidden; z-index: 0;">
                                <form enctype="multipart/form-data" method="post" action="" class="media-upload-form type-form validate" id="file-form">
                                <input id="fileupload-input" name="fileimport" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" multiple="" accept="" />
                                </form>
                            </div>

                            <div style="height:30px;">&nbsp;</div>

                            <div id="upload-response" class="upload-response">

                            </div>
                        </div>
                    
				</div>
			</div>			
		</div>
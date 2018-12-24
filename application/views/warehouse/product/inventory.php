        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-6">
					<h5>Inventory &raquo List</h5>
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
                        <button id="add_product" class="btn btn-outline-warning btn-sm"><i class="fa fa-file">&nbsp;</i>Add</button>
                        <button id="import_products_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-file-import">&nbsp;</i>Import</button>
                        <button id="export_products_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-file-export">&nbsp;</i>Export</button>
                    </div>
                    <!-- <div class="btn-group">
                        <button id="deactivate_product_btn" class="btn btn-outline-danger btn-sm"><i class="fa fa-times"></i> Deactivate</button>
                        <button id="activate_product_btn" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i> Activate</button>
                    </div> -->
                    <div class="btn-group">
                        <button id="printbarcode_product_btn" class="btn btn-outline-primary btn-sm"><i class="fa fa-barcode">&nbsp;</i>Print Barcode</button>
                        <!-- <button id="activate_product_btn" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i> Activate</button> -->
                    </div>

                    <div class="btn-group">
                        <button id="opname_product_btn" class="btn btn-outline-success btn-sm"><i class="fa fa-search">&nbsp;</i>Opname</button>
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
        			<table id="inventory"  class="table table-dark table-striped table-hover no-margin"
                            data-page-list="[10, 25, 50, 100, ALL]"
                            data-show-columns="true"
                            data-pagination="true"
                            data-side-pagination="client"                            
                            >                        
                            <thead>
                            	<tr>
                                    <th  class="checkedbox"><input type="checkbox" id="checkAll" /></th>
                                    <th  class="product_barcode">Barcode</th>                        
                                    <th  class="product_name">Item</th>                                               
                                    <th colspan="2" class="product_stock">Stock (in System)</th>                            	
                            	</tr>                            	
                            </thead>                            
                    </table>
				</div>
			</div>			
		</div>
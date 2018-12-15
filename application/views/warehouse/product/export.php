        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-6">
					<h3>Inventory &raquo; Export Products</h3>
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
                    <div class="btn-group">
                        <button id="deactivate_product_btn" class="btn btn-outline-danger btn-sm"><i class="fa fa-times"></i> Deactivate</button>
                        <button id="activate_product_btn" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i> Activate</button>
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
                                    <th  class="product_name">Barang</th>                                               
                                    <th  class="product_stock">Stok</th>                            	
                            	</tr>                            	
                            </thead>                            
                    </table>
				</div>
			</div>			
		</div>
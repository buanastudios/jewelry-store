        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-6">
					<h3> Product | Inventory</h3>
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
                        <button id="add_product" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</button>
                        <button id="transfer_product" class="btn btn-warning btn-sm"><i class="fa fa-share-square"></i> Transfer</button>
                    </div>
                    <div class="btn-group">
                        <button id="deactivate_product" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Deactivate</button>
                        <button id="activate_product" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Activate</button>
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
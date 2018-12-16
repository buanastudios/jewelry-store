        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-6">
					<h5>Inventory &raquo; Properties</h5>
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
                        <button id="list_category_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-list">&nbsp;</i>List Category</button>
                        <button id="list_class_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-list">&nbsp;</i>List Class</button>                        
                    </div>

                    <div class="btn-group">
                        <button id="add_category_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-file">&nbsp;</i>Add Category</button>
                        <button id="add_class_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-file">&nbsp;</i>Add Class</button>                        
                    </div>
                    <div class="btn-group">
                        <button id="remove_property_btn" class="btn btn-outline-danger btn-sm"><i class="fa fa-times">&nbsp;</i>Remove</button>                        
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
        			<table id="property"  class="table table-dark table-striped table-hover no-margin"
                            data-page-list="[10, 25, 50, 100, ALL]"
                            data-show-columns="true"
                            data-pagination="true"
                            data-side-pagination="client"                            
                            >                        
                            <thead>
                            	<tr>
                                    <th  class="checkedbox"><input type="checkbox" id="checkAll" /></th>
                                    <th  class="product_barcode">Label</th>                        
                                    <th  class="product_name">Super</th>
                            	</tr>                            	
                            </thead>                            
                    </table>
				</div>
			</div>			
		</div>
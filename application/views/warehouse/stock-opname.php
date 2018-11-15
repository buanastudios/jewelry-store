        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-6">
					<h3> Stock | Opname </h3>
				</div>
			</div>        	        	
        	<div class="row">
        		<div class="col-md-12">
        			&nbsp;
        		</div>
        	</div>
        	<div class="row">        		        	
        		<div class="col-md-4">Progress 27 of 4132 item(s) per 31 November 2018</div>
        		<!-- <div class="col-md-3"><button id="displayAllTable" type="button" class="btn btn-primary btn-sm">See all products <i class="fa fa-check"></i></button></div> -->
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			&nbsp;
        		</div>
        	</div>
<!--         	<div class="row">        		
        		<div class="col-md-12">
        			<form class="form-inline">
					  <div class="form-group">
					    <label for="barcode_scanned" class="sr-only">Barcode</label>
					    <input type="text" class="form-control" id="barcode_scanned" placeholder="Barcode">
					  </div>
					  <div class="btn-group">
					  	<button id="barcode_search" type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <button id="displayAllTable" type="button" class="btn btn-primary btn-sm">See all products <i class="fa fa-check"></i></button>
					  </div>
					</form>
        		</div>
        	</div> -->
        	<div class="row">
        		<div class="col-md-5">
        			<div class="input-group mb-3">
                      <input id="barcode_scanned" type="text" class="form-control" placeholder="Barcode" aria-label="Barcode" aria-describedby="barcode_search">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="barcode_search"><i class="fa fa-search"></i></button>
                        <button class="btn btn-secondary" type="button" id="displayAllTable">See all products&nbsp;<i class="fa fa-eye"></i></button>
                      </div>
                    </div>
        		</div>
        	</div>

            <div class="row">
                <div class="col-md-12">
                    &nbsp;
                </div>
            </div>
            
        	<div class="row">        		
        		<div class="col-md-12">
        			<form class="form-row" style="display: none;" id="barcode_search_result">
	        			<div class="col-4">					      	
					      	<div style="float: left; width: 50%;"><img src="http://localhost/courses/derry/jewelry-store/product/itemImage/CN-010297799" style="width: 100%;"></div>

					      	<div style="float: right; width: 40%; margin-left: 10%;">
	        					<div class="product_name">Kalung Italy</div>
		        				<div>        					
		        					<div class="badge product_class">Emas Tua 700</div>
		        					<div class="badge product_weight">20 gram(s)</div>
		        				</div>
	        				</div>
					    </div>
					    <div class="col-3">
					    	<div id="single_opname_barcode" class="opnamed_barcode">Rak #123123</div>
					    	<input id="single_opname_value" type="text" class="form-control opnamed_stock" placeholder="Stock" value='0' />
					    	<button id="single_opname" type="button" class="btn btn-primary"><i class="fa fa-save"></i></button>
    					</div>			    					
        			</form>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			&nbsp;
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-7" id="inventory_list" style="display: none;">
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
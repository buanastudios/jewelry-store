        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-6">
					<h5>Inventory &raquo; Add Product</h5>
				</div>
			</div>
        	<div class="row">
				<div class="col-md-6">
					<form id="product_properties_input">
						<div class="form-group row">
					    	<div class="col">
								<div class="btn btn-group">
					    			<button class="btn btn-outline-success btn-md"><i class="fa fa-file">&nbsp;</i></button>
				    				<button id="inventory_products_btn" class="btn btn-outline-warning btn-sm"><i class="fa fa-list">&nbsp;</i>Inventory</button>
					    		</div>
					    	</div>						    	
						</div>
					  <div class="form-group row">
					    <label for="product_category" class="col-sm-2 col-form-label">Jenis</label>
					    <div class="col-sm-5">
					      <select class="form-control input-sm" name="product_category" id="product_category"></select><!-- 
									<optgroup label="Jenis Barang">								
										<option value=KL>Kalung</option>
										<option value=LN>Liontin</option>
										<option value=GL>Gelang</option>
										<option value=CN>Cincin</option>
										<option value=AN>Anting</option>
										<option value=GW>Giwang</option>
									</optgroup>
								</select> -->
					    </div>
					    <div class="col-sm-1">
					    	<button class="btn-sm btn btn-primary"><i class="fa fa-plus"></i></button>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="berat" class="col-sm-2 col-form-label">Berat</label>
					    <div class="col-sm-4 form-group">
					      <input type="text" class="form-control" id="berat" name="berat" placeholder="(gram): 11">
					    </div>
					    <label class="col-sm-1 text-left align-middle control-label">gram</label>
					    <div class="col-sm-5">
					      <div class="form-check">
					        <input class="form-check-input" name="is_notrefurbished" type="checkbox" id="is_notrefurbished">
					        <label class="form-check-label" for="is_notrefurbished">
					          Barang Baru
					        </label>
					      </div>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="product_class" class="col-sm-2 col-form-label">Kode</label>
					    <div class="col-sm-5">
					      <select class="select2 form-control input-sm" name="product_class" id="product_class"></select>
							<!-- 		<optgroup label="Keterangan">
										<option value="1">Emas Tua 700</option>
										<option value="2">Emas Tua 750</option>
										<option value="3">Emas Muda 300</option>
										<option value="4">Emas Muda 450</option>
										<option value="5">Emas Arab</option>
									</optgroup>
								</select> -->
					    </div>
					    <div class="col-sm-1">
					    	<button class="btn-sm btn btn-primary"><i class="fa fa-plus"></i></button>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="product_name" class="col-sm-2 col-form-label">Label</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nama Barang">
					      <input type="hidden" class="form-control" id="product_barcode" name="product_barcode" placeholder="Barcode" value="ABCDE">
					      <!-- <input type="hidden" class="form-control" id="product_barcode" name="product_barcode" placeholder="Barcode" value="ABCDE"> -->
					    </div>
					  </div>					  
					  <div class="form-group row">					  	
					  	<label for="snapshot" class="col-sm-2 col-form-label">Snapshot</label>
					  	<div class="col-sm-5 center">															  		
							<div id="polaroid_1" class="polaroid">
							  <div id="polaroid_container_1" class="polaroid_container">
							    <p class="textproductname">######</p>
							    <p class="imagebarcode">************</p>
							  </div>
							  <!-- <img src="<?php echo base_url('assets/img/products/none.jpg'); ?>" alt="5 Terre" style="width:100%"> -->
							  <div class="canvas-container">									
									<div id="canvas" class="canvas" name="product_image_blob"></div>
								</div>
							</div>
						</div>						
					  </div>					  					  
					  
					</form>

					
				</div>
				<div class="col-md-6 text-center">					
					<div class="row" style="margin:0;padding:0;">
						<div class="col-sm-12">										
							<div id="contain-container" class="text-center">
								<div class="video-container" style="margin:0 auto;">																		
									<div id="video" class="video"></div>
								</div>					
								<div class="btn-group btn">								
									<button type="button" class="btn btn-sm btn-primary" name="print_barcode" id="print_barcode" ><i class="fa fa-print" style="font-size:4em;"></i><i class="fa fa-barcode" style="font-size:1.2em;"></i></button>					
									<button type="button" class="btn btn-sm btn-primary" name="snapper" id="snapper"><i class="fa fa-camera" style="font-size:4em;"></i></button>					
									<button type="button" class="btn btn-sm btn-primary" name="save_product" id="save_product"><i class="fa fa-save" style="font-size:4em;"></i></button>
									</div>			
							</div>
						</div>			
					</div>					
				</div>
			</div>
		</div>
		<style>
			#snapper{
				width: inherit;
				height:70px;
			}

		</style>
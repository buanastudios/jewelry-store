     <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
                <div class="col-md-6">
					<div class="row">
		                <div class="col-md-3">							
							<div class="form-group" >
								<label class="col-sm-12 control-label" id="trx_date" ><?php echo $b; ?></label>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group" >
								<label class="col-sm-12 control-label" id="class_product">Emas Muda</label>
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group" >
								<label class="col-sm-12 control-label text-right"><span id="weight_product">11</span>&nbsp;<span>gram</span></label>
							</div>							
						</div>
					</div>
					
					<div class="row">
		                <div class="col-md-3">							
							<div class="form-group" >								
								<span id="user_logged">Nama Karyawan</span>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group" >
								<label id="category_product" class="col-sm-12 control-label">Kalung</label>
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group" >
								<label id="product_price" class="col-sm-12 control-label text-right">4400000</label>
							</div>							
						</div>						
					</div>							
                	
					<div class="row">
		                <div class="col-md-3">	
		                	<div class="form-group" >													
							<label id="keterangan_barang" class="col-sm-12 control-label"><span id="used_product" style="color:lightgreen;font-size:19px;" >Bekas</span></label>
							</div>
						</div>						
						<div class="col-md-3">
							<div class="form-group" >
								<label id="name_product" class="col-sm-12 control-label">Kalung Italy</label>
							</div>							
						</div>
						<div class="col-md-6">
							<div class="form-group" >
								<input type="text" id="price_after_calc" class="form-control" />
							</div>							
						</div>
					</div>
															
					<div class="row" >			
						<div class="col-md-12" style="margin: 0 auto;">
							<div class="the_calc">
								<div class="calculator">
									<button id="calc_num_1" data-num="1" class="calc_num">1</button>
									<button id="calc_num_2" data-num="2" class="calc_num">2</button>
									<button id="calc_num_3" data-num="3" class="calc_num">3</button>
									<button id="calc_num_4" data-num="4" class="calc_num">4</button>
									<button id="calc_num_5" data-num="5" class="calc_num">5</button>
									<button id="calc_num_6" data-num="6" class="calc_num">6</button>
									<button id="calc_num_7" data-num="7" class="calc_num">7</button>
									<button id="calc_num_8" data-num="8" class="calc_num">8</button>
									<button id="calc_num_9" data-num="9" class="calc_num">9</button>
									<button id="calc_num_0" data-num="0" class="calc_num">0</button>
									<button id="calc_num_00" data-num="00"  class="calc_num hundreds" >00</button>							
								</div>
								<div class="reset_calc">							
									<button id="calc_operator_minus" class="calc_ops minus"><i class="fa fa-minus"></i></button>
									<button id="calc_operator_delete" class="calc_ops remove"><i class="fa fa-arrow-left"></i></button>
									<button id="calc_operator_save" class="calc_ops ok">OK</button>
									<button id="add_to_cart" class="calc_ops save"><i class="fa fa-save">&nbsp;</i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form class="form-horizontal" action="" method="post">
								<div class="row">
									<div class="col-md-6">										
										<div class="form-group">		
											<!-- <label class="col-sm-8 control-label" id="price_per_gram" class="price_per_gram">400000/gram</label>	 -->
											<input type="number" name="new_price_per_gram" id="new_price_per_gram" class="form-control" placeholder="Price Per Gram" />																								
										</div>										
									</div>																
									<div class="col-md-6">
										<div class="form-group">											
											<div class="col-sm-12">
												<input type="number" id="pembulatan" name="pembulatan" class="form-control" placeholder="Harga Pembulatan" />
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">					
										<input type="text" id="barcode" name="barcode" class="form-control" placeholder="Barcode" />					
									</div>																									
								</div>								
							</form>
						</div>
                	</div>            
                </div>                
                <div class="col-md-6">
                	<div class="row">
                		<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-12">
									<?php ?>
									
									<form action="<?php echo base_url("cashier/invoice"); ?>" method="POST">
										<input type="hidden" name="invoice_properties" value="INV#9876543" />
										<input type="hidden" name="invoice_num" value="INV#9876543" />
										<input type="hidden" name="product_name" value="Cincin Emas Muda" />
										<input type="hidden" name="invoice_trx_date" value="09 September 2018" />
										<input type="hidden" name="cashier_name" value="Derry" />
										<input type="hidden" name="product_weight" value="11.09 gram" />
										<input type="hidden" name="product_price" value="12.900.000,- IDR" />
										<input type="hidden" name="invoice_price" value="12.900.000,- IDR" />
										<input type="hidden" name="invoice_price_word" value="DUA BELAS JUTA SEMBILAN RATUS RIBU RUPIAH" />										
									</form>									
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">	
										<div class="row">					
											<?php 
												$given_count = 4;
												$given_length= 3;
												$gen = [];
												$gen[0] = join ('', array_map(function($value){return $value==1 ? mt_rand(1,9):mt_rand(0,9);}, range(1,$given_length)));
												$gen[1] = $given_count +1;												
												$gen[2] = $global['moment']->format('M');
												$gen[3] = substr($this->session->userdata('nama'),0,3); 
												$gen[4] = $global['moment']->format('d');
												$gen[5] = "SALE";
												$gen[6] = $global['moment']->format('Y');
																						
												$invoice_complete_num= '';
												foreach ($gen as $k=>$v){
													if ($k>0){
														$invoice_complete_num .= "/".$v;
													}else{
														$invoice_complete_num .= $v;
													}
												}
											?>

											<label class="col-sm-6 control-label" id="invoice"><span id="num_invoice"><?php echo $invoice_complete_num; ?></span></label>							
											<div class="col-sm-6">
												<div class="btn-group float-right">
												<button id="new_invoice" type="submit" class="btn btn-sm btn-default"><i class="fa fa-file"></i>&nbsp;Reset/New</button>
												<button id="print_invoice" type="submit" class="btn btn-sm btn-default"><i class="fa fa-print"></i>&nbsp;Print</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>						
							<div class="row">
							<div class="col-sm-12">
								<table id="purchase_notes" 				
														   class="table table-condensed table-bordered table-hover no-margin"
														   data-toggle="table" 
														   data-cache="false" 
														   data-page-list="[10, 25, 50, 100, ALL]"
														   data-pagination="true" 
														   data-side-pagination="server"
														   data-search="false"
														   data-show-columns="false"
														   data-show-export="true"                                       
														   data-show-columns="true"
														   data-toolbar="#toolbar"
														   data-sort-name="id"
														   data-sort-order="desc"
															>
															<thead>																															
																<th data-field="sku" data-sortable="true" style="text-align:center;vertical-align:middle;">Barang</th>
																<th data-field="unit_name" data-sortable="true" style="text-align:center;vertical-align:middle;">Kode</th>
																<th data-field="label" data-sortable="true" style="text-align:center;vertical-align:middle;">Berat</th>																
																<th data-field="subunit_name" data-sortable="true" style="text-align:center;vertical-align:middle;">Harga/gram</th>
																<th data-field="category_name" data-sortable="true" style="text-align:center;vertical-align:middle;">Jumlah</th>                                           
															</thead>	
															<tbody></tbody>						
															
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="row">
										<label id="invoice_total" class="col-sm-11 control-label" ><span id="currency"><!-- IDR --></span>&nbsp;<span id="invoice_total">5200000</span></label>																
									</div>
									<div class="row">
										<div class="col-sm-11">
											<div class="row" >												
												<div class="col-sm-12">
													<i><span id="invoice_total_wordy">&nbsp;</span></i>
												</div>
											</div>
										</div>
									</div>
									<div class="row" id="current_product_price">
										<!-- <div class="col-sm-11 well" id="current_product_pre_calculated"><span id="weight_current_product">11</span><span class="small unit">&nbsp;gram</span>&nbsp;x&nbsp;<span id="price_current_product">200000</span><span>=</span><span id="current_product_calculated" class="larger">2200000</span></div> -->
									</div>									
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">									
									<div class="row">
										<div class="col-sm-12 center">										
											<div id="polaroid" class="polaroid">
											  <div id="polaroid_container" class="polaroid_container">
											    <p class="textproductname" product_id="#" >######</p>
											    <p class="imagebarcode">************</p>
											  </div>
											  <div class="product_image"><img src="<?php echo base_url('assets/img/products/none.jpg'); ?>" alt="5 Terre" style="width:100%">
											  </div>
											</div>
										</div>
									</div>
								</div>								
							</div>
						</div>
						</div>
					</div>
                </div>            
            </div>
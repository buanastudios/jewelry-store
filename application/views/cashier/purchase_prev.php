        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-6">
                	<div class="row">						
                		<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-7">
									<div class="row">
										<label for="customertype" class="col-sm-4 control-label">&nbsp;</label>							
										
									</div>
								</div>
							</div>						
							<div class="row">
							<div class="col-sm-12">
								<table id="receive_notes" 				
														   class="table table-condensed table-bordered table-hover no-margin"
														   data-toggle="table" 
														   data-cache="false" 
														   data-page-list="[10, 25, 50, 100, ALL]"
														   data-pagination="true" 
														   data-side-pagination="server"
														   data-search="true"
														   data-show-columns="true"
														   data-show-export="true"                                       
														   data-show-columns="true"
														   data-toolbar="#toolbar"
														   data-sort-name="id"
														   data-sort-order="desc"
															>
															<thead>
																<th data-field="state" data-checkbox="true" style="text-align:center;vertical-align:middle;"></th>																
																<th data-field="sku" data-sortable="true" style="text-align:center;vertical-align:middle;">Kasir</th>
																<th data-field="unit_name" data-sortable="true" style="text-align:center;vertical-align:middle;">Barang</th>
																<th data-field="label" data-sortable="true" style="text-align:center;vertical-align:middle;">Berat</th>																
																<th data-field="label" data-sortable="true" style="text-align:center;vertical-align:middle;">Kode</th>																
																<th data-field="subunit_name" data-sortable="true" style="text-align:center;vertical-align:middle;">Keterangan</th>
																<th data-field="category_name" data-sortable="true" style="text-align:center;vertical-align:middle;">Harga</th>                                           
															</thead>								
															<tbody>
																<tr>
																	<td>
																		<button class="btn btn-warning btn-sm">
																			<i class="fa fa-trash">&nbsp;</i>
																		</button>
																	</td>																	
																	<td>Kasir 1</td>
																	<td>Kalung Italy</td>
																	<td>11 g</td>
																	<td>Emas Muda 300</td>
																	<td>Lepas</td>
																	<td>150000</td>
																</tr>
																<tr>
																	<td>
																		<button class="btn btn-warning btn-sm">
																			<i class="fa fa-trash">&nbsp;</i>
																		</button>
																	</td>																	
																	<td>Kasir 1</td>
																	<td>Kalung Italy</td>
																	<td>11 g</td>
																	<td>Emas Muda 300</td>
																	<td>Patah</td>
																	<td>150000</td>
																</tr>
																<tr>
																	<td>
																		<button class="btn btn-warning btn-sm">
																			<i class="fa fa-trash">&nbsp;</i>
																		</button>
																	</td>																	
																	<td>Kasir 1</td>
																	<td>Kalung Italy</td>
																	<td>11 g</td>
																	<td>Emas Muda 300</td>
																	<td>Sebelah</td>
																	<td>150000</td>
																</tr>
															</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">									
									<div class="row">
										<div class="form-group">											
											<div class="col-sm-5">
												<select class="select2 form-control input-sm">
													<optgroup label="Jenis Kerusakan">
														<option value=1>Rusak/Patah</option>
														<option value=2>Cacat</option>
														<option value=3>Emas Putih</option>
														<option value=4>BRB</option>
														<option value=5>Barang Umum</option>
														<option value=6>< 0.700 gram</option>
													</optgroup>
												</select>
											</div>											
											<label id="invoice_total" class="col-sm-7 control-label" style="font-size:30px; text-align:right;">4500000</label>
										</div>	
									</div>
									<div class="row">
										<div class="form-group">											
											<div class="col-sm-3">
												<select class="select2 form-control input-lg" id="potongan_harga" name="potongan_harga">
													<optgroup label="Potongan Harga">
													<option value=30000>30000 - Rusak/Patah</option>
													<option value=25000>25000 - Rusak/Patah</option>
													<option value=20000>20000 - Cacat</option>
													<option value=15000>15000 - Emas Putih</option>
													<option value=12000>12000 - BRB</option>
													<option value=10000>10000 - Barang Umum</option>
													<option value=7000>7000 - Berat 0.700 Kebawah</option>
													</optgroup>
												</select>												
											</div>											
											<label class="col-sm-1 control-label">x</label>
											<div class="col-sm-3">
												<input id="berat_sebenarnya" name="berat_sebenarnya" class="form-control input-sm" placeholder="Berat"/>											
											</div>
											<label class="col-sm-1 control-label">=</label>
											<div class="col-sm-3">
												<label id="total_setelah_potongan" class="form-control control-label">8900000</label>											
											</div>
										</div>	
									</div>
									<div class="row">	
										&nbsp;
									</div>
									<div class="row">	
										<div class="col-sm-9">
											<div class="row">										
												<div class="col-sm-6">
																<select name="nama_kasir" class="form-control select2 input-sm">
																	<optgroup label="Pilihan Kasir">
																		<option value=1 selected>Kasir 1</option>
																		<option value=2 >Kasir 2</option>
																		<option value=3 >Kasir 3</option>
																	</optgroup>
																</select>
												</div>																							
												<label id="name_product" name="name_product" class="col-sm-6 control-label" style="font-size:30px;">Kalung Italy</label>
											</div>
											<div class="row" style="height:50px;">	
												&nbsp;
											</div>						
										</div>
										<div class="col-sm-3 product">
											<img src="../assets/img/neclace.jpg" class="pull-right" />
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-6">		
					<div class="row">
						<div class="col-md-6">
							<label id="trx_date">6/12/2018</label>
						</div>						
						<div class="col-md-6">		
							<label id="invoice">FAKTUR #<span id="num_invoice">123456789</span></label>
						</div>
					</div>
					<div class="the_calc receiving_calc row">
						<div class="calculator">
							<div class="row">
									<button id="calc_num_1" data-num="1" class="calc_num">1</button>
									<button id="calc_num_2" data-num="2" class="calc_num">2</button>
									<button id="calc_num_3" data-num="3" class="calc_num">3</button>
							</div>
							<div class="row">
									<button id="calc_num_4" data-num="4" class="calc_num">4</button>
									<button id="calc_num_5" data-num="5" class="calc_num">5</button>
									<button id="calc_num_6" data-num="6" class="calc_num">6</button>
							</div>
							<div class="row">
									<button id="calc_num_7" data-num="7" class="calc_num">7</button>
									<button id="calc_num_8" data-num="8" class="calc_num">8</button>
									<button id="calc_num_9" data-num="9" class="calc_num">9</button>									
							</div>
							<div class="row">								
								<button id="calc_num_0" data-num="0" class="calc_num">0</button>
								<button id="calc_num_00" data-num="00"  class="calc_num hundreds" >00</button>							
								<button id="calc_operator_delete"><i  class="calc_ops remove fa fa-arrow-left"></i></button>
							</div>
							<div class="row">								
								<button id="calc_operator_save" class="calc_ops">Simpan</button>
							</div>
						</div>
					</div>					
				</div>	
				<div class="col-md-12">
					<div class="row" style="left:0px;top:-50px;position:relative;">
						<div class="col-md-2">
							<input id="barcode" name="barcode" class="form-control input-sm" placeholder="Barcode" />											
						</div>
						<div class="col-md-3">
							
							<label id="current_product_price" style="font-size:30px;">1600000</label>							
						</div>						
						<label id="weight_current_product" class="col-sm-3 control-label" style="text-align:right;font-size:28px;">11 g</label>																				
						<div class="col-md-2">
							<input id="new_product_weight" name="new_product_weight" class="form-control class="input-sm" placeholder="Product Weight" />																	
						</div>
					</div>	
				</div>
			</div>
        </div>
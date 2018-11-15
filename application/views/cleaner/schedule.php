			    <!-- Page Content Holder -->
			    <div id="content">
			    	<div class="row">
						<div class="col-md-6">
							<h3>Warehouse &raquo; Cleaner &raquo; Schedule</h3>
						</div>
					</div>
			    	<div class="row">
						<div class="col-md-1">
							Pilih
						</div>					
						<div class="col-md-11">					
							<select id="employee" class="select2">
								<optgroup label="Kasir">					
									<option value="1">kasir 1</option>
									<option value="2">kasir 2</option>
									<option value="3">kasir 3</option>							
								</optgroup>				
							</select>										
							<button id="add_to_schedule" class="btn btn-success btn-sm">Jadwalkan <i class="fa fa-calendar"></i></button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						&nbsp;
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
					<table id="product_to_schedule" class="table table-dark table-striped table-hover no-margin"
                            data-page-list="[10, 25, 50, 100, ALL]"
                            data-show-columns="true"
                            data-pagination="true"
                            data-side-pagination="client"
                            >                                            
					</table>
						</div>
					</div>
				</div>	
			</div>
		</div>
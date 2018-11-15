        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
        		<div class="col-md-4">
        			<table class="table table-dark table-condensed table-bordered table-striped table-hover no-margin">
						<tbody>
							<tr>
								<th colspan=7>Total Inventory</th>
								<th colspan=7>1080 items</th>
							</tr>
							<tr>
								<th colspan=7>Weight in Total</th>
								<th colspan=7><?php echo 92312312/1000; ?> (k) gram</th>
							</tr> 
						</tbody>
					</table>
				</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<div class="btn-group">
        				<?php for($i=0;$i<12;$i++){ ?>
        					<button class="btn btn-primary"><?php echo $i;?></button>
        				<?php } ?>
        			</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<table id="stock_report"  class="table table-dark table-striped table-hover no-margin"
                            data-page-list="[10, 25, 50, 100, ALL]"
                            data-show-columns="true"
                            data-pagination="true"
                            data-side-pagination="client"                            
                            >                        
                            <thead>
                            	<tr>
                            	<th class="text-center" rowspan=2>Transaction Date</th>
                            	<th class="text-center" rowspan=2>Item</th>
                            	<th class="text-center" rowspan=2>Quantity</th>
                            	<th class="text-center" rowspan=2>Weight</th>
                            	<th class="text-center" rowspan=1 colspan=2 daa-header-align="center">Total</th>
                            	<th class="text-center" rowspan=2 colspan=1>Description</th>
                            	</tr>
                            	<tr>
                            		<th>Quantity</th>
                            		<th>Weight</th>
                            	</tr>
                            </thead>
                            <tbody>
                            	<?php for($i=0;$i<30;$i++){ ?>                            	
                            	<tr>
                            		<td>2018/<?php echo $i+1;?>/09</td>
                            		<td>6</td>
                            		<td>5</td>
                            		<td>4</td>
                            		<td>3</td>
                            		<td>2</td>
                            		<td>1</td>                            		
                            	</tr>
                            	<?php } ?>
                            </tbody>
                    </table>
				</div>
			</div>
		</div>
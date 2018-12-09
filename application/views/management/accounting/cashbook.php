        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h4>Management &raquo; Accounting &raquo; Cash Flow Statement</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					&nbsp;
				</div>
			</div>
			<div class="row">
				<label class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-form-label col-form-label-sm text-center">Type</label>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
					<input type="radio" name="rep_type" value="daily" />Daily
					<input type="radio" name="rep_type" value="monthly" />Monthly
					<input type="radio" name="rep_type" value="yearly" />Yearly
				</div>
			</div>
			<!-- <div class="form-row text-center align-items-center">
				<label class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-form-label col-form-label-sm">Periode</label>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>				
							<span class="input-group-text"><i class="fa fa-times"></i></span>
						</div>
						<input type="text" id="period_month" class="daterange form-control" aria-label="Date Periode">
						<div class="input-group-append">
							<button id="search_book_by_date" class="btn btn-outline-success" type="button"><i class="fa fa-search"></i></button>
						</div>
					</div>                
				</div>				
			</div>
			<div class="form-row text-center align-items-center">
				<label class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-form-label col-form-label-sm">Periode</label>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>				
							<span class="input-group-text"><i class="fa fa-times"></i></span>
						</div>
						<input type="text" id="period_year" class="daterange form-control" aria-label="Date Periode">
						<div class="input-group-append">
							<button id="search_book_by_date" class="btn btn-outline-success" type="button"><i class="fa fa-search"></i></button>
						</div>
					</div>                
				</div>				
			</div> -->
			<div class="form-row text-center align-items-center">
				<label class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-form-label col-form-label-sm">Periode</label>
				<div class="col-lg-4 col-md-4 col-sm-3 col-xs-4">
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>				
							<span class="input-group-text id="cleardateparam" ><i class="fa fa-times"></i></span>
						</div>
						<input type="text" id="period" class="daterange form-control" aria-label="Date Periode" readonly >
						<div class="input-group-append">
							<button id="search_book_by_date" class="btn btn-outline-success" type="button"><i class="fa fa-search"></i></button>
						</div>
					</div>                
				</div>				
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
					&nbsp;
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
					<hr/>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
					<table id="cashbook" class="table table-condensed  table-striped table-hover no-margin">
						
						<tbody>
						    <tr>						        						        
						        <td class="text-left" style="border:none;">Penjualan</td>
						        <td class="text-right" trx_type="1" style="border:none;">xxx</td>
						    </tr>
						    <tr >						        
						        <td class="text-left" style="border:none;">Pembelian</td>
						        <td class="text-right" trx_type="2" style="border:none;">xxx</td>						        
						    </tr>
						    
						    <tr>
						    	<td class="text-left" colspan="2"><hr/></td>
						    </tr>
						    <tr>						        						        
						        <td class="text-left" style="border:none;">Pendapatan</td>
						        <td class="text-right" trx_type="3" style="border:none;">xxx</td>
						    </tr>
						    <tr>						        						        
						        <td class="text-left" style="border:none;">Pengeluaran</td>
						        <td class="text-right" trx_type="4" style="border:none;">xxx</td>
						    </tr>
						    <tr>
						    	<td class="text-left" colspan="2"><hr/></td>
						    </tr>
						    <tr>						        						        
						        <td class="text-left">Kas</td>
						        <td class="text-right" trx_type="sum">xxx</td>
						    </tr>
						    
						</tbody>
					</table>
				</div>
			</div>        	
		</div>
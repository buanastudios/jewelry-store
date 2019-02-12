        <!-- Page Content Holder -->
        <div id="content">
            <div class="row">
                <div class="col-md-6">
                    <h4>Kasir &raquo; Histori</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div id="toolbar">
                        <div class="btn-group">
                            <button id="toggle_sales" type="button" class="togglehistory btn btn-primary">
                                <i class="fas fa-indent"></i>&nbsp;Penjualan
                            </button>
                            <button id="toggle_purchase" type="button" class="togglehistory btn btn-warning">
                                <i class="fas fa-outdent"></i>&nbsp;Pembelian
                            </button>                        
                            <!-- <button id="toggle_expense" type="button" class="togglehistory btn btn-warning">
                                <i class="fas fa-outdent"></i>&nbsp;Expense
                            </button>                         -->
                        </div>
                        
                        <div class="btn-group">
                            <button id="row_print" type="button" class="btn btn-success">
                                <i class="fas fa-print"></i>&nbsp;Print Invoice
                            </button>
                            <button id="row_cancel" type="button" class="btn btn-warning">
                                <i class="fas fa-ban"></i>&nbsp;Batalkan Transaksi
                            </button>
                            <!-- <button id="row_remove" type="button" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button> -->
                            <button id="rows_refresh" type="button" class="btn btn-default">
                                <i class="fas fa-sync"></i>
                            </button>
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
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		        	<!--div id="cashier_stats" class="interactive-chart" style="height: 400px;"></div-->
                    <p class="text-center">
                        <strong>Sales</strong>
                    </p>

                    <!-- <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Kasir 1</div>
                      <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Kasir 2</div>
                      <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Kasir 3</div>
                      <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">Kasir 4</div>
                      <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Kasir 5</div>
                      <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Kasir 6</div>
                    </div>
                    <br/>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                      <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                      <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->

                    <table 
                            id="cashier_s_transactions"
                            class="table table-condensed table-dark table-striped table-hover no-margin"
                            data-page-list="[10, 25, 50, 100, ALL]"
                            data-show-columns="true"
                            data-pagination="true"
                            data-side-pagination="client"
                            
                            >                        
                    </table>            
                    <p class="text-center">
                        <strong>Purchase</strong>
                    </p>
                    <table 
                            id="cashier_p_transactions"
                            class="table table-condensed table-dark table-striped table-hover no-margin"
                            data-page-list="[10, 25, 50, 100, ALL]"
                            data-show-columns="true"
                            data-pagination="true"
                            data-side-pagination="client"
                            
                            >                        
                    </table>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
		        	<table 
		        			id="transaction_history"
		        			class="table table-condensed table-dark table-striped table-hover no-margin"
		        			data-page-list="[10, 25, 50, 100, ALL]"
		        			data-show-columns="true"
		        			data-pagination="true"
		        			data-side-pagination="client"
		        			data-toolbar="#toolbar">						
					</table>        	
				</div>
            </div>
        </div>
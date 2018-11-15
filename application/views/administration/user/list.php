        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-lg-12">
					<div id="toolbar">                        
                        <div class="btn-group">                            
                            <button id="row_add" type="button" class="btn btn-success">
                                <i class="fas fa-plus"></i>&nbsp;
                            </button>
                            <button id="row_remove" type="button" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button id="rows_refresh" type="button" class="btn btn-default">
                                <i class="fas fa-sync"></i>
                            </button>
                        </div>
                    </div>
					<table 
		        			id="user_list"
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
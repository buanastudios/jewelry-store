        <!-- Page Content Holder -->
        <div id="content">
        	<div class="row">
				<div class="col-md-10">
					<h4>Management &raquo; Pengelolaan Karyawan &raquo; Daftar Karyawan</h4>
				</div>
			</div>
			<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div id="toolbar">
                        <div class="btn-group">
                            <button id="employee_add_btn" type="button" class="togglehistory btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i>&nbsp;Tambah Staff
                            </button>                                                        
                            <button id="employee_del_btn" type="button" class="btn btn-danger  btn-sm ">
                                <i class="fas fa-trash"></i>&nbsp;Hapus Staff
                            </button>                        
                        </div>
                        <div class="btn-group">
                            <button id="employee_salary_btn" type="button" class="btn btn-sm btn-success">
                                <i class="fas fa-money-bill-wave-alt"></i>&nbsp;Penggajian Staff
                            </button>                                                                                    
                        </div>
                        <div class="btn-group">
                            <button id="employee_salary_btn" type="button" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i>&nbsp;Simpan Perubahan
                            </button>                                                                                    
                        </div>
                     </div>
                 </div>
             </div>
        	<div class="row">
				<div class="col-md-6">
					<table 
		        			id="employee_list"
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
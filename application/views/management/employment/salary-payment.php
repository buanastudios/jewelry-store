        <!-- Page Content Holder -->
        <div id="content">
            <div class="row">
                <div class="col-md-6">
                    <h4>Management &raquo; Employment &raquo; Salary</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                		
                </div>  
			</div>
            
            
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                   <form method="POST" enctype="multipart/form-data">  
                      <div class="row">
                        <div class="col">
                            &nbsp;
                        </div>
                      </div>
                      <div class="row">                        
                        <label for="periode" class="col col-form-label">Periode</label>                        
                        <div class="col text-right">
                          <input type="text" class="form-control" placeholder="Periode Gaji" id="periode" name="periode" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            &nbsp;
                        </div>
                      </div>                      
                      <div class="row">
                        <label for="expense_amount" class="col col-form-label">Rp. </label>                        
                        <div class="col text-right">
                          <input type="text" class="form-control" placeholder="Jumlah Gaji" id="salary_amount" name="salary_amount" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            &nbsp;
                        </div>
                      </div>
                      <div class="row">  
                        <label for="employee" class="col  col-form-label">Karyawan</label>                        
                        <div class="col  ">
                            <select id="employee" class="form-control select2-single" name="employee">
                            </select>
                        </div>
                       </div>
                       <div class="row">                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <button id="makepayment" type="button" class="btn btn-sm btn-success">Bayar Gaji</button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            &nbsp;
                        </div>
                      </div>                      
                    </form>
                </div>  
            </div>			
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <h4>Daftar gaji terbayar</h4>
                  <small><span>Total: </span><span id="totalinpage"></span></small>                  
                </div>  
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  &nbsp;                        
                </div>  
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                    <table id="transactions_list" class="table table-dark table-striped table-hover no-margin table-condensed no-margin">
                        <thead>
                            <tr>
                                <th rowspan="2" class="checkedbox  text-center align-middle"><input type="checkbox" id="checkAll" /></th>
                                <th colspan="2" rowspan="1" class="expense_trx_date text-center align-middle">Timestamp</th>         
                                <th rowspan="2" class="trx_label text-center align-middle">Transaksi</th>
                                <th rowspan="2" class="trx_amount text-center align-middle">Jumlah</th>                                
                                <th rowspan="2" class="trx_voucher text-center align-middle">Keterangan</th>
                            </tr>   
                            <tr>
                                <th rowspan="1" class="trx_date text-center">Tanggal</th>
                                <th rowspan="1" class="trx_time text-center">Waktu</th>                                
                            </tr>                
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
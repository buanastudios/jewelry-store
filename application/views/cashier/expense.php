        <!-- Page Content Holder -->
        <div id="content">
            <div class="row">
                <div class="col-md-6">
                    <h4>Kasir &raquo; Pengeluaran Lainnya</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                </div>  
            </div>
            
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <form>   
                        <div class="row">
                            <div class="col-md-3">                                
                                <div class="input-group input-group-md">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input id="radiolabel1" type="radio" checked="checked" value="1" name="expense_label_is_existed" aria-label="Radio button for following text input">
                                    </div>
                                </div>
                                <select class="form-control select2-single" id="existed_expense_label" name="existed_expense_label">
                                    <optgroup label="Operasional">        
                                        <option value="3">Listrik</option>                                                                    
                                        <option selected value="5">Telpon</option>
                                    </optgroup>                                    
                                </select>
                                </div>
                            </div>
                        
                            <div class="col-md-3">
                                <div class="input-group input-group-md">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input id="radiolabel2" type="radio" value="0" name="expense_label_is_existed" aria-label="Radio button for following text input">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Ketik Label Baru" id="new_expense_label" name="new_expense_label" />
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 text-left">
                                <button id="btn_manage_label" class="btn btn-md btn-primary"><i class="fa fa-cog"></i></button>
                            </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            &nbsp;
                        </div>
                      </div>
                      <div class="row text-right">
                        <label for="expense_amount" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-form-label">Rp. </label>                        
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                          <input type="text" class="form-control" placeholder="Jumlah" id="expense_amount" name="expense_amount" />
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <input type="text" class="form-control" placeholder="Keterangan" id="trx_description" name="trx_description" />
                        </div>
                        <div class="col-lg-1 col-md-1 text-left">
                          <button id="btn_save_trx" class="btn btn-md btn-primary"><i class="fa fa-save"></i></button>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  &nbsp;                        
                </div>  
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <h4>Daftar transaksi <i>pengeluaran lain</i> Anda pada hari ini</h4>
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
        <!-- Page Content Holder -->
        <div id="content">
            <div class="row">
                <div class="col-md-6">
                    <h5>Inventory &raquo Stock Adjustment</h5>
                </div>
            </div>                      
            <div class="row">
                <div class="col-md-12">
                    &nbsp;
                </div>
            </div>
            <div class="form-row text-center align-items-center">                
                <div class="col-6">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <!-- <span class="input-group-text"><i class="fa fa-calendar"></i></span>                 -->
                            <span class="input-group-text id="cleardateparam" ><i class="fa fa-times"></i></span>
                        </div>
                        <input type="text" id="period" class="daterange form-control" aria-label="Date Periode" readonly placeholder="Periode Opname" />
                        <input type="hidden" id="periodformatted" class="daterange form-control" aria-label="Date Periode" readonly placeholder="Periode" />
                        <div class="input-group-append">                        
                            <button id="displayAllTable" class="btn btn-outline-success" type="button" ><i class="fa fa-list">&nbsp;</i></button>
                        </div>
                        <input id="barcode_scanned" type="text" class="form-control" placeholder="Single Barcode" aria-label="Barcode" aria-describedby="barcode_search" />
                        <div class="input-group-append">
                            <button id="barcode_search" class="btn btn-outline-success" type="button"><i class="fa fa-search"></i></button>
                        </div>                        
                    </div>                
                </div>
                <div class="col">
                    <div class="input-group input-group-sm">                        
                        <input type="text" id="opname_status" class="form-control status_notif" aria-label="Opname Status" readonly placeholder="Status" />
                    </div>                
                </div>              
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h6>&nbsp;</h6>
                </div>
            </div>
            
            <div class="row">               
                <div class="col-md-12">
                    <form class="form-row" style="display: none;" id="barcode_search_result">
                        <div class="col-4">                         
                            <div style="float: left; width: 50%;"><img src="http://localhost/courses/derry/jewelry-store/product/itemImage/CN-010297799" style="width: 100%;" class="product_image"></div>

                            <div style="float: right; width: 40%; margin-left: 10%;">
                                <div class="product_name">Kalung Italy</div>
                                <div>                           
                                    <div class="badge product_class">Emas Tua 700</div>
                                    <div class="badge product_weight">20 gram(s)</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div id="single_opname_barcode" class="opnamed_barcode">Rak #123123</div>
                            <input id="single_opname_value" type="text" class="form-control opnamed_stock" placeholder="Physical Stock" value='0' />
                            <button id="single_opname" type="button" class="btn btn-primary"><i class="fa fa-save"></i></button>
                        </div>                                  
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="inventory_list" style="display: none;">
                    <table id="inventory"  class="table table-dark table-striped table-hover no-margin"
                            data-page-list="[10, 25, 50, 100, ALL]"
                            data-show-columns="true"
                            data-pagination="true"
                            data-side-pagination="client"                            
                            >                        
                            <thead>
                                <tr>
                                    <th class="checkedbox"><input type="checkbox" id="checkAll" /></th>
                                                        
                                    <th class="product_name">Item</th>                                                                                                              
                                    <th colspan="2" class="product_stock">Stock Adjustment</th>                                                                                                                            
                                </tr>                               
                            </thead>                            
                    </table>
                </div>
            </div>              
        </div>
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Toko Emas DOLLAR©<!-- <small>Jewelry Store</small> --></h3>
            </div>
            <ul class="list-unstyled components">
                <p>Selamat Bekerja, 
                    <select id="userlogged" width="100%" style="width: 100%">

                    </select>                    
                </p>
                <?php if(strlen($this->session->userdata('nama'))==0){
                        $c= "officerisnotselected";
                      }else{
                        $c = "officerisselected";
                      };
                ?>
                <p>
                    <span id="userbadge" class="<?php echo $c; ?>">
                        <small><i class="fa fa-id-badge">&nbsp;</i></small>
                        <span id="user_logged"><?php echo $this->session->userdata('nama'); ?></span>                                   
                    </span>
                    <br/>
                    <br/>
                    <small><a href="<?php echo base_url('login/logout'); ?>">Keluar</a>&nbsp;<i class="fa fa-sign-out-alt">&nbsp;</i></small>
                </p>
                <?php if ($usertype=='SysAdmin'){ ?>
                <li >
                    <a href="#administrationMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cogs">&nbsp;</i>&nbsp;Administrator</a>
                    <ul class="collapse list-unstyled" id="administrationMenu">
                        
                        <li>
                            <a href="#administrationMenuManagementMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-list">&nbsp;</i>&nbsp;Menu</a>
                                <ul class="collapse list-unstyled" id="administrationMenuManagementMenu">
                                    <li>
                                        <a href="<?php echo base_url('administration/menu/add'); ?>"><i class="fas fa-plus-square">&nbsp;</i>&nbsp;Add New</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('administration/menu/list'); ?>"><i class="fas fa-list-alt">&nbsp;</i>&nbsp;List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('administration/menu/assignment'); ?>"><i class="fas fa-check">&nbsp;</i>&nbsp;Assignment</a>
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <a href="#administrationUserManagementMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-list">&nbsp;</i>&nbsp;User/Role</a>
                                <ul class="collapse list-unstyled" id="administrationUserManagementMenu">
                                    <li>
                                        <a href="<?php echo base_url('administration/user/add'); ?>"><i class="fas fa-plus-square">&nbsp;</i>&nbsp;Add New User</a>
                                    </li>                                    
                                    <li>
                                        <a href="<?php echo base_url('administration/user/list'); ?>"><i class="fas fa-list-alt">&nbsp;</i>&nbsp;List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('administration/user/assignment'); ?>"><i class="fas fa-check">&nbsp;</i>&nbsp;Assignment</a>
                                    </li>
                                    <li>
                                        <a href="#administrationUserRoleManagementMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-list">&nbsp;</i>&nbsp;Role</a>
                                            <ul class="collapse list-unstyled" id="administrationUserRoleManagementMenu">
                                                <li>
                                                    <a href="<?php echo base_url('administration/role/add'); ?>"><i class="fas fa-plus-square">&nbsp;</i>&nbsp;Add New Role</a>
                                                </li>                                                
                                                <li>
                                                    <a href="<?php echo base_url('administration/role/list'); ?>"><i class="fas fa-list-alt">&nbsp;</i>&nbsp;List</a>
                                                </li>                                                
                                            </ul>
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('administration/config'); ?>"><i class="fas fa-cog">&nbsp;</i>&nbsp;Configuration</a>
                        </li>                                                
                    </ul>
                </li>  
                <?php } ?>
                <?php if($usertype=="Employee" || $usertype=='Owner' || $usertype=='SysAdmin'){ ?>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-random">&nbsp;</i>&nbsp;Transaksi</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo base_url('cashier/sales'); ?>"><i class="fas fa-outdent">&nbsp;</i>&nbsp;Penjualan</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('cashier/purchase'); ?>"><i class="fas fa-indent">&nbsp;</i>&nbsp;Pembelian</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('cashier/income'); ?>"><i class="fas fa-money-bill">&nbsp;</i>&nbsp;Pendapatan Lainnya</a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url('cashier/expense'); ?>"><i class="fas fa-money-bill">&nbsp;</i>&nbsp;Pengeluaran Lainnya</a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url('cashier/history'); ?>"><i class="fas fa-history">&nbsp;</i>&nbsp;Histori</a>
                        </li>             
                    </ul>
                </li>                
                <li>                    
                    <a href="#warehouseMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-warehouse">&nbsp;</i>&nbsp;Gudang</a>
                    <ul class="collapse list-unstyled" id="warehouseMenu">                                                                       
                        <li>
                            <a href="<?php echo base_url('management/report/inventory'); ?>"><i class="fas fa-chart-pie">&nbsp;</i>&nbsp;Laporan Inventori</a>
                        </li>
                        <li>
                            <a href="#warehouseProductMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-database">&nbsp;</i>&nbsp;Produk</a>
                                <ul class="collapse list-unstyled" id="warehouseProductMenu">
                                    <li>
                                        <a href="<?php echo base_url('warehouse/product/add'); ?>"><i class="fas fa-plus-square">&nbsp;</i>&nbsp;Tambah Produk</a>
                                    </li>
                                    <!-- <li>
                                        <a href="<?php echo base_url('warehouse/product/properties'); ?>"><i class="fas fa-database">&nbsp;</i>&nbsp;Properties</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('warehouse/product/inventory'); ?>"><i class="fas fa-database">&nbsp;</i>&nbsp;Class</a>
                                    </li>
                                     -->
                                    
                                    
                                </ul>                                        
                        </li> 
                        <li>                    
                            <a href="#warehouseProductStockMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-archive">&nbsp;</i>&nbsp;Inventory</a>
                            <ul class="collapse list-unstyled" id="warehouseProductStockMenu">
                                <li>
                                    <a href="<?php echo base_url('warehouse/product/inventory'); ?>"><i class="fas fa-list-alt">&nbsp;</i>&nbsp;Dalam Sistem</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('warehouse/stock/opname'); ?>"><i class="fas fa-list">&nbsp;</i>&nbsp;Opname</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('warehouse/stock/adjust'); ?>"><i class="fas fa-database">&nbsp;</i>&nbsp;Penyesuaian</a>
                                </li>
                            </ul>
                        </li>
                        
<!--                         <li>                    
                            <a href="#cleanerMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-tint">&nbsp;</i>&nbsp;Cleaner</a>
                            <ul class="collapse list-unstyled" id="cleanerMenu">
                                <li>
                                    <a href="<?php echo base_url('cleaner/schedule'); ?>"><i class="fas fa-calendar">&nbsp;</i>&nbsp;Schedule</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('cleaner/cleanse'); ?>"><i class="fas fa-broom">&nbsp;</i>&nbsp;Cleansing</a>
                                </li>                        
                            </ul>
                        </li> -->
                    </ul>
                </li>
                <?php } ?>
                <?php if ($usertype=='Manager' || $usertype=='Owner' || $usertype=='SysAdmin'){ ?>
                <li>                    
                    <a href="#managerMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-chalkboard-teacher">&nbsp;</i>&nbsp;Management</a>
                    <ul class="collapse list-unstyled" id="managerMenu">                                        
                        <li>
                            <a href="#managerEmploymentMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users">&nbsp;</i>&nbsp;Pengelolaan Karyawan</a>
                                <ul class="collapse list-unstyled" id="managerEmploymentMenu">
                                    <li>
                                        <a href="<?php echo base_url('management/employment/add'); ?>"><i class="fas fa-plus-square">&nbsp;</i>&nbsp;Tambah Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/employment/list'); ?>"><i class="fas fa-list">&nbsp;</i>&nbsp;Daftar Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/employment/salary'); ?>"><i class="fas fa-cash-register">&nbsp;</i>&nbsp;Pembayaran Gaji</a>
                                    </li>                                    
                                </ul>                                        
                        </li>
                        <li>
                            <a href="#managerReportMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-chalkboard-teacher">&nbsp;</i>&nbsp;Laporan Manajerial</a>
                                <ul class="collapse list-unstyled" id="managerReportMenu">
                                    <li>
                                        <a href="<?php echo base_url('management/report/cash'); ?>"><i class="fas fa-chart-line">&nbsp;</i>&nbsp;Laporan Arus Kas</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/report/sales'); ?>"><i class="fas fa-chart-line">&nbsp;</i>&nbsp;Laporan Penjualan</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/report/purchase'); ?>"><i class="fas fa-chart-bar">&nbsp;</i>&nbsp;Laporan Pembelian</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/report/inventory'); ?>"><i class="fas fa-chart-pie">&nbsp;</i>&nbsp;Laporan Stok di Gudang</a>
                                    </li>
                                </ul>                                        
                        </li>
                    </ul>
                </li>
                <?php } ?>
            </ul>

            <!--ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Request Changes</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Notify Administrator</a>
                </li>
            </ul-->
        </nav>        
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Derry's <small>Jewelry Store</small></h3>
            </div>
            <ul class="list-unstyled components">
                <p>Happy working, 
                    <select id="userlogged" width="100%" style="width: 100%">

                    </select>                    
                </p>
                <p>
                    <small><i class="fa fa-id-badge">&nbsp;</i></small>
                    <span id="user_logged"><?php echo $this->session->userdata('nama'); ?></span>                                   
                    <br/>
                    <br/>
                    <small><a href="<?php echo base_url('login/logout'); ?>">Sign Out</a>&nbsp;<i class="fa fa-sign-out-alt">&nbsp;</i></small>
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
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-random">&nbsp;</i>&nbsp;Front Lines</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo base_url('cashier/sales'); ?>"><i class="fas fa-outdent">&nbsp;</i>&nbsp;Sale</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('cashier/purchase'); ?>"><i class="fas fa-indent">&nbsp;</i>&nbsp;Purchase</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('cashier/income'); ?>"><i class="fas fa-money-bill">&nbsp;</i>&nbsp;Other Income</a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url('cashier/expense'); ?>"><i class="fas fa-money-bill">&nbsp;</i>&nbsp;Other Expense</a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url('cashier/history'); ?>"><i class="fas fa-history">&nbsp;</i>&nbsp;History</a>
                        </li>             
                    </ul>
                </li>                
                <li>                    
                    <a href="#warehouseMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-warehouse">&nbsp;</i>&nbsp;Warehouse</a>
                    <ul class="collapse list-unstyled" id="warehouseMenu">                                                                       
                        <li>
                            <a href="#warehouseProductMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-database">&nbsp;</i>&nbsp;Product</a>
                                <ul class="collapse list-unstyled" id="warehouseProductMenu">
                                    <li>
                                        <a href="<?php echo base_url('warehouse/product/inventory'); ?>"><i class="fas fa-database">&nbsp;</i>&nbsp;Inventory</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('warehouse/product/add'); ?>"><i class="fas fa-plus-square">&nbsp;</i>&nbsp;Add Product</a>
                                    </li>
                                    <li>                    
                                        <a href="#warehouseProductStockMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-archive">&nbsp;</i>&nbsp;Stock</a>
                                        <ul class="collapse list-unstyled" id="warehouseProductStockMenu">
                                            <li>
                                                <a href="<?php echo base_url('warehouse/stock/adjust'); ?>"><i class="fas fa-cog">&nbsp;</i>&nbsp;Adjust Stock</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('warehouse/stock/opname'); ?>"><i class="fas fa-archive">&nbsp;</i>&nbsp;Opname</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('warehouse/product/inventory'); ?>"><i class="fas fa-database">&nbsp;</i>&nbsp;Category</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('warehouse/product/inventory'); ?>"><i class="fas fa-database">&nbsp;</i>&nbsp;Class</a>
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
                            <a href="#managerEmploymentMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users">&nbsp;</i>&nbsp;Employment</a>
                                <ul class="collapse list-unstyled" id="managerEmploymentMenu">
                                    <li>
                                        <a href="<?php echo base_url('management/employment/add'); ?>"><i class="fas fa-chart-line">&nbsp;</i>&nbsp;Add Staff</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/employment/list'); ?>"><i class="fas fa-list">&nbsp;</i>&nbsp;Staff List</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/employment/salary'); ?>"><i class="fas fa-money-bill-wave-alt ">&nbsp;</i>&nbsp;Salary</a>
                                    </li>                                    
                                </ul>                                        
                        </li>
                        <li>
                            <a href="#managerReportMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-chalkboard-teacher">&nbsp;</i>&nbsp;Reports</a>
                                <ul class="collapse list-unstyled" id="managerReportMenu">
                                    <li>
                                        <a href="<?php echo base_url('management/report/cash'); ?>"><i class="fas fa-chart-line">&nbsp;</i>&nbsp;Cash Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/report/sales'); ?>"><i class="fas fa-chart-line">&nbsp;</i>&nbsp;Sales Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/report/purchase'); ?>"><i class="fas fa-chart-bar">&nbsp;</i>&nbsp;Purchase Report</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('management/report/inventory'); ?>"><i class="fas fa-chart-pie">&nbsp;</i>&nbsp;Inventory Report</a>
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
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <?php foreach($admin->admin_model->getAccountDetails($accountID) as $row) { ?>
            <div class="user-panel">
              <div class="pull-left image">
                <img src="<?php echo base_url('bootstrap/images/'.$row->Image.''); ?>" class="img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
                <p><?php echo $row->Firstname .' '. $row->Lastname; ?></p>
                <p>ID : <?php echo $row->Account_ID; ?></p>
              </div>
            </div>
          <?php } ?>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">ADMIN ACCESS</li>
            <li class="active treeview">
              <a href="<?php echo base_url('index.php/admin'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i> <span>Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="<?php echo base_url('index.php/admin/barangay_clearance'); ?>"><i class="fa fa-barcode"></i>Barangay Clearance<span class="label label-success pull-right"><?php echo count($admin->admin_model->getProducts()); ?></span></a></li> 
               <li><a href="<?php echo base_url('index.php/admin/barangay_permit'); ?>"><i class="fa fa-barcode"></i>Barangay Permit<span class="label label-success pull-right"><?php echo count($admin->admin_model->getbrgypermit()); ?></span></a></li> 
               <li><a href="<?php echo base_url('index.php/admin/business_clearance'); ?>"><i class="fa fa-barcode"></i>Barangay Business Clearance<span class="label label-success pull-right"><?php echo count($admin->admin_model->getbusinessClearance()); ?></span></a></li> 
               <li><a href="<?php echo base_url('index.php/admin/complaints'); ?>"><i class="fa fa-barcode"></i>Complaints<span class="label label-success pull-right"><?php echo count($admin->admin_model->getcomplaints()); ?></span></a></li> 
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user-plus"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
              <ul class="treeview-menu">
               <li><a href="<?php echo base_url('index.php/admin/Adminusers'); ?>"><i class="fa fa-users"></i>Admin Users<span class="label label-success pull-right"><?php echo count($admin->admin_model->getAdminUsers()); ?></span></a></li>
               <li><a href="<?php echo base_url('index.php/admin/users'); ?>"><i class="fa fa-users"></i>Customer Users<span class="label label-success pull-right"><?php echo count($admin->admin_model->getUsers()); ?></span></a></li>
               <?php //foreach($admin->admin_model->getCategories() as $cat) { ?>
                <!-- <li><a href="<?php //echo base_url('index.php/admin/getProductsByCategory/'.$cat->Category_ID.''); ?>"><i class="fa fa-circle-o"></i><?php //echo $cat->Category_name; ?></a></li> -->
              <?php// } ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Graphs</span>
                <!-- <span class="label label-primary pull-right"><?php //echo count($admin->admin_model->getBrands()); ?></span> -->
              </a>
              <ul class="treeview-menu">
              <?php //foreach($admin->admin_model->getBrands() as $brand) { ?>
                <!-- <li><a href="<?php //echo base_url('index.php/admin/getProductsByBrand/'.$brand->Brand_ID.''); ?>"><i class="fa fa-circle-o"></i><?php //echo $brand->Brand_name; ?></a></li> -->
              <?php //} ?>
              </ul>
            </li>
          

         
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
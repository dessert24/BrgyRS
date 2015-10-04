<header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Barangay</b>Registration</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <?php foreach($admin->admin_model->getAccountDetails($accountID) as $row) { ?>
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url('bootstrap/images/'.$row->Image.''); ?>" class="user-image" alt="User Image"/>
                    <span class="hidden-xs"><?php echo $row->Firstname .' '. $row->Lastname; ?></span>
                  </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('bootstrap/images/'.$row->Image.''); ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $row->Firstname .' '. $row->Lastname; ?>
                      <small><?php echo $row->Gender; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('index.php/admin/myAccount'); ?>" class="btn btn-default btn-flat"><i class="fa fa-gears" style="margin-right:5px;"></i>My Account</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('index.php/admin/userLogout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out" style="margin-right:5px;"></i>Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <?php } ?>
            </ul>
          </div>
        </nav>
      </header>
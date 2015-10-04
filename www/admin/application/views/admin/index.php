<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <?php require 'link.php'; $admin = & get_instance(); ?>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
    <?php require 'header.php'; require 'aside.php'; ?>      
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-dashboard" style="margin-right:5px;"></i>Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section><br>
        <?php if(!empty($response)) echo $response; ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
     
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo count($admin->admin_model->getAdminUsers()); ?></h3>
                  <p>Admin Users</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
              </div>
            </div><!-- ./col -->

              <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo count($admin->admin_model->getUsers()); ?></h3>
                  <p>Customer Users</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
              </div>
            </div><!-- ./col -->
            
                   <div class="col-lg-3 col-xs-6">
           <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                 <h3><?php echo count($admin->admin_model->getcomplaints()); ?></h3>
                  <p>Complaints</p>
                </div>
                <div class="icon">
                 <i class="fa fa-comments"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div>
          <div class="row">
            <div class="col-lg-3 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?php echo count($admin->admin_model->getbusinessClearance()); ?></h3>
                  <p>Business Clearance</p>
                </div>
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo count($admin->admin_model->getbrgypermit()); ?></h3>
                  <p>Barangay Permit</p>
                </div>
                <div class="icon">
                 <i class="fa fa-envelope"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-4">
                  <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo count($admin->admin_model->getProducts()); ?></h3>
                  <p>Barangay Clearance Registered</p>
                </div>
                <div class="icon">
                 <i class="fa fa-envelope"></i>
                </div>
              </div>

             
            </div><!-- ./col -->
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2015-2016 <a href="">Store Tech</a>.</strong> All rights reserved.
      </footer>
      
 
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->
    <?php require 'script.php'; ?>
  </body>
</html>
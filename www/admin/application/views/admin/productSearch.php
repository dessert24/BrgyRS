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
            <i class="fa fa-barcode" style="margin-right:5px;"></i>Barangay Clearance
            <small>Listing</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Barangay Clearance</li>
          </ol>
        </section><br>
        <?php if(!empty($response)) echo $response; ?>

        <!-- Main content -->
        <a href="<?php echo base_url('index.php/admin/barangay_clearance'); ?>"><i class="fa fa-arrow-left pull-right" style="margin-right:5px;"></i></a><br><br>
        <section class="content">
          <div class="row">
            <div class="col-md-8">
              <h4 class="box-title">Search Results</h4>
              </div>
            <div class="col-md-4 pull-right">
              <form action="<?php echo base_url('index.php/admin/productSearch'); ?>" method="POST">
                <div class="input-group">
                  <input type="text" name="name" class="form-control" placeholder="Search Product"/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <br><br>
            </div>
          </div>
          <?php 
            if(count($admin->admin_model->getProductSearch($Name)) == 0)
            {
              echo "<center>No matches found .</center>";
            }
            else
            {
              ?>
                <ul>
                  <table width="100%">
                    <tr>
                       <td align="center"><b>ID</b></td>
                      <td align="center"><b>Name</b></td>
                      <td align="center"><b>Age</b></td>
                      <td align="center"><b>Sex</b></td>
                      <td align="center"><b>Civil Status</b></td>
                      <td align="center"><b>Place of Birth</b></td>
                      <td align="center"><b>Presently resided</b></td>
                      <td align="center"><b>Purpose</b></td>

                    </tr>
                    <tr><td><div class="row"></div></td></tr>
                    <?php foreach($admin->admin_model->getProductSearch($Name) as $row) { ?>
                    <tr><td><br></td></tr>
                    <tr>
                      <td align="center"><?php echo $row->id; ?></td>
                      <td align="center"><?php echo $row->name; ?></td>
                      <td align="center"><?php echo $row->age; ?></td>
                      <td align="center"><?php echo $row->sex; ?></td>
                      <td align="center"><?php echo $row->civil_status; ?></td>
                      <td align="center"><?php echo $row->pob; ?></td>
                      <td align="center"><?php echo $row->residence; ?></td>
                      <td align="center"><?php echo $row->purpose; ?></td>
                      <td align="center">
                        <a href="<?php echo base_url('index.php/admin/updateProduct/'.$row->id.''); ?>"><i class="fa fa-edit" style="margin-right:10px;"></i></a>
                        <a href="<?php echo base_url('index.php/admin/deleteProduct/'.$row->id.''); ?>"><i class="fa fa-trash" style="margin-right:5px;"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                  </table>
                </ul>
              <?php } ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2015-2016 <a href="">Barangay Registration</a>.</strong> All rights reserved.
      </footer>
      
     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->
    <?php require 'script.php'; ?>
  </body>
</html>
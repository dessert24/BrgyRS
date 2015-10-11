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
            <small>Update Registered</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Registered</li>
          </ol>
        </section><br>
        <?php if(!empty($response)) echo $response; ?>

        <!-- Main content -->
        <a href="<?php echo base_url('index.php/admin/barangay_clearance'); ?>"><i class="fa fa-arrow-left pull-right" style="margin-right:5px;"> Back</i></a><br><br>
        <section class="content">
          <div class="row">
            <div class="col-md-8">
              <h4 class="box-title">Update Registered</h4>
            </div>
            <div class="col-md-4 pull-right">
              <form action="#" method="get">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search..."/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <br><br><br>
            </div>
          </div>
          <ul>
          <?php foreach($admin->admin_model->getBrgyClearanceDetails($id) as $row) { ?>
          
           <form action="<?php echo base_url('index.php/admin/BCUpdate/'.$row->id.''); ?>" method="POST" enctype="multipart/form-data"> 
              <table width="100%">
                <tr>
                  <td width="40%" valign="top">
                    <img src="<?php echo base_url('bootstrap/images/'.$row->image.''); ?>" width="250" height="200" /><br>
                    <input type="file" name="image"/>
                  </td>
                  <td valign="top">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="name"> Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $row->name; ?>" class="form-control" />
                        <?php echo form_error('name'); ?>
                      </div>
                      <div class="col-md-6">
                        <label for="Age">Age</label>
                        <div class="input-group">
                          <!-- <span class="input-group-addon"><i class="fa fa-usd"></i></span> -->
                          <input type="text" id="age" name="age" value="<?php echo $row->age; ?>" class="form-control">
                          <?php echo form_error('age'); ?>
                          <!-- <span class="input-group-addon">.00</span> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="Sex">Sex</label>
                        <select name="Sex" class="form-control">
                          <option value="<?php echo $row->sex; ?>"><?php echo $row->sex; ?></option>
                          <!-- <?php  
                           // foreach($admin->admin_model->getCategories() as $cat) 
                             //if($cat->Category_name == $row->Category_name)
                              {
                             //   continue;
                              }
                             // else
                              {
                              // echo '<option value="'.$cat->Category_ID.'">'.$cat->Category_name.'</option>';
                              } 
                          ?>-->
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="civil_status">Civil Status</label>
                        <select name="civil_status" class="form-control">
                          <option value="<?php echo $row->civil_status; ?>"><?php echo $row->civil_status; ?></option>
                          <!-- <?php
                            //foreach($admin->admin_model->getBrands() as $brand) 
                              //if($brand->Brand_name == $row->Brand_name)
                              {
                                //continue;
                              }
                             //else
                              {
                               //echo '<option value="'.$brand->Brand_ID.'">'.$brand->Brand_name.'</option>';
                              }
                          ?>  -->
                        </select><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="pob">Place of Birth</label>
                        <input type="text" id="pob" value="<?php echo $row->pob; ?>" name="pob" class="form-control" />
                         <?php echo form_error('pob'); ?><hr> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="residence">Residence</label>
                        <textarea style="resize:none;" id="residence" name="residence" class="form-control"><?php echo $row->residence; ?></textarea>
                        <?php echo form_error('residence'); ?><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-primary btn-flat pull-right">Update</button>

                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </form>
            <?php } ?>
          </ul>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2015-2016 <a href="">Barangay Registration</a>.</strong> All rights reserved.
      </footer>
      
      <!-- Control Sidebar -->      
      <aside class="control-sidebar control-sidebar-dark">                
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href='javascript::;'>
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3> 
            <ul class='control-sidebar-menu'>
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-waring pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>                                    
                </a>
              </li> 
              <li>
                <a href='javascript::;'>               
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>                                    
                </a>
              </li>               
            </ul><!-- /.control-sidebar-menu -->         

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">            
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked />
                </label>                
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right" />
                </label>                
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>                
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->
    <?php require 'script.php'; ?>
  </body>
</html>
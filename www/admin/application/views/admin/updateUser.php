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
        <!-- Content Header-->
        <section class="content-header">
          <h1>
            <i class="fa fa-gears" style="margin-right:5px;"></i>Users
            <small>Update User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update User</li>
          </ol>
        </section><br>
        <?php if(!empty($response)) echo $response; ?>

        <!-- Main content -->
        <a href="<?php echo base_url('index.php/admin/users'); ?>"><i class="fa fa-arrow-left pull-right" style="margin-right:5px;"></i></a><br><br>
        <section class="content">
          <div class="row">
            <div class="col-md-8">
              <h4 class="box-title">Update User</h4><br><br>
            </div>
          </div>
            <ul>
              <?php foreach($admin->admin_model->getAccountDetails($userID) as $row) { ?>
                <table width="100%">
                <form action="<?php echo base_url('index.php/admin/updateUserAccount/'.$row->Account_ID.''); ?>" method="POST" enctype="multipart/form-data">
                  <tr>
                              <td valign="top">
                                <div class="row">
                                  <div class="col-md-12">
                                    <img src="<?php echo base_url('bootstrap/images/'.$row->Image.''); ?>" width="200" height="200">
                                    <input type="file" name="userFile"/>
                                  </div>
                                </div>
                              </td>
                              <td valign="top">
                                <ul>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <h4 class="box-title">Personal Informations</h4><hr>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="firstName">Firstname</label>
                                      <input type="text" name="firstName" value="<?php echo $row->Firstname; ?>" class="form-control" />
                                      <?php echo form_error('firstName'); ?>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="middleName">Middlename</label>
                                      <input type="text" name="middleName" value="<?php echo $row->Middlename; ?>" class="form-control" />
                                      <?php echo form_error('middleName'); ?>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="lastName">Lastname</label>
                                      <input type="text" name="lastName" value="<?php echo $row->Lastname; ?>" class="form-control" /><br>
                                      <?php echo form_error('lastName'); ?>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="gender">Gender</label>
                                      <select name="gender" id="gender" class="form-control">
                                        <option><?php echo $row->Gender; ?></option>
                                        <?php
                                          $data = array('Male' , 'Female' , 'Other');

                                          for($x = 0 ; $x < 3 ; $x++)
                                            if($data[$x] == $row->Gender)
                                            {
                                              continue;
                                            }
                                            else
                                            {
                                              echo '<option>'.$data[$x].'</option>';
                                            }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="type">Type</label>
                                      <select name="type" id="type" class="form-control">
                                        <option><?php echo $row->Type; ?></option>
                                        <?php
                                          $data = array('Admin' , 'Customer');

                                          for($x = 0 ; $x < 2 ; $x++)
                                            if($data[$x] == $row->Type)
                                            {
                                              continue;
                                            }
                                            else
                                            {
                                              echo '<option>'.$data[$x].'</option>';
                                            }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <br>
                                      <h4 class="box-title">Contact Informations</h4><hr>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <label for="emailAdd">Email Address</label>
                                      <input type="text" id="emailAdd" value="<?php echo $row->Email; ?>" name="emailAdd" class="form-control" />
                                      <?php echo form_error('emailAdd'); ?>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="contactNumber">Contact Number</label>
                                      <input type="text" id="contactNumber" value="<?php echo $row->Contact_number; ?>" name="contactNumber" class="form-control" />
                                      <?php echo form_error('contactNumber'); ?>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="homeAdd">Home Address</label>
                                      <input type="text" id="homeAdd" value="<?php echo $row->Address; ?>" name="homeAdd" class="form-control" />
                                      <?php echo form_error('homeAdd'); ?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <hr>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <button type="submit" class="btn btn-flat btn-primary pull-right">Update Account</button>
                                    </div>
                                  </div>
                                  <form action="<?php echo base_url('index.php/admin/updateUserPassword/'.$row->Account_ID.''); ?>" method="POST">
                                    <div class="row">
                                    <br><br>
                                    <h4 class="box-title">Account Security</h4><br><br>
                                      <div class="col-md-4">
                                        <label for="password">Current Password</label>
                                        <input type="password" name="oldPass" placeholder="Old Password" class="form-control" />
                                        <?php echo '<center><p style="font-family:Consolas;color:red;font-size:12px;" >'.$msg.'</p></center>'; ?>
                                      </div>
                                      <div class="col-md-4">
                                        <label for="password">New Password</label>
                                        <input type="password" name="newPass" placeholder="New Password" class="form-control" />
                                        <?php echo form_error('newPass'); ?>
                                      </div>
                                      <div class="col-md-4">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" name="newPassConf" placeholder="Re-type New Password" class="form-control" />
                                        <?php echo form_error('newPassConf'); ?>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-primary btn-flat pull-right" type="submit" >Update Password</button>
                                      </div>
                                    </div>
                                  </form>
                              </td>
                  </tr>
                </form>
              </table>
              <?php } ?>
            </ul>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2015-2016 <a href="">Store Tech</a>.</strong> All rights reserved.
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
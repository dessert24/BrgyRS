<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <?php require 'link.php'; $home = & get_instance(); ?>
  </head>
  <body class="skin-blue layout-top-nav">
    <div class="wrapper">
    <?php require 'header.php'; ?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container"><br>
        <?php 
          if(!empty($response))
          {
            echo $response;
          }
        ?>
          <div class="box">
            <div class="row">
              <div class="col-md-12">
                <div id="slider">
                  <figure>
                    <?php 
                      for($x = 1 ; $x <= 3 ; $x++)
                      {
                        ?>
                          <img src="<?php echo base_url('bootstrap/images/'.$x.'.jpg'); ?>" width="100%" height="250" />
                        <?php
                      }
                    ?>
                  </figure>
                </div>
              </div>
            </div>
          </div>
    
          <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-home" style="margin-right:5px;"></i>Home</a></li>
               
                 
                </ul>
                <div class="tab-content">
                 <div class="login-box-body">
                            <form action="<?php echo base_url('index.php/home/userLogin'); ?>" method="POST">
                              <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="email" placeholder="Email" style="font-style:italic;text-align:center;"/>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                              </div>
                              <div class="form-group has-feedback">
                                <input type="password" class="form-control" name="password" placeholder="Password" style="font-style:italic;text-align:center;"/>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                              </div>
                              <div class="row">
                                <div class="col-xs-8">    
                                    <div class="checkbox icheck">
                                    </div>                        
                                </div><!-- /.col -->
                                <div class="col-xs-4">
                                  <button type="submit" class="btn btn-primary btn-block btn-flat" >Sign In</button>
                                </div><!-- /.col -->
                              </div>
                            </form>
                            <br>
                        </div><!-- /.login-box-body -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
          </div>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <strong>Copyright &copy; 2015-2016 <a href="">Barangay Registration</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->
    <?php require 'script.php'; ?>
  </body>
</html>
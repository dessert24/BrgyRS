<header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
            <img src="<?php echo base_url('bootstrap/images/logo.png'); ?>" width="50" height="50" class="pull-left"/>
              <a href="<?php echo base_url(); ?>" class="navbar-brand"><b>Barangay</b>Registration</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- User Account Menu -->
                 
                  <li class="dropdown user user-menu">
                      <!-- Menu Toggle Button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-sign-in"></i>
                      </a>
                      <ul class="dropdown-menu">
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
                      </ul>
                  </li>
                  
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
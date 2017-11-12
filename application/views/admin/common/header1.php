<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cinebels | <?php if($page_title <>'') echo $page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-template/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-template/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/quotation.css">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <link href="<?php echo base_url(); ?>assets/admin-template/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin-template/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/admin-template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
   <?php if($this->auth->is_logged_in(false, false)) { 
  $uri = $this->uri->segment(2);
  $uri2 = $this->uri->segment(3);
  $admin = $this->session->all_userdata(); 
  //echo "<pre>"; print_r($admin); exit;
  $admin_name =  $admin['admin']['firstname'].' '.$admin['admin']['lastname'];
  $admin_access =  $admin['admin']['access'];
  $admin_date =  $admin['admin']['created_on'];
  $admin_role =  $admin['admin']['role'];
  ?>
  
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="<?php echo base_url(); ?>admin" class="navbar-brand">
              <img src="<?php echo base_url('/assets/img/3.png'); ?>" alt="Cinebels" style="width: 125px;margin-top: -11%;float: left;" >
             <b style="margin-left: -12%;float: left;text-transform: uppercase;"> Cinebels</b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

           
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                 <!--  <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                 <!--   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope-o"></i>
                      <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have 4 messages</li>
                      <li>
                        <!-- inner menu: contains the messages -->
                  <!--       <ul class="menu">
                          <li><!-- start message -->
                      <!--       <a href="#">
                              <div class="pull-left">
                                <!-- User Image -->
                                
                      <!--         </div>
                              <!-- Message title and timestamp -->
                     <!--          <h4>
                                Support Team
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                              </h4>
                              <!-- The message -->
                      <!--         <p>Why not buy a new awesome theme?</p>
                            </a>
                          </li><!-- end message -->
                  <!--       </ul><!-- /.menu -->
                <!--       </li>
                      <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                  </li><!-- /.messages-menu -->

                
                  
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle user-name-ar" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                     
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs"> <?php echo $admin_name; ?> - <?php echo $admin_role; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                        <img src="<?php echo base_url(); ?>assets/img/6.png" class="img-circle" alt="User Image" style="width: 190px;height: 100px;border-radius: 0;">
                        <p>
                          <?php echo $admin_name; ?> - <?php echo $admin_role; ?>  
                          <small>Member since <?php echo date("M. Y", strtotime($admin_date)); ?></small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                    <!--  <li class="user-body">
                        <div class="col-xs-4 text-center">
                          <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Friends</a>
                        </div>
                      </li> -->
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="<?php echo base_url($this->config->item('admin_folder'));?>" class="btn btn-default btn-flat"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a>
                        </div>
                        <div class="pull-right">
                          <a href="<?php echo site_url($this->config->item('admin_folder').'/login/logout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-fw fa-sign-out"></i>&nbsp;Sign out</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      
   <?php } else { ?>
        <body class="login-page">
        <div class="login-box">
        <div class="login-logo">
        <a href="javascript:;">
        <img src="<?php echo base_url('assets/img/6.png')?>" alt="cinebels" width="100%">
        <!--<span>Omni</span>Hospitals --></a>
        </div><!-- /.login-logo -->
    <?php } 
    
    //lets have the flashdata overright "$message" if it exists
    if($this->session->flashdata('message'))
    {
        $message    = $this->session->flashdata('message');
    }
    
    if($this->session->flashdata('error'))
    {
        $error  = $this->session->flashdata('error');
    }
    
    if(function_exists('validation_errors') && validation_errors() != '')
    {
        $error  = validation_errors();
    }
    
    if (!empty($message)): ?>
        <div class="alert alert-success">
        <i class="icon fa fa-check"></i><?php echo $message; ?>
    <!--  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
        
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-error">
       <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
        <?php echo $error; ?>
        </div>
    <?php endif; ?>

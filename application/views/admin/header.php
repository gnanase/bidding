<!DOCTYPE html>
<html>


	  <head>
		    <meta charset="UTF-8">
		    <title><?php echo $siteTitle; ?></title>
		    
		    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		    
		    <!--Custom CSS -->
		    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />   
		     
		    <!-- Bootstrap 3.3.2 -->
		    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
		       
		    <!-- FontAwesome 4.3.0 -->
		    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		    
		    <!-- Ionicons 2.0.0 -->
		    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		        
		    <!-- Theme style -->
		    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
		    
		    <!-- AdminLTE Skins. Choose a skin from the css/skins. -->
		    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
		    
		    <!-- Bootstrap time Picker -->
    		<link href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    
    		 <!-- daterange picker -->
    		<link href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    
		 	<!-- jQuery 2.1.3 -->
		    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
		    
		    <!-- jQuery UI 1.11.2 -->
		    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
		    
		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		    <![endif]-->
	  </head>
  
  
  	  <body class="skin-blue">
	    	<div class="wrapper">
	      
			      <header class="main-header">
				        <!-- Logo -->
				        <a href="<?php echo base_url(); ?>" class="logo">
					        <img class="logo" alt="" src="<?php echo base_url(); ?>assets/images/logo.png" style="width: 80px; height:auto;">
					        <?php echo SITE_NAME; ?>
				        </a>
				        <!-- Header Navbar: style can be found in header.less -->
				        <nav class="navbar navbar-static-top" role="navigation">
					          <!-- Sidebar toggle button-->
					          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					            	<span class="sr-only">Toggle navigation</span>
					          </a>
					          <div class="navbar-custom-menu">
						            <ul class="nav navbar-nav">
							              <li class="user-footer">
							                    <div class="pull-right">
							                      	<a href="<?php echo base_url(); ?>dashboard/logout" style="margin: 10px;" class="btn btn-default btn-flat">Sign out</a>
							                    </div>
							              </li>
						            </ul>
					          </div>
				        </nav>
			      </header>
			      
			      <!-- Left side column. contains the logo and sidebar -->
			      <aside class="main-sidebar">
				        <!-- sidebar: style can be found in sidebar.less -->
					        <section class="sidebar">
						          <!-- sidebar menu: : style can be found in sidebar.less -->
						          <ul class="sidebar-menu">
								       <li class="<?php if ($this->uri->segment(1)== 'dashboard') echo 'active';?> treeview">
							              	<a href="<?php echo base_url(); ?>dashboard/">
							                	<i class="fa fa-dashboard"></i> <span>Dashboard</span> </i>
							              	</a>             
							            </li>
							            <li class="<?php if ($this->uri->segment(1)== 'users') echo 'active';?> treeview">
							              	<a href="<?php echo base_url(); ?>users/">
							                	<i class="fa fa-user"></i> <span>Users</span> </i>
							              	</a>             
							            </li>
							            <li class="<?php if ($this->uri->segment(1)== 'product') echo 'active';?> treeview">
							              	<a href="<?php echo base_url(); ?>product/">
							                	<i class="fa fa-gavel"></i> <span>Product</span> </i>
							              	</a>             
							            </li>
							            
						          </ul>
					        </section>
				        <!-- /.sidebar -->
			      </aside>
										
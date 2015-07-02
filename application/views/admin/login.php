<!DOCTYPE html>
<html>


    <head>
	    <meta charset="UTF-8">
	    <title><?php echo SITE_NAME; ?> </title>
	    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	    <!--Custom CSS -->
	    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />    
	    <!-- Bootstrap 3.3.2 -->
	    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <!-- Font Awesome Icons -->
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	    <!-- Theme style -->
	    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	   
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
    </head>
  
  
  	<body class="login-page">
		    	<div class="login-box">
				      <div class="login-logo">
					      	<img alt="" src="<?php echo base_url(); ?>assets/images/logo.png">
					        <a href="#"><?php echo SITE_NAME; ?></a>
				      </div>														
				      <div class="login-box-body">
				        	<p class="login-box-msg">Sign in to start your bidding</p>
					        <form method="post" id="login" action="">
					        
						          <div class="form-group has-feedback">
							            <input type="email"  name="email" value="<?php echo set_value('email');?>" class="form-control required email" placeholder="Email" />
							           <?php echo form_error('email'); ?>
						          </div>
						          
						          <div class="form-group has-feedback">
							            <input type="password" name="password" class="form-control required" id="password" placeholder="Password" />
							          	<?php echo form_error('password');  ?>
						          </div>
						          
						         <div class="row">
							            <div class="col-xs-8">
							            	<?php 
							            	if (isset($InvalidMessages) && $InvalidMessages != NULL){
							            		echo '<div class="error">';
							            		echo $InvalidMessages; 
							            		echo '</div>';
											}?>
							            </div>
							            <div class="col-xs-4">
							              		<button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
							            </div>
						          </div>
						          
					        </form>
				       <!--  <a id="forgotpassword" href="#">I forgot my password</a><br> <br> -->
				     </div>
		    </div>
		    
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    
    <!-- validate -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/additional-methods.js"></script>
    
    <script type="text/javascript"> 
         $(function() {
        
                /* @custom validation method (smartCaptcha) 
                ------------------------------------------------------------------ */
                    
                $.validator.methods.smartCaptcha = function(value, element, param) {
                        return value == param;
                };
                        
                $( "#login" ).validate({
                
                        /* @validation states + elements 
                        ------------------------------------------- */
                        
                        errorClass: "state-error",
                        validClass: "state-success",
                        errorElement: "em",
                        
                        /* @validation rules 
                        ------------------------------------------ */
                            
                        rules: {
                        	email: {
                         		required: true,
                         		email: true
                 			},
                 			password: {
                                required: true
                         	}
                 			
                        },
                        
                        /* @validation error messages 
                        ---------------------------------------------- */
                        messages:{
                     		email: {
                         		required: 'Enter email address',
                         		email: 'Enter a valid email address'
                 			},
                 			password: {
                                required: 'Enter password'
                        	}
                 		  
                        },

                        /* @validation highlighting + error placement  
                        ---------------------------------------------------- */ 
                        
                        highlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function(element, errorClass, validClass) {
                                $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                        },
                        errorPlacement: function(error, element) {
                           if (element.is(":radio") || element.is(":checkbox")) {
                                    element.closest('.option-group').after(error);
                           } else {
                                    error.insertAfter(element.parent());
                           }
                        }        
                });     
        });

    </script>
	
  </body>
</html>
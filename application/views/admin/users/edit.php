 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      	<!-- Content Header (Page header) -->
        <section class="content-header">
        	<h1>Edit </h1>
          	<ol class="breadcrumb">
            	<li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            	<li><a href="<?php echo base_url(); ?>users">Users</a></li>
            	<li>Edit  User </li>
          	</ol>
          	<div class=" clear" style="clear:both;">
            	<?php if ($this->session->flashdata('SucMessage')!='') { ?>
				<div class="alert alert-success">
					<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
					<?php echo $this->session->flashdata('SucMessage');  ?>
				</div> 
            	<?php } ?>
        	</div>  
        </section>
 		<section class="content">
			<div class="row">
		    	<!-- left column -->
		        <div class="col-md-12">
		        	<!-- general form elements -->
		            <div class="box box-primary">
		            	<div class="box-header">
		            		<h3 class="box-title">Edit User</h3>
		                </div>
		                <!-- /.box-header -->
		                <!-- form start -->
		                <form role="form" action=""  method="post" id="form">
		                	<div class="box-body">
		                    	<div class="form-group">
		                      		<label for="exampleInputEmail1">User Name</label>
		                      		<input type="text" name="name" class="form-control required" value="<?php if(set_value('name')) echo set_value('name'); else echo $users_details['name']; ?>" id="name" placeholder="User Name">
		                      		<?php echo form_error('u_name'); ?>
		                    	</div>
		                    	<div class="form-group">
		                      		<label for="exampleInputPassword1">Password</label>
		                      		<input type="password" name="password"  class="form-control required" value="<?php if(set_value('password')) echo set_value('password'); else echo AES_Decode($users_details['password']); ?>" id="exampleInputPassword1" placeholder="Password">
		                      		<?php echo form_error('password'); ?>
		                    	</div>
		                    	<div class="form-group">
		                      		<label for="exampleInputEmail1">Email address</label>
		                      		<input type="email"  name="email" class="form-control required email" value="<?php if(set_value('email')) echo set_value('email'); else echo $users_details['email']; ?>" id="exampleInputEmail1" placeholder="Enter email">
		                      		<?php echo form_error('email'); ?>
		                    	</div>
		                    	<div class="form-group">
			                    	<label for="exampleInputEmail1">Phone Number</label>
			                    	<input type="text"  name="phone"  value="<?php if(set_value('phone')) echo set_value('phone'); else echo $users_details['phone']; ?>" class="form-control phone" id="InputPhone" placeholder="Enter Phone number" onkeypress="return isNumber(event)" >
			                   		<?php echo form_error('phone'); ?>
			                    </div>
			                    <div class="form-group">
			                    	<label for="exampleInputEmail1">Address</label>
			                    	<textarea rows="5" cols="10"  name="address" class="form-control required address" id="InputAddress" placeholder="Enter Address"><?php if(set_value('address')) echo set_value('address'); else echo $users_details['address'];  ?></textarea>
			                    	<?php echo form_error('address'); ?>
			                    </div>
			                    <div class="form-group">
			                    	<label for="exampleInputEmail1">Role</label>
			                    	<select name="role" class="form-control">
			                    	    <option value="2" <?php if(isset($_POST['role']) && $_POST['role']==2) echo 'selected';  else if ($users_role['rid']==2) echo 'selected'; ?>>Seller</option>
			                    	    <option value="3" <?php if(isset($_POST['role']) && $_POST['role']==3) echo 'selected';  else if ($users_role['rid']==3) echo 'selected'; ?>>customer</option>
			                        </select>
			                    </div>
			                    <div class="form-group">
			                    	<label for="exampleInputEmail1">Status</label>
			                    	<select name="status" class="form-control">
			                    		<option value="1" <?php if(isset($_POST['status']) && $_POST['status']==1) echo 'selected';  else if ($users_details['status']==1) echo 'selected'; ?>>Active</option>
			                    		<option value="0" <?php if(isset($_POST['status']) && $_POST['status']==0) echo 'selected';  else if ($users_details['status']==0) echo 'selected'; ?>>Inactive</option>
			                    	</select>
			                    </div>
		                   </div><!-- /.box-body -->
		                  <div class="box-footer">
		                  	<a href="<?php echo base_url(); ?>users" class="btn btn-primary">Cancel</a>
		                  	<button type="submit" class="btn btn-primary">Submit</button>
		                  </div>
		                </form>
		              </div>
		              <!-- /.box -->
		            </div>
		          </div>
		</section>          

</div>
 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        	<h1>Add </h1>
        	<ol class="breadcrumb">
            	<li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            	<li><a href="<?php echo base_url(); ?>product">Product</a></li>
            	<li>Add Product </li>
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
		            	<!-- box-header -->
		            	<div class="box-header">
		                	<h3 class="box-title">Add Product</h3>
		                </div>
		                <!-- /.box-header -->
		                <!-- form start -->
		                <form id="productadd" method="post" action="" enctype="multipart/form-data">
		                	<div class="box-body">
		                    	<div class="form-group">
		                      	<label for="exampleInputname">Product Name *</label>
		                      	<input type="text" name="name" class="form-control required" value="<?php echo set_value('name');?>" id="name" placeholder="User Name">
		                      	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputcode">Product Code *</label>
		                    	<input type="text" name="code"  class="form-control required"  value="<?php echo set_value('code');?>" id="Inputcode" placeholder="code">
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputdesc">Description *</label>
		                    	<textarea rows="5" cols="10"  name="desc" class="form-control required desc" id="Inputdesc" placeholder="Enter Description"><?php echo set_value('desc');?></textarea>
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputmin_price">Price </label>
		                    	<input type="text" name="price"  class="form-control"  value="<?php echo set_value('price');?>" id="Inputprice" placeholder="price">
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputPassword1">Mininum Price *</label>
		                    	<input type="text" name="min_price"  class="form-control required"  value="<?php echo set_value('min_price');?>" id="Inputminprice" placeholder="minimum price">
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputbid_fee">Bid Fee *</label>
		                    	<input type="text" name="bid_fee"  class="form-control required"  value="<?php echo set_value('bid_fee');?>" id="Inputbidfee" placeholder="bid fee">
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputEmail1">Status *</label>
		                    	<select name="status" class="form-control">
		                    		<option value="1" <?php if(isset($_POST['status']) && $_POST['status']==1) echo 'selected'; ?>>Active</option>
		                    		<option value="0" <?php if(isset($_POST['status']) && $_POST['status']==0) echo 'selected'; ?>>Inactive</option>
		                    	</select>
		                    </div>  
		                    <div class="form-group">
		                      <label for="exampleInputFile">Product Image *</label>
		                      <input type="file" id="exampleInputFile" name="pimage">
		                    </div>
		                    <div class="form-group datepick-div" >
			                    <label>Auction Date and time range *</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-clock-o"></i>
			                      </div>
			                      <input type="text" name="intervel" value="<?php echo set_value('intervel');?>" class="form-control pull-right datepick" id="reservationtime" style="float: left !important">
			                    </div>
			                </div>	 
			                 <div class="form-group">
			                   <?php 
			                   if (isset($ErrorMessages) && $ErrorMessages != NULL){
			                   	print_r($ErrorMessages);
			                   }
			                   ?>
			                </div>	      	
		                  </div>
		                  <!-- /.box-body -->
		                  <div class="box-footer">
		                  	<button type="submit" class="btn btn-primary">Submit</button>
		                  </div>
		                </form>
		              
		              </div>
		              <!-- /.box -->
		            </div>
		          </div>
		</section>          
</div>
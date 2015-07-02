 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        	<h1>View </h1>
        	<ol class="breadcrumb">
            	<li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            	<li><a href="<?php echo base_url(); ?>product">Product</a></li>
            	<li>View Product </li>
          	</ol> 
        </section>
        <section class="content">
			<div class="row">
		    	<!-- left column -->
		        <div class="col-md-12">
		        	<!-- general form elements -->
		            <div class="box box-primary">
		            	<!-- box-header -->
		            	<div class="box-header">
		                	<h3 class="box-title">View Product</h3>
		                </div>
		                <!-- /.box-header -->
		                <!-- form start -->
		                 <form id="productadd" method="post" action="" enctype="multipart/form-data">
		                	<div class="box-body">
		                    	<div class="form-group">
		                      	<label for="exampleInputname">Product Name </label>
		                      	<input type="text" class="form-control required" value="<?php  echo $product_details['name'];  ?>"  disabled>
		                      	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputcode">Product Code </label>
		                    	<input type="text" class="form-control required"  value="<?php  echo $product_details['code'];  ?>" disabled>
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputdesc">Description </label>
		                    	<textarea rows="5" cols="10"  class="form-control required desc" disabled><?php   echo $product_details['desc']; ?></textarea>
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputmin_price">Price </label>
		                    	<input type="text" class="form-control"  value="<?php echo $product_details['price']; ?>" disabled>
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputPassword1">Mininum Price </label>
		                    	<input type="text"  class="form-control required"  value="<?php echo $product_details['min_price'];  ?>" disabled>
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputbid_fee">Bid Fee </label>
		                    	<input type="text"  class="form-control required"  value="<?php echo $product_details['bid_fee']; ?>" disabled>
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputEmail1">Status </label>
		                    	<select class="form-control" disabled>
		                    		<option value="1" <?php if ($product_details['status']==1) echo 'selected'; ?>>Active</option>
		                    		<option value="0" <?php if ($product_details['status']==1) echo 'selected'; ?>>Inactive</option>
		                    	</select>
		                    </div>  
		                    <div class="form-group">
		                      <label for="exampleInputFile" style="display: block;">Product Image </label>
		                      <img class="prodImg" src="<?php echo base_url(); ?>uploads/products/<?php echo $product_details['image']; ?>">
		                    </div>
		                    <div class="form-group datepick-div" >
			                    <label>Auction Date and time range </label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-clock-o"></i>
			                      </div>
			                      <input type="text" value="<?php echo $product_details['start_date'].'-'.$product_details['end_date']; ?>" class="form-control pull-right datepick" disabled style="float: left !important">
			                    </div>
			                </div>	      	
		                  </div>
		                  <!-- /.box-body -->
		                  <div class="box-footer">
		                  	<a href="<?php echo base_url(); ?>product" class="btn btn-primary">Back</a>
		                  </div>
		                </form>
		              
		              </div>
		              <!-- /.box -->
		            </div>
		          </div>
		</section>          
</div>
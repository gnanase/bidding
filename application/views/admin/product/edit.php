
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        	<h1>Edit </h1>
        	<ol class="breadcrumb">
            	<li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            	<li><a href="<?php echo base_url(); ?>product">Product</a></li>
            	<li>Edit Product </li>
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
		                	<h3 class="box-title">Edit Product</h3>
		                </div>
		                <!-- /.box-header -->
		                <!-- form start -->
		                <form id="productadd" method="post" name="productadd" action="" enctype="multipart/form-data">
		                	<div class="box-body">
		                    	<div class="form-group">
		                      	<label for="exampleInputname">Product Name *</label>
		                      	<input type="text" name="name" class="form-control required" value="<?php if(set_value('name')) echo set_value('name'); else echo $product_details['name'];  ?>" id="name" placeholder="User Name">
		                      	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputcode">Product Code *</label>
		                    	<input type="text" name="code"  class="form-control required"  value="<?php if(set_value('code')) echo set_value('code'); else echo $product_details['code'];  ?>" id="Inputcode" placeholder="code">
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputdesc">Description *</label>
		                    	<textarea rows="5" cols="10"  name="desc" class="form-control required desc" id="Inputdesc" placeholder="Enter Description"><?php  if(set_value('desc')) echo set_value('desc'); else echo $product_details['desc']; ?></textarea>
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputmin_price">Price </label>
		                    	<input type="text" name="price"  class="form-control"  value="<?php if(set_value('price')) echo set_value('price'); else echo $product_details['price']; ?>" id="Inputprice" placeholder="price">
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputPassword1">Mininum Price *</label>
		                    	<input type="text" name="min_price"  class="form-control required"  value="<?php if(set_value('min_price')) echo set_value('min_price'); else echo $product_details['min_price'];  ?>" id="Inputminprice" placeholder="minimum price">
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputbid_fee">Bid Fee *</label>
		                    	<input type="text" name="bid_fee"  class="form-control required"  value="<?php if(set_value('bid_fee')) echo set_value('bid_fee'); else echo $product_details['bid_fee']; ?>" id="Inputbidfee" placeholder="bid fee">
		                    	
		                    </div>
		                    <div class="form-group">
		                    	<label for="exampleInputEmail1">Status *</label>
		                    	<select name="status" class="form-control">
		                    		<option value="1" <?php if(isset($_POST['status']) && $_POST['status']==1) echo 'selected';  else if ($product_details['status']==1) echo 'selected'; ?>>Active</option>
		                    		<option value="0" <?php if(isset($_POST['status']) && $_POST['status']==0) echo 'selected';  else if ($product_details['status']==0) echo 'selected'; ?>>Inactive</option>
		                    	</select>
		                    </div>  
		                    <div class="form-group">
		                      <label for="exampleInputFile">Product Image *</label>
		                      <input type="file" id="pimage" name="pimage">
		                      
		                      <?php if ($product_details['image'] != NULL) { ?>
				                      <img class="prodImg" id="remove_img" src="<?php echo base_url(); ?>uploads/products/<?php echo $product_details['image']; ?>">
				                      <button class="btn btn-primary btn-xs" id="rmv" onclick="remove_product_image('<?php echo md5($product_details['product_id']);?>');" type="button">Remove</button>
				                      <input type="text" id="primage" name="pimage" value="<?php echo $product_details['image']; ?>" style="display: none;">
		                      <?php } ?>
		                    </div>
		                    <div class="form-group datepick-div" >
			                    <label>Auction Date and time range *</label>
			                    <div class="input-group">
			                      <div class="input-group-addon">
			                        <i class="fa fa-clock-o"></i>
			                      </div>
			                      <input type="text" name="intervel" value="<?php if(set_value('intervel')) echo set_value('intervel'); else echo str_replace('-','/',$product_details['start_date']).'-'.str_replace('-','/',$product_details['end_date']); ?>" class="form-control pull-right datepick" id="reservationtime" style="float: left !important">
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
		                  <a href="<?php echo base_url(); ?>product" class="btn btn-primary">Cancel</a>
		                  	<button type="submit" class="btn btn-primary">Submit</button>
		                  </div>
		                </form>
		              
		              </div>
		              <!-- /.box -->
		            </div>
		          </div>
		</section>          
</div>



<script>
var pimg  = $("#primage").val(); 

if(pimg == '' || pimg == undefined){
$("#pimage").show();
}else{
	$("#pimage").hide();
}

function remove_product_image(id)
{
	if(confirm('Are you sure of deleting image?'))
	{
		$( "#remove_img" ).hide();	
		$( "#pimage").show();
		$( "#pimage").val('');
		$("#rmv").hide();	
		$("#pimage").show();	
	}
	
}
</script>
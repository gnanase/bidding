	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    	<!-- Content Header (Page header) -->
        <section class="content-header">
        	<h1>Users </h1>
        	<ol class="breadcrumb">
            	<li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            	<li><a href="<?php echo base_url(); ?>users">Product</a></li>
          	</ol>
          	<div class="pull-right">
            	<a href="<?php echo base_url(); ?>product/add" style="margin: 10px;" class="btn btn-default btn-flat">Add Product</a>
          	</div>
          	<div class=" clear" style="clear:both;">
            	<?php if ($this->session->flashdata('SucMessage')!='') { ?>
					<div class="alert alert-success">
						<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
						<?php echo $this->session->flashdata('SucMessage');  ?>
			        </div> 
                <?php } ?>
          	</div>  
        </section>
        <!-- Main content -->
        <section class="content">
        	<div class="row">
            	<div class="col-xs-12">
              		<div class="box">
                		<div class="box-header">
                  			<h3 class="box-title">Product List</h3>
                		</div>
                		<!-- /.box-header -->
                		<div class="box-body">
                  			<table id="example2" class="table table-bordered table-hover">
                    			<thead>
                      				<tr align="center">
	                        			<th style="text-align: center !important;"> Product Name</th>
	                        			<th style="text-align: center !important;">Code</th>
	                        			<th style="text-align: center !important;">Description</th>
	                        			<th style="text-align: center !important;">Price</th>
	                        			<th style="text-align: center !important;">Minimum Price</th>
				                        <th style="text-align: center !important;">Bid Fee</th>
				                        <th style="text-align: center !important;">Start Date</th>
				                        <th style="text-align: center !important;">End Date</th>
				                        <th style="text-align: center !important;">Status</th>
				                        <th style="text-align: center !important;">view</th>
				                        <th style="text-align: center !important;">Edit</th>
				                        <th style="text-align: center !important;">Delete</th>
			                     	</tr>
                    			</thead>
                  				<tbody>
				                	<?php  		
				                     	$i='0';
										foreach($product_list as $details) { 
										$i += 1;
									?>
				                    <tr align="center">
				                    	<td><?php echo wordwrap($details['name'],25,"<br>\n",TRUE); ?></td>
				                        <td><?php echo wordwrap($details['code'],25,"<br>\n",TRUE); ?></td>
				                        <td><?php echo wordwrap($details['desc'],25,"<br>\n",TRUE); ?></td>
				                        <td><?php echo wordwrap($details['price'],10,"<br>\n",TRUE); ?></td>
				                        <td><?php echo wordwrap($details['min_price'],10,"<br>\n",TRUE); ?></td>
				                        <td><?php echo wordwrap($details['bid_fee'],10,"<br>\n",TRUE); ?></td>
				                        <td><?php echo wordwrap($details['start_date'],10,"<br>\n",TRUE); ?></td>
				                        <td><?php echo wordwrap($details['end_date'],10,"<br>\n",TRUE); ?></td>
				                        <td><?php if($details['status'] == 1){ echo 'Active'; }elseif($details['status'] == 0){ echo 'Inactive'; } ?></td>
				                        <td><a class="btn mini purple" href="<?php echo base_url(); ?>product/view/<?php echo md5($details['product_id']); ?>/"><i class="fa fa-eye"></i></a> </td>
				                        <td><a class="btn mini purple" href="<?php echo base_url(); ?>product/edit/<?php echo md5($details['product_id']); ?>/"><i class="fa fa-pencil"></i></a></td>
				                        <td><a class="btn mini purple" href="#" onclick="return deleteproduct('<?php echo md5($details['product_id']); ?>');"><i class="fa fa-trash"></i></a></td>
				                      </tr>
				                    <?php } ?>
				                </tbody>
                 			</table>
                		</div><!-- /.box-body -->
              		</div><!-- /.box -->
            	</div><!-- /.col -->
          	</div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<script type="text/javascript">
function deleteproduct(id)
{
	if(confirm('Are you sure you want to delete this product?'))
	{
		 window.location.href = '<?php echo base_url(); ?>product/delete/'+id;
	}	
}
</script>      
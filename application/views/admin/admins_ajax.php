 <?php //$page_links	= $this->pagination->create_links(); ?>
  <div class="box-body table-responsive" id="box-bodyss">
               
                  <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="alg-cnt">Name</th>
                        <th class="alg-cnt"><?php echo lang('email');?></th>
                        <th class="alg-cnt"><?php echo lang('username');?></th>
                        <th class="alg-cnt"><?php echo lang('access');?></th>
                        <th>Active</th>
                        <th class="alg-cnt" style="width:166px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($admins as $admin) { ?>
                    
                    <tr >
                     <td class="alg-cnt"><?php echo $admin->firstname; ?></td>
		                <td class="alg-cnt"><a href="mailto:<?php echo $admin->email;?>"><?php echo $admin->email; ?></a></td>
		                <td class="alg-cnt"><?php echo $admin->username; ?></td>
		                <td class="alg-cnt"><?php echo $admin->role; ?></td>
		                 <td> <div class="actv<?php echo $admin->id; ?>"> <?php if($admin->enabled == 1) echo "Yes"; else echo "No"; ?> </div></td>
		                <td class="alg-cnt">
			
                       <a class="various" data-fancybox-type="iframe" href="<?php echo base_url('admin/admin/form/'.$admin->id); ?>">
                          <button class="btn btn-info btn-sm" data-widget="Edit" data-toggle="tooltip" title="" data-original-title="Edit">
                          <i class="fa fa-fw fa-pencil"></i></button> </a>
                          
                          <button class="btn btn-default btn-sm deactive_active" data-widget="Active" data-toggle="tooltip" title="" data-original-title="Active" id="overlay1<?php echo $admin->id; ?>" value="<?php echo $admin->id; ?>" <?php if(!empty($admin->enabled)) echo 'style="display:none;"'; ?>><i class="icon fa fa-check"></i></button>
                          
                          <button class="btn btn-default btn-sm deactive_active" data-widget="Deactive" data-toggle="tooltip" title="" data-original-title="Deactive" id="overlay2<?php echo $admin->id; ?>" value="<?php echo $admin->id; ?>" <?php if(empty($admin->enabled)) echo 'style="display:none;"'; ?>><i class="fa fa-fw fa-times"></i></button>
				</div>
			</td>
                    </tr>
                    
                    <?php } ?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              <!--  <div class="box-footer clearfix">
                 
                    <?php //if($page_links != ''):?>
                    <tr><td colspan="5" style="text-align:center"><?php echo $page_links;?></td></tr>
                    <?php //endif;?>
                </div> -->
                </div>
                
<script>
    $(document).ready(function() {
    
        // Deactive Script //
         $( ".deactive_active" ).click(function() {
            
            $(".overlay").show();
            var id = $( this ).val();
            
            $.post("<?php echo base_url(); ?>admin/brand/activate_dactivate", {
                id: id
            }, function (data) {
                if(data == 1) {
                    $("#overlay2"+id).show();
                    $("#overlay1"+id).hide();
                    $(".actv"+id).text("Yes");
                } else if(data == 2) { 
                    $("#overlay2"+id).hide();
                    $("#overlay1"+id).show();
                    $(".actv"+id).text("No");
                }
                $(".overlay").hide();
            });
            
        });  
        
    });

</script>

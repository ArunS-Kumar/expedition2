      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
            <?php if(!empty($page_title)) echo $page_title; ?>
            </h1>
            
            <?php include('common/menu.php'); ?>
            
          </section>

          <!-- Main content -->
          
          <section class="content">
          <div class="row">
            <div class="col-xs-12">
             <div class="box">
                
                <div class="box-header with-border">
                  <h3 class="box-title" style="width: 300px;">
                  
                  
                   <a class="various" data-fancybox-type="iframe" href="<?php echo base_url('admin/admin/form'); ?>" style="float: left;">
                  <button type="button" class="btn btn-success btn-sm" data-widget="Add" data-toggle="tooltip" title="" data-original-title="Add"><i class="fa fa-fw fa-plus"></i></button></a>
                  
                  </h3>
                   
                </div><!-- /.box-header -->
                <?php
		        //$page_links	= $this->pagination->create_links(); ?>
		         <div id="esdfd">
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
                
                
                <div class="overlay" style="display:none;">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>  
              </div><!-- /.box -->

              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->  
<script>
    $(document).ready(function() {
    
        // fancybox Script //
	    $(".various").fancybox({
		    maxWidth	: 1000,
		    maxHeight	: 600,
		    fitToView	: false,
		    width		: '80%',
		    height		: '65%',
		    autoSize	: false,
		    closeClick	: false,
		    openEffect	: 'none',
		    closeEffect	: 'none',
		    afterClose : function() { fnParent(); return; }
	    });
	    
	    function fnParent() {
	    
            $(".overlay").show();
            var id = 'ajaxloaded';
            var searchtext = $("#searchtext").val();
            $.post("<?php echo base_url(); ?>admin/admin", {
                id: id, searchtext: searchtext
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
            });
        };
        
        // Deactive Script //
         $( ".deactive_active" ).click(function() {
            
            $(".overlay").show();
            var id = $( this ).val();
            
            $.post("<?php echo base_url(); ?>admin/admin/activate_dactivate", {
                id: id
            }, function (data) {
                if(data == 1) {
                    $("#overlay2"+id).show();
                    $("#overlay1"+id).hide();
                    $(".actv"+id).text("Yes");
                    //myFunction();   
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

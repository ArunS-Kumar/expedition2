 <?php $page_links	= $this->pagination->create_links(); ?>
 <div class="box-body table-responsive" id="box-bodyss">
               
                  <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 38px">#</th>
                      <th>Name</th>
                      <th>Active</th>
                      <th class="center" style="width: 150px">Action</th>
                    </tr>
                    </thead>
                    <tbody class="todo-list ui-sortable" id="model_contents" >
                    <?php 
                    if(isset($uri7)) $i=$uri7+1;
                    else $i=1; 
                    if(!empty($type)) { foreach($type as $appltn) { ?>
                    
                    <tr id="serial-<?php echo $appltn->id; ?>">
                      <td><a href="javascript:;"><span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span></a></td>
                      <td><?php echo $appltn->name; ?></td>
                      <td> <div class="actv<?php echo $appltn->id; ?>"> <?php if($appltn->activate == 1) echo "Yes"; else echo "No"; ?> </div></td>
                      <td class="center">
                      
                          <a class="various" data-fancybox-type="iframe" href="<?php echo base_url('admin/type/form/'.$appltn->id); ?>">
                          <button class="btn btn-info btn-sm" data-widget="Edit" data-toggle="tooltip" title="" data-original-title="Edit">
                          <i class="fa fa-fw fa-pencil"></i></button> </a>
                          
                          <button class="btn btn-default btn-sm deactive_active" data-widget="Active" data-toggle="tooltip" title="" data-original-title="Active" id="overlay1<?php echo $appltn->id; ?>" value="<?php echo $appltn->id; ?>" <?php if(!empty($appltn->activate)) echo 'style="display:none;"'; ?>><i class="icon fa fa-check"></i></button>
                          
                          <button class="btn btn-default btn-sm deactive_active" data-widget="Deactive" data-toggle="tooltip" title="" data-original-title="Deactive" id="overlay2<?php echo $appltn->id; ?>" value="<?php echo $appltn->id; ?>" <?php if(empty($appltn->activate)) echo 'style="display:none;"'; ?>><i class="fa fa-fw fa-times"></i></button>
                          
                          
                      </td>
                    </tr>
                    
                    <?php $i++; } } else { ?>
                    
                    <?php } ?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 
                    <?php if($page_links != ''):?>
                    <tr><td colspan="5" style="text-align:center"><?php echo $page_links;?></td></tr>
                    <?php endif;?>
                </div>
                
<script>
    $(document).ready(function() {
    
        // pagination Script //
        $( ".pagination > li > a" ).click(function() {
        
            $(".overlay").show();
            var id = 'ajaxloaded';
            var a_href = $( this ).attr('href');
            
            console.log(a_href);
            $.post(a_href, {
                id: id
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
            });
            
            return false;
        });  
        
        // Deactive Script //
         $( ".deactive_active" ).click(function() {
            
            $(".overlay").show();
            var id = $( this ).val();
            
            $.post("<?php echo base_url(); ?>admin/type/activate_dactivate", {
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

    //<![CDATA[
    $(document).ready(function(){
	    create_sortable();
    });

    // Return a helper with preserved width of cells
    var fixHelper = function(e, ui) {
	    ui.children().each(function() {
		    $(this).width($(this).width());
	    });
	    return ui;
    };

    function create_sortable()
    {
	    $('#model_contents').sortable({
		    scroll: true,
		    helper: fixHelper,
		    axis: 'y',
		    update: function(){
			    save_sortable();
		    }
	    });	
	    $('#model_contents').sortable('enable');
    }

    function save_sortable()
    {
	    $.ajax({
		    url:"<?php echo base_url();?>admin/type/get_serial",
		    type:'POST',
		    data:$('#model_contents').sortable('serialize'),
		    success:function(data){
		    //alert(data);
		    }
	    });
    }
    //]]>
</script>

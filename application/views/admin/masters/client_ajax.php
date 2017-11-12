 <?php $page_links	= $this->pagination->create_links(); ?>
                <div class="box-body table-responsive" id="box-bodyss">
               
                 <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                       <th>Name</th>
			<th>City</th>
			<th>Email</th>
			<th>Mobile Phone</th>
                      <th>Quotation Sub</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php //echo "<pre>"; print_r($quotation); exit;
                    if(!empty($brands)) { foreach($brands as $brand) { ?>
                   
                    <tr>
                     
                      <td><?php echo $brand->client_name; ?></td>
			 <td><?php echo $brand->cityName; ?></td>
			 <td><?php echo $brand->email; ?></td>
			 <td><?php echo $brand->mobile; ?></td>
			 <td><?php echo $brand->quotation_sub; ?></td>
                 
                  
                    </tr>
                    
                    <?php } } else { ?>
                    
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
            
            $.post("<?php echo base_url(); ?>admin/client/activate_dactivate", {
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
		    url:"<?php echo base_url();?>admin/client/get_serial",
		    type:'POST',
		    data:$('#model_contents').sortable('serialize'),
		    success:function(data){
		    //alert(data);
		    }
	    });
    }
    //]]>
</script>

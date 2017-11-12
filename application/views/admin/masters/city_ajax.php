 <?php $page_links	= $this->pagination->create_links(); ?>
  <div class="box-body table-responsive" id="box-bodyss">
               
                  <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Category</th>
                      <th class="center" style="width: 150px">Action</th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php 
                    if(isset($uri7)) $i=$uri7+1;
                    else $i=1; 
                    if(!empty($city)) { foreach($city as $appltn) { 
                    
                    ?>
                    
                    <tr>
                      <td><?php echo $appltn->cityName; ?></td>
                      <td><?php echo $appltn->stateName; ?></td>
                      <td class="center">
                      
                          <a class="various" data-fancybox-type="iframe" href="<?php echo base_url('admin/city/form/'.$appltn->cityID); ?>">
                          <button class="btn btn-info btn-sm" data-widget="Edit" data-toggle="tooltip" title="" data-original-title="Edit">
                          <i class="fa fa-fw fa-pencil"></i></button> </a>
                          
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
            
            $.post("<?php echo base_url(); ?>admin/city/activate_dactivate", {
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

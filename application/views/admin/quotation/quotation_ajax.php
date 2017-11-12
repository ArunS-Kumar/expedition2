 <?php $page_links	= $this->pagination->create_links(); ?>
                <div class="box-body table-responsive" id="box-bodyss">
               
                 <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Client</th>
                      <th>Prepared by</th>
                      <th>City</th>
                      <th>Show Room</th>
                      <th>Cost</th>
                      <th>Discount</th>
                      <th><i class="fa fa-fw fa-download"></i>  Download</th>
                      <th>STATUS</th>
                      <th>Comments</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php //echo "<pre>"; print_r($quotation); exit;
                    if(!empty($quotation)) { foreach($quotation as $quttn) { ?>
                    
                    <tr>
                      <td><?php echo date("d M Y", strtotime($quttn->created_on)); ?></td>
                      <td><?php echo $quttn->client_name; ?></td>
                      <td><?php echo $quttn->firstname; ?></td>
                      <td><?php echo $quttn->cityName; ?></td>
                      <td><?php echo $quttn->sname; ?></td>
                      <td><?php echo $quttn->cost; ?></td>
                      <td><?php echo $quttn->product_discount; ?></td>
                      <td>
                      <?php if($quttn->status == 1) { ?>
                      <a href="<?php echo base_url('admin/quotation/generate_pdf/'.$quttn->id);?>"><i class="fa fa-fw fa-file-pdf-o"></i> PDF</a><?php } else { ?><a href="javascript:;" class="uncomplete"><i class="fa fa-fw fa-file-pdf-o"></i> PDF</a><?php } ?>
                      </td>
                  <td>
                  <?php if($quttn->status == 1) { echo 'Completed'; } else { echo 'Pending'; } ?>
                  <!--
                  <select name="example1_length" aria-controls="example1" class="form-control sel_areag" id="status-<?php echo $quttn->id; ?>" >
                      <option value="">Select Status.. </option>
                      <option value="0" <?php if($quttn->status == 0) echo 'selected'; ?>>Pending</option>
                      <option value="1" <?php if($quttn->status == 1) echo 'selected'; ?>>Completed</option>
                  </select>  -->
                  </td>
                  <td class="center"><input type="text" name="comments" id="comments-<?php echo $quttn->id; ?>" class="form-control input-sm pull-right" placeholder="Comments.." value="<?php if(!empty($quttn->comments)) echo $quttn->comments; ?>"></td>
                  
                  <td> 
                    <?php if($quttn->status == 0) { ?>
                        <a class="various" href="<?php echo base_url().'admin/quotation/form/'.$quttn->id; ?>">
                        <button class="btn btn-info btn-sm ciepese" data-widget="Edit" data-toggle="tooltip" title="" data-original-title="Edit">
                        <i class="fa fa-fw fa-edit"></i> Edit</button> </a>
                    <?php } else { ?>
                        <a class="various" href="<?php echo base_url().'admin/quotation/quotation_duplicate/'.$quttn->id; ?>">
                        <button class="btn btn-info btn-sm ciepese" data-widget="Edit" data-toggle="tooltip" title="" data-original-title="Edit">
                        <i class="fa fa-fw fa-copy"></i> Duplicate</button> </a>
                    <?php } ?>
                  </td>
                  
                    </tr>
                    <script>
                         $(document).ready(function() {
                         
                            $( "#status-<?php echo $quttn->id; ?>" ).change(function() {
                            
                                var status = $( this ).val();
                                var qid = '<?php echo $quttn->id; ?>';
                                var comments = $( "#comments-<?php echo $quttn->id; ?>" ).val();
                                
                                $.post("<?php echo base_url('admin/quotation/update_comment_status'); ?>", {
                                    status: status, qid: qid , comments: comments
                                }, function (data) {
                                    console.log(data);
                                });
                            });
                            
                            $( "#comments-<?php echo $quttn->id; ?>" ).keyup(function() {
                            
                                var status = $( "#status-<?php echo $quttn->id; ?>" ).val();
                                var qid = '<?php echo $quttn->id; ?>';
                                var comments = $( this ).val();
                                
                                $.post("<?php echo base_url('admin/quotation/update_comment_status'); ?>", {
                                    status: status, qid: qid , comments: comments
                                }, function (data) {
                                    console.log(data);
                                });
                            });
                            
                               
                         });
                    </script>
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
        
        $( ".uncomplete" ).click(function() {
            alert('Please Complete the all steps !');
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
		    url:"<?php echo base_url();?>admin/brand/get_serial",
		    type:'POST',
		    data:$('#model_contents').sortable('serialize'),
		    success:function(data){
		    //alert(data);
		    }
	    });
    }
    //]]>
</script>

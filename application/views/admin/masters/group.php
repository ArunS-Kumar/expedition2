      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
            <?php if(!empty($page_title)) echo $page_title; ?>
           <!--   <small>Example 2.0</small> -->
            </h1>
            
            <?php $uri7 = $this->uri->segment(7); 
            include(dirname(__dir__).'/common/menu.php'); ?>
            
          </section>

          <!-- Main content -->
          
          <section class="content">
          <div class="row">
            <div class="col-xs-12">
             <div class="box">
                
                <div class="box-header with-border">
                  <h3 class="box-title" style="width: 300px;">
                  
                  <div class="dataTables_length" id="example1_length" style="float: left; margin-right: 1%;">
                  <select name="example1_length" aria-controls="example1" class="form-control input-sm" id="tablelimit">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                  </select> </div>
                  
                   <a class="various" data-fancybox-type="iframe" href="<?php echo base_url('admin/menu/form'); ?>" style="float: left;">
                  <button type="button" class="btn btn-success btn-sm" data-widget="Add" data-toggle="tooltip" title="" data-original-title="Add"><i class="fa fa-fw fa-plus"></i></button></a>
                  
                  </h3>
                  <div class="box-tools">
                          
                    <button class="btn btn-default btn-sm" data-widget="Reset" data-toggle="tooltip" data-original-title="Reset" style=" float: right;" id="searchreset"><i class="fa fa-fw fa-refresh"></i></button>
                    
                    <div class="input-group" style="width: 150px; float: right;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" id="searchtext">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default" id="searchbutton"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                     
                   
                  </div>
                </div><!-- /.box-header -->
                <?php
		        $page_links	= $this->pagination->create_links(); ?>
		         <div id="esdfd">
		         <!-- Ajax Table Starts Here -->
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
                    if(!empty($category)) { foreach($category as $categy) { 
                    ?>
                    
                    <tr id="serial-<?php echo $categy->id; ?>">
                      <td><a href="javascript:;"><span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span></a></td>
                      <td><?php echo $categy->name; ?></td>
                      <td> <div class="actv<?php echo $categy->id; ?>"> <?php if($categy->enabled == 1) echo "Yes"; else echo "No"; ?> </div></td>
                      <td class="center">
                      
                          <a class="various" data-fancybox-type="iframe" href="<?php echo base_url('admin/menu/form/'.$categy->id); ?>">
                          <button class="btn btn-info btn-sm" data-widget="Edit" data-toggle="tooltip" title="" data-original-title="Edit">
                          <i class="fa fa-fw fa-pencil"></i></button> </a>
                          
                          <button class="btn btn-default btn-sm deactive_active" data-widget="Active" data-toggle="tooltip" title="" data-original-title="Active" id="overlay1<?php echo $categy->id; ?>" value="<?php echo $categy->id; ?>" <?php if(!empty($categy->enabled)) echo 'style="display:none;"'; ?>><i class="icon fa fa-check"></i></button>
                          
                          <button class="btn btn-default btn-sm deactive_active" data-widget="Deactive" data-toggle="tooltip" title="" data-original-title="Deactive" id="overlay2<?php echo $categy->id; ?>" value="<?php echo $categy->id; ?>" <?php if(empty($categy->enabled)) echo 'style="display:none;"'; ?>><i class="fa fa-fw fa-times"></i></button>
                          
                          
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
                <!-- Ajax Table Ends Here -->
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
            $.post("<?php echo base_url(); ?>admin/menu", {
                id: id, searchtext: searchtext
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
            });
        };
        
        // Search Script //
        $( "#searchbutton" ).click(function() {
        
             $(".overlay").show();
            var searchtext = $("#searchtext").val();
            var id = 'ajaxloaded';
            
             $.post("<?php echo base_url(); ?>admin/menu", {
                id: id, searchtext: searchtext
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
            });
        });  
        
        // Search reset Script //
        $( "#searchreset" ).click(function() {
        
            $(".overlay").show();
            var searchtext = $("#searchtext").val();
            var id = 'ajaxloaded';
            
             $.post("<?php echo base_url(); ?>admin/menu", {
                id: id
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
                $("#tablelimit option:first").attr("selected", true);
                $("#searchtext").val('');
            });
        });  
        
        // pagination Script //
        $( ".pagination > li > a" ).click(function() {
        
            $(".overlay").show();
            var id = 'ajaxloaded';
            var searchtext = $("#searchtext").val();
            var a_href = $( this ).attr('href');
            
            $.post(a_href, {
                id: id, searchtext: searchtext
            }, function (data) {
                $("#esdfd").html(data);
                $(".overlay").hide();
            });
            
            return false;
        });  
        
        // Deactive Script //
         $( ".deactive_active" ).click(function() {
            
            $(".overlay").show();
            var id = $( this ).val();
            
            $.post("<?php echo base_url(); ?>admin/menu/activate_dactivate", {
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
        
         // Table Limit Script //
        $( "#tablelimit" ).change(function() {

            $(".overlay").show();
            var searchtext = $("#searchtext").val();
            var id = 'ajaxloaded';
            var tablelimit = $( this ).val();
            
             $.post("<?php echo base_url(); ?>admin/menu", {
                id: id, searchtext: searchtext , tablelimit: tablelimit
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
            });
            
        }); 
         
        
    });
    
</script>

<script type="text/javascript">

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
		url:"<?php echo base_url();?>admin/menu/get_serial",
		type:'POST',
		data:$('#model_contents').sortable('serialize'),
		success:function(data){
		//alert(data);
		}
	});
}
//]]>
</script>

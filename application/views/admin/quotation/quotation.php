<link rel="stylesheet" href="<?php echo base_url();?>assets/css/quotation.css">
<link type="text/css" href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>

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
		<div class="boxsss">
                
                <div class="box-header ">
                  <h3 class="box-title" style="width: 80%;">
                  
                  <div class="dataTables_length" id="example1_length" style="float: left; margin-right: 1%;">
                  <select name="example1_length" aria-controls="example1" class="form-control input-sm controlss" id="tablelimit">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                  </select> </div>
                  
                   <a href="<?php echo base_url('admin/quotation/form'); ?>" style="float: left;margin-right: 1%;">
                  <button type="button" class="btn btn-success btn-sm" data-widget="Add" data-toggle="tooltip" title="" data-original-title="Add"><i class="fa fa-fw fa-plus"></i></button></a>
                  
                   <div class="" id="example1_length" style="float: left; margin-right: 1%;">
                <select name="example1_length" aria-controls="example1" class="form-control input-sm controlss date_search" id="city">
                <option value="">Select City</option>
                 <?php if(!empty($qcity)) { foreach($qcity as $cty) { ?>
                  <option value="<?php echo $cty['cid']; ?>"><?php echo $cty['cityName']; ?></option>
                  <?php } } ?>
                </select> </div>
                  
                <div class="" id="example1_length" style="float: left; margin-right: 1%;">
                <select name="example1_length" aria-controls="example1" class="form-control input-sm controlss date_search" id="showroom">
                <option value="">Select Showroom</option>
                 <?php if(!empty($stores)) { foreach($stores as $cty) { ?>
                  <option value="<?php echo $cty['id']; ?>"><?php echo $cty['name']; ?></option>
                  <?php } } ?>   
                </select> </div>  
                
                <div class="" id="example1_length" style="float: left; margin-right: 1%;">
                <select name="example1_length" aria-controls="example1" class="form-control input-sm controlss date_search" id="sales_person">
                <option value="">Select Sales Person</option>
                <?php if(!empty($users)) { foreach($users as $cty) { ?>
                  <option value="<?php echo $cty['id']; ?>"><?php echo $cty['firstname']; ?></option>
                  <?php } } ?>
                </select> </div>
<div class="sdata" style="width: 150px; margin-right: 1%;float: left;" >
<input type="text" name="start_date" class="form-control input-sm pull-right serch date_search" placeholder="START DATE" id="start_date"  style="width: 150px;float: left;" readonly><span class="calander-img"><i class="fa fa-fw fa-calendar"></i></span>
</div>
<div class="edata" style="width: 150px; margin-right: 1%;float: left;" >
<input type="text" name="end_date" class="form-control input-sm pull-right serch date_search" placeholder="END DATE" id="end_date" style="width: 150px;float: left;" readonly><span class="calander-imgs"><i class="fa fa-fw fa-calendar"></i></span></div>
                 
                  </h3>
                  <div class="box-tools" style="width: 20%;margin-top: .5%;">
                          
                    <button class="btn btn-default btn-sm" data-widget="Reset" data-toggle="tooltip" data-original-title="Reset" style=" float: right;" id="searchreset"><i class="fa fa-fw fa-refresh"></i></button>
                    
               
                
                <div class="input-group" style="width: 150px; float: right;">
                  <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Client" id="searchtext">
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-default" id="searchbutton"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                 <div>
                
               
                </div>
                   
                  </div>
                </div><!-- /.box-header -->
                <?php
		        $page_links	= $this->pagination->create_links(); ?>
		         <div id="esdfd">
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
                <div class="box-footer clearfix fotr">
                 
                    <?php if($page_links != ''):?>
                    <tr><td colspan="5" style="text-align:center"><?php echo $page_links;?></td></tr>
                    <?php endif;?>
                </div>
                </div>
                
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
        
        
        $( "#start_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });

        $( "#end_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
    
        // fancybox Script //
	    $(".various").fancybox({
		    maxWidth	: 800,
		    maxHeight	: 600,
		    fitToView	: false,
		    width		: '70%',
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
            $.post("<?php echo base_url(); ?>admin/quotation", {
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
            var tablelimit = $( "#tablelimit" ).val();
            var start_date = $( "#start_date" ).val();
            var end_date = $( "#end_date" ).val();
            var city = $( "#city" ).val();
            var showroom = $( "#showroom" ).val();
            var sales_person = $( "#sales_person" ).val();
            
             $.post("<?php echo base_url(); ?>admin/quotation", {
                id: id, searchtext: searchtext , tablelimit: tablelimit, start_date : start_date, end_date : end_date, city : city, showroom : showroom, sales_person : sales_person
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
            
             $.post("<?php echo base_url(); ?>admin/quotation", {
                id: id
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
                $("#tablelimit option:first").attr("selected", true);
                $("#searchtext").val('');
                $("#city option:first").attr("selected", true);
                $("#showroom option:first").attr("selected", true);
                $("#sales_person option:first").attr("selected", true);
                $("#start_date").val('');
                $("#end_date").val('');
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
            
            $.post("<?php echo base_url(); ?>admin/quotation/activate_dactivate", {
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
            var tablelimit = $( "#tablelimit" ).val();
            var start_date = $( "#start_date" ).val();
            var end_date = $( "#end_date" ).val();
            var city = $( "#city" ).val();
            var showroom = $( "#showroom" ).val();
            var sales_person = $( "#sales_person" ).val();
            
             $.post("<?php echo base_url(); ?>admin/quotation", {
                id: id, searchtext: searchtext , tablelimit: tablelimit, start_date : start_date, end_date : end_date, city : city, showroom : showroom, sales_person : sales_person
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
            });
            
        }); 
        
        
         // Date Search Script //
        $( ".date_search" ).change(function() {

            $(".overlay").show();
            var searchtext = $("#searchtext").val();
            var id = 'ajaxloaded';
            var tablelimit = $( "#tablelimit" ).val();
            var start_date = $( "#start_date" ).val();
            var end_date = $( "#end_date" ).val();
            var city = $( "#city" ).val();
            var showroom = $( "#showroom" ).val();
            var sales_person = $( "#sales_person" ).val();
            
             $.post("<?php echo base_url(); ?>admin/quotation", {
                id: id, searchtext: searchtext , tablelimit: tablelimit, start_date : start_date, end_date : end_date, city : city, showroom : showroom, sales_person : sales_person
            }, function (data) {
                $(".overlay").hide();
                $("#esdfd").html(data);
            });
            
        }); 
        
        $( ".uncomplete" ).click(function() {
            alert('Please Complete the all steps !');
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
		url:"<?php echo base_url();?>admin/quotation/get_serial",
		type:'POST',
		data:$('#model_contents').sortable('serialize'),
		success:function(data){
		//alert(data);
		}
	});
}
//]]>
</script>

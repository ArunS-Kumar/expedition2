<link rel="stylesheet" href="<?php echo base_url();?>assets/css/quotation.css">
<script src="<?php echo base_url();?>assets/js/quotation.js"></script>
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

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">

                            <ul class="steps">
                                <li data-step="1">
                                    <span class="step ">1</span>
                                    <span class="title">CLIENT DETAILS</span>
                                </li>

                                <li data-step="2">
                                    <span class="step active">2</span>
                                    <span class="title">GROUP</span>
                                </li>

                                <li data-step="3">
                                    <span class="step">3</span>
                                    <span class="title">PREVIEW</span>
                                </li>

                            </ul>
                        </div>
                        <!-- /.box-header -->

                       
                            <div class="box-body table-responsive" id="box-bodyss">

                             <!--   <h3> GROUP </h3>  -->

                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->

                                        <!-- #section:plugins/fuelux.treeview -->
                                        <div class="row">
                                            <div class="col-sm-6 leftdiv">
                                                <div class="widget-box widget-color-blue2 ">
                                                    <div class="widget-header">
                                                        <h4 class="widget-title lighter smaller">GROUP </h4>
                                                    </div>
                                                    
                                                    <div id="tree" class="box">
                                                    
        <ul class="tree ">
           <?php if(!empty($group_list)) { foreach($group_list as $list) { ?>
            <li class="groupmenu">
                <div class="icon-folder ace-icon tree-plus"></div>
                <label class="labimag"><span class="lititle"><?php echo $list['name']; ?></span><span class="avalbun"></span></label>
                <ul class="tree-branch adds makesel-<?php echo $list['id']; ?>">
                     <?php if(!empty($subgroup_list)) { foreach($subgroup_list as $slist) { ?>
                    <li data-location="<?php echo $list['id'].'-'.$slist['id']; ?>" class="groupmenu " >
                        <div class="icon-folder ace-icon tree-plus"></div>
                        <label class="labig"><span class="lititless"><?php echo $slist['name']; ?></span><span class="avalbun"></span></label>
                        <ul class="tree-branchs tree2 adds makesels-<?php echo $list['id'].'-'.$slist['id']; ?>" >
                        
                            <?php if(!empty($group_vals)) { foreach($group_vals as $vals) { 
                            if($vals['group'] == $list['id'] && $vals['subgroup'] == $slist['id']) { ?>
                            
                            <li data-location="<?php echo $vals['qpid']?>">
                                <div class="nosubuls"></div>
                                <span class="lititles"><i class="fa fa-fw fa-angle-double-right"></i>&nbsp;&nbsp;<?php echo $vals['pname'].', QTY - '.$vals['qty']; ?></span>
                                <a href="javascript:;" class="treecross"></a>
                            </li> 
                            
                            <?php } } } else { ?>
                         <!--   <li>
                                <div class="nosubuls"></div>
                                <span class="lititles">-&nbsp;&nbsp;No Products</span>
                            </li>  -->
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } } ?>  
                </ul>
            </li>
          <?php } } ?>  
        </ul>
        
        <div>
        <a href="javascript:;" id="collapse_all"> <span class="label label-danger pull-right">Collapse all</span></a>
        <a href="javascript:;" id="expand_all"> <span class="label label-info pull-right">Expand all</span></a>
        </div>
        <div class="overlay overlayss" style="display:none;">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
                                                   
                                                    </div>
                                                    
                                                </div>
                                                 
                                            </div>

                                            <div class="col-sm-6 rightdiv">
                                                <div class="widget-box widget-color-green2">
                                                    <div class="widget-header">
                                                        <h4 class="widget-title lighter smaller">Product Search</h4>
                                                    </div>

                                                    <div class="widget-body">
                                                        <div class="widget-main padding-8">
                                                            <ul id="tree2"></ul>
                                                            <!-- Search Filter Starts here -->

                                                            <div class="box">
                                                                <form name="searchheared" id="searchheared">   
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title" style="width: 100%;">
                                                                 
            <div class="dataTables_length" id="example1_length" style="float: left; margin-right: 1%;">
                <select name="example1_length" aria-controls="example1" class="form-control input-sm" id="tablelimit" name="tablelimit">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <div class="dataTables_length" id="example1_length" style="float: left; margin-right: 1%;">
                <select name="example1_length" aria-controls="example1" class="form-control input-sm head_lenth" id="brand" name="brand">
                    <option value="" selected>SELECT BRAND ..</option>
                    <?php if(!empty($brand_list)) { foreach($brand_list as $list) { ?>
                    <option value="<?php echo $list['id']; ?>">
                        <?php echo $list['name']; ?>
                    </option>
                    <?php } } ?>
                </select>
            </div>

            <div class="dataTables_length" id="example1_length" style="float: left; margin-right: 1%;">
                <select name="example1_length" aria-controls="example1" class="form-control input-sm head_lenth" id="series" name="series">
                    <option value="" selected>SELECT SERIES ..</option>
                    <?php if(!empty($series_list)) { foreach($series_list as $list) { ?>
                    <option value="<?php echo $list['id']; ?>">
                        <?php echo $list['name']; ?>
                    </option>
                    <?php } } ?>
                </select>
            </div>

            <div class="dataTables_length" id="example1_length" style="float: left; margin-right: 1%;">
                <select name="example1_length" aria-controls="example1" class="form-control input-sm head_lenth" id="category" name="category">
                    <option value="" selected>SELECT CATEGORY ..</option>
                    <?php if(!empty($category_list)) { foreach($category_list as $list) { ?>
                    <option value="<?php echo $list['id']; ?>">
                        <?php echo $list['name']; ?>
                    </option>
                    <?php } } ?>
                </select>
            </div>

            <div class="dataTables_length" id="example1_length" style="float: left; margin-right: 1%;">
                <select name="example1_length" aria-controls="example1" class="form-control input-sm head_lenth" id="subcategory" name="subcategory">
                    <option value="" selected>SELECT SUB CATEGORY ..</option>
                </select>
            </div>
            </h3>

        <div class="box-tools">
            <button type="reset" class="btn btn-default btn-sm" data-widget="Reset" data-toggle="tooltip" data-original-title="Reset" style=" float: right;" id="searchreset"><i class="fa fa-fw fa-refresh"></i></button>
            <div class="input-group" style="width: 150px; float: right;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" id="searchtext" required>
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-default" id="searchbutton" type="button"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
       
        
                                                                </div> </form>
                                                                <!-- /.box-header -->
 <h4 id="grp-subgrp"></h4>  
     <div id="esdfd">
                  <div class="box-body table-responsive" id="box-bodyss">
   
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><i class="fa fa-fw fa-image"></i></th>
                                <th>MODEL NAME</th>
                                <th>PRODUCT NAME</th>
                                <th>UNIT PRICE</th>
                                <th>DISCOUNT</th>
                                <th>FINAL COST</th>
                                <th>PRODUCT FINISHES</th>
                                <th class="center">QTY</th>
                            </tr>
                        </thead>
                        <tbody class="todo-list ui-sortable" id="model_contents">
                            <tr>
                                <td  class="center" colspan="8">Empty</td>
                            </tr>
                        </tbody>
                    </table>
              </div>
              
              
                                                                    <!-- /.box-body -->
                                                                    <div class="box-footer clearfix">
                                                                    </div>
                                                                </div>

                                                                <div class="overlay overlays" style="display:none;">
                                                                    <i class="fa fa-refresh fa-spin"></i>
                                                                </div>
                                                            </div>
                                                            <!-- /.box -->

                                                            <!-- Search Filter Ends Here -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--    <div class="box-body">
The great content goes here
</div>   -->
    
    <a href="<?php echo base_url();?>admin/quotation/form/<?php echo $quotation_id; ?>">
    <button type="button" class="btn btn-info btn-danger esfsesxf"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;Back</button></a>
    
    <a href="<?php echo base_url('admin/quotation/preview'); ?>">
    <button type="button" class="btn btn-success btn-sm esfsesxf"> Next&nbsp;<i class="fa fa-fw fa-arrow-right"></i></button></a>
    
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                    
        </section>
        <input type="hidden" name="sel_group" id="sel_group" value="">
        <!-- /.content -->
        </div>
        </div>
        <!-- /.box-body -->
        
        </div>
        <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        </section>
    </div>
    <!-- /.container -->
</div>

<script>

    // Brand Search //
    $("select#brand").change(function () {
    
        $(".overlays").show();
        var id           = 'ajaxloaded';
        var brand        = $("select#brand option:selected").attr('value');
        var series       = $("select#series option:selected").attr('value');
        var category     = $("select#category option:selected").attr('value');
        var subcategory  = $("select#subcategory option:selected").attr('value');
        var tablelimit   = $( '#tablelimit' ).val(); 
        var searchtext   = $( '#searchtext' ).val();
        
        $.post("<?php echo base_url()?>admin/quotation/quotation_step2", {
            id : id, brand: brand, series : series, category : category, subcategory : subcategory, searchtext : searchtext, tablelimit : tablelimit
        }, function (data) {
            $(".overlays").hide();
            $("#esdfd").html(data);
        });
    });
    
    // Series Search //
    $("select#series").change(function () {
    
        $(".overlays").show();
        var id           = 'ajaxloaded';
        var brand        = $("select#brand option:selected").attr('value');
        var series       = $("select#series option:selected").attr('value');
        var category     = $("select#category option:selected").attr('value');
        var subcategory  = $("select#subcategory option:selected").attr('value');
        var tablelimit   = $( '#tablelimit' ).val(); 
        var searchtext   = $( '#searchtext' ).val();
        
        $.post("<?php echo base_url()?>admin/quotation/quotation_step2", {
            id : id, brand: brand, series : series, category : category, subcategory : subcategory, searchtext : searchtext, tablelimit : tablelimit
        }, function (data) {
            $(".overlays").hide();
            $("#esdfd").html(data);
        });
    });
    
    // Category Search //
    $("select#category").change(function () {

        $(".overlays").show();
        var id           = 'ajaxloaded';
        var brand        = $("select#brand option:selected").attr('value');
        var series       = $("select#series option:selected").attr('value');
        var category     = $("select#category option:selected").attr('value');
        var subcategory  = $("select#subcategory option:selected").attr('value');
        var tablelimit   = $( '#tablelimit' ).val(); 
        var searchtext   = $( '#searchtext' ).val();
        
        $.post("<?php echo base_url(); ?>admin/product/load_subcategory", {
            state: category
        }, function (data) {
            $('#subcategory').html(data);
        });
        
        $.post("<?php echo base_url(); ?>admin/quotation/quotation_step2", {
            id : id, brand: brand, series : series, category : category, subcategory : subcategory, searchtext : searchtext, tablelimit : tablelimit
        }, function (data) {
            $(".overlays").hide();
            $("#esdfd").html(data);
        });
    });
    
    // Sub Category Search //
    $("select#subcategory").change(function () {
    
        $(".overlays").show();
        var id           = 'ajaxloaded';
        var brand        = $("select#brand option:selected").attr('value');
        var series       = $("select#series option:selected").attr('value');
        var category     = $("select#category option:selected").attr('value');
        var subcategory  = $("select#subcategory option:selected").attr('value');
        var tablelimit   = $( '#tablelimit' ).val(); 
        var searchtext   = $( '#searchtext' ).val();
        
        $.post("<?php echo base_url()?>admin/quotation/quotation_step2", {
            id : id, brand: brand, series : series, category : category, subcategory : subcategory, searchtext : searchtext, tablelimit : tablelimit
        }, function (data) {
            $(".overlays").hide();
            $("#esdfd").html(data);
        });
    });
    
    // Search Script //
    $( "#searchbutton" ).click(function() {
    
        $(".overlays").show();
        var id           = 'ajaxloaded';
        var brand        = $("select#brand option:selected").attr('value');
        var series       = $("select#series option:selected").attr('value');
        var category     = $("select#category option:selected").attr('value');
        var subcategory  = $("select#subcategory option:selected").attr('value');
        var tablelimit   = $( '#tablelimit' ).val(); 
        var searchtext   = $( '#searchtext' ).val();
        
        $.post("<?php echo base_url(); ?>admin/quotation/quotation_step2", {
            id : id, brand: brand, series : series, category : category, subcategory : subcategory, searchtext : searchtext, tablelimit : tablelimit
        }, function (data) {
            $(".overlays").hide();
            $("#esdfd").html(data);
        });
    });  
    
    
    $( "#searchreset" ).click(function() {
        
        $(".overlays").show();
        $( '#searchtext' ).val('');
        var id           = 'ajaxloaded';
        $.post("<?php echo base_url(); ?>admin/quotation/quotation_step2", {
            id : id
        }, function (data) {
            $(".overlays").hide();
            $("#esdfd").html(data);
        });
    });  
    
            
     // Table Limit Script //
    $( "#tablelimit" ).change(function() {

        $(".overlays").show();
        var id           = 'ajaxloaded';
        var brand        = $("select#brand option:selected").attr('value');
        var series       = $("select#series option:selected").attr('value');
        var category     = $("select#category option:selected").attr('value');
        var subcategory  = $("select#subcategory option:selected").attr('value');
        var tablelimit   = $( '#tablelimit' ).val(); 
        var searchtext   = $( '#searchtext' ).val();
        
        $.post("<?php echo base_url(); ?>admin/quotation/quotation_step2", {
            id : id, brand: brand, series : series, category : category, subcategory : subcategory, searchtext : searchtext, tablelimit : tablelimit
        }, function (data) {
            $(".overlays").hide();
            $("#esdfd").html(data);
        });

    }); 
        
    $(document).ready(function () {

        //Handle tree item link stored as LI data attribute
        $('li>label').on('click', function (e) {
            
            var gvalues = $(this).parent('li').attr('data-location');
            var gparent = $('>label', $(this).parent().parent().parent()).text();
            var gchild = $(this).text();
            if(gparent != "" && gchild != "") {
                $('#grp-subgrp').html(gparent+' > '+gchild);
            }
            $('#sel_group').val(gvalues);
            return false;
            
        })
        
        $('li>a.treecross').on('click', function (e) {
            $('.overlayss').show();
            var pvalues = $(this).parent('li').attr('data-location');
            var maksel = $(this).parent('li').parent('ul').parent('li').attr('data-location');
            var result = maksel.split('-');

           // console.log($(this).parent('ul').parent('li').parent('ul').parent('li').attr('data-location'));
            
            $.post('<?php echo base_url("admin/quotation/quotation_product_delete");?>', {
                pvalues: pvalues
            }, function (data) {
                $(".tree").html(data);
                //$(".makesel-"+result[0]).addClass("selected");
               // $(".makesels-"+maksel).addClass("selected");
                $('.overlayss').hide();
            });
                    
            return false;
        })
        
      /*  $( "#expand_all" ).click(function() {
            $(".adds").addClass("selected").removeClass("deselected");
        });
        
         $( "#collapse_all" ).click(function() {
            $(".adds").removeClass("selected").addClass("deselected");
        }); */
        
    });
</script>
<style type="text/css">

    div#box-bodyss {
        overflow: hidden;
    }
    
    .head_lenth {
        width: 140px !important;
    }
    
    .box-header > .box-tools {
        top: 10px;
    }
    
    .vcenter { 
        vertical-align: middle !important; 
    }
    div#tree {
        margin-bottom: 0px !important;
        border-top: 0px !important;
    }
    .labimag.actives, .labig.activess {
    background-image: url("<?php echo base_url();?>assets/img/minus.png");
}
    .selected { display:block !important; }
    .deselected { display:none !important; }
</style>

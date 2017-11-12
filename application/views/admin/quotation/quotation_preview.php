<link rel="stylesheet" href="<?php echo base_url();?>assets/css/quotation.css">
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
                                    <span class="step">1</span>
                                    <span class="title">CLIENT DETAILS</span>
                                </li>

                                <li data-step="2">
                                    <span class="step">2</span>
                                    <span class="title">GROUP</span>
                                </li>

                                <li data-step="3">
                                    <span class="step active">3</span>
                                    <span class="title">PREVIEW</span>
                                </li>

                            </ul>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body table-responsive" id="box-bodyss">
                         <!--   <h3> PREVIEW </h3> -->
                            <div class="box-body table-responsive" id="box-bodyss">
			<fieldset class="subgrpss subgp">
			<legend> PRODUCTS </legend>
                            <?php foreach($group_list as $list) { if( in_array($list['id'], $group, true)) {  ?>
                            <fieldset class="subgrpss subgp">
                               <br> <legend><h4 class="grophead"> <?php echo $list['name']; ?> </h4></legend>
                                <?php foreach($subgroup_list as $slist) { if( in_array($list['id'].'-'.$slist['id'], $subgroup, true)) { ?>
                                <fieldset class="subgrpss subgp">
                          <legend>      <h4 class="subgrophead"><?php echo $slist['name']; ?></h4> </legend>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 38px">#</th>
                                            <th style="width: 40px;">IMAGE</th>
                                            <th>CODE</th>
                                            <th>PRODUCT NAME & DESCRIPTION</th>
                                            <th>UNIT PRICE</th>
                                            <th>DISCOUNT</th>
                                            <th>QTY</th>
                                            <th>FINAL COST</th>
                                        </tr>
                                    </thead>
                                    <tbody class="todo-list ui-sortable" id="model_contents">
                                <?php if(!empty($group_vals)) { $i =1; foreach($group_vals as $vals) { 
                                      if($vals['group'] == $list['id'] && $vals['subgroup'] == $slist['id']) { ?>
                                        <tr id="serial-5" class="">
                                            
                                            <td class="vcenter"><?php echo $i; ?></td>
                                            
                                            <td class="vcenter"><?php if(!empty($vals['image'])) { ?>
                                                  <img src="<?php echo base_url('uploads/images/full/'.$vals['image']); ?>" alt="<?php echo $vals['pname'].' - Image'; ?>" style="width: 120px;height: 120px;" >
                                                  <?php } else { ?>
                                                  <img src="<?php echo base_url('assets/img/No_photo.png'); ?>" alt="<?php echo $vals['pname'].' - Image'; ?>" >
                                                  <?php } ?></td>
                                            <td class="vcenter"><?php if(!empty($vals['product_id'])) { echo $vals['product_id']; } ?></td>
                                            <td class="vcenter"><span class="subgrophead"><?php echo $vals['pname'].' '.$vals['model_name']; ?></span><br><?php if(!empty($vals['quotation_description'])) { echo $vals['quotation_description']; } ?><br>
                                            <span class="subgrophead">PRODUCT FINISH : </span><?php echo $vals['finish']; ?> </td>
                                            <td class="vcenter"><?php if(!empty($vals['price'])) { echo $vals['price']; } ?></td>
                                            <td class="vcenter"><?php if(!empty($vals['discount'])) { echo $vals['discount']; } ?></td>
                                            <td class="vcenter"><?php if(!empty($vals['qty'])) { echo $vals['qty']; } ?></td>
                                            <td class="vcenter"><?php 
                                            if(!empty($vals['discount'])) {
                                                $price = (($vals['price'] - $vals['discount']) * $vals['qty']);
                                            } else {
                                                $price = ($vals['price'] * $vals['qty']);
                                            }
                                            echo $price;
                                            ?></td>

                                        </tr>
                                        <?php $i++; } } } ?>
                                    </tbody>
                                </table>
				</fieldset>
				<br>
                                <?php } } ?> </fieldset><?php } } ?>
                                
                                <!-- Price Calculation -->
                                <?php 
                                $cost = 0;
                                $totalcost = 0;
                                $discount = 0;
                                $totaldiscount = 0; 
                                $tprice = 0;
                                
                                if(!empty($group_vals)) {
                                    foreach($group_vals as $vals) {
                                    
                                        $cost = ($vals['qty'] * $vals['price']);
                                        $totalcost = ($totalcost + $cost);
                                        
                                        $discount = ($vals['qty'] * $vals['discount']);
                                        $totaldiscount = ($totaldiscount + $discount);
                                        
                                    }
                                }
                                $tprice = $totalcost - $totaldiscount;
                                ?>
                                <form action="<?php echo base_url('admin/quotation/finish');?>" method="post" name="quotation_finish" id="quotation_finish">
                                <input type="hidden" name="tprice" id="tprice" value="<?php echo $tprice; ?>">
                                <input type="hidden" name="fprice" id="fprice" value="<?php echo $tprice; ?>">
				<div class="tabl">
                                <div class="tablesdas" >
                                <table class="table table-bordered table-hover" >
                                    <tbody class="todo-list ui-sortable" >
                                        <tr>
                                            <td>COST</td>
                                            <td>
                                            <input type="text" name="cost" id="cost" class="form-control valid" value="<?php echo $totalcost; ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>(-)PRODUCT DISCOUNT</td>
                                            <td><input type="text" name="product_discount" id="product_discount" class="form-control valid target" value="<?php echo $totaldiscount; ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>(-)EXECUTIVE DISCOUNT</td>
                                            <td><input type="number" name="executive_discount" id="executive_discount" class="form-control valid target" value="" required></td>
                                        </tr>
                                        <tr>
                                            <td>(+)INSTALLATION CHARGES</td>
                                            <td><input type="number" name="installation_charges" id="installation_charges" class="form-control valid target" value="" required></td>
                                        </tr>
                                        <tr>
                                            <td>(+)TAXES</td>
                                            <td><input type="number" name="taxes" id="taxes" class="form-control valid target" value="" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                             
                            <h4 class="subgrophead"><span class="price_text">TOTAL COST :</span> 
                                                <span class="price_vals"> INR <span id="price_val"><?php echo $tprice; ?></span></span></h4><br>
			    
                            <button type="submit" class="btn btn-success btn-sm esfsesxf esfsesxfss" data-widget="pdf" data-toggle="tooltip" title="" data-original-title="pdf">
                            <i class="fa fa-fw fa-save"></i>FINISH & SAVE
                            </button>
                            </div>
			    </div>
		<div class="bck">
 <a href="<?php echo base_url().'admin/quotation/quotation_step2';?>">
                                        <button type="button" class="btn btn-info btn-danger esfsesxf"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;Back</button></a>
		</div>
                            </form>
                            </div>			
			</fieldset>
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
<style>

    .vcenter { 
        vertical-align: middle !important; 
    }
    h4.grophead {
        text-transform: uppercase;
        font-weight: bold;
      /*  color: #357ca5; */
    }
    .subgrophead {
        text-transform: uppercase;
        font-weight: 600;
        /* color: #222d32; */
    }
    .tablesdas { width: 40%;
    float: right;}
</style>
<script>
$( ".target" ).keyup(function() {

    var tprice = $('#tprice').val();
    var executive_discount = $('#executive_discount').val();
    var installation_charges = $('#installation_charges').val();
    var taxes = $('#taxes').val();
    var fprice = 0;
    
    if(executive_discount != '') {
        tprice = parseInt(tprice) - parseInt(executive_discount);
    } 
    
    if(installation_charges != '') {
        tprice = parseInt(tprice) + parseInt(installation_charges);
    }
    
    if(taxes != '') {
        tprice = parseInt(tprice) + parseInt(taxes);
    }
    
    if(tprice < 0 )
    {
        alert("Please Enter the Correct Amount.");
    } else {
        $('#price_val').html(tprice);
        $('#fprice').val(tprice);
    }
    
});
</script>

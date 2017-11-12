 <?php $page_links	= $this->pagination->create_links(); ?>
 <div class="box-body table-responsive" id="box-bodyss">
               
                  <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      
                      <th  class="center"><i class="fa fa-fw fa-image"></i></th>
                      <th>MODEL NAME</th>
                      <th>PRODUCT NAME</th>
                      <th>UNIT PRICE</th>
                      <th>DISCOUNT</th>
                      <th>FINAL COST</th>
                      <th>PRODUCT FINISHES</th>
                      <th class="center">QTY</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                     $i=1; 
                    if(!empty($quotation)) { foreach($quotation as $quttn) {
                    $finishs = $this->Quotation_model->get_finishs_product_list($quttn['id']); 
                    ?>
                    
                    <tr>
                      <td>
                      <?php if(!empty($quttn['image'])) { ?>
                      <img src="<?php echo base_url('uploads/images/full/'.$quttn['image']); ?>" alt="<?php echo $quttn['name'].' - Image'; ?>" style="width: 120px;height: 120px;" >
                      <?php } else { ?>
                      <img src="<?php echo base_url('assets/img/No_photo.png'); ?>" alt="<?php echo $quttn['name'].' - Image'; ?>" >
                      <?php } ?>
                      </td>
                      <td class="vcenter"> <?php echo $quttn['model_name']; ?></td>
                      <td class="vcenter"> <?php echo $quttn['name']; ?></td>
                      <td class="vcenter"> <?php echo $quttn['price']; ?></td>
                      <td class="vcenter"> <?php echo $quttn['discount']; ?></td>
                      <td class="vcenter"> <?php echo ($quttn['price'] - $quttn['discount']); ?></td>
                      <td class="vcenter"> 
                            <div class="dataTables_length" id="example1_length">
                            <select name="example1_length" aria-controls="example1" class="form-control input-sm head_lenth controlss" id="finish<?php echo $quttn['id']; ?>">
                                <option value="" selected="">SELECT FINISH ..</option>
                                <?php if(!empty($finishs)) { foreach($finishs as $list) { ?>
                                    <option value="<?php echo $list['fid']; ?>">
                                        <?php echo $list['name']; ?>
                                    </option>
                                <?php } } ?>
                            </select>
                            </div>
                            <em id="finish-error<?php echo $quttn['id']; ?>" class="error" style="display:none;">The Finish field is required.</em>
                      </td>
                      <td class="center vcenter" style="width: 85px;">
                      <div class="input-group" style="width: 85px;">
                          <input type="text" name="message" class="form-control" value="1" name="qty" id="qty<?php echo $quttn['id']; ?>">
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-flat add_product" value="<?php echo $quttn['id']; ?>"><i class="fa fa-fw fa-plus"></i></button>
                          </span>
                        </div>
                        <em id="qty-error<?php echo $quttn['id']; ?>" class="error" style="display:none;">The Qty field is required.</em>
                      </td>
                    </tr>
                    
                    <?php $i++; } } else { ?>
                    <tr>
                        <td  class="center" colspan="7">Empty</td>
                    </tr>
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
        
        $( ".add_product" ).click(function() {
        
            var id = $(this).val();
            var qty = $('#qty'+id).val();
            var finish = $('#finish'+id).val();
            var group = $('#sel_group').val();

            if(group != '')
            {
                if(finish != '' && qty != '')
                {
                    $('.overlayss').show();
                    $('#qty-error'+id).hide();
                    $('#finish-error'+id).hide();

                    $.post('<?php echo base_url("admin/quotation/quotation_product");?>', {
                        id: id, qty: qty, finish: finish, group: group
                    }, function (data) {
                        $(".tree").html(data);
                        $('.overlayss').hide();
                    });

                } else if(finish == '' && qty == '') {
                    $('#finish-error'+id).show();
                    $('#qty-error'+id).show();
                } else if(finish == '') {
                    $('#finish-error'+id).show();
                    $('#qty-error'+id).hide();
                } else if(qty == '') {
                    $('#qty-error'+id).show();
                    $('#finish-error'+id).hide();
                }
            } else {
                alert('Please Select Group First.');
            }

        });
    });
</script>
<style>
.error {
    font-size: 0.750em;
    color: #ff0000;
    text-transform: none;
    line-height: 1.2em;
}
</style>

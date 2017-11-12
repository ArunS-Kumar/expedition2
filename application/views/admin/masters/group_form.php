    <!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>assets/admin-template/plugins/iCheck/icheck.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container" style="width: 100%">
          <!-- Content Header (Page header) -->
          <section class="content-header">
          </section>

          <!-- Main content -->
          
          <section class="content">
          <div class="row">
            <div class="col-xs-12">
             
             <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"> <i class="fa fa-fw fa-plus"></i> Group</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('admin/group/form/'.$id);?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="cont_enquiry">
                  <div class="box-body">
                  
                    <div class="col-xs-11">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="<?php if(!empty($name)) echo $name; ?>">
                         <?php echo form_error('name','<span class="error">','</span>'); ?>    
                    </div>
                    </br>
                    <div class="col-xs-11">
                    <textarea class="form-control" rows="3" placeholder="Description" name="description"><?php if($description) echo $description; ?></textarea>
                         <?php echo form_error('description','<span class="error">','</span>'); ?>  
                    </div></br>
                    <div class="col-xs-11">
                     <label>
                        <input type="checkbox" class="flat-red" name="enabled" value="1" <?php if($enabled==1 ) echo 'checked'; ?>>&nbsp;&nbsp; Active </label>
                    </div>
                    
                    
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                  <?php if(!empty($id)) { ?>
                    <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>&nbsp;Update</button>
                  <?php } else { ?>
                    <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>&nbsp;Save</button>
                  <?php } ?>
                   <button type="reset" class="btn btn-info btn-danger"><i class="fa fa-fw fa-repeat"></i>&nbsp;Reset</button> 
                  </div><!-- /.box-footer -->
                </form>
              </div>
                         
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->  
      
      <style>
        .col-xs-11 { float:none;}
      </style>
    <script type="text/javascript">
    
    
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    
</script>

       <script type="text/javascript">
jQuery(function() { 

    jQuery.validator.addMethod("mobilevalue", function(value, element) {
        return this.optional(element) || value.match(/^[6-9][0-9]{9}$/);
    }, "This Field should contain valid number.");

    jQuery.validator.addMethod("alpha", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
    }, "The This field must contain only letters.");

        
    $("#cont_enquiry").validate({ 
        rules: { 
            name: {
                required: true,
                alpha : true,
                minlength:3,
                maxlength:25
            },

            description: {
                minlength:3,
                maxlength:300
            }
            
        },
        
        messages: {
            name: {
                required: "The Name field is required.",
                minlength:"The Name at least 3 characters.",
                alpha : "The Name must contain only letters.",
                maxlength:"The Name field can not exceed 25 characters in length."
            },

            description: {
                minlength:"The Description at least 3 characters",
                maxlength:"The Description field can not exceed 300 characters in length."
            }
            
        },
        errorElement: "em"
        
    });
    
 //   
});
            
</script>
<style>

.error {
  font-size: 0.750em;
  color: #ff0000;
  text-transform: none;
  line-height: 1.2em; }
 </style>
             


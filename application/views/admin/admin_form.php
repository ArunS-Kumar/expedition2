<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-template/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>assets/admin-template/plugins/iCheck/icheck.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/admin-template/plugins/select2/select2.full.min.js"></script>

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
                  <h3 class="box-title"> <i class="fa fa-fw fa-plus"></i> User</h3>
                </div><!-- /.box-header -->
                
               <?php $attributes = array('id' => 'cont_enquiry'); echo form_open($this->config->item('admin_folder').'/admin/form/'.$id,$attributes); ?>
                <div class="box-body box-bodyss">
                    <div class="form-group form-groupsss">
                        <input type="text" name="firstname" value="<?php echo set_value('firstname',$firstname); ?>" class="form-control" id="exampleInputEmail1" placeholder="Name" >
                    </div>
                    
                 <div class="form-group form-groupsss">
                        <!-- <label for="exampleInputEmail1">Lastname </label> -->
                        <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" id="exampleInputEmail1" placeholder="Name" >
                    </div> 
                
				 <div class="form-group form-groupsss">
                        <input type="text" name="username" value="<?php echo set_value('username',$username); ?>" class="form-control" id="exampleInputEmail1" placeholder="Username" >
                    </div>
                    
                     <div class="form-group form-groupsss">
                        <input type="text" name="email" value="<?php echo set_value('email',$email); ?>" class="form-control" id="exampleInputEmail1" placeholder="Email" >
                    </div>
                    
                      
                    <div class="form-group form-groupsss">
                        <select class="form-control" name="access"  required>
                        
                        <?php if(!empty($roles_list)) { foreach($roles_list as $list) { ?>
                        <option value="<?php echo $list['id']; ?>" <?php if(!empty($access) && $list['id'] == $access) echo 'selected'; ?> ><?php echo $list['name']; ?></option>
                        <?php } } ?>
                        </select>
                    </div>
                    
                    <div class="form-group form-groupsss">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                    </div>
                    
                     <div class="form-group form-groupsss">
                        <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Confirm Password" >
                    </div>
                   
                     <div class="form-group form-groupsss enabled">
                    <input type="checkbox" class="flat-red" name="enabled" value="1" <?php if($enabled==1 ) echo 'checked'; ?>>&nbsp;&nbsp; Active </label> </div>
                    
                </div><!-- /.box-body -->
                <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>&nbsp;Submit</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-fw fa-undo"></i>&nbsp;Reset</button>
            </div>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
            
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
jQuery(function() { 

     $(".select2").select2();
     
    jQuery.validator.addMethod("mobilevalue", function(value, element) {
        return this.optional(element) || value.match(/^[6-9][0-9]{9}$/);
    }, "This Field should contain valid number.");

    jQuery.validator.addMethod("alpha", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
    }, "The This field must contain only letters.");

        
    $("#cont_enquiry").validate({ 
        rules: { 
            firstname: {
                required: true,
                alpha : true,
                minlength:3,
                maxlength:25
            },
            
            email: {
                required: true,
                email: true	
            },
            
            allowed_discount: {
                required: true,
                maxlength:3
            },
            
            username: {
                required: true,
                minlength:3,
                maxlength:25
            },
            
            designation: {
                required: true,
                minlength:3,
                maxlength:25
            },
            
            password: {
                required: true,
                minlength:3,
                maxlength:25
            },
            
            confirm: {
                required: true,
                minlength:3,
                maxlength:25,
                equalTo: "#password"
            },
            
            mail_signature: {
                minlength:3,
                maxlength:500
            }
            
        },
        
        messages: {
        
            firstname: {
                required: "The Name field is required.",
                minlength:"The Name at least 3 characters.",
                alpha : "The Name must contain only letters.",
                maxlength:"The Name field can not exceed 25 characters in length."
            },
            
            email: {
                required: "The Email Id field is required.",
                email: "The Email Id field must contain a valid email address."
            },
            
            allowed_discount: {
                required: "The Allowed Discount field is required.",
                maxlength:"The Allowed Discount field can not exceed 3 characters in length."
            },
            
            username: {
                required: "The Username field is required.",
                minlength:"The Username at least 3 characters.",
                maxlength:"The Username field can not exceed 25 characters in length."
            },
            
            designation: {
                required: "The Designation field is required.",
                minlength:"The Designation at least 3 characters.",
                maxlength:"The Designation field can not exceed 25 characters in length."
            },
            
            password: {
                required: "The Password field is required.",
                minlength:"The Password at least 3 characters.",
                maxlength:"The Password field can not exceed 25 characters in length."
            },
            
            confirm: {
                required: "The Confirm Password field is required.",
                required: "The Confirm Password does not match the Password.",
                minlength:"The Confirm Password at least 3 characters.",
                maxlength:"The Confirm Password field can not exceed 25 characters in length."
            },

            mail_signature: {
                minlength:"The Mail Signature at least 3 characters",
                maxlength:"The Mail Signature field can not exceed 500 characters in length."
            }
            
        },
        errorElement: "em"
        
    });
    
    $("select#state").change(function () {
        var state = $("select#state option:selected").attr('value');
        $.post("<?php echo base_url()?>admin/stores/load_city", {
            state: state
        }, function (data) {
            $("select#city").html(data);
        });
    });
    
});

$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
            
</script>
<style>

.error {
  font-size: 0.750em;
  color: #ff0000;
  text-transform: none;
  line-height: 1.2em; }
 </style>
             

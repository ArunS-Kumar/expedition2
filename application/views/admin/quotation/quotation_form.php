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
                                    <span class="step active">1</span>
                                    <span class="title">CLIENT DETAILS</span>
                                </li>

                                <li data-step="2">
                                    <span class="step">2</span>
                                    <span class="title">GROUP</span>
                                </li>

                                <li data-step="3">
                                    <span class="step">3</span>
                                    <span class="title">PREVIEW</span>
                                </li>

                            </ul>
                        </div>
                        <!-- /.box-header -->

                        <div id="esdfd">
                            <div class="box-body table-responsive" id="box-bodyss">
			<fieldset class="boxss">
                                <legend> CLIENT DETAILS </legend>

                                <form class="form-horizontal formss" action="<?php echo base_url('admin/quotation/form/'.$id); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="cont_enquiry">
                                    <div class="box-body">

                                        <div class="col-md-12">

                                            <div class="input-group col-xs-5 inputss">
                                                <input type="text" class="form-control" id="client_name" placeholder="Client Name *" name="client_name" value="<?php if(!empty($client_name)) echo $client_name; ?>">
                                            </div>
                                            <br>

                                            <div class="input-group col-xs-5">
                                                <input type="text" class="form-control" id="address1" placeholder="Address Line 1 *" name="address1" value="<?php if(!empty($address1)) echo $address1; ?>">
                                            </div>
                                            <br>

                                            <div class="input-group col-xs-5">
                                                <input type="text" class="form-control" id="address2" placeholder="Address Line 2" name="address2" value="<?php if(!empty($address2)) echo $address2; ?>">
                                            </div>
                                            <br>

                                            <div class="input-group col-xs-5 validss vald">
                                                <select class="form-control valid controlss" name="state" id="state" aria-invalid="false" required>
                                                    <option value="" disabled="" selected="">Select State ..</option>
                                                    <?php if(!empty($state_list)) { foreach($state_list as $list) { ?>
                                                    <option value="<?php echo $list['stateID']; ?>" <?php if(!empty($state) && $list['stateID'] == $state) echo 'selected'; ?> ><?php echo $list['stateName']; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                            
                                            <div class="input-group col-xs-5 validss valds">
                                                <select class="form-control valid controlss" name="city" id="city" aria-invalid="false" required>
                                                    <option value="" disabled="" selected="">Select City ..</option>
                                                     <?php if(!empty($city_list)) { foreach($city_list as $list) { ?>
                                                    <option value="<?php echo $list['cityID']; ?>" <?php if(!empty($state) && $list['cityID'] == $city) echo 'selected'; ?> ><?php echo $list['cityName']; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                            
                                            <div class="input-group col-xs-5 validss valds" style="margin-right:0">
                                                <select class="form-control valid controlss" name="showroom" id="showroom" aria-invalid="false" required>
                                                    <option value="" disabled="" selected="">Select Showroom ..</option>
                                                    <?php if(!empty($stores_list)) { foreach($stores_list as $list) { ?>
                                                    <option value="<?php echo $list['id']; ?>" <?php if(!empty($showroom) && $list['id'] == $showroom) echo 'selected'; ?> ><?php echo $list['name']; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                            <br>

                                            <div class="input-group col-xs-5 validss">
                                                <input type="text" class="form-control" id="email" placeholder="Email ID *" name="email" value="<?php if(!empty($email)) echo $email; ?>">
                                            </div>
                                            <br>

                                            <div class="input-group col-xs-5 validss">
                                                <input type="text" class="form-control" id="mobile" placeholder="Mobile No *" name="mobile" value="<?php if(!empty($mobile)) echo $mobile; ?>">
                                            </div>
                                            <br>

                                            <div class="input-group col-xs-5">
                                                <input type="text" class="form-control" id="quotation_sub" placeholder="Quotation Subject *" name="quotation_sub" value="<?php if(!empty($quotation_sub)) echo $quotation_sub; ?>">
                                            </div>
                                            <br>

                                            <div class="input-group col-xs-5">
                                                <textarea class="form-control valid" rows="3" id="description" placeholder="Description" name="description" aria-invalid="false"><?php if(!empty($description)) echo $description; ?></textarea>
                                            </div>
                                            <br>

                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                   
                                    <!-- /.box-footer -->
                        <div class="box-footer fotr">
                        <a href="<?php echo base_url().'admin/quotation';?>">
                        <button type="button" class="btn btn-info btn-danger esfsesxf"><i class="fa fa-fw fa-arrow-left"></i>&nbsp;Back</button></a>
                        <button type="submit" class="btn btn-success btn-next esfsesxf">Next&nbsp;<i class="fa fa-fw fa-arrow-right"></i></button>
                        </div>
                                </form>
				 </fieldset>
                            </div>
                            <!-- /.box-body -->
                        </div>

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
$("select#state").change(function () {
    var state = $("select#state option:selected").attr('value');
    $.post("<?php echo base_url()?>admin/quotation/load_city", {
        state: state
    }, function (data) {
        $("select#city").html(data);
    });
});
</script>

<!-- /.content-wrapper -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">

    jQuery(function () {

        jQuery.validator.addMethod("mobilevalue", function (value, element) {
            return this.optional(element) || value.match(/^[6-9][0-9]{9}$/);
        }, "This Field should contain valid number.");

        jQuery.validator.addMethod("alpha", function (value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
        }, "The This field must contain only letters.");


        $("#cont_enquiry").validate({
            rules: {
                client_name: {
                    required: true,
                    alpha: true,
                    minlength: 3,
                    maxlength: 25
                },

                address1: {
                    required: true,
                    minlength: 3,
                    maxlength: 300
                },

                email: {
                    required: true,
                    email: true
                },

                mobile: {
                    required: true,
                    mobilevalue: true,
                    number: true,
                    minlength: 10,
                    maxlength: 12
                },

                description: {
                    minlength: 3,
                    maxlength: 300
                },

                quotation_sub: {
                    required: true,
                    alpha: true,
                    minlength: 3,
                    maxlength: 25
                }
            },

            messages: {
                client_name: {
                    required: "The Client Name field is required.",
                    minlength: "The Client Name at least 3 characters.",
                    alpha: "The Client Name must contain only letters.",
                    maxlength: "The Client Name field can not exceed 25 characters in length."
                },

                address1: {
                    required: "The Address field is required.",
                    minlength: "The Address at least 3 characters.",
                    maxlength: "The Address field can not exceed 300 characters in length."
                },

                email: {
                    required: "The Email Id field is required.",
                    email: "The Email Id field must contain a valid email address."
                },

                mobile: {
                    required: "The Mobile Number field is required.",
                    number: "The Mobile Number field must contain only numbers.",
                    minlength: "The Mobile Number at least 10 characters",
                    maxlength: "The Mobile Number field can not exceed 12 characters in length."
                },

                description: {
                    minlength: "The Description at least 3 characters",
                    maxlength: "The Description field can not exceed 300 characters in length."
                },

                quotation_sub: {
                    required: "The Quotation Subject field is required.",
                    minlength: "The Quotation Subject at least 3 characters.",
                    alpha: "The Quotation Subject must contain only letters.",
                    maxlength: "The Quotation Subject field can not exceed 25 characters in length."
                }

            },
            errorElement: "em"

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

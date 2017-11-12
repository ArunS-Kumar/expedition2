<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.sheepItPlugin.js'); ?>"></script>
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

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> <i class="fa fa-fw fa-plus"></i> Stores</h3>
                </div>

                <!-- /.box-header -->
                <form class="" action="<?php echo base_url('admin/stores/form/'.$id);?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="cont_enquiry">
                    <div class="box-body">

                        <div class="row">
                            <div class="">
                                <div class="col-md-6">

                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name *" name="name" value="<?php if(!empty($name)) echo $name; ?>">
                                        <?php echo form_error('name','<span class="error">','</span>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Address Line 1" name="address1" value="<?php if(!empty($address1)) echo $address1; ?>">
                                        <?php echo form_error('address1','<span class="error">','</span>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Address Line 2" name="address2" value="<?php if(!empty($address2)) echo $address2; ?>">
                                        <?php echo form_error('address2','<span class="error">','</span>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <select class="form-control valid " name="state" id="state" aria-invalid="false">
                                            <option value="0" disabled selected>Select State ..</option>
                                            <?php if(!empty($state_list)) { foreach($state_list as $list) { ?>
                                            <option value="<?php echo $list['stateID']; ?>" <?php if(!empty($state) && $list['stateID'] == $state) echo 'selected'; ?> ><?php echo $list['stateName']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <?php echo form_error('state','<span class="error">','</span>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <select class="form-control valid" name="city" id="city" aria-invalid="false">
                                            <option value="0" disabled selected>Select city ..</option>
                                             <?php if(!empty($city_list)) { foreach($city_list as $list) { ?>
                                            <option value="<?php echo $list['cityID']; ?>" <?php if(!empty($city) && $list['cityID'] == $city) echo 'selected'; ?> ><?php echo $list['cityName']; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <?php echo form_error('city','<span class="error">','</span>'); ?>
                                    </div>

                                </div>
                                <!-- /.col -->


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a href="#" onclick="chage_image($(this));" title="" id="uploadFile">
                                            <?php if(!empty($image)) { ?>
                                                <img src="<?php echo base_url('uploads/images/full/'.$image); ?>" alt="Add image" width="156" height="128" id="img">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/img'); ?>/add-img.jpg" alt="Add image" width="156" height="128" id="img">
                                                    <?php } ?>
                                        </a>
                                        <p class="help-block">&nbsp;&nbsp;&nbsp;Image Size 156 * 128 px</p>
                                        <input type="file" name="image" id="asd" style="display:none;">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="col-md-6">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control " id="inputEmail3" placeholder="Latitude" name="latitude" value="<?php if(!empty($latitude)) echo $latitude; ?>">
                                    <?php echo form_error('latitude','<span class="error">','</span>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Longitude" name="longitude" value="<?php if(!empty($longitude)) echo $longitude; ?>">
                                    <?php echo form_error('longitude','<span class="error">','</span>'); ?>
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Telephone Number" name="phone" value="<?php if(!empty($phone)) echo $phone; ?>">
                                    <?php echo form_error('phone','<span class="error">','</span>'); ?>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <textarea class="form-control" rows="3" placeholder="Description" name="description"><?php if($description) echo $description; ?></textarea>
                                    <?php echo form_error('description','<span class="error">','</span>'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <!-- sheepIt Form -->
                                <div id="sheepItForm" class="form-group stje">

                                    <div class="form-group stje" id="sheepItForm_template">
                                        <label for="sheepItForm_#index#_phone" class="form-group clone_cl col-md-12">Store Manager <span id="sheepItForm_label"></span></label>
                                        <div class="form-group col-md-4 clone-f">
                                            <input id="sheepItForm_#index#_title" name="sm_title[]" type="text" class="form-control" placeholder="Store Manager - Name">
                                        </div>
                                        <div class="form-group col-md-4 clone-f">
                                            <input id="sheepItForm_#index#_email" name="sm_email[]" type="text" class="form-control" placeholder="Store Manager - Email Id">
                                        </div>
                                        <div class="form-group col-md-4 clone-f">
                                            <input id="sheepItForm_#index#_phone" name="sm_phone[]" type="text" class="form-control" placeholder="Store Manager - Phone">
                                        </div>
                                        <a href="javascript:;" id="sheepItForm_remove_current" class="removesas">
                            <img class="delete" src="<?php echo base_url('assets/img/cross.png'); ?>" width="16" height="16" border="0">
                        </a>
                                    </div>

                                    <div id="sheepItForm_noforms_template">No Store Manager</div>

                                    <div id="sheepItForm_controls" class="col-md-12">
                                        <a href="javascript:;">
                                            <div id="sheepItForm_add" class="btn btn-success btn-bud" style="width:8%;margin-bottom: 1%;"><span><i class="fa fa-fw fa-plus"></i>Add</span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <!-- sheepIt Form -->
                                <div id="sheepItForm1" class="form-group stje">

                                    <div class="form-group stje" id="sheepItForm1_template">
                                        <label for="sheepItForm1_#index#_phone" class="form-group clone_cl col-md-12">Sales Person <span id="sheepItForm1_label"></span></label>
                                        <div class="form-group col-md-4 clone-f">
                                            <input id="sheepItForm1_#index#_title" name="sp_title[]" type="text" class="form-control" placeholder="Sales Person - Name">
                                        </div>
                                        <div class="form-group col-md-4 clone-f">
                                            <input id="sheepItForm1_#index#_email" name="sp_email[]" type="text" class="form-control" placeholder="Sales Person - Email Id">
                                        </div>
                                        <div class="form-group col-md-4 clone-f">
                                            <input id="sheepItForm1_#index#_phone" name="sp_phone[]" type="text" class="form-control" placeholder="Sales Person - Phone">
                                        </div>
                                        <a href="javascript:;" id="sheepItForm1_remove_current" class="sheepItForm1_#index">
                            <img class="delete" src="<?php echo base_url('assets/img/cross.png'); ?>" width="16" height="16" border="0">
                        </a>
                                    </div>

                                    <div id="sheepItForm1_noforms_template">No Sales Person</div>

                                    <div id="sheepItForm1_controls" class="col-md-12">
                                        <a href="javascript:;">
                                            <div id="sheepItForm1_add" class="btn btn-success btn-bud" style="width:8%;margin-bottom: 1%;"><span><i class="fa fa-fw fa-plus"></i>Add</span></div>
                                        </a>
                                    </div>
                                    <br>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label>
                                        <input type="checkbox" class="flat-red" name="enabled" value="1" <?php if($enabled==1 ) echo 'checked'; ?>>&nbsp;&nbsp; Active </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->

                        <div class="box-footer">
                            <?php if(!empty($id)) { ?>
                    <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>&nbsp;Update</button>
                  <?php } else { ?>
                    <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>&nbsp;Save</button>
                  <?php } ?>
                            <button type="reset" class="btn btn-info btn-danger"><i class="fa fa-fw fa-repeat"></i>&nbsp;Reset</button>
                        </div>
                </form>
                </div>
                <!-- /.box-body -->

            </div>

        </section>
    </div>
    <!-- /.container -->
</div>
<!-- /.content-wrapper -->
<?php // echo "<pre>"; print_r($store_manager); exit; ?>
<script type="text/javascript">

    function chage_image(id) {
        $('input[type=file]').click();
    }

    $("#asd").change(function () {
        readImage(this);
    });

    function readImage(input) {
        if (input.files && input.files[0]) {
            var FR = new FileReader();
            FR.onload = function (e) {
                $('#img').attr("src", e.target.result);
                $('#img').show();
            };
            FR.readAsDataURL(input.files[0]);
        }
    }

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });
    
    $("select#state").change(function () {
        var state = $("select#state option:selected").attr('value');
        $.post("<?php echo base_url()?>admin/stores/load_city", {
            state: state
        }, function (data) {
            $("select#city").html(data);
        });
    });

    $(document).ready(function () {

        var sheepItForm = $('#sheepItForm').sheepIt({
            separator: '',
            allowRemoveCurrent: true,
            allowAdd: true,
            allowAddN: true,
            maxFormsCount: 50,
            minFormsCount: 0,
            iniFormsCount: 1,
            continuousIndex: true,
            data: [
                    <?php if(!empty($store_manager)) { foreach($store_manager as $manager) { ?>
                    {
                        'sheepItForm_#index#_title': '<?php echo $manager["name"]; ?>',
                        'sheepItForm_#index#_email': '<?php echo $manager["email"]; ?>',
                        'sheepItForm_#index#_phone': '<?php echo $manager["mobile"]; ?>',
                    },
                    <?php } } else { ?>
                    {
                        'sheepItForm_#index#_title': '',
                        'sheepItForm_#index#_email': '',
                        'sheepItForm_#index#_phone': '',
                    },
                    <?php } ?>
                ]
        });

        var sheepItForm = $('#sheepItForm1').sheepIt({
            separator: '',
            allowRemoveCurrent: true,
            allowAdd: true,
            allowAddN: true,
            maxFormsCount: 50,
            minFormsCount: 0,
            iniFormsCount: 1,
            continuousIndex: true,
            data: [
                    <?php if(!empty($store_manager)) { foreach($sales_person as $person) { ?>
                    {
                        'sheepItForm1_#index#_title': '<?php echo $person["name"]; ?>',
                        'sheepItForm1_#index#_email': '<?php echo $person["email"]; ?>',
                        'sheepItForm1_#index#_phone': '<?php echo $person["mobile"]; ?>',
                    },
                    <?php } } else { ?>
                    {
                        'sheepItForm1_#index#_title': '',
                        'sheepItForm1_#index#_email': '',
                        'sheepItForm1_#index#_phone': '',
                    },
                    <?php } ?>
                ]
        });
    });

    jQuery(function () {

        jQuery.validator.addMethod("mobilevalue", function (value, element) {
            return this.optional(element) || value.match(/^[6-9][0-9]{9}$/);
        }, "This Field should contain valid number.");

        jQuery.validator.addMethod("alpha", function (value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
        }, "The This field must contain only letters.");


        $("#cont_enquiry").validate({
            rules: {
                name: {
                    required: true,
                    alpha: true,
                    minlength: 3,
                    maxlength: 25
                },

                description: {
                    minlength: 3,
                    maxlength: 300
                },

                image: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "The Name field is required.",
                    minlength: "The Name at least 3 characters.",
                    alpha: "The Name must contain only letters.",
                    maxlength: "The Name field can not exceed 25 characters in length."
                },

                description: {
                    minlength: "The Description at least 3 characters",
                    maxlength: "The Description field can not exceed 300 characters in length."
                },

                image: {
                    required: "The image field is required"
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
    
    label.form-group.clone_cl {
        width: 100%;
    }
    
    .form-group.col-md-4.clone-f {
        width: 32%;
        float: left;
    }
    
    a.removesas {
        margin-top: 8px;
    }
    
    img.delete {
        margin-top: 16px;
    }
    
    #sheepItForm_template0 > a#sheepItForm_remove_current {
        /* display: none !important; */
    }
    
    #sheepItForm1_template0 > a#sheepItForm1_remove_current {
        /* display: none !important; */
    }
    
    .col-xs-11 {
        float: none;
    }
</style>

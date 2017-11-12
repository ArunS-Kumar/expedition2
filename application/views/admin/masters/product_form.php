<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin-template/plugins/select2/select2.min.css">
<script src="<?php echo base_url(); ?>assets/admin-template/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>

<script src="<?php echo base_url(); ?>assets/admin-template/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jQuery-custom-input-file.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.upload.js"></script>
<link type="text/css" href="<?php echo base_url()?>assets/css/jquery-ui.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url()?>assets/css/quotation.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/quotation.css">
<script type="text/javascript">
    $(document).ready(function () {
    
        $(".sortable").sortable();
        $(".sortable > span").disableSelection();

        <?php  if ($id): ?>
            var ct = $('#option_list').children().size();
            option_count = ''; <?php endif; ?>
            photos_sortable();
    });

    function add_product_image(data)
    {
	    p	= data.split('.');
	
	    var photo = '<?php add_image("'+p[0]+'", "'+p[0]+'.'+p[1]+'", '', '', '', base_url('uploads/images/thumbnails'));?>';

	    $('#gc_photos').append(photo);
	    photos_sortable();
    }

    function remove_image(img) {

        if (confirm('<?php echo "Are you sure you want to delete this image ?";?>')) {
            var id = img.attr('rel')
            $('#gc_photo_' + id).remove();
        }
    }

    function photos_sortable() {
        $('#gc_photos').sortable({
            handle: '.gc_thumbnail',
            items: '.gc_photo',
            axis: 'y',
            scroll: true
        });
    }

    function remove_option(id) {
        if (confirm('<?php echo lang('confirm_remove_option ');?>')) {
            $('#option-' + id).remove();
        }
    }

    function chage_image1(id) {

        var pid = id.attr('alt');
        //console.log(pid);
        var uploadURL = "<?php echo base_url()?>admin/product/new_image_upload?id=" + pid;
        $('a#uploadFile' + pid).file();
        $('input#uploadFile' + pid).file().choose(function (e, input) {
            $("#hide_show_gif1" + pid).show();
            input.upload(uploadURL, function (res) {
                $("#hide_show_gif1" + pid).show();
                var result = jQuery.parseJSON(res);
                if (result.status == "error") {
                    $('div#messageBox' + pid).attr("class", "error");
                    $('div#messageBox' + pid).html(result.file);
                } else {
                    $('div#messageBox' + pid).removeClass("error");
                    $('div#messageBox' + pid).html('');
                    $('img#profileImage' + pid).attr("src", "<?php echo base_url()?>uploads/images/small/" + result.file);
                    $('input#profileImageFile' + pid).val(result.file);
                    $(this).remove();
                    $("#hide_show_gif1" + pid).hide();
                }
            }, '');
        });
    }
</script>
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
                    <h3 class="box-title"> <i class="fa fa-fw fa-plus"></i> Product</h3>
                </div>

                <!-- /.box-header -->
                <form class="" action="<?php echo base_url('admin/product/form/'.$id);?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" id="cont_enquiry">
                    <div class="box-body">

                        <div class="row">
                            <div class="">
                                <div class="col-md-12">

                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Product ID *" name="product_id" value="<?php if(!empty($product_id)) echo $product_id; ?>">
                                        <?php echo form_error('name','<span class="error">','</span>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Product Name *" name="name" value="<?php if(!empty($name)) echo $name; ?>">
                                        <?php echo form_error('name','<span class="error">','</span>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Model Name *" name="model_name" value="<?php if(!empty($model_name)) echo $model_name; ?>">
                                        <?php echo form_error('address2','<span class="error">','</span>'); ?>
                                    </div>

                                </div>

                                <div class="col-md-8">

                                    <div class="form-group col-md-6">
                                        <select class="form-control valid controlss" name="brand" id="brand" aria-invalid="false">
                                            <option value="0" disabled selected>Select Brand ..</option>
                                            <?php if(!empty($brand_list)) { foreach($brand_list as $list) { ?>
                                                <option value="<?php echo $list['id']; ?>" <?php if(!empty($brand) && $list['id']==$brand) echo 'selected'; ?> >
                                                    <?php echo $list['name']; ?>
                                                </option>
                                                <?php } } ?>
                                        </select>
                                        <?php echo form_error('city','<span class="error">','</span>'); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <select class="form-control valid controlss" name="series" id="series" aria-invalid="false">
                                            <option value="0" disabled selected>Select Series ..</option>
                                            <?php if(!empty($series_list)) { foreach($series_list as $list) { ?>
                                                <option value="<?php echo $list['id']; ?>" <?php if(!empty($series) && $list['id']==$series) echo 'selected'; ?> >
                                                    <?php echo $list['name']; ?>
                                                </option>
                                                <?php } } ?>
                                        </select>
                                        <?php echo form_error('city','<span class="error">','</span>'); ?>
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Unit Price" name="price" value="<?php if(!empty($price)) echo $price; ?>">
                                        <?php echo form_error('address1','<span class="error">','</span>'); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Unit Discount" name="discount" value="<?php if(!empty($discount)) echo $discount; ?>">
                                        <?php echo form_error('address1','<span class="error">','</span>'); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                    <select class="form-control select2 controlss" multiple="multiple" data-placeholder="Select Application .." name="application[]" id="application">
                                     <?php if(!empty($application_list)) { foreach($application_list as $list) { ?>
                                     <option value="<?php echo $list['id']; ?>" <?php if(!empty($application)) { if( in_array($list['id'], $application, true)){ echo 'selected'; } } ?> >  <?php echo $list['name']; ?>
                                                </option>
                                     <?php } } ?>
                                    </select>
                                        <?php echo form_error('application','<span class="error">','</span>'); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                    
                                     <select class="form-control select2 controlss" multiple="multiple" data-placeholder="Select Finish .." name="finish[]" id="finish">
                                     <?php if(!empty($finish_list)) { foreach($finish_list as $list) { ?>
                                     <option value="<?php echo $list['id']; ?>" <?php if(!empty($finish)) { if( in_array($list['id'], $finish, true)){ echo 'selected'; } } ?> >  <?php echo $list['name']; ?>
                                                </option>
                                     <?php } } ?>
                                    </select>
                                    
                                    <?php echo form_error('finish','<span class="error">','</span>'); ?>
                                    </div>
                                    
                                    <div class="form-group col-md-6">

                                        <textarea class="form-control" rows="3" placeholder="Description" name="description"><?php if($description) echo $description; ?></textarea>
                                        <?php echo form_error('description','<span class="error">','</span>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">

                                        <textarea class="form-control" rows="3" placeholder="QUOTATION Description" name="quotation_description"><?php if($quotation_description) echo $quotation_description; ?></textarea>
                                        <?php echo form_error('description','<span class="error">','</span>'); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-4" style=" padding-left : 2px;">

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

                                </div>

                            </div>
                            <div class="col-md-8">
                                
                                 <div id="clonefun_otp" class="form-group stje">
                                        <?php if(!empty($category)) { foreach($category as $catgy) { ?>
                                        <div class="form-group stje rule rule0" id="clonefun">

                                        <div class="form-group col-md-5 clone-f">
                                        <select class="form-control valid category controlss" name="category[]" id="category" aria-invalid="false">
                                        <option value="0" disabled selected>Select CATEGORY ..</option>
                                        <?php if(!empty($category_list)) { foreach($category_list as $list) { if($list['parent_id'] == 0) { ?>
                                            <option value="<?php echo $list['id']; ?>" <?php if(!empty($catgy) && $list['id']==$catgy['cid']) echo 'selected'; ?> >
                                                <?php echo $list['name']; ?>
                                            </option>
                                        <?php } } } ?>
                                        </select>
                                        </div>
                                            <div class="form-group col-md-5 clone-f">
                                               <select class="form-control valid subcategory controlss" name="subcategory[]" id="subcategory" aria-invalid="false">
                                                <option value="0" disabled selected>Select SUB CATEGORY ..</option>
                                                 <?php if(!empty($category_list)) { foreach($category_list as $list) { if($list['parent_id'] <> 0 && $list['parent_id'] == $catgy['cid']) { ?>
                                            <option value="<?php echo $list['id']; ?>" <?php if(!empty($catgy) && $list['id']==$catgy['mid']) echo 'selected'; ?> >
                                                <?php echo $list['name']; ?>
                                            </option>
                                        <?php } } } ?>
                                            </select>
                                            </div>

                                            <a href="#removeRow" class="removeVarRow">
                                          <img class="delete" src="<?php echo base_url('assets/img/cross.png'); ?>" width="16" height="16" border="0">
                                        </a>
                                        </div>
                                        <?php } } else { ?>
                                        <div class="form-group stje rule rule0" id="clonefun">

                                        <div class="form-group col-md-5 clone-f">
                                        <select class="form-control valid category controlss" name="category[]" id="category" aria-invalid="false">
                                        <option value="0" disabled selected>Select CATEGORY ..</option>
                                        <?php if(!empty($category_list)) { foreach($category_list as $list) { if($list['parent_id'] == 0) { ?>
                                            <option value="<?php echo $list['id']; ?>" <?php if(!empty($catgy) && $list['id']==$catgy['cid']) echo 'selected'; ?> >
                                                <?php echo $list['name']; ?>
                                            </option>
                                        <?php } } } ?>
                                        </select>
                                        </div>
                                            <div class="form-group col-md-5 clone-f">
                                               <select class="form-control valid subcategory controlss" name="subcategory[]" id="subcategory" aria-invalid="false">
                                                <option value="0" disabled selected>Select SUB CATEGORY ..</option>
                                                 
                                            </select>
                                            </div>

                                            <a href="#removeRow" class="removeVarRow">
                                          <img class="delete" src="<?php echo base_url('assets/img/cross.png'); ?>" width="16" height="16" border="0">
                                        </a>
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12" id="cloneabove">
                                            <a href="javascript:;" id="addVarRow">
                                                <div id="" class="btn btn-success btn-bud" style="width:68px;margin-bottom: 1%;"><span><i class="fa fa-fw fa-plus"></i>Add</span></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-8">
                                
                                 <div id="clonefun_otp" class="form-group stje">
                                        <?php if($id) { foreach($specification as $spef ) { ?>
                                        <div class="form-group stje rule rule0" id="clonefun1">

                                            <div class="form-group col-md-5 clone-f">
                                            <select class="form-control valid controlss" name="specification[]" id="specification" aria-invalid="false">
                                            <option value="0" disabled selected>Select SPECIFICATION ..</option>
                                            <?php if(!empty($specification_list)) { foreach($specification_list as $list) { ?>
                                                <option value="<?php echo $list['id']; ?>"  <?php if(!empty($spef) && $list['id']==$spef['cid']) echo 'selected'; ?>>
                                                    <?php echo $list['name']; ?>
                                                </option>
                                                <?php } } ?>
                                             </select>
                                            </div>
                                            
                                            <div class="form-group col-md-5 clone-f">
                                                <input id="" name="specification_value[]" type="text" class="form-control" placeholder="ENTER VALUE" value="<?php echo $spef['value']; ?>">
                                            </div>

                                          <a href="#removeRow" class="removeVarRow1">
                                          <img class="delete" src="<?php echo base_url('assets/img/cross.png'); ?>" width="16" height="16" border="0">
                                          </a>
                                        </div>
                                        <?php } } else { ?>
                                        <div class="form-group stje rule rule0" id="clonefun1">

                                            <div class="form-group col-md-5 clone-f">
                                            <select class="form-control valid controlss" name="specification[]" id="specification" aria-invalid="false">
                                            <option value="0" disabled selected>Select SPECIFICATION ..</option>
                                            <?php if(!empty($specification_list)) { foreach($specification_list as $list) { ?>
                                                <option value="<?php echo $list['id']; ?>">
                                                    <?php echo $list['name']; ?>
                                                </option>
                                                <?php } } ?>
                                             </select>
                                            </div>
                                            
                                            <div class="form-group col-md-5 clone-f">
                                                <input id="" name="specification_value[]" type="text" class="form-control" placeholder="ENTER VALUE" value="">
                                            </div>

                                          <a href="#removeRow" class="removeVarRow1">
                                          <img class="delete" src="<?php echo base_url('assets/img/cross.png'); ?>" width="16" height="16" border="0">
                                          </a>
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12" id="cloneabove1">
                                            <a href="javascript:;" id="addVarRow1">
                                                <div id="" class="btn btn-success btn-bud" style="width:68px;margin-bottom: 1%;"><span><i class="fa fa-fw fa-plus"></i>Add</span></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                        <div class="col-md-12">
                        <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label for="name">
                                <?php echo "Product Image (1118 * 413 px)";?>
                            </label>
                            <div class="">
                                <iframe id="iframe_uploader" src="<?php echo site_url($this->config->item('admin_folder').'/product/product_image_form');?>" class="span8" style="height:75px; border:0px;width:99%;"></iframe>
                            </div>
                            <div class="">
                                <div class="span8">
                                    <div id="gc_photos">

                                        <?php
                                        foreach($product_image as $photo_id=>$photo_obj)
                                        {
                                            if(!empty($photo_obj))
                                            {
                                                $photo = (array)$photo_obj;
                                                add_image($photo_id, $photo['filename'], $photo['alt']=false);
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<?php function add_image($photo_id, $filename, $alt ) { ob_start(); ?>
<div class="row gc_photo" id="gc_photo_<?php echo $photo_id;?>">

    <div class="span2">
        <input type="hidden" id="profileImageFile<?php echo $photo_id;?>" name="product_image[<?php echo $photo_id;?>][filename]" value="<?php echo $filename;?>" />

        <img class="gc_thumbnail" src="<?php echo base_url('uploads/images/thumbnails/'.$filename);?>" id="profileImage<?php echo $photo_id; ?>" style="float: left;margin-right: 2%;margin-left: 3%;width: 290px;height: 182px;" />
        <img src="<?php echo base_url()?>assets/img/loding-icon.gif" id="hide_show_gif1<?php echo $photo_id; ?>" style=" display:none; margin-left: 5%; width: 150px; height: 110px; " />
        <div id="messageBox<?php echo $photo_id; ?>"></div>
    </div>
    <div class="span6" style="margin-bottom: 3%;">
        <div class="row">
          
            
            </br>
            </br>
            <div class="span2">

                <a onclick="return remove_image($(this));" rel="<?php echo $photo_id;?>" class="btn btn-danger" style="float:left;"><i class="icon-trash icon-white"></i> <?php echo "Remove";?></a>

                <a onclick="chage_image1($(this));" id="uploadFile<?php echo $photo_id; ?>" alt="<?php echo $photo_id; ?>" title="Upload" class="btn btn-block btn-info but-sty but-dass" style="width: 200px;margin-left: 36%;display:none;">Double click to Update Image</a>
            </div>

        </div>
    </div>
</div>

   <?php
	$stuff = ob_get_contents();
	ob_end_clean();
	echo replace_newline($stuff);
}

function replace_newline($string) {
    return trim((string)str_replace(array("\r", "\r\n", "\n", "\t"), ' ', $string));
} ?>


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
            $.post("<?php echo base_url()?>admin/product/load_city", {
                state: state
            }, function (data) {
                $("select#city").html(data);
            });
        });

        // Clone Functions //
        (function ($) {
            $.fn.addVarRow = function () {
                return this.each(function () {
                    $(this).on('click', function (e) {
                        e.preventDefault();
                        var $target = $('#clonefun'),
                            $newRow = $target.clone(false).find('#category').prop('selectedIndex',0).end().find('#subcategory').prop('selectedIndex',0).end();

                        $('#cloneabove').before($newRow);

                        /* add a click handler to the newly created element */
                        $newRow.find('.removeVarRow').on('click', function (e) {
                            e.preventDefault();
                            $(this).closest('#clonefun').remove();
                        });
                        
                            $newRow.find('.category').on('click', function (e) {
                                //console.log($(this))
                                var state = $(this).val();
                                var subinst = $('.subcategory', $(this).parent().parent());
                                $.post("<?php echo base_url(); ?>admin/product/load_subcategory", {
                                state: state
                                }, function (data) {
                                    e.preventDefault();
                                    //console.log(subinst);
                                    $(subinst).html(data);
                                });
                                
                            });
                    });
                });
            };
            
            $.fn.addVarRow1 = function () {
                return this.each(function () {
                    $(this).on('click', function (e) {
                        e.preventDefault();
                        var $target = $('#clonefun1'),
                            $newRow = $target.clone(false).find('#specification').prop('selectedIndex',0).end().find("input:text").val('').end();

                        $('#cloneabove1').before($newRow);
                        /* add a click handler to the newly created element */
                        $newRow.find('.removeVarRow1').on('click', function (e) {
                            e.preventDefault();
                            $(this).closest('#clonefun1').remove();
                        });
                    });
                });
            };

        })(jQuery);

        jQuery(document).ready(function ($) {
        
            $(".select2").select2();
            
            $('#addVarRow').addVarRow();

            $(".removeVarRow").click(function (e) {
                e.preventDefault();
                $(this).closest('#clonefun').remove();
            });
            
            $('#addVarRow1').addVarRow1();

            $(".removeVarRow1").click(function (e) {
                e.preventDefault();
                $(this).closest('#clonefun1').remove();
            });
            
            $("select#category").change(function () {
                var subinst = $('.subcategory', $(this).parent().parent());
                //console.log(subinst)
                var state = $("select#category option:selected").attr('value');
                $.post("<?php echo base_url(); ?>admin/product/load_subcategory", {
                    state: state
                }, function (data) {
                    $(subinst).html(data);
                });
                //console.log($(this));
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
            margin-top: 6px;
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
        span.select2.select2-container.select2-container--default {
    width: 100% !important;
}
    </style>

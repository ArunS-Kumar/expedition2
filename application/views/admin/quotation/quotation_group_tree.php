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
<script>

   $(document).ready(function(){

    // main node open and collapse //
    $("li.groupmenu>label.labimag").on('click', function () {
        $(".adds").removeClass("selected");
        $('.tree-branch', $(this).parent()).slideDown();
        $('.tree-branch', $(this).parent().siblings()).slideUp();
        $(".selected").removeClass("selected");
        $(this).addClass('selected');
        $(".selected").removeClass("selected");
        $('.tree-branchs', $(this).parent()).hide();
    });

    // sub node open and collapse //
    $("li.groupmenu>label.labig").on('click', function () {
        $(".adds").removeClass("selected");
        $('.tree-branchs', $(this).parent()).slideDown();
        $('.tree-branchs', $(this).parent().siblings()).slideUp();
        $(".selected").removeClass("selected");
        $(this).addClass('selected');
    });
    
    // expand all //
    $("#expand_all").click(function () {      
        $(".adds").addClass("selected");    
    });
    
    // collapse all //
    $("#collapse_all").click(function () {      
        $(".adds").removeClass("selected");    
    });
        
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
            $(".makesel-"+result[0]).addClass("selected");
            $(".makesels-"+maksel).addClass("selected");
            $('.overlayss').hide();
        });

        return false;
    })
    
});
</script>

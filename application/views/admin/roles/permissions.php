      <script src="<?php echo base_url(); ?>assets/admin-template/plugins/iCheck/icheck.min.js"></script> 
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
                <div class="box-body">
                    <?php 
                    $section = array('destination'=>'Master Destination',
                                    'style'=>'Master Style',
                                    // 'application'=>'Master Application',
                                    'type'=>'Master Type',
                                    // 'activities'=>'Master Activities',
                                    'tours'=>'Tours',
                                    'admin'=>'Users',
                                    'roles'=>'Roles',
                                    'permissions'=>'Permissions',
                                    );
                    ?>
                    <form action="<?php echo base_url('admin/permissions/save_permissions')?>" method="POST">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="alg-cnt" style="text-transform: uppercase;">Sections</th>
                        <?php foreach($roles as $role) echo '<th class="alg-cnt" style="text-transform: uppercase;">'.$role->name.'</th>';?>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach($section as $key=>$val) { ?>
                    <tr>
                        <td ><?php echo $val; ?></td>
                        
                        <?php foreach($roles as $role) { 
                        $check = $this->Roles_model->check_perm($key,$role->id);
if($check)
echo '<td align="center"><input type="checkbox" class="flat-red"  checked name="rid['.$key.']['.$role->id.']" value="1"></td>';
else
echo '<td align="center"><input type="checkbox" class="flat-red"  name="rid['.$key.']['.$role->id.']" value="1"></td>'; } ?>
                    </tr>
                    <?php } ?>
                        <tr><td colspan="<?php echo count($roles)+1;?>" align="center">
                        <button type="submit" class="btn btn-success" style="float: right;">
                        <i class="fa fa-fw fa-save"></i>&nbsp;Update</button></td></tr>
                    </tbody>
                  </table>
                       
                    </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
 </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
         </div><!-- /.container -->
      </div><!-- /.content-wrapper -->  
</div>
  <script type="text/javascript">
    
    
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    
</script>

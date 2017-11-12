<?php include('common/header.php'); ?>

  <div class="login-box-body" style="background-color: #999;">
   <!--     <p class="login-box-msg">Sign in to start your session</p> -->
    <?php echo form_open($this->config->item('admin_folder').'/login') ?>
          <div class="form-group has-feedback">
            <?php echo form_input(array('name'=>'username', 'class'=>'form-control','placeholder'=>'Email')); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
                    <?php echo form_password(array('name'=>'password', 'class'=>'form-control','placeholder'=>'Password')); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row" style="width: 110%;">
            <div class="col-xs-8">    

            </div><!-- /.col --> 
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-fw fa-sign-in"></i>&nbsp;Sign In</button>
            </div><!-- /.col -->
          </div>
          <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
        <input type="hidden" value="submitted" name="submitted"/>
        </form>

        
      </div><!-- /.login-box-body  -->
    </div><!-- /.login-box -->

<?php include('common/footer.php'); ?>
 <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
<style>
body {background-image: url("../bg.jpg");   /* background-size: cover;*/}
    .login-logo { margin-bottom: 0px; !important;}
    .login-box {
    box-shadow: 5px 5px 14px 3px #777;
    /* background: #fff; */
}
.alert {
  margin-bottom: 0;
}
    /* .login-box { box-shadow: 5px 5px 14px 3px #999;  background: #fff;} */
</style>

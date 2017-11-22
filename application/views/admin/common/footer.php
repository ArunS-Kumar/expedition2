   <?php if($this->auth->is_logged_in(false, false)) { ?>
 <footer class="main-footer">
        <div class="container">
          <div class="ineuis">
          <strong>Powered by  <a href="http://www.dnm.in" target="_blank">Taarruni Design Solutions</a></strong> </div>
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/admin-template/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/admin-template/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css'); ?>/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo base_url('assets/js'); ?>/jquery.fancybox.pack.js?v=2.1.5"></script>

    <?php } ?>
  </body>
</html>

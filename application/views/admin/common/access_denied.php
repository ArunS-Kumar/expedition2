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
             <div class="access-deni">
                <div class="denied"> <img src="<?php echo base_url();?>assets/img/access-denied.png" alt="Access Denied"> </div>
                <div> <h2 class="access-msg">Sorry, you not have enough permission to access this page</h2> </div>
                </div>
              </div><!-- /.box -->

              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->  
      
<style>
.denied{width:30%;max-width:400px;margin:6% auto;}
.denied img{width:100%;height:auto;}
.access-msg{color:#c90606;font-size:2.8rem;text-align:center;padding-bottom:4%;}
</style>

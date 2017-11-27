<?php //echo "<pre>"; print_r($this->session->userdata('admin')['access']); exit; ?>
<ol class="breadcrumb">
            <?php if($this->session->userdata('admin')['access'] == 1 || $this->session->userdata('admin')['access'] == 2) { ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                  <i class="fa fa-fw fa-dashboard"></i>Masters <span class="caret"></span>
                </a>
                
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/destination'); ?>"><i class="fa fa-fw fa-black-tie"></i>Destination</a></li>
                    <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/style'); ?>"><i class="fa fa-fw fa-creative-commons"></i>Style</a></li>
                    <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/type'); ?>"><i class="fa fa-fw fa-object-group"></i>Types</a></li>
                    <!-- <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/'); ?>"><i class="fa fa-fw fa-object-ungroup"></i>Others</a></li> -->
                    
                    <!-- <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/application'); ?>"><i class="fa fa-fw fa-archive"></i>Application</a></li> -->
                    
                  <!--  <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/labels'); ?>">Labels based on category</a></li>  -->
                    
                 <!--   <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/product_finishes'); ?>">Product Finishes</a></li> -->
                   <!--  <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/stores'); ?>"><i class="fa fa-fw fa-industry"></i>Stores</a></li>
                     <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/finish'); ?>"><i class="fa fa-fw fa-cube"></i>Finish</a></li>
                      <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/specification'); ?>"><i class="fa fa-fw fa-television"></i>Specification</a></li>
                       <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/series'); ?>"><i class="fa fa-fw fa-automobile"></i>Series</a></li>
			<li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/client'); ?>"><i class="fa fa-fw fa-contao"></i>Client</a></li>
			<li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/city'); ?>"><i class="fa fa-fw fa-bus"></i>Cities</a></li> -->
                </ul>
            </li>
            
            <?php } if($this->session->userdata('admin')['access'] == 1 || $this->session->userdata('admin')['access'] == 2 || $this->session->userdata('admin')['access'] == 3) { ?>
            <li class="active"><a href="<?php echo site_url($this->config->item('admin_folder').'/tour'); ?>"><i class="fa fa-fw fa-file-pdf-o"></i>Tours</a></li>
            <?php } if($this->session->userdata('admin')['access'] == 1 ) { ?>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                  <i class="fa fa-fw fa-font"></i>Administrators <span class="caret"></span>
                </a>
                 
            <ul class="dropdown-menu">
            <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/admin'); ?>"><i class="fa fa-fw fa-user"></i> Users</a></li>
            <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/roles'); ?>"><i class="fa fa-fw fa-clipboard"></i> Roles</a></li>
            <li role="presentation"><a role="menuitem" href="<?php echo site_url($this->config->item('admin_folder').'/permissions'); ?>"> <i class="fa fa-fw fa-wrench"></i>Permissions</a></li>
            </ul>
            
            </li>
              <?php } ?>
</ol>
<style>
.dropdown-menu li > a {
       padding-left: 8px;
}
</style>

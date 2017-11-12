<?php

class Permissions extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->check_access_permission();
		$this->load->helper('date');
		$this->load->model('Roles_model');
		$this->lang->load('dashboard');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('text');
       // $this->load->helper('omni_helper');
	}
	
	function index()
	{
	    //$check = $this->auth->check_access_permission();
       // if($check){
        $data['roles'] = $this->Roles_model->get_result_active();
        $data['permissions'] = $this->Roles_model->get_result('permissions');
		$data['page_title']	=  'Roles & Permissions';
		$this->view($this->config->item('admin_folder').'/roles/permissions', $data);
            //}else
      //  {
      //      $data['page_title']	=  'Access Denied';
      //      $this->view($this->config->item('admin_folder').'/access_denied', $data);
      //  }
	}
    function save_permissions()
    { $role = $this->session->userdata('admin');
     $role_id = $role['access'];
        foreach($_POST['rid'] as $key=>$val)
        {
            foreach($val as $keys=>$val)
            {
                $save['section'] = $key;
                $save['role_id']  = $keys;
                $save['updated_by']  = $role_id;
                $sav[] = $save;
            }
            
        }//echo '<pre>'; print_r(array_values($sav));exit;
        $this->Roles_model->save_batch($sav); 
        redirect('admin/permissions');
    }
}

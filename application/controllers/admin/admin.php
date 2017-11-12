<?php
class Admin extends Admin_Controller
{
	//these are used when editing, adding or deleting an admin
	var $admin_id		= false;
	var $current_admin	= false;
	function __construct()
	{
		parent::__construct();
		$this->auth->check_access_permission();
		
		//load the admin language file in
		$this->lang->load('admin');
		$this->load->model('Stores_model');
		$this->current_admin	= $this->session->userdata('admin');
	}

	function index()
	{
		$data['page_title']	= lang('admins');
		$data['admins']		= $this->auth->get_admin_list();
        
        if(!empty($_POST) && $_POST['id'] == 'ajaxloaded') {
		   $this->view_ajax($this->config->item('admin_folder').'/admins_ajax', $data);
		}else {
		    $this->view($this->config->item('admin_folder').'/admins', $data);
		}
	}
	function delete($id)
	{
		//even though the link isn't displayed for an admin to delete themselves, if they try, this should stop them.
		if ($this->current_admin['id'] == $id)
		{
			$this->session->set_flashdata('message', lang('error_self_delete'));
			redirect($this->config->item('admin_folder').'/admin');	
		}
		
		//delete the user
		$this->auth->delete($id);
		$this->session->set_flashdata('message', lang('message_user_deleted'));
		redirect($this->config->item('admin_folder').'/admin');
	}
	function form($id = false)
	{	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$data['page_title']		= lang('admin_form');
		
		$data['id']		                = '';
		$data['firstname']	            = '';
		//$data['lastname']	            = '';
		$data['email']		            = '';
		$data['username']	            = '';
		$data['access']		            = '';
		
		$data['state']		            = '';
		$data['city']		            = '';
		$data['employee_code']		    = '';
		$data['designation']		    = '';
		$data['allowed_discount']		= '';
		$data['mail_signature']		    = '';
		$data['showroom']		        = array();
		$data['enabled']		        = '';
		
		$data['state_list']             = $this->Stores_model->get_state_list();
		// $data['stores_list']            = $this->Stores_model->get_stores_list();
		$data['roles_list']             = $this->Stores_model->get_roles_list();
		
		if ($id)
		{	
			$this->admin_id		= $id;
			$admin			= $this->auth->get_admin($id);

			if (!$admin)
			{
				$this->session->set_flashdata('message', lang('admin_not_found'));
				redirect($this->config->item('admin_folder').'/admin');
			}

			$data['id']			        = $admin->id;
			$data['firstname']	        = $admin->firstname;
			//$data['lastname']	        = $admin->lastname;
			$data['email']		        = $admin->email;
			$data['username']	        = $admin->username;
			$data['access']		        = $admin->access;
			$data['enabled']		    = $admin->enabled;
			
			$data['state']		        = $admin->state;
			$data['city']		        = $admin->city;
			$data['employee_code']		= $admin->employee_code;
			$data['designation']		= $admin->designation;
			$data['allowed_discount']	= $admin->allowed_discount;
			$data['mail_signature']		= $admin->mail_signature;
			
			// $showrooms               = $this->Stores_model->get_admin_options($id,5);
            // if(!empty($showrooms)) { foreach($showrooms as $showrm) {
                // $data['showroom'][] = $showrm['mid'];
            // } }
            
		}

		$this->form_validation->set_rules('firstname', 'lang:firstname', 'trim|max_length[32]');
		//$this->form_validation->set_rules('lastname', 'lang:lastname', 'trim|max_length[32]');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('username', 'lang:username', 'trim|required|max_length[128]|callback_check_username');
		$this->form_validation->set_rules('access', 'lang:access', 'trim|required');
		
		$this->form_validation->set_rules('employee_code', 'Employee Code', 'trim|required');
		$this->form_validation->set_rules('allowed_discount', 'Allowed Discount', 'trim|required');
		$this->form_validation->set_rules('mail_signature', 'Mail Signature', 'trim|max_length[500]');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|required');
		
		//if this is a new account require a password, or if they have entered either a password or a password confirmation
		if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id)
		{
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->view2($this->config->item('admin_folder').'/admin_form', $data);
		}
		else
		{
		//echo "<pre>"; print_r($_POST); exit;
			$save['id']		            = $id;
			$save['firstname']	        = $this->input->post('firstname');
			//$save['lastname']	        = $this->input->post('lastname');
			$save['email']		        = $this->input->post('email');
			$save['username']	        = $this->input->post('username');
			$save['access']		        = $this->input->post('access');
			
			$save['state']		        = $this->input->post('state');
			$save['city']		        = $this->input->post('city');
			$save['employee_code']		= $this->input->post('employee_code');
			$save['designation']		= $this->input->post('designation');
			$save['allowed_discount']	= $this->input->post('allowed_discount');
			$save['mail_signature']		= $this->input->post('mail_signature');
			$save['created_by']		    = $this->session->userdata('admin')['id'];
			//$save['showroom']		    = $this->input->post('showroom');
			$save['enabled']		    = $this->input->post('enabled');
			
			if ($this->input->post('password') != '' || !$id)
			{
				$save['password']	= $this->input->post('password');
			}
			
			$admins_id = $this->auth->save($save);
			
            $showroom  = $this->input->post('showroom');
            if($showroom) 
            {
                $this->Stores_model->delete_store_admin($admins_id,5);
                $i = 0; foreach ($showroom as $vid) {
                    if(isset($vid) && $vid<>'')
                    $this->Stores_model->save_store_admin($admins_id,$vid,5);
                $i++; }
            }
            
			$this->session->set_flashdata('message', lang('message_user_saved'));
			
			//go back to the customer list
			$this->view2($this->config->item('admin_folder').'/masters/close_popup', $data);
			//redirect($this->config->item('admin_folder').'/admin');
		}
	}
	
	function check_username($str)
	{
		$email = $this->auth->check_username($str, $this->admin_id);
		if ($email)
		{
			$this->form_validation->set_message('check_username', lang('error_username_taken'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	 function activate_dactivate()
	{
	    if(!empty($_POST)) 
	    { 
	        $val = '';
	        $id = $_POST['id'];
	        $brand       = $this->auth->get_admin($id);
	        if($brand->enabled == 1) {
	            $this->Stores_model->activate_dactivate_admin($id,0);
	            //$this->session->set_flashdata('message', 'Deactivated Successfully');
	            $val .= '2';
	        } else {
	            $this->Stores_model->activate_dactivate_admin($id,1);
	            //$this->session->set_flashdata('message', 'Activated Successfully');
	            $val .=  '1';
	        }
	        
	        echo $val; exit;
	    }
	}
}

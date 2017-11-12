<?php

class Stores extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->auth->check_access_permission();
		$this->load->helper('date');
		$this->load->model('Stores_model');
		$this->load->model('Search_model');
	}
	
	function index($field='id', $by='DESC', $code=0,$page=0)
	{
		$data['page_title']	= "Stores";
		
        $term				= false;
        $post				= $this->input->post(null, false);
        if($post)
        {
            $term			= json_encode($post);
            $code			= $this->Search_model->record_term($term);
            $data['code']	= $code;
        }
        elseif ($code)
        {
            $term			= $this->Search_model->get_term($code);
        }
		if(!empty($_POST) && !empty($_POST['tablelimit']) ) {
		    $limit = $_POST['tablelimit'];
		} else { 
		    $limit = 10; 
		}
		
		$data['stores']	    = $this->Stores_model->get_storess($limit,$page, $field, $by,$term);
		$count_stores	    = $this->Stores_model->get_storess(0,$page, $field, $by,$term);

		$this->load->library('pagination');

		$config['base_url']		    = base_url().'/'.$this->config->item('admin_folder').'/stores/index/'.$field.'/'.$by.'/'.$code;
		$config['total_rows']	    = count($count_stores);
		$config['per_page']		    = $limit;
		$config['uri_segment']	    = 7;
		$config['first_link']		= 'First';
		$config['first_tag_open']	= '<li>';
		$config['first_tag_close']	= '</li>';
		$config['last_link']		= 'Last';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';

		$config['full_tag_open']	= '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close']	= '</ul>';
		$config['cur_tag_open']		= '<li class="active"><a href="#" class="pagechange">';
		$config['cur_tag_close']	= '</a></li>';
		
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		
		$config['prev_link']		= '&laquo;';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';

		$config['next_link']		= '&raquo;';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		
		$this->pagination->initialize($config);
		
		$data['page']	= $page;
		$data['field']	= $field;
		$data['by']	    = $by;
		
		if(!empty($_POST) && $_POST['id'] == 'ajaxloaded') {
		   $this->view_ajax($this->config->item('admin_folder').'/masters/stores_ajax', $data);
		}else {
		    $this->view($this->config->item('admin_folder').'/masters/stores', $data);
		}
		
	}
	
	function form($id = false)
   	{
        $config['upload_path']      = 'uploads/images/full';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_width']        = '5000';
        $config['max_height']       = '5000';
        $config['encrypt_name']     = true;
        $this->load->library('upload', $config);
        
        $data['page_title']         = "Add Store";
        
        //default values are empty if the customer is new
        $data['id']                 = '';
        $data['name']               = '';
        $data['description']        = '';
        $data['image']              = '';
        $data['enabled']            = '';
        $data['address1']           = '';
        $data['address2']           = '';
        $data['state']              = '';
        $data['city']               = '';
        $data['latitude']           = '';
        $data['longitude']          = '';
        $data['phone']              = '';
        $data['store_manager']      = '';
        $data['sales_person']       = '';
        
        $data['state_list']         = $this->Stores_model->get_state_list();
        
        if ($id)
        {   
            $stores                 = $this->Stores_model->get_stores($id);

            if (!$stores) 
            {
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect($this->config->item('admin_folder').'/stores');
            }
            
            $data['id']                = $stores->id;
            $data['name']              = $stores->name;
            $data['description']       = $stores->description;
            $data['image']             = $stores->image;
            $data['enabled']           = $stores->enabled;
            $data['address1']          = $stores->address1;
            $data['address2']          = $stores->address2;
            $data['state']             = $stores->state;
            $data['city']              = $stores->city;
            $data['latitude']          = $stores->latitude;
            $data['longitude']         = $stores->longitude;
            $data['phone']             = $stores->phone;
            
            $data['city_list']         = $this->Stores_model->get_cities($stores->state);
            $data['store_manager']     = $this->Stores_model->get_store_persons($id,1);
            $data['sales_person']      = $this->Stores_model->get_store_persons($id,2);
        }

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('description', 'lang:description', 'trim|max_length[255]');
        $this->form_validation->set_rules('image', 'lang:image', 'trim');
        $this->form_validation->set_rules('enabled', 'lang:enabled', 'trim|numeric');

        if ($this->form_validation->run() == FALSE)
        {
		    $this->view2($this->config->item('admin_folder').'/masters/stores_form', $data);
        }
        else
        {
        
            $uploaded   = $this->upload->do_upload('image');
            if($uploaded){
                $save['image']          = $this->fullimage_upload($this->upload->data());
            }
            
            $save['id']                 = $id;
            $save['name']               = $this->input->post('name');
            $save['description']        = $this->input->post('description');
            $save['enabled']            = $this->input->post('enabled');
            $save['address1']           = $this->input->post('address1');
            $save['address2']           = $this->input->post('address2');
            $save['state']              = $this->input->post('state');
            $save['city']               = $this->input->post('city');
            $save['latitude']           = $this->input->post('latitude');
            $save['longitude']          = $this->input->post('longitude');
            $save['phone']              = $this->input->post('phone');
            $save['created_by']         = $this->session->userdata('admin')['id'];
            
            if($id)
            $save['modified_on']         = date('Y-m-d H:i:s');
            
            $store_id                   = $this->Stores_model->save($save);
            
            // Store Manager //
            $sm_title  = $this->input->post('sm_title');
            $sm_email  = $this->input->post('sm_email');
            $sm_phone  = $this->input->post('sm_phone');
            
            if($sm_title) 
            {
                $this->Stores_model->delete_store_persones($store_id,1);
                $i = 0; foreach ($sm_title as $vid) {
                    if(isset($vid) && $vid<>'')
                    $this->Stores_model->save_store_persones($store_id,$vid,$sm_email[$i],$sm_phone[$i],1);
                $i++; }
            }
            
            // Sales Person //
            $sp_title  = $this->input->post('sp_title');
            $sp_email  = $this->input->post('sp_email');
            $sp_phone  = $this->input->post('sp_phone');
            
            if($sp_title) 
            {
                $this->Stores_model->delete_store_persones($store_id,2);
                $i = 0; foreach ($sp_title as $vid) {
                    if(isset($vid) && $vid<>'')
                    $this->Stores_model->save_store_persones($store_id,$vid,$sp_email[$i],$sp_phone[$i],2);
                $i++; }
            }
            
            $this->session->set_flashdata('message', lang('message_category_saved'));
            
            //redirect($this->config->item('admin_folder').'/stores');
            $this->view2($this->config->item('admin_folder').'/masters/close_popup', $data);
        }
    }
    
    function activate_dactivate()
	{
	    if(!empty($_POST)) 
	    { 
	        $val = '';
	        $id = $_POST['id'];
	        $stores       = $this->Stores_model->get_stores($id);
	        if($stores->enabled == 1) {
	            $this->Stores_model->activate_dactivate($id,0);
	            //$this->session->set_flashdata('message', 'Deactivated Successfully');
	            $val .= '2';
	        } else {
	            $this->Stores_model->activate_dactivate($id,1);
	            //$this->session->set_flashdata('message', 'Activated Successfully');
	            $val .=  '1';
	        }
	        
	        echo $val; exit;
	    }
	}
	
	
	function get_serial()
	{
	    if(!empty($_POST)) 
	    {
	        $serial = $_POST['serial'];
	        $this->Stores_model->organize_contents($serial);
        }
	}
	    
    
    function load_city()
    {
        if(!empty($_POST)) 
        {
            $state = $_POST['state']; 
            $cities = $this->Stores_model->get_cities($state);
            $out = '';
            
            $out .= '<option value="0" disabled selected>Select city ..</option>';
            if(!empty($cities)) { foreach($cities as $city) { 
            $out .= '<option value="'.$city["cityID"].'" >'.$city["cityName"].'</option>';
            } }
            echo $out; exit;
        }
    }
    

}

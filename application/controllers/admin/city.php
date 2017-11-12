<?php

class City extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->auth->check_access_permission();
		$this->load->helper('date');
		$this->load->model('City_model');
		$this->load->model('Search_model');
	}
	
	function index($field='id', $by='DESC', $code=0,$page=0)
	{
		$data['page_title']	= "City";
		
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
		
		$data['city']	           = $this->City_model->get_city($limit,$page, $field, $by,$term);
		$count_city	               = $this->City_model->get_city(0,$page, $field, $by,$term);
        $data['state_list']        = $this->City_model->get_state_list();
		$this->load->library('pagination');

		$config['base_url']		    = base_url().'/'.$this->config->item('admin_folder').'/city/index/'.$field.'/'.$by.'/'.$code;
		$config['total_rows']	    = count($count_city);
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
		   $this->view_ajax($this->config->item('admin_folder').'/masters/city_ajax', $data);
		}else {
		    $this->view($this->config->item('admin_folder').'/masters/city', $data);
		}
		
	}
	
	function form($id = false)
   	{
        
        $data['page_title']         = "Add City";
        
        //default values are empty if the customer is new
        $data['id']                 = '';
        $data['name']               = '';
        $data['category_id']        = '';
        
        $data['state_list']        = $this->City_model->get_state_list();
        
        if ($id)
        {   
            $city                 = $this->City_model->get_category($id);

            if (!$city) 
            {
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect($this->config->item('admin_folder').'/city');
            }
            
            $data['id']                = $city->cityID;
            $data['name']              = $city->cityName;
            $data['state_id']          = $city->stateID;
        }

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]');
        
        if ($this->form_validation->run() == FALSE)
        {
		    $this->view2($this->config->item('admin_folder').'/masters/city_form', $data);
        }
        else
        {
            $save['cityID']             = $id;
            $save['cityName']           = $this->input->post('name');
            $save['stateID']            = $this->input->post('state_id');
            
            $homebanner_id              = $this->City_model->save($save);
            $this->session->set_flashdata('message', lang('message_category_saved'));
            
            $this->view2($this->config->item('admin_folder').'/masters/close_popup', $data);
        }
    }
    
    function activate_dactivate()
	{
	    if(!empty($_POST)) 
	    { 
	        $val = '';
	        $id = $_POST['id'];
	        $city       = $this->City_model->get_category($id);
	        if($city->enabled == 1) {
	            $this->City_model->activate_dactivate($id,0);
	            $val .= '2';
	        } else {
	            $this->City_model->activate_dactivate($id,1);
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
	        $this->City_model->organize_contents($serial);
        }
	}
	    
    

}

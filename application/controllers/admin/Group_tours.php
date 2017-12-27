<?php

class Group_tours extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->auth->check_access_permission();
		$this->load->helper('date');
		$this->load->model('Group_tours_model');
		$this->load->model('Search_model');
		$this->load->model('Common_model');
	}
	
	function index($field='id', $by='DESC', $code=0,$page=0)
	{
		$data['page_title']	= "Group Tours";
		
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
		
		$data['application']	    = $this->Group_tours_model->get_applications($limit,$page, $field, $by,$term);
		$count_application	    = $this->Group_tours_model->get_applications(0,$page, $field, $by,$term);

		$this->load->library('pagination');

		$config['base_url']		    = base_url().'/'.$this->config->item('admin_folder').'/application/index/'.$field.'/'.$by.'/'.$code;
		$config['total_rows']	    = count($count_application);
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
		   $this->view_ajax($this->config->item('admin_folder').'/masters/group_tours_ajax', $data);
		}else {
		    $this->view($this->config->item('admin_folder').'/masters/group_tours', $data);
		}
		
	}
	
	function form($id = false)
   	{
        // echo "<pre>"; print_r($_REQUEST); exit;
        $data['page_title']           = "Add Application";
        
        //default values are empty if the customer is new
        $data['id']                   = '';
        $data['name']                 = '';
        $data['description']          = '';
        $data['activate']             = '';
        // $data['tours']              = array();
        $data['city']                 = array();
        $data['image']                = array();
        // $data['all_tours']          = $this->Common_model->get_tours();
      	$data['get_cities']           = $this->Common_model->get_cities();
      	$data['get_destination']      = $this->Common_model->get_destination();

      	$data['first_class_double']   = '';
      	$data['first_class_single']   = '';
      	$data['deluxe_double']        = '';
      	$data['deluxe_single']        = '';
      	$data['oppulent_double']      = '';
      	$data['oppulent_single']      = '';

      	$data['availability']         = '';

        if ($id)
        {   
            $application                 = $this->Group_tours_model->get_category($id);
            $data['availability']        = $this->Group_tours_model->get_availability($id);


            if (!$application) 
            {
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect($this->config->item('admin_folder').'/application');
            }
            
            $data['id']                = $application->id;
            $data['name']              = $application->name;
            $data['description']       = $application->description;
            $data['activate']          = $application->activate;

			$data['first_class_double']  = $application->first_class_double;
			$data['first_class_single']  = $application->first_class_single;            
			$data['deluxe_double']       = $application->deluxe_double;
			$data['deluxe_single']       = $application->deluxe_single;
			$data['oppulent_double']     = $application->oppulent_double;
			$data['oppulent_single']     = $application->oppulent_single;
			$data['destination']         = $application->destination;
   
            if(!$this->input->post('submit'))
	        {
                $data['image']	       = (array)json_decode($application->image);
                $data['city']	       = (array)json_decode($application->city);
                $data['days']	       = (array)json_decode($application->days);
	        }
        }

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('description', 'lang:description', 'trim');
        $this->form_validation->set_rules('activate', 'lang:enabled', 'trim|numeric');
        
        if ($this->form_validation->run() == FALSE)
        {
        	// echo "<pre>"; print_r($data); exit;	
		    $this->view($this->config->item('admin_folder').'/masters/group_tours_form', $data);
        }
        else
        {
        
        	
	        $day = [];
	        if($_POST['day_title1']) {
	        	$day = [ 'day_title1' => $_POST['day_title1'], 'day_title2' => $_POST['day_title2'], 'day_text' => $_POST['day_text'] ];
	        }
            
            $save['id']                 = $id;
            $save['name']               = $this->input->post('name');
            $save['description']        = $this->input->post('description');
            $save['activate']           = $this->input->post('activate');
            $save['created_at']         = $this->session->userdata('admin')['id'];
            $save['image']	            = json_encode($this->input->post('image'));
	        // $save['tours']	            = json_encode($this->input->post('tours'));
	        $save['city']	            = json_encode($this->input->post('city'));

	        $save['first_class_double']    = $this->input->post('first_class_double');
	        $save['first_class_single']    = $this->input->post('first_class_single');
	        $save['deluxe_double']         = $this->input->post('deluxe_double');
	        $save['deluxe_single']         = $this->input->post('deluxe_single');
	        $save['oppulent_double']       = $this->input->post('oppulent_double');
	        $save['oppulent_single']       = $this->input->post('oppulent_single');
	        $save['destination']           = $this->input->post('destination');
	        $save['days']                  = json_encode($day);

            if($id)
            $save['updated_at']          = date('Y-m-d H:i:s');

        	$group_tours_id              = $this->Group_tours_model->save($save);

        	if($this->input->post('start')) {
        		$start = $this->input->post('start');
        		$end = $this->input->post('end');
        		$price = $this->input->post('price');
        		$seates = $this->input->post('seates');

        		$this->Group_tours_model->delete_availability($group_tours_id);
        		foreach ($start as $key => $value) {
        			$availability_id = $this->Group_tours_model->save_availability($start[$key],$end[$key],$price[$key],$seates[$key],$group_tours_id);
        		}
        	}
            
            if($id) {
            	redirect($this->config->item('admin_folder').'/group_tours/form/'.$id);
            } else {
            	redirect($this->config->item('admin_folder').'/group_tours/form/'.$group_tours_id);
            }
            // $this->view2($this->config->item('admin_folder').'/masters/close_popup', $data);
        }
    }
    
    function activate_dactivate()
	{
	    if(!empty($_POST)) 
	    { 
	        $val = '';
	        $id = $_POST['id'];
	        $application       = $this->Group_tours_model->get_category($id);
	        if($application->activate == 1) {
	            $this->Group_tours_model->activate_dactivate($id,0);
	            //$this->session->set_flashdata('message', 'Deactivated Successfully');
	            $val .= '2';
	        } else {
	            $this->Group_tours_model->activate_dactivate($id,1);
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
	        $this->Group_tours_model->organize_contents($serial);
        }
	}
	    
    

}

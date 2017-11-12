<?php

class Quotation extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->auth->check_access_permission();
		$this->load->helper('date');
		$this->load->model(array('Quotation_model','Stores_model','Search_model','Product_model'));
	}
	
	function index($field='id', $by='DESC', $code=0,$page=0)
	{
		$data['page_title']	= "Quotation";
		
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
		
		$data['qcity']          = $this->Quotation_model->get_quotation_city();
		$data['users']          = $this->Quotation_model->get_users();
		$data['stores']         = $this->Quotation_model->get_stores();
		$data['quotation']	    = $this->Quotation_model->get_quotation($limit,$page, $field, $by,$term);
		$count_quotation	    = $this->Quotation_model->get_quotation(0,$page, $field, $by,$term);

		$this->load->library('pagination');

		$config['base_url']		    = base_url().'/'.$this->config->item('admin_folder').'/quotation/index/'.$field.'/'.$by.'/'.$code;
		$config['total_rows']	    = count($count_quotation);
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
		   $this->view_ajax($this->config->item('admin_folder').'/quotation/quotation_ajax', $data);
		} else {
		    $this->view($this->config->item('admin_folder').'/quotation/quotation', $data);
		}
	}
	
	function form($id = false)
   	{
   	
        $data['page_title']         = "Quotation";
        
        $data['id']                 = '';
        $data['client_name']        = '';
        $data['address1']           = '';
        $data['address2']           = '';
        $data['state']              = '';
        $data['city']               = '';
        $data['email']              = '';
        $data['mobile']             = '';
        $data['quotation_sub']      = '';
        $data['description']        = '';
        $data['enabled']            = '';
        $data['showroom']           = '';
        
        $data['state_list']         = $this->Stores_model->get_state_list();
        $data['stores_list']        = $this->Quotation_model->get_storesss($this->session->userdata('admin')['id']);
        
        if ($id)
        {
            $quotation              = $this->Quotation_model->get_category($id);

            if (!$quotation) 
            {
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect($this->config->item('admin_folder').'/quotation');
            }
            
            $data['id']                = $quotation->id;
            $data['client_name']       = $quotation->client_name;
            $data['address1']          = $quotation->address1;
            $data['address2']          = $quotation->address2;
            $data['state']             = $quotation->state;
            $data['city']              = $quotation->city;
            $data['email']             = $quotation->email;
            $data['mobile']            = $quotation->mobile;
            $data['quotation_sub']     = $quotation->quotation_sub;
            $data['description']       = $quotation->description;
            $data['enabled']           = $quotation->enabled;
            $data['showroom']          = $quotation->showroom;
            
            $data['city_list']          = $this->Stores_model->get_city_list($quotation->state);
        }
        
        $this->form_validation->set_rules('client_name', 'Client Name', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('description', 'lang:description', 'trim');
        $this->form_validation->set_rules('enabled', 'lang:enabled', 'trim|numeric');
        
        if ($this->form_validation->run() == FALSE)
        {
		    $this->view($this->config->item('admin_folder').'/quotation/quotation_form', $data);
        }
        else
        {
            $save['id']                 = $id;
            $save['client_name']        = $this->input->post('client_name');
            $save['address1']           = $this->input->post('address1');
            $save['address2']           = $this->input->post('address2');
            $save['state']              = $this->input->post('state');
            $save['city']               = $this->input->post('city');
            $save['email']              = $this->input->post('email');
            $save['mobile']             = $this->input->post('mobile');
            $save['quotation_sub']      = $this->input->post('quotation_sub');
            $save['description']        = $this->input->post('description');
            $save['enabled']            = $this->input->post('enabled');
            $save['showroom']           = $this->input->post('showroom');
            $save['created_by']         = $this->session->userdata('admin')['id'];
            
            if($id)
            $save['modified_on']        = date('Y-m-d H:i:s');

            $quotation_id              = $this->Quotation_model->save($save);
            $this->session->set_userdata('quotation_id', $quotation_id );
            $this->session->set_flashdata('message', lang('message_category_saved'));
            
            redirect($this->config->item('admin_folder').'/quotation/quotation_step2');
        }
    }
    
    
    function quotation_step2($field='id', $by='DESC', $code=0,$page=0)
	{
	
	    $data['quotation_id']	         = $this->session->userdata('quotation_id');
	    if(empty($data['quotation_id'])){
	        redirect($this->config->item('admin_folder').'/quotation/form');
	    }
		$data['page_title']	             = "Create Quotation";
		$data['brand_list']              = $this->Product_model->get_brand_list();
        $data['series_list']             = $this->Product_model->get_series_list();
        $data['category_list']           = $this->Quotation_model->get_category_list();
        $data['group_list']              = $this->Quotation_model->get_group_list(1);
        $data['subgroup_list']           = $this->Quotation_model->get_group_list(2);
        $data['group_vals']              = $this->Quotation_model->get_quotation_product($data['quotation_id']);
        
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
		
		if(!empty($_POST['brand']) || !empty($_POST['series']) || !empty($_POST['category']) || !empty($_POST['subcategory']) || !empty($_POST['searchtext'])) 
		{
		    $data['quotation']	    = $this->Quotation_model->get_quotation_products($limit,$page, $field, $by,$term);
		} else {
		    $data['quotation']      = '';
		}
		
		$count_quotation	        = $this->Quotation_model->get_quotation_products(0,$page, $field, $by,$term);

		$this->load->library('pagination');

		$config['base_url']		    = base_url().'/'.$this->config->item('admin_folder').'/quotation/index/'.$field.'/'.$by.'/'.$code;
		$config['total_rows']	    = count($count_quotation);
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
		//echo "<pre>"; print_r($data['subgroup_list']); exit;
		if(!empty($_POST) && $_POST['id'] == 'ajaxloaded') {
		   $this->view_ajax($this->config->item('admin_folder').'/quotation/quotation_step2_ajax', $data);
		} else {
		    $this->view($this->config->item('admin_folder').'/quotation/quotation_step2', $data);
		}
	}
	
    
    function activate_dactivate()
	{
	    if(!empty($_POST)) 
	    { 
	        $val = '';
	        $id = $_POST['id'];
	        $quotation       = $this->Quotation_model->get_category($id);
	        if($quotation->enabled == 1) {
	            $this->Quotation_model->activate_dactivate($id,0);
	            $val .= '2';
	        } else {
	            $this->Quotation_model->activate_dactivate($id,1);
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
	        $this->Quotation_model->organize_contents($serial);
        }
	}
	
	
	function load_city()
    {
        if(!empty($_POST)) 
        {
            $state  = $_POST['state']; 
            $cities = $this->Stores_model->get_cities($state);
            $out    = '';
            
            $out .= '<option value="0" disabled selected>Select city ..</option>';
            if(!empty($cities)) { foreach($cities as $city) { 
            $out .= '<option value="'.$city["cityID"].'" >'.$city["cityName"].'</option>';
            } }
            echo $out; exit;
        }
    }
    
    function quotation_product()
    {
        $save['quotation_id']	= $this->session->userdata('quotation_id');
        if(!empty($this->session->userdata('quotation_id')))
        {
            if(!empty($_POST)) 
            {
                $groups             = explode("-",$_POST['group']);
                $save['group']      = $groups[0];
                $save['subgroup']   = $groups[1];
                $save['pid']        = $_POST['id'];
                $save['qty']        = $_POST['qty'];
                $save['finish']     = $_POST['finish'];
                
                $values = $this->Quotation_model->store_quotation_product($save);
                
                $data['group_vals']              = $this->Quotation_model->get_quotation_product($save['quotation_id']);
                $data['group_list']              = $this->Quotation_model->get_group_list(1);
                $data['subgroup_list']           = $this->Quotation_model->get_group_list(2);
                $this->view_ajax($this->config->item('admin_folder').'/quotation/quotation_group_tree', $data);
            }
        } else {
        echo 'session expired'; exit;
        }
    }
    
    function quotation_product_delete()
    {
        $quotation_id = $this->session->userdata('quotation_id');
        if(!empty($this->session->userdata('quotation_id')))
        {
            if(!empty($_POST)) 
            {
                $pvalues = $_POST['pvalues'];
                $values = $this->Quotation_model->delete_quotation_product($pvalues);
                
                $data['group_vals']              = $this->Quotation_model->get_quotation_product($quotation_id);
                $data['group_list']              = $this->Quotation_model->get_group_list(1);
                $data['subgroup_list']           = $this->Quotation_model->get_group_list(2);
                $this->view_ajax($this->config->item('admin_folder').'/quotation/quotation_group_tree', $data);
            }
        } else {
            echo 'session expired'; exit;
        }
    }
    
    function generate_pdf($qid)
    {
        ini_set("memory_limit","1024M");
        ini_set('MAX_EXECUTION_TIME', '10000');
        $pdf_name = 'Quotation'.date("dmYhis");
        $this->load->library('pdf');
        
        $group = array();
        $subgrup = array();

        $data['page_title']         = "Quotation Preview";
        $data['group_list']         = $this->Quotation_model->get_group_list(1);
        $data['subgroup_list']      = $this->Quotation_model->get_group_list(2);
        $data['group_vals']         = $this->Quotation_model->get_quotation_preview($qid);
        if(!empty($data['group_vals']))
        {
            foreach($data['group_vals'] as $values) 
            {
                $group[]     = $values['group'];
                $subgrup[]   = $values['group'].'-'.$values['subgroup'];
            }
        }
        $data['group']       = array_unique($group);
        $data['subgroup']    = array_unique($subgrup); 
        $data['quotation']   = $this->Quotation_model->get_category($qid);
        $data['username']    = $this->session->userdata('admin')['firstname'];
        $data['pgno']        = "{PAGE_NUM}";
        //echo "<pre>"; print_r($data); exit;
        $this->pdf->load_view('welcome',$data);
        $this->pdf->render();
        $this->pdf->stream($pdf_name.".pdf");
    }
    
    function preview()
    {
        $data['quotation_id']	    = $this->session->userdata('quotation_id');
	    if(empty($data['quotation_id'])) {
	        redirect($this->config->item('admin_folder').'/quotation/form');
	        //$data['quotation_id']       = 6;
	    }
	    $group = array();
	    $subgrup = array();
	    
	    $data['page_title']         = "Quotation Preview";
	    $data['group_list']         = $this->Quotation_model->get_group_list(1);
        $data['subgroup_list']      = $this->Quotation_model->get_group_list(2);
	    $data['group_vals']         = $this->Quotation_model->get_quotation_preview($data['quotation_id']);
	    if(!empty($data['group_vals']))
	    {
	        foreach($data['group_vals'] as $values) 
	        {
	            $group[]   = $values['group'];
	            $subgrup[] = $values['group'].'-'.$values['subgroup'];
	        }
	    }
	    $data['group']     = array_unique($group);
	    $data['subgroup']  = array_unique($subgrup);
	    //echo '<pre>'; print_r($data); exit;
	    $this->view($this->config->item('admin_folder').'/quotation/quotation_preview', $data);
    }
    
    function finish()
    {
        $quotation_id	    = $this->session->userdata('quotation_id');
	    if(empty($quotation_id)) {
	        redirect($this->config->item('admin_folder').'/quotation/form');
	        //$quotation_id      = 6;
	    }
	    
	    $data['fprice']                = $_POST['fprice'];
	    $data['cost']                  = $_POST['cost'];
	    $data['product_discount']      = $_POST['product_discount'];
	    $data['executive_discount']    = $_POST['executive_discount'];
	    $data['installation_charges']  = $_POST['installation_charges'];
	    $data['taxes']                 = $_POST['taxes'];
	    $data['status']                = 1;
	    
	    $quotation                     = $this->Quotation_model->save_finish($quotation_id,$data);
	    redirect($this->config->item('admin_folder').'/quotation');
    }
    
    function update_comment_status()
    {
        $qid               = $_POST['qid'];
        $data['status']    = $_POST['status'];
        $data['comments']  = $_POST['comments'];
        
        $quotation         = $this->Quotation_model->save_finish($qid,$data);
        echo $quotation;
    }
    
    function quotation_duplicate($qid)
    {
        $quotation                     = $this->Quotation_model->get_quotation_tb($qid);
        $quotation_product             = $this->Quotation_model->get_quotation_product_tb($qid);

        $data['id']                    = '';
        $data['client_name']           = $quotation['client_name'];
        $data['quotation_sub']         = $quotation['quotation_sub'];
        $data['mobile']                = $quotation['mobile'];
        $data['email']                 = $quotation['email'];
        $data['state']                 = $quotation['state'];
        $data['city']                  = $quotation['city'];
        $data['showroom']              = $quotation['showroom'];
        $data['address1']              = $quotation['address1'];
        $data['address2']              = $quotation['address2'];
        $data['description']           = $quotation['description'];
        $data['installation_charges']  = $quotation['installation_charges'];
        $data['executive_discount']    = $quotation['executive_discount'];
        $data['fprice']                = $quotation['fprice'];
        $data['cost']                  = $quotation['cost'];
        $data['product_discount']      = $quotation['product_discount'];
        $data['taxes']                 = $quotation['taxes'];
        $data['comments']              = $quotation['comments'];
        $data['status']                = 0;
        $data['enabled']               = $quotation['enabled'];
        $data['created_by']            = $this->session->userdata('admin')['id'];
        
        $quotation_id                  = $this->Quotation_model->save($data);
        
        foreach($quotation_product as $product) 
        {
            $pdata['quotation_id']     = $quotation_id;
            $pdata['group']            = $product['group'];
            $pdata['subgroup']         = $product['subgroup'];
            $pdata['pid']              = $product['pid'];
            $pdata['qty']              = $product['qty'];
            $pdata['finish']           = $product['finish'];
            $pdata['created_by']       = $this->session->userdata('admin')['id'];
            
            $values = $this->Quotation_model->store_quotation_product($pdata);
        }
        redirect($this->config->item('admin_folder').'/quotation');
    }   
	
}

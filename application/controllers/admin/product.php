<?php

class Product extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->auth->check_access_permission();
		$this->load->helper('date');
		$this->load->model('Product_model');
		$this->load->model('Search_model');
	}
	
	function index($field='id', $by='DESC', $code=0,$page=0)
	{
		$data['page_title']	= "Product";
		
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
		
		$data['product']	    = $this->Product_model->get_products($limit,$page, $field, $by,$term);
		$count_product	    = $this->Product_model->get_products(0,$page, $field, $by,$term);

		$this->load->library('pagination');

		$config['base_url']		    = base_url().'/'.$this->config->item('admin_folder').'/product/index/'.$field.'/'.$by.'/'.$code;
		$config['total_rows']	    = count($count_product);
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
		//echo "<pre>"; print_r($data); exit;
		if(!empty($_POST) && $_POST['id'] == 'ajaxloaded') {
		   $this->view_ajax($this->config->item('admin_folder').'/masters/product_ajax', $data);
		}else {
		    $this->view($this->config->item('admin_folder').'/masters/product', $data);
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
        
        $data['page_title']         = "Add Product";
        
        //default values are empty if the customer is new
        $data['id']                      = '';
        $data['name']                    = '';
        $data['description']             = '';
        $data['image']                   = '';
        $data['enabled']                 = '';
        
        $data['product_id']              = '';
        $data['model_name']              = '';
        $data['brand']                   = '';
        $data['series']                  = '';
        $data['price']                   = '';
        $data['discount']                = '';
        $data['quotation_description']   = '';
        $data['product_image']           = array();
        
        $data['brand_list']              = $this->Product_model->get_brand_list();
        $data['series_list']             = $this->Product_model->get_series_list();
        $data['application_list']        = $this->Product_model->get_application_list();
        $data['finish_list']             = $this->Product_model->get_finish_list();
        $data['specification_list']      = $this->Product_model->get_specification_list();
        $data['category_list']           = $this->Product_model->get_category_list();
        
        if ($id)
        {   
            $product                 = $this->Product_model->get_product($id);

            if (!$product) 
            {
                $this->session->set_flashdata('error', lang('error_not_found'));
                redirect($this->config->item('admin_folder').'/product');
            }
            
            $data['id']                      = $product->id;
            $data['name']                    = $product->name;
            $data['description']             = $product->description;
            $data['image']                   = $product->image;
            $data['enabled']                 = $product->enabled;
            
            $data['product_id']              = $product->product_id;
            $data['model_name']              = $product->model_name;
            $data['brand']                   = $product->brand;
            $data['series']                  = $product->series;
            $data['price']                   = $product->price;
            $data['discount']                = $product->discount;
            $data['quotation_description']   = $product->quotation_description;
            
            if(!$this->input->post('submit'))
	        {
                $data['product_image']	     = (array)json_decode($product->product_image);
	        }
	        
            $data['category']                = $this->Product_model->get_product_options($id,3);
            $data['specification']           = $this->Product_model->get_product_options($id,4);
            
            $applications                    = $this->Product_model->get_product_options($id,1);
            if(!empty($applications)) { foreach($applications as $app) {
                $data['application'][] = $app['cid'];
            } }
            
            $finish                          = $this->Product_model->get_product_options($id,2);
            if(!empty($finish)) { foreach($finish as $app) {
                $data['finish'][] = $app['cid'];
            } }
            
            $data['specification']           = $this->Product_model->get_product_options($id,3);
            $data['category']                = $this->Product_model->get_product_options($id,4);
            
        }

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('description', 'lang:description', 'trim|max_length[255]');
        $this->form_validation->set_rules('image', 'lang:image', 'trim');
        $this->form_validation->set_rules('enabled', 'lang:enabled', 'trim|numeric');

        if ($this->form_validation->run() == FALSE)
        {
		    $this->view2($this->config->item('admin_folder').'/masters/product_form', $data);
        }
        else
        {
            $uploaded   = $this->upload->do_upload('image');
            if($uploaded){
                $save['image']               = $this->fullimage_upload($this->upload->data());
            }
            
            $save['id']                      = $id;
            $save['name']                    = $this->input->post('name');
            $save['description']             = $this->input->post('description');
            $save['enabled']                 = $this->input->post('enabled');
            $save['product_id']              = $this->input->post('product_id');
            $save['model_name']              = $this->input->post('model_name');
            $save['brand']                   = $this->input->post('brand');
            $save['series']                  = $this->input->post('series');
            $save['price']                   = $this->input->post('price');
            $save['discount']                = $this->input->post('discount');
            $save['quotation_description']   = $this->input->post('quotation_description');
            $save['created_by']              = $this->session->userdata('admin')['id'];
            $save['product_image']	         = json_encode($this->input->post('product_image'));
            
            if($id)
            $save['modified_on']             = date('Y-m-d H:i:s');
            $product_id                      = $this->Product_model->save($save);
            
            $application = $this->input->post('application');
            if($application) 
            {
                $this->Product_model->delete_product_options($product_id,1);
                $i = 0; foreach ($application as $vid) {
                    if(isset($vid) && $vid<>'')
                    $this->Product_model->save_product_options($product_id,$vid,'','',1);
                $i++; }
            }
            
            $finish = $this->input->post('finish');
            if($finish) 
            {
                $this->Product_model->delete_product_options($product_id,2);
                $i = 0; foreach ($finish as $vid) {
                    if(isset($vid) && $vid<>'')
                    $this->Product_model->save_product_options($product_id,$vid,'','',2);
                $i++; }
            }
            
            $specification       = $this->input->post('specification');
            $specification_value = $this->input->post('specification_value');
            if($specification) 
            {
                $this->Product_model->delete_product_options($product_id,3);
                $i = 0; foreach ($specification as $vid) {
                    if(isset($vid) && $vid<>'')
                    $this->Product_model->save_product_options($product_id,$vid,'',$specification_value[$i],3);
                $i++; }
            }
            
            $category       = $this->input->post('category');
            $subcategory       = $this->input->post('subcategory');
            if($category) 
            {
                $this->Product_model->delete_product_options($product_id,4);
                $i = 0; foreach ($category as $vid) {
                    if(isset($vid) && $vid<>'')
                    $this->Product_model->save_product_options($product_id,$vid,$subcategory[$i],'',4);
                $i++; }
            }
            
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
	        $product       = $this->Product_model->get_product($id);
	        if($product->enabled == 1) {
	            $this->Product_model->activate_dactivate($id,0);
	            //$this->session->set_flashdata('message', 'Deactivated Successfully');
	            $val .= '2';
	        } else {
	            $this->Product_model->activate_dactivate($id,1);
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
	        $this->Product_model->organize_contents($serial);
        }
	}
	    

    function load_subcategory()
    {
        if(!empty($_POST)) 
        {
            $catgy    = $_POST['state']; 
            $category = $this->Product_model->get_subcatgy($catgy);
            $out = '';
            
            $out .= '<option value="0" disabled selected>Select SUB CATEGORY ..</option>';
            if(!empty($category)) { foreach($category as $subcatgy) { 
            $out .= '<option value="'.$subcatgy["id"].'" >'.$subcatgy["name"].'</option>';
            } }
            echo $out; exit;
        }
    }
    
    
	function product_image_form()
	{
		$data['file_name'] = false;
		$data['error']	= false;
		$this->load->view($this->config->item('admin_folder').'/iframe/product_image_uploader', $data);
	}
	
	
	function product_image_upload()
	{
		$data['file_name']        = array();
        $data['error']	          = false;
        $config['allowed_types']  = 'gif|jpg|png';
        $config['upload_path']    = 'uploads/images/full';
        $config['encrypt_name']   = true;
        $config['remove_spaces']  = true;
        $this->load->library('upload', $config);
        $count = count($_FILES['userfile']['size']);

        foreach($_FILES as $files):
        for($i=0;$i<$count;$i++)
        {
            $_FILES['userfile']['name']=$files['name'][$i];
            $_FILES['userfile']['tmp_name']=$files['tmp_name'][$i];
            $_FILES['userfile']['size']=$files['size'][$i];
            $_FILES['userfile']['error']=$files['error'][$i];
            $_FILES['userfile']['type']=$files['type'][$i];
            
            if($this->upload->do_upload())
            {
                $data['file_name'][]  = $this->fullimage_upload($this->upload->data());
            }
            
            if($this->upload->display_errors() != '')
            {
                $data['error'] = $this->upload->display_errors();
            }
        }
        endforeach;	
		$this->load->view($this->config->item('admin_folder').'/iframe/product_image_uploader', $data);
	}
	
	
	function new_image_upload()
	{
        $config['upload_path']      = 'uploads/images/full';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_width']        = '5000';
        $config['max_height']       = '5000';
        $config['encrypt_name']     = true;
        $this->load->library('upload', $config);
                
		if($this->upload->do_upload())
        {
            $data['file_name']  = $this->fullimage_upload($this->upload->data());
        }
            
		if($this->upload->display_errors() != '')
		{
			$return['status']='error';
			$return['file']=str_replace('<p>','',str_replace('</p>','',$this->upload->display_errors()));
			echo json_encode($return);
		}
	}
    

}

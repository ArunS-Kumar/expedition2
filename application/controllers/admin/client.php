<?php

class Client extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('date');
		$this->load->model('Client_model');
		$this->load->model('Search_model');
	}
	
	function index($field='id', $by='DESC', $code=0,$page=0,$rows=10)
	{
		$data['page_title']	= "Client";
		
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
		
		$data['brands']	    = $this->Client_model->get_brands($limit,$page, $field, $by,$term);
		$count_brands	    = $this->Client_model->get_brands(0,$page, $field, $by,$term);
 		$data['qcity']          = $this->Client_model->get_quotation_city();
		$this->load->library('pagination');

		$config['base_url']		    = base_url().'/'.$this->config->item('admin_folder').'/client/index/'.$field.'/'.$by.'/'.$code;
		$config['total_rows']	    	= count($count_brands);
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
		   $this->view_ajax($this->config->item('admin_folder').'/masters/client_ajax', $data);
		} else {
		    $this->view($this->config->item('admin_folder').'/masters/client', $data);
		}
		
	}
	
function export($field='id', $by='DESC', $code=0,$page=0,$rows=10,$limit="")
        {
//echo'<pre>';print_r($_POST);exit;
               
            $term				= false;
            $post				= $this->input->post(null, false);

            if($post)
            {
            $term			= json_encode($post);

            $code			= $this->Search_model->record_term($term);
            $data['code']	= $code;
            }
            
            $data['banners']	    = $this->Client_model->get_brands($limit,$page, $field, $by,$term);
            $this->load->view($this->config->item('admin_folder').'/export_enquiry', $data);
		
                //$this->load->view($this->config->item('admin_folder').'/export_enquiry', $data);
        }
        

	
    

}

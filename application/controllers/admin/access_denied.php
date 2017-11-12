<?php

class Access_denied extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('date');
	}
	
	function index()
	{
		$data['page_title']	= "Access Denied";
	    $this->view($this->config->item('admin_folder').'/common/access_denied', $data);
	}
	
}

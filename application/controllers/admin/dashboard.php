<?php

class Dashboard extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('date');
		$this->lang->load('dashboard');
		$this->lang->load('customer');
	}
	
	function index($field='id', $by='ASC', $page=0)
	{
	    redirect($this->config->item('admin_folder'));	
		$data['page_title']	= "Dashboard";
		$this->view($this->config->item('admin_folder').'/dashboard', $data);
	}


}

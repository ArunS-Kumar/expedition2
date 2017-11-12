<?php

/**
 * The base controller which is used by the Front and the Admin controllers
 */
class Base_Controller extends CI_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();

		//kill any references to the following methods
		$mthd = $this->router->method;
		if($mthd == 'view' || $mthd == 'partial' || $mthd == 'set_template')
		{
			show_404();
		}
		
		//load base libraries, helpers and models
		$this->load->database();


		//load the default libraries
		$this->load->library(array('session', 'auth', 'go_cart'));
		$this->load->helper(array('url', 'file', 'string', 'html', 'language'));
        
        //if SSL is enabled in config force it here.
        if (config_item('ssl_support') && (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off'))
		{
			$CI =& get_instance();
			$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
			redirect($CI->uri->uri_string());
		}
	}
	
}//end Base_Controller

class Front_Controller extends Base_Controller
{
	
	//we collect the categories automatically with each load rather than for each function
	//this just cuts the codebase down a bit
	var $categories	= '';
	
	//load all the pages into this variable so we can call it from all the methods
	var $pages = '';
	
	// determine whether to display gift card link on all cart pages
	//  This is Not the place to enable gift cards. It is a setting that is loaded during instantiation.
	var $gift_cards_enabled;
	
	function __construct(){
		
		parent::__construct();

		//load the theme package
		$this->load->add_package_path(APPPATH.'themes/'.config_item('theme').'/');

		//load helpers
		$this->load->helper(array('form_helper', 'formatting_helper'));
		
		//load common language
		$this->lang->load('common');

	}
	
	/*
	This works exactly like the regular $this->load->view()
	The difference is it automatically pulls in a header and footer.
	*/
	function view($view, $vars = array(), $string=false)
	{
		if($string)
		{
			$result	 = $this->load->view('header', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view('footer', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view('header', $vars);
			$this->load->view($view, $vars);
			$this->load->view('footer', $vars);
		}
	}
	
	
	/*
	This function simply calls $this->load->view()
	*/
	function partial($view, $vars = array(), $string=false)
	{
		if($string)
		{
			return $this->load->view($view, $vars, true);
		}
		else
		{
			$this->load->view($view, $vars);
		}
	}
}

class Admin_Controller extends Base_Controller 
{
	
	private $template;
	
	function __construct()
	{
		parent::__construct();
		
		$this->auth->is_logged_in(uri_string());
		
		//load the base language file
		$this->lang->load('admin_common');
		$this->lang->load('media');
	}
	
	function view($view, $vars = array(), $string=false)
	{
		//if there is a template, use it.
		$template	= '';
		if($this->template)
		{
			$template	= $this->template.'_';
		}

		if($string)
		{
			$result	 = $this->load->view('admin/common/'.$template.'header', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view('admin/common/'.$template.'footer', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view('admin/common/'.$template.'header', $vars);
			$this->load->view($view, $vars);
			$this->load->view('admin/common/'.$template.'footer', $vars);
		}
		
		//reset $this->template to blank
		$this->template	= false;
	}
	
	function view2($view, $vars = array(), $string=false)
	{
		//if there is a template, use it.
		$template	= '';
		if($this->template)
		{
			$template	= $this->template.'_';
		}

		if($string)
		{
			$result	 = $this->load->view('admin/common/'.$template.'header_popup', $vars, true);
			$result	.= $this->load->view($view, $vars, true);
			$result	.= $this->load->view('admin/common/'.$template.'footer_popup', $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view('admin/common/'.$template.'header_popup', $vars);
			$this->load->view($view, $vars);
			$this->load->view('admin/common/'.$template.'footer_popup', $vars);
		}
		
		//reset $this->template to blank
		$this->template	= false;
	}
	
	function view_ajax($view, $vars = array(), $string=false)
	{
		//if there is a template, use it.
		$template	= '';
		if($this->template)
		{
			$template	= $this->template.'_';
		}

		if($string)
		{
			$result	.= $this->load->view($view, $vars, true);
			
			return $result;
		}
		else
		{
			$this->load->view($view, $vars);
		}
		
		//reset $this->template to blank
		$this->template	= false;
	}
	
	/* Template is a temporary prefix that lasts only for the next call to view */
	function set_template($template)
	{
		$this->template	= $template;
	}
	
	
	function fullimage_upload($data)
	{
        $this->load->library('image_lib');

        //this is the larger image
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/images/full/'.$data['file_name'];
        $config['new_image']    = 'uploads/images/small/'.$data['file_name'];
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 600;
        $config['height'] = 500;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();

        //cropped thumbnail
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/images/full/'.$data['file_name'];
        $config['new_image']    = 'uploads/images/thumbnails/'.$data['file_name'];
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 325;
        $config['height'] = 325;
        $this->image_lib->initialize($config);  
        $this->image_lib->resize(); 
        $this->image_lib->clear();
            
        return $data['file_name'];
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tourism extends CI_Controller {

	function __construct()
	{		
		parent::__construct();

		$this->load->model('tourism_model');
		$this->load->library('session');

	}

	public function index()
	{
		redirect('/');	
	}

	public function search() {

		$filterdes = '';
		if (count($_POST) > 0) {
			$this->session->set_userdata('postdata', $_POST ); 
			$this->session->unset_userdata('filterdes'); 
			redirect('tourism/search');
		}
		else {
			if($this->session->userdata('postdata')) {
				if($this->session->userdata('filterdes')) {
					$filterdes = $this->session->userdata('filterdes');
				}
				$_POST = $this->session->userdata('postdata');
			}
		}
	
		$data['search'] = $search  = explode('+',$_POST['countries']);
		$tours  = $this->tourism_model->get_all_tours($search,$filterdes);

		$data['tours'] = $tours['tours'];
		$data['destination'] = $tours['destination'];
		$data['types'] = $tours['types'];
		$data['styles'] = $tours['styles'];
		$data['tour_ids'] = $tours['tour_ids'];

		$includes['js'] = ['list_js.php'];

// echo "<pre>"; print_r($data); exit;
		$this->load->view('header');
		$this->load->view('list', $data);
		$this->load->view('footer',$includes);
	}

	public function tour_detail($id) {

		if(!isset($id) || empty($id)) redirect('/');

		$data['search']  = explode('+',$this->session->userdata('postdata')['countries']);
		$data['tour']	  = $this->tourism_model->get_tour($id);

		$includes['js'] = ['details_js.php'];

		$this->load->view('header');
		$this->load->view('tour_details', $data);
		$this->load->view('footer',$includes);
	}

	public function destination_fliter() {
		$tour_ids = $_POST['tour_ids'];
		$destination = $_POST['destination'];
		
		$destination_id  = $this->tourism_model->get_dest_id_val($destination);
		$tours = $this->tourism_model->tours_destination_fliter($tour_ids,$destination_id);

		if($this->session->userdata('filterdes')) {
			$filterdes = $this->session->userdata('filterdes');
			$tours .= ','.$filterdes;
		}
		$this->session->set_userdata('filterdes', $tours ); 
		
		echo $tours; exit;
	}

}

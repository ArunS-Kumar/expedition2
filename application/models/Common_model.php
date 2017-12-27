<?php 
class Common_model extends CI_Model 
{
    var $CI;

    function __construct()
    {
	    parent::__construct();

	    $this->CI =& get_instance();
	    $this->CI->load->database(); 
	    $this->CI->load->helper('url');
    }
    
    function get_destination() {
        $this->db->select('id,name,description,activate');
        $this->db->order_by('sequence', 'ASC');
        $this->db->where('activate',1);
        return $this->db->get('destination')->result();
    }

    function get_tags() {
        $this->db->select('id,name,description,activate');
        $this->db->order_by('sequence', 'ASC');
        $this->db->where('activate',1);
        return $this->db->get('tags')->result();
    }

    function get_groups() {
        $this->db->select('id,name,description,enabled');
        $this->db->order_by('sequence', 'ASC');
        $this->db->where('enabled',1);
        return $this->db->get('group')->result();
    }

    function get_tours() {
        $this->db->select('id,name,description,activate');
        $this->db->order_by('sequence', 'ASC');
        $this->db->where('activate',1);
        return $this->db->get('tours')->result();
    }

    function get_cities() {
        $this->db->select('id,name,description,enabled');
        $this->db->order_by('sequence', 'ASC');
        $this->db->where('enabled',1);
        return $this->db->get('city')->result();
    }

    
}

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

    
}

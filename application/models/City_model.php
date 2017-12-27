<?php 
class City_model extends CI_Model 
{
    var $CI;

    function __construct()
    {
	    parent::__construct();

	    $this->CI =& get_instance();
	    $this->CI->load->database(); 
	    $this->CI->load->helper('url');
    }
    
    function get_city($limit=0, $offset=0, $order_by='sequence', $direction='ASC', $term)
    {
        if(!empty($term))
        {
            $search	= json_decode($term);
            if(!empty($search->searchtext))
            {
                $this->db->like('name', $search->searchtext);
            }
        }  
		
		$this->db->order_by('sequence', 'ASC');
		if($limit>0)
		{
		        $this->db->limit($limit, $offset);
		}
		$result = $this->db->get('city');
		return $result->result();
    }

    function save($banner)
    {
        if ($banner['id'])
        {
            $this->db->where('id', $banner['id']);
            $this->db->update('city', $banner);
            return $banner['id'];
        }
        else
        {
            $this->db->insert('city', $banner);
            return $this->db->insert_id();
        }
    }
    
    function get_category($id)
    {
        return $this->db->get_where('city',array('id'=>$id))->row();
    }
    
    function activate_dactivate($id,$status)
	{
	    $this->db->set('enabled',$status);
		$this->db->where('id',$id);
		$this->db->update('city');
	}
	
	function organize_contents($sequnce)
	{
	    $seq = 1;
		foreach ($sequnce as $val)
		{
			$this->db->where('id',$val);
			$this->db->set('sequence',$seq);
			$this->db->update('city');
			
			$seq++;
		}
	}
    
}

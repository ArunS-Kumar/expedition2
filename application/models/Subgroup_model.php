<?php 
class Subgroup_model extends CI_Model 
{
    var $CI;

    function __construct()
    {
	    parent::__construct();

	    $this->CI =& get_instance();
	    $this->CI->load->database(); 
	    $this->CI->load->helper('url');
    }
    
    function get_categorys($limit=0, $offset=0, $order_by='sequence', $direction='ASC', $term)
    {
        $this->db->select('g.*,gp.name as gname');	
        if(!empty($term))
        {
            $search	= json_decode($term);
            if(!empty($search->searchtext))
            {
                $this->db->like('g.name', $search->searchtext);
            }
        }  
        
        $this->db->join('group gp', 'gp.id = g.parent');

		$this->db->where('g.type',2);
		$this->db->order_by('g.sequence', 'ASC');
		if($limit>0)
		{
		        $this->db->limit($limit, $offset);
		}
		$result = $this->db->get('group g');
		return $result->result();
    }

    function save($banner)
    {
        if ($banner['id'])
        {
            $this->db->where('id', $banner['id']);
            $this->db->update('group', $banner);
            return $banner['id'];
        }
        else
        {
            $this->db->insert('group', $banner);
            return $this->db->insert_id();
        }
    }
    
    function get_category($id)
    {
        return $this->db->get_where('group',array('id'=>$id))->row();
    }
    
    function activate_dactivate($id,$status)
	{
	    $this->db->set('enabled',$status);
		$this->db->where('id',$id);
		$this->db->update('group');
	}
	
	function organize_contents($sequnce)
	{
	    $seq = 1;
		foreach ($sequnce as $val)
		{
			$this->db->where('id',$val);
			$this->db->set('sequence',$seq);
			$this->db->update('group');
			
			$seq++;
		}
	}
	
	function get_parent_list()
	{
	    return $this->db->get_where('group',array('enabled'=>1,'type'=>2))->result_array();
	}
	
	function get_application_list()
	{
	    return $this->db->get_where('application',array('enabled'=>1))->result_array();
	}
    
}

<?php 
class Roles_model extends CI_Model 
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
        if(!empty($term))
        {
            $search	= json_decode($term);
            if(!empty($search->searchtext))
            {
                $this->db->like('name', $search->searchtext);
            }
        }  
		//  $this->db->where('type',1);
		$this->db->order_by('sequence', 'ASC');
		if($limit>0)
		{
		        $this->db->limit($limit, $offset);
		}
		$result = $this->db->get('roles');
		return $result->result();
    }

    function save($banner)
    {
        if ($banner['id'])
        {
            $this->db->where('id', $banner['id']);
            $this->db->update('roles', $banner);
            return $banner['id'];
        }
        else
        {
            $this->db->insert('roles', $banner);
            return $this->db->insert_id();
        }
    }
    
    function get_category($id)
    {
        return $this->db->get_where('roles',array('id'=>$id))->row();
    }
    
    function activate_dactivate($id,$status)
	{
	    $this->db->set('enabled',$status);
		$this->db->where('id',$id);
		$this->db->update('roles');
	}
	
	function organize_contents($sequnce)
	{
	    $seq = 1;
		foreach ($sequnce as $val)
		{
			$this->db->where('id',$val);
			$this->db->set('sequence',$seq);
			$this->db->update('roles');
			
			$seq++;
		}
	}
	
	function get_result($table)
	{
	    return $this->db->get($table)->result();
	}
    function get_result_active()
	{
	    return $this->db->get_where('roles',array('status'=>1))->result();
	}
    function get_row($id)
    {
         return $this->db->get_where('roles',array('id'=>$id))->row_array();
    }
    
    function save_batch($data)
    {
        $this->db->truncate('permissions');
        return $this->db->insert_batch('permissions', $data); 
    }
    function check_perm($key,$rid)
    {
     return $this->db->get_where('permissions',array('section'=>$key,'role_id'=>$rid))->row();
    }
	
}

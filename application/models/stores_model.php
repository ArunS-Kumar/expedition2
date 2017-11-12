<?php 
class Stores_model extends CI_Model 
{
    var $CI;

    function __construct()
    {
	    parent::__construct();

	    $this->CI =& get_instance();
	    $this->CI->load->database(); 
	    $this->CI->load->helper('url');
    }
    
    function get_storess($limit=0, $offset=0, $order_by='sequence', $direction='ASC', $term)
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
		$result = $this->db->get('stores');
		return $result->result();
    }

    function save($banner)
    {
        if ($banner['id'])
        {
            $this->db->where('id', $banner['id']);
            $this->db->update('stores', $banner);
            return $banner['id'];
        }
        else
        {
            $this->db->insert('stores', $banner);
            return $this->db->insert_id();
        }
    }
    
    function get_stores($id)
    {
        return $this->db->get_where('stores',array('id'=>$id))->row();
    }
    
    function activate_dactivate($id,$status)
	{
	    $this->db->set('enabled',$status);
		$this->db->where('id',$id);
		$this->db->update('stores');
	}
	
	function organize_contents($sequnce)
	{
	    $seq = 1;
		foreach ($sequnce as $val)
		{
			$this->db->where('id',$val);
			$this->db->set('sequence',$seq);
			$this->db->update('stores');
			
			$seq++;
		}
	}
	
	function get_state_list()
	{
	    return $this->db->order_by('stateName','ASC')->get_where('states',array('countryID'=>'IND'))->result_array();
	}
	
	function get_cities($sid)
	{
	    return $this->db->order_by('cityName','ASC')->get_where('cities',array( 'stateID'=>$sid, 'countryID'=>'IND' ))->result_array();
	}
	
	function delete_store_persones($id,$type)
	{
	    return $this->db->delete('stores_persones', array('store_id' => $id,'type'=>$type));
	}
	
	function save_store_persones($id,$vdo,$email,$phone,$type)
	{
        $data['store_id'] = $id;
        $data['name']     = $vdo;
        $data['email']    = $email;
        $data['mobile']   = $phone;
        $data['type']     = $type;
        
        $this->db->insert('stores_persones', $data);
        return $this->db->insert_id();
	}
	
	function get_store_persons($id,$type)
	{
	    return $this->db->get_where('stores_persones',array('store_id'=>$id,'type'=>$type))->result_array();
	}
	
	function get_stores_list()
	{
	    return $this->db->order_by('sequence', 'ASC')->get_where('stores',array('enabled'=>1))->result_array(); 
	}
	
	function activate_dactivate_admin($id,$status)
	{
	    $this->db->set('enabled',$status);
		$this->db->where('id',$id);
		$this->db->update('admin');
	}
    
    function delete_store_admin($id,$type)
	{
	    return $this->db->delete('product_options', array('pid' => $id,'type'=>$type));
	}
	
	function save_store_admin($id,$vid,$type)
	{
        $data['pid']      = $id;
        $data['mid']      = $vid;
        $data['type']     = $type;
        
        $this->db->insert('product_options', $data);
        return $this->db->insert_id();
	}
	
	function get_admin_options($id,$type)
	{
	    return $this->db->order_by('sequence','ASC')->get_where('product_options',array('pid'=>$id,'type'=>$type))->result_array();
	}
	
	function get_roles_list()
	{
	    return $this->db->order_by('sequence','ASC')->get_where('roles',array('enabled'=>1))->result_array();
	}
	
	function get_city_list($sid)
	{
	    return $this->db->get_where('cities',array('stateID'=>$sid))->result_array();
	}
	
}

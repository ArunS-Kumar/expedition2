<?php 
class Group_tours_model extends CI_Model 
{
    var $CI;

    function __construct()
    {
	    parent::__construct();

	    $this->CI =& get_instance();
	    $this->CI->load->database(); 
	    $this->CI->load->helper('url');
    }
    
    function get_applications($limit=0, $offset=0, $order_by='sequence', $direction='ASC', $term)
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
		$result = $this->db->get('group_tours');
		return $result->result();
    }

    function save($banner)
    {
        if ($banner['id'])
        {
            $this->db->where('id', $banner['id']);
            $this->db->update('group_tours', $banner);
            return $banner['id'];
        }
        else
        {
            $this->db->insert('group_tours', $banner);
            return $this->db->insert_id();
        }
    }
    
    function get_category($id)
    {
        return $this->db->get_where('group_tours',array('id'=>$id))->row();
    }
    
    function activate_dactivate($id,$status)
	{
	    $this->db->set('activate',$status);
		$this->db->where('id',$id);
		$this->db->update('group_tours');
	}
	
	function organize_contents($sequnce)
	{
	    $seq = 1;
		foreach ($sequnce as $val)
		{
			$this->db->where('id',$val);
			$this->db->set('sequence',$seq);
			$this->db->update('group_tours');
			
			$seq++;
		}
	}

    function delete_availability($group_tours_id)
    {
        $this->db->where('tour_id', $group_tours_id);
        $this->db->delete('availability');   
    }

    function save_availability($start,$end,$price,$seates,$group_tours_id) {

        $availability = [ 
                'start_date'=> date('Y-m-d H:i:s', strtotime($start)),
                'end_date'=> date('Y-m-d H:i:s', strtotime($end)), 
                'price'=> $price, 
                'total_seats'=> $seates, 
                'tour_id'=> $group_tours_id 
            ];
        $this->db->insert('availability', $availability);
        return $this->db->insert_id();
    }

    function get_availability($tour_id)
    {
        $this->db->where('tour_id', $tour_id );
        $result = $this->db->get('availability');
        return $result->result();
    }
    
}

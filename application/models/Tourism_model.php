<?php
Class Tourism_model extends CI_Model
{

    var $CI;

    function __construct()
    {
		parent::__construct();

		$this->CI =& get_instance();
		$this->CI->load->database(); 
    }

	
	function get_all_tours($search,$filterdes)
	{
		$con = "AND";
		if(count($search) == 1) {
			$con = "OR";
			$search[1] = $search[0];
		}

		$con2 = '';
		if(!empty($filterdes)) {
			$filterdes = explode(',',$filterdes);
			$con2 = "t.id NOT IN ('".implode("','",$filterdes)."') AND ";
		}

		$tours = "SELECT t.*,s.name as style_name,s.id as s_id,ty.id as t_id FROM tours t
					inner join tour_styles ts on (ts.tour = t.id)
					inner join style s on (s.id = ts.style)
					inner join tour_types tt on (tt.tour = t.id)
					inner join type ty on (ty.id = tt.type)
					inner join tour_destinations td on (td.tour = t.id)
					inner join destination d on (d.id = td.destination)
					inner join counties c on (c.id = d.country)
					where $con2 ( t.name like ? OR d.name like ? OR c.name like ? $con s.name like ? AND t.activate = 1 )
					GROUP BY t.id
					ORDER BY t.id ASC";

		$result['tours'] = $this->db->query($tours, array('%'.trim($search[0]).'%','%'.trim($search[0]).'%','%'.trim($search[0]).'%','%'.trim($search[1]).'%'))->result();
		$result['destination'] = [];
		$result['types'] = [];
		$result['styles'] = [];
		$result['tour_ids'] = [];
		
		if(!empty($result['tours'])) {
			foreach ($result['tours'] as $key => $value) {
				$tour_ids[] = $value->id;
			}
			$result['tour_ids'] = implode(",",$tour_ids);

			$result['destination']  = $this->db->query("SELECT d.id,d.name FROM destination d
										left join tour_destinations td on (td.destination = d.id)
										where td.tour IN ('".implode("','",$tour_ids)."') GROUP BY d.name ORDER BY d.id")->result();
			
			$result['types']  = $this->db->query("SELECT t.id,t.name FROM type t
										left join tour_types tt on (tt.type = t.id)
										where tt.tour IN ('".implode("','",$tour_ids)."') GROUP BY t.name ORDER BY t.id")->result();

			$result['styles']  = $this->db->query("SELECT s.id,s.name FROM style s
										left join tour_styles ts on (ts.style = s.id)
										where ts.tour IN ('".implode("','",$tour_ids)."') GROUP BY s.name ORDER BY s.id")->result();
		}
		// echo "<pre>"; print_r($result); exit();
		return $result;
	}


	function get_tour($id) {
		$result = $this->db->get_where('tours', array('id'=>$id));
		return $result->row();
	}

	function get_dest_id_val($des) {
		$des_id = $this->db->query("SELECT id from destination where name like ?", array(trim($des)))->row();
		return $des_id->id;
	}

	function tours_destination_fliter($tour_ids,$destination) {
		$tour_ids = explode(',',$tour_ids);
		$tours_sql = "SELECT t.*,s.name as style_name FROM tours t
					left join tour_styles ts on (ts.tour = t.id)
					inner join style s on (s.id = ts.style)
					left join tour_destinations td on (td.tour = t.id)
					left join destination d on (d.id = td.destination)
					inner join counties c on (c.id = d.country)
					where t.id IN ('".implode("','",$tour_ids)."') AND d.id = '".$destination."'
					GROUP BY t.id
					ORDER BY t.id ASC";

		
		$tours = $this->db->query($tours_sql)->result();	
		if(!empty($tours)) {
			foreach ($tours as $key => $value) {
				$tour_id[] = $value->id;
			}
			$tour_id = implode(",",$tour_id);
		}		
		return $tour_id;
	}



	
}

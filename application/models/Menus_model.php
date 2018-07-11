<?php 

/**
 * 
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menus_model extends CI_Model
{
	
	public function get_menu_for_level($parent=0)
	{
		$data = array();
		$this->db->from('ion_menu');
		$this->db->where('parent_id',$parent);
		$result = $this->db->get();
	
		foreach($result->result() as $row)
		{
			$data[] = array(
					'menu_id' =>$row->id,
					'menu_title' =>$row->title,
					'menu_url' =>$row->url,
					'menu_parent' =>$row->parent_id,
					// recursive
					'child'	=>$this->get_menu_for_level($row->id),
				);
		}
		return $data;
	}
}
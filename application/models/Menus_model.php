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
		$group_id = usersInfo('group_id');
		$result = $this->db->query("SELECT g.`id` AS group_id, m.`id` AS menu_id, g.`name`, m.`title`, m.`url`, m.`parent_id`, m.`menu_order`  
									FROM ion_groups_permission gp 
									INNER JOIN ion_groups g ON gp.`group_id`=g.`id` 
									INNER JOIN ion_menu m ON m.`id`=gp.`permission_id`
									WHERE m.`parent_id`='$parent'
									AND g.`id`='$group_id'
									AND m.`is_active`='1'");
	
		foreach($result->result() as $row)
		{
			$data[] = array(
					'menu_id' =>$row->menu_id,
					'menu_title' =>$row->title,
					'menu_url' =>$row->url,
					'menu_parent' =>$row->parent_id,
					// recursive
					'child'	=>$this->get_menu_for_level($row->menu_id),
				);
		}
		return $data;
	}
}
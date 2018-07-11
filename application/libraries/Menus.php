<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus 
{
	public $CI=NULL;	

	public function get_menu($data, $parent = 0) {
		$CI =& get_instance();
		$CI->load->library('database');
		$CI->load->database();
		static $i = 1;
		$tab = str_repeat("\t\t", $i);
		if (isset($data[$parent])) {
			$html = "\n$tab<ul>";
			$i++;
			foreach ($data[$parent] as $v) {
				$child = get_menu($data, $v->id);
				$html .= "\n\t$tab<li>";
				$html .= '<a href="'.$v->url.'">'.$v->title.'</a>';
				if ($child) {
					$i--;
					$html .= $child;
					$html .= "\n\t$tab";
				}
				$html .= '</li>';
			}
			$html .= "\n$tab</ul>";
			return $html;
		} else {
			return false;
		}
		$result = $CI->db->query("SELECT * FROM ion_menu ORDER BY menu_order");
		while ($row = mysql_fetch_object($result)) {
			$data[$row->parent_id][] = $row;
		}
	}
}
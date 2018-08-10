<?php 

/**
 * 
 */
class Cctv extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('menus_model', 'menu');
		$arrGroups = array('admin','StaffOps');
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		} 
		elseif (!$this->ion_auth->in_group($arrGroups))
		{
			$groups = '';
			$i=0;
			foreach ($arrGroups as $row) {
				$groups .= $arrGroups[$i].',';
				$i++;
			}
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be a part of '.$groups.' to view this page');
		}
	}

	public function index()
	{
		// layout
			$data = array(
				'title' => 'CCTV', 
				'multilevel' => $this->menu->get_menu_for_level($parent=0),
				'breadcrumb' => 'CCTV',
				'cctv' => $this->db->query("SELECT id, name, latitude, longitude, url, description FROM m_cctv")->result_array(),
			);

			$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
							'style'  => $this->load->view('cctv/style', '', TRUE),
							'menu' => $this->load->view('layout/_menu', $data, TRUE),
							'index'  => $this->load->view('cctv/index', $data, TRUE),
							'js' => $this->load->view('cctv/js', '', TRUE), 
							'footer' => $this->load->view('layout/_footer', '', TRUE),
							);

			$this->load->view('layout/_main', $layout);
	}

	public function getBlinkCCTV()
	{
		$sql = "SELECT *, cctv_sta-accident_sta AS jarak 
				FROM (SELECT m_cctv.id, m_cctv.name, t_accident.`event_time`, ((m_cctv.sta_km*1000)+m_cctv.sta_m) AS cctv_sta, ((t_accident.sta_km*1000)+t_accident.sta_m) AS accident_sta
				FROM m_cctv JOIN t_accident) x1
				WHERE YEAR(event_time)=2018
				AND cctv_sta-accident_sta BETWEEN -2000 AND 2000";
		$query = $this->db->query($sql)->result_array();

		echo json_encode($query);
		exit;
	}
}
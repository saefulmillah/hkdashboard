<?php 

/**
 * 
 */
class GrafikTingkatFatalitas extends CI_Controller
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
			'title' => 'Grafik Tingkat Fatalitas', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Lalu Lintas > Grafik Tingkat Fatalitas'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('lalulintas/grafiktingkatfatalitas/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('lalulintas/grafiktingkatfatalitas/index', '', TRUE),
						'js' => $this->load->view('lalulintas/grafiktingkatfatalitas/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getDataTingkatKecelakaan()
	{
		// $dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT tyear, tmonth, lhr, accident_level, fatality_level, max_limit FROM v_accident_level_03 WHERE tyear=YEAR(CURDATE())";

		$query = $this->db->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}
}
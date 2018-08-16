<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->model('permission_model','permission');
		$this->load->model('menus_model', 'menu');
		$arrGroups = array('admin');
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
			'title' => 'Overview', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Overview'
		);

		// layout
		$layout = array('header' => $this->load->view('layout/overview/_overview_header', $data, TRUE),
						'style'  => $this->load->view('overview/style', '', TRUE),
						'menu' => $this->load->view('layout/overview/_overview_menu', $data, TRUE),
						'index'  => $this->load->view('overview/index', '', TRUE),
						'js' => $this->load->view('overview/js', '', TRUE), 
						'footer' => $this->load->view('layout/overview/_overview_footer', '', TRUE),
						);

		$this->load->view('layout/overview/_overview_main', $layout);
	}

	public function getDataRevenueDaily()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT (CASE WHEN Total_Rupiah IS NULL THEN 0 ELSE Total_Rupiah END) AS Total_Rupiah,
				       (CASE WHEN Total_lalin IS NULL THEN 0 ELSE Total_lalin END) AS Total_lalin
				FROM	
					(SELECT  FORMAT(SUM(Rupiah),0) AS Total_Rupiah,
						FORMAT(COUNT(*),0) AS Total_lalin
					FROM lalin
					WHERE DATE_FORMAT(Waktu, '%Y-%m-%d')=CURDATE()) x1;";
		$query = $dbATP->query($sql)->row();

		echo json_encode($query);
	}

	public function getDataRevenue()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "CALL sp_calculate_revenue_monthly_eoj (20000000000)";
		$query = $dbATP->query($sql)->row();

		echo json_encode($query);
	}

	public function getDataRevenueYearly()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "CALL sp_calculate_revenue_yearly (100000000000)";
		$query = $dbATP->query($sql)->row();

		echo json_encode($query);
	}	

	public function getDataMethodRevenue()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "CALL sp_calculate_method_monthly_eoj()";
		$query = $dbATP->query($sql)->row();

		echo json_encode($query);
	}

	public function getDataCCTV($isGT=0)
	{
		$sql = "SELECT * FROM m_cctv WHERE isGT=$isGT";
		$query = $this->db->query($sql)->result_array();

		echo json_encode($query);
	}

	public function getAccidentLevel()
	{
		$sql = "SELECT 
				tyear, tmonth, delta_days, segment_length, lhr, ROUND(accident_level,2) AS accident_level, max_limit,
				ROUND((100/max_limit)*100 ,1) AS AccidentPersen
				FROM v_accident_level_03 WHERE tyear=2018 AND tmonth=DATE_FORMAT(CURDATE(), '%m')";
		$query = $this->db->query($sql)->row();

		echo json_encode($query);	
	}
}

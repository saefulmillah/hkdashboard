<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->model('permission_model','permission');
		$this->load->model('menus_model', 'menu');
		$arrGroups = array('admin','StaffOps');
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		} 
		// elseif (!$this->ion_auth->in_group($arrGroups))
		// {
		// 	$groups = '';
		// 	$i=0;
		// 	foreach ($arrGroups as $row) {
		// 		$groups .= $arrGroups[$i].',';
		// 		$i++;
		// 	}
		// 	// redirect them to the home page because they must be an administrator to view this
		// 	return show_error('You must be a part of '.$groups.' to view this page');
		// }
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

	public function getDataRating()
	{
		$sql = "SELECT
					m.id,
					m.question,
					AVG( t.rating ) AS rating,
					ROUND( AVG( t.rating ) / 5 * 100 ) AS percent
				FROM
					m_questionaire_question m,
					t_questionaire_answer t 
				WHERE
					m.visible = '1' 
					AND m.id = t.question_id 
				GROUP BY
					m.id,
					m.question 
				ORDER BY
					sort_order ASC 
					LIMIT 4";
		$query = $this->db->query($sql)->result_array();

		echo json_encode($query);

	}

	public function getDataComplain()
	{
		$sql = "SELECT
					x1.tyear t_year,
					x1.tmonth t_month,
					SUM( CASE WHEN cf.id IS NOT NULL THEN 1 ELSE 0 END ) total,
					SUM( CASE WHEN STATUS = 1 THEN 1 ELSE 0 END ) OPEN,
					SUM( CASE WHEN STATUS = 2 THEN 1 ELSE 0 END ) CLOSE,
					( SELECT int_value FROM m_sysconfig WHERE id = 'customercomplaint.maxlimit' ) maxLimit,
					ROUND(
					SUM( CASE WHEN cf.id IS NOT NULL THEN 1 ELSE 0 END ) / ( SELECT int_value FROM m_sysconfig WHERE id = 'customercomplaint.maxlimit' ) * 100 
					) AS percent 
				FROM
					(
				SELECT
					2015 + pv1.i tyear,
					pv2.i tmonth 
				FROM
					pivot pv1,
					pivot pv2 
				WHERE
					( pv1.i BETWEEN 0 AND 20 ) 
					AND ( pv2.i BETWEEN 1 AND 12 ) 
					) x1
					LEFT OUTER JOIN t_customer_feedback cf ON (
					EXTRACT( YEAR FROM cf.event_time ) = x1.tyear 
					AND EXTRACT( MONTH FROM cf.event_time ) = x1.tmonth 
					AND cf.category = 1 
					) 
				WHERE
					1 = 1 
					AND x1.tyear = EXTRACT( YEAR FROM event_time ) 
					AND x1.tmonth = EXTRACT( MONTH FROM event_time ) 
				GROUP BY
					x1.tyear,
					x1.tmonth 
				ORDER BY
					x1.tyear DESC 
					LIMIT 1";
		$query = $this->db->query($sql)->row();

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
					tyear,
					tmonth,
					delta_days,
					segment_length,
					lhr,
					ROUND( accident_level, 2 ) AS accident_level,
					max_limit,
					ROUND( ( accident_level / max_limit ) * 100) AS AccidentPersen 
				FROM
					v_accident_level_03 
				WHERE
					tyear = 2018 
					AND tmonth = 8";
		$query = $this->db->query($sql)->row();

		echo json_encode($query);	
	}

	public function getRTMS()
	{
		$rtms_a = $this->db->query("SELECT jalur,speed FROM t_avg_speed WHERE jalur IN ('A','B') ORDER BY pcsdate DESC LIMIT 2")->result_array();

		echo json_encode($rtms_a);
	}
}

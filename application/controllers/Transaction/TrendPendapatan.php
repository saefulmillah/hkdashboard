<?php 

/**
 * 
 */
class TrendPendapatan extends CI_Controller
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
			'title' => 'Transaction', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Transaksi > Trend Pendapatan',
			'gerbang' => $this->db->query("SELECT id, name, code FROM m_toll_gate ORDER by name ASC")->result_array(),
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('transaction/trendpendapatan/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/trendpendapatan/index', '', TRUE),
						'js' => $this->load->view('transaction/trendpendapatan/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getDataTrendPendapatan()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$cond1 = '';

		if (!empty($this->input->post('start_date')) && !empty($this->input->post('end_date'))) {
			$start = $this->input->post('start_date');
			$end = $this->input->post('end_date');
			$cond1 .= "AND Tanggal >= '$start' AND tanggal < '$end'";
		} 

		if (!empty($this->input->post('hari'))) {
			$hari = $this->input->post('hari');
			$cond1 .= "AND DAYOFWEEK(tanggal)='$hari'";
		} 

		if (!empty($this->input->post('gerbang'))) {
			$gerbang = $this->input->post('gerbang');
			if ($gerbang<>'-') {
				$cond1 .= "AND NoGerbang='$gerbang'";
			}
		} 

		if (!empty($this->input->post('gardu'))) {
			$gardu = $this->input->post('gardu');
			if ($gardu<>'-') {
				$cond1 .= "AND NoGardu='$gardu'";
			}
		} 

		if (!empty($this->input->post('shift'))) {
			$shift = $this->input->post('shift');
			if ($shift<>'-') {
				$cond1 .= "AND Shift='$shift'";
			}
		} 


		
		$sql = "SELECT x1.*
				FROM
				(
						SELECT tanggal,
					    	SUM(tunai + mandiri + bri + bni + bca ) traffic,
					    	SUM(tunai) cash_traffic,
					    	SUM(mandiri + bri + bni + bca ) non_cash_traffic,
				    		SUM(rptunai) cash_revenue,
				    		SUM(rpbri + rpbni + rpbca) non_cash_revenue
						FROM eoj
			    		WHERE 1 = 1
			    		%s
						GROUP BY tanggal
						ORDER BY tanggal
			    ) x1";
		
		$strSql = sprintf($sql, $cond1);

		$query = $dbATP->query($strSql)->result_array();
		// echo $dbATP->last_query();
		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}
}
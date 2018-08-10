<?php 

/**
 * 
 */
class GrafikBulanan extends CI_Controller
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
			'breadcrumb' => 'Transaksi > Grafik Bulanan',
			'gerbang' => $this->db->query("SELECT id, name, code FROM m_toll_gate ORDER by name ASC")->result_array(),
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('transaction/GrafikBulanan/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/GrafikBulanan/index', '', TRUE),
						'js' => $this->load->view('transaction/GrafikBulanan/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getDataBulanan()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$cond1 = '';

		if (!empty($this->input->post('gerbang'))) {
			$gerbang = $this->input->post('gerbang');
			if ($gerbang<>'-') {
				$cond1 .= "AND NoGerbang='$gerbang'";
			}
		}

		if (!empty($this->input->post('tahun'))) {
			$tahun = $this->input->post('tahun');
			if ($tahun<>'-') {
				$cond1 .= "AND YEAR(tanggal)='$tahun'";
			}
		}
		
		$sql = "SELECT x2.a, x1.traffic, x1.cash_traffic, x1.non_cash_traffic, x1.cash_revenue, x1.non_cash_revenue FROM		
				(SELECT YEAR(tanggal) year1, MONTH(tanggal) month1,
				    	SUM(tunai + mandiri + bri + bni + bca ) traffic,
				    	SUM(tunai) cash_traffic,
				    	SUM(mandiri + bri + bni + bca ) non_cash_traffic,
			    		SUM(rptunai) cash_revenue,
			    		SUM(rpmandiri + rpbri + rpbni + rpbca) non_cash_revenue
		    		FROM eoj
					WHERE 1 = 1
					%s
					GROUP BY year1, month1
					ORDER BY month1) x1
				RIGHT JOIN
				(
				SELECT 1 a UNION SELECT 2 UNION SELECT 3
				UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7
				UNION SELECT 8 UNION SELECT 9 UNION SELECT 10  UNION SELECT 11 UNION SELECT 12
				) x2 ON x2.a = x1.month1";
		
		$strSql = sprintf($sql, $cond1);

		$query = $dbATP->query($strSql)->result_array();
		// echo $dbATP->last_query();
		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}
}
<?php 

/**
 * 
 */
class Grafik24Jam extends CI_Controller
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
			'breadcrumb' => 'Transaksi > Comparison',
			'gerbang' => $this->db->query("SELECT id, name, code FROM m_toll_gate ORDER by name ASC")->result_array(),
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('transaction/Grafik24Jam/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/Grafik24Jam/index', '', TRUE),
						'js' => $this->load->view('transaction/Grafik24Jam/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getData24Jam()
	{
		$dbATP = $this->load->database('atp', TRUE);
		if (!empty($this->input->post('gerbang'))) {
			$gerbang = $this->input->post('gerbang');
			$cond1 = "AND GERBANG='$gerbang'";
		} else {
			$cond1 = "";
		}
		
		$sql = "SELECT DATE_FORMAT(DATE_ADD(x1.day, INTERVAL x1.hour HOUR), '%%h:%%i-%%h:59') TIMESTAMP, x1.*
				FROM
				(
				    SELECT DATE(waktu) DAY, HOUR(waktu) HOUR, 
				    	SUM(1) traffic, 
				    	SUM(CASE WHEN metoda = 'Tunai/Umum' THEN 1 ELSE 0 END) cash_traffic,
						SUM(CASE WHEN metoda <> 'Tunai/Umum' THEN 1 ELSE 0 END) non_cash_traffic,
			    		SUM(CASE WHEN metoda = 'Tunai/Umum' THEN rupiah ELSE 0 END) cash_revenue,
						SUM(CASE WHEN metoda <> 'Tunai/Umum' THEN rupiah ELSE 0 END) non_cash_revenue,
						SUM(rupiah) total_revenue
					FROM lalin
					WHERE 1=1
					%s
					AND waktu > DATE_SUB(NOW(), INTERVAL 1 DAY) 
					GROUP BY DAY, HOUR
					ORDER BY DAY, HOUR
				) x1;";
		
		$strSql = sprintf($sql, $cond1);

		$query = $dbATP->query($strSql)->result_array();
		// echo $dbATP->last_query();
		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}
}
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
			'breadcrumb' => 'Transaksi > Comparison'
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
		$sql = "SELECT DATE_ADD(x1.day, INTERVAL x1.hour HOUR) TIMESTAMP, x1.*
				FROM
				(
				    SELECT DATE(waktu) DAY, HOUR(waktu) HOUR, 
				    	SUM(1) traffic, 
				    	SUM(CASE WHEN metoda = 'Tunai/Umum' THEN 1 ELSE 0 END) cash_traffic,
						SUM(CASE WHEN metoda <> 'Tunai/Umum' THEN 1 ELSE 0 END) non_cash_traffic,
			    		SUM(CASE WHEN metoda = 'Tunai/Umum' THEN rupiah ELSE 0 END) cash_revenue,
						SUM(CASE WHEN metoda <> 'Tunai/Umum' THEN rupiah ELSE 0 END) non_cash_revenue
					FROM lalin
					WHERE 
					waktu > DATE_SUB(NOW(), INTERVAL 1 DAY) 
					GROUP BY DAY, HOUR
					ORDER BY DAY, HOUR
				) x1;";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}
}
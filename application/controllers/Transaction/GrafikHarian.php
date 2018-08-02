<?php 

/**
 * 
 */
class GrafikHarian extends CI_Controller
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
			'title' => 'Grafik Harian', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Transaksi > Grafik Harian'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('transaction/GrafikHarian/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/GrafikHarian/index', '', TRUE),
						'js' => $this->load->view('transaction/GrafikHarian/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getDataHarian()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT x1.*
				FROM
				(
				    SELECT DATE(waktu) DAY, 
				    	SUM(1) traffic, 
				    	SUM(CASE WHEN metoda = 'Tunai/Umum' THEN 1 ELSE 0 END) cash_traffic,
						SUM(CASE WHEN metoda <> 'Tunai/Umum' THEN 1 ELSE 0 END) non_cash_traffic,
			    		SUM(CASE WHEN metoda = 'Tunai/Umum' THEN rupiah ELSE 0 END) cash_revenue,
						SUM(CASE WHEN metoda <> 'Tunai/Umum' THEN rupiah ELSE 0 END) non_cash_revenue,
						SUM(rupiah) total_revenue
					FROM lalin
					WHERE 
					DATE_FORMAT(waktu, '%m')=DATE_FORMAT(CURDATE(), '%m')
					GROUP BY DAY
					ORDER BY DAY
				) x1;";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}
}
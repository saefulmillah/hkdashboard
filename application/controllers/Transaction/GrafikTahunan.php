<?php 

/**
 * 
 */
class GrafikTahunan extends CI_Controller
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
			'breadcrumb' => 'Transaksi > Grafik Tahunan'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('transaction/GrafikTahunan/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/GrafikTahunan/index', '', TRUE),
						'js' => $this->load->view('transaction/GrafikTahunan/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getDataGrafikTahunan()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT x1.*
				FROM
				(
			    	SELECT x3.year, x3.traffic, x3.cash_traffic, x3.non_cash_traffic,
			    	       x5.rp_tunai cash_revenue, x5.rp_non_tunai non_cash_revenue, 
			    	       x5.rp_tunai+x5.rp_non_tunai AS total_revenue
			    	FROM
			    	(	
						SELECT YEAR(tanggal) YEAR,
					    	SUM(tunai + mandiri + bri + bni + bca ) traffic,
					    	SUM(tunai) cash_traffic,
					    	SUM(mandiri + bri + bni + bca ) non_cash_traffic,
				    		SUM(rptunai) cash_revenue,
				    		SUM(rpmandiri + rpbri + rpbni + rpbca) non_cash_revenue
						FROM eoj
						WHERE 1 = 1
						GROUP BY YEAR
			    	)x3
				   LEFT OUTER JOIN
				   (
						SELECT YEAR(tanggal) YEAR, SUM(rpbagihasiltunai) rp_tunai,
						SUM(rpbagihasiletollmandiri + rpbagihasiletollbri + rpbagihasiletollbni + rpbagihasiletollbtn + rpbagihasiletollbca ) rp_non_tunai 
						FROM bagihasil 
						WHERE 1 = 1 
						GROUP BY YEAR			
			   	   ) x5 ON x5.year = x3.year    		
				   ORDER BY x3.year
			    ) x1";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}
}
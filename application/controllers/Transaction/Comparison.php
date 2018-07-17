<?php 

/**
 * 
 */
class Comparison extends CI_Controller
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
						'style'  => $this->load->view('transaction/comparison/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/comparison/index', '', TRUE),
						'js' => $this->load->view('transaction/comparison/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getDataLalinAntarGerbang()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT 
					COUNT(1) AS total_lalin,
					Gerbang
				FROM
				lalin
				WHERE waktu >= 
						(
							SELECT 
							CASE 
							  WHEN (CAST(HOUR(NOW()) AS SIGNED) >= 7)  THEN DATE_ADD(CURRENT_DATE(),INTERVAL 7 HOUR)
							  ELSE DATE_ADD(DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY),INTERVAL 7 HOUR) 
							  END start_time
						) 
				GROUP BY Gerbang
				ORDER BY Gerbang";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);

	}

	public function getDataPendapatanAntarGerbang()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT 
					SUM(Rupiah) AS total_rupiah,
					Gerbang
				FROM
				lalin
				WHERE waktu >= 
						(
							SELECT 
							CASE 
							  WHEN (CAST(HOUR(NOW()) AS SIGNED) >= 7)  THEN DATE_ADD(CURRENT_DATE(),INTERVAL 7 HOUR)
							  ELSE DATE_ADD(DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY),INTERVAL 7 HOUR) 
							  END start_time
						) 
				GROUP BY Gerbang
				ORDER BY Gerbang";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);

	}

	public function getComparisonMethodPayment()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT 
				SUM(CASE WHEN metoda = 'Tunai/Umum' THEN rupiah ELSE 0 END) tunai,
				SUM(CASE WHEN metoda <> 'Tunai/Umum' THEN rupiah ELSE 0 END) non_tunai
				FROM lalin WHERE waktu >= 
					(
						SELECT 
						CASE 
						  WHEN (CAST(HOUR(NOW()) AS SIGNED) >= 7)  THEN DATE_ADD(CURRENT_DATE(),INTERVAL 7 HOUR)
						  ELSE DATE_ADD(DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY),INTERVAL 7 HOUR) 
						  END start_time
					)";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);

	}

	public function getNotranALRperGerbang()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT * FROM
				    (
				    	SELECT nogerbang, gerbang,  
				            SUM(CASE WHEN metoda = 'ALR' THEN 1 ELSE 0 END) sum_alr,
				            SUM(CASE WHEN metoda = 'LSB' THEN 1 ELSE 0 END) sum_lsb
				        FROM lalin WHERE waktu >= 
				    	(
				    		SELECT 
				    		CASE 
				    		  WHEN (CAST(HOUR(NOW()) AS SIGNED) >= 7)  THEN DATE_ADD(CURRENT_DATE(),INTERVAL 7 HOUR)
				    		  ELSE DATE_ADD(DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY),INTERVAL 7 HOUR) 
				    		  END start_time
				    	) 
				    	GROUP BY nogerbang, gerbang
				        ORDER BY gerbang
				    ) x3";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}

	public function getNotranLSBperGerbang()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "SELECT * FROM
				    (
				    	SELECT nogerbang, gerbang,  
				            SUM(CASE WHEN metoda = 'LSB' THEN 1 ELSE 0 END) sum_lsb
				        FROM lalin WHERE waktu >= 
				    	(
				    		SELECT 
				    		CASE 
				    		  WHEN (CAST(HOUR(NOW()) AS SIGNED) >= 7)  THEN DATE_ADD(CURRENT_DATE(),INTERVAL 7 HOUR)
				    		  ELSE DATE_ADD(DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY),INTERVAL 7 HOUR) 
				    		  END start_time
				    	) 
				    	GROUP BY nogerbang, gerbang
				        ORDER BY gerbang
				    ) x3";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}

	public function getLalinPerGolongan()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$sql = "	SELECT CONCAT('Golongan ',golongan) AS golongan, SUM(1) lalin
						FROM lalin WHERE waktu >= 
						(
							SELECT 
							CASE 
							  WHEN (CAST(HOUR(NOW()) AS SIGNED) >= 7)  THEN DATE_ADD(CURRENT_DATE(),INTERVAL 7 HOUR)
							  ELSE DATE_ADD(DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY),INTERVAL 7 HOUR) 
							  END start_time
						) 
					    GROUP BY golongan

				    ORDER BY golongan";

		$query = $dbATP->query($sql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}
}
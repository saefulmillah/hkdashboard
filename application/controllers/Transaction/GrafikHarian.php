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
		$this->load->library('PHPReport');
		$this->load->model('menus_model', 'menu');
		$this->load->model('LaporanHarian_model', 'LaporanHarian');
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
			'breadcrumb' => 'Transaksi > Grafik Harian',
			'gerbang' => $this->db->query("SELECT id, name, code FROM m_toll_gate ORDER by name ASC")->result_array(),
			'bulan' => $this->db->query("SELECT * FROM master_time WHERE Tahun=2018")->result_array(),
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('transaction/GrafikHarian/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/GrafikHarian/index', $data, TRUE),
						'js' => $this->load->view('transaction/GrafikHarian/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getDataHarian()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$strWhere = '';
		if (!empty($this->input->post('gerbang'))) {
			$bulan = $this->input->post('bulan');
			$gerbang = $this->input->post('gerbang');
			$strWhere .= "AND NoGerbang='$gerbang' ";
			$strWhere .= "AND DATE_FORMAT(waktu, '%m')=$bulan ";
		} else {
			$bulan = $this->input->post('bulan');
			$strWhere .= "AND DATE_FORMAT(waktu, '%m')=$bulan ";
		}

		$sql = "SELECT
					x1.* 
				FROM
					(
				SELECT
					DATE( waktu ) DAY,
					SUM( 1 ) traffic,
					SUM( CASE WHEN metoda = 'Tunai/Umum' THEN 1 ELSE 0 END ) cash_traffic,
					SUM( CASE WHEN metoda <> 'Tunai/Umum' THEN 1 ELSE 0 END ) non_cash_traffic,
					SUM( CASE WHEN metoda = 'Tunai/Umum' THEN rupiah ELSE 0 END ) cash_revenue,
					SUM( CASE WHEN metoda <> 'Tunai/Umum' THEN rupiah ELSE 0 END ) non_cash_revenue,
					SUM( rupiah ) total_revenue 
				FROM
					lalin 
				WHERE
					1 = 1 %s 
				GROUP BY
				DAY 
				ORDER BY
				DAY 
					) x1;";

		$strSql = sprintf($sql, $strWhere);

		$query = $dbATP->query($strSql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}

	public function getDataHarian2()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$strWhere = '';
		$strWhere .= "AND DATE_FORMAT(waktu, '%m')=8";

		$sql = "SELECT
					x1.* 
				FROM
					(
				SELECT
					DATE( waktu ) DAY,
					SUM( 1 ) traffic,
					SUM( CASE WHEN metoda = 'Tunai/Umum' THEN 1 ELSE 0 END ) cash_traffic,
					SUM( CASE WHEN metoda <> 'Tunai/Umum' THEN 1 ELSE 0 END ) non_cash_traffic,
					SUM( CASE WHEN metoda = 'Tunai/Umum' THEN rupiah ELSE 0 END ) cash_revenue,
					SUM( CASE WHEN metoda <> 'Tunai/Umum' THEN rupiah ELSE 0 END ) non_cash_revenue,
					SUM( rupiah ) total_revenue 
				FROM
					lalin 
				WHERE
					1 = 1 %s 
				GROUP BY
				DAY 
				ORDER BY
				DAY 
					) x1;";

		$strSql = sprintf($sql, $strWhere);

		$query = $dbATP->query($strSql)->result_array();

		$data = array(
			'series' => $query,
			);
		echo json_encode($query);
	}

	public function getExcel()
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
			$period = $this->input->post('tahun').'-'.$this->input->post('bulan');
			if ($period<>'-') {
				$cond1 .= "AND DATE_FORMAT(`tanggal`,'%Y-%c')='$period'";
			}
		}
		
		$sql = "SELECT timepoint, DATE_FORMAT(timepoint,'%%W') Hari, x2.* FROM (	
					SELECT
					      ADDDATE(STR_TO_DATE('$period-01','%%Y-%%m-%%d'),pv.i) timepoint
					      FROM pivot pv
					      WHERE ADDDATE('$period-01',INTERVAL pv.i DAY) <= LAST_DAY('$period-01')
				) x1

				LEFT OUTER JOIN

				(
				    SELECT 
					DATE_FORMAT(`tanggal`,'%%Y-%%m-%%d') AS tanggal, 
					YEAR(tanggal) year1, MONTH(tanggal) month1,
					SUM(tunai + mandiri + bri + bni + bca ) traffic,
					SUM(tunai) cash_traffic,
					SUM(mandiri + bri + bni + bca ) non_cash_traffic,
					SUM(rptunai) cash_revenue,
					SUM(rpmandiri + rpbri + rpbni + rpbca) non_cash_revenue,
					SUM(RpBNI+RpMandiri+RpBCA+RpBRI+RpTunai) revenue
					FROM eoj
					WHERE 1 = 1
					%s
					GROUP BY DATE_FORMAT(`tanggal`,'%%Y-%%m-%%d')
				) x2 ON x1.timepoint=x2.tanggal;";
		
		$strSql = sprintf($sql, $cond1);

		$data = $dbATP->query($strSql)->result_array();	

		$template = 'LaporanHarian.xls';
		//set absolute path to directory with template files
		$templateDir = "./";
		//set config for report
		$config = array(
			'template' => $template,
			'templateDir' => $templateDir
		);

		//load template
		$R = new PHPReport($config);
		$R->load(
					array(
			      		array(
				              'id' => 'header',
				              'data' => array('judul' => 'Data Lalu Lintas Harian dan Pendapatan Tol', 'periode' => $this->input->post('tahun'), 'gerbang' => (empty($this->input->post('gerbang'))) ? '-All-' : $this->input->post('gerbang'), 'exportDate' => date('d M Y H:i')),
				    	    ),
				      	array(
				              'id' => 'detail',
				              'repeat' => TRUE,
				              'data' => $data  
				    	    )
						)
		);

		  // define output directoy 
	      $output_file_dir = "./";
	      	
	      $output_file_excel = $output_file_dir  . "LaporanHarian_".date('dmYhis');
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);
	}
}
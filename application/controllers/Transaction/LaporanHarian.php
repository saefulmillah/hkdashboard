<?php 

/**
 * 
 */
class LaporanHarian extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->library('PHPReport');
		$this->load->helper('form');
        $this->load->helper('download');
		$this->load->model('LaporanHarian_model', 'LaporanHarian');
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
				'breadcrumb' => 'Transaksi > Laporan Harian'
			);

			$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
							'style'  => $this->load->view('transaction/LaporanHarian/style', '', TRUE),
							'menu' => $this->load->view('layout/_menu', $data, TRUE),
							'index'  => $this->load->view('transaction/LaporanHarian/index', '', TRUE),
							'js' => $this->load->view('transaction/LaporanHarian/js', '', TRUE), 
							'footer' => $this->load->view('layout/_footer', '', TRUE),
							);

			$this->load->view('layout/_main', $layout);
		}

	public function getLaporanHarian()
		{
			$list = $this->LaporanHarian->get_datatables();
	        $data = array();
	        $no = $_POST['start'];
	        foreach ($list as $rekaplalin) {
	            $no++;
	            $row = array();
	            $row[] = $no;
	            $row[] = $rekaplalin->tanggal;
	            $row[] = $rekaplalin->Gerbang;
	            $row[] = $rekaplalin->eToll_shift1;
	            $row[] = $rekaplalin->Tunai_shift1;
	            $row[] = number_format($rekaplalin->Rupiah_eToll_shift1,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_Tunai_shift1,2,",",".");
	            $row[] = $rekaplalin->eToll_shift2;
	            $row[] = $rekaplalin->Tunai_shift2;
	            $row[] = number_format($rekaplalin->Rupiah_eToll_shift2,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_Tunai_shift2,2,",",".");
	            $row[] = $rekaplalin->eToll_shift3;
	            $row[] = $rekaplalin->Tunai_shift3;
	            $row[] = number_format($rekaplalin->Rupiah_eToll_shift3,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_Tunai_shift3,2,",",".");
	            $row[] = $rekaplalin->Total_eToll;
	            $row[] = $rekaplalin->Total_Tunai;
	            $row[] = number_format($rekaplalin->Rupiah_eToll,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_Tunai,2,",",".");
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->LaporanHarian->count_all(),
	                        "recordsFiltered" => $this->LaporanHarian->count_filtered(),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
		}

	public function export_excel()
	{
		$dbATP = $this->load->database('atp', TRUE);
		$data = $dbATP->query("SELECT Gerbang,  
									SUM(CASE WHEN Metoda LIKE 'eToll%' AND Shift = 1 THEN Rupiah ELSE 0 END) AS eToll_shift1, 
									SUM(CASE WHEN Metoda LIKE '%Tunai%' AND Shift = 1 THEN Rupiah ELSE 0 END) AS Tunai_shift1,
									SUM(CASE WHEN Metoda LIKE 'eToll%' AND Shift = 2 THEN Rupiah ELSE 0 END) AS eToll_shift2, 
									SUM(CASE WHEN Metoda LIKE '%Tunai%' AND Shift = 2 THEN Rupiah ELSE 0 END) AS Tunai_shift2,
									SUM(CASE WHEN Metoda LIKE 'eToll%' AND Shift = 3 THEN Rupiah ELSE 0 END) AS eToll_shift3, 
									SUM(CASE WHEN Metoda LIKE '%Tunai%' AND Shift = 3 THEN Rupiah ELSE 0 END) AS Tunai_shift3,
									SUM(CASE WHEN Metoda LIKE '%eToll%' THEN Rupiah ELSE 0 END) AS Total_eToll,
									SUM(CASE WHEN Metoda LIKE '%Tunai%' THEN Rupiah ELSE 0 END) AS Total_Tunai
								FROM lalin
								WHERE waktu >= '2018-07-15T00:00:00' AND waktu < '2018-07-16T00:00:00'
								GROUP BY Gerbang")->result_array();

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
		              'id' => 'lapHarian',
		              'repeat' => TRUE,
		              'data' => $data  
		    	    ), 
		      array(
		      		'id' => 'total',
		      		'data' => array('eToll' => 1000) 
		      	)
		  );


	      // define output directoy 
	      $output_file_dir = "./";
	      	
	      $output_file_excel = $output_file_dir  . "LaporanHarian".date('dmYhis').".xlsx";
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);		
	}
}
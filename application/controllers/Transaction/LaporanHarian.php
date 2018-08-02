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
	            $row[] = $rekaplalin->Tunai_shift1;
	            $row[] = $rekaplalin->eToll_shift1;
	            $row[] = number_format($rekaplalin->Rupiah_Tunai_shift1,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_eToll_shift1,2,",",".");
	            $row[] = $rekaplalin->Tunai_shift2;
	            $row[] = $rekaplalin->eToll_shift2;
	            $row[] = number_format($rekaplalin->Rupiah_Tunai_shift2,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_eToll_shift2,2,",",".");
	            $row[] = $rekaplalin->Tunai_shift3;
	            $row[] = $rekaplalin->eToll_shift3;
	            $row[] = number_format($rekaplalin->Rupiah_Tunai_shift3,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_eToll_shift3,2,",",".");
	            $row[] = $rekaplalin->Total_Tunai;
	            $row[] = $rekaplalin->Total_eToll;
	            $row[] = number_format($rekaplalin->Rupiah_Tunai,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_eToll,2,",",".");
	 
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

	public function getExcel()
	{
		$startdate = $this->input->post('start_date');
		$dbATP = $this->load->database('atp', TRUE);
		$data = $this->LaporanHarian->getDataExport($startdate);

		$template = 'LaporanHarian.xls';
		//set absolute path to directory with template files
	    $templateDir = "./";
	    //set config for report
	     $config = array(
	       'template' => $template,
	       'templateDir' => $templateDir
	    );
	    
	    $total_etoll = 0;
		$total_tunai = 0;
		$total_rptunai = 0;
		$total_rpetoll = 0;
		$total_tunai_shift1 = 0;
		$total_etoll_shift1 = 0;
		$total_rupiah_tunai_shift1 = 0;
		$total_rupiah_etoll_shift1 = 0;
		$total_tunai_shift2 = 0;
		$total_etoll_shift2 = 0;
		$total_rupiah_tunai_shift2 = 0;
		$total_rupiah_etoll_shift2 = 0;
		$total_tunai_shift3 = 0;
		$total_etoll_shift3 = 0;
		$total_rupiah_tunai_shift3 = 0;
		$total_rupiah_etoll_shift3 = 0;
	     foreach ($data as $row) {
	     	$total_etoll += $row['Total_eToll'];	
	     	$total_tunai += $row['Total_Tunai'];	
	     	$total_rptunai += $row['Rupiah_Tunai'];	
	     	$total_rpetoll += $row['Rupiah_eToll'];	
			$total_tunai_shift1 += $row['Tunai_shift1'];
			$total_etoll_shift1 += $row['eToll_shift1'];
			$total_rupiah_tunai_shift1 += $row['Rupiah_Tunai_shift1'];
			$total_rupiah_etoll_shift1 += $row['Rupiah_eToll_shift1'];
			$total_tunai_shift2 += $row['Tunai_shift2'];
			$total_etoll_shift2 += $row['eToll_shift2'];
			$total_rupiah_tunai_shift2 += $row['Rupiah_Tunai_shift2'];
			$total_rupiah_etoll_shift2 += $row['Rupiah_eToll_shift2'];
			$total_tunai_shift3 += $row['Tunai_shift3'];
			$total_etoll_shift3 += $row['eToll_shift3'];
			$total_rupiah_tunai_shift3 += $row['Rupiah_Tunai_shift3'];
			$total_rupiah_etoll_shift3 += $row['Rupiah_eToll_shift3'];
	     }

	      //load template
	      $R = new PHPReport($config);
	      $R->load(
	      			array(
			      		array(
				              'id' => 'header',
				              'data' => array('startdate' => $startdate)
				    	    ),
			      		array(
				              'id' => 'footer',
				              'data' => array(	'Total_etoll' => $total_etoll, 
				              				  	'Total_tunai' => $total_tunai, 
				              				  	'Total_rptunai' => $total_rptunai, 
				              				  	'Total_rpetoll' => $total_rpetoll,
				              				  	'Total_Tunai_shift1' => $total_tunai_shift1,
												'Total_eToll_shift1' => $total_etoll_shift1,
												'Total_Rupiah_Tunai_shift1' => $total_rupiah_tunai_shift1,
												'Total_Rupiah_eToll_shift1' => $total_rupiah_etoll_shift1,
												'Total_Tunai_shift2' => $total_tunai_shift2,
												'Total_eToll_shift2' => $total_etoll_shift2,
												'Total_Rupiah_Tunai_shift2' => $total_rupiah_tunai_shift2,
												'Total_Rupiah_eToll_shift2' => $total_rupiah_etoll_shift2,
												'Total_Tunai_shift3' => $total_tunai_shift3,
												'Total_eToll_shift3' => $total_etoll_shift3,
												'Total_Rupiah_Tunai_shift3' => $total_rupiah_tunai_shift3,
												'Total_Rupiah_eToll_shift3' => $total_rupiah_etoll_shift3,
				              				)
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
	      	
	      $output_file_excel = $output_file_dir  . "LaporanHarian".date('dmYhis').".xlsx";
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);		
	}
}
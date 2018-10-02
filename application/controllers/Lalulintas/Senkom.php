<?php 
/**
 * 
 */
class Senkom extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('PHPReport');
		$this->load->model('Senkom_model', 'Senkom');
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
			'title' => 'Accident', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Lalu Lintas > Penanganan Senkom'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('lalulintas/senkom/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('lalulintas/senkom/index', '', TRUE),
						'js' => $this->load->view('lalulintas/senkom/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function main()
	{
		$data = $this->load->view('lalulintas/senkom/main', '', TRUE);
		echo $data;
	}

	public function add()
	{
		$data = array(
			'cuaca' => $this->Senkom->getEnumSet(1),
			'kendaraan' => $this->Senkom->getEnumSet(2),
			'kecelakaan' => $this->Senkom->getEnumSet(3),
			'posisiKecelakaan' => $this->Senkom->getEnumSet(4),
			'penyebabKecelakaan' => $this->Senkom->getEnumSet(5)
		);

		$layout = $this->load->view('lalulintas/senkom/add', $data, TRUE);
		echo $layout;
	}

	public function save()
	{
		$dataPost = array(
							'logged_time' => $this->input->post('logged_time').' '.$this->input->post('logged_time_hour').':'.$this->input->post('logged_time_minute'),
							'arrived_time' => $this->input->post('arrived_time').' '.$this->input->post('arrived_time_hour').':'.$this->input->post('arrived_time_minute'),
							'shift' => $this->input->post('shift'),
							'reporter_name' => $this->input->post('reporter_name'),
							'reporter_phone' => $this->input->post('reporter_phone'),
							'reporter_address' => $this->input->post('reporter_address'),
							'sta' => $this->input->post('lokasi_sta'),
							'lane' => $this->input->post('jalur'),
							'vehicle_type' => $this->input->post('kendaraan'),
							'vehicle_class' => $this->input->post('golongan'),
							'vehicle_identification_number' => $this->input->post('vehicle_identification_number'),
							'vehicle_support' => $this->input->post('vehicle_support'),
							'tow_code' => $this->input->post('tow_code'),
							'stp_number' => $this->input->post('stp_code'),
							'information' => $this->input->post('information'),
							'notes' => $this->input->post('notes')
						);
		// print_r($dataPost);
		$insert = $this->db->insert('t_senkom_handling', $dataPost);
		
		echo json_encode($insert);
	}

	public function getSenkom()
	{
		$list = $this->Senkom->get_datatables();
        $data = array();
        $no = $_POST['start_date'];
        foreach ($list as $listsenkom) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $listsenkom->shift;
            $row[] = $listsenkom->logged_time;
            $row[] = $listsenkom->arrived_time;
            $row[] = $listsenkom->reporter_name;
            $row[] = $listsenkom->reporter_phone;
            $row[] = $listsenkom->reporter_address;
            $row[] = $listsenkom->sta;
            $row[] = $listsenkom->lane;
            $row[] = $listsenkom->vehicle_type;
            $row[] = $listsenkom->vehicle_class;
            $row[] = $listsenkom->vehicle_identification_number;
            $row[] = $listsenkom->vehicle_support;
            $row[] = $listsenkom->tow_code;
            $row[] = $listsenkom->information;
            $row[] = $listsenkom->notes;

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Senkom->count_all(),
                        "recordsFiltered" => $this->Senkom->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function getExcel()
	{
		$startdate = $this->input->post('start_date');
		$enddate = $this->input->post('end_date');
		$data = $this->Senkom->getDataExport($startdate, $enddate);

		$template = 'lalulintassenkomhandling.xls';
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
				              'data' => array('startdate' => $startdate, 'enddate' => $enddate)
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
	      	
	      $output_file_excel = $output_file_dir  . "lalulintassenkomhandling_".date('dmYhis').".xlsx";
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);
	}
}
<?php 
/**
 * 
 */
class Accident extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('PHPReport');
		$this->load->model('Accident_model', 'Accident');
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
			'breadcrumb' => 'Lalu Lintas > Kecelakaan'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('lalulintas/accident/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('lalulintas/accident/index', '', TRUE),
						'js' => $this->load->view('lalulintas/accident/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function main()
	{
		$data = $this->load->view('lalulintas/accident/main', '', TRUE);
		echo $data;
	}

	public function add()
	{
		$data = array(
			'cuaca' => $this->Accident->getEnumSet(1),
			'kendaraan' => $this->Accident->getEnumSet(2),
			'kecelakaan' => $this->Accident->getEnumSet(3),
			'posisiKecelakaan' => $this->Accident->getEnumSet(4),
			'penyebabKecelakaan' => $this->Accident->getEnumSet(5)
		);

		$layout = $this->load->view('lalulintas/accident/add', $data, TRUE);
		echo $layout;
	}

	public function save()
	{
		$dataPost = array(
							'event_time' => $this->input->post('event_time').' '.$this->input->post('event_time_hour').':'.$this->input->post('event_time_minute'),
							'sta' => $this->input->post('sta_km').'+'.$this->input->post('sta_m'),
							'sta_km' => $this->input->post('sta_km'),
							'sta_m' => $this->input->post('sta_m'),
							'lane' => $this->input->post('jalur'),
							'position_id' => $this->input->post('posisi'),
							'weather_id' => $this->input->post('cuaca'),
							'accident_type_id' => $this->input->post('jenisKecelakaan'),
							'vehicle_type_id' => $this->input->post('kendaraan'),
							'cause_id' => $this->input->post('sebabKecelakaan'),
							'driver_gender' => $this->input->post('GenderDriver'),
							'light_injury' => $this->input->post('jmlLukaRingan'),
							'heavy_injury' => $this->input->post('jmlLukaBerat'),
							'fatality' => $this->input->post('jmlMeninggal'),
							'remarks' => $this->input->post('remarks'),
							'create_by' => 'ADMIN',
							'create_time' => date('Y-m-d H:i:s'),
							'update_by' => 'ADMIN',
							'update_time' => date('Y-m-d H:i:s'),	
						);
		$insert = $this->db->insert('t_accident', $dataPost);
		
		echo json_encode($insert);
	}

	public function getAccident()
	{
		$list = $this->Accident->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $listacd) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $listacd->event_time;
            $row[] = $listacd->sta;
            $row[] = $listacd->lane;
            $row[] = $listacd->posisi;
            $row[] = $listacd->wheather;
            $row[] = $listacd->accident_type;
            $row[] = $listacd->vehicle;
            $row[] = $listacd->cause;
            $row[] = $listacd->Gender;
            $row[] = $listacd->light_injury;
            $row[] = $listacd->heavy_injury;
            $row[] = $listacd->fatality;
            $row[] = $listacd->remarks;

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Accident->count_all(),
                        "recordsFiltered" => $this->Accident->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function getExcel()
	{
		$startdate = $this->input->post('start_date');
		$enddate = $this->input->post('end_date');
		$data = $this->Accident->getDataExport($startdate, $enddate);

		$template = 'lalulintasaccident.xls';
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
	      	
	      $output_file_excel = $output_file_dir  . "lalulintasaccident_".date('dmYhis').".xlsx";
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);
	}
}
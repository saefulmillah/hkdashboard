<?php 
/**
 * 
 */
class Potholes extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('PHPReport');
		$this->load->model('Potholes_model', 'Potholes');
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
			'title' => 'Potholes', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Lalu Lintas > Potholes'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('lalulintas/potholes/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('lalulintas/potholes/index', '', TRUE),
						'js' => $this->load->view('lalulintas/potholes/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function main()
	{
		$data = $this->load->view('lalulintas/potholes/main', '', TRUE);
		echo $data;
	}

	public function add()
	{
		$data = array(
			'cuaca' => $this->Potholes->getEnumSet(1),
			'kendaraan' => $this->Potholes->getEnumSet(2),
			'kecelakaan' => $this->Potholes->getEnumSet(3),
			'posisiKecelakaan' => $this->Potholes->getEnumSet(4),
			'penyebabKecelakaan' => $this->Potholes->getEnumSet(5)
		);

		$layout = $this->load->view('lalulintas/potholes/add', $data, TRUE);
		echo $layout;
	}

	public function save()
	{
		$dataPost = array(
							'waktu' => $this->input->post('event_time').' '.$this->input->post('event_time_hour').':'.$this->input->post('event_time_minute'),
							'sta' => $this->input->post('sta_km').'+'.$this->input->post('sta_m'),
							'lane' => $this->input->post('jalur'),
							'position_id' => $this->input->post('posisi'),
							'lajur' => $this->input->post('lajur'),
							'potholes_type' => $this->input->post('potholes_type'),
							'pelapor' => $this->input->post('pelapor'),
							'create_by' => 'ADMIN',
							'create_date' => date('Y-m-d H:i:s'),
						);
		$insert = $this->db->insert('t_potholes', $dataPost);
		
		echo json_encode($insert);
	}

	public function saveHandling()
	{
		$dataPost = array(
							'potholes_id' => $this->input->post('potholes_id'),
							'waktu' => $this->input->post('event_time').' '.$this->input->post('event_time_hour').':'.$this->input->post('event_time_minute'),
							'notes' => $this->input->post('notes'),
							'status' => $this->input->post('status'),
							'create_by' => 'ADMIN',
							'create_date' => date('Y-m-d H:i:s'),
		 				);

		$insert = $this->db->insert('t_potholes_handling', $dataPost);
		
		echo json_encode($insert);
	}

	public function getPotholes()
	{
		$list = $this->Potholes->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $listPotholes) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<a href="javascript:;" data-toggle="modal" data-target="#myModal" id="handle" onClick="handle_getPotholes('.$listPotholes->id.')">handle</a>';
            $row[] = $listPotholes->waktu;
			$row[] = $listPotholes->sta;
			$row[] = $listPotholes->lane;
			$row[] = $listPotholes->position_id;
			$row[] = $listPotholes->lajur;
			$row[] = $listPotholes->potholes_type;
			$row[] = $listPotholes->pelapor;
			$row[] = $listPotholes->foto;
			$row[] = $listPotholes->status;
			$row[] = $listPotholes->create_by;
			$row[] = $listPotholes->create_date;

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Potholes->count_all(),
                        "recordsFiltered" => $this->Potholes->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function getPotholeID()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM t_potholes WHERE id='$id'")->result_array();

		echo json_encode($data);
	}

	public function getExcel()
	{
		$startdate = $this->input->post('start_date');
		$enddate = $this->input->post('end_date');
		$data = $this->Potholes->getDataExport($startdate, $enddate);

		$template = 'lalulintasPotholes.xls';
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
	      	
	      $output_file_excel = $output_file_dir  . "lalulintasPotholes_".date('dmYhis').".xlsx";
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);
	}
}
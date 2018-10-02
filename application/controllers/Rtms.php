<?php 
/**
 * 
 */
class Rtms extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('PHPReport');
		$this->load->model('Rtms_model', 'Rtms');
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
			'breadcrumb' => 'Lalu Lintas > Penanganan Rtms'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('rtms/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('rtms/index', '', TRUE),
						'js' => $this->load->view('rtms/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function main()
	{
		$data = $this->load->view('rtms/main', '', TRUE);
		echo $data;
	}

	public function add()
	{
		$data = array(
			'posisiKecelakaan' => $this->Rtms->getEnumSet(4),
		);

		$layout = $this->load->view('rtms/add', $data, TRUE);
		echo $layout;
	}

	public function getRtms()
	{
		$list = $this->Rtms->get_datatables();
        $data = array();
        $no = $_POST['start_date'];
        foreach ($list as $listRtms) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $listRtms->shift;
            $row[] = $listRtms->speed;
            $row[] = $listRtms->jalur;
            $row[] = $listRtms->pcsdate;

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Rtms->count_all(),
                        "recordsFiltered" => $this->Rtms->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function save()
	{
		$dataPost = array(
							'pcsdate' => $this->input->post('logged_time').' '.$this->input->post('logged_time_hour').':'.$this->input->post('logged_time_minute'),
							'shift' => $this->input->post('shift'),
							'jalur' => $this->input->post('jalur'),
							'speed' => $this->input->post('kecepatan'),
						);
		// print_r($dataPost);
		$insert = $this->db->insert('t_avg_speed', $dataPost);
		
		echo json_encode($insert);
	}

	public function getExcel()
	{
		$startdate = $this->input->post('start_date');
		$enddate = $this->input->post('end_date');
		$data = $this->Rtms->getDataExport($startdate, $enddate);

		$template = 'lalulintasRtmshandling.xls';
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
	      	
	      $output_file_excel = $output_file_dir  . "lalulintasRtmshandling_".date('dmYhis').".xlsx";
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);
	}
}
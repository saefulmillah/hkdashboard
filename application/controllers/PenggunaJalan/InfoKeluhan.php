<?php 

/**
 * 
 */
class InfoKeluhan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('PHPReport');
		$this->load->model('InfoKeluhan_model', 'InfoKeluhan');
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
		$date = $this->db->query("SELECT * FROM master_time WHERE Tahun=2018")->result_array();
		$bulan = '';
		foreach ($date as $rowdate) {
			$bulan .= '<option value="'.$rowdate['Bulan'].'">'.$rowdate['Bulan'].'</option>';
		}

		// layout
		$data = array(
			'title' => 'Pengguna Jalan', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Pengguna Jalan > Info / Keluhan Pengguna Jalan',
			'bulan' => $bulan
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('penggunajalan/infokeluhan/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('penggunajalan/infokeluhan/index', $data, TRUE),
						'js' => $this->load->view('penggunajalan/infokeluhan/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getInfoKeluhan()
	{
		$list = $this->InfoKeluhan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<a href="#">View</a>';
            $row[] = '<a href="#">Delete</a>';
            $row[] = ($item->status==1) ? 'OPEN' : 'CLOSE' ;
            $row[] = $item->event_time;
            $row[] = categoryKeluhan((int)$item->category);
            $row[] = $item->description;
            $row[] = $item->notes;
            $row[] = $item->phone;
            $row[] = $item->email;
            $row[] = $item->create_time;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->InfoKeluhan->count_all(),
                        "recordsFiltered" => $this->InfoKeluhan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function getBulanTahun($tipe = 0)
	{
		$date = $this->db->query("SELECT * FROM master_time WHERE Tahun=2018")->result_array();
		$html = '';
		if ($tipe==1) {
			$html .= '<label>Tahun</label>&nbsp;';
			$html .= '<select class="form-control form-control-sm" name="tahun" id="tahun">';
			$html .= '<option value="2018">2018</option>';
			$html .= '</select>&nbsp;';
			$html .= '<label>Bulan</label>&nbsp;';
			$html .= '<select class="form-control form-control-sm" name="bulan" id="bulan">';
			foreach ($date as $rowdate) {
				$html .= '<option value="'.$rowdate['Bulan'].'">'.$rowdate['Bulan'].'</option>';
			}
			$html .= '</select>';
		} else {
			$html .= '&nbsp;<label>Date</label>';
		  	$html .= '&nbsp;<input type="text" name="start_date" id="start_date" class="form-control form-control-sm shadow-sm" placeholder="Start date" autocomplete="off" value="'.date('Y-m-d').'">';
		}

		echo $html;
	}

	public function getExcel()
	{
		$startdate = $this->input->post('start_date');
		$enddate = $this->input->post('end_date');
		$data = $this->InfoKeluhan->getDataExport();

		$template = 'penggunajalaninfokeluhan.xls';
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
	      	
	      $output_file_excel = $output_file_dir  . "penggunajalaninfokeluhan_".date('dmYhis').".xlsx";
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);
	}
}
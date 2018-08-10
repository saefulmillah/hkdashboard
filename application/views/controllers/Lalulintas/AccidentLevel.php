<?php 
/**
 * 
 */
class AccidentLevel extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('AccidentLevel_model', 'AccidentLevel');
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
			'title' => 'Accident Level', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Lalu Lintas > Tingkat Kecelakaan'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('lalulintas/accidentlevel/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('lalulintas/accidentlevel/index', '', TRUE),
						'js' => $this->load->view('lalulintas/accidentlevel/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function main()
	{
		$data = $this->load->view('lalulintas/accidentlevel/main', '', TRUE);
		echo $data;
	}

	public function getAccidentLevel()
	{
		$list = $this->AccidentLevel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $listacdlvl) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $listacdlvl->tyear; 
            $row[] = $listacdlvl->tmonth; 
            $row[] = round($listacdlvl->accident_level,2); 
            $row[] = round($listacdlvl->fatality_level,2); 
            $row[] = $listacdlvl->lhr; 
            $row[] = $listacdlvl->max_limit;

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->AccidentLevel->count_all(),
                        "recordsFiltered" => $this->AccidentLevel->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
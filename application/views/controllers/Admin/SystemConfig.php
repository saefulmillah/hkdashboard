<?php 
/**
 * 
 */
class SystemConfig extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('SystemConfig_model', 'SystemConfig');
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
			'title' => 'System Configuration', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Admin > System Configuration'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('admin/systemconfig/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('admin/systemconfig/index', '', TRUE),
						'js' => $this->load->view('admin/systemconfig/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function main()
	{
		$data = $this->load->view('admin/systemconfig/main', '', TRUE);
		echo $data;
	}

	public function add()
	{
		$layout = $this->load->view('admin/systemconfig/add', '', TRUE);
		echo $layout;
	}

	public function save()
	{
		$dataPost = array(
							'id' => $this->input->post('name'),
							'string_value' => $this->input->post('stringValue'),
							'int_value' => $this->input->post('IntValue'),
							'double_value' => $this->input->post('FloatValue'),
							'description' => $this->input->post('description'),	
						);
		$insert = $this->db->insert('m_sysconfig', $dataPost);
		
		echo json_encode($insert);
	}

	public function getSystemConfig()
	{
		$list = $this->SystemConfig->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $listSystemConfig) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $listSystemConfig->id;
            $row[] = $listSystemConfig->string_value;
            $row[] = $listSystemConfig->int_value;
            $row[] = $listSystemConfig->double_value;
            $row[] = $listSystemConfig->date_value;
            $row[] = $listSystemConfig->description;

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->SystemConfig->count_all(),
                        "recordsFiltered" => $this->SystemConfig->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
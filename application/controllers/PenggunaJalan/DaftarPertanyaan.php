<?php 

/**
 * 
 */
class DaftarPertanyaan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('DaftarPertanyaan_model', 'DaftarPertanyaan');
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
			'title' => 'Pengguna Jalan', 
			'multilevel' => $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Pengguna Jalan > Daftar Pertanyaan'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('penggunajalan/daftarpertanyaan/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('penggunajalan/daftarpertanyaan/index', '', TRUE),
						'js' => $this->load->view('penggunajalan/daftarpertanyaan/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getDaftarPertanyaan()
	{
		$list = $this->DaftarPertanyaan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->question_group;
            $row[] = $item->question;
            $row[] = $item->sort_order;
            $row[] = $item->visible;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->DaftarPertanyaan->count_all(),
                        "recordsFiltered" => $this->DaftarPertanyaan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
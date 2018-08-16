<?php 

/**
 * 
 */
class PenilaianPelanggan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('PenilaianPelanggan_model', 'PenilaianPelanggan');
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
			'breadcrumb' => 'Pengguna Jalan > Penilaian Pelanggan'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('penggunajalan/penilaianpelanggan/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('penggunajalan/penilaianpelanggan/index', '', TRUE),
						'js' => $this->load->view('penggunajalan/penilaianpelanggan/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getPenilaianPelanggan()
	{
		$list = $this->PenilaianPelanggan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->create_time;
            $row[] = $item->phone;
            $row[] = $item->remarks;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->PenilaianPelanggan->count_all(),
                        "recordsFiltered" => $this->PenilaianPelanggan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
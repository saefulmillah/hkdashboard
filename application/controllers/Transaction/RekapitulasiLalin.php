<?php 
/**
 * 
 */
class RekapitulasiLalin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('RekapitulasiLalin_model', 'RekapitulasiLalin');
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
			'breadcrumb' => 'Transaksi > Rekapitulasi Lalin'
		);

		$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
						'style'  => $this->load->view('transaction/RekapitulasiLalin/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/RekapitulasiLalin/index', '', TRUE),
						'js' => $this->load->view('transaction/RekapitulasiLalin/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function getRekapitulasiLalin()
	{
		$list = $this->RekapitulasiLalin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rekaplalin) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $rekaplalin->gerbang;
            $row[] = $rekaplalin->nogardu;
            $row[] = $rekaplalin->lalin1;
            $row[] = number_format($rekaplalin->rp1,2,",",".");
            $row[] = $rekaplalin->lalin2;
            $row[] = number_format($rekaplalin->rp2,2,",",".");
            $row[] = $rekaplalin->lalin3;
            $row[] = number_format($rekaplalin->rp3,2,",",".");
            $row[] = $rekaplalin->lalin4;
            $row[] = number_format($rekaplalin->rp4,2,",",".");
            $row[] = $rekaplalin->lalin5;
            $row[] = number_format($rekaplalin->rp5,2,",",".");
            $row[] = $rekaplalin->total;
            $row[] = number_format($rekaplalin->rptotal,2,",",".");
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->RekapitulasiLalin->count_all(),
                        "recordsFiltered" => $this->RekapitulasiLalin->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}
}
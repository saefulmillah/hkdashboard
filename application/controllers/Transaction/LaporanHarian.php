<?php 

/**
 * 
 */
class LaporanHarian extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('LaporanHarian_model', 'LaporanHarian');
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
				'breadcrumb' => 'Transaksi > Laporan Harian'
			);

			$layout = array('header' => $this->load->view('layout/_header',  $data, TRUE),
							'style'  => $this->load->view('transaction/LaporanHarian/style', '', TRUE),
							'menu' => $this->load->view('layout/_menu', $data, TRUE),
							'index'  => $this->load->view('transaction/LaporanHarian/index', '', TRUE),
							'js' => $this->load->view('transaction/LaporanHarian/js', '', TRUE), 
							'footer' => $this->load->view('layout/_footer', '', TRUE),
							);

			$this->load->view('layout/_main', $layout);
		}

	public function getLaporanHarian()
		{
			$list = $this->LaporanHarian->get_datatables();
	        $data = array();
	        $no = $_POST['start'];
	        foreach ($list as $rekaplalin) {
	            $no++;
	            $row = array();
	            $row[] = $no;
	            $row[] = $rekaplalin->Gerbang;
	            $row[] = $rekaplalin->eToll_shift1;
	            $row[] = $rekaplalin->Tunai_shift1;
	            $row[] = $rekaplalin->Rupiah_eToll_shift1;
	            $row[] = $rekaplalin->Rupiah_Tunai_shift1;
	            $row[] = $rekaplalin->eToll_shift2;
	            $row[] = $rekaplalin->Tunai_shift2;
	            $row[] = $rekaplalin->Rupiah_eToll_shift2;
	            $row[] = $rekaplalin->Rupiah_Tunai_shift2;
	            $row[] = $rekaplalin->eToll_shift3;
	            $row[] = $rekaplalin->Tunai_shift3;
	            $row[] = $rekaplalin->Rupiah_eToll_shift3;
	            $row[] = $rekaplalin->Rupiah_Tunai_shift3;
	            $row[] = $rekaplalin->Total_eToll;
	            $row[] = $rekaplalin->Total_Tunai;
	            $row[] = number_format($rekaplalin->Rupiah_eToll,2,",",".");
	            $row[] = number_format($rekaplalin->Rupiah_Tunai,2,",",".");
	 
	            $data[] = $row;
	        }
	 
	        $output = array(
	                        "draw" => $_POST['draw'],
	                        "recordsTotal" => $this->LaporanHarian->count_all(),
	                        "recordsFiltered" => $this->LaporanHarian->count_filtered(),
	                        "data" => $data,
	                );
	        //output to json format
	        echo json_encode($output);
		}
}
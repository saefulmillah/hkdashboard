<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$arrGroups = array('admin','StaffOps', 'VMSOps');
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
		// echo $tampil
		$this->load->model('menu_model', 'menu');

		$data['menu'] = $this->menu->category_menu();

		$layout = array('header' => $this->load->view('layout/_header', '', TRUE),
						'style'  => $this->load->view('transaction/comparison/style.php', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('transaction/comparison/index.php', '', TRUE),
						'js' => $this->load->view('transaction/comparison/js.php', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}

	public function antam()
	{
		echo "asdasd";
	}
}
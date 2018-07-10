<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller
{
	
	public function index()
	{
		// layout
		$layout = array('header' => $this->load->view('layout/_header', '', TRUE),
						'style'  => $this->load->view('transaction/comparison/style.php', '', TRUE),
						'menu' => $this->load->view('layout/_menu', '', TRUE),
						'index'  => $this->load->view('transaction/comparison/index.php', '', TRUE),
						'js' => $this->load->view('transaction/comparison/js.php', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}
}
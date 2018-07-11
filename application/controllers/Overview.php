<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {

	public function index()
	{
		// layout
		$layout = array('header' => $this->load->view('layout/_header', '', TRUE),
						'style'  => $this->load->view('overview/style.php', '', TRUE),
						'menu' => $this->load->view('layout/_menu', '', TRUE),
						'index'  => $this->load->view('overview/index.php', '', TRUE),
						'js' => $this->load->view('overview/js.php', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
	}
}

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Permission extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
        $this->load->model('permission_model','permission');
		$this->load->model('menus_model', 'menu');
		$arrGroups = array('admin');
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
			'title'		=> 'Permission', 
			'multilevel'=> $this->menu->get_menu_for_level($parent=0),
			'breadcrumb' => 'Permission'
		);

		$layout = array('header' => $this->load->view('layout/_header', $data, TRUE),
						'style'  => $this->load->view('permission/style', '', TRUE),
						'menu' => $this->load->view('layout/_menu', $data, TRUE),
						'index'  => $this->load->view('permission/index', '', TRUE),
						'js' => $this->load->view('permission/js', '', TRUE), 
						'footer' => $this->load->view('layout/_footer', '', TRUE),
						);

		$this->load->view('layout/_main', $layout);
    }
 
    public function ajax_list()
    {
        $list = $this->permission->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $permission) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $permission->name;
            $row[] = $permission->description;
            $row[] = $permission->create_by;
            $row[] = $permission->create_time;
            $row[] = $permission->update_by;
            $row[] = $permission->update_time;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->permission->count_all(),
                        "recordsFiltered" => $this->permission->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}
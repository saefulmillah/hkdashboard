<?php 
/**
 * 
 */

class InfoKeluhan_model extends CI_Model
{
	var $select = 'event_time,category,description,phone,email,status,notes,create_time';
    var $table = 't_customer_feedback';
	var $column_order = array('event_time','category','description','phone','email','status','notes');
	var $column_search = array('event_time','category','description','phone','email','status','notes');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
        $this->dbATP = $this->load->database('atp', TRUE);
	}

    public function getDataExport()
    {
        if($this->input->post('tahun')!='-')
        {
            $this->db->where("DATE_FORMAT(event_time,'%Y')", $this->input->post('tahun'));
        }

        if($this->input->post('bulan')!='-')
        {
            $this->db->where("DATE_FORMAT(event_time,'%c')", $this->input->post('bulan'));
        }

        if ($this->input->post('category')!='-') {
            
            $this->db->where("category", $this->input->post('category'));
        }

        if ($this->input->post('info_keluhan')!='') {
            $this->db->like("description", $this->input->post('info_keluhan'));
        }

        $this->db->select($this->select);
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result_array();
    }

	private function _get_datatables_query()
	{
		//add custom filter here

        if($this->input->post('tahun')!='-')
        {
            $this->db->where("DATE_FORMAT(event_time,'%Y')", $this->input->post('tahun'));
        }

        if($this->input->post('bulan')!='-')
        {
            $this->db->where("DATE_FORMAT(event_time,'%c')", $this->input->post('bulan'));
        }

        if ($this->input->post('category')!='-') {
            
            $this->db->where("category", $this->input->post('category'));
        }

        if ($this->input->post('info_keluhan')!='') {
            $this->db->like("description", $this->input->post('info_keluhan'));
        }

        $this->db->select($this->select);
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}

	function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->select($this->select);
        $this->db->from($this->table);
        // $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
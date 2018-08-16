<?php 
/**
 * 
 */
class KejadianKhusus_model extends CI_Model
{
	var $select = 'NoGerbang, Gerbang, NoGardu, Shift, Waktu, STATUS, Golongan, Metoda, IdKspt, IdPul';
    var $table = 'lalin';
	var $column_order = array('NoGerbang', 'Gerbang', 'NoGardu', 'Shift', 'Waktu', 'STATUS', 'Golongan', 'Metoda', 'IdKspt', 'IdPul');
	var $column_search = array('NoGerbang', 'Gerbang', 'NoGardu', 'Shift', 'Waktu', 'STATUS', 'Golongan', 'Metoda', 'IdKspt', 'IdPul');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
        $this->dbATP = $this->load->database('atp', TRUE);
	}

    public function getDataExport($startdate)
    {
        $this->dbATP->select($this->select);
        $this->dbATP->from($this->table);
        $this->dbATP->where("DATE_FORMAT(Tanggal,'%Y-%m-%d')", $startdate);
        $this->dbATP->group_by('Gerbang');
        $query = $this->dbATP->get();
        return $query->result_array();
    }

	private function _get_datatables_query()
	{
		//add custom filter here
        if($this->input->post('start_date'))
        {
            $this->dbATP->where("DATE_FORMAT(Waktu,'%Y-%m-%d')", $this->input->post('start_date'));
        } else {
            $this->dbATP->where("DATE_FORMAT(Waktu,'%Y-%m-%d') >= CURDATE()");
        }

        $this->dbATP->select($this->select);
        $this->dbATP->from($this->table);
        $this->dbATP->where("metoda IN ('ALR','LSB','Dinas Operasional','Langganan AU')");
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->dbATP->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->dbATP->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->dbATP->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->dbATP->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->dbATP->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->dbATP->order_by(key($order), $order[key($order)]);
        }
	}

	function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->dbATP->limit($_POST['length'], $_POST['start']);
        $query = $this->dbATP->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->dbATP->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->dbATP->select($this->select);
        $this->dbATP->from($this->table);
        $this->dbATP->where("metoda IN ('ALR','LSB','Dinas Operasional','Langganan AU')");
        $this->dbATP->where("DATE_FORMAT(Waktu, '%Y-%m-%d')=CURDATE()");
        // $this->dbATP->from($this->table);
        return $this->dbATP->count_all_results();
    }
}
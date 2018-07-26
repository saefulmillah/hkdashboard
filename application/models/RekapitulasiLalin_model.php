<?php 
/**
 * 
 */
class RekapitulasiLalin_model extends CI_Model
{
	var $select = "NoGerbang AS nogerbang,
                  Gerbang AS gerbang,
                  NoGardu AS nogardu,
                  Tanggal AS tanggal,
                  SUM((CASE WHEN (Golongan = 1) THEN ((((RpTunai + RpMandiri) + RpBRI) + RpBNI) + RpBCA) ELSE 0 END)) AS rp1,
                  SUM((CASE WHEN (Golongan = 1) THEN ((((Tunai + Mandiri) + BRI) + BNI) + BCA) ELSE 0 END)) AS lalin1,
                  SUM((CASE WHEN (Golongan = 2) THEN ((((RpTunai + RpMandiri) + RpBRI) + RpBNI) + RpBCA) ELSE 0 END)) AS rp2,
                  SUM((CASE WHEN (Golongan = 2) THEN ((((Tunai + Mandiri) + BRI) + BNI) + BCA) ELSE 0 END)) AS lalin2,
                  SUM((CASE WHEN (Golongan = 3) THEN ((((RpTunai + RpMandiri) + RpBRI) + RpBNI) + RpBCA) ELSE 0 END)) AS rp3,
                  SUM((CASE WHEN (Golongan = 3) THEN ((((Tunai + Mandiri) + BRI) + BNI) + BCA) ELSE 0 END)) AS lalin3,
                  SUM((CASE WHEN (Golongan = 4) THEN ((((RpTunai + RpMandiri) + RpBRI) + RpBNI) + RpBCA) ELSE 0 END)) AS rp4,
                  SUM((CASE WHEN (Golongan = 4) THEN ((((Tunai + Mandiri) + BRI) + BNI) + BCA) ELSE 0 END)) AS lalin4,
                  SUM((CASE WHEN (Golongan = 5) THEN ((((RpTunai + RpMandiri) + RpBRI) + RpBNI) + RpBCA) ELSE 0 END)) AS rp5,
                  SUM((CASE WHEN (Golongan = 5) THEN ((((Tunai + Mandiri) + BRI) + BNI) + BCA) ELSE 0 END)) AS lalin5,
                  SUM(((((Tunai + Mandiri) + BRI) + BNI) + BCA)) AS total,
                  SUM(((((RpTunai + RpMandiri) + RpBRI) + RpBNI) + RpBCA)) AS rptotal";
    var $table = 'eoj';
	var $column_order = array('Gerbang','nogardu','rp1','lalin1','rp2','lalin2','rp3','lalin3','rp4','lalin4','rp5','lalin5','total','rptotal');
	var $column_search = array('Gerbang','nogardu','rp1','lalin1','rp2','lalin2','rp3','lalin3','rp4','lalin4','rp5','lalin5','total','rptotal');
	var $order = array('NoGerbang' => 'ASC');

	public function __construct()
	{
		parent::__construct();
        $this->dbATP = $this->load->database('atp', TRUE);
	}

	private function _get_datatables_query()
	{
        //add custom filter here
        if($this->input->post('start_date'))
        {
            $this->dbATP->where("tanggal >=", $this->input->post('start_date'));
        } 
        if($this->input->post('end_date'))
        {
            $this->dbATP->where("tanggal <=", $this->input->post('end_date'));
        } 
        else 
        {
            $this->dbATP->where("tanggal >= DATE_FORMAT(CURDATE(),'%Y-%m-%d') AND tanggal <= CURDATE()");
        }

		$this->dbATP->select($this->select);
        $this->dbATP->from($this->table);
        $this->dbATP->group_by(array('NoGerbang','Gerbang','NoGardu'));
 
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
        $this->_get_datatables_query();
        return $this->dbATP->count_all_results();
    }
}
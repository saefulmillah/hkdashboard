<?php 
/**
 * 
 */
class LaporanHarian_model extends CI_Model
{
	var $select = "DATE_FORMAT(`Waktu`,'%M-%d') AS tanggal,
                  `lalin`.`Gerbang` AS `Gerbang`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE 'eToll%') AND (`lalin`.`Shift` = 1)) THEN 1 ELSE 0 END)) AS `eToll_shift1`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE '%Tunai%') AND (`lalin`.`Shift` = 1)) THEN 1 ELSE 0 END)) AS `Tunai_shift1`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE 'eToll%') AND (`lalin`.`Shift` = 2)) THEN 1 ELSE 0 END)) AS `eToll_shift2`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE '%Tunai%') AND (`lalin`.`Shift` = 2)) THEN 1 ELSE 0 END)) AS `Tunai_shift2`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE 'eToll%') AND (`lalin`.`Shift` = 3)) THEN 1 ELSE 0 END)) AS `eToll_shift3`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE '%Tunai%') AND (`lalin`.`Shift` = 3)) THEN 1 ELSE 0 END)) AS `Tunai_shift3`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE 'eToll%') AND (`lalin`.`Shift` = 1)) THEN `lalin`.`Rupiah` ELSE 0 END)) AS `Rupiah_eToll_shift1`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE '%Tunai%') AND (`lalin`.`Shift` = 1)) THEN `lalin`.`Rupiah` ELSE 0 END)) AS `Rupiah_Tunai_shift1`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE 'eToll%') AND (`lalin`.`Shift` = 2)) THEN `lalin`.`Rupiah` ELSE 0 END)) AS `Rupiah_eToll_shift2`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE '%Tunai%') AND (`lalin`.`Shift` = 2)) THEN `lalin`.`Rupiah` ELSE 0 END)) AS `Rupiah_Tunai_shift2`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE 'eToll%') AND (`lalin`.`Shift` = 3)) THEN `lalin`.`Rupiah` ELSE 0 END)) AS `Rupiah_eToll_shift3`,
                  SUM((CASE WHEN ((`lalin`.`Metoda` LIKE '%Tunai%') AND (`lalin`.`Shift` = 3)) THEN `lalin`.`Rupiah` ELSE 0 END)) AS `Rupiah_Tunai_shift3`,
                  SUM((CASE WHEN (`lalin`.`Metoda` LIKE 'eToll%') THEN 1 ELSE 0 END)) AS `Total_eToll`,
                  SUM((CASE WHEN (`lalin`.`Metoda` LIKE '%Tunai%') THEN 1 ELSE 0 END)) AS `Total_Tunai`,
                  SUM((CASE WHEN (`lalin`.`Metoda` LIKE '%eToll%') THEN `lalin`.`Rupiah` ELSE 0 END)) AS `Rupiah_eToll`,
                  SUM((CASE WHEN (`lalin`.`Metoda` LIKE '%Tunai%') THEN `lalin`.`Rupiah` ELSE 0 END)) AS `Rupiah_Tunai`";
    var $table = "lalin";
	var $column_order = array('Gerbang','eToll_shift1','Tunai_shift1','eToll_shift1','Tunai_shift2','eToll_shift2','Tunai_shift3','eToll_shift3','Total_eToll','Total_Tunai','Rupiah_eToll','Rupiah_Tunai');
	var $column_search = array('Gerbang','eToll_shift1','Tunai_shift1','eToll_shift1','Tunai_shift2','eToll_shift2','Tunai_shift3','eToll_shift3','Total_eToll','Total_Tunai','Rupiah_eToll','Rupiah_Tunai');
	var $order = array('Gerbang' => 'asc');

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
            $this->dbATP->where("DATE_FORMAT(`Waktu`,'%Y-%m-%d')", $this->input->post('start_date'));
        } else {
            $this->dbATP->where("DATE_FORMAT(`Waktu`,'%Y-%m-%d') >= CURDATE()");
        }

        $this->dbATP->select($this->select);
		    $this->dbATP->from($this->table);
        $this->dbATP->group_by('Gerbang');
 
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
        $this->dbATP->group_by('Gerbang');
        return $this->dbATP->count_all_results();
    }
}
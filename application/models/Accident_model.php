<?php 
/**
 * 
 */
class Accident_model extends CI_Model
{
	var $select = "  acd.event_time,
                     acd.sta,
                     acd.lane,
                     (SELECT NAME FROM m_enum_item WHERE m_enum_item.`id`=acd.position_id) AS posisi,
                     (SELECT NAME FROM m_enum_item WHERE m_enum_item.`id`=acd.weather_id) AS wheather,
                     (SELECT NAME FROM m_enum_item WHERE m_enum_item.`id`=acd.accident_type_id) AS accident_type,
                     (SELECT NAME FROM m_enum_item WHERE m_enum_item.`id`=acd.vehicle_type_id) AS vehicle,
                     (SELECT NAME FROM m_enum_item WHERE m_enum_item.`id`=acd.cause_id) AS cause,
                     (CASE WHEN (acd.`driver_gender`='M') THEN 'Laki-Laki' ELSE 'Perempuan' END) AS Gender,
                     acd.`light_injury`,
                     acd.`heavy_injury`,
                     acd.`fatality`,
                     acd.`remarks`";
    var $table = 't_accident as acd';
	var $column_order = array('sta','lane','posisi','wheather','accident_type','vehicle','cause','gender','light_injury','heavy_injury','fatality');
	var $column_search = array('sta','lane','posisi','wheather','accident_type','vehicle','cause','gender','light_injury','heavy_injury','fatality');
	var $order = array('acd.event_time' => 'ASC');

	public function __construct()
	{
		parent::__construct();
	}

    public function getEnumSet($enumId)
    {
        $sql = "SELECT detail.`id`, detail.`name`, detail.`sort_order`, detail.`string_value` 
                FROM m_enum_set AS tipe INNER JOIN m_enum_item AS detail ON tipe.`id`=detail.`enum_set_id`
                WHERE detail.`enum_set_id`=$enumId";
        $query = $this->db->query($sql)->result_array();

        return $query;
    }

	private function _get_datatables_query()
	{
        //add custom filter here
        if($this->input->post('start_date'))
        {
            $this->db->where("DATE_FORMAT(acd.event_time, '%Y-%m-%d') >=", $this->input->post('start_date'));
        } 
        if($this->input->post('end_date'))
        {
            $this->db->where("DATE_FORMAT(acd.event_time, '%Y-%m-%d') <=", $this->input->post('end_date'));
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
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

    public function getDataExport($startdate, $enddate)
    {
        if (empty($startdate) || empty($startdate)) {
            $this->db->select($this->select);
            $this->db->from($this->table);
        } else {
            $this->db->select($this->select);
            $this->db->from($this->table);
            $this->db->where("DATE_FORMAT(`event_time`,'%Y-%m-%d') >=", $startdate);
            $this->db->where("DATE_FORMAT(`event_time`,'%Y-%m-%d') <=", $enddate);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
}
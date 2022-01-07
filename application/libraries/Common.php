<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common {

	public $CI;
	function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->database();
		//date_default_timezone_set("Asia/Kolkata");
	}


	public function get_all_record($tablename,$wh = array()){
		$this->CI->db->select('*');
		$this->CI->db->from($tablename);
		if(count($wh) > 0 && $wh != '')
			$this->CI->db->where($wh);
		$res = $this->CI->db->get();
		$res = $res->result_array();
		return !empty($res)?$res:array();
	}
	public function get_all($tbl,$params = array()){
		if(array_key_exists("select",$params)){
			$this->CI->db->select($params['select']);
		} else {
			$this->CI->db->select('*');	
		}
		$this->CI->db->from($tbl);
		if(array_key_exists("short_by",$params) && array_key_exists("short_order",$params)){
			$this->CI->db->order_by($params['short_by'],$params['short_order']);
		}
		if(array_key_exists("limit",$params)){
			$this->CI->db->limit($params['limit']);
		}
		if(array_key_exists("where_in",$params)){
			$this->CI->db->where_in($params['where_in'][0],$params['where_in'][1]);
		}
		if(array_key_exists("where_not_in",$params) && count($params['where_not_in'][1]) > 0){
			$this->CI->db->where_not_in($params['where_not_in'][0],$params['where_not_in'][1]);
		}
		if(array_key_exists("like",$params)){
			$this->CI->db->like($params['like'][0],$params['like'][1]);
		}
		if(array_key_exists("or_where",$params)){
			$this->CI->db->or_where($params['or_where']);
		}
		if(array_key_exists("wh",$params) && count($params['wh']) > 0)
			$this->CI->db->where($params['wh']);
		$res = $this->CI->db->get();
		return ($res->num_rows() > 0)?$res->result_array():array();
	}
	
	public function get_one_row($table,$wh = array() ){
		$this->CI->db->select("*");
		$this->CI->db->from($table);
		if(count($wh) > 0 || $wh != '')
		$this->CI->db->where($wh);
		$query = $this->CI->db->get();
		$results = $query->row_array();
		
		return !empty($results)?$results:false;
	}
	public function insert_record($tblname,$data){
		$this->CI->db->insert($tblname,$data); 
		return $this->CI->db->insert_id();
	}

	public function update_record($table,$wh,$data) {
		$this->CI->db->where($wh)
			   ->update($table, $data);
			   // echo $this->CI->db->last_query();
			    
		return $this->CI->db->affected_rows();
	}

	public function delete_record($table,$wh){
		$this->CI->db->where($wh);
		$this->CI->db->delete($table);
		return true;
	}
	public function cust_query($query){
		$res = $this->CI->db->query($query);
		return $res->result_array();
	}
	public function pre_arr($table,$colname,$wh = array(),$strtol = false){
		$result = array();
		$this->CI->db->select($colname);
		$this->CI->db->from($table);
		if(count($wh) > 0 || $wh != '')
			$this->CI->db->where($wh);
		$query = $this->CI->db->get();
		if($query->num_rows() > 0){
			$data = $query->result_array();
			foreach ($data as $value) {
				$str = $value[$colname];
				if($strtol)
					$str = strtolower($value[$colname]);
				array_push($result, $str);
			}
		}
		return !empty($result)?$result:array();
	}
	public function get_one_value($table,$wh = array(),$colname){
		$this->CI->db->select('*');
		$this->CI->db->from($table);
		if(!empty($wh) || count($wh) > 0)
			$this->CI->db->where($wh);
		$res = $this->CI->db->get();
		$type = $res->row_array();
		//return !empty($type)?$type[0][$colname]:false;
		return !empty($type)?$type[$colname]:false;
	}
	//Added 19-12-2017
	public function search_by_name($tbl,$like,$wh = array()){
		$this->CI->db->select('*');
		$this->CI->db->from($tbl);
		if(count($like) > 0 && $like != '')
			$this->CI->db->like($like[0],$like[1]);
		if(count($wh) > 0 && $wh != '')
			$this->CI->db->where($wh);
		$this->CI->db->limit(MXSERLIM);
		$res = $this->CI->db->get();
		return ($res->num_rows() > 0)?$res->result_array():array();
	}
}
?>
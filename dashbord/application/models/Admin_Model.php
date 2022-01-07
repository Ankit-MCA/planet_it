<?php
defined('BASEPATH') OR exit('No direct script access allowed');

////////////----------------user--------------////////////	
class Admin_Model extends CI_Model 
{

	public function login($mobile,$password)
	{
		$this->db->select('*');
		$this->db->limit(1);
		$query = $this->db->where("(admin.email= '$mobile' OR admin.mobile_no = '$mobile')")->where('password',$password)->get('admin');
		if($query->num_rows())
		{
			return $query->row();
		}
	}
	function delete($tbl,$id)
  {
    $this->db->where('id',$id);
    $this->db->delete($tbl);

  }
  
  public function update($tbl,$data,$con='')
  {
    $this->db->where($con);
    $this->db->update($tbl,$data);
    return $this->db->affected_rows();
  }

public function employee($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
						 $this->db->order_by("date","desc");
						//$this->db->limit( 100);
		$q = $this->db->get();
		//echo $this->db->last_query();
		//die;
		return $q->result();
	}
	
	public function attendance($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
						 $this->db->order_by("date","desc");
						//$this->db->limit( 100);
		$q = $this->db->get();
		//echo $this->db->last_query();
		//die;
		return $q->row();
	}
  	public function get_leads($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
						 $this->db->order_by("id","careated_at");
						//$this->db->limit( 100);
		$q = $this->db->get();
		//echo $this->db->last_query();
		//die;
		return $q->result();
	}
	public function user_login($mobile,$password)
	{
		$this->db->select('*');
		$this->db->limit(1);
		$query1 = $this->db->where("(employee.email= '$mobile' OR employee.mobile_no = '$mobile')")->where('password',$password)->get('employee');
		if($query1->num_rows())
		{
			return $query1->row();
		}
	}
	public function insert_data($tbl, $data)
	{
		return $this->db->insert($tbl, $data);
	}

	 function update_status()
    {
      $id=$_REQUEST['id'];
      // echo $id; die;
      $status=$_REQUEST['status'];
       if ($status == 1)
       { 
        $status=0;
           }
          else 
      {
        $status=1;
           }
           $data = array('status' =>$status  
                            );
           $this->db->where('id',$id);
           return $this->db->update('clc_table',$data);
     }
      public function getCurrPassword($id)
            {
              $query = $this->db->where(['user_id'=>$id])->get('user_register');
                if($query->num_rows() > 0)
                {
                    return $query->row();
                } 
             }
             public function updatePassword($new_password, $id)
      {
        $pass= $new_password;
        $data= array(
		        	'vpassword'=> $new_password,
		        	'password'=> $pass
        		);
        return $this->db->where('user_id',$id)->update('user_register', $data); 
      }
	public function selectres($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
		$q = $this->db->get();
		//echo $this->db->last_query();
		//die;
		return $q->result();
	}

	public function payment_details($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
					   $this->db->group_by('user_id');
		$q = $this->db->get();
		//echo $this->db->last_query();
		//die;
		return $q->result();
	}
	public function selectrow($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
		$q = $this->db->get();
		//echo $this->db->last_query();
		//die;
		return $q->row();
	}	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   function pr($data)
    {
        echo "<pre>";
        print_r($data);
        die;       
    }

function similar_data($lead_id)
 {
 	$ci= & get_instance();
 	$ci->db->where("lead_id",$lead_id);
    $ci->db->order_by("id", "DESC");
    $ci->db->limit(1);
	$query = $ci->db->get("lead");
    //print_r($ci->db->last_query());

	return $query->result();
 }

 function similar_data_status($lead_id)
 {
    $ci= & get_instance();
    $ci->db->where("lead_id",$lead_id);
    $ci->db->order_by("id", "DESC");
    $ci->db->limit(1);
    $query = $ci->db->get("remarks");
    //print_r($ci->db->last_query());

    return $query->row();
 }

 function ExcelToPHP($dateValue = 0, $ExcelBaseDate=0) {
    if ($ExcelBaseDate == 0) {
        $myExcelBaseDate = 25569;
        //  Adjust for the spurious 29-Feb-1900 (Day 60)
        if ($dateValue < 60) {
            --$myExcelBaseDate;
        }
    } else {
        $myExcelBaseDate = 24107;
    }

    // Perform conversion
    if ($dateValue >= 1) {
        $utcDays = $dateValue - $myExcelBaseDate;
        $returnValue = round($utcDays * 86400);
        if (($returnValue <= PHP_INT_MAX) && ($returnValue >= -PHP_INT_MAX)) {
            $returnValue = (integer) $returnValue;
        }
    } else {
        $hours = round($dateValue * 12);
        $mins = round($dateValue * 1440) - round($hours * 60);
        $secs = round($dateValue * 86400) - round($hours * 3600) - round($mins * 60);
        $returnValue = (integer) gmmktime($hours, $mins, $secs);
    }

    // Return
    return $returnValue;
}

 function get_status($lead_id)
 {

 		$ci =& get_instance();
    	$class = $ci->db->query("SELECT * FROM `remarks` WHERE lead_id= '$lead_id' ");
    	//print_r($ci->db->last_query());
    	$class = $class->result();
  		return $class;
	
 }

 function get_all_user()
 {
    $ci =& get_instance();
    $class = $ci->db->query(" SELECT * FROM  `user`");
    return $class = $class->result();
 }

  function get_user_by_id($id)
  {
        $ci =& get_instance();
        $class = $ci->db->query(" SELECT * FROM  `user` WHERE id='$id'");
        return $class = $class->row();
  }


  function get_data_from_remarks($id,$status)
  {
        $ci =& get_instance();
        $class = $ci->db->query(" SELECT * FROM  `lead` WHERE createdby='$id'  AND status = '$status'");
        return $class = $class->result();
  }

  function get_data_from_lead($lead_id)
  {
        $ci =& get_instance();
        $class = $ci->db->query(" SELECT * FROM  `lead` WHERE lead_id='$lead_id' ");
        return $class = $class->row();
  }


 function get_data($id,$tbl)
    {
        $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM $tbl WHERE id=$id ");
    //  echo $ci->db->last_query();
        return $class->row(); 
    }

     function get_data_by_help($help,$tbl)
    {
        $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM $tbl WHERE help='$help'");
      //echo $ci->db->last_query();
        return $class->row(); 
    }
 function get_lead_data($id,$tbl)
    {
        $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM $tbl WHERE createdby=$id");
    //  echo $ci->db->last_query();
        return $class->row(); 
    }



        function get_data_by_userid($id)
    {

        $ci = & get_instance();
        $class = $ci->db->query("SELECT * FROM leadassign WHERE id='$id'");
        return $class->result(); 
    }

 

          function get_data_by_createdby($id)
    {

        $ci = & get_instance();
        $class = $ci->db->query("SELECT * FROM remarks WHERE createdby='$id'");
        return $class->result(); 
    }

 

    function get_request($date)
    {
        $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM leadassign WHERE d_date='$date'");
        return $class->num_rows();
    }

    function top_data($name)
    {
         $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM user WHERE name='$name' ORDER BY  id DESC limit 5 ");
        return $class->result();
     

    }
     function show_amount($lead_id)
    {
        $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM lead WHERE lead_id='$lead_id' AND status='Sales'");
       // echo $ci->db->last_query();die;
        return $class->result();
    }
    
    function show_date($lead_id)
    {
        $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM lead WHERE lead_id='$lead_id' AND status='FollowUp'");
       // echo $ci->db->last_query();die;
        return $class->result();
    }

    //   function total_revenue()
    // {
    //     $ci= & get_instance();
    //     $class= $ci->db->query("SELECT SUM(paid_amount) FROM remarks");
    //     //echo $ci->db->last_query();die;
    //     return $class->result();
    // }

    function assign_lead($id)
    {
         $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM leadassign WHERE name='$id'");
        //echo $ci->db->last_query();die;
        return $class->result();
    }


        function get_revenue($id)
  {
        $ci =& get_instance();
        $class = $ci->db->query(" SELECT * FROM  `lead` WHERE createdby='$id'  AND status = 'Sales' ORDER BY date DESC ");
        //echo $ci->db->last_query();die;
        return $class = $class->result();
  }

  // function total_revenue($id)
  //   {
  //       $ci= & get_instance();
  //       $class= $ci->db->query("SELECT SUM(paid_amount) FROM lead WHERE createdby = '$id'");
  //       echo $ci->db->last_query();die;
  //       return $class->row();
  //   }
  
    function show_lead_details($id)
    {
        $ci= & get_instance();
        $class= $ci->db->query("SELECT * FROM employee WHERE id='$id'");
       // echo $ci->db->last_query();die;
        return $class->result();
    }
    
    
     function get_data_from_source($id)
  {
        $ci =& get_instance();
        $class = $ci->db->query(" SELECT * FROM  `lead` WHERE leadsource='$id'");
        return $class = $class->result();
  }

  function get_missed_folloup()
  {
          $crdate=date('d/m/Y');
           date_default_timezone_set('Asia/Kolkata');
              $crtime =date(' H:i:s');
        $ci =& get_instance();
        $class = $ci->db->query("SELECT * FROM  `lead` WHERE remark_status='0'  AND date<='$crdate' AND time< '$crtime' AND status='FollowUp' order by 'id' DESC ");
        // return $ci->db->last_query();
         return  $class->result();
  }
  
  function get_missed_folloupbyID($id)
  {
        $crdate=date('d/m/Y');
          date_default_timezone_set('Asia/Kolkata');
              $crtime =date(' H:i:s');
              

       
        $ci =& get_instance();
        $class = $ci->db->query("SELECT * FROM  `lead` WHERE remark_status='0' AND createdby='$id' AND date<='$crdate' AND time<'$crtime' AND status='FollowUp' order by 'id' DESC ");
        // return $ci->db->last_query();
        return $class = $class->result();
  }
  
  
  
  







 ?>


		
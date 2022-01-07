<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller 
{
	public function __construct()
      {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model','am');
      //  $this->load->helper('New_helper');
      }  
      
   public function notissetuser()
  {
    if(!$this->session->userdata("id"))
    return redirect(base_url("user/index"));
  }//notissetuse
      public function index()
      {
      	$this->load->library('form_validation');
      	$this->form_validation->set_rules('email','Email','trim|required');
      	$this->form_validation->set_rules('password','Password','required');
      	if($this->form_validation->run() == true)
      	{
      		$email = $this->input->post('email');
      		$password = $this->input->post('password');
      		$query = $this->am->user_login($email, $password);
          //echo $this->db->last_query();die;
         // echo $query;die;
      		if($query)
      		{
      			$this->session->set_userdata('id', $query->id);
      			$this->session->set_userdata('name',$query->name);
      			$this->session->set_userdata('type',$query->type);
      			$this->session->set_flashdata('logmsg', "Login Successfull");
      			redirect(base_url('user/dashboard'));
      		}
      		else
      		{
      			$this->session->set_flashdata('logmsg', "Invalid Email/Phone No. or Password");
      			redirect(base_url('user/index'));
      		}
      	}
      	else
      	{
      		$data = validation_errors();
      		$this->load->view('include/header',$data);
      		$this->load->view('user/login',$data);
      		$this->load->view('include/footer',$data);
      	}
      }



  public function dashboard()
	{
	    $this->notissetuser();
		$this->load->view('user/header');
		$this->load->view('user/dashboard');
		$this->load->view('user/footer');
	}  

  public function missed_lead()
      {
          $this->notissetuser();
          $date=date('Y-m-d');
            $res['data'] = $this->am->selectres('lead',array('follow_up_date <'=> $date,'stage'=>'Follow Up'));
            $this->load->view('user/header');
            $this->load->view('user/lead_list',$res);
            $this->load->view('user/footer');
      }  
      
         public function today_lead()
      {
          $this->notissetuser();
           $date=date('Y-m-d');
           $res['data'] = $this->am->selectres('lead',array('follow_up_date'=>$date,'stage'=>'Follow Up'));
            $this->load->view('user/header');
            $this->load->view('user/lead_list',$res);
            $this->load->view('user/footer');
      } 
      
       public function today_lead_work()
      {
          $date =date('Y-m-d');
           $res['data'] = $this->am->selectres('lead',array('updated_at'=>$date));
          // echo $this->db->last_query();die;
            $this->load->view('user/header');
            $this->load->view('user/lead_list',$res);
            $this->load->view('user/footer');
      }  
      
        public function meeting_done()
      {
          $this->notissetuser();
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Meeting Done'));
            $this->load->view('user/header');
            $this->load->view('user/lead_list',$res);
            $this->load->view('user/footer');
      }  
      
       public function not_interested()
      {
          $this->notissetuser();
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Not Interested'));
            $this->load->view('user/header');
            $this->load->view('user/lead_list',$res);
            $this->load->view('user/footer');
      }  
      
       public function follow_up()
      {
          $this->notissetuser();
            $date=date('Y-m-d');
            $res['data'] = $this->am->selectres('lead',array('follow_up_date >'=> $date,'stage'=>'Follow Up'));
            $this->load->view('user/header');
            $this->load->view('user/lead_list',$res);
            $this->load->view('user/footer');
      }  
      
      
       public function other_requirement()
      {
          $this->notissetuser();
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Other requirement'));
            $this->load->view('user/header');
            $this->load->view('user/lead_list',$res);
            $this->load->view('user/footer');
      }  
      public function not_contact()
      {
          $this->notissetuser();
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Not Contact'));
            $this->load->view('user/header');
            $this->load->view('user/lead_list',$res);
            $this->load->view('user/footer');
      }  
      
       public function employee_list()
      {
          $this->notissetuser();
           $res['data'] = $this->am->selectres('employee',array('status'=>'1'));
            $this->load->view('user/header');
            $this->load->view('user/employee_list',$res);
            $this->load->view('user/footer');
      }


  //============================Start Employee===========================//

    public function employee()
  {
      $this->notissetuser();
    $result['data'] = $this->am->selectres('employee',array('status'=>'1'));  
    $this->load->view('user/header');
    $this->load->view('user/add_employee',$result);
    $this->load->view('user/footer');

  } 
   public function add_employee()
      {
          $this->notissetuser();
          $name=$this->input->post("name");
           $data = array(         
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile_no' =>$this->input->post('mobile_no'), 
            'password' =>$this->input->post('password'), 

            );
             $payment = $this->am->insert_data('employee',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Details Add Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
             }

           public function edit_employee($id)
        {
             $this->notissetuser();
          if(!empty($_POST))
          {           
          $data = array(  
            'employee_no' => $this->input->post('employee_no'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile_no' =>$this->input->post('mobile_no'),
            'password' =>$this->input->post('password'),
            'designation' =>$this->input->post('designation'),
            'address' =>$this->input->post('address'),
            'pan_no' =>$this->input->post('pan_no'),
            'bank_name' =>$this->input->post('bank_name'),
            'account_no' =>$this->input->post('account_no'),
            'ifsc_code' =>$this->input->post('ifsc_code'),
             'salary' =>$this->input->post('salary'),
             
             'qulification' =>$this->input->post('qulification'),
            'dob' =>$this->input->post('dob'),
            'father_name' =>$this->input->post('father_name'),
            'mother_name' =>$this->input->post('mother_name'),
            'date_of_joining' =>$this->input->post('date_of_joining'),
            'address2' =>$this->input->post('address2'),
            'incriment' =>$this->input->post('incriment'),
            'date_incriment' =>$this->input->post('date_incriment'),
            
               'aadhar_no' =>$this->input->post('aadhar_no'),
               'other_no' =>$this->input->post('other_no'),
            
            );
            
            
            $data1 = array(  
            'employee_no' => $this->input->post('employee_no'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile_no' =>$this->input->post('mobile_no'),
            'password' =>$this->input->post('password'),
            'designation' =>$this->input->post('designation'),
            'address' =>$this->input->post('address'),
            'pan_no' =>$this->input->post('pan_no'),
            'bank_name' =>$this->input->post('bank_name'),
            'account_no' =>$this->input->post('account_no'),
            'ifsc_code' =>$this->input->post('ifsc_code'),
             'salary' =>$this->input->post('salary'),
             
             'qulification' =>$this->input->post('qulification'),
            'dob' =>$this->input->post('dob'),
            'father_name' =>$this->input->post('father_name'),
            'mother_name' =>$this->input->post('mother_name'),
            'date_of_joining' =>$this->input->post('date_of_joining'),
            'address2' =>$this->input->post('address2'),
            'incriment' =>$this->input->post('incriment'),
            'date_incriment' =>$this->input->post('date_incriment'),
            
               'aadhar_no' =>$this->input->post('aadhar_no'),
               'employee_id' =>$id,
               'other_no' =>$this->input->post('other_no'),
            
            );
                          // print_r($data);die;
                        $this->db->where('id',$id);
                        $this->db->update('employee',$data);  
                        
                         $payment = $this->am->insert_data('employee_all_details',$data1);
                        
                        $this->session->set_flashdata('success_msg', 'Details Update Successfully..');
                         return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['data'] = $this->am->selectrow('employee',array('id'=>$id));

      $result['data1'] = $this->am->selectres('employee');
      $this->notissetuser();
     $this->load->view('user/header');
     $this->load->view('user/edit_employee',$result);
     $this->load->view('user/footer');
            }
      }
      
      
       public function edit_employee_detaild($id)
        {
             $this->notissetuser();
          if(!empty($_POST))
          {           
            $data1 = array(  
            'employee_no' => $this->input->post('employee_no'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile_no' =>$this->input->post('mobile_no'),
            'password' =>$this->input->post('password'),
            'designation' =>$this->input->post('designation'),
            'address' =>$this->input->post('address'),
            'pan_no' =>$this->input->post('pan_no'),
            'bank_name' =>$this->input->post('bank_name'),
            'account_no' =>$this->input->post('account_no'),
            'ifsc_code' =>$this->input->post('ifsc_code'),
             'salary' =>$this->input->post('salary'),
             
             'qulification' =>$this->input->post('qulification'),
            'dob' =>$this->input->post('dob'),
            'father_name' =>$this->input->post('father_name'),
            'mother_name' =>$this->input->post('mother_name'),
            'date_of_joining' =>$this->input->post('date_of_joining'),
            'address2' =>$this->input->post('address2'),
            'incriment' =>$this->input->post('incriment'),
            'date_incriment' =>$this->input->post('date_incriment'),
            
               'aadhar_no' =>$this->input->post('aadhar_no'),
               //'employee_id' =>$id,
               'other_no' =>$this->input->post('other_no'),
            
            );
                          // print_r($data);die;
                        $this->db->where('id',$id);
                        $this->db->update('employee_all_details',$data1);  
                        
                        // $payment = $this->am->insert_data('employee_all_details',$data1);
                        
                        $this->session->set_flashdata('success_msg', 'Details Update Successfully..');
                         return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['data'] = $this->am->selectrow('employee_all_details',array('id'=>$id));

      $result['data1'] = $this->am->selectres('employee');
      $this->notissetuser();
     $this->load->view('user/header');
     $this->load->view('user/edit_employee_details',$result);
     $this->load->view('user/footer');
            }
      }
      
      
         public function employee_details($id)
  {
       $this->notissetuser();
    $result['data'] = $this->am->selectres('employee_all_details',array('employee_id'=>$id));  
    $this->load->view('user/header');
    $this->load->view('user/employee_details',$result);
    $this->load->view('user/footer');

  } 

    public function delete_employee($id)
  {
      $this->notissetuser();
    $this->am->delete('employee',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Date Delete Successfully');
       return redirect($_SERVER['HTTP_REFERER']);
    }
  }


   public function upload_india_mart_lead($value='')
         {
              $date=date('Y-m-d');
             $url = "https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/7042445112/GLUSR_MOBILE_KEY/MTYzMTA4NTgwNi4wNTY5Izk4NzA2Njg1/Start_Time/$date/";
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                //CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $output = curl_exec($ch);
          $data = json_decode($output);
        //   echo "<pre>";
         // print_r($data);die;
           if(empty($data))
          {
              echo "Error_Message: There are no leads in the given time duration.please try for a different duration";
              //return redirect($_SERVER['HTTP_REFERER']);
          }
          else
          {
               $i=0;
                    foreach ($data as $key) {
                      $inserdata[$i]['name'] = $key->SENDERNAME;
                      $inserdata[$i]['email'] = $key->SENDEREMAIL;
                      $inserdata[$i]['mobile_no'] = $key->MOB;
                      $inserdata[$i]['enquiry'] = $key->SUBJECT;
                      $inserdata[$i]['location'] = $key->ENQ_ADDRESS;
                      $inserdata[$i]['follow_up_date'] = $key->DATE_RE;
                      $inserdata[$i]['refer_by'] = 'india mart';
                      $i++;
                    }  
      $q=$this->db->get_where("lead",array("mobile_no"=>$key->MOB));
                if($q->num_rows())
                 {
                  $res=$q->row(); 
                  $result=$res->mobile_no;
                    if(is_array($result))
                    {
                    foreach($result as $row)
                    {
                    $pin_id=$value;
                      $val=
                        $this->db->where('mobile_no',$pin_id);
                      $this->db->update('lead',$inserdata); 
                    
                  }
                }
            }
            else
                {      
                    $result = $this->import->indiamart($inserdata);  
                  }
                    return redirect($_SERVER['HTTP_REFERER']);

                   }
              }

        public function attendance()
      {
          $this->notissetuser();
             $date=date('Y-m-d');
             $res['data'] = $this->am->selectres('attendance',array('date'=>$date));
            $res['employee'] = $this->am->selectres('employee',array('status'=>'1'));
            $this->load->view('user/header');
            $this->load->view('user/add_attendance',$res);
            $this->load->view('user/footer');
      }  
       public function attendance_list()
      {
          $this->notissetuser();
        $date=date('Y-m-d');
           $res['data'] = $this->am->selectres('attendance');
            $res['employee'] = $this->am->selectres('employee',array('status'=>'1'));
           // echo $this->db->last_query();die;
            $this->load->view('user/header');
            $this->load->view('user/attendance_list',$res);
            $this->load->view('user/footer');
      }  

        public function add_attendance()
      {
          $this->notissetuser();
         
        $date=date('Y-m-d');
         $today_date=$this->input->post("today_date");
         $get_day = strtotime($today_date);
           $day = date('l', $get_day);
          // print_r($day);die;
          $name=$this->input->post("name");
          $employee_id=$this->input->post("employee_id");
          $q=$this->db->get_where("attendance",array("name"=>$this->input->post('name'),"date"=>$today_date));
                   if($q->num_rows())
                 {
                  $this->session->set_flashdata('pwd_error',"Employee Already register..");
                          return redirect($_SERVER['HTTP_REFERER']);
                 }
                 else
                 {
          $data = array(         
              'name' => $this->input->post('name'),
             // 'half_day' => $this->input->post('half_day'),
              'leave' => $this->input->post('leave'),
              'date' =>$this->input->post('today_date'),
                'in_time' =>$this->input->post('in_time'),
                'out_time' =>$this->input->post('out_time'),
                'day' =>$day,
                );
             $lead = $this->am->insert_data('attendance',$data);
              if($lead)
                     {
                    $this->session->set_flashdata('success_msg', 'Attendanc Add Successfully  Employee -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
            }
          }
          
    public function emp_attendance()
      {
     $this->notissetuser();
          $emp=$this->uri->segment(3);
          $res= $this->am->selectrow('employee',array('id'=>$emp));
           $result['data1'] = $this->am->selectres('month');
          $value=$res->name;
           $result['data'] = $this->am->employee('attendance',array('name'=>$value));
           //echo $this->db->last_query();die;
            $this->load->view('user/header');
            $this->load->view('user/employee_attendance',$result);
            $this->load->view('user/footer');
      }   
      
    public function monthly_data($value='')
      {
           $this->notissetuser();
         $emp=$this->uri->segment(4);
         $id=$this->uri->segment(3);
           $res = $this->am->selectrow('employee',array('id'=>$id));
           $name=$res->name;
          $data['data'] = $this->db->select('*')
        ->where('MONTH(created_at)', $emp)
        ->where('YEAR(created_at)', date('Y'))
        ->where('name', $name)
        ->order_by("date","ASC")
        ->get("attendance")
        ->result();
        $data['data1'] = $this->am->selectres('month');
      //  echo $this->db->last_query();die;
         $this->load->view('user/header');
            $this->load->view('user/employee_attendance',$data);
            $this->load->view('user/footer');
      }
       
       
        public function salary_slip($value='')
      {
          $this->notissetuser();
         $emp=$this->uri->segment(4);
         $id=$this->uri->segment(3);
           $res = $this->am->selectrow('employee',array('id'=>$id));
           $name=$res->name;
           $data['data'] = $this->db->select('*')
        ->where('MONTH(created_at)', $emp)
        ->where('YEAR(created_at)', date('Y'))
        ->where('name', $name)
        ->get("attendance")
        ->result();
        //echo $this->db->last_query()
         //$this->load->view('admin/header');
            $this->load->view('user/salary_slip',$data);
          //  $this->load->view('admin/footer');
      }


                 public function edit_attendance()
        {
                $this->notissetuser();
                $date=date('Y-m-d');
               $name=$this->input->post("name");
              $in_time=$this->input->post("in_time");
              $out_time=$this->input->post("out_time");
              $employee_id=$this->input->post("employee_id");
              
              $today_date=$this->input->post("today_date");
              
              if($today_date==$date)
              {
                  
               
            $q=$this->db->get_where("attendance",array("name"=>$this->input->post('name'),"date"=>$date));
          // $q=$this->db->get_where("attendance",array("name"=>$this->input->post('name')));
                if($q->num_rows())
                 {
              $data = array(         
              'name' => $this->input->post('name'),
              'date' =>$this->input->post('today_date'),
                'in_time' =>$this->input->post('in_time'),
                'out_time' =>$this->input->post('out_time'),
                 'leave' => $this->input->post('leave'),
                );
                         
                        $this->db->where('id',$employee_id);
                        $this->db->update('attendance',$data);   
                        $this->session->set_flashdata('success_msg', ' Update Successfully..');
                        // return  redirect(base_url('Admin/lead'));
                         return redirect($_SERVER['HTTP_REFERER']);
                 }
                 else
                 {
                 echo "No data available"  ;
                 }  
              }
              
              else
                 {
                 echo "No data available"  ;
                 }  
      }

        public function emp_attendance_list()
      {
          $this->notissetuser();
           $res['data'] = $this->am->selectres('employee',array('status'=>'1'));
            $this->load->view('user/header');
            $this->load->view('user/emp_attendance_list',$res);
            $this->load->view('user/footer');
      }



  //==========================End Employee============================//
  public function lead_list()
  {
      
    $this->notissetuser();
    $user_id=$this->session->userdata("id");
    $result['data'] = $this->am->get_leads('lead',array("stage"=>'','assigned_to'=>$user_id)); 
    $this->load->view('user/header');
    $this->load->view('user/lead_list',$result);
    $this->load->view('user/footer');

  } 

   public function lead()
  {
      $this->notissetuser();
    $date=date('Y-m-d');
    $result['data'] = $this->am->get_leads('lead',array('today_date'=>$date));   

    $result['employee'] = $this->am->selectres('employee',array('status'=>'1'));
    $this->load->view('user/header');
    $this->load->view('user/add_lead',$result);
    $this->load->view('user/footer');
  } 
  public function alllead_list()
  {
      $this->notissetuser();
    $result['employee'] = $this->am->selectres('employee',array('status'=>'1'));
    $result['data'] = $this->am->get_leads('lead');  
    $this->load->view('user/header');
    $this->load->view('user/lead_list',$result);
    $this->load->view('user/footer');
  }  

    public function assignlead_list()
  {
     $this->notissetuser();
    $user_id=$this->session->userdata("id");
    $result['data'] = $this->am->get_leads('lead',array("stage"=>'','assigned_to'=>$user_id)); 
    $result['employee'] = $this->am->selectres('employee');
  //  $result['data'] = $this->am->get_leads('lead',array("assigned_to >"=>'0'));  
    $this->load->view('user/header');
    $this->load->view('user/lead_list',$result);
    $this->load->view('user/footer');
  } 


     public function add_lead()
      {
          $this->notissetuser();
          $name=$this->input->post("name");
          $q=$this->db->get_where("lead",array("mobile_no"=>$this->input->post('mobile_no')));
                   if($q->num_rows())
                 {
                       $this->session->set_flashdata('pwd_error',"Mobile No Already Exist..");
                        return redirect(base_url('user/lead'));
                 }
                 else
                 {
           $data = array(         
              'name' => $this->input->post('name'),
              'email' => $this->input->post('email'),
              'mobile_no' =>$this->input->post('mobile_no'),
              'other_no' => $this->input->post('other_no'),
              'enquiry' => $this->input->post('enquiry'),
              'location' => $this->input->post('location'),
              'today_date' =>$this->input->post('today_date'),
              'follow_up_date' =>$this->input->post('follow_up_date'),
                'budget' =>$this->input->post('budget'),
                'refer_by' =>$this->input->post('refer_by'),
                'stage' =>$this->input->post('stage'),
                'remarks' =>$this->input->post('remarks'),
                 'updated_at'=>date('Y-m-d'),
                );
             $lead = $this->am->insert_data('lead',$data);
              if($lead)
                     {
                    $this->session->set_flashdata('success_msg', 'Lead Add Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                       }
             }
          }

      public function view_remark($id)
      {
          $this->notissetuser();
        $result['employee'] = $this->am->selectres('employee',array('status'=>'1'));
        $result['data'] = $this->am->get_leads('lead_status',array("lead_id "=>$id));  
        $this->load->view('user/header');
        $this->load->view('user/view_remark',$result);
        $this->load->view('user/footer');
      }
        public function edit_lead($id)
        {
            $this->notissetuser();
          if(!empty($_POST))
          {           
               $data = array(         
              'name' => $this->input->post('name'),
              'email' => $this->input->post('email'),
              'mobile_no' =>$this->input->post('mobile_no'),
              'other_no' => $this->input->post('other_no'),
              'enquiry' => $this->input->post('enquiry'),
              'location' => $this->input->post('location'),
              'today_date' =>$this->input->post('today_date'),
              'follow_up_date' =>$this->input->post('follow_up_date'),
                'budget' =>$this->input->post('budget'),
                'refer_by' =>$this->input->post('refer_by'),
                'stage' =>$this->input->post('stage'),
                'remarks' =>$this->input->post('remarks'),
                );
                          // print_r($data);die;
                        $this->db->where('id',$id);
                        $this->db->update('lead',$data);   
                        $this->session->set_flashdata('success_msg', 'Lead Update Successfully..');
                         //return  redirect(base_url('Admin/lead_list'));
                         return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['res'] = $this->am->selectrow('lead',array('id'=>$id));
      $result['data1'] = $this->am->selectres('lead');
      $result['employee'] = $this->am->selectres('employee');
     $this->load->view('user/header');
     $this->load->view('user/edit_lead',$result);
     $this->load->view('user/footer');
            }
      }


       public function change_lead_remark($id)
        {
            $this->notissetuser();
          if(!empty($_POST))
          {           
            $data = array(         
              'name' => $this->input->post('name'),
              'lead_id' => $this->input->post('lead_id'),
              'user_id' => $this->input->post('user_id'),
              'email' => $this->input->post('email'),
              'mobile_no' =>$this->input->post('mobile_no'),
              'other_no' => $this->input->post('other_no'),
              'enquiry' => $this->input->post('enquiry'),
              'location' => $this->input->post('location'),
              'today_date' =>date('d-m-Y'),
              'follow_up_date' =>$this->input->post('follow_up_date'),
                'budget' =>$this->input->post('budget'),
                'refer_by' =>$this->input->post('refer_by'),
                'stage' =>$this->input->post('stage'),
                'remarks' =>$this->input->post('remarks'),
                );

            $data1 = array(         
              
                'follow_up_date' =>$this->input->post('follow_up_date'),
                
                'stage' =>$this->input->post('stage'),
                //'remarks' =>$this->input->post('remarks'),
                );
                    $lead = $this->am->insert_data('lead_status',$data); 
                     $this->db->where('id',$id);
                    $this->db->update('lead',$data1);  
                    $this->session->set_flashdata('success_msg', 'Lead Update Successfully..');
                    return  redirect(base_url('User/lead_list'));
                  // return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['res'] = $this->am->selectrow('lead',array('id'=>$id));
      $result['data1'] = $this->am->selectres('lead');
      $result['employee'] = $this->am->selectres('employee');
     $this->load->view('user/header');
     $this->load->view('user/change_lead_remark',$result);
     $this->load->view('user/footer');
            }
         }
  public function delete_lead($id)
  {
      $this->notissetuser();
    $this->am->delete('lead',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Lead Delete Successfully');
      // return  redirect(base_url('Admin/lead'));
      return redirect($_SERVER['HTTP_REFERER']);
    }
  }
    public function change_status()
    {
        $this->notissetuser();
        $lead_id=$this->input->post('lead_id');
              $data = array( 
                    'lead_status' =>$this->input->post('lead_status'),
                    'stage' =>$this->input->post('lead_status'),
                    'updated_at'=>date('Y-m-d')
                    );
                 $val=$this->db->where('id',$lead_id);
                   $this->db->update('lead',$data);
                 
              $this->session->set_flashdata('success_msg', 'Status Change Successfully..');
            return redirect($_SERVER['HTTP_REFERER']);
         }   


public function logout()
  {
    $this->notissetuser();
    $this->session->unset_userdata("id");  
    $this->session->unset_userdata("name");
     return redirect(base_url('user/')); 
  }//logout method close

}

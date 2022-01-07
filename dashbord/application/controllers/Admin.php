<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller 
{
  public function __construct()
      {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model','am');
         $this->load->model('Import_model', 'import');
        //$this->load->helper('New_helper');
      }  
   public function notissetuser()
  {
    if(!$this->session->userdata("id"))
    return redirect(base_url("admin/index"));
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
          $query = $this->am->login($email, $password);
          //echo $query;die;
          if($query)
          {
            $this->session->set_userdata('id', $query->id);
            $this->session->set_userdata('name',$query->name);
            $this->session->set_flashdata('logmsg', "Login Successfull");
            redirect(base_url('admin/dashboard'));
          }
          else
          {
            $this->session->set_flashdata('logmsg', "Invalid Email/Phone No. or Password");
            redirect(base_url('admin/index'));
          }
        }
        else
        {
          $data = validation_errors();
          $this->load->view('include/header',$data);
          $this->load->view('admin/login',$data);
          $this->load->view('include/footer',$data);
        }
      }



      public function dashboard()
  {
    $this->load->view('admin/header');
    $this->load->view('admin/dashboard');
    $this->load->view('admin/footer');
  }  

//=============================roles===================================//

   public function role()
      {
            $res['data'] = $this->am->selectres('role');
             $res['employee'] = $this->am->selectres('employee');
           // echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/role_form',$res);
            $this->load->view('admin/footer');
      }  
        public function add_role()
      {
         
          $name=$this->input->post("name");
          
          $data = array(         
              'emp_name' => $this->input->post('name'),
              'role' =>$this->input->post('role'),
               
                );
             $lead = $this->am->insert_data('role',$data);
              if($lead)
                     {
                    $this->session->set_flashdata('success_msg', 'Role Add Successfully  Employee -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
            }
  //=======================Start Lead Section =====================//

    public function meeting_done()
      {
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Meeting Done'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  

      public function attendance()
      {
        $date=date('Y-m-d');
           $res['data'] = $this->am->selectres('attendance',array('date'=>$date));
            $res['employee'] = $this->am->selectres('employee');
           // echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/attendance',$res);
            $this->load->view('admin/footer');
      }  
       public function attendance_list()
      {
        $date=date('Y-m-d');
           $res['data'] = $this->am->selectres('attendance');
            $res['employee'] = $this->am->selectres('employee');
           // echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/attendance_list',$res);
            $this->load->view('admin/footer');
      }  

        public function add_attendance()
      {
         
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

          $emp=$this->uri->segment(3);
          $res= $this->am->selectrow('employee',array('id'=>$emp));
         // echo $this->db->last_query();die;
          $value=$res->name;
           $result['data'] = $this->am->employee('attendance',array('name'=>$value));
           //echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/employee_attendance',$result);
            $this->load->view('admin/footer');
      }  
      
           public function monthly_data($value='')
      {
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
       // echo $this->db->last_query();die;
         $this->load->view('admin/header');
            $this->load->view('admin/employee_attendance',$data);
            $this->load->view('admin/footer');
      }
       
       
        public function salary_slip($value='')
      {
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
            $this->load->view('admin/salary_slip',$data);
          //  $this->load->view('admin/footer');
      }


         public function edit_attendance()
        {
          $date=date('Y-m-d');
               $name=$this->input->post("name");
              $in_time=$this->input->post("in_time");
              $out_time=$this->input->post("out_time");
          $employee_id=$this->input->post("employee_id");
          $q=$this->db->get_where("attendance",array("name"=>$this->input->post('name'),"date"=>$date));
                   if($q->num_rows())
                 {
                    $data = array(         
              'name' => $this->input->post('name'),
              'date' =>$this->input->post('today_date'),
                'in_time' =>$this->input->post('in_time'),
                'out_time' =>$this->input->post('out_time'),
                 'half_day' => $this->input->post('half_day'),
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
      public function sale_done()
      {
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Sale Done'));
           // echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/sale_done',$res);
            $this->load->view('admin/footer');
      }  
      public function not_interested()
      {
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Not Interested'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  
      
       public function today_lead_work()
      {
          $date =date('Y-m-d');
           $res['data'] = $this->am->selectres('lead',array('updated_at'=>$date));
          // echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  
      public function follow_up()
      {
            $date=date('Y-m-d');
            $res['data'] = $this->am->selectres('lead',array('follow_up_date >'=> $date,'stage'=>'Follow Up'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  
      public function other_requirement()
      {
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Other requirement'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  
      public function not_contact()
      {
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Not Contact'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  
      
      public function employee_list()
      {
           $res['data'] = $this->am->selectres('employee');
            $this->load->view('admin/header');
            $this->load->view('admin/employee_list',$res);
            $this->load->view('admin/footer');
      }
      
       public function emp_attendance_list()
      {
           $res['data'] = $this->am->selectres('employee');
            $this->load->view('admin/header');
            $this->load->view('admin/emp_attendance_list',$res);
            $this->load->view('admin/footer');
      }
       public function today_lead()
      {
           $date=date('Y-m-d');
           $res['data'] = $this->am->selectres('lead',array('follow_up_date'=>$date,'stage'=>'Follow Up'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  

       public function missed_lead()
      {
          $date=date('Y-m-d');
            $res['data'] = $this->am->selectres('lead',array('follow_up_date <'=> $date,'stage'=>'Follow Up'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  
   public function lead()
  {
      $date=date('Y-m-d');
    $result['data'] = $this->am->get_leads('lead',array('today_date'=>'$date'));   
    $result['employee'] = $this->am->selectres('employee');
    $this->load->view('admin/header');
    $this->load->view('admin/add_lead',$result);
    $this->load->view('admin/footer');
  } 
  public function alllead_list()
  {
     $result['employee'] = $this->am->selectres('employee');
    $result['data'] = $this->am->get_leads('lead');  
    $this->load->view('admin/header');
    $this->load->view('admin/lead_list',$result);
    $this->load->view('admin/footer');
  }  
   public function lead_list()
  {
     $result['employee'] = $this->am->selectres('employee');
    $result['data'] = $this->am->get_leads('lead',array("stage"=>''));  
    $this->load->view('admin/header');
    $this->load->view('admin/lead_list',$result);
    $this->load->view('admin/footer');
  } 
  
   public function assignlead_list()
  {
    $result['employee'] = $this->am->selectres('employee');
    $result['data'] = $this->am->get_leads('lead',array("assigned_to >"=>'0'));  
    $this->load->view('admin/header');
    $this->load->view('admin/lead_list',$result);
    $this->load->view('admin/footer');
  } 
   public function add_lead()
      {
          $name=$this->input->post("name");
          $q=$this->db->get_where("lead",array("mobile_no"=>$this->input->post('mobile_no')));
                   if($q->num_rows())
                 {
                       $this->session->set_flashdata('pwd_error',"Mobile No Already Exist..");
                        return redirect(base_url('Admin/lead'));
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
        $result['employee'] = $this->am->selectres('employee');
        $result['data'] = $this->am->get_leads('lead_status',array("lead_id "=>$id));  
        $this->load->view('admin/header');
        $this->load->view('admin/view_remark',$result);
        $this->load->view('admin/footer');
      }
        public function edit_lead($id)
        {
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
                         return  redirect(base_url('Admin/lead_list'));
                         //return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['res'] = $this->am->selectrow('lead',array('id'=>$id));
      $result['data1'] = $this->am->selectres('lead');
      $result['employee'] = $this->am->selectres('employee');
     $this->load->view('admin/header');
     $this->load->view('admin/edit_lead',$result);
     $this->load->view('admin/footer');
            }
      }


       public function change_lead_remark($id)
        {
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
                    return  redirect(base_url('Admin/lead_list'));
                    //return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['res'] = $this->am->selectrow('lead',array('id'=>$id));
      $result['data1'] = $this->am->selectres('lead');
      $result['employee'] = $this->am->selectres('employee');
     $this->load->view('admin/header');
     $this->load->view('admin/change_lead_remark',$result);
     $this->load->view('admin/footer');
            }
         }
  public function delete_lead($id)
  {
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


         //=======================end Lead Section =====================//


         //==============Completed lead ==============//

   public function complet_lead()
  {
    $result['data'] = $this->am->selectres('complet_lead');  
    $this->load->view('admin/header');
    $this->load->view('admin/complet_lead',$result);
    $this->load->view('admin/footer');

  } 

   public function complet_lead_list()
  {
    $result['data'] = $this->am->selectres('lead',array('stage'=>'Sale Done')); 
    $this->load->view('admin/header');
    $this->load->view('admin/complet_lead_list',$result);
    $this->load->view('admin/footer');

  } 
   public function add_complet_lead()
      {
          $name=$this->input->post("name");
          $q=$this->db->get_where("complet_lead",array("email"=>$this->input->post('email')));
                   if($q->num_rows())
                 {
                       $this->session->set_flashdata('pwd_error',"Email Already Exist..");
                        // return redirect(base_url('Admin/complet_lead'));
                        return redirect($_SERVER['HTTP_REFERER']);
                 }
                 else
                 {
           $data = array(         
              'name' => $this->input->post('name'),
              'email' => $this->input->post('email'),
              'mobile_no' =>$this->input->post('mobile_no'),
              'project_type' => $this->input->post('project_type'),
              'project_cost' => $this->input->post('project_cost'),
              'maintinace' => $this->input->post('maintinace'),
              'domain' =>$this->input->post('domain_cost'),
              'server_cost' =>$this->input->post('server_cost'),
                'email_cost' =>$this->input->post('email_cost'),
                'sms_cost' =>$this->input->post('sms_cost'),
                'third_party' =>$this->input->post('third_party'),
                 'other' =>$this->input->post('other'),
                  'remark' =>$this->input->post('remark'),
                
                );
             $lead = $this->am->insert_data('complet_lead',$data);
              if($lead)
                     {
                    $this->session->set_flashdata('success_msg', 'Complet Lead Add Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                       }
             }
          }
        public function edit_complet_lead($id)
        {
          if(!empty($_POST))
          {           
               $data = array(         
               'name' => $this->input->post('name'),
              'email' => $this->input->post('email'),
              'mobile_no' =>$this->input->post('mobile_no'),
              'project_type' => $this->input->post('project_type'),
              'project_cost' => $this->input->post('project_cost'),
              'maintinace' => $this->input->post('maintinace'),
              'domain' =>$this->input->post('domain_cost'),
              'server_cost' =>$this->input->post('server_cost'),
                'email_cost' =>$this->input->post('email_cost'),
                'sms_cost' =>$this->input->post('sms_cost'),
                'third_party' =>$this->input->post('third_party'),
                
                 'server_time' =>$this->input->post('server_time'),
                  'web_ssl' =>$this->input->post('web_ssl'),
                  'maintinace_time' =>$this->input->post('maintinace_time'),
                  'domain_time' =>$this->input->post('domain_time'),
                );
                          // print_r($data);die;
                        $this->db->where('id',$id);
                        $this->db->update('lead',$data);   
                        $this->session->set_flashdata('success_msg', 'Complet Lead Update Successfully..');
                        // return  redirect(base_url('Admin/complet_lead'));
                         return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
       $result['data1'] = $this->am->selectres('lead',array('stage'=>'Sale Done'));
     // $result['data1'] = $this->am->selectres('lead');
      $this->notissetuser();
     $this->load->view('admin/header');
     $this->load->view('admin/edit_complet_lead',$result);
     $this->load->view('admin/footer');
            }
      }
  public function delete_complet_lead($id)
  {
    $this->am->delete('lead',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Complet Lead Delete Successfully');
       //return  redirect(base_url('Admin/complet_lead'));
      return redirect($_SERVER['HTTP_REFERER']);
    }
  }  

  //===================30-3-2020================//
  
   public function project_name()
  {
  $sid= $_POST['id'];
  $con = array('id'=>$sid);
    $data = $this->am->selectrow('lead',$con);
    echo '<option disabled selected value='.$data->project_type.'>'.$data->project_type.'</option>';
    
   
        }
        
        public function mobile_no()
  {
  $sid= $_POST['id'];
  $con = array('id'=>$sid);
    $data = $this->am->selectrow('lead',$con);
     echo '<option disabled selected value='.$data->mobile_no.'>'.$data->mobile_no.'</option>';
        }

  public function user_payment_details($id)
  {
    $result['data'] = $this->am->selectres('payment_details',array('user_id'=>$id));
    $this->load->view('admin/header');
    $this->load->view('admin/user_payment_list',$result);
    $this->load->view('admin/footer');

  } 


public function payment_details()
  { 
     $result['customer'] = $this->am->selectres('lead',array('stage'=>'Sale Done'));
     $result['data'] = $this->am->selectres('payment_details');
        $this->load->view('admin/header');
        $this->load->view('admin/payment_list',$result);
        $this->load->view('admin/footer');

  } 
  public function add_first_payment($id)
  { 
     $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
     //$result['data'] = $this->am->selectres('payment_details');
        $this->load->view('admin/header');
        $this->load->view('admin/add_first_payment',$result);
        $this->load->view('admin/footer');

  } 

   public function add_next_payment($id)
  {
     $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
    $result['data1'] = $this->am->selectres('payment_details');  
    $this->load->view('admin/header');
    $this->load->view('admin/add_next_payment',$result);
    $this->load->view('admin/footer');
  } 
   public function payment_details_list()
  {
    $result['data'] = $this->am->selectres('payment_details');  
    $this->load->view('admin/header');
    $this->load->view('admin/customer_payment_report_list',$result);
    $this->load->view('admin/footer');
  } 
   public function add_payment_details()
      {
        $new=mt_rand(100,999);
        $user_id=$new;
          $name=$this->input->post("name");
           $data = array(         
            'name' => $this->input->post('name'),
            'project_name' => $this->input->post('project_name'),
            'mobile_no' =>$this->input->post('mobile_no'),
            'total_payment' => $this->input->post('total_payment'),
           'payment_received' => $this->input->post('payment_received'),
            'payment_date' => $this->input->post('payment_date'),
            'payment_mode' =>$this->input->post('payment_mode'),
            'transection_no' =>$this->input->post('transection_no'),
            'balance' =>$this->input->post('balance'),
            'user_id'=>$user_id,
                );
              //  print_r($data);die;
             $payment = $this->am->insert_data('payment_details',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Payment Add Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
             }

    public function add_user_next_payment()
      {
            $total_payment=$this->input->post("total_payment");
             $payment_received=$this->input->post("payment_received");
              $user_id=$this->input->post("user_id");
              
                $balance=$this->input->post("balance");
             
                   $this->db->select_sum('payment_received');
                    $this->db->from('payment_details');
                    $this->db->where('user_id',$user_id);
                    $query=$this->db->get();
                    $paye=$query->row()->payment_received;
                   
                    if($paye==NULL)
                    {
                         $payment=$balance;
                    }
                    else
                    {
                        $val=$paye+$payment_received;
                        
                         $payment=$total_payment-$val;
                    }
          $name=$this->input->post("name");
           $data = array(         
            'name' => $this->input->post('name'),
            'project_type' => $this->input->post('project_type'),
            'mobile_no' =>$this->input->post('mobile_no'),
            'total_payment' => $this->input->post('total_payment'),
          'payment_received' => $this->input->post('payment_received'),
            'payment_date' => $this->input->post('payment_date'),
            'payment_mode' =>$this->input->post('payment_mode'),
            'transection_no' =>$this->input->post('transection_no'),
            'balance' =>$payment,
            'user_id' =>$this->input->post('user_id'),
                );
               // print_r($data);die;
             $payment = $this->am->insert_data('payment_details',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Payment Add Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
             }
             
              public function demo()
  {
    
  $title= $_POST['title'];
  //$decs= $_POST['decs'];
  //print_r($decs);die;
 
    echo '<option value='.$title.'>'.$title.'</option>';
                    
        }

       public function edit_payment_details($id)
        {
          if(!empty($_POST))
          {           
          $data = array(         
            'name' => $this->input->post('name'),
            'project_type' => $this->input->post('project_type'),
            'mobile_no' =>$this->input->post('mobile_no'),
            'total_payment' => $this->input->post('total_payment'),
            'payment_received' => $this->input->post('payment_received'),
            'payment_date' => $this->input->post('payment_date'),
            'payment_mode' =>$this->input->post('payment_mode'),
            'transection_no' =>$this->input->post('transection_no'),
            'balance' =>$this->input->post('balance'),
            'user_id' =>$this->input->post('user_id'),
                
                );
         $data1 = array(         
            'name' => $this->input->post('name'),
            'project_type' => $this->input->post('project_type'),
            'mobile_no' =>$this->input->post('mobile_no'),
            'total_payment' => $this->input->post('total_payment'),
            'payment_received' => $this->input->post('payment_received'),
            'payment_date' => $this->input->post('payment_date'),
            'payment_mode' =>$this->input->post('payment_mode'),
            'transection_no' =>$this->input->post('transection_no'),
            'balance' =>$this->input->post('balance'),
             'user_id' =>$this->input->post('user_id'),
                
                );
                        //print_r($data);die;
                        $this->db->where('id',$id);
                        $this->db->update('lead',$data);  
                        
                         $payment = $this->am->insert_data('payment_details',$data1);
                        $this->session->set_flashdata('success_msg', 'Details Update Successfully..');
                          return redirect($_SERVER['HTTP_REFERER']);
                  }
                  
                  
            else
            {
      $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
      $result['data1'] = $this->am->selectres('lead');
      $this->notissetuser();
     $this->load->view('admin/header');
     $this->load->view('admin/edit_payment_details',$result);
     $this->load->view('admin/footer');
            }
      }
  public function delete_payment($id)
  {
    $this->am->delete('payment_details',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Lead Delete Successfully');
       return  redirect(base_url('Admin/payment_details_list'));
      //return redirect($_SERVER['HTTP_REFERER']);
    }
  }

    public function maintenance_costumers()
  {
   // $result['data'] = $this->am->selectres('maintenance_costumers');  
    $result['customer'] = $this->am->selectres('lead',array('stage'=>'Sale Done'));
    $this->load->view('admin/header');
    $this->load->view('admin/maintenace_list',$result);
    $this->load->view('admin/footer');

  } 
   public function maintenance_costumers_list($id)
  {
    $result['data'] = $this->am->selectres('maintenance_costumers',array('user_id'=>$id));  
    $this->load->view('admin/header');
    $this->load->view('admin/maintenance_costumers_list',$result);
    $this->load->view('admin/footer');

  } 
   public function add_maintenance_costumers()
      {
            $maintenance_cost=$this->input->post("maintenance_cost");
             $payment_received=$this->input->post("payment_received");
              $user_id=$this->input->post("user_id");
              
                $balance=$this->input->post("balance");
             
                   $this->db->select_sum('payment_received');
                    $this->db->from('maintenance_costumers');
                    $this->db->where('user_id',$user_id);
                    $query=$this->db->get();
                    $paye=$query->row()->payment_received;
                   
                    if($paye==NULL)
                    {
                         $payment=$balance;
                    }
                    else
                    {
                        $val=$paye+$payment_received;
                        
                         $payment=$maintenance_cost-$val;
                    }
                   
                    
          $name=$this->input->post("name");
           $data = array(         
            'name' => $this->input->post('name'),
             'user_id' => $this->input->post('user_id'),
            'project_type' => $this->input->post('project_type'),
            'mobile_no' =>$this->input->post('mobile_no'),
           'maintenance_cost' => $this->input->post('maintenance_cost'),
           'payment_received' =>$payment_received,
            'payment_date' => $this->input->post('payment_date'),
            'balance' =>$payment,
                );
             $payment = $this->am->insert_data('maintenance_costumers',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Details Add Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
             }
       public function edit_maintenance_costumers($id)
        {
          if(!empty($_POST))
          {           
          $data = array(         
            'name' => $this->input->post('name'),
            'project_type' => $this->input->post('project_type'),
            'mobile_no' =>$this->input->post('mobile_no'),
          'maintenance_cost' => $this->input->post('maintenance_cost'),
          'payment_received' => $this->input->post('payment_received'),
            'payment_date' => $this->input->post('payment_date'),
            'balance' =>$this->input->post('balance'),
                );
                          // print_r($data);die;
                        $this->db->where('id',$id);
                        $this->db->update('maintenance_costumers',$data);   
                        $this->session->set_flashdata('success_msg', 'Details Update Successfully..');
                        return  redirect(base_url('Admin/maintenance_costumers'));
                  }
            else
            {
      $result['data'] = $this->am->selectrow('maintenance_costumers',array('id'=>$id));
      $result['data1'] = $this->am->selectres('maintenance_costumers');
      $this->notissetuser();
     $this->load->view('admin/header');
     $this->load->view('admin/edit_maintenance_costumers',$result);
     $this->load->view('admin/footer');
            }
      }
  public function delete_maintenance_costumers($id)
  {
    $this->am->delete('maintenance_costumers',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Date Delete Successfully');
       return  redirect(base_url('Admin/maintenance_costumers'));
      //return redirect($_SERVER['HTTP_REFERER']);
    }
  }
      

   public function employee()
  {
    $result['data'] = $this->am->selectres('employee');  
    $this->load->view('admin/header');
    $this->load->view('admin/add_employee',$result);
    $this->load->view('admin/footer');

  } 
   public function add_employee()
      {
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
            
            );
                          // print_r($data);die;
                        $this->db->where('id',$id);
                        $this->db->update('employee',$data);   
                        $this->session->set_flashdata('success_msg', 'Details Update Successfully..');
                         return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['data'] = $this->am->selectrow('employee',array('id'=>$id));

      $result['data1'] = $this->am->selectres('employee');
      $this->notissetuser();
     $this->load->view('admin/header');
     $this->load->view('admin/edit_employee',$result);
     $this->load->view('admin/footer');
            }
      }

         public function delete_employee($id)
  {
    $this->am->delete('employee',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Date Delete Successfully');
      // return  redirect(base_url('Admin/maintenance_costumers'));
      return redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function assign_lead()
      {
            $user_id=$this->input->post("user_id");
            $user_name = $this->am->selectrow('employee',array('id'=>$user_id));
            $name=$user_name->name;
           $data = array(         
            'lead_id' => $this->input->post('lead_id'),
            'user_id' => $this->input->post('user_id'),
            'remarks' =>$this->input->post('remarks'), 

            );
             $payment = $this->am->insert_data('assign_leads',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Lead Assign Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
            }


    public function assign_leads()
    {
           
        $user_id=$this->input->post('user_id');
            $lead_id=$this->input->post('lead');

        $q=$this->db->get_where("assign_leads",array("user_id"=>$this->input->post('user_id')));
                if($q->num_rows())
                 {
                    $data = array(         
                          'lead_id' =>(implode(",", $lead_id)),
                          'user_id' => $this->input->post('user_id'),
                        );

                      $val=$this->db->where('user_id',$user_id);
                       $this->db->update('assign_leads',$data);
                      //echo $this->db->last_query();die;
                      
                       $this->session->set_flashdata('success_msg',"'Time Set Successfully..");
                        return redirect($_SERVER['HTTP_REFERER']);
                 }
        else
        {
               $data = array(         
                        'lead_id' =>(implode(",", $lead_id)),
                        'user_id' => $this->input->post('user_id'),
                      );
                 $payment = $this->am->insert_data('assign_leads',$data);     
              $this->session->set_flashdata('success_msg', 'Time Set Successfully..');
            return redirect($_SERVER['HTTP_REFERER']);
         }  
    }

  //         public function assign_leads()
  //       {
  //           $user_id=$this->input->post('user_id');
  //           $lead_id=$this->input->post('lead');

  //         $data = array(         
  //           'lead_id' =>(implode(",", $lead_id)),
  //           'user_id' => $this->input->post('user_id'),

  //           );
  //         //print_r($data);die;
  //            $payment = $this->am->insert_data('assign_leads',$data);          
  //   $this->session->set_flashdata('success_msg', 'Status Change Successfully..');
  //           return redirect($_SERVER['HTTP_REFERER']);
  // }
  
   public function assignlead()
{
  if(!empty($_POST))
  {
    $user_id = $this->input->post('user_id');
    $auth = $this->input->post('lead');
    $pins=implode(',',$auth);
       foreach ($auth as $key => $value)
      {
        $pin_id=$value;
         $pin_user['assigned_to']=$user_id;
         $pin_user['assigned_at']=date('Y-m-d H:i:s');
         
      $this->db->where('id',$pin_id);
      $this->db->update('lead',$pin_user);
      //echo $this->db->last_query(); die;
     }
    $update = $this->am->update('employee',array('leads'=>$pins),array('id'=>$user_id));
     $data = array(         
              'user_id' => $user_id,
              'lead_id' =>$pins,
              
                );
      $lead = $this->am->insert_data('assign_leads',$data);
    return redirect($_SERVER['HTTP_REFERER']);
  }
  else
  {
    return redirect($_SERVER['HTTP_REFERER']);
  }
}


   public function quatatio()
  {
    //$this->load->view('admin/header');
    $this->load->view('admin/quatatio');
   // $this->load->view('admin/footer');

  } 
  
   public function add_quatatio()
      {
          $name=$this->input->post("name");
           $data = array(         
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile_no' =>$this->input->post('mobile_no'), 
            'password' =>$this->input->post('password'), 

            );
             $payment = $this->am->insert_data('quatatio',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Details Add Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
             }

       public function upload_india_mart_lead($value='')
         {
             $url = "https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/7042445112/GLUSR_MOBILE_KEY/MTYyNTY0NzkwMy44MDE3Izk4NzA2Njg1/";
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
        //   if(!empty($data))
        //   {
        //       echo " Pls Try After 5 Min";
        //   }
        //   else
        //   {
             
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
         //}
      
public function logout()
  {
    $this->notissetuser();
    $this->session->unset_userdata("id");  
    $this->session->unset_userdata("name");
     return redirect(base_url('admin/')); 
  }//logout method close

  public function invoice()
      {
           $res['data'] = $this->am->selectres('invoice');
           // echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/invoice',$res);
            $this->load->view('admin/footer');
      } 


       public function edit_user_amount($id)
        {
          if(!empty($_POST))
          {           
          $data = array(         
            'name' => $this->input->post('name'),
            'project_type' => $this->input->post('project_type'),
            'mobile_no' =>$this->input->post('mobile_no'),
            'total_payment' => $this->input->post('total_payment'),
            'payment_received' => $this->input->post('payment_received'),
            'payment_date' => $this->input->post('payment_date'),
            'payment_mode' =>$this->input->post('payment_mode'),
            'transection_no' =>$this->input->post('transection_no'),
            'balance' =>$this->input->post('balance'),
            'user_id' =>$this->input->post('user_id'),
                
                );
                        $this->db->where('id',$id);
                        $this->db->update('payment_details',$data);  
                        
                        
                        $this->session->set_flashdata('success_msg', 'Details Update Successfully..');
                          return redirect($_SERVER['HTTP_REFERER']);
                  }
                  
                  
            else
            {
      $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
      $result['data1'] = $this->am->selectres('lead');
      $this->notissetuser();
     $this->load->view('admin/header');
     $this->load->view('admin/edit_payment_details',$result);
     $this->load->view('admin/footer');
            }
      } 

}

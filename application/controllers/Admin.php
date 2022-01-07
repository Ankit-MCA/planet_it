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
        //$this->load->helper('New_helper');U
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




    public function banner()
  {
    $result['data'] = $this->am->selectres('banner');
    $this->load->view('admin/header');
    $this->load->view('admin/banner',$result);
    $this->load->view('admin/footer');
  }
  
  public function add_banner()
        {
          $this->notissetuser();
          $upload="";
          $config = array('upload_path' =>'./banner/', 
                'allowed_types' => "gif|jpg|png|jpeg",
                  'overwrite' => TRUE    
                );
      $this->load->library('upload',$config);
      if($this->upload->do_upload('image'))
      {
        $banner=$this->upload->data();
        $upload=$banner['file_name'];              
          //echo "file upload success";
      }
      else
      {
        $data['imageError']= $this->upload->display_errors();  
      }
            $data = array(          
                      'image' =>$upload,
                         );
            //print_r($data);die;
        $res = $this->am->insert_data('banner',$data); 
        $this->session->set_flashdata('success_msg', 'Banner Add Successfully..');
       // return redirect(base_url().'Admin/banner');
        return redirect($_SERVER['HTTP_REFERER']);
      }

    public function delete_banner($id){
    $this->notissetuser();
    $this->am->delete('banner',$id);
    if($id)
    {
      $this->session->set_flashdata('success_msg', "Data Delete Successfully.");
    //   redirect(base_url('admin/user_details'));
    return redirect($_SERVER['HTTP_REFERER']);
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
             $res['employee'] = $this->am->selectres('employee',array('status'=>'1'));
           // echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/role_form',$res);
            $this->load->view('admin/footer');
      }  
      
    public function add_role()
      {
         
           $name=$this->input->post("name");
           $roles=$this->input->post("roles");
           $sub_roles=$this->input->post("sub_roles");
           
        //   $res = $this->am->selectrow('employee',array('name'=>$name));
           
        //   $emp_id=$res->id;
          
          $data = array(         
              'emp_name' => $this->input->post('name'),
              'role' =>$this->input->post('role'),
              'assign_role' => implode(',',$roles),
               'sub_roles' => implode(',',$sub_roles),
               
                );

          //print_r($data);die;
             $lead = $this->am->insert_data('role',$data);
              if($lead)
                     {
                    $this->session->set_flashdata('success_msg', 'Role Add Successfully  Employee Id -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
            }
  //=======================Start Lead Section =====================//

    public function meeting_done()
      {
           $this->notissetuser();
           $res['data'] = $this->am->selectres('lead',array('stage'=>'Meeting Done'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  

      public function attendance()
      {
           $this->notissetuser();
             $date=date('Y-m-d');
            /// print_r($date);die;
             $res['data'] = $this->am->selectres('attendance',array('date'=>$date));
            $res['employee'] = $this->am->selectres('employee',array("status"=>'1'));
            $this->load->view('admin/header');
            $this->load->view('admin/add_attendance',$res);
            $this->load->view('admin/footer');
      }  
       public function attendance_list()
      {
           $this->notissetuser();
        $date=date('Y-m-d');
           $res['data'] = $this->am->selectres('attendance');
            $res['employee'] = $this->am->selectres('employee',array('status'=>'1'));
           // echo $this->db->last_query();die;
            $this->load->view('admin/header');
            $this->load->view('admin/attendance_list',$res);
            $this->load->view('admin/footer');
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
            $this->load->view('admin/header');
            $this->load->view('admin/employee_attendance',$result);
            $this->load->view('admin/footer');
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
         $this->load->view('admin/header');
            $this->load->view('admin/employee_attendance',$data);
            $this->load->view('admin/footer');
      }
       
       
        public function salary_slip($value='')
      {
           $this->notissetuser();
            $data['data1'] = $this->am->selectres('emp_salay_details');
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
      public function sale_done()
      {
           $this->notissetuser();
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
           $this->notissetuser();
           $res['data'] = $this->am->selectres('employee',array("status"=>'1'));
            $this->load->view('admin/header');
            $this->load->view('admin/employee_list',$res);
            $this->load->view('admin/footer');
      }
      
       public function emp_attendance_list()
      {
           $this->notissetuser();
           $res['data'] = $this->am->selectres('employee',array("status"=>'1'));
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
           $result['employee'] = $this->am->selectres('employee');
          $date=date('Y-m-d');
            $res['data'] = $this->am->selectres('lead',array('follow_up_date <'=> $date,'stage'=>'Follow Up'));
            $this->load->view('admin/header');
            $this->load->view('admin/lead_list',$res);
            $this->load->view('admin/footer');
      }  
   public function lead()
  {
      $date=date('Y-m-d');
    $result['data'] = $this->am->get_leads('lead',array('today_date'=>$date));   
    $result['employee'] = $this->am->selectres('employee');
    $this->load->view('admin/header');
    $this->load->view('admin/add_lead',$result);
    $this->load->view('admin/footer');
  } 
  public function alllead_list()
  {
     $result['employee'] = $this->am->selectres('employee',array('status'=>'1'));
    $result['data'] = $this->am->get_leads('lead');  
    $this->load->view('admin/header');
    $this->load->view('admin/lead_list',$result);
    $this->load->view('admin/footer');
  }  
   public function lead_list()
  {
     $result['employee'] = $this->am->selectres('employee',array('status'=>'1'));
    $result['data'] = $this->am->selectres('lead',array("stage"=>'',"assigned_to"=>''));  
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
  
  
  public function drop($id)
  {
    $this->am->drop('invoice');
    echo $this->db->last_query();die;
   
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
       $this->notissetuser();
       $result['employee'] = $this->am->selectres('employee');
    $result['data'] = $this->am->selectres('complet_lead');  
    $this->load->view('admin/header');
    $this->load->view('admin/complet_lead',$result);
    $this->load->view('admin/footer');

  } 

   public function complet_lead_list()
  {
       $this->notissetuser();
       $result['employee'] = $this->am->selectres('employee');
    $result['data'] = $this->am->selectres('lead',array('stage'=>'Sale Done')); 
    $this->load->view('admin/header');
    $this->load->view('admin/complet_lead_list',$result);
    $this->load->view('admin/footer');

  } 
   public function add_complet_lead()
      {
           $this->notissetuser();
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
             $this->notissetuser();
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
                  'add_on_point' =>$this->input->post('add_on_point'),
                  'add_on_cost' =>$this->input->post('add_on_cost'),
                );
                         //print_r($data);die;
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
       $this->notissetuser();
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
       $this->notissetuser();
    $result['data'] = $this->am->selectres('payment_details',array('user_id'=>$id));
    $this->load->view('admin/header');
    $this->load->view('admin/user_payment_list',$result);
    $this->load->view('admin/footer');

  } 


public function payment_details()
  { 
       $this->notissetuser();
     $result['customer'] = $this->am->selectres('lead',array('stage'=>'Sale Done'));
     $result['data'] = $this->am->selectres('payment_details');
        $this->load->view('admin/header');
        $this->load->view('admin/payment_list',$result);
        $this->load->view('admin/footer');

  } 
  public function add_first_payment($id)
  { 
       $this->notissetuser();
     $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
     //$result['data'] = $this->am->selectres('payment_details');
        $this->load->view('admin/header');
        $this->load->view('admin/add_first_payment',$result);
        $this->load->view('admin/footer');

  } 

   public function add_next_payment($id)
  {
       $this->notissetuser();
     $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
    $result['data1'] = $this->am->selectres('payment_details');  
    $this->load->view('admin/header');
    $this->load->view('admin/add_next_payment',$result);
    $this->load->view('admin/footer');
  } 
   public function payment_details_list()
  {
       $this->notissetuser();
    $result['customer'] = $this->am->selectres('lead',array('stage'=>'Sale Done'));
     $result['data'] = $this->am->selectres('payment_details');
    $this->load->view('admin/header');
    $this->load->view('admin/customer_payment_list',$result);
    $this->load->view('admin/footer');
  } 
   public function add_payment_details()
      {
           $this->notissetuser();
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
           $this->notissetuser();
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
       $this->notissetuser();
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
       $this->notissetuser();
   // $result['data'] = $this->am->selectres('maintenance_costumers');  
    $result['customer'] = $this->am->selectres('lead',array('stage'=>'Sale Done'));
    $this->load->view('admin/header');
    $this->load->view('admin/maintenace_list',$result);
    $this->load->view('admin/footer');

  } 
   public function maintenance_costumers_list($id)
  {
       $this->notissetuser();
    $result['data'] = $this->am->selectres('maintenance_costumers',array('user_id'=>$id));  
    $this->load->view('admin/header');
    $this->load->view('admin/maintenance_costumers_list',$result);
    $this->load->view('admin/footer');

  } 

   public function add_first_maintenance($id)
  {
       $this->notissetuser();
     $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
    $this->load->view('admin/header');
    $this->load->view('admin/add_first_maintence_payment',$result);
    $this->load->view('admin/footer');

  } 

  public function maintenance_report_list()
  {
       $this->notissetuser();
     $result['customer'] = $this->am->selectres('lead',array('stage'=>'Sale Done')); 
    $this->load->view('admin/header');
    $this->load->view('admin/maintenace_report_list',$result);
    $this->load->view('admin/footer');

  } 

   public function add_next_maintenance($id)
  {
       $this->notissetuser();
     $result['data'] = $this->am->selectrow('lead',array('id'=>$id));
    $result['data1'] = $this->am->selectres('payment_details');  
    $this->load->view('admin/header');
    $this->load->view('admin/add_next_maintence_payment',$result);
    $this->load->view('admin/footer');
  } 
   public function add_maintenance_costumers()
      {
           $this->notissetuser();
            $maintenance_cost=$this->input->post("maintenance_cost");
             $payment_received=$this->input->post("payment_received");
              $user_id=$this->input->post("user_id");
                $balance=$this->input->post("balance");
             
                   $this->db->select_sum('payment_received');
                    $this->db->from('maintenance_costumers');
                    $this->db->where('user_id',$user_id);
                    $query=$this->db->get();
                    $paye=$query->row()->payment_received;
                    
                    $this->db->select_sum('maintenance_cost');
                    $this->db->from('maintenance_costumers');
                    $this->db->where('user_id',$user_id);
                    $query=$this->db->get();
                    $total_mant=$query->row()->maintenance_cost;
                   
                    if($paye==NULL)
                    {
                         $payment=$balance;
                    }
                    else
                    {
                        $val=$paye+$payment_received;
                        
                         $payment=$total_mant+$maintenance_cost-$val;
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
               // print_r($data);die;
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
             $this->notissetuser();
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
       $this->notissetuser();
    $this->am->delete('maintenance_costumers',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Date Delete Successfully');
      // return  redirect(base_url('Admin/maintenance_costumers'));
      return redirect($_SERVER['HTTP_REFERER']);
    }
  }
  
     public function salary()
  {
    $this->notissetuser();
    $result['employee'] = $this->am->selectres('employee',array('status'=>'1'));  
    $this->load->view('admin/header');
    $this->load->view('admin/add_employee_salary',$result);
    $this->load->view('admin/footer');
  }  
  
  
  
  public function add_salary()
      {
           $this->notissetuser();
         
           $data = array(  
               'emp_id' => $this->input->post('emp_id'),
            'salary' => $this->input->post('amount'),
            'date' => $this->input->post('date'),
            'remark' =>$this->input->post('remark'), 
           

            );
             $payment = $this->am->insert_data('emp_salay_details',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Details Add Successfully');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
             }
             
      
       public function salaey_detials()
  {
      
      $this->notissetuser();
    $emp_id=$this->uri->segment(3);
     $month_id=$this->uri->segment(4);
    $res = $this->am->selectrow('emp_salay_details',array('emp_id'=>$emp_id));   
    $date = DateTime::createFromFormat('Y-m-d', $res->date);
    $new_date_format = $date->format('m');
    // print_r($month_id);die;
    $result['data'] = $this->am->selectres('emp_salay_details',array('emp_id'=>$emp_id,'month'=>$month_id));  
    $this->load->view('admin/header');
    $this->load->view('admin/salary_details',$result);
    $this->load->view('admin/footer');
  }  
  
  
  public function delete_salary_details($id)
  {
       $this->notissetuser();
    $this->am->delete('emp_salay_details',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Data Delete Successfully');
      // return  redirect(base_url('Admin/maintenance_costumers'));
      return redirect($_SERVER['HTTP_REFERER']);
    }
  }
       public function expenses()
  {
    $this->notissetuser();
    $result['data'] = $this->am->selectres('expenses');  
    $this->load->view('admin/header');
    $this->load->view('admin/expenses',$result);
    $this->load->view('admin/footer');
  }  
  
   public function add_expenses()
      {
           $this->notissetuser();
         
           $data = array(         
            'amount' => $this->input->post('amount'),
            'date' => $this->input->post('date'),
            'remark' =>$this->input->post('remark'), 
           

            );
             $payment = $this->am->insert_data('expenses',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Details Add Successfully');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
             }
             
             
    public function edit_expenses($id)
        {
             $this->notissetuser();
          if(!empty($_POST))
          {           
             $data = array(         
            'amount' => $this->input->post('amount'),
            'date' => $this->input->post('date'),
            'remark' =>$this->input->post('remark'), 
           

            );
                        $this->db->where('id',$id);
                        $this->db->update('expenses',$data);  
                        
                        // $payment = $this->am->insert_data('employee_all_details',$data1);
                        
                        $this->session->set_flashdata('success_msg', 'Details Update Successfully..');
                         return redirect($_SERVER['HTTP_REFERER']);
                  }
            else
            {
      $result['data1'] = $this->am->selectrow('expenses',array('id'=>$id));

      $result['data'] = $this->am->selectres('expenses');
      $this->notissetuser();
     $this->load->view('admin/header');
     $this->load->view('admin/edit_expenses',$result);
     $this->load->view('admin/footer');
            }
      }
      
      
public function delete_expenses($id)
  {
       $this->notissetuser();
    $this->am->delete('expenses',$id);
    if($id)
    {
       $this->session->set_flashdata('success_msg','Date Delete Successfully');
      // return  redirect(base_url('Admin/maintenance_costumers'));
      return redirect($_SERVER['HTTP_REFERER']);
    }
  }

   public function employee()
  {
       $this->notissetuser();
    $result['data'] = $this->am->selectres('employee',array("status"=>'1')); 
    $this->load->view('admin/header');
    $this->load->view('admin/add_employee',$result);
    $this->load->view('admin/footer');

  } 
  
   public function old_employee()
  {
       $this->notissetuser();
    $result['data'] = $this->am->selectres('employee',array("status"=>'0')); 
    $this->load->view('admin/header');
    $this->load->view('admin/old_employee',$result);
    $this->load->view('admin/footer');

  } 
  
  
   public function employee_details($id)
  {
       $this->notissetuser();
    $result['data'] = $this->am->selectres('employee_all_details',array('employee_id'=>$id));  
    $this->load->view('admin/header');
    $this->load->view('admin/employee_details',$result);
    $this->load->view('admin/footer');

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
     $this->load->view('admin/header');
     $this->load->view('admin/edit_employee',$result);
     $this->load->view('admin/footer');
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
     $this->load->view('admin/header');
     $this->load->view('admin/edit_employee_details',$result);
     $this->load->view('admin/footer');
            }
      }

  public function delete_employee($id)
  {
       $this->notissetuser();
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
           $this->notissetuser();
           
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
           $this->notissetuser(); 
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
     $this->notissetuser();
  if(!empty($_POST))
  {
    $user_id = $this->input->post('user_id');
    $auth = $this->input->post('lead');
    //print_r($auth);die;
    $pins=implode(',',$auth);
//print_r($pins);die;
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
             // print_r($data);die;  
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
  
                    public function recive_payment()
                     {
                            $this->db->select_sum('payment_received');
                            $this->db->from('payment_details');
                            $query=$this->db->get();
                            $paye=$query->row()->payment_received; 
                            
                            $this->db->select_sum('payment_received');
                            $this->db->from('maintenance_costumers');
                            $query=$this->db->get();
                            $m_pay=$query->row()->payment_received; 
                            
                            $total=$paye+$m_pay;
                            
                            print_r($total);die;

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
              $this->notissetuser();
              $date=date('Y-m-d');
             $url = "https://mapi.indiamart.com/wservce/enquiry/listing/GLUSR_MOBILE/7042445112/GLUSR_MOBILE_KEY/MTYzMTA4NTgwNi4wNTY5Izk4NzA2Njg1/Start_Time/$date/";
         // echo $url; die;
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
           // echo $output;die;
          $data = json_decode($output);
        //   echo "<pre>";
        //   print_r($output);die;
           if(!empty($output))
          {
              echo "Error_Message: There are no leads in the given time duration.please try for a different duration";
              //return redirect($_SERVER['HTTP_REFERER']);
          }
          else
          {
               $i=0;
                    foreach ($data as $key) 
                    {
                        
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
      
public function logout()
  {
    $this->notissetuser();
    $this->session->unset_userdata("id");  
    $this->session->unset_userdata("name");
     return redirect(base_url('admin/')); 
  }//logout method close

     public function invoice($id)
      {
           $this->notissetuser();
            $result['data'] = $this->am->selectrow('payment_details',array('id'=>$id));
            $this->load->view('admin/header');
            $this->load->view('admin/invoice',$result);
            $this->load->view('admin/footer');
       } 
       
        public function all_invoice($id)
      {
           $this->notissetuser();
            $result['data'] = $this->am->selectres('payment_details',array('user_id'=>$id));
            $this->load->view('admin/header');
            $this->load->view('admin/customer_transaction',$result);
            $this->load->view('admin/footer');
       } 
       
       
        public function all_invoice_with_gst($id)
      {
           $this->notissetuser();
            $result['data'] = $this->am->selectres('payment_details',array('user_id'=>$id));
            $this->load->view('admin/header');
            $this->load->view('admin/customer_transaction_withgst',$result);
            $this->load->view('admin/footer');
       } 
       
        public function adyone_invoice($id)
      {
           $this->notissetuser();
            $result['data'] = $this->am->selectres('payment_details',array('user_id'=>$id));
            $this->load->view('admin/header');
            $this->load->view('admin/adyone_invoice',$result);
            $this->load->view('admin/footer');
       } 
       
         public function ady_invoice($id)
      {
           $this->notissetuser();
            $result['data'] = $this->am->selectrow('payment_details',array('id'=>$id));
            $this->load->view('admin/header');
            $this->load->view('admin/ady_with_gst',$result);
            $this->load->view('admin/footer');
       } 
       
         public function invoice_with_out_gst($id)
      {
           $this->notissetuser();
            $result['data'] = $this->am->selectrow('payment_details',array('id'=>$id));
            $this->load->view('admin/header');
            $this->load->view('admin/invoice_with_out_gst',$result);
            $this->load->view('admin/footer');
      } 
      
      
      public function add_invoice()
      {
           $this->notissetuser();
           $data = array(         
              'comp_name' => $this->input->post('comp_name'),
              'comp_email' => $this->input->post('comp_email'),
              'comp_mobile_no' =>$this->input->post('comp_mobile_no'),
              'company_country' => $this->input->post('company_country'),
              'comp_gst_no' => $this->input->post('comp_gst_no'),
              'client_country' => $this->input->post('client_country'),
              'comp_pan_no' =>$this->input->post('comp_pan_no'),
              'comp_city' =>$this->input->post('comp_city'),
                'comp_state' =>$this->input->post('comp_state'),
                'comp_address' =>$this->input->post('comp_address'),
                'comp_zip_code' =>$this->input->post('comp_zip_code'),
                'client_name' =>$this->input->post('client_name'),
                
                
                'client_mobile_no' => $this->input->post('client_mobile_no'),
              'client_email' => $this->input->post('client_email'),
              'client_gst_no' =>$this->input->post('client_gst_no'),
              'client_pan_no' => $this->input->post('client_pan_no'),
              'client_address' => $this->input->post('client_address'),
              'client_city' => $this->input->post('client_city'),
              'client_state' =>$this->input->post('client_state'),
              'client_zip_code' =>$this->input->post('client_zip_code'),
                'project_name' =>$this->input->post('project_name'),
                'gst' =>$this->input->post('gst'),
                'quantity' =>$this->input->post('quantity'),
                'amount' =>$this->input->post('amount'),
                 'total_amount' =>$this->input->post('total_amount'),
                  'invoice_no' =>$this->input->post('invoice_no'),
                   'invoice_date' =>$this->input->post('invoice_date'),
                    'due_date' =>$this->input->post('due_date'),
                 
                );
             $lead = $this->am->insert_data('invoice',$data);
              if($lead)
                     {
                    $this->session->set_flashdata('success_msg', 'Invoice Add Successfully');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
            }
         }
       public function edit_user_amount($id)
        {
             $this->notissetuser();
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
      
      
      //=======================17-9-2021============================//
      
     public function employee_full_details()
  {
     $this->notissetuser();
    $result['data'] = $this->am->selectres('employee',array('status'=>'1'));  
    $this->load->view('admin/header');
    $this->load->view('admin/employee_full_details',$result);
    $this->load->view('admin/footer');

  } 
  
  
  public function employee_monthly_report($id)
  { 
     $result['data'] = $this->am->selectrow('employee',array('id'=>$id));
      $result['data1'] = $this->am->selectres('month');
    $this->load->view('admin/header');
    $this->load->view('admin/manthly_report',$result);
    $this->load->view('admin/footer');
  } 
  
  public function add_payment_remark()
      {
           $this->notissetuser();
         
           $data = array(         
            'user_id' => $this->input->post('user_id'),
            'date' => $this->input->post('date'),
            'remark' =>$this->input->post('remark'), 
            );
             $payment = $this->am->insert_data('payment_remark',$data);
              if($payment)
                     {
                    $this->session->set_flashdata('success_msg', 'Details Add Successfully');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                }
             }

}

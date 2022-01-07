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
          //echo $query;die;
      		if($query)
      		{
      			$this->session->set_userdata('id', $query->id);
      			$this->session->set_userdata('name',$query->name);
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
		$this->load->view('user/header');
		$this->load->view('user/dashboard');
		$this->load->view('user/footer');
	}  


  public function lead_list()
  {
    $user_id=$this->session->userdata("id");
    //print_r($user_id);die;
    $result['data'] = $this->am->get_leads('lead',array("stage"=>'','assigned_to'=>$user_id)); 
    //echo $this->db->last_query();die; 
  //print_r($result);die;
    $this->load->view('user/header');
    $this->load->view('user/lead_list',$result);
    $this->load->view('user/footer');

  } 

public function logout()
  {
    $this->notissetuser();
    $this->session->unset_userdata("id");  
    $this->session->unset_userdata("name");
     return redirect(base_url('user/')); 
  }//logout method close

}

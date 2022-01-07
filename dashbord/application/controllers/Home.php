<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller 
{
	public function __construct()
      {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model','am');
      }  
   public function notissetuser()
  {
    if(!$this->session->userdata("id"))
    return redirect(base_url("Home/index"));
  }//notissetuse
     
      public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}  

   public function about()
  {
    $this->load->view('header');
    $this->load->view('about');
    $this->load->view('footer');
  }  
   public function services()
  {
    $this->load->view('header');
    $this->load->view('services');
    $this->load->view('footer');
  }  
   public function portfolio()
  {
    $this->load->view('header');
    $this->load->view('portfolio');
    $this->load->view('footer');
  }  

  public function our_team()
  {
    $this->load->view('header');
    $this->load->view('our_team');
    $this->load->view('footer');
  }  

public function testimonial()
  {
    $this->load->view('header');
    $this->load->view('testimonial');
    $this->load->view('footer');
  }  
   public function privacy_policy()
  {
    $this->load->view('header');
    $this->load->view('privacy_policy');
    $this->load->view('footer');
  }  
   public function contact()
  {
    $this->load->view('header');
    $this->load->view('contact');
    $this->load->view('footer');
  } 


    public function contact_user()
      {
         $name=$this->input->post("name");
           $data = array(         
              'name' => $this->input->post('name'),
              'email' => $this->input->post('email'),
              'mobile_no' =>$this->input->post('mobile_no'),
              'msg' => $this->input->post('msg'),
              
                
                );
             $lead = $this->am->insert_data('contact_user',$data);
              if($lead)
                     {
                    $this->session->set_flashdata('success_msg', 'Details Add Successfully  Customer Name -' .$name.'');
                             // redirect('user/index');
                    return redirect($_SERVER['HTTP_REFERER']);
                 
                    }
             }

    public function faq()
  {
    $this->load->view('header');
    $this->load->view('faq');
    $this->load->view('footer');
  }  

      

      
public function logout()
  {
    $this->notissetuser();
    $this->session->unset_userdata("id");  
    $this->session->unset_userdata("name");
     return redirect(base_url('admin/')); 
  }//logout method close

}

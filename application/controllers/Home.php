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
		$this->load->view('home/header');
		$this->load->view('home/home');
        $this->load->view('home/footer');
	}  

   public function about()
  {
    $this->load->view('home/header');
    $this->load->view('home/about');
    $this->load->view('home/footer');
  }  
   public function services()
  {
    $this->load->view('home/header');
    $this->load->view('home/services');
    $this->load->view('home/footer');
  }  
   public function portfolio()
  {
    $this->load->view('home/header');
    $this->load->view('home/portfolio');
    $this->load->view('home/footer');
  }  

  public function digital_marketing()
  {
    $this->load->view('home/header');
    $this->load->view('home/digital');
    $this->load->view('home/footer');
  }  

   public function mobile_app_development()
  {
   $this->load->view('home/header');
    $this->load->view('home/mobile_app');
    $this->load->view('home/footer');
  }  
  
  
   public function costomize_software_development()
  {
   $this->load->view('home/header');
    $this->load->view('home/costomize');
    $this->load->view('home/footer');
  } 
  
  
    public function gaming_app_development()
  {
   $this->load->view('home/header');
    $this->load->view('home/gaming_app');
    $this->load->view('home/footer');
  } 
  
  
   public function web_development()
  {
   $this->load->view('home/header');
    $this->load->view('home/web_app');
    $this->load->view('home/footer');
  } 
  
  
  
   public function blockchain_development()
  {
   $this->load->view('home/header');
    $this->load->view('home/blockchain');
    $this->load->view('home/footer');
  } 
  
   public function privacy_policy()
  {
    $this->load->view('header');
    $this->load->view('privacy_policy');
    $this->load->view('footer');
  }  
   public function contact_us()
  {
   $this->load->view('home/header');
    $this->load->view('home/contact_us');
    $this->load->view('home/footer');
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

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General {

	public $CI;
	function __construct() {
		$this ->CI =& get_instance();
	}
	function active_class($controller){
		return $this->CI->router->fetch_class() == $controller?'active':'';
	}
	public function userauth(){
		$this->SetHeader();
		$controller = $this->CI->router->fetch_class();
		if($this->CI->session->USER['UserId']=='' && $this->CI->session->USER['UserId'] == null){
			$method = $this->CI->router->fetch_method()!='index'?$this->CI->router->fetch_method():'';
			//$this->CI->session->set_userdata("user_last_page", base_url().FRONTEND.$controller.'/'.$method);
			$this->CI->session->set_userdata("user_last_page",base_url($this->CI->uri->segment(1)));
			redirect(base_url('login'));
		}
	}
	/* Make Resize false To Stop Compress */
	public function upload_file($field_name, $upload_path, $file_name, $allowed_types = "gif|jpg|png|jpeg", $resize = true){
		$this->CI->load->library('upload');
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, TRUE);
			@chmod($upload_path,0777);
		}
		if($file_name == ''){
			$file_name = md5(date("l, F d, Y h:i" ,time()).'_'.rand() . (microtime()) . $file_name);
		}
		/* If Allowed Type Not Passed */
		if($allowed_types == ""){
			$allowed_types = "gif|jpg|png|jpeg";
		}
		$config['file_name'] = $file_name;
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = $allowed_types;
		$config['overwrite'] = true;
		$config['remove_spaces'] = TRUE;
		$this->CI->upload->initialize($config);

		$FileName = "";
		if ($this->CI->upload->do_upload($field_name)) {
			$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			if($ext != ""){
				$alwr = array("gif", "jpg","png","jpeg");
				if(in_array($ext, $alwr)){
					if($resize == true && isset($_FILES[$field_name]['size'])){
						$size = $_FILES[$field_name]['size'];
						//$this->compress($file_name,$upload_path, $file_name, $size);
					}
				}
			}
			$file = $this->CI->upload->data();
			$FileName = $file['file_name'];
			chmod($file['full_path'],0777);
		} else {
			$error['error'] = $this->CI->upload->display_errors();
			return $error;
		}
		return $FileName;
	}
	public function SetHeader(){
		$this->CI->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->CI->output->set_header('Pragma: no-cache');
		$this->CI->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	public function checkext($name,$cname,$allowed = array('jpg','jpeg','png')){
		$ext = strtolower(pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION));
		if(!in_array($ext, $allowed)){
			$this->CI->session->set_flashdata('error','You are Trying To Upload File That Are Not Allowed!!');
			redirect(base_url($cname));
		} else {
			return $ext;
		}
	}
	public function createslug($string){
		$slug = strtolower(trim(preg_replace('/-{2,}/','-',preg_replace('/[^a-zA-Z0-9-.]/', '-', $string)),"-"));
		return $slug;
	}
	public function resize_image($path,$name,$w = '360',$h = '240',$isthumb = false,$thumbpath = ''){
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
			@chmod($path,0777);
		}
		//copy(SUBSERVICEPATH.$name, SUBSERVICEPATH.'main/'.$name);
		include_once APPPATH.'third_party/resize_image.php';
		$image = new SimpleImage(); 
		$image->load($path.$name);
		$image->resize($w,$h);
		if($isthumb){
			if (!is_dir($path.$thumbpath)) {
				mkdir($path.$thumbpath, 0777, TRUE);
				@chmod($path.$thumbpath,0777);
			}
			$image->save($path.$thumbpath.$name);
		} else {
			$image->save($path.$name);	
		}
		return true;
	}
	
	public function EmailSend($data = array()){
		include_once APPPATH.'third_party/class.phpmailer.php';
		$subject	= $data['Subject'];
		$to_email = $data['ToEmail'];
		$from_mail = $data['FromEmail'];
		$from_name = $data['FromName'];
		$body = $data['Message'];
		$mail = new PHPMailer();
	
		$mail->SetFrom($from_mail,$from_name); // From email ID and from name
		if(is_array($to_email) && count($to_email) > 0){
			foreach ($to_email as $key => $email) {
				if($email != '')
					$mail->AddAddress(stripslashes(trim($email)));
			}
		} else {
			$mail->AddAddress(stripslashes(trim($to_email)));
		}
		$mail->Subject = $subject;
		$mail->MsgHTML($body);
		$mail->Send();
	}

	/* For Generate Thumb & Round Image Other Practice */
	public function genthumb($path, $file_name, $isRound = true){
		$this->resize_image($path,$file_name,'180','130',true,THMB);
		if($isRound){
			$this->resize_image($path,$file_name,'70','70',true,THMBCRCL);
		}
	}
    public function mail_by_ci_email($to_email, $subject, $body, $from_name = "World Wide Taxi",$attach = ""){
		$mconf = array( "mailtype"=>"html",
						"protocol"=>"smtp",
						"smtp_host"=>"smtp.ionos.co.uk",
						"smtp_user"=>"info@theworldwidetaxi.com",
						"smtp_pass"=>"Sohaan@786",
						"smtp_port"=>587,/*465*/
					);
		$this->CI->load->library('email', $mconf);
		$this->CI->email->set_mailtype("html");
		$this->CI->email->from('info@theworldwidetaxi.com', $from_name);
		$this->CI->email->to($to_email);
		$this->CI->email->subject($subject);
		/* Add Attachment */
        if($attach != ''){
			$this->CI->email->attach($attach);
		}
		$this->CI->email->message($body);
		return $this->CI->email->send();
	}
	public function snd_em($to_email, $subject, $body, $from_name = "THE WORLDWIDE TAXI",$attach = ""){
		
		if($subject == "")
        	$subject    = "Test Sub";
        if($to_email == "")
        	$to_email    = "mahendra.developer007@gmail.com";
        
        return $this->mail_by_ci_email($to_email, $subject, $body, $from_name,$attach);
        /* Below Code Not Require Now */
		include_once APPPATH.'third_party/class.phpmailer.php';
        /* Mail From Name & Email */
        $from_mail = "worldwidetaxi@gmail.com";
        /* $from_name = "Drlogy"; */
		$mail = new PHPMailer();
		$mail->SetFrom($from_mail,$from_name);
        $mail->AddAddress(stripslashes(trim($to_email)));
        $mail->Subject = $subject;
        $mail->MsgHTML($body);
        /* Add Attachment */
        if($attach != ''){
        	$mail->addAttachment($attach);
        }
        
        return $mail->Send();
       // echo $mail->ErrorInfo;
        	/*$mail->Send();*/
        
        return true;
	}
	/* 30-06-2020 Get Social Links */
	public function get_soci_link(){
		if(isset($this->CI->session->soci_links) && $this->CI->session->soci_links != ""){
			return $this->CI->session->soci_links;
		} else {
			$whin = array("social_facebook", "social_twitter", "social_instagram","social_youtube");
	        $query = $this->CI->db->select("*")->from("settings")->where_in("key", $whin)->get();
	        $result = $query->result_array();
	        $config = array();
	        foreach ($result as $key => $v) {
	            $config[$v["key"]] = $v["value"];
	        }
	        $this->CI->session->set_userdata("soci_links", $config);
	        return $config;
	    }
    }
    public function get_token(){
		$token = ""; $flag = true;
		while ($flag) {
			$token = md5(uniqid(date("Y-m-d-H-i-s-l-A")));
			$token = implode("-", str_split($token, 4));

			$tkn_existed = $this->CI->db->get_where("user_register", array("token" => $token));
			if($tkn_existed->num_rows() < 1) {
				$flag = false;
			}
		}
		return $token;
	}
}
?>
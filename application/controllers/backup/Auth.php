<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public $CI = NULL; 
	public function __construct(){
        parent::__construct();   
		$this->load->library('common');     
        $this->load->model('AdminModel','',TRUE);
        $this->load->model('CommonModel','',TRUE);
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper("jwt_helper");
	   $this->CI = & get_instance();
    }

	 /****************Common Data*********************/
	 public function common_data()
	 {
		 date_default_timezone_set('Asia/Kolkata');
		 $post_date = date('Y-m-d');
		 $timestamp = date("Y-m-d H:i:s");
		 $data["post_date"] = $post_date;
		 $data["timestamp"] = $timestamp;
		 $data["menu_open"]="";		
		 $data["menu_active"]="";
		 
		 if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
		//	 redirect("auth");
		 }
		
		 $data['employee_session_id']="";
		 $data['employee_session_email']= "";
		 $data['employee_session_type'] = "";
		 $data['employee_session_id']= $this->session->userdata("employee_session_id");
		 $data['employee_session_email'] = $this->session->userdata("employee_session_email");
		 $data['employee_session_type'] = $this->session->userdata("employee_session_type");
		 $data['employee_session_name'] = $this->session->userdata("employee_session_name");
		
		 
		 return $data;
	 }
	 /****************Common Data*********************/
	 
    
	public function index() {
		$this->load->view('auth/login');
	}

	public function login() {
		redirect('dashboard');
	}

	public function dashboard() {

		$data=$this->common_data();
		$data['menu_open'] = "";
		$data['menu_active'] = "dashboard";

		$this->load->view('dashboard',$data);
	}
	public function logout() { 
        $this->session->sess_destroy();
         $this->session->unset_userdata('logged_in');       
         redirect(base_url());
    }

}
?>
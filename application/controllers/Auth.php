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
		$data=$this->common_data();
		
		$email=$this->input->post('email');
		$pass=$this->input->post('password');
		$data_save=array('email'=>$email,'password'=>md5($pass));
		$admin_exist=$this->CommonModel->getRecords($data_save,'mst_admin');
		if($admin_exist!=false){
			foreach($admin_exist as $info){
			$data['employee_session_id']= $this->session->set_userdata("employee_session_id",$info->sk_admin_id);
			$data['employee_session_email'] = $this->session->set_userdata("employee_session_email",$info->email);
			$data['employee_session_type'] = $this->session->set_userdata("employee_session_type",$info->mobile);
			$data['employee_session_name'] = $this->session->set_userdata("employee_session_name",$info->name);
			}
			redirect('dashboard');
		}else{
		redirect('/');

		}		
	}

	public function dashboard() {

		$data=$this->common_data();
		if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
		 
		$data['menu_open'] = "";
		$data['menu_active'] = "dashboard";
		$where=array('order_status'=>'CREATED');
		$getNew=$this->CommonModel->getRecords($where,'mlt_order');
		if($getNew!=false){
			$data['countnew']=0;
		}else{
		$data['countnew']=count($getNew);
		}
		$this->load->view('dashboard',$data);
	}
	public function logout() { 
        $this->session->sess_destroy();
         $this->session->unset_userdata('logged_in');       
         redirect(base_url());
    }

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
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
           // redirect("auth");
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

    public function coupons() {

        $data=$this->common_data();
       
		$data['menu_open'] = "settings";
		$data['menu_active'] = "coupons";
        $where=array();
        $data['CouponDetails']=$this->CommonModel->getRecords($where,'mlt_coupons');
        $this->load->view('settings/coupons',$data);

    }
    public function savecoupon() {
        $data=$this->common_data();
        $couponcode=$this->input->post('coupon_code');
        $startdate=$this->input->post('start_date');
        $enddate=$this->input->post('end_date');
        $dis=$this->input->post('discount');
        $data_save=array('coupon_code'=>$couponcode, 'start_date'=>$startdate, 'end_date'=>$enddate,'discount'=>$dis, 'coupon_status'=>1);

        $this->CommonModel->Save($data_save,'mlt_coupons');
        redirect('settings/coupons');
    }
   public function couponEdit() {
        $data=$this->common_data();
        $type=$this->uri->segment(3); 
        if($type=="edit"){
            $data['id']=$id=$this->uri->segment(4);
            $where=array('sk_coupon_id '=>$id);
            $data['CouponDetail']=$this->CommonModel->getRecords($where,'mlt_coupons'); 
            $this->load->view('settings/editcoupons',$data);
        }
        else if($type=="update"){
            $data=$this->common_data();
            $id=$this->input->post('id');
            $couponcode=$this->input->post('coupon_code');
            $startdate=$this->input->post('start_date');
            $enddate=$this->input->post('end_date');
            $dis=$this->input->post('discount');
            $datasave1=array('coupon_code'=>$couponcode, 'start_date'=>$startdate, 'end_date'=>$enddate,'discount'=>$dis, 'coupon_status'=>1);
            $this->CommonModel->update('mlt_coupons','sk_coupon_id  ',$id,$datasave1);
            //$this->CommonModel->Save($data_save,'mlt_coupons');
            redirect('settings/coupons');
        }
       else if($type=="delete"){
            $id=$this->uri->segment(4);
                    $datasave1=array('coupon_status'=>0);
                    $this->CommonModel->update('mlt_coupons','sk_coupon_id ',$id,$datasave1);
                    redirect('settings/coupons');
                }else if($type=="active")
                {
                    $id=$this->uri->segment(4);
                    $datasave1=array('coupon_status'=>1);
                    $this->CommonModel->update('mlt_coupons','sk_coupon_id',$id,$datasave1);
                    redirect('settings/coupons');
                }
    }
}





















    

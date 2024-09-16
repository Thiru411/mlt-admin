<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Org extends CI_Controller {
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
    
	
    public function employee_directory() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
		$data['menu_open'] = "employees";
		$data['menu_active'] = "employee-directory";
        $data['getemployeedetails']=$this->AdminModel->fetch_records();
       // where=array(id);
		$this->load->view('org/employee-directory',$data);
	}
    //**************employee */

    public function employee_onboarding() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
		$data['menu_open'] = "employees";
		$data['menu_active'] = "employee-onboarding";
        $where=array();
        $data['getdesination']=$this->CommonModel->getRecords($where,'mlt_designation');
        $data['getrole']=$this->CommonModel->getRecords($where,'mlt_role');
        $data['getstate']=$this->CommonModel->getRecords($where,'mst_state');
		$this->load->view('org/employee-onboarding',$data);
	}
    public function employeesave() {
        //echo "dfghjkl"; exit;
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $firstname=$this->input->post('first_name');
        $middlename=$this->input->post('middle_name');
        $lastname=$this->input->post('last_name');
        $number=$this->input->post('employee_mobile');
        $emergency_number=$this->input->post('emergency_mobile');
        $email=$this->input->post('email');
        $user_name=$this->input->post('username');
        $password=$this->input->post('password');


        $address=$this->input->post('employee_address'); 
        $state=$this->input->post('state');
        $postalcode=$this->input->post('postalcode');
        $dob=$this->input->post('dob');
        $newDate = date("Y-m-d", strtotime($dob)); 
        $dateOfBirth = "DD/MM/YYYY";
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));


        $place=$this->input->post('place_of_birth');
        $relation=$this->input->post('relationshit_status');
        $aadhar=$this->input->post('aadhar');
        $role=$this->input->post('role');
        $designation=$this->input->post('Designation');
        $doj=$this->input->post('doj');
        $newDate1 = date("Y-m-d", strtotime($doj)); 
        $dateOfjoining = "DD/MM/YYYY";
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
       
       
        $image=$this->input->post('image');
        $image=$_FILES['image']['name'];
        $allowedExts=array("png,jpg,jpeg");
		$temp=explode(".", $_FILES["image"]["name"]);
        $extension=end($temp);
		if($_FILES["image"]["error"]>0)
		{
			echo "return code:" .$_FILES["image"]["error"]."<br>";
		}
		else
		{
		 $temp=$_FILES["image"]["tmp_name"];
         $path="uploads/employee/".$_FILES["image"]["name"];
		move_uploaded_file($temp,$path);
		$picname=$_FILES['image']['name'];
		}

        $data1=array('first_name'=>$firstname, 'middle_name'=>$middlename, 'last_name'=>$lastname, 'mobile'=>$number, 'emergency_contact_no'=>$emergency_number, 
        'email'=>$email, 'username'=>$user_name, 'password'=>$password,'address'=>$address, 'state'=>$state, 'postalcode'=>$postalcode, 'dob'=>$newDate, 'place_of_birth'=>$place,
        'relationship_status'=>$relation, 'aadhar'=>$aadhar, 'role'=>$role, 'designation'=>$designation, 'doj'=>$newDate1, 'image'=>$image);
       
        $this->CommonModel->Save($data1,'mlt_employee');

        redirect('org/employee_onboarding');
   // var_dump($data1); exit;


    }
//**********************end employee****** */

    public function employee_documents() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
		$data['menu_open'] = "documents";
		$data['menu_active'] = "employee-documents";

		$this->load->view('org/employee-documents',$data);
	}
    public function viewcustomer(){
                
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data['menu_open'] = "employees";
        $data['menu_active'] = "viewcustomers";    
        $where=array();
       $data['userdetails']=$this->AdminModel->userdetails();       
       $this->load->view('org/viewcust',$data);  
    }
    public function orderdetails(){
                
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data['menu_open'] = "employees";
        $data['menu_active'] = "orderdetails";    
        $where=array();
       $data['orderdetails']=$this->AdminModel->orderdetails();       
       $this->load->view('org/orderdetails',$data);  
    }
    public function vieworders(){
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
          $data['id']=$sk_id=$this->uri->segment(3);
            $where=array('sk_order_id'=>$sk_id);
            $data['orderdetails']=$this->AdminModel->viewdetails($sk_id); 
           $data['id']=$sk_id=$this->uri->segment(3);
          // echo $sk_id; exit;
            $data['adddetails']=$this->AdminModel->itemdetails($sk_id);
            //echo json_encode($data['adddetails']); exit;
          
            $this->load->view('org/vieworders',$data);
    }


    public function employee_settings() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
		$data['menu_open'] = "employees";
		$data['menu_active'] = "employee-settings";
        $where=array();
       $data['getdesination']=$this->CommonModel->getRecords($where,'mlt_designation');
       $data['getrole']=$this->CommonModel->getRecords($where,'mlt_role'); 
		$this->load->view('org/employee-settings',$data);
	}
    //************DESIGNATION**************/
    public function save_designation() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $name=$this->input->post('designation');
        $save_data=array('designation_name'=>$name, 'designation_status'=>1);
        $designation_id=$this->CommonModel->Save($save_data,"mlt_designation");
        redirect('org/employee_settings');
    }
    public function designationEdit() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $type=$this->uri->segment(3);
        

        if($type=="edit"){
            $data['id']=$sk_id=$this->uri->segment(4);
            $where=array('sk_designation_id'=>$sk_id);
            $data['getdesignation']=$this->CommonModel->getRecords($where,'mlt_designation'); 
            $this->load->view('org/editdesignation',$data);
        }else if($type=="update"){
            $id=$this->input->post('id');
            $name=$this->input->post('designation');
            $save_data=array('designation_name'=>$name);
            $this->CommonModel->update('mlt_designation','sk_designation_id',$id,$save_data);
            redirect('org/employee_settings');
        }
        else if($type=="delete"){
            $id=$this->uri->segment(4);
            $save_data=array('designation_status'=>0);
            $this->CommonModel->update('mlt_designation','sk_designation_id',$id,$save_data);
            redirect('org/employee_settings');
        }else if($type=="active")
        {
            $id=$this->uri->segment(4);
            $save_data=array('designation_status'=>1);
            $this->CommonModel->update('mlt_designation','sk_designation_id',$id,$save_data);
            redirect('org/employee_settings');
        }
           
        }
        //***************************DESIGNATION****************/
        //***************************Role***********************/

       public function save_role() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $name=$this->input->post('role');
        $save_data=array('role_name'=>$name, 'role_status'=>1);
        $this->CommonModel->Save($save_data,"mlt_role");
        redirect('org/employee_settings');

    }
    public function roleEdit(){
       // echo "dfghj"; exit;
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
      $type=$this->uri->segment(3); 

        if($type=="edit")
        {
          //  echo "fgh"; exit;
          echo   $data['id']=$sk_id=$this->uri->segment(4);
            $where=array('sk_role_id'=>$sk_id);
            $data['getrole']=$this->CommonModel->getRecords($where,'mlt_role'); 
            $this->load->view('org/editrole',$data);
        }
        elseif($type=="update") {
            echo "gfgfhjk";
            $id=$this->input->post('id');
            $name=$this->input->post('role');
            $save_data=array('role_name'=>$name);
            $this->CommonModel->update('mlt_role','sk_role_id',$id,$save_data);
            redirect('org/employee_settings');
        } 
        else if($type=="delete"){
            $id=$this->uri->segment(4);
            $save_data=array('role_status'=>0);
            $this->CommonModel->update('mlt_role','sk_role_id',$id,$save_data);
            redirect('org/employee_settings');
        }
        else if($type=="active")
        {
            $id=$this->uri->segment(4);
            $save_data=array('role_status'=>1);
            $this->CommonModel->update('mlt_role','sk_role_id',$id,$save_data);
            redirect('org/employee_settings');
        }
        }

        //********************END OF ROLE******************/
    
    public function employee_onboarding_edit(){
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $type=$this->uri->segment(3);
        if($type=="edit")
        {
          //  echo "fgh"; exit;
          $data['id']=$Id=$this->uri->segment(4);
          $where1=array();
          $data['getrole']=$this->CommonModel->getRecords($where1,'mlt_role'); 
          $data['getdesination']=$this->CommonModel->getRecords($where1,'mlt_designation');
          $data['getstate']=$this->CommonModel->getRecords($where1,'mst_state'); 
            $where=array('Id'=>$Id);
            $data['getemployeedetails']=$this->CommonModel->getRecords($where,'mlt_employee'); 
            $this->load->view('org/employeedirectoryedit',$data);
        }

        elseif($type=="update") {
           // echo "gfgfhjk";
            $id=$this->input->post('id');
            $data=$this->common_data();
        $firstname=$this->input->post('first_name');
        $middlename=$this->input->post('middle_name');
        $lastname=$this->input->post('last_name');
        $number=$this->input->post('employee_mobile');
        $emergency_number=$this->input->post('emergency_mobile');
        $email=$this->input->post('email');
        $user_name=$this->input->post('username');
        $password=$this->input->post('password');


        $address=$this->input->post('employee_address'); 
        $state=$this->input->post('state');
        $postalcode=$this->input->post('postalcode');
        $dob=$this->input->post('dob');
        $newDate = date("Y-m-d", strtotime($dob)); 
        $dateOfBirth = "DD/MM/YYYY";
        $today = date("Y-m-d");
       // $diff = date_diff(date_create($dateOfBirth), date_create($today));


        $place=$this->input->post('place_of_birth');
        $relation=$this->input->post('relationshit_status');
        $aadhar=$this->input->post('aadhar');
        $role=$this->input->post('role');
        $designation=$this->input->post('Designation');
        $doj=$this->input->post('doj');
        $newDate1 = date("Y-m-d", strtotime($doj)); 
       // $dateOfjoining = "DD/MM/YYYY";
       // $today = date("Y-m-d");
       // $diff = date_diff(date_create($dateOfBirth), date_create($today));
       $image=$_FILES['image']['name'];
       if($image!=''){
        //$image=$this->input->post('image');
        
        $allowedExts=array("png,jpg,jpeg");
		$temp=explode(".", $_FILES["image"]["name"]);
        $extension=end($temp);
		if($_FILES["image"]["error"]>0)
		{
			echo "return code:" .$_FILES["image"]["error"]."<br>";
		}
		else
		{
		 $temp=$_FILES["image"]["tmp_name"];
         $path="uploads/employee/".$_FILES["image"]["name"];
		move_uploaded_file($temp,$path);
		$picname=$_FILES['image']['name'];
		}
        
        $data1=array('first_name'=>$firstname, 'middle_name'=>$middlename, 'last_name'=>$lastname, 'mobile'=>$number, 'emergency_contact_no'=>$emergency_number, 
        'email'=>$email, 'username'=>$user_name, 'password'=>$password,'address'=>$address, 'state'=>$state, 'postalcode'=>$postalcode, 'dob'=>$newDate, 'place_of_birth'=>$place,
        'relationship_status'=>$relation, 'aadhar'=>$aadhar, 'role'=>$role, 'designation'=>$designation, 'doj'=>$newDate1, 'image'=>$image);


    }else{
        $data1=array('first_name'=>$firstname, 'middle_name'=>$middlename, 'last_name'=>$lastname, 'mobile'=>$number, 'emergency_contact_no'=>$emergency_number, 
        'email'=>$email, 'username'=>$user_name, 'password'=>$password,'address'=>$address, 'state'=>$state, 'postalcode'=>$postalcode, 'dob'=>$newDate, 'place_of_birth'=>$place,
        'relationship_status'=>$relation, 'aadhar'=>$aadhar, 'role'=>$role, 'designation'=>$designation, 'doj'=>$newDate1);

    }
//var_dump($data1); exit;
           $this->CommonModel->update('mlt_employee','Id',$id,$data1);
           redirect('org/employee_directory');
        } 



    }




}?>
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
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
		$data['menu_open'] = "couponR";
		$data['menu_active'] = "coupons";
        $where=array();
        $data['CouponDetail']=$this->CommonModel->getRecords($where,'mlt_coupons'); 
        $this->load->view('settings/coupons',$data);

    }
    /*public function savecoupon() {
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
    }*/
	
	public function sms_test(){
		
	// Account details
	$apiKey = urlencode('ZTUxYWEzMTBhNmI3NzI5NTVlYmFjNTg0YzBkODM5MjQ=');
	
	// Message details
	$numbers = array(8217676967,9535079797);
	$sender = urlencode('MYLVTG');
    
	$message = rawurlencode( 'Welcome back  Rajesh! your OTP for signing in is 1234. Have a great day! Team MLT');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;

	}
    public function sms_test1(){ 
    // Authorisation details.
	$username = "am@foodtechventures.in";
	$hash = "7d2e5b18c9d275db84076b0b47f2714322343ceb712db0628b8e3ef9be3f0e29";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "MYLVTG"; // This is who the message appears to be from.
	$numbers = "8217676967,9535079797"; // A single number or a comma-seperated list of numbers
	$message = "Welcome back  Rajesh! your OTP for signing in is 1234. Have a great day! Team MLT";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	echo $result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
    }
    public function order_track_sms(){ 
        // Authorisation details.
        $username = "am@foodtechventures.in";
        $hash = "7d2e5b18c9d275db84076b0b47f2714322343ceb712db0628b8e3ef9be3f0e29";
    
        // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test = "0";
    
        // Data for text message. This is the text message data.
        $sender = "MYLVTG"; // This is who the message appears to be from.
        $numbers = "8217676967,9535079797,6362370286"; // A single number or a comma-seperated list of numbers
        //$message = "Hello Rajesh, You can track your order at https://dev.codebele.com/mlt/order-track?id=MTY5. For any issues, please call 929292 5353. Enjoy! Team MLT";
        $message ="Hello Rajesh, You can track your order at 12345. For any issues, please call 929292 5353. Enjoy! Team MLT";
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
    }
    public function coupon(){
        $data=$this->common_data();
        $data['menu_open'] = "couponR";
        $data['menu_active'] = "coupon";
     
        //redirect('settings/coupons');
    
       $this->load->view('settings/coupon',$data);  
    }

    public function couponSave(){
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
     $couponcode=$this->input->post('coupon_code'); 
        $description=$this->input->post('desc');
        $coupontype=$this->input->post('type');
        $amount=$this->input->post('coupon_amount');
        $freeshipping=$this->input->post('checkbox'); 
        $expirydate=$this->input->post('coupon_expiry');
       // $dob=$this->input->post('dob');
        $newDate = date("Y-m-d", strtotime($expirydate)); 
       // $dateOfexpiry = "DD/MM/YYYY";
       // $today = date("Y-m-d");
        //$diff = date_diff(date_create($dateOfexpiry), date_create($today));

        $limitcoupon=$this->input->post('limit_per_coupon');
        $limituser=$this->input->post('limit_per_user'); 
        if($freeshipping!=''){

        $data_save=array('coupon_code'=>$couponcode, 'description'=>$description, 'coupon_type'=>$coupontype,'coupon_price'=>$amount, 'shipping_status'=>$freeshipping, 'expiry_date'=>$newDate, 'limit_per_coupon'=>$limitcoupon, 'limit_per_user'=>$limituser);
        }else{
            $data_save=array('coupon_code'=>$couponcode, 'description'=>$description, 'coupon_type'=>$coupontype,'coupon_price'=>$amount, 'expiry_date'=>$newDate, 'limit_per_coupon'=>$limitcoupon, 'limit_per_user'=>$limituser);
        }
//var_dump($data_save); exit;
        $this->CommonModel->Save($data_save,'mst_coupons');
  redirect('settings/coupon');
    }
    public function viewcoupon(){
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data=$this->common_data();
        $data['menu_open'] = "couponR";
        $data['menu_active'] = "viewcoupon";

        $where=array();
        $data['CouponDetail']=$this->CommonModel->getRecords($where,'mst_coupons');

       // $data['coupon']=$this->
        $this->load->view('settings/viewcoupon',$data);
    }

    public function deletecoupon(){
        
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $type=$this->uri->segment(3);
        if($type=="delete"){
            $id=$this->uri->segment(4);
                    $datasave1=array('coupon_status'=>0);
                    $this->CommonModel->update('mst_coupons','sk_coupon_id ',$id,$datasave1);
                    redirect('settings/viewcoupon');
                }else if($type=="active")
                {
                   // echo "sdgfsg"; exit;
                    $id=$this->uri->segment(4);
                    $datasave1=array('coupon_status'=>1);
                    $this->CommonModel->update('mst_coupons','sk_coupon_id',$id,$datasave1);
                    redirect('settings/viewcoupon');
                }
    }
    public function package(){
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data['menu_open'] = "packages";
        $data['menu_active'] = "packageR";
        $where=array('Items_categorystatus'=>1);
        $data['getdetailsCate']=$getdetailsCate=$this->CommonModel->getRecords($where,'mst_categoryitems');
         
         $data['pizz_id']=$getdetailsCate[0]->sk_categoryItems_id; 
         $data['sides_id']=$getdetailsCate[1]->sk_categoryItems_id;
         $data['salds_id']=$getdetailsCate[2]->sk_categoryItems_id;
         $data['dips_id']=$getdetailsCate[3]->sk_categoryItems_id;
         $data['desserts_id']=$getdetailsCate[4]->sk_categoryItems_id;
         $data['drinks_id']= $getdetailsCate[5]->sk_categoryItems_id;
       
       $this->load->view('settings/package',$data);  
    }
    public function packagesave(){
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $packname=$this->input->post('package_name');
        $no_pizzas=$no_sides=$no_salads=$no_dips=$no_desserts=$no_drinks=NULL;
        if($this->input->post('no_of_pizza')!=''){
        $no_pizzas=$this->input->post('no_of_pizza');
        
        $pizza_id=$this->input->post('pizza_id');
        }

        if($this->input->post('no_of_sides')!=''){
        $no_sides=$this->input->post('no_of_sides');
        $sides_id=$this->input->post('sides_id');
        }
        if($this->input->post('no_of_salads')!=''){
        $no_salads=$this->input->post('no_of_salads');
        $salads_id=$this->input->post('salads_id');
        }

        if($this->input->post('no_of_dips')!=''){    
        $no_dips=$this->input->post('no_of_dips');
        $dips_id1=$this->input->post('dips_id');
        }

        if($this->input->post('no_of_desserts')!=''){
        $no_desserts=$this->input->post('no_of_desserts');
        $desserts_id=$this->input->post('desserts_id');
        }
        
        if($this->input->post('no_of_drinks')!=''){
        $no_drinks=$this->input->post('no_of_drinks');
        $drinks_id=$this->input->post('drinks_id');
        }
        
        $display_package=$this->input->post('display_package');
        $totalamount=$this->input->post('amount');
        $data_saved=array('package_name'=>$packname,'no_of_pizza'=>$no_pizzas, 'pizza_id'=>$pizza_id, 'no_of_sides'=>$no_sides,'sides_id'=>$sides_id,'no_of_salads'=>$no_salads,'salads_id'=>$salads_id,'no_of_dips'=>$no_dips,'dips_id'=>$dips_id1,'no_of_desserts'=>$no_desserts,'desserts_id'=>$desserts_id,'no_of_drinks'=>$no_drinks,'drinks_id'=>$drinks_id,'display_package'=>$display_package,'package_amount'=>$totalamount,'package_status'=>1);
//            var_dump($data_saved);exit;
        $this->CommonModel->Save($data_saved,'mlt_package');
        redirect('settings/package');
    }
    public function viewpackage(){
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data['menu_open'] = "packages";
        $data['menu_active'] = "viewpackage";

        $where=array();
        $data['PackageDetails']=$this->CommonModel->getRecords($where,'mlt_package');

       $this->load->view('settings/viewpackage',$data);
    }
    public function editpackage() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $type=$this->uri->segment(3);
        $sk_id=$this->uri->segment(4);
         $id=base64_decode($sk_id);
        if($type=="edit"){
      //  echo "edit"; exit;
            $where=array('sk_package_id '=>$id);
            $PackageDetails=$this->CommonModel->getRecords($where,'mlt_package'); 
            if($PackageDetails){
                foreach($PackageDetails as $rows){
                    $data['sk_package_id']=$rows->sk_package_id;
                    $data['package_name1']=$rows->package_name;
                    $data['no_of_pizza']=$rows->no_of_pizza;
                    $data['no_of_sides']=$rows->no_of_sides;
                    $data['no_of_salads']=$rows->no_of_salads;
                    $data['no_of_dips']=$rows->no_of_dips;
                    $data['no_of_desserts']=$rows->no_of_desserts;
                    $data['no_of_drinks']=$rows->no_of_drinks;
                    $data['display_package']=$rows->display_package;
                    $data['package_amount']=$rows->package_amount;
                }                
                }
           $this->load->view('settings/editpackage',$data);
        }
           elseif($type=="update") {
            $id=$this->input->post('id');
            $no_pizzas=$no_sides=$no_salads=$no_dips=$no_desserts=$no_drinks=NULL;
            $packname=$this->input->post('package_name');
        if($this->input->post('no_of_pizza')!=''){
         $no_pizzas=$this->input->post('no_of_pizza');
        
        $pizza_id=$this->input->post('pizza_id');
        }

        if($this->input->post('no_of_sides')!=''){
         $no_sides=$this->input->post('no_of_sides');
        $sides_id=$this->input->post('sides_id');
        }
        if($this->input->post('no_of_salads')!=''){
        $no_salads=$this->input->post('no_of_salads');
        $salads_id=$this->input->post('salads_id');
        }

        if($this->input->post('no_of_dips')!=''){    
         $no_dips=$this->input->post('no_of_dips');
        $dips_id1=$this->input->post('dips_id');
        }

        if($this->input->post('no_of_desserts')!=''){
         $no_desserts=$this->input->post('no_of_desserts');
        $desserts_id=$this->input->post('desserts_id');
        }
        
        if($this->input->post('no_of_drinks')!=''){
         $no_drinks=$this->input->post('no_of_drinks');
        $drinks_id=$this->input->post('drinks_id');
        }
        
        $display_package=$this->input->post('display_package');
        $totalamount=$this->input->post('amount');
        
            $data_saved1=array('package_name'=>$packname,'no_of_pizza'=>$no_pizzas,'no_of_sides'=>$no_sides,'no_of_salads'=>$no_salads,'no_of_dips'=>$no_dips,'no_of_desserts'=>$no_desserts,'no_of_drinks'=>$no_drinks,'display_package'=>$display_package,'package_amount'=>$totalamount);
            $this->CommonModel->update('mlt_package','sk_package_id ',$id,$data_saved1);
           redirect('settings/viewpackage');

           }
           else if($type=="delete"){
               //echo "dfvb";exit;
          // $data['idtwo']=$idtwo=$this->uri->segment(5); 
           $data_save1=array('package_status'=>0);
           $this->CommonModel->update('mlt_package','sk_package_id ',$id,$data_save1);
          redirect('settings/viewpackage');
           }
            else if($type=="active")
                {
                    $data_save=array('package_status'=>1);
                    $this->CommonModel->update('mlt_package','sk_package_id',$id,$data_save);
                   redirect('settings/viewpackage');
                }
            }
          
            public function timeslots(){
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "timing";
                $data['menu_active'] = "timeslots";
               $this->load->view('settings/timeslots',$data);  
            }
            public function timeslotsSsave(){
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $res_time=array(
                    'days'=>$this->input->post('sunday_0'),
                    'time_slot_1'=>$this->input->post('t10_ot'),
                    'time_slot_2'=>$this->input->post('t20_ot'),
                    'time_slot_3'=>$this->input->post('t30_ot'),
                    'timing_slot_status'=>'1');
                    //var_dump($res_time);

                    $result=$this->CommonModel->Save($res_time,'mlt_timing_slots');
           //          /****monday*************/
                    $res_time1=array(
                        'days'=>$this->input->post('monday_1'),
                         'time_slot_1'=>$this->input->post('t11_ot'),
                        'time_slot_2'=>$this->input->post('t21_ot'),
                        'time_slot_3'=>$this->input->post('t31_ot'),
                        'timing_slot_status'=>'1');
                     //   var_dump($res_time1); exit;

                    $result1=$this->CommonModel->Save($res_time1,'mlt_timing_slots');
                    //echo "dfgdfd"; exit;
           //          /****tuesday*************/
                    $res_time2=array(
                        'days'=>$this->input->post('tuesday'),
                        'time_slot_1'=>$this->input->post('t12_ot'),
                        'time_slot_2'=>$this->input->post('t22_ot'),
                        'time_slot_3'=>$this->input->post('t32_ot'),
                        'timing_slot_status'=>'1');
                        //var_dump($res_time2); exit;

                    $result2=$this->CommonModel->Save($res_time2,'mlt_timing_slots');
           //              /****wednesday*************/
                    $res_time3=array(
                        'days'=>$this->input->post('Wednesday_3'),
                        'time_slot_1'=>$this->input->post('t13_ot'),
                        'time_slot_2'=>$this->input->post('t23_ot'),
                        'time_slot_3'=>$this->input->post('t33_ot'),
                        'timing_slot_status'=>'1');
                       // var_dump($res_time3);exit;
                    $result3=$this->CommonModel->Save($res_time3,'mlt_timing_slots');
           //              /****thursday*************/
                     $res_time4=array(
                        'days'=>$this->input->post('thursday_4'),
                        'time_slot_1'=>$this->input->post('t14_ot'),
                        'time_slot_2'=>$this->input->post('t24_ot'),
                        'time_slot_3'=>$this->input->post('t34_ot'),
                      'timing_slot_status'=>'1');
                                            // var_dump($res_time4);exit;

                  $result=$this->CommonModel->Save($res_time4,'mlt_timing_slots'); 
                  $res_time5=array(
                      'days'=>$this->input->post('friday_5'),
                      'time_slot_1'=>$this->input->post('t15_ot'),
                      'time_slot_2'=>$this->input->post('t25_ct'),
                      'time_slot_3'=>$this->input->post('t35_ot'),
                      'timing_slot_status'=>'1');

                  $result=$this->CommonModel->Save($res_time5,'mlt_timing_slots');
         //               /****satursday*************/
                  $res_time6=array(
                      'days'=>$this->input->post('saturday_6'),
                      'time_slot_1'=>$this->input->post('t16_ot'),
                      'time_slot_2'=>$this->input->post('t26_ot'),
                      'time_slot_3'=>$this->input->post('t36_ot'),
                      'timing_slot_status'=>'1');
                     // var_dump($res_time6);exit;

                      $result=$this->CommonModel->Save($res_time6,'mlt_timing_slots'); 
               redirect('settings/timeslots');
             
            }
            public function orderdetails(){
                
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "orderdetails";    
                $where=array();
               $data['orderdetails']=$this->AdminModel->orderdetails();       
               $this->load->view('settings/orderdetails',$data);  
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
                  
                    $this->load->view('settings/vieworders',$data);
            }
            public function ratingdetails(){
                
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "ratingdetails";    
                 $where=array();
                $data['ratedetails']=$this->AdminModel->ratedetails();    
                
               $this->load->view('settings/ratingdetails',$data);  
            
            }
            public function win(){
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "win";    
                $where=array();
               $data['win']=$this->AdminModel->win();       
               $this->load->view('settings/win',$data);  
            }
            public function subscription(){
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "subscription";    
                $where=array();
                $data['getdetails123']=$this->CommonModel->getRecords($where,'mlt_subscription');
               $this->load->view('settings/subscription',$data);  
            }
            public function vehicle(){
                $data=$this->common_data();
               
                $data['menu_active'] = "vehicles";   
                $where=array();
                $data['fetchdata']=$this->CommonModel->getRecords($where,'mlt_vehicle');
                $this->load->view('settings/vehicles',$data);  

            }
           
            public function editvehicle(){
                $data=$this->common_data();
                        $id=$this->input->post('id');
                        $vehiclecount=$this->input->post('no_of_vehicles');
                        
                        $data_saved=array('vehicle_count'=>$vehiclecount,'vehicle_status'=>1);
                        $this->CommonModel->update('mlt_vehicle','sk_vehicle_id  ',$id,$data_saved);
                        redirect('settings/vehicle');
                    
            }
            public function customer() {

                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "testnominals";
                $data['menu_active'] = "customer";
               
                $this->load->view('settings/customer',$data);
        
            }
            public function testimonialSave(){
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $name=$this->input->post('t_name'); 
                $address=$this->input->post('add');
                $desc=$this->input->post('desc');
                $sectionimage=$_FILES['image']['name'];
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
                 $path="uploads/testimonials/".$_FILES["image"]["name"];
                move_uploaded_file($temp,$path);
                $picname=$_FILES['image']['name'];
                }
                if($picname!=""){
            $save_data=array('name'=>$name,'address'=>$address, 'testimonials'=>$desc,'testimonials_image'=>$sectionimage,'testimonials_status'=>1);
             }else{
                $save_data=array('name'=>$name,'address'=>$address, 'testimonials'=>$desc);
            }
                
                $this->CommonModel->Save($save_data,'mlt_testimonials');
                redirect('settings/customer');
            }
            public function viewtestimonials(){
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "testnominals";
                $data['menu_active'] = "viewtestimonials";
        
                $where=array();
                $data['nominalsDetails']=$this->CommonModel->getRecords($where,'mlt_testimonials');
        
               $this->load->view('settings/viewtestimonials',$data);
                }
            public function edittestimonials(){
                    $data=$this->common_data();
                    if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                        redirect("/");
                     }
                    $type=$this->uri->segment(3);
                    if($type=="edit"){
                        //echo "edit"; exit;
                        $data['id']=$sk_id=$this->uri->segment(4);
                        
                        $where=array('sk_testimonials_id '=>$sk_id);
                        $data['getdata']=$this->CommonModel->getRecords($where,'mlt_testimonials'); 
                       $this->load->view('settings/edittestimonials',$data);
            
                
            }
            else if($type=="update"){
                
                $id=$this->input->post('id');
                $name=$this->input->post('t_name'); 
                $address=$this->input->post('add');
                $desc=$this->input->post('desc');
                $sectionimage=$_FILES['image']['name'];
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
                 $path="uploads/testimonials/".$_FILES["image"]["name"];
                move_uploaded_file($temp,$path);
                $picname=$_FILES['image']['name'];
                }
                if($picname!=""){
            $save_data=array('name'=>$name,'address'=>$address, 'testimonials'=>$desc,'testimonials_image'=>$sectionimage,'testimonials_status'=>1);
             }else{
                $save_data=array('name'=>$name,'address'=>$address, 'testimonials'=>$desc);
            }
            $this->CommonModel->update('mlt_testimonials','sk_testimonials_id',$id,$save_data);
                redirect('settings/viewtestimonials');
            }
            else if($type=="delete"){
                $id=$this->uri->segment(4);
                        $save_data=array('testimonials_status'=>0);
                        $this->CommonModel->update('mlt_testimonials','sk_testimonials_id ',$id,$save_data);
                        redirect('settings/viewtestimonials');
                    }else if($type=="active")
                    {
                        $id=$this->uri->segment(4);
                        $save_data=array('testimonials_status'=>1);
                        $this->CommonModel->update('mlt_testimonials','sk_testimonials_id',$id,$save_data);
                        redirect('settings/viewtestimonials');
                    }
                
            }

            public function getUserDetails($userId){
                return $this->AdminModel->getUserDetails($userId);
            }

            public function viewcustomer(){
                
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "viewcustomers";    
                $where=array();
               $data['userdetails']=$this->AdminModel->userdetails(); 
               $this->load->view('settings/viewcust',$data);  
            }
            public function giftacart(){
                
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "giftacart";    
                $where=array();
               $data['giftcartdetails']=$this->AdminModel->giftacart();       
               $this->load->view('settings/giftacart',$data);  
            }
            public function corporate(){
                
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "corporate";    
                $where=array();
                $data['corporate']=$this->CommonModel->getRecords($where,'mlt_corporate_tie_up'); 
                $this->load->view('settings/corporate',$data);  
            }
            public function party(){
                
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "party";    
                $where=array();
                $data['partytimes']=$this->AdminModel->partytime();
                $this->load->view('settings/party',$data);  
            }
            public function faq1(){
                
                $data=$this->common_data();
                if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                $data['menu_open'] = "menu";
                $data['menu_active'] = "faq";    
                // $where=array();
                // $data['partytimes']=$this->AdminModel->partytime();
                $this->load->view('settings/faq1',$data);  
            }
public function faqsave(){
 
    $data=$this->common_data();

    if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
        redirect("/");
     }
 $quest11=$this->input->post('faq1'); 
    $quest22=$this->input->post('faq2');
     $quest33=$this->input->post('faq3');
    $quest44=$this->input->post('faq4');

    $description1=$this->input->post('short_description');
    $description2=$this->input->post('short'); 
    $description3=$this->input->post('description');
    $description4=$this->input->post('desc');
   

    $data_save=array('quest1'=>$quest11,'quest2'=>$quest22,'quest3'=>$quest33,'quest4'=>$quest44,'desc1'=>$description1,'desc2'=>$description2,'desc3'=>$description3,'desc4'=>$description4,'faq_status'=>1);
  // var_dump($data_save);
    $this->CommonModel->Save($data_save,'mlt_faq');
redirect('settings/faq1');
}
public function refund(){
                
    $data=$this->common_data();
    if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
        redirect("/");
     }
    $data['menu_open'] = "menu";
    $data['menu_active'] = "refund";    
    $where=array();
        $data['getusers']=$this->CommonModel->getRecords($where,'mst_user');
       // $data['refundDetails']=$this->CommonModel->getRecords($where,'mlt_refund');

    $this->load->view('settings/refund',$data);  
}

public function refundsave(){
 
    $data=$this->common_data();

    if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
        redirect("/");
     }
echo $orderid=$this->input->post('order_id'); 
    $users=$this->input->post('users');
     $phone=$this->input->post('phone');
    $refund=$this->input->post('refund');

    $amount=$this->input->post('amount');
    $data_save=array('order_id'=>$orderid,'user_id'=>$users,'number'=>$phone,'refund_date'=>$refund,'refund_amount'=>$amount,'refund_status'=>1);
  // var_dump($data_save);
    $this->CommonModel->Save($data_save,'mlt_refund');
redirect('settings/refund');
}
public function viewrefund(){
                
    $data=$this->common_data();
    if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
        redirect("/");
     }
    $data['menu_open'] = "menu";
    $data['menu_active'] = "viewrefund";   
    $where=array(); 
    $data['refundDetails']=$this->CommonModel->getRecords($where,'mlt_refund');
   // $where=array();
   // $data['getusers']=$this->CommonModel->getRecords($where,'mst_user');
   $this->load->view('settings/viewrefund',$data);  
}
public function refundedit() {
    $data=$this->common_data();
     $type=$this->uri->segment(3); 
    if($type=="edit"){
        $data['id']=$id=$this->uri->segment(4);
        $where=array('sk_refund_id '=>$id);
        $data['refundDetails']=$this->CommonModel->getRecords($where,'mlt_refund'); 
        $where=array();
        $data['getusers']=$this->CommonModel->getRecords($where,'mst_user');
        $this->load->view('settings/editrefund',$data);
    }
    else if($type=="update"){
         $id=$this->input->post('id');

        $orderid=$this->input->post('order_id'); 
         $users=$this->input->post('users');
         $phone=$this->input->post('phone');
        $refund=$this->input->post('refund');
    
        $amount=$this->input->post('amount');
        $data_save1=array('order_id'=>$orderid,'user_id'=>$users,'number'=>$phone,'refund_date'=>$refund,'refund_amount'=>$amount,'refund_status'=>1);
        $this->CommonModel->update('mlt_refund','sk_refund_id',$id,$data_save1);
        redirect('settings/viewrefund');
    }
   else if($type=="delete"){
        $id=$this->uri->segment(4);
                $datasave1=array('refund_status'=>0);
                $this->CommonModel->update('mlt_refund','sk_refund_id ',$id,$datasave1);
                redirect('settings/viewrefund');
            }else if($type=="active")
            {
                $id=$this->uri->segment(4);
                $datasave1=array('refund_status'=>1);
                $this->CommonModel->update('mlt_refund','sk_refund_id',$id,$datasave1);
                redirect('settings/viewrefund');
            }
}

}
 




















    

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
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
    


    public function item_list() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data['menu_open'] = "items";
        $data['menu_active'] = "item-list";
        $where=array();
        $data['getdetail']=$this->AdminModel->fetchtables($where,'mlt_items_onboarding');
        $this->load->view('items/item-list',$data);
    }

    public function item_onboarding() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data['menu_open'] = "items";
        $data['menu_active'] = "item-onboarding";
        $where=array();
        $data['getdetails']=$this->CommonModel->getRecords($where,'mst_section');
        $data['getdetailsCategory']=$this->CommonModel->getRecords($where,'mst_categoryitems');
        $data['getdetailsprice']=$this->CommonModel->getRecords($where,'mlt_price');
        $this->load->view('items/item-onboarding',$data);
    }


    public function item_save() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        redirect(base_url()."items/item-config/1");
    }

    public function item_config() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data['menu_open'] = "items";
        $data['menu_active'] = "item-onboarding";
        
        $data['id']=$sk_id=$this->uri->segment(3);
        $where=array();
        $data['getdetailsection']=$this->CommonModel->getRecords($where,'mst_section');
        $data['getdetailscategory']=$this->CommonModel->getRecords($where,'mst_categoryitems');
        $data['getdetailtoppings']=$this->CommonModel->getRecords($where,'mlt_topings');
        $where1=array('item_id'=>$sk_id);
        $data['getdetailsprice']=$this->CommonModel->getRecords($where1,'mlt_price');
        $where1=array('sk_id'=>$sk_id);
       
        $data['getdesignation']=$this->CommonModel->getRecords($where1,'mlt_items_onboarding'); 

        $this->load->view('items/item-config',$data);
    }

      public function item_settings() {

        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $data['menu_open'] = "items";
        $data['menu_active'] = "item-settings";
        $where=array();
         $data['getdetailsCategory']=$this->CommonModel->getRecords($where,'mst_categoryitems');
       //  var_dump($data);exit();
        $data['getdetails']=$this->CommonModel->getRecords($where,'mst_section');
        $data['gettopings']=$this->CommonModel->getRecords($where,'mlt_topings');
        $this->load->view('items/item-settings',$data);
    }

    public function itemsave() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $categoryname=$this->input->post('category');
        $categoryslug=$this->input->post('slugCategory');
        $seotitle=$this->input->post('seo_title');
        $seodesc=$this->input->post('seo_description');
        $caption=$this->input->post('caption');
        $categoryimage=$_FILES['image']['name'];

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
         $path="uploads/category/".$_FILES["image"]["name"];
		move_uploaded_file($temp,$path);
		$picname=$_FILES['image']['name'];
		}
      $data1=array('Items_categoryname'=>$categoryname,'category_slug'=>$categoryslug, 'seo_title'=>$seotitle, 'seo_description'=>$seodesc, 'caption'=>$caption, 'category_image'=>$categoryimage, 'Items_categorystatus'=>1);


      $this->CommonModel->Save($data1,'mst_categoryitems');


      redirect('items/item-settings');
    }
    public function ItemEdit() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $type=$this->uri->segment(3);
        if($type=="edit"){
            //echo "edit"; exit;
            $data['id']=$sk_id=$this->uri->segment(4);
            $where=array('sk_categoryItems_id'=>$sk_id);
            $data['getdetails']=$this->CommonModel->getRecords($where,'mst_categoryitems'); 
            $this->load->view('items/edititems',$data);
        }else if($type=="update"){
            //echo "bcvghkj"; exit;
            $id=$this->input->post('id');
            $name=$this->input->post('category');
            $categoryslug=$this->input->post('slugCategory');
            $seotitle=$this->input->post('seo_title');
            $seodesc=$this->input->post('seo_description');
            $caption=$this->input->post('caption');
           $categoryimage=$_FILES['image']['name'];
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
             $path="uploads/category/".$_FILES["image"]["name"];
            move_uploaded_file($temp,$path);
            $picname=$_FILES['image']['name'];
            }
             if($picname!=""){
            $save_data=array('Items_categoryname'=>$name,'category_slug'=>$categoryslug, 'seo_title'=>$seotitle, 'seo_description'=>$seodesc, 'caption'=>$caption, 'category_image'=>$picname);
             }else{
                $save_data=array('Items_categoryname'=>$name,'category_slug'=>$categoryslug,'seo_title'=>$seotitle, 'seo_description'=>$seodesc, 'caption'=>$caption); 
             }
            $this->CommonModel->update('mst_categoryitems','sk_categoryItems_id',$id,$save_data);
            redirect('items/item-settings');
        }
        else if($type=="delete"){
            $id=$this->uri->segment(4);
            $save_data=array('Items_categorystatus'=>0);
            $this->CommonModel->update('mst_categoryitems','sk_categoryItems_id',$id,$save_data);
            redirect('items/item-settings');
        }else if($type=="active")
        {
            $id=$this->uri->segment(4);
            $save_data=array('Items_categorystatus'=>1);
            $this->CommonModel->update('mst_categoryitems','sk_categoryItems_id',$id,$save_data);
            redirect('items/item-settings');
        }
    }
    public function sectionSave() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $sectionname=$this->input->post('role');
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
         $path="uploads/section/".$_FILES["image"]["name"];
		move_uploaded_file($temp,$path);
		$picname=$_FILES['image']['name'];
		}
      $data1=array('section_name'=>$sectionname, 'section_icon'=>$sectionimage,'section_status'=>1);


      $this->CommonModel->Save($data1,'mst_section');


     redirect('items/item-settings');
    }

    
    public function sectionEdit() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $type=$this->uri->segment(3);
        if($type=="edit"){
            //echo "edit"; exit;
            $data['id']=$sk_id=$this->uri->segment(4);
            $where=array('sk_section_id'=>$sk_id);
            $data['getdetails']=$this->CommonModel->getRecords($where,'mst_section'); 
           $this->load->view('items/editsection',$data);

    
}
else if($type=="update"){
    
    $id=$this->input->post('id');
    $sectionname=$this->input->post('role');
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
         $path="uploads/section/".$_FILES["image"]["name"];
		move_uploaded_file($temp,$path);
		$picname=$_FILES['image']['name'];
		}
        if($picname!=""){
        $save_data=array('section_name'=>$sectionname,'section_icon'=>$picname);


      $data1=array('section_name'=>$sectionname, 'section_icon'=>$sectionimage,'section_status'=>1);
    }else{
        $save_data=array('section_name'=>$sectionname); 
     }
     $this->CommonModel->update('mst_section','sk_section_id',$id,$save_data);
     redirect('items/item_settings');
}
else if($type=="delete"){
    $id=$this->uri->segment(4);
            $save_data=array('section_status'=>0);
            $this->CommonModel->update('mst_section','sk_section_id',$id,$save_data);
            redirect('items/item_settings');
        }else if($type=="active")
        {
            $id=$this->uri->segment(4);
            $save_data=array('section_status'=>1);
            $this->CommonModel->update('mst_section','sk_section_id',$id,$save_data);
            redirect('items/item_settings');
        }
    }

    public function topingSave() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $head=$this->input->post('topping');
        $topslug=$this->input->post('slugtopping');
        $description=$this->input->post('topping_list');
        $selectiontype=$this->input->post('category');
        $datasave1=array('toping_head '=>$head, 'toping_slug'=>$topslug, 'toping_description'=>$description, 'toping_type'=>$selectiontype);
        $this->CommonModel->Save($datasave1,'mlt_topings');
        redirect('items/item_settings');
    }
    public function topingEdit() {
       
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $type=$this->uri->segment(3);
        if($type=="edit"){
            
            $data['id']=$sk_id=$this->uri->segment(4);
            $where=array('toping_id'=>$sk_id);
            $data['getdetailtoppings']=$this->CommonModel->getRecords($where,'mlt_topings'); 
           $this->load->view('items/edittoping',$data);

    
}
else if($type=="update"){
    
    $id=$this->input->post('id');
    $head=$this->input->post('topping');
    $description=$this->input->post('topping_list');
    $selectiontype=$this->input->post('category');
    $datasave1=array('toping_head '=>$head, 'toping_description'=>$description, 'toping_type'=>$selectiontype);
    //$this->CommonModel->Save($datasave1,'mlt_topings');
    $this->CommonModel->update('mlt_topings','toping_id ',$id,$datasave1);
    redirect('items/item_settings');
}

else if($type=="delete"){
    $id=$this->uri->segment(4);
            $datasave1=array('toping_status'=>0);
            $this->CommonModel->update('mlt_topings','toping_id ',$id,$datasave1);
            redirect('items/item_settings');
        }else if($type=="active")
        {
            $id=$this->uri->segment(4);
            $datasave1=array('toping_status'=>1);
            $this->CommonModel->update('mlt_topings','toping_id',$id,$datasave1);
            redirect('items/item_settings');
        }
    }
    public function items_onboardingsave()
    {
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $itemimage=$_FILES['image']['name'];
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
         $path="uploads/items/".$_FILES["image"]["name"];
		move_uploaded_file($temp,$path);
		$picname=$_FILES['image']['name'];
		}
        $sectionname=$this->input->post('section');
        $categoryname=$this->input->post('category');
        $typeitems=$this->input->post('type');
        $code=$this->input->post('item_code');
        $itemname=$this->input->post('item_name');
        $slug=$this->input->post('slug');
        $displayname=$this->input->post('display_name');
        $shortdescription=$this->input->post('short_description');
        $desc=$this->input->post('description');
        $seotitle=$this->input->post('seo_title');
        $seodesc=$this->input->post('seo_description');
        $itemimage=$_FILES['image']['name'];
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
         $path="uploads/items/".$_FILES["image"]["name"];
		move_uploaded_file($temp,$path);
		$picname=$_FILES['image']['name'];
		}
        $data2=array('image'=>$picname, 'section_name'=>$sectionname, 'category_id'=>$categoryname,'type'=>$typeitems,'item_code'=>$code,'item_name'=>$itemname, 'slug'=>$slug, 'display_name'=>$displayname, 
        'short_description'=>$shortdescription, 'description'=>$desc, 'seo_title'=>$seotitle, 'seo_description'=>$seodesc);
        $id=$this->CommonModel->Save($data2,'mlt_items_onboarding');

       // echo $id; exit;
        redirect('items/item-config/'.$id);

    } 

   
    public function itemupdate(){ 
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $post_date=$data['post_date'];
        $id=$this->input->post('id');
        $sectionname=$this->input->post('section');
        $categoryname=$this->input->post('category');
        $code=$this->input->post('item_code');
        $itemname=$this->input->post('item_name');
        $displayname=$this->input->post('display_name');
        $shortdescription=$this->input->post('short_description');
        $desc=$this->input->post('description');
        $seotitle=$this->input->post('seo_title');
        $seodesc=$this->input->post('seo_description');
        $typeitems=$this->input->post('type');
        $itemimage="";
if(isset($_FILES)){
        $itemimage=$_FILES['image']['name'];
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
         $path="uploads/items/".$_FILES["image"]["name"];
		move_uploaded_file($temp,$path);
		$itemimage=$_FILES['image']['name'];
		}

    }
   if($itemimage!=''){
        $data2=array('section_name'=>$sectionname,'type'=>$typeitems, 'category_id'=>$categoryname,'item_code'=>$code,'item_name'=>$itemname, 'display_name'=>$displayname, 
        'short_description'=>$shortdescription, 'description'=>$desc, 'seo_title'=>$seotitle, 'seo_description'=>$seodesc, 'image'=>$itemimage);
   }else{
    $data2=array('section_name'=>$sectionname, 'type'=>$typeitems, 'category_id'=>$categoryname,'item_code'=>$code,'item_name'=>$itemname, 'display_name'=>$displayname, 
    'short_description'=>$shortdescription, 'description'=>$desc, 'seo_title'=>$seotitle, 'seo_description'=>$seodesc);

   }
       // var_dump($data2); exit;
        $this->CommonModel->Update('mlt_items_onboarding','sk_id',$id, $data2);

 

        $topping_count=$this->input->post('topping_count');

 
        $where=array('sk_categoryItems_id'=>$categoryname);
        $categories=$this->CommonModel->getrecords($where,'mst_categoryitems');
        if($categories!=false){
            foreach($categories as $info99){
              $sk_categoryItems_id=  $info99->sk_categoryItems_id;
            }
        }
        if($sk_categoryItems_id==pizza){
        $where=array('item_id'=>$id);
        $toppingDetails=$this->CommonModel->getrecords($where,'mlt_item_toppings');
        if($toppingDetails)
        {
            for($i=1;$i<$topping_count;$i++)
            {
                $item_listn=$this->input->post('textm_'.$i);
                $item_list= rtrim($item_listn, ',');
               // var_dump($item_list);
               // exit;
                $topping_id=$this->input->post('topping_id_'.$i);

                $whereTopping=array('item_id'=>$id,'topping_id'=>$topping_id);
                $data=array('item_id'=>$id,'topping_id'=>$topping_id,'items'=>$item_list,'create_date'=>$post_date);
                $this->CommonModel->updateRecords($data,$whereTopping,'mlt_item_toppings');
            } 
        }
        else
        {
          for($i=1;$i<$topping_count;$i++)
            {
                $item_list=$this->input->post('textm_'.$i);
                $topping_id=$this->input->post('topping_id_'.$i);
                $data_save1=array('item_id'=>$id,'topping_id'=>$topping_id,'items'=>$item_list,'create_date'=>$post_date);
                $this->CommonModel->Save($data_save1,'mlt_item_toppings');
            }  
        }
    }
            $url = $_SERVER['HTTP_REFERER'];
            redirect($url);
    }
    public function saveprice() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $id=$this->input->post('itemid');
        $size=$this->input->post('pizza_size');
        $cost=$this->input->post('pizza_cost');
        $data_save=array('item_id'=>$id,'item_size'=>$size, 'item_cost'=>$cost,'item_status'=>1 );
        $this->CommonModel->Save($data_save,'mlt_price');
        redirect('items/item_config/'.$id);
    }
    public function priceEdit() {
        $data=$this->common_data();
        if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
            redirect("/");
         }
        $type=$this->uri->segment(3);
       
        if($type=="edit"){
        //echo "edit"; exit;
            $data['id']=$sk_id=$this->uri->segment(4);
            $data['idtwo']=$idtwo=$this->uri->segment(5); 
            $where=array('sk_id'=>$sk_id);
            $data['getdetailsprice']=$this->CommonModel->getRecords($where,'mlt_price'); 
           $this->load->view('items/editprice',$data);
        }
           elseif($type=="update") {
            $data['idtwo']=$idtwo=$this->uri->segment(5); 
            $id=$this->input->post('id');
            $idtwo=$this->input->post('idtwo');   
            $size=$this->input->post('pizza_size');
            $cost=$this->input->post('pizza_cost');
            $data_save=array('item_size'=>$size, 'item_cost'=>$cost);
           // $this->CommonModel->update($data_save,'mlt_price');
            $this->CommonModel->update('mlt_price','sk_id ',$id,$data_save);
            redirect('items/item_config/'.$idtwo);

           }
           else if($type=="delete"){
            $data['idtwo']=$idtwo=$this->uri->segment(5); 
           $id=$this->uri->segment(4);
           $data_save=array('item_status'=>0);
           $this->CommonModel->update('mlt_price','sk_id ',$id,$data_save);
           redirect('items/item_config/'.$idtwo);
           }
            else if($type=="active")
                {
                    $data['idtwo']=$idtwo=$this->uri->segment(5); 
                    $id=$this->uri->segment(4);
                    $data_save=array('item_status'=>1);
                    $this->CommonModel->update('mlt_price','sk_id',$id,$data_save);
                    redirect('items/item_config/'.$idtwo);
                }
            } 
        public function saveitemtopping() {
                 $data=$this->common_data();
                 if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                    redirect("/");
                 }
                 $item_id=$this->input->post('item_id');
                 $topping_id=$this->input->post('topping_id');
                 $text=$this->input->post('text1');
                 $text=trim($text," ");
                
                date_default_timezone_set('Asia/Kolkata');
                $post_date = date('Y-m-d');
         
                 $data_save1=array('item_id'=>$item_id,'topping_id'=>$topping_id,'items'=>$text,'create_date'=>$post_date);

                 //var_dump($data_save1);
                 $this->CommonModel->Save($data_save1,'mlt_item_toppings');

        } 
        public function itemlistedit() {
            $data=$this->common_data();
            if($this->session->userdata("employee_session_id")=="" || $this->session->userdata("employee_session_id")==null){
                redirect("/");
             }
            $type=$this->uri->segment(3);
            if($type=="edit"){
                $data['id']=$sk_id=$this->uri->segment(4);
                $where=array('sk_id'=>$sk_id);
                $data['getdetail']=$this->CommonModel->getRecords($where,'mlt_items_onboarding'); 
               $this->load->view('items/item_config',$data);
            } 
            
            else if($type=="delete"){
              //  echo "xcghjkl"; exit;
               // $data['idtwo']=$idtwo=$this->uri->segment(5); 
               $id=$this->uri->segment(4);
               $data_save=array('item_onboarding_status'=>0);
               $this->CommonModel->update('mlt_items_onboarding','sk_id ',$id,$data_save);
               redirect('items/item_list');
               }

               else if($type=="active")
               {
                   //echo "xfhkjl"; exit;
                  // $data['idtwo']=$idtwo=$this->uri->segment(5); 
                   $id=$this->uri->segment(4);
                   $data_save=array('item_onboarding_status'=>1);
                   $this->CommonModel->update('mlt_items_onboarding','sk_id',$id,$data_save);
                   redirect('items/item_list/');
               }

                   
        } 


        }
 
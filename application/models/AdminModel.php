<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class AdminModel extends CI_Model{
	
    public function __construct() 
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->library('form_validation');	
	}
	 
	 
	function login($email, $password)
	{
		$query=$this->db->query("select * from mst_employee where email='$email' and employee_password='$password' and employee_status='1'");
		$result = $query->result();
		return $result;
	}
	function GetSubscriptions($type)
	{
		if($type=="All")
		{
			$query=$this->db->query("SELECT txn_subscription.* ,mst_user.first_name,mst_user.last_name,mst_plan.plan_name FROM `txn_subscription` LEFT JOIN mst_plan ON txn_subscription.plan_id=mst_plan.sk_plan_id LEFT JOIN mst_user ON txn_subscription.user_id=mst_user.sk_user_id where txn_subscription.subscription_status='1'");
			$result = $query->result();
			return $result;
		}
		else
		{
			$query=$this->db->query("SELECT txn_subscription.* ,mst_user.first_name,mst_user.last_name,mst_plan.plan_name FROM `txn_subscription` LEFT JOIN mst_plan ON txn_subscription.plan_id=mst_plan.sk_plan_id LEFT JOIN mst_user ON txn_subscription.user_id=mst_user.sk_user_id where txn_subscription.subscription_status='1' and subscription_type='$type'");
			$result = $query->result();
			return $result;
		}
	}
	function GetSubscriptionData($sub_id)
	{
		$query=$this->db->query("SELECT txn_subscription_details.* ,txn_user_address.mobile,txn_user_address.address,txn_user_address.street,txn_user_address.city,txn_user_address.postalcode FROM `txn_subscription_details` LEFT JOIN txn_user_address ON txn_subscription_details.address_id=txn_user_address.address_id where txn_subscription_details.subscription_status='1' and txn_subscription_details.subscription_id='$sub_id'");
		$result = $query->result();
		return $result;
	}

	function GetOrders()
	{
	//	$query=$this->db->query("SELECT txn_order.*,mst_user.first_name,mst_user.last_name,txn_subscription.subscription_type FROM `txn_order` LEFT JOIN mst_user ON txn_order.user_id=mst_user.sk_user_id LEFT JOIN txn_subscription ON txn_order.subscription_id=txn_subscription.sk_subscription_id WHERE txn_order.order_status='1' and txn_order.order_type='gift'");
		$query=$this->db->query("SELECT txn_order.*,mst_user.first_name,mst_user.last_name,txn_order_detail.box_items,txn_order_detail.surprise_me_preferences,txn_subscription.subscription_type FROM `txn_order` LEFT JOIN mst_user ON txn_order.user_id=mst_user.sk_user_id LEFT JOIN txn_order_detail ON txn_order.sk_order_id=txn_order_detail.order_id LEFT JOIN txn_subscription on txn_order.subscription_id=txn_subscription.sk_subscription_id WHERE txn_order.order_status='1' and txn_order.order_type='gift'");
		$result = $query->result();
		return $result;
	}
	function GetOrderByDate($from_date,$to_date)
	{
		$query=$this->db->query("SELECT txn_order.*,mst_user.first_name,mst_user.last_name,txn_order_detail.box_items,txn_order_detail.surprise_me_preferences,txn_subscription.subscription_type FROM `txn_order` LEFT JOIN mst_user ON txn_order.user_id=mst_user.sk_user_id LEFT JOIN txn_order_detail ON txn_order.sk_order_id=txn_order_detail.order_id LEFT JOIN txn_subscription on txn_order.subscription_id=txn_subscription.sk_subscription_id WHERE txn_order.order_status='1' and txn_order.order_type='gift' and txn_order.creation_date BETWEEN '$from_date' and '$to_date'");
		$result = $query->result();
		return $result;
	}
	function GetOrderData($order_id)
	{
		$query=$this->db->query("SELECT txn_order_detail.*,mst_user.first_name,mst_user.last_name,txn_user_address.address,txn_user_address.city,txn_user_address.postalcode,txn_user_address.street,txn_user_address.mobile,txn_subscription.subscription_type FROM `txn_order_detail` LEFT JOIN mst_user ON txn_order_detail.user_id=mst_user.sk_user_id LEFT JOIN txn_user_address ON txn_order_detail.address_id=txn_user_address.address_id LEFT JOIN txn_subscription ON txn_order_detail.subscription_id=txn_subscription.sk_subscription_id where txn_order_detail.order_status='1' and txn_order_detail.order_id='$order_id'");
		$result = $query->result();
		return $result;
	}
	function GetOrdersByStatus($delivery_status,$from_date,$to_date)
	{
		if($from_date!="" && $to_date!="")
		{
			$query=$this->db->query("SELECT txn_order.*,mst_user.first_name,mst_user.last_name,txn_subscription.subscription_type FROM `txn_order` LEFT JOIN mst_user ON txn_order.user_id=mst_user.sk_user_id LEFT JOIN txn_subscription on txn_order.subscription_id=txn_subscription.sk_subscription_id WHERE txn_order.order_status='1' and txn_order.order_type='subscription' and txn_order.delivery_status='$delivery_status' and txn_order.creation_date BETWEEN '$from_date' and '$to_date'");
			$result = $query->result();
			return $result;
		}
		else {
			$query=$this->db->query("SELECT txn_order.*,mst_user.first_name,mst_user.last_name,txn_subscription.subscription_type FROM `txn_order` LEFT JOIN mst_user ON txn_order.user_id=mst_user.sk_user_id LEFT JOIN txn_subscription on txn_order.subscription_id=txn_subscription.sk_subscription_id WHERE txn_order.order_status='1' and txn_order.order_type='subscription' and txn_order.delivery_status='$delivery_status'");
			$result = $query->result();
			return $result;
		}
	}
	function getOrderRecords($main_order_id,$status)
	{
		if($status!="")
		{
			$query=$this->db->query("SELECT count(*) as delivered_count from txn_order_detail where order_id='$main_order_id' and delivery_status='$status'");
			$result = $query->result();
			return $result;
		}
		else {
			$query=$this->db->query("SELECT count(*) as delivered_count from txn_order_detail where order_id='$main_order_id'");
			$result = $query->result();
			return $result;
		}
	}
	function GetPromoCode($id){
		if($id=="All"){
		$query=$this->db->query("SELECT * from mst_promocode where promocode_status=1");
	}else{
		$query=$this->db->query("SELECT * from mst_promocode where promocode_status=1 and sk_promocode_id=$id");
	}
		$result = $query->result();
		return $result;	
	}
	function GetProductImageDetails($id){
		if($id=="All"){
			$query=$this->db->query("select * from mst_product_image where image_status=1");
		}else{
			$query=$this->db->query("select * from mst_product_image where image_status='1' and product_id=$id");
		}
			$result = $query->result();
			return $result;	
	}
	function GetProductDetails($id){
		if($id=="All"){
		$query=$this->db->query("select * from mst_product where product_status=1");
	}else{
		$query=$this->db->query("select * from mst_product where product_status='1' and sk_product_id=$id");
	}
		$result = $query->result();
		return $result;	
	}
	function GetCategoryDetails($sk_category_id)
	{
		if($sk_category_id=="All"){
			$query=$this->db->query("select * from mst_product_category where category_status=1");
		}else{
			$query=$this->db->query("select * from mst_product_category where category_status='1' and sk_category_id in ($sk_category_id)");
		}
			$result = $query->result();
			return $result;	
	}
	function saveRecords($data,$table)
		{
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}
		function updateRecords($table,$cond,$email,$data)
		{
			$this->db->where($cond,$email);
			$this->db->update($table,$data);
		}
		function updateRecord($data,$where,$table) {
			$this->db->where($where);
			$this->db->update($table,$data);
			if($this->db->affected_rows()>0) {
				return true;
			}
			else {
				return false;
			}
		}
		function getMax($table,$id) {
			$maxID=0;
			$sql = "SELECT max($id) as $id FROM $table ";
			$binds = array();
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
			$max=$query->result();
			foreach ($max as $info){
				$maxID=$info->$id;
			}
			return ++$maxID;
			} else {
			return false;
			}
		}

		function getNotification($id)
		{
			if($id=="All"){
				$query=$this->db->query("select * from mst_notification where notify_status=1");
			}else{
				$query=$this->db->query("select * from mst_notification where notify_status='1' and sk_notify_id=$id");
			}
				$result = $query->result();
				return $result;
		}
		
		public function fetch_records() {

			$query=$this->db->query("select * from mlt_employee  left join mlt_designation on mlt_employee.designation=mlt_designation.sk_designation_id left join mlt_role on mlt_employee.role=mlt_role.sk_role_id left join mst_state on mlt_employee.state=mst_state.sk_state_id ");
			
				$result = $query->result();
				return $result;

		}
		public function fetchtables() {
			$query=$this->db->query("select * from mlt_items_onboarding  left join mst_section on mlt_items_onboarding.section_name=mst_section.sk_section_id left join mst_categoryitems on mlt_items_onboarding.category_id=mst_categoryitems.sk_categoryItems_id");
			
			$result = $query->result();
			return $result;
		}
	public function orderdetails(){
		$query=$this->db->query("select * from mlt_order left join mst_user on mlt_order.user_id=mst_user.sk_user_id ");
		$result = $query->result();
			return $result;
	}
	public function viewdetails($sk_id){
		$query=$this->db->query("select * from mst_order_details left join mlt_order on mst_order_details.order_id=mlt_order.sk_order_id left join mlt_items_onboarding on mst_order_details.item_id=mlt_items_onboarding.sk_id left join mst_user on mst_order_details.user_id=mst_user.sk_user_id left join mlt_address_dup on mlt_order.user_address=mlt_address_dup.sk_address_id where sk_order_id='$sk_id'");
		$result = $query->result();
			return $result;
	}
	public function itemdetails($sk_id){
		$query=$this->db->query("select * from mst_order_details left join mlt_order on mst_order_details.order_id=mlt_order.sk_order_id left join mlt_items_onboarding on mst_order_details.item_id=mlt_items_onboarding.sk_id left join mst_user on mst_order_details.user_id=mst_user.sk_user_id left join mlt_address_dup on mlt_order.user_address=mlt_address_dup.sk_address_id where sk_order_id='$sk_id'");
		$result=$query->result();
		return $result;
	}
	public function win(){
		$query=$this->db->query("select * from mlt_win left join mst_user on mlt_win.user_id=mst_user.sk_user_id");
		$result=$query->result();
		return $result;
	}
	public function ratedetails(){
		//$query=$this->db->query("select * from mlt_rating INNER JOIN mst_user on mlt_rating.user_id=mst_user.sk_user_id");
		$query=$this->db->query("select * from mlt_rating");
		$result=$query->result();
		return $result;
	}

	function getUserDetails($userId) {
        $sql = "SELECT * from mst_user where sk_user_id=? ";
        $binds = array($userId);
        $query = $this->db->query($sql,$binds);
        if ($query->num_rows() > 0) {
          return $query->result();
        }
		else {
          return false;
        }
      }
	  public function userdetails(){
		$query=$this->db->query("select * from mst_user left join mlt_address_dup on mst_user.sk_user_id=mlt_address_dup .user_id left join mlt_order on mst_user.sk_user_id=mlt_order.user_id GROUP BY mst_user.full_name ORDER BY sk_user_id, sk_address_id,order_delivery_date DESC");
		$result=$query->result();
		return $result;
	}
	public function giftacart(){
		$query=$this->db->query("select `mlt_gift_a_cart`.`sk_gift_cart_id`,`mlt_gift_a_cart`.`name`,`mlt_gift_a_cart`.`email`,`mlt_gift_a_cart`.`mobile`,`mst_user`.`full_name` from mlt_gift_a_cart LEFT JOIN mst_user ON mlt_gift_a_cart.sk_gift_cart_id=mst_user.sk_user_id");
		$result=$query->result();
		return $result;

	}
	public function partytime(){
		$query=$this->db->query("select * from mlt_user_packages left join mst_user on mlt_user_packages.sk_user_package_id=mst_user.sk_user_id left join mlt_order on mlt_user_packages.order_id=mlt_order.sk_order_id left join mlt_package on mlt_user_packages.package_id=mlt_package.sk_package_id");
		$result=$query->result();
		return $result;

	}
	public function user_details_value($id){
		$query=$this->db->query("SELECT AVG(total_order_value) as avg_val FROM `mlt_order` WHERE user_id=$id");
		$result=$query->result();
		return $result;

	}
}
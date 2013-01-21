<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_supplier extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
       }
	   
	   public function add_new_supplier()
	   {
		   if($_POST)
		   {
			   //client base infomation
			  $current_name=$_POST['current_name'];
			  $short_name=$_POST['short_name'];
			  $member_type=$_POST['member_type'];
			  $mobile = $_POST['mobile'];
			  if($mobile==NULL||$mobile=="")
			  {
				  $mobile=0;
			  }
			  $faxnum = $_POST['fax_number'];
			  if($faxnum==NULL||$faxnum=="")
			  {
				  $faxnum=0;
			  }
			  $phone=$_POST['fax_number'];
			  $email=$_POST['email_address'];
			  if($email==NULL||$email=="")
			  {
				  $email=" ";
			  }
			  //client address
			  $client_place=$_POST['client_place'];
			  $client_region=$_POST['client_region'];
			  $client_code=$_POST['client_code'];
			  $client_city=$_POST['client_city'];
			  $client_state=$_POST['client_states'];
			  $client_area=$_POST['area'];
			 
			  //client delivery area
			  $client_delivery_area = $_POST['area'];
			  //register or start date
			  $start_date = date("Y-m-d");
			  
			  
			  
			  //list to array
			  $newclientdetail = array(
			  		'CompanyName'=>$current_name,
					'ContactName'=>$short_name,
					'CustomerType'=>$member_type,
					'Address1'=>$client_place,
					'Address2'=>" ",
					'Suburb1'=>$client_region,
					'Suburb2'=>" ",
					'City1'=>$client_city,
					'City2'=>" ",
					'State1'=>$client_state,
					'State2'=>" ",
					'Country1'=>" ",
					'Country2'=>" ",
					'Postcode1'=>$client_code,
					'Postcode2'=>" ",
					'Mobile'=>$mobile,
					'Fax'=>$faxnum,
					'Telephone'=>$phone,
					'Email'=>$email,
					'Website'=>$client_delivery_area,
					'StartDate'=>$start_date
			  );
			  
			  //insert new client to table named customer
			  $this->db->insert('customer', $newclientdetail); 
			  
			  //return back
			  echo "<script language='javascript'>alert('添加新客户成功');</script>";
			  header("Location:".base_url()."page?page=supplier_management");
		   }
	   }


}
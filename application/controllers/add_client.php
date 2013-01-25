<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_client extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
       }
	   
	   public function add_new_client()
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
			  //delivery address
			  $delivery_place=$_POST['delivery_place'];
			  $delivery_region=$_POST['delivery_region'];
			  $delivery_code=$_POST['delivery_code'];
			  $delivery_city=$_POST['delivery_city'];
			  $delivery_state=$_POST['delivery_states'];
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
					'Address2'=>$delivery_place,
					'Suburb1'=>$client_region,
					'Suburb2'=>$delivery_region,
					'City1'=>$client_city,
					'City2'=>$delivery_city,
					'State1'=>$client_state,
					'State2'=>$delivery_state,
					'Country1'=>" ",
					'Country2'=>" ",
					'Postcode1'=>$client_code,
					'Postcode2'=>$delivery_code,
					'Mobile'=>$mobile,
					'Fax'=>$faxnum,
					'Telephone'=>$phone,
					'Email'=>$email,
					'Website'=>$client_delivery_area,
					'StartDate'=>$start_date
			  );
			  $newclientcompanyname = array(
			  		'CompanyName'=>$current_name,
					'Description'=>$current_name,
					'Balance'=>0,
					'Date'=>$start_date,
					'Comment'=>''
			  );
			  //insert new client to table named customer
			  $this->db->insert('customer', $newclientdetail); 
			  $this->db->insert('companyname',$newclientcompanyname);
			  //return back
			  echo "<script language='javascript' type='text/javascript'>alert('添加新客户成功')</script>";
			  header("Location:".base_url()."page?page=client_management");
		   }
	   }


}
?>
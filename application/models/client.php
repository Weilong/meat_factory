<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class client extends CI_Model{
		  public function __construct(){
				parent::__construct();
		  }
		  public function read_client() // 显示客户所在地区 供选择 alternative client region 
		  {
			  $sql = "SELECT `Suburb1` From customer WHERE `CustomerType`='Client' Group By `Suburb1`";
			  $query = $this->db->query($sql);
			  $customers = array();
			  if($query->num_rows()>0)
			  {

					for($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++)
					{
						$customers[$i] = $query->row($i);
					}
			  }
			  return $customers;
		  }
		  public function list_client($regionplace) //列出所有在该地区客户 client detail in region
		  {
			  if($regionplace=='all')
			  {
				  $sql="SELECT * FROM customer WHERE `CustomerType`='Client'";
			  }
			  else
			  {
			  	$sql = "SELECT * FROM customer WHERE `CustomerType`='Client'AND`Suburb1`='$regionplace'";
			  }
			  $query = $this->db->query($sql);
			  if($query->num_rows()>0)
			  {
				  $company=array();
				  foreach($query->result() as $row)
				  {
					  $id = $row->CustomerID;
					  $companyname=$row->CompanyName;
					  $contactname=$row->ContactName;
					  $address = $row->Address1;
					  $region = $row->Suburb1;
					  $phone = $row->Telephone;
					  $mobile = $row->Mobile;
					  $area = $row->Area;
					  $result = compact(
					  	'id',
						'companyname',
						'contactname',
						'address',
						'region',
						'phone',
						'mobile',
						'area'
					  );
					  array_push($company,$result);
				  }
				  return $company;
			  }
		  }
		  public function detail_client($client)
		  {
			 	 $sql="SELECT * FROM customer WHERE `CustomerID`='$client'";
				 $query = $this->db->query($sql);
				 if($query->num_rows()>0)
				 {
					 $company=array();
					 foreach ($query->result() as $row)
					 {
						 $id = $row->CustomerID;
						 $companyname=$row->CompanyName;
						 $contactname=$row->ContactName;
						 $customertype=$row->CustomerType;
						 $address = $row->Address1;
						 $deliveryaddress = $row->Address2;
						 $suburb = $row->Suburb1;
						 $deliverysuburb = $row->Suburb2;
						 $city = $row->City1;
						 $expresscity = $row->City2;
						 $state = $row->State1;
						 $deliverystate = $row->State2;
						 $country = $row->Country1;
						 $deliverycountry = $row->Country2;
						 $postcode = $row->Postcode1;
						 $deliverypostcode=$row->Postcode2;
						 $telephone = $row->Telephone;
						 $fax = $row->Fax;
						 $mobile = $row->Mobile;
						 $email = $row->Email;
						 $area = $row->Area;
						 $result = compact(
							'id',
							'companyname',
							'contactname',
							'customertype',
							'address',
							'deliveryaddress',
							'suburb',
							'deliverysuburb',
							'city',
							'expresscity',
							'state',
							'deliverystate',
							'country',
							'deliverycountry',
							'postcode',
							'deliverypostcode',
							'telephone',
							'fax',
							'mobile',
							'email',
							'area'
						 );
						 array_push($company,$result);
					 }
					 return $company;
			 	}
		  }
		  public function edit_client($client) //客户详细信息（包括送货地址） 可以修改保存 edit client detail
		  {
			  	$id = $client['id'];
				$name = $client['name'];
				$contact = $client['contact'];
				$type = $client['type'];
				$address =$client['address'];
				$address2 = $client['address2'];
				$suburb = $client['suburb'];
				$suburb2 = $client['suburb2'];
				$city =$client['city'];
				$city2=$client['city2'];
				$state = $client['state'];
				$state2= $client['state2'];
				$country = $client['country'];
				$country2 = $client['country2'];
				$postcode = $client['postcode'];
				$postcode2 = $client['postcode2'];
				$telephone = $client['phone'];
				$fax = $client['fax'];
				$mobile = $client['mobile'];
				$email = $client['email'];
				$area = $client['area'];
				$sql = "UPDATE `customer` SET `CompanyName`='$name',`ContactName`='$contact',`CustomerType`='$type',`Address1`='$address',`Suburb1`='$suburb',`City1`='$city',`State1`='$state',`Country1`='$country',`Postcode1`='$postcode',`Address2`='$address2',`Suburb2`='$suburb2',`City2`='$city2',`State2`='$state2',`Country2`='$country2',`Postcode2`='$postcode2',`Telephone`='$telephone',`Fax`='$fax',`Mobile`='$mobile',`Email`='$email',`Website`='$area' WHERE `CustomerID`='$id'";
				$query = $this->db->query($sql);
				
				return $query;
		  }
		   public function remove_client($client)
		  {
			  $sql = "DELETE FROM `customer` WHERE `CustomerID`='$client'";
			  $query = $this->db->query($sql);
			  return $client;
		  }
		  public function getclientreport()
		  {
			  $sql = "SELECT * FROM `customer` WHERE `CustomerType`='Client'";
			  $query = $this->db->query($sql);
			  if($query->num_rows()>0)
			  {
				  $clientarray = array('ID,Name,Contact,Address,Suburb,City,State,Country,Postcode,DeliveryAddress, DeliverySuburb,DeliveryCity,DeliveryState,DeliveryCountry,DeliveryPostCode,Telephone,Fax,Mobile,Email,Area');
				  foreach($query->result() as $row)
				  {
				 		 $id = $row->CustomerID;
						 $companyname=$row->CompanyName;
						 $contactname=$row->ContactName;
						 $address = $row->Address1;
						 $deliveryaddress = $row->Address2;
						 $suburb = $row->Suburb1;
						 $deliverysuburb = $row->Suburb2;
						 $city = $row->City1;
						 $expresscity = $row->City2;
						 $state = $row->State1;
						 $deliverystate = $row->State2;
						 $country = $row->Country1;
						 $deliverycountry = $row->Country2;
						 $postcode = $row->Postcode1;
						 $deliverypostcode=$row->Postcode2;
						 $telephone = $row->Telephone;
						 $fax = $row->Fax;
						 $mobile = $row->Mobile;
						 $email = $row->Email;
						 $area = $row->Area;
						 $temparraylist = $id.','.$companyname.','.$contactname.','.$address.','.$suburb.','.$city.','.$state.','.$country.','.$postcode.','.$deliveryaddress.','.$deliverysuburb.','.$expresscity.','.$deliverystate.','.$deliverycountry.','.$deliverypostcode.','.$telephone.','.$fax.','.$mobile.','.$email.','.$area;
						 array_push($clientarray,$temparraylist);
				  }
				  return $clientarray;
			  }
		  }
		 
	}

?>
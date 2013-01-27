<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class supplier extends CI_Model{
		  public function __construct(){
				parent::__construct();
		  }
		  public function read_supplier()
		  {
			  $sql = "SELECT `CompanyName` From customer WHERE `CustomerType`='Supplier'";
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
		  public function list_supplier($supplier) //供应商信息 supplier list table
		  {
			  if($supplier=='all')
			  {
				  $sql="SELECT * FROM customer WHERE `CustomerType`='Supplier'";
			  }
			  else
			  {
			  	  $sql="SELECT * FROM customer WHERE `CustomerType`='Supplier'AND`CompanyName`='$supplier'";
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
					  $result = compact(
					  	'id',
						'companyname',
						'contactname',
						'address',
						'region',
						'phone',
						'mobile'
					  );
					  array_push($company,$result);
				  }
				  return $company;
			  }
		  }
		  public function detail_supplier($supplier) //供应商详细信息 single supplier detail
		  {
			 $sql="SELECT * FROM customer WHERE `CustomerID`='$supplier'";
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
					 $suburb = $row->Suburb1;
					 $city = $row->City1;
					 $state = $row->State1;
					 $country = $row->Country1;
					 $postcode = $row->Postcode1;
					 $telephone = $row->Telephone;
					 $fax = $row->Fax;
					 $mobile = $row->Mobile;
					 $email = $row->Email;
					 $result = compact(
					 	'id',
						'companyname',
						'contactname',
						'customertype',
						'address',
						'suburb',
						'city',
						'state',
						'country',
						'postcode',
						'telephone',
						'fax',
						'mobile',
						'email'
					 );
					 array_push($company,$result);
				 }
				 return $company;
			 }
		  }
		  public function edit_supplier($supplier) //供应商修改 edit supplier infomation
		  {
				$id = $supplier['id'];
				$name = $supplier['name'];
				$contact = $supplier['contact'];
				$type = $supplier['type'];
				$address = $supplier['address'];
				$suburb = $supplier['suburb'];
				$city =$supplier['city'];
				$state = $supplier['state'];
				$country = $supplier['country'];
				$postcode = $supplier['postcode'];
				$telephone = $supplier['phone'];
				$fax = $supplier['fax'];
				$mobile = $supplier['mobile'];
				$email = $supplier['email'];
				$sql = "UPDATE `customer` SET `CompanyName`='$name',`ContactName`='$contact',`CustomerType`='$type',`Address1`='$address',`Suburb1`='$suburb',`City1`='$city',`State1`='$state',`Country1`='$country',`Postcode1`='$postcode',`Telephone`='$telephone',`Fax`='$fax',`Mobile`='$mobile',`Email`='$email' WHERE `CustomerID`='$id'";
				$query = $this->db->query($sql);
				
				return $query;
		  }
		  public function remove_supplier($supplier)
		  {
			  $sql = "DELETE FROM `customer` WHERE `CustomerID`='$supplier'";
			  $query = $this->db->query($sql);
			  return $supplier;
		  }
	}



?>
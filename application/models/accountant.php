<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accountant extends CI_Model {

	 public function __construct(){
            parent::__construct();
     }

	public function index(){
		
	}

	public function fetch_balance($company_name){
		$sql = "SELECT Balance FROM companyname WHERE CompanyName='$company_name'";
		$query = $this->db->query($sql);
		return $query->row(0)->Balance;
	}

	public function insert_profit($company_name, $amount, $method){
		$date = date('y-m-d h:i:s');
		$sql = "INSERT INTO profit (Date, CompanyName, Credit, PayMethod) 
				VALUES ('$date', '$company_name', '$amount', '$method')";
		$this->db->query($sql);
		/*
			update balance of company
		*/
		if ($company_name!="Retail")
		{
			$sql = "SELECT Balance FROM companyname WHERE CompanyName = '$company_name'";
			$query = $this->db->query($sql);
			$new_balance = $query->row(0)->Balance-$amount;
			$sql = "UPDATE companyname 
					SET Balance='$new_balance' 
					WHERE CompanyName = '$company_name'";
			$this->db->query($sql);
			return $new_balance;
		}
	}
}
?>
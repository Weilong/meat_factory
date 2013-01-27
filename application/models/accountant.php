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

	public function fetch_profit($start_date,$end_date,$company_name){
		//$start_date = date('y-m-d h:i:s', strtotime($start_date));
		//$end_date = date('y-m-d h:i:s', strtotime($end_date));
		$sql = "";
		if ($company_name==null){
			$sql .= "SELECT * FROM profit WHERE Date BETWEEN '$start_date' AND '$end_date' ORDER BY PaymentId";
		}
		else{
			$sql .= "SELECT * FROM profit WHERE Date BETWEEN '$start_date' AND '$end_date' AND CompanyName='$company_name' ORDER BY PaymentId";
		}
		$query = $this->db->query($sql);
		$profits = array();
		if ($query->num_rows()>0){
			for ($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++ ){
				$profits[$i] = $query->row($i);
			}
		}
		return $profits;
	}

	public function fetch_company_balance($company_name){
		$sql ="SELECT AccountID, CompanyName, Balance, ContactName, Comment FROM companyname";
		if ($company_name!="All"){
			$sql .= " WHERE CompanyName='$company_name'";
		}
		$sql .= " ORDER BY AccountID";
		$query = $this->db->query($sql);
		$balances = array();
		if ($query->num_rows()>0){
			for ($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++ ){
				$balances[$i] = $query->row($i);
			}
		}
		return $balances; 
	}

	public function update_balance($balances){
		foreach($balances as $balance){
			$sql = "UPDATE companyname 
					SET Balance='$balance[balance]', Comment='$balance[comment]' 
					WHERE AccountID='$balance[account_id]'";
			$this->db->query($sql);
		}
	}
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Income extends CI_Model {

	 public function __construct(){
            parent::__construct();
     }

	public function index(){
		
	}

	public function fetch_product_name(){
		$sql = "SELECT ProductName FROM product";
		$query = $this->db->query($sql);
		$product_name = array();
		if ($query->num_rows()>0){
			for ($i=0,$num_rows=$query->num_rows();$i<$num_rows;$i++){
				$product_name[$i] = $query->row($i);
			}
		}
		return $product_name;
	}

	public function fetch_income($data){
		$company_name=$data["company_name"];
		$product_name=$data["product_name"];
		$start_date=$data["start_date"];
		$end_date=$data["end_date"];
		$income_type=$data["income_type"];
		$payment_method=$data["payment_method"];
		$incomes = array();
		$income_list = array();
		$total_amount = 0;
		if ($income_type!="Debit" && $product_name=="All"){
			$sql = "SELECT CompanyName, PayMethod, Date, Credit FROM profit WHERE Date BETWEEN '$start_date' AND '$end_date'";
			
			if ($company_name!="All"){
				$sql.=" AND CompanyName='$company_name'";
			}
			if ($payment_method!="All"){
				$sql.=" AND PayMethod='$payment_method'";
			}
			$sql.= " ORDER BY Date";
			$credits = $this->db->query($sql);
			if ($credits->num_rows()>0){
				for ($i=0,$num_rows=$credits->num_rows();$i<$num_rows;$i++){
					$income = array();
					$income["ProductName"]="";
					$income["CompanyName"]=$credits->row($i)->CompanyName;
					$income["PayMethod"]=$credits->row($i)->PayMethod;
					$income["Date"]=$credits->row($i)->Date;
					$income["Credit"]=$credits->row($i)->Credit;
					$income["Debit"]="";
					$income["Comment"]="";
					$income_list[$i]=$income;
					$total_amount+=$income["Credit"];
				}
				
			}
		}
		
		if ($income_type!="Credit" && $company_name=="All" && $payment_method=="All"){
			$sql = "SELECT ProductName, intoDate, TotalPric, Comment FROM intolibrary WHERE intoDate BETWEEN '$start_date' AND '$end_date'";
			
			if ($product_name!="All"){
				$sql.=" AND ProductName='$product_name'";
			}
			$sql.= " ORDER BY intoDate";
			$debits = $this->db->query($sql);
			if ($debits->num_rows()>0){
				for ($i=0,$num_rows=$debits->num_rows();$i<$num_rows;$i++){
					$income = array();
					$income["ProductName"]=$debits->row($i)->ProductName;
					$income["CompanyName"]="";
					$income["PayMethod"]="";
					$income["Date"]=$debits->row($i)->intoDate;
					$income["Credit"]="";
					$income["Debit"]=$debits->row($i)->TotalPric;
					$income["Comment"]=$debits->row($i)->Comment;
					$income_list[$i+count($income_list)-1]=$income;
					$total_amount-=$income["Debit"];
				}
			}
		}
		
		$incomes[0]=$income_list;
		$incomes[1]=$total_amount;
		return $incomes;
		
	}
}
?>
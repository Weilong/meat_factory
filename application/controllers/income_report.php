<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Income_report extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("income");
    }

	public function index(){
		
	}

	public function get_product_name(){
		$product_name = $this->income->fetch_product_name();
		$response = json_encode($product_name);
		echo $response;
	}
	public function get_income(){
		$data = array();
		$data["company_name"] = $this->input->post("company");
		$data["product_name"] = $this->input->post("product");
		$data["start_date"] = $this->input->post("start");
		$data["end_date"] = $this->input->post("end");
		$data["income_type"] = $this->input->post("income_type");
		$data["payment_method"] = $this->input->post("payment_method");
		$incomes = $this->income->fetch_income($data);
		$response = json_encode($incomes);
		echo $response;
	}
	public function get_report()
	{
		$data = array();
		$data["company_name"] = $this->input->post("company");
		$data["product_name"] = $this->input->post("product");
		$data["start_date"] = $this->input->post("start");
		$data["end_date"] = $this->input->post("end");
		$data["income_type"] = $this->input->post("income_type");
		$data["payment_method"] = $this->input->post("payment_method");
		$incomes = $this->income->fetch_income($data);
		//get the report array rows number
		$report = array ();
		$report = $incomes[0];
		$i=0;
		foreach ($report as $row)
		{
			$i++;
		}
		//get the array contents
		$j=0;
		$reporttocsv = array("ProductName, CompanyName, PayMethod, Date, Credit, Debit, Comment");
		for($j=0;$j<$i;$j++)
		{
			
			$reportarray = $report[$j];
			foreach($reportarray as $rows)
			{
				$productname=$reportarray['ProductName'];
				$companyname=$reportarray['CompanyName'];
				$paymethod=$reportarray['PayMethod'];
				$date=$reportarray['Date'];
				$credit=$reportarray['Credit'];
				$debit=$reportarray['Debit'];
				$comment=$reportarray['Comment'];
				
			}
			$arraylist = $productname.','.$companyname.','.$paymethod.','.$date.','.$credit.','.$debit.','.$comment;
			
			array_push($reporttocsv,$arraylist);
		}
		$totalprice = " , , , , ,Amount , ".$incomes[1];
		array_push($reporttocsv,$totalprice);
		$issuedate = date('Y_m_d');
		$path ="file/".$issuedate.".csv";
		$file = fopen($path,"w");
		foreach ($reporttocsv as $line)
		{
		  fputcsv($file,split(",",$line));
		  }
		
		fclose($file);
		echo json_encode($reporttocsv);
	}
}
?>
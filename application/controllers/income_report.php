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
}
?>
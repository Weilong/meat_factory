<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_order extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("customers");
    }

	public function index(){
		
	}

	public function get_company_name(){
		
		$customers = $this->customers->read_company_name();
		$response = json_encode($customers);
		echo $response;
	}

	public function get_company_data(){
		$company_name = $this->input->post("company_name");
		$result = $this->customers->read_company_info($company_name);
		$response = json_encode($result);
		echo $response;
	}

	public function get_company_order(){
		$company_name = $this->input->post("company_name");
		$orders = $this->customers->filter_company_order($company_name);
		$response = json_encode($orders);
		echo $response;
	}

	public function submit_order(){
		$order = json_decode($this->input->post("order"),true);
		$this->customers->insert_order($order);
	}

	public function save_default(){
		$order = json_decode($this->input->post("order"),true);
		$this->customers->save_to_order_template($order);
	}

	public function search_order(){
		$start_date = $this->input->post("start");
		$end_date = $this->input->post("end");
		$company = $this->input->post("company");
		$status = $this->input->post("status");
		$orders = $this->customers->fetch_orders($start_date,$end_date,$company,$status);
		$response = json_encode($orders);
		echo $response;
	}

	public function search_order_detail(){
		$order_id = $this->input->post("order_id");
		$order_detail = $this->customers->fetch_order_detail($order_id);
		$response = json_encode($order_detail);
		echo $response;
	}

	public function remove_order(){

	}

	public function remove_order_detail(){
		$order_detail = json_decode($this->input->post("order_detail"),true);
		$this->customers->delete_order_detail($order_detail);
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */
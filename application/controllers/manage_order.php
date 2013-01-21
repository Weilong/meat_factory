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
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */
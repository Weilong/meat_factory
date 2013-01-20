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
		//$result = array_merge((array)$this->customers->read_company_info($company_name),(array)$this->customers->read_total_price($company_name));
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

	public function add_order(){
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('delivery_date', 'Delivery Date', 'trim|required');
		
		if($this->form_validation->run() == FALSE){
	     //Field validation failed.&nbsp; User redirected to login page
	     $this->load->view('order_management');
	    }
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */
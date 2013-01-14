<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_order extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
            $this->load->model("customers");
       }

	public function index()
	{
		
	}

	public function get_company_name()
	{
		
		$customers = $this->customers->read_company_name();

		$response = json_encode($customers);
		echo $response;
	}

	public function get_company_data()
	{
		$company_name = $this->input->post("company_name");
		$result = array_merge((array)$this->customers->read_company_info($company_name),(array)$this->customers->read_total_price($company_name));
		$response = json_encode($result);
		echo $response;
	}

	public function get_company_order()
	{
		$company_name = $this->input->post("company_name");
		
		if (isset($company_name)&&!empty($company_name))
		{
			$orders = $this->customers->filter_company_order($company_name);
		}
		else
		{
			$orders = $this->customers->read_company_order();
		}
		
		$response = json_encode($orders);
		echo $response;
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */
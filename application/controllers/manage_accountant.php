<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_accountant extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("accountant");
    }

	public function index(){
		
	}

	public function get_balance(){
		$company_name = $this->input->post("company_name");
		$balance = $this->accountant->fetch_balance($company_name);
		$response = json_encode($balance);
		echo $response;
	}

	public function add_profit(){
		$company_name = $this->input->post("company_name");
		$amount = $this->input->post("amount");
		$method = $this->input->post("method");
		$new_balance = $this->accountant->insert_profit($company_name, $amount, $method);
		if ($new_balance!=null){
			$response = json_encode($new_balance);
			echo $response;
		}	
	}

	public function search_profit(){
		$start_date = $this->input->post("start");
		$end_date = $this->input->post("end");
		$company_name = $this->input->post("company");
		$profits = $this->accountant->fetch_profit($start_date,$end_date,$company_name);
		$response = json_encode($profits);
		echo $response;
	}

	public function search_balance(){
		$company_name = $this->input->post("company");
		$balances = $this->accountant->fetch_company_balance($company_name);
		$response = json_encode($balances);
		echo $response;
	}
}

/* End of file manage_accountant.php */
/* Location: ./application/controllers/manage_accountant.php */
?>
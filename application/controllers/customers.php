<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
       }

	public function index()
	{
		
	}

	public function read_company_name()
	{
		$sql = "SELECT companyname FROM customer";
		$query = $this->db->query($sql);

		if ($query->num_rows()>0)
		{
			for($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++)
			{
				$customers[$i] = $query->row($i);
			}
		}

		$response = $_GET["jsoncallback"]."(".json_encode($customers).")";
		echo $response;
	}

	public function read_product()
	{

	}

	public function read_company_information()
	{
		$company_name = $this->input->post("company_name");
		$sql = "SELECT Address1, Suburb1, Email FROM customer WHERE companyname='$company_name'";
		$query = $this->db->query($sql);

		if ($query->num_rows()==1)
		{
			$response = json_encode($query->row());
			echo $response;
		}
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */
?>
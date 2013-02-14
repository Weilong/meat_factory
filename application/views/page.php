<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		$this->load->view('includes/header');
		//$this->load->view('includes/navigation');
		
		if ($this->input->get('page'))
		{
			$page = $this->input->get('page');
			if ($page=="accountant_management"){
				if ($this->session->userdata('logged_in')){
					$this->load->view($page);
				}
				else{
					redirect("page?page=accountant_login","refresh");
				}
			}
			else{
				$this->session->sess_destroy();
				$this->load->view($page);
			}			
		}
		else
		{
			$this->load->view('order_management');
		}

		$this->load->view('includes/footer');
	}
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */
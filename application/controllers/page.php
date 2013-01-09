<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		$this->load->view('includes/header');
		//$this->load->view('includes/navigation');
		
		if ($this->input->get('page'))
		{
			$page = $this->input->get('page');
			$this->load->view($page);
		}
		else
		{
			$this->load->view('includes/main');
		}

		$this->load->view('includes/footer');
	}
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */
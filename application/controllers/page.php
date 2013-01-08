<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{

		$page = $this->input->get('page');
		$this->load->view('includes/header');
		$this->load->view('includes/navigation');
		$this->load->view($page);
		$this->load->view('includes/footer');
	}
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */
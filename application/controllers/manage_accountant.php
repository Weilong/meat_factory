<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_accountant extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("accountant");
    }

	public function index(){
		
	}
}

/* End of file manage_accountant.php */
/* Location: ./application/controllers/manage_accountant.php */
?>
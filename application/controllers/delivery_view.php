<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
		class delivery_view extends CI_Controller{
			
		   public function __construct()
		   {
				parent::__construct();
				$this->load->model("delivery");
		   }
		   
			public function load_delivery_detail()
			{
				if($_POST['delivery_date'])
				{
					if($_POST['delivery_date']==""||$_POST['delivery_date']==NULL)
					{
						$delivery_date = date('Y-m-d');
					}
					else
					{
						$delivery_date=$_POST['delivery_date'];
					}
					$data['result']=json_decode($this->delivery->read_orderInfo($delivery_date));
						$this->load->view('includes/header');
						$this->load->view('delivery_view',$data);
						$this->load->view('includes/footer');
				}
			}
			
			public function load_delivery_driver()
			{
				
			}
			public function delivery_status_change()
			{
				if($_POST['status'])
				{
					
				}
			}
		}

?>
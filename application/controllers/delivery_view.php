<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
		class delivery_view extends CI_Controller{
			
		   public function __construct()
		   {
				parent::__construct();
				$this->load->model("delivery");
		   }
		   
			public function load_delivery_detail()
			{
				if($_POST)
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
						$data['result']=json_decode($this->delivery->read_orderInfo($delivery_date));//get the current date delivery list
						$data['drivers']=json_decode($this->delivery->read_delivery_driver());//get all driver name to change, if the delivery is not completed
							$this->load->view('includes/header');
							$this->load->view('delivery_view',$data);
							$this->load->view('includes/footer');
					}
					else
					{
						$delivery_date = date('Y-m-d');
						$data['result']=json_decode($this->delivery->read_orderInfo($delivery_date));//get the current date delivery list
						$data['drivers']=json_decode($this->delivery->read_delivery_driver());//get all driver name to change, if the delivery is not completed
							$this->load->view('includes/header');
							$this->load->view('delivery_view',$data);
							$this->load->view('includes/footer');
					}
				}
				else
				{
						$delivery_date = date('Y-m-d');
						$data['result']=json_decode($this->delivery->read_orderInfo($delivery_date));//get the current date delivery list
						$data['drivers']=json_decode($this->delivery->read_delivery_driver());//get all driver name to change, if the delivery is not completed
							$this->load->view('includes/header');
							$this->load->view('delivery_view',$data);
							$this->load->view('includes/footer');
				}
			}
			public function change_delivery_status()
			{
				$status = $this->input->post('complete_status');
				$orderid = $this->input->post('orderid');
				$this->delivery->delivery_status_change($orderid,$status);
			}
			public function delivery_driver_change()
			{
					$driver=$this->input->post('drivername');
					$orderid =$this->input->post('orderid');
					$this->delivery->change_delivery_driver($orderid,$driver);
			}
		}

?>
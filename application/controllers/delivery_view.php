<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
		class delivery_view extends CI_Controller{
			
		   public function __construct()
		   {
				parent::__construct();
				$this->load->model("delivery");
				$this->load->model("invoice");
				$this->load->model("customers");
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
					$status = 'Dispatching';
					$this->delivery->change_delivery_driver($orderid,$driver,$status);
			}
			public function print_order_detail()
			{
				if($_GET)
				{
					$orderid=$_GET['orderid'];

					$accountname=$this->invoice->get_accountname($orderid);
					$orderdetail=$this->invoice->get_order_detail($orderid);
					$invoicedetail=$this->invoice->get_invoice_detail($orderid);
					$accountdetail=$this->invoice->get_client_contact($accountname);
				}
				$data['account']=$accountname;
				$data['orderdetail']=json_encode($orderdetail);
				$data['invoicedetail']=json_encode($invoicedetail);
				$data['accountdetail']=json_encode($accountdetail);
				$this->load->view('delivery_print',$data);
			}

			public function search_order_detail(){
				$order_id = $this->input->post("order_id");
				$order_detail = $this->customers->fetch_order_detail($order_id);
				$response = json_encode($order_detail);
				echo $response;
			}

			public function remove_order_detail(){
				$order_detail = json_decode($this->input->post("order_detail"),true);
				$this->customers->delete_order_detail($order_detail);
			}

			public function update_order_detail(){
				$new_order_detail = json_decode($this->input->post("order_detail"),true);
				$this->customers->update_order_detail($new_order_detail);
			}
		}

?>
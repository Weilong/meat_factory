<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
		class delivery_view extends CI_Controller{
			
		   public function __construct()
		   {
				parent::__construct();
				$this->load->model("delivery");
				$this->load->model("todaydelivery");
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
			public function get_product_list(){
				$products = $this->customers->read_product();
				$response = json_encode($products);
				echo $response;
			}
			public function add_order_detail(){
				$new_order_detail = json_decode($this->input->post("order_detail"),true);
				$this->customers->add_order_detail($new_order_detail);
			}
			public function today_delivery_area_print()
			{
				if($_GET)
				{
					$deliveryarea = $_GET['area'];
					$tdt = $_GET['currentdatetime'];
					$getcompanylist = $this->todaydelivery->companylist($deliveryarea,$tdt);
					$gettoprint = $this->todaydelivery->deliverydetail($deliveryarea,$tdt);
					$getproductlist = $this->todaydelivery->productlist($deliveryarea,$tdt);
					
					$rownum = count($getproductlist);
					$list = array();
					$i=0;
					$k=0;
					for($i=0;$i<$rownum;$i++)
					{
						$line1 = $getproductlist[$i];
						if($list==""||$list==NULL)
						{
							array_push($list,$line1);
						}
						$rowsnum = count($list);
						$j = 0;
						for($j=0;$j<$rowsnum;$j++)
						{
							if($line1==$list[$j])
							{
								$k=$j;
								break;
							}
							else
							{
								$k=$j;
							}
						}	
						if($line1!=$list[$k])
						{
							array_push($list,$line1);
						}					
					}
					$data['title'] = $deliveryarea;
					$data['currentdate'] = $tdt;
					$data['getcompanylist']=$getcompanylist;
					$data['gettoprint'] = $gettoprint;
					$data['getproductlist']=$list;
					$this->load->view('current_date_delivery',$data);
					//echo json_encode($getcompanylist);
					//echo json_encode($gettoprint);
				}
			}
		}

?>
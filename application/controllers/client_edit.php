<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class client_edit extends CI_Controller
	{
		 public function __construct(){
            parent::__construct();
			$this->load->model("client");
			$this->load->model("supplier");
    	 }
		public function read_client_region()
		{
			echo $result=json_encode($this->client->read_client());
		}
		public function read_supplier_region()
		{
			echo $result=json_encode($this->supplier->read_supplier());
		}
		//client list with the selection
		public function client_list()
		{
			if($_POST)
			{
				if($_POST['regionplace']) //post the region to controller
				{
					if($_POST['regionplace']!=NULL||$_POST['regionplace']!="")
					{
						$regionplace = $_POST['regionplace'];
					}
					else
					{
						$regionplace = 'all';
					}
				}
				else //if there is not post, $regionplace will got all.
				{
					$regionplace = 'all';
				}
				
			}
			else
			{
				$regionplace='all';
			}
			//list result and convert to json file 
			echo $result = json_encode($this->client->list_client($regionplace));
		}
		//get current client detail
		public function client_detail()
		{
			if($_POST)
			{
				if($_POST['companyid'])
				{
						if($_POST['companyid']!=NULL||$_POST['companyid']!="")
						{
							$client = $_POST['companyid'];
						}
						else
						{
							$client = 'all';
						}
				}
				else
				{
					$client = 'all';
				}
			}
			else
			{
				$client = 'all';
			}
			echo $result = json_encode($this->client->detail_client($client));
		}
		//edit client
		public function client_editing()
		{
			if($_POST)
			{
				echo $result = json_encode($this->client->edit_client($_POST['clientcompany']));
			}
		}
		public function client_delete()
		{
			if($_POST)
			{
				echo $result = $this->client->remove_client($_POST['company']);
			}
		}
		//list supplier with select
		public function supplier_list()
		{
			if($_POST)
			{
				if($_POST['suppliername'])
				{
						
					$supplier = $_POST['suppliername'];
				}
				else
				{
					$supplier = 'all';
				}
			}
			else
			{
				$supplier = 'all';
			}
			echo $result = json_encode($this->supplier->list_supplier($supplier));
		}
		/* get current supplier detail */
		public function supplier_detail()
		{
			if($_POST)
			{
				if($_POST['companyid'])
				{
						if($_POST['companyid']!=NULL||$_POST['companyid']!="")
						{
							$supplier = $_POST['companyid'];
						}
						else
						{
							$supplier = 'all';
						}
				}
				else
				{
					$supplier = 'all';
				}
			}
			else
			{
				$supplier = 'all';
			}
			echo $result = json_encode($this->supplier->detail_supplier($supplier));
		}
		/* edit supplier */
		public function supplier_edit()
		{
			if($_POST)
			{
				echo $supplier = $this -> supplier->edit_supplier($_POST['suppliercompany']);
			}
			
		}
		/* delete supplier */
		public function supplier_delete()
		{
			if($_POST)
			{
				echo $result = $this->supplier->remove_supplier($_POST['company']);
			}
		}
	}
	
?>

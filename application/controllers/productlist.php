<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class productlist extends CI_Controller{
	   public function __construct()
       {
            parent::__construct();
			$this->load->model('product_list');
       }
		public function supplier()
		{
			echo $result = json_encode($this->product_list->listfunction());
		}
		public function savegoods()
		{
			if($_POST)
			{
				echo $result = $this->product_list->goodssave($_POST['newproduct']);
			}
		}
		public function searchresult()
		{
			if($_POST)
			{
				$result = $this->product_list->ordersearch($_POST['start_date'],$_POST['end_date']);
				$goodsarray = array();
				foreach($result->result() as $row)
				{
					$id = $row->ID;
					$productordered = $row->ProductName;
					$supplier = $row->Suppliers;
					$price = $row->Price;
					$qty = $row->Nums;
					$units = $row->Unit;
					$amount = $row->TotalPric;
					$intodate=$row->IntoDate;
					$goods = compact
					(
						'id',
						'productordered',
						'supplier',
						'price',
						'qty',
						'units',
						'amount',
						'intodate'
					);
					array_push($goodsarray,$goods);
				}
				$goodsarray = json_encode($goodsarray);
				echo $goodsarray;
			}
		}
		public function searchdelete()
		{
			if($_POST)
			{
				echo $result=$this->product_list->goodsdelete($_POST['orderid']);
			}
		}
		
		/* current product edit with category */
		public function categorysearch()
		{
			if($_POST)
			{
				$result = $this->product_list->category($_POST['product_category'],$_POST['product_name']);
				if($result->num_rows()>0)
				{
					$product=array();
					foreach($result->result() as $row)
					{
						$id = $row->ProductID;
						$name=$row->ProductName;
						$description=$row->Description;
						$stock = $row->Stock;
						$price = $row->Price;
						$productunits=$row->Unit;
						$category = $row->Category;
						$collect = compact(
							'id',
							'name',
							'description',
							'stock',
							'price',
							'productunits',
							'category'
						);
						array_push($product,$collect);
					}
					$product=json_encode($product);
					echo $product;
				}
			}
		}
		public function delete_product()
		{
			if($_POST)
			{
				$result = $this->product_list->remove_product($_POST['product']);
				$resultmsg='Remove Done';
				echo $resultmsg;
			}
		}
		public function info_product()
		{
			if($_POST)
			{
				$result = $this->product_list->productInfo($_POST['product']);
				if($result->num_rows()>0)
				{
					$productdetail = array();
					foreach($result->result() as $row)
					{
						$id = $row->ProductID;
						$name=$row->ProductName;
						$description=$row->Description;
						$stock = $row->Stock;
						$price = $row->Price;
						$productunits=$row->Unit;
						$category = $row->Category;
						$collect = compact(
							'id',
							'name',
							'description',
							'stock',
							'price',
							'productunits',
							'category'
						);
						array_push($productdetail,$collect);
					}
				}
				$productdetail = json_encode($productdetail);
				echo $productdetail;
			}
		}
		public function save_edit()
		{
			if($_POST)
			{
				$result = $this->product_list->edit_save($_POST['product']);
				echo $result; 
			}
		}

		public function get_products(){
			$products = $this->product_list->fetch_all_products();
			$response = json_encode($products);
			echo $response;
		}
	}
?>
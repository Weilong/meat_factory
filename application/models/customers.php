<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Model {

	 public function __construct(){
            parent::__construct();
     }

	public function index(){
		
	}

	public function read_company_name(){
		$sql = "SELECT companyname FROM customer WHERE customertype='Client' ORDER BY companyname";
		$query = $this->db->query($sql);

		if ($query->num_rows()>0)
		{
			for($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++)
			{
				$customers[$i] = $query->row($i);
			}
		}

		return $customers;
	}

	public function read_company_info($company_name){
		$sql = "SELECT Address1, Suburb1, Postcode1 FROM customer WHERE companyname='$company_name'";
		$query = $this->db->query($sql);

		if ($query->num_rows()==1){
			return $query->row();
		}
	}

	public function filter_company_order($company_name){
		// left join product and orderdetail to show every product no matter a company has ordered or not
		// if ordered show qty else replace null to 0
		$sql = "SELECT product.ProductName, product.Description, product.Price, product.Unit, Category, Qty FROM product LEFT JOIN order_template ON product.ProductID = order_template.ProductID";
		$sql .= " AND order_template.CompanyName = '$company_name'";
		$sql .=" ORDER BY Qty DESC, product.ProductName ASC";
		//based on the table filtered by company, do further filter using category
		$sql = "Select ProductName, Description, Price, Unit, Category, Qty FROM "."(".$sql.") tmp"." WHERE (1=1)";
		
		$query = $this->db->query($sql);

		$orders = array();

		if ($query->num_rows()>0)
		{
			for($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++)
			{
				if ($query->row($i)->Qty==null)
					$query->row($i)->Qty=0;
				$orders[$i] = $query->row($i);
			}
		}

		return $orders;
	}

	public function save_to_order_template($order){
		$company_name = $order["company_name"];
		$products = $order["products"];
		//delete old template before adding new
		$sql = "DELETE FROM order_template WHERE CompanyName='$company_name'";
		$this->db->query($sql);
		foreach ($products as $product){
			$sql = "SELECT ProductID FROM product WHERE product.ProductName='$product[product_name]'";
			$query = $this->db->query($sql);
			$product_id = $query->row(0)->ProductID;
			
			$sql = "INSERT INTO order_template (CompanyName, ProductID, ProductName, Description, Unit, Price, Qty) VALUES ('$company_name','$product_id','$product[product_name]','$product[description]','$product[unit]','$product[price]','$product[qty]')";
			$this->db->query($sql);
		}
	}

	public function insert_order($order){
		/*
			add order into table orderinfo
		*/
		$date = date('y-m-d');
		$sql = "SELECT ContactName, Area FROM customer WHERE CompanyName='$order[company_name]'";
		$query = $this->db->query($sql);
		$contact_name = $query->row(0)->ContactName;
		$area = $query->row(0)->Area;
		$sql = "INSERT INTO orderinfo (CompanyName, DeliveryDate, Comment, Status, Address, Suburb, Area, Postcode, TotalQty, TotalPrice, OrderDate, ContactName) 
				VALUES ('$order[company_name]', '$order[delivery_date]', '$order[comment]', 'New', '$order[delivery_address]', '$order[suburb]', '$area', '$order[postcode]', '$order[total_qty]', '$order[total_price]', '$date', '$contact_name')";
		$this->db->query($sql);
		/*
			add order into table orderdetail
		*/
		$sql = "SELECT OrderDate, OrderID FROM orderinfo WHERE OrderID=(SELECT MAX(OrderID) FROM orderinfo)";
		$query = $this->db->query($sql);
		$order_id = $query->row(0)->OrderID;
		$order_date = $query->row(0)->OrderDate;
		$products = $order["products"];
		foreach ($products as $product){
			$sql = "SELECT ProductID FROM product, orderinfo WHERE product.ProductName='$product[product_name]'";
			$query = $this->db->query($sql);
			$product_id = $query->row(0)->ProductID;
			
			$sql = "INSERT INTO orderdetail (OrderID, CompanyName, ProductID, ProductName, Description, Unit, Price, Qty, OrderDate) 
					VALUES ('$order_id', '$order[company_name]','$product_id','$product[product_name]','$product[description]','$product[unit]','$product[price]','$product[qty]', '$order_date')";
			$this->db->query($sql);
		}
		/*
			add according payment into payment table
		*/
		$sql = "INSERT INTO payment (Date, OrderID, CompanyName, Debit, Status) 
				VALUES ('$order_date', '$order_id', '$order[company_name]', '$order[total_price]', 'Unpaid')";
		$this->db->query($sql);
	}
}
?>
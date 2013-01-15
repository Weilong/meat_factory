<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Model {

	 public function __construct()
       {
            parent::__construct();
       }

	public function index()
	{
		
	}

	public function read_company_name()
	{
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

	public function read_company_info($company_name)
	{
		$sql = "SELECT Address1, Suburb1, Postcode1 FROM customer WHERE companyname='$company_name'";
		$query = $this->db->query($sql);

		if ($query->num_rows()==1)
		{
			return $query->row();
		}
	}

	//read the total price and quantities of orders of certain company
	public function read_total_price($company_name)
	{
		$sql = "SELECT Price, Qty FROM orderdetail WHERE companyname='$company_name'";
		$query = $this->db->query($sql);

		$total_price=0;
		$total_qty=0;

		foreach($query->result() as $row)
		{
			$total_price +=	($row->Price*$row->Qty);
			$total_qty += $row->Qty;
		}

		$result = array(
					"total_price" => $total_price,
					"total_qty" => $total_qty
					);
		return $result;
	}

	public function read_company_order()
	{
		$sql = "SELECT ProductName, Description, Price, Unit, Category FROM product";
		$sql.=" ORDER BY ProductName ASC";
		$query = $this->db->query($sql);
		$orders = array();

		if ($query->num_rows()>0)
		{
			for($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++)
			{
				$query->row($i)->Qty=0;
				$orders[$i] = $query->row($i);
			}
		}

		return $orders;
	}

	public function filter_company_order($company_name,$category)
	{
		// left join product and orderdetail to show every product no matter a company has ordered or not
		// if ordered show qty else replace null to 0
		$sql = "SELECT product.ProductName, product.Description, product.Price, product.Unit, Category, Qty FROM product LEFT JOIN orderdetail ON product.ProductID = orderdetail.ProductID";
		$sql .= " AND orderdetail.CompanyName = '$company_name'";
		$sql .=" ORDER BY Qty DESC, product.ProductName ASC";
		//based on the table filtered by company, do further filter using category
		$sql = "Select ProductName, Description, Price, Unit, Category, Qty FROM "."(".$sql.") tmp"." WHERE (1=1)";
		
		if ($category!="All")
			$sql .= " AND Category='$category'";
		
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
}
?>
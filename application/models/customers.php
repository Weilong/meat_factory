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
		$sql = "SELECT Address1, Suburb1, Email FROM customer WHERE companyname='$company_name'";
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
		$sql = "SELECT orderdetail.ProductID, orderdetail.ProductName, orderdetail.Price, orderdetail.Unit, Category, Qty FROM orderdetail, product WHERE orderdetail.ProductID =product.ProductID";
		$query = $this->db->query($sql);
		$orders = array();

		if ($query->num_rows()>0)
		{
			for($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++)
			{
				$orders[$i] = $query->row($i);
			}
		}

		return $orders;
	}

	public function filter_company_order($company_name,$category)
	{
		$sql = "SELECT orderdetail.ProductID, orderdetail.ProductName, orderdetail.Price, orderdetail.Unit, Category, Qty FROM orderdetail, product WHERE orderdetail.ProductID =product.ProductID AND orderdetail.CompanyName='$company_name' AND product.Category='$category'";
		$query = $this->db->query($sql);
		$orders = array();

		if ($query->num_rows()>0)
		{
			for($i=0, $num_rows = $query->num_rows();$i<$num_rows;$i++)
			{
				$orders[$i] = $query->row($i);
			}
		}

		return $orders;
	}
}
?>
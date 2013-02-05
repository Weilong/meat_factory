<?php 
class todaydelivery extends CI_Model {

	public function __construct()
    {
         parent::__construct();
    }
	public function companylist($deliveryarea,$tdt)
	{
		$sql = "SELECT * FROM orderinfo WHERE `Area`='$deliveryarea' AND `DeliveryDate`='$tdt'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$deliverycompany = array();	
			foreach($query->result() as $row)
			{
				$orderid = $row->OrderID;
				$companyname = $row->CompanyName;
				$companylist = compact(
					'orderid',
					'companyname'
				);
				array_push($deliverycompany,$companylist);
			}
			return $deliverycompany;
		}
	}
	public function deliverydetail($deliveryarea,$tdt)
	{
		/*get company from orderinfo*/
		$sql = "SELECT * FROM orderinfo WHERE `Area`='$deliveryarea' AND `DeliveryDate`='$tdt'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$deliverycompany = array();	
			foreach($query->result() as $row)
			{
				$deliverydetail= array();
				$orderid = $row->OrderID;
				$companyname = $row->CompanyName;
				$sql2 = "SELECT * FROM orderdetail WHERE `OrderID`='$orderid'  AND `CompanyName`='$companyname'";
				$query2 = $this->db->query($sql2);
				foreach($query2->result() as $row2)
				{
					$productname=$row2->ProductName;
					$qty = $row2->Qty;
					$productdetail = compact(
						'productname',
						'qty'
					);
					array_push($deliverydetail,$productdetail);
				}
				$company = compact(
					'companyname',
					'deliverydetail'
				);
				array_push($deliverycompany,$company);
			}
		}
		return $deliverycompany;
	}
	public function productlist($deliveryarea,$tdt)
	{
		$sql = "SELECT * FROM orderinfo WHERE `Area`='$deliveryarea' AND `DeliveryDate`='$tdt' ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$productlist = array();
			foreach($query->result() as $row)
			{
				$orderid = $row->OrderID;
				$companyname = $row->CompanyName;
				$sqlview = "SELECT `ProductName` FROM orderdetail WHERE `OrderID`='$orderid' AND `CompanyName`='$companyname'  Group By `ProductName`";
				//$sqlview .= "SELECT `ProductName` FROM productlist Group By `ProductName`";
				//$sql3 = "SELECT `productlist` FROM temptable Group By `productlist`";
				$query2 = $this->db->query($sqlview);
				foreach ($query2->result() as $row2)
				{
					$product = $row2->ProductName;
					$list = compact(
						'product'
					);
					array_push($productlist,$list);
				}
				
			}
		}
		return $productlist;
	}
}
?>
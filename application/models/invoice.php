<?php 
class invoice extends CI_Model {

	 public function __construct()
    {
         parent::__construct();
    }

    public function get_accountname($orderid){
    	$sql="SELECT CompanyName FROM orderinfo WHERE `OrderID`='$orderid'";
    	$query = $this->db->query($sql);
    	if ($query->num_rows()>0){
    		$accountname = $query->row(0)->CompanyName;
    		return $accountname;
    	}
    }

	public function get_order_detail($orderid)
	{
		$sql="SELECT * From orderdetail Where `OrderID`='$orderid'";
		$query=$this->db->query($sql);
		if($query->num_rows()>0)
		{
			$orderdetail = array();
			foreach($query->result() as $row)
			{
				$description=$row->Description;
				$qty=$row->Qty;
				$price=$row->Price;
				$total=$qty*$price;
				$detail = compact(
					'description',
					'qty',
					'price',
					'total'
				);
				array_push($orderdetail,$detail);
			}
			return $orderdetail;
		}
	}

	public function get_client_contact($accountname)
	{
		$sql = "SELECT * From customer Where `CompanyName`='$accountname' AND `CustomerType`='Client'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$accountdetail=array();
			foreach($query->result() as $row)
			{
				$phone = $row->Telephone;
					if($phone==NULL||$phone=="")
					{
						$phone=" ";
					}
				$fax = $row->Fax;
					if($fax==NULL||$fax=="")
					{
						$fax=" ";
					}
				$address=$row->Address2;
					if($address==NULL||$address=="")
					{
						$address=$row->Address1;
					}
				$suburb=$row->Suburb2;
				if($suburb==NULL||$suburb=="")
				{
					$suburb=$row->Suburb1;
				}
				$city=$row->City2;
				if($city==NULL||$city=="")
				{
					$city=$row->City1;
				}
				$state=$row->State2;
				if($state==NULL||$state=="")
				{
					$state=$row->State1;
				}
				$country=$row->Country2;
				if($country==NULL||$country=="")
				{
					$country=$row->Country1;
				}
				$postcode=$row->Postcode2;
				if($postcode==NULL||$postcode=="")
				{
					$postcode=$row->Postcode1;
				}
				$name = $accountname;
				$result=compact(
					'name',
					'phone',
					'fax',
					'address',
					'suburb',
					'city',
					'state',
					'country',
					'postcode'
				);
				array_push($accountdetail,$result);
			}
			return $accountdetail;
		}
	}
	public function get_invoice_detail($orderid){
			$sql="SELECT * From payment Where `OrderID`='$orderid'";
			$query=$this->db->query($sql);
			if($query->num_rows()>0)
			{
				$invoicearray = array();
				foreach($query->result() as $row)
				{
					$invoiceid = $row->InvoiceID;
					$inputdate = $row->Date;
					$result=compact(
						'invoiceid',
						'inputdate'
					);
						array_push($invoicearray,$result);
				}
				return $invoicearray;
			}
	}
}
?>
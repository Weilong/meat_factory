<?php 
class delivery extends CI_Model {

	 public function __construct()
    {
         parent::__construct();
    }
	
	public function read_orderInfo($delivery_date)
	{
		//search the delivery info and enter the json file
			$sql = "Select * from orderinfo where DeliveryDate='$delivery_date'";
			$query = $this->db->query($sql);
				if($query->num_rows()>0)
				{
					$company=array();
					foreach($query->result() as $row)
					{
						$id=$row->OrderID;//
						$companyname=$row->CompanyName;//
						$deliverydate=$row->DeliveryDate;//
						$comment=$row->Comment;
						$driver=$row->Driver;//
						$status=$row->Status;
						$address=$row->Address;
						$suburb=$row->Suburb;//
						$area=$row->Area;//
						$postcode=$row->Postcode;
						$totalqty=$row->TotalQty;
						$totalprice=$row->TotalPrice;
						$orderdate=$row->OrderDate;
						$completedate=$row->CompleteDate;
						$contactname=$row->ContactName;//
						$result = compact(
							'id',//=>$id,
							'companyname',//=>$name,
							'deliverydate',//=>$ddate,
							'comment',//=>$comment,
							'driver',//=>$driver,
							'status',//=>$status,
							'address',//=>$address,
							'suburb',//=>$suburb,
							'area',//=>$area,
							'postcode',//=>$postcode,
							'totalqty',//=>$totalqty,
							'totalprice',//=>$totalprice,
							'orderdate',//=>$orderdate,
							'completedate',//=>$completedate,
							'contactname'//=>$contactname
							);
					    array_push($company,$result);
                    }
					return $deliverydata = json_encode($company);
				}
	}
	
	public function read_delivery_driver()
	{
		/*
			this model is implemented to list all driver
			all order can change the driver
		*/
		$sql = "Select * from driver";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$drivers=array();
			$i=0;
			foreach($query->result() as $rows)
			{
				$driver=$rows->drivername;
				$result=compact(
					'driver'
				);
				array_push($drivers,$result);
			}
			return $deliverydriver = json_encode($drivers);
		}
	}
	
	public function change_delivery_driver($orderid, $driver,$status)
	{
		/*
			if the delivery driver has been changed, the model will be implemented
		*/
		$sql="UPDATE `orderinfo` SET `Driver`='$driver',`Status`='$status' WHERE `OrderID`='$orderid'";
		$query = $this->db->query($sql);
		$result = $query->result();
	}
	public function delivery_status_change($orderid,$status)
	{
		$sql="UPDATE `orderinfo` SET `Status`='$status' WHERE `OrderID`='$orderid'";
		$query = $this->db->query($sql);
	}
}
?>
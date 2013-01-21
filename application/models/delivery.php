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
		$sql = "Select * from driver";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$drivers=array();
			foreach($query->result() as $rows)
			{
				$driver=$rows->drivername;
				array_push($drivers,$driver);	
			}
			return $deliverydriver = json_encode($drivers);
		}
	}
}
?>
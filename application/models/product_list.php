<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class product_list extends CI_Model
	{
		public function listfunction()
		{
			$sql="SELECT * FROM customer WHERE `CustomerType`='Supplier'";
			$query = $this->db->query($sql);
			if($query->num_rows()>0)
			{
				$suppliercompany = array();
				foreach($query->result() as $row)
				{
					$companyid=$row->CustomerID;
					$companyname=$row->CompanyName;
					$companycollect = compact
					(
						'companyid',
						'companyname'
					);
					array_push($suppliercompany,$companycollect);
				}
				return $suppliercompany;
			}
		}
		public function goodssave($goodsdata)
		{
			$goods = $goodsdata['product'];
			$supplier = $goodsdata['supplier'];
			$comments = $goodsdata['comments'];
			$price = $goodsdata['price'];
			$qty = $goodsdata['qty'];
			$units=$goodsdata['unit'];
			$amount=$goodsdata['amountprice'];
			$intodate = date('Y-m-d');
			$sql = "INSERT INTO `intolibrary` (`ProductName`,`Suppliers`,`Price`,`Nums`,`Unit`,`TotalPric`,`IntoDate`,`Comment`) VALUES ('$goods','$supplier','$price','$qty','$units','$amount','$intodate','$comments') ";
			$query = $this->db->query($sql);
			return $query;
		}
		public function ordersearch($startdate,$enddate)
		{
			if($startdate==$enddate)
			{
				$sql = "SELECT * FROM intolibrary WHERE `IntoDate`='$enddate'";
				$query = $this->db->query($sql);
				return $query;
			}
			else if($startdate!=$enddate)
			{
				$sql = "SELECT * FROM intolibrary WHERE `IntoDate`>='$startdate' AND `IntoDate`<='$enddate'";
				$query = $this->db->query($sql);
				return $query;
			}
		}
		public function goodsdelete($orderdelete)
		{
			$sql = "DELETE FROM `intolibrary` WHERE `ID`='$orderdelete'";
			$query =$this->db->query($sql);
			return $query;
		}
		//category found
		public function category($category)
		{
			if($category=="All")
			{
				$sql="SELECT * From product";
				$query = $this->db->query($sql);
				return $query;
			}
			else
			{
				$sql = "SELECT * From product WHERE `Category`='$category'";
				$query = $this->db->query($sql);
				return $query;
			}
		}
		public function remove_product($product)
		{
			$sql = "DELETE FROM product WHERE `ProductID`='$product'";
			$query = $this->db->query($sql);
			return $query;
		}
		public function productInfo($product)
		{
			$sql = "SELECT * FROM product WHERE `ProductID`='$product'";
			$query = $this->db->query($sql);
			return $query;
		}
		public function edit_save($product)
		{
			$id = $product['id'];
			$productname = $product['name'];
			$productdescription = $product['pintro'];
			$stock = $product['stocks'];
			$unit = $product['units'];
			$price = $product['price'];
			$category = $product['category'];
			$warning='Save Done';
			$sql = "Update `product` SET `ProductName`='$productname',`Description`='$productdescription',`Stock`='$stock',`Unit`='$unit',`Price`='$price',`Category`='$category' WHERE `ProductID` = '$id'";
			$query=$this->db->query($sql);
			$warning = 'Change Done';
			return $warning;
		}
	}
?>
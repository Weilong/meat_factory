<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_new_product extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
       }
	   
	   public function add_product()
	   {
		   if($_POST)
		   {
			   //product info
			   $productname=$_POST['productname'];
			   $productintro=$_POST['productintro'];
			   $qty=$_POST['qty'];
			   $unit=$_POST['unit'];
			   $price=$_POST['price'];
			   $category=$_POST['category'];
			 
			  $newproductarray = array(
			  		'ProductName'=>$productname,
					'Description'=>$productintro,
					'Stock'=>$qty,
					'Unit'=>$unit,
					'Price'=>$price,
					'Category'=>$category
			  );
			  
			  $this->db->insert('product', $newproductarray); 

			  //return back
			  echo "<script language='javascript'> alert('添加新商品成功'); </script>";
			  header("Location:".base_url()."page?page=product_management");
		   }
	   }


}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_cost extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
       }
	   
	   public function add_cost_balance()
	   {
		   if($_POST)
		   {
			   //cost
			   $costtype = $_POST['costtype'];
			   $balance = $_POST['balance'];
			   $comments = $_POST['comments'];
			   if($comments==""||$comments==NULL)
			   {
				   $comments="";
			   }
			   
			 
			  $newcost = array(
			  		'ProductName'=>$costtype,
					'Suppliers'=>'MeatFactory',
					'Price'=>$balance,
					'Nums'=>'0',
					'Unit'=>'kg',
					'TotalPric'=>$balance,
					'IntoDate'=>date('Y-m-d'),
					'Comment'=>$comments
			  );
			  
			  $this->db->insert('intolibrary', $newcost); 

			  //return back
			  echo "<script language='javascript'> alert('添加成本成功'); </script>";
			  header("Location:".base_url()."page?page=accountant_management");
		   }
	   }


}
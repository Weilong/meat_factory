<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <!-- Bootstrap -->
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <link href="./asset/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./asset/css/meat_factory.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" media="screen" href="./asset/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="./asset/css/bootstrap-responsive.css">
    <script src="./asset/js/jquery-1.7.2.js"></script>
	<script src="./asset/js/bootstrap.min.js"></script>
  </head>
   <style>
		body{
			margin:auto 0px;
		}
		.content{
			width:100%;
			height:auto;
			position:relative;
			top:0px;
			left:0px;
		}
		.span10
		{
			width:83%;
		}
		/* order management */
		.add_order,.order_view
		{
			width:100%;
			height:auto;
			overflow:hidden;
		}
		.order_view
		{
			height:0px;
		}
		/* add new client form, client detail form, client payment detail form */
		.add_new_client, .client_detail, .client_payment_detail
		{
			width:100%;
			height:auto;
			top:0px;
			left:0px;
            overflow:hidden;
		}
		 .client_detail, .client_payment_detail
		 {
			 height:0px;
		 }
		/* add new supplier form, supplier detail form*/
		.add_new_supplier, .supplier_detail
		{
			width:100%;
			height:auto;
			top:0px;
			left:0px;
            overflow:hidden;
		}
		 .supplier_detail
		 {
			 height:0px;
		 }

		 /* delivery address style */
		 .delivery_address
		 {
			 width:100%;
			 height:auto;
			 overflow:hidden;
			 padding-right:20px;
		 }
		 /* view payment, viewbalance, cost */
		.viewpayment,.costpayment,.viewbalance
		{
			width:100%;
			height:auto;
			overflow:hidden;
		}
		.costpayment,.viewbalance
		{
			height:0px;
		}
		.titlebar
		{
			width:100%;
			height:40px;
		}
		.company,.retail
		{
			line-height:20px;
			width:40px;
			float:left;
			margin-left:10px;
			padding-left:12px;
			background:#000;
			color:#FFF;
			cursor:pointer;
		}
		.retail
		{
			background:#fff;
			color:#000;
		}
		.paymentcontrol, .viewpaymentlist, .companypayment, .retailpayment
		{
			width:100%;
			height:auto;
			overflow:hidden;
			margin-top:5px;
		}
		.paymentcontrol
		{
			height:226px;
		}
		.retailpayment
		{
			height:0px;
		}
	</style>
  <body>
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
        	<a class="brand" href="#">订单管理系统</a>
       		<div class="navbar-content">
          		<ul class="nav pull-right">
              		<li class="span2 offset2"><a href="#">Logout</a></li>
          		</ul>
       		</div>
      	</div>
      </div>
    </div>

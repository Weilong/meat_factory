<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <!-- Page for add_Client, Client_pay_detail, and Client_detail -->
    <!-- Bootstrap -->
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
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
			position:absolute;
			top:50px;
			left:0px;
		}
		.span10
		{
			width:83%;
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
		 /* delivery address style */
		 .delivery_address
		 {
			 width:100%;
			 height:auto;
			 overflow:hidden;
			 padding-right:20px;
		 }
	</style>
  <body>
     <div class="content">
         <div class = "row" >
            <div class = "span2">
              <div class="navbar">
                <div class="navbar-inner" style="width:120px;">
                  <ul class="nav nav-stacked">
                    <li><a href="#">订单管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">进货管理</a></li>
                    <li class="divider"></li>
                    <li><a href="#">账目管理</a></li>
                    <li class="divider"></li>
                    <li><a href="#">客户管理</a>
                    	<ul>
                        	<li><a href="#" id="add_new_client">添加新客户</a></li>
                            <li><a href="#" id="client_detail">客户详细信息</a></li>
                            <li><a href="#" id="client_payment_detail">欠费预览</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">供应商管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">商品管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">报表查看</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class = "span10">
            	<div class="title_label"><h3>添加新客户</h3>
                </div>
            	<div class="add_new_client">
                	<p><h5>客户联系信息</h5></p>
                	<form method="post">
                    	<div class="connect_detail">
                        	<table>
                            	<tr><td>公司全称：<input type="text" name="current_name"></td><td rowspan="3" width="20"></td><td>公司简称：<input type="text" name="short_name"></td></tr>
                                <tr><td>手机：<input type="text" name="mobile"></td><td>客户类型：<input type="text" name="member_type" readonly value="Client"></td></tr>
                                <tr><td>传真：<input type="text" name="fax_number"></td><td>座机：<input type="text" name="phone"></td></tr>
                                <tr><td colspan="3">电子邮箱：<input type="text" name="email_address"></td>
                            </table>
                        </div>
                        <p><h5>客户地址</h5></p>
                        <div class="address">
                        		地址：<input type="text" name="client_place" size="100px"><br/>
                                地区：<input type="text" name="client_region" size="25px" ><br/>
                                邮编：<input type="text" name="client_code" size="10px"><br/>
                                城市：<input type="text" name="client_city" size="50px"><br/>
                                州： <select name="client_states">
                                		<option value="">NSW</option>
                                        <option value="">ACT</option>
                                        <option value="">VIC</option>
                                	</select>
                                    <br/>
                                区域：<select name="area">
                                </select>
                        </div>
                        <p><h5>送货地址和公司地址是否相同</h5><input type="checkbox" id="check_delivery_address"></p>
                        <div class="delivery_address">
                             
                            	地址：<input type="text" name="delivery_place" size="100px"><br/>
                                地区：<input type="text" name="delivery_region" size="25px" ><br/>
                                邮编：<input type="text" name="delivery_code" size="10px"><br/>
                                城市：<input type="text" name="delivery_city" size="50px"><br/>
                                州： <select name="delivery_states">
                                		<option value="">NSW</option>
                                        <option value="">ACT</option>
                                        <option value="">VIC</option>
                                	</select>
                        </div>
                        <input type="button" id="submit_button" value="保存">
                        <input type="reset" value="重填">
                    </form>
                </div>
                <div class="client_detail">2
                </div>
                <div class="client_payment_detail">3
                </div>
                <script language="javascript" type="text/javascript">
					$(document).ready(function(e) {
                        $('#add_new_client').click(function(e) {
							$('.client_detail').animate({height:'0px'},"fast");
						    $('.client_payment_detail').animate({height:'0px'},"fast");
							$('.add_new_client').animate({height:'100%'},"slow");					
                        });
						$('#client_detail').click(function(e) {
                            $('.add_new_client').animate({height:'0px'},"fast");
							$('.client_payment_detail').animate({height:'0px'},"fast");
							$('.client_detail').animate({height:'100%'},"slow");
                        });
						$('#client_payment_detail').click(function(e) {
						    $('.add_new_client').animate({height:'0px'},"fast");
							$('.client_detail').animate({height:'0px'},"fast");
                            $('.client_payment_detail').animate({height:'100%'},"slow");
                        });
						
                    });
				</script>
            </div>
         </div>
     </div>
  </body>
</html>
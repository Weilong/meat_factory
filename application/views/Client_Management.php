<div class="content">
         <div class = "row" >
            <div class = "left-nav">
              <div class="navbar">
                <div class="navbar-inner" style="width:120px;">
                  <ul class="nav nav-stacked">
                    <li><a href="<?php echo base_url().'page?page=order_management' ?>">订单管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=delivery_view' ?>">进货管理</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=accountant_management' ?>">账目管理</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=client_management' ?>">客户管理</a>
                    	<ul>
                        	<li><a href="#" id="add_new_client">添加新客户</a></li>
                            <li><a href="#" id="client_detail">客户详细信息</a></li>
                            <li><a href="#" id="client_payment_detail">欠费预览</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=supplier_management' ?>">供应商管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=product_management' ?>">商品管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=income_view' ?>">报表查看</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class = "main-content">
            	<div class="add_new_client">
                	<p><h3>添加新客户</h3></p>
                	<p><h5>客户联系信息</h5></p>
                	<form method="post">
                    	<div class="connect_detail">
                        	<table>
                            	<tr><td>公司全称：<input type="text" name="current_name"></td><td rowspan="3" width="20"></td><td>公司简称：<input type="text" name="short_name"></td></tr>
                                <tr><td>手机：<input type="text" name="mobile"></td><td>客户类型：<input type="text" name="member_type" readonly value="Client"></td></tr>
                                <tr><td>传真：<input type="text" name="fax_number"></td><td>座机：<input type="text" name="phone"></td></tr>
                                <tr><td colspan="3">电子邮箱：<input type="text" name="email_address"></td></tr>
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
                        <input type="button" class="btn btn-primary" id="submit_button" value="保存">
                        <input type="reset" class="btn btn-danger" value="重填">
                    </form>
                </div>
                <div class="client_detail">
                	<p><h3>客户信息</h3></p>
                    <form method="post">
                    	所属地区<select name="client_region">
                        </select>
                        <input type="submit" value="查询">
                    </form>
                    <form method="post">
                    <table class='client_name'>
                    	  test
                    </table>
                    	<input type="button" class="btn btn-primary" value="更新送货区域">   <input type="button" class="btn btn-danger" value="删除所选">
                    </form>
                </div>
                <div class="client_payment_detail">
                	<p><h3>客户付款/欠费情况</h3></p>
                	<form method="post">
                    	<select name="client_name">
                        </select>
                        <input type="button" class="btn btn-primary" value="查询">
                    </form>
                    <table class="client_payment_list">
                    </table>
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
						$('#check_delivery_address').click(function(e) {
                            if($('#check_delivery_address').attr('checked'))
							{
								$('.delivery_address').animate({height:'0px'},'fast');
							}
							else if(!$('#check_delivery_address').attr('checked'))
							{
								$('.delivery_address').animate({height:'100%'},'fast');
							}
                        });
                    });
				</script>
            </div>
         </div>
</div>

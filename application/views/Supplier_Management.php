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
                    <li><a href="#">账目管理</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=client_management' ?>">客户管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=supplier_management' ?>">供应商管理</a>
                    	<ul>
                        	<li><a href="#" id="add_new_supplier">添加新供应商</a></li>
                            <li><a href="#" id="supplier_detail">供应商详细信息</a></li>
                        </ul>
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
            	<div class="add_new_supplier">
                	<p><h3>添加新供应商</h3></p>
                	<p><h5>供应商联系信息</h5></p>
                	<form method="post" id="newsupplier" action="add_supplier/add_new_supplier" >
                    	<div class="connect_detail">
                        	<table>
                            	<tr><td>公司全称：<input type="text" name="current_name"></td><td rowspan="3" width="20"></td><td>公司简称：<input type="text" name="short_name"></td></tr>
                                <tr><td>手机：<input type="text" name="mobile"></td><td>客户类型：<input type="text" name="member_type" readonly value="Supplier"></td></tr>
                                <tr><td>传真：<input type="text" name="fax_number"></td><td>座机：<input type="text" name="phone"></td></tr>
                                <tr><td colspan="3">电子邮箱：<input type="text" name="email_address"></td>
                            </table>
                        </div>
                        <p><h5>供应商地址</h5></p>
                        <div class="address">
                        		地址：<input type="text" id="client_place" name="client_place" size="100px"><br/>
                                地区：<input type="text" id="client_region" name="client_region" size="25px" ><br/>
                                邮编：<input type="text" id="client_code" name="client_code" size="10px"><br/>
                                城市：<input type="text" id="client_city" name="client_city" size="50px"><br/>
                                州： <select id="client_states" name="client_states">
                                		<option value="NSW">NSW</option>
                                        <option value="ACT">ACT</option>
                                        <option value="VIC">VIC</option>
                                        <option value="TAS">TAS</option>
                                        <option value="QLD">QLD</option>
                                        <option value="NT">NT</option>
                                        <option value="SA">SA</option>
                                        <option value="WA">WA</option>
                                	</select>
                                    <br/>
                                区域：<select name="area" id="area">
                                			<option value="area1">Area1</option>
                                            <option value="area2">Area2</option>
                                            <option value="area3">Area3</option>
                                            <option value="area4">Area4</option>
                                            <option value="area5">Area5</option>
                                            <option value="area6">Area6</option>
                                            <option value="area7">Area7</option>
                                            <option value="area8">Area8</option>
                                            <option value="area9">Area9</option>
                                            <option value="area10">Area10</option>
                                </select>
                        </div>
                        <button type="button" class="btn btn-primary" id='addsupplier'>保存</button>
                        <button type="reset" class="btn">清空</button>
                    </form>
                </div>
                <script language="javascript" type="text/javascript">
					/*
						control and confirm the new client detail and address for delivery
						if some blank area is Null then alert to ask user to fulfill them
						if everything is done, the client data will be posted to controller
					*/
					$(document).ready(function(e) {
                       $('#addsupplier').click(function(e) {
						   		var full_name = $('#current_name').val();
								var short_name = $('#short_name').val();
								var mobile = $('#mobile').val();
								var member_type=$('#member_type').val();
								var fax_num = $('#fax_number').val();
								var phone = $('#phone').val();
								var email = $('#email_address').val();
								var client_place = $('#client_place').val();
								var client_region = $('#client_region').val();
								var client_code = $('#client_code').val();
								var client_city = $('#client_city').val();
								var client_state = $('#client_states').val();
								var client_area = $('#area').val();
								if(full_name==""&&short_name=="")//if full name and short name is blank then alert else ->>
								{
									alert('请填写公司名称');
								}
								else
								{
									if(phone=="")//if contact phone is blank then alert else->>
									{
										alert('请填写公司联系电话');}
									else
									{
										if(client_place==""||client_region==""||client_code==""||client_city=="")//if client address is not fulfilled then alert else ->>
										{
											alert('请填写完整的公司地址');
										}
										else
										{
											$('form#newsupplier').submit();//submit
										}
									}
								}
								
                   		 });
                    });
                </script>
                <div class="supplier_detail">
                	<p><h3>供应商信息</h3></p>
                    <div>
                        <form method="post" class="form-inline">
                        	<label>所属地区</label>
                            <select name="client_region">
                            </select>
                            <button type="submit" class="btn btn-primary">查询</button>
                        </form>
                    </div>
                    <div>
                        <form method="post">
                        <table class='client_name table table-striped table-hover'>
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>公司简称</th><!-- click to view detail and edit -->
                          		<th>公司全称</th>
                                <th>公司地址</th>
                                <th>地区</th>
                                <th>电话</th>
                                <th>手机</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <th><i class="icon-edit"></i><i class="icon-trash"></i></th>
                            </tr>
                        </tbody>
                        </table>
                        	<button type="submit" class="btn btn-danger">删除</button>
                            <button type="submit" class="btn btn-primary">保存更改</button>
                        </form>
                    </div>
                </div>
                <script language="javascript" type="text/javascript">
					$(document).ready(function(e) {
                        $('#add_new_supplier').click(function(e) {
							$('.supplier_detail').animate({height:'0px'},"fast");
							$('.add_new_supplier').animate({height:'100%'},"slow");					
                        });
						$('#supplier_detail').click(function(e) {
                            $('.add_new_supplier').animate({height:'0px'},"fast");
							$('.supplier_detail').animate({height:'100%'},"slow");
                        });
                    });
				</script>
            </div>
         </div>
     </div>
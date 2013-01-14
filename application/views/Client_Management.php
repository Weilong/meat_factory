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
                	<form method="post" id="newclient" action="" >
                    	<div class="connect_detail">
                        	<table>
                            	<tr><td>公司全称：<input type="text" id="current_name" name="current_name"></td><td rowspan="3" width="20"></td><td>公司简称：<input type="text" id="short_name" name="short_name"></td></tr>
                                <tr><td>手机：<input type="text" id="mobile" name="mobile"></td><td>客户类型：<input type="text" name="member_type" id="member_type" readonly value="Client"></td></tr>
                                <tr><td>传真：<input type="text" id="fax_number" name="fax_number"></td><td>座机：<input type="text"id="phone" name="phone"></td></tr>
                                <tr><td colspan="3">电子邮箱：<input type="text" id="email_address" name="email_address"></td></tr>
                            </table>
                        </div>
                        <p><h5>客户地址</h5></p>
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
                                区域：<select id="area" name="area">
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
                                </select>
                        </div>
                        <p><h5>送货地址和公司地址是否相同（打钩为确认一致）</h5>     <input type="checkbox" id="check_delivery_address" name="check_delivery_address">
                        </p>
                        <div class="delivery_address">
                             
                            	地址：<input type="text" id="delivery_place" name="delivery_place" size="100px"><br/>
                                地区：<input type="text" id="delivery_region" name="delivery_region" size="25px" ><br/>
                                邮编：<input type="text" id="delivery_code" name="delivery_code" size="10px"><br/>
                                城市：<input type="text" id="delivery_city" name="delivery_city" size="50px"><br/>
                                州： <select id="delivery_states" name="delivery_states">
                                		<option value="NSW">NSW</option>
                                        <option value="ACT">ACT</option>
                                        <option value="VIC">VIC</option>
                                        <option value="TAS">TAS</option>
                                        <option value="QLD">QLD</option>
                                        <option value="NT">NT</option>
                                        <option value="SA">SA</option>
                                        <option value="WA">WA</option>
                                	</select>
                        </div>
                        <button type="button" class="btn btn-primary" id='addclient'>保存</button>
                        <button type="reset" class="btn">清空</button>
                    </form>
                </div>
                <script language="javascript" type="text/javascript">
					$(document).ready(function(e) {
                       $('#addclient').click(function(e) {
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
								if($('#check_delivery_address').attr('checked'))
								{
									var delivery_place = $('#delivery_place').val(client_place);
									var delivery_region = $('#delivery_region').val(client_region);
									var delivery_code = $('#delivery_code').val(client_code);
									var delivery_city = $('#delivery_city').val(client_city);
									var delivery_states = $('#delivery_states').val(client_state);
								}
								// var txt = '{"newclient":[{"fullname":full_name,"shortname":short_name,"mobile":mobile,"membertype":member_type,"faxnum":fax_num,"phone":phone,"email":email,"clientplace":client_place,"clientregion":client_region,"clientcode":client_code,"clientcity":client_city,"client_state":client_state,"clientarea":client_area,"deliveryplace":delivery_place,"deliveryregion":delivery_region,"deliverycode":delivery_code,"deliverycity":delivery_city,"delivery_states":delivery_states}]}';		
								$('form#newclient').submit();
                   		 });
                    });
                </script>
                <div class="client_detail">
                	<p><h3>客户信息</h3></p>
                    <div>
                        <form class="form-inline" method="post">
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
                                <th>送货区域</th>
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
                <div class="client_payment_detail">
                	<p><h3>客户付款/欠费情况</h3></p>
                	<form class="form-inline" method="post">
                    	<select name="client_name">
                        </select>
                        <input type="button" class="btn btn-primary" value="查询">
                    </form>
                    <table class="client_payment_list table table-striped table-hover">
                    	<tr><th>公司名</th><th width="10">
                        	<th>3个月前（90天）</th><th width="10">
                            <th>2个月前（60-90天）</th><th width="10">
                            <th>1个月前（30-60天）</th><th width="10">
                            <th>本月（今天-30天)</th><th width="10">
                            <th>今日</th><th width="10">
                            <th>总计</th>
                        </tr>
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

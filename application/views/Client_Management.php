<div class="content">
         <div class = "row" >
            <div class = "left-nav">
              <div class="navbar">
                <div class="navbar-inner" style="width:120px;">
                  <ul class="nav nav-stacked">
                    <li><a href="<?php echo base_url().'page?page=order_management' ?>">订单管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=delivery_view_search' ?>">进货管理</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=accountant_login' ?>">账目管理</a></li>
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
            <div class = "main-content" style="width:auto;">
            	<div class="add_new_client">
                	<p><h3>添加新客户</h3></p>
                	<p><h5>客户联系信息</h5></p>
                	<form method="post" id="newclient" action="add_client/add_new_client" >
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
					/*
						control and confirm the new client detail and address for delivery
						if some blank area is Null then alert to ask user to fulfill them
						if everything is done, the client data will be posted to controller
					*/
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
									$('#delivery_place').attr('readonly','readonly');
									$('#delivery_region').attr('readonly','readonly');
									$('#delivery_code').attr('readonly','readonly');
									$('#delivery_city').attr('readonly','readonly');
								}
								else
								{
									var delivery_place = $('#delivery_place').val();
									var delivery_region = $('#delivery_region').val();
									var delivery_code = $('#delivery_code').val();
									var delivery_city = $('#delivery_city').val();
									var delivery_states = $('#delivery_states').val();
								}
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
											if(delivery_place==""||delivery_region==""||delivery_code==""||delivery_city=="")//if delivery address is not fulfilled then alert else ->>
											{
												alert('请填写完整该公司送货地址');
											}
											else
											{
												$('form#newclient').submit();//submit
											}
										}
									}
								}
								
                   		 });
                    });
                </script>
                <div class="client_detail">
                	<p><h3>客户信息</h3></p>
                    <div>
                        	<label>所属地区</label>
                            <select name="client_region" id="customer_region">
                            </select><br />
                            <button id="check_list" class="btn btn-primary">查询</button>
                    </div>
                     <script language="javascript" type="text/javascript">
									$(document).ready(function(e) {
                                        $.getJSON('client_edit/read_client_region',
											/*
												get the json data from back end
												decode json and list with select via option
											*/
											function(data){
												for (var x = 0;x<data.length;x++){
													var opt = $("<option>").appendTo("#customer_region");
													opt.text(data[x].Suburb1);
													opt.val(data[x].Suburb1);
												}
												//set the selected item to blank
												//$("#company_name").get(0).selectedIndex = -1;
											}
										);
                                    });
								</script>
                    <div>
                        <table id='results_table' class='client_name table table-striped table-hover'>
                        <thead>
                            <tr>
                                <!-- <th><input title="select all" id="all" type="checkbox"></th> -->
                                <th>公司全称</th><!-- click to view detail and edit -->
                                <th>公司简称</th>
                                <th>公司地址</th>
                                <th>地区</th>
                                <th>电话</th>
                                <th>手机</th>
                                <th>送货区域</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                            <button id="delete_select" class="btn btn-danger">删除</button>
                            <button id="save_change" class="btn btn-primary">保存更改</button>
                    </div>
                    <script language="javascript" type="text/javascript">
						/*
							list client info
							
						*/
						$('#check_list').click(function(e) {
											/*
												check list button is pressed
												if region select is changed get value 
												get the customer detail with this region   
											*/
											var region = $('#customer_region').val();
											var obj = {
												type: 'post',
												url : 'client_edit/client_list',
												data : {regionplace:region},
												success: function(client_data){
													var obj = eval("("+client_data+")");
													var x=0; //for loop with the json file length
													$('#results_table td').remove();
													for(x=0;x<obj.length;x++){
														
														var tr = $("<tr>").addClass(obj[x].id).appendTo($("#results_table tbody"));
														var companyid=obj[x].id;
															//$("<input type=checkbox>").addClass("delete"+x).addClass("input-small").appendTo($("<td>").appendTo(tr));
															$("<td>").text(obj[x].companyname).appendTo(tr);
															$("<td>").text(obj[x].contactname).appendTo(tr);
															$("<td>").text(obj[x].address).appendTo(tr);
															$("<td>").text(obj[x].region).appendTo(tr);
															$("<td>").text(obj[x].phone).appendTo(tr);
															$("<td>").text(obj[x].mobile).appendTo(tr);
															$("<td>").text(obj[x].area).appendTo(tr);
															$("<i title='edit'>").addClass("icon-edit").appendTo($("<button class='edit_btn' title='edit' id='"+companyid+"' data-toggle='modal' data-target='#myModal'>").appendTo($("<td>").appendTo(tr)));
															$("<i title='delete'>").addClass("icon-trash").appendTo($("<button class='delete_btn' title='delete' id="+companyid+">").appendTo($("<td>").appendTo(tr)));
													}
												}
											};
											$.ajax(obj);
                         });
					</script>
                </div>
                <div class="client_payment_detail">
                	<p><h3>客户付款/欠费情况</h3></p>
                    	<select name="client_name">
                        </select>
                        <input type="button" class="btn btn-primary" value="查询">
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
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-body">
         <div class="client_supplier">
            <!-- <button id='close_btn_supplier' class="close" ><i class="icon-remove"></i></button> -->
            <div class="client_supplier_detail">
                <table class="client_supplier_detail">
                        <tr><td>公司ID：</td><td><input type="text" name='company_id' id='company_id' readonly="readonly"/></td></tr>
                        <tr><td>公司名称：</td><td><input type="text" name='company_name' id="company_name" /></td></tr>
                        <tr><td>公司简称：</td><td><input type="text" name='company_contactname' id="company_contactname"/></td></tr>
                        <tr><td>公司类型：</td><td><select name='company_type' id="company_type">
                                                    <option value="Client">Client</option>
                                                    <option value="Supplier">Supplier</option>
                                                 </select>
                                        </td></tr>
                        <tr><td>公司地址：</td><td><input type="text" name='company_address'id="company_address" /></td></tr>
                        <tr><td>地区：</td><td><input type="text" name='company_suburb' id="company_suburb"/></td></tr>
                        <tr><td>城市：</td><td><input type="text" name='company_city' id="company_city"/></td></tr>
                        <tr><td>洲：</td><td><input type="text" name='company_state'id="company_state" /></td></tr>
                        <tr><td>国家：</td><td><input type="text" name='company_country'id="company_country" /></td></tr>
                        <tr><td>邮编：</td><td><input type="text" name='company_postcode' id="company_postcode"/></td></tr>
                        <tr><td>电话：</td><td><input type="text" name='company_phone'id="company_phone" /></td></tr>
                        <tr><td>手机：</td><td><input type="text" name='company_mobile'id="company_mobile" /></td></tr>
                        <tr><td>传真号：</td><td><input type="text" name='company_fax'id="company_fax" /></td></tr>
                        <tr><td>邮箱：</td><td><input type="text" name='company_email' id="company_email"/></td></tr>
                        <tr><td colspan="2"><h4>送货地址</h4></td></tr>
                        <tr><td>地址：</td><td><input type="text" name='delivery_address'id="delivery_address" /></td></tr>
                        <tr><td>地区：</td><td><input type="text" name='delivery_suburb' id="delivery_suburb"/></td></tr>
                        <tr><td>城市：</td><td><input type="text" name='express_city' id="express_city" /></td></tr>
                        <tr><td>洲：</td><td><input type="text" name='delivery_state'id="delivery_state" /></td></tr>
                        <tr><td>国家：</td><td><input type="text" name='delivery_country'id="delivery_country" /></td></tr>
                        <tr><td>邮编：</td><td><input type="text" name='delivery_postcode' id="delivery_postcode"/></td></tr>
                        <tr><td>区域：</td><td><select name="delivery_area" id="delivery_area">
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
                                              </select></td></tr>
                </table>
            </div>
          
        </div>
	</div>
    <div class="modal-footer"> <button id="save_change" class="btn btn-primary">保存</button> </div>
</div>
<script language="javascript" type="text/javascript">
	//get supplier detail and edit
	$(document).ready(function(e) {
							$('button.edit_btn').live(
								"click", function(e)
								{
									var company = $(this).attr('id');
									var ajaxobj = {
										type:'post',
										url : 'client_edit/client_detail',
										data:{companyid:company},
										success:function(data){
											//$('.client_supplier').animate({width:'50%',height:'50%',opacity:'1'},'slow');
											//$('.client_supplier').css('visibility','visible');
											$('#mymodal').modal({show:true});
											var company = eval("("+data+")");
											var i=0; //for loop with json file length
											for(i=0;i<company.length;i++)
											{
												/*
													get all of company data and convert to string
													define the variable 
													create row and column
												*/
												var company_id = company[i].id;
												var company_name = company[i].companyname;
												var companycontactname = company[i].contactname;
												var companytype=company[i].customertype;
												var companyaddress=company[i].address;
												var deliveryaddress = company[i].deliveryaddress;
												var companysuburb=company[i].suburb;
												var deliverysuburb = company[i].deliverysuburb;
												var companycity=company[i].city;
												var expresscity = company[i].expresscity;
												var companystate=company[i].state;
												var deliverystate = company[i].deliverystate;
												var companycountry=company[i].country;
												var deliverycountry = company[i].deliverycountry;
												var companypostcode=company[i].postcode;
												var deliverypostcode = company[i].deliverypostcode;
												var companytelephone=company[i].telephone;
												var companyfax=company[i].fax;
												var companymobile=company[i].mobile;
												var companyemail=company[i].email;
												var companyarea = company[i].area;
												$("#company_id").val(company_id);
												$("#company_name").val(company_name);	
												$("#company_contactname").val(companycontactname);
												$("#company_type").val(companytype);
												$("#company_address").val(companyaddress);
												$("#company_suburb").val(companysuburb);
												$("#company_city").val(companycity);
												$("#company_state").val(companystate);
												$("#company_country").val(companycountry);
												$("#company_postcode").val(companypostcode);
												$("#delivery_address").val(deliveryaddress);
												$("#delivery_suburb").val(deliverysuburb);
				                                $("#express_city").val(expresscity);
												$("#delivery_state").val(deliverystate);
												$("#delivery_country").val(deliverycountry);
												$("#delivery_postcode").val(deliverypostcode);
												$("#company_phone").val(companytelephone);
												$("#company_fax").val(companyfax);
												$("#company_mobile").val(companymobile);
												$("#company_email").val(companyemail);
												$("#delivery_area").val(companyarea);			
											}
										}
									};
									$.ajax(ajaxobj);
								}
							);
							$('button#save_change').click(function(e) {
                                    var companyid= $('#company_id').val();
                                    var companyname= $('#company_name').val();
                                    var companycontact= $('#company_contactname').val();
                                    var companytype= $('#company_type').val();
                                    var companyaddress= $('#company_address').val();
                                    var companysuburb= $('#company_suburb').val();
                                    var companycity= $('#company_city').val();
                                    var companystate= $('#company_state').val();
                                    var companycountry= $('#company_country').val();
                                    var companypostcode= $('#company_postcode').val();
                                    var companyphone= $('#company_phone').val();
                                    var companyfax= $('#company_fax').val();
                                    var companymobile= $('#company_mobile').val();
                                    var companyemail= $('#company_email').val();
									var deliveryaddress = $('#delivery_address').val();
									var deliverysuburb = $('#delivery_suburb').val();
									var deliverycity = $('#express_city').val();
									var deliverystate = $('#delivery_state').val();
									var deliverycountry = $('#delivery_country').val();
									var deliverypostcode = $('#delivery_postcode').val();
									var deliveryarea = $('#delivery_area').val();
									var txt = "{'id':'"+companyid+"','name':'" + companyname+"','contact':'" + companycontact+"','type':'" + companytype+"','address':'" + companyaddress+"','suburb':'" + companysuburb+"','city':'" + companycity+"','state':'" + companystate+"','country':'" + companycountry+"','postcode':'" + companypostcode+"','phone':'" + companyphone+"','fax':'" + companyfax+"','mobile':'" + companymobile+"','email':'" + companyemail+"','address2':'" + deliveryaddress+"','suburb2':'" + deliverysuburb+"','city2':'" + deliverycity+"','state2':'" + deliverystate+"','country2':'" + deliverycountry+"','postcode2':'" + deliverypostcode+"','area':'" + deliveryarea+"'}";
									var jsonArray = eval('('+txt+')');
									var ajaxobj={
										type:'post',
										datatype:'json',
										url:'client_edit/client_editing',
										data:{clientcompany:jsonArray
											},
										success:function(){
											//change succeed and close
											alert('Change Succeed');
											$('.client_supplier').animate({
								   					width:'0px',height:'0px',opacity:'0'},'slow'
											);
										}
									};
									$.ajax(ajaxobj);
                            });
							$('button.delete_btn').live(
								"click",function(){
									var confirmalert = confirm("Are you want to remove it");
									if(confirmalert == true)
									{
										/* confirm remove client or supplier */
										var companyid = $(this).attr('id');
										var ajaxobj = {
											type:'post',
											url:'client_edit/client_delete',
											data:{company:companyid},
											success:function(){
												$('tr.'+companyid+' td').remove();
											}
										};
										$.ajax(ajaxobj);
										//$('#results_table td').remove();
									}
								}
							);

							$('input#all').click(function(e) {
								if($('input#all').attr('checked'))
								{
                                	$('input').attr('checked',true);
								}
								else
								{
									$('input').attr('checked',false);
								}
                            });
							$('button.close').click(function(e) {
                               $('.client_supplier').animate({
								   	width:'0px',height:'0px',opacity:'0'},'slow');
                            });
							$('button#close').click(function(e) {
                                $('.client_supplier').animate({
									width:'0px',height:'0px',opacity:'0'},'slow');
                            });
	});
</script>
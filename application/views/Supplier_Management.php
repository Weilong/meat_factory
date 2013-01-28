
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
            <div class = "main-content" style="width:auto;">
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
                                			<option value="  "></option>
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
                        <button class="btn btn-primary" id='addsupplier'>保存</button>
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
                        	<label>供应商</label>
                            <select name="supplier_region" id="supplier_region">
                            	<option value="all">ALL</option>
                                
                            </select>
                            <button id="check_list" class="btn btn-primary">查询</button>
                    </div>
                    <script language="javascript" type="text/javascript">
									$(document).ready(function(e) {
                                        $.getJSON('client_edit/read_supplier_region',
											/*
												get the json data from back end
												decode json and list with select via option
											*/
											function(data){
												for (var x = 0;x<data.length;x++){
													var opt = $("<option>").appendTo("#supplier_region");
													opt.text(data[x].CompanyName);
													opt.val(data[x].CompanyName);
												}
												//set the selected item to blank
												//$("#company_name").get(0).selectedIndex = -1;
											}
										);
                                    });
								</script>
                    <div>
                        <table id="results_table" class='client_name table table-striped table-hover'>
                            <thead>
                                <tr>
                                    <!-- <th><input title="select all" id="all" type="checkbox"></th> --> 
                                    <th>公司全称</th><!-- click to view detail and edit -->
                                    <th>公司简称</th>
                                    <th>公司地址</th>
                                    <th>地区</th>
                                    <th>电话</th>
                                    <th>手机</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        	<button  id="delete_select" class="btn btn-danger">删除</button>
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
 <div class="client_supplier">
 	<button class="close" ><i class="icon-remove"></i></button>
	<div class="client_supplier_detail">
    	<table class="client_supplier_detail">
        	<thead>
            </thead>
            <tbody>
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
                <tr><td><button id="save_change" class="btn btn-primary">保存</button>&nbsp; &nbsp;<button id="close" class="btn btn-danger">关闭</button></td></tr>
            </tbody>
        </table>
        
    </div>
   
</div>
 <script language="javascript" type="text/javascript">
						$(document).ready(function(e) {
                            $('button#check_list').click(function(e) {
											/*
												supplier list button is pressed
												if region select is changed get value 
												get the customer detail with this region   
											*/
											var companyname = $('#supplier_region').val();
											var ajaxobj = {
												type: 'post',
												url : 'client_edit/supplier_list',
												data : {suppliername:companyname},
												success: function(supplier_data){
													var obj = eval("("+supplier_data+")");
													var x=0; //for loop with the json file length
													$('#results_table td').remove();
													for(x=0;x<obj.length;x++){
														var tr = $("<tr>").addClass(obj[x].id).appendTo($("#results_table tbody"));
														var companyid=obj[x].id;
														var company = obj[x].companyname;
															//$("<input type=checkbox title="+company+" "+"id="+companyid+">").addClass("delete"+x).addClass("input-small").appendTo($("<td>").appendTo(tr));
															$("<td>").text(obj[x].companyname).appendTo(tr);
															$("<td>").text(obj[x].contactname).appendTo(tr);
															$("<td>").text(obj[x].address).appendTo(tr);
															$("<td>").text(obj[x].region).appendTo(tr);
															$("<td>").text(obj[x].phone).appendTo(tr);
															$("<td>").text(obj[x].mobile).appendTo(tr);
															$("<i id="+companyid+">").addClass("icon-edit").appendTo($("<button class='edit_btn' title='edit' id="+companyid+">").appendTo($("<td>").appendTo(tr)));
															$("<i title='delete'>").addClass("icon-trash").appendTo($("<button class='delete_btn' title='delete' id="+companyid+">").appendTo($("<td>").appendTo(tr)));
													}
												}
											};
											$.ajax(ajaxobj); 
                        	});
						   //get supplier detail and edit
							$('button.edit_btn').live(
								"click", function(e)
								{
									var company = $(this).attr('id');
									var ajaxobj = {
										type:'post',
										url : 'client_edit/supplier_detail',
										data:{companyid:company},
										success:function(data){
											$('.client_supplier').animate({width:'50%',height:'50%',opacity:'1'},'slow');
											$('.client_supplier').css('visibility','visible');
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
												var companysuburb=company[i].suburb;
												var companycity=company[i].city;
												var companystate=company[i].state;
												var companycountry=company[i].country;
												var companypostcode=company[i].postcode;
												var companytelephone=company[i].telephone;
												var companyfax=company[i].fax;
												var companymobile=company[i].mobile;
												var companyemail=company[i].email;
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
												$("#company_phone").val(companytelephone);
												$("#company_fax").val(companyfax);
												$("#company_mobile").val(companymobile);
												$("#company_email").val(companyemail);				
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
									var txt = "{'id':'"+companyid+"','name':'" + companyname+"','contact':'" + companycontact+"','type':'" + companytype+"','address':'" + companyaddress+"','suburb':'" + companysuburb+"','city':'" + companycity+"','state':'" + companystate+"','country':'" + companycountry+"','postcode':'" + companypostcode+"','phone':'" + companyphone+"','fax':'" + companyfax+"','mobile':'" + companymobile+"','email':'" + companyemail+"'}";
									var jsonArray = eval('('+txt+')');
									var ajaxobj={
										type:'post',
										datatype:'json',
										url:'client_edit/supplier_edit',
										data:{suppliercompany:jsonArray
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
							//delete the supplier
							$('button.delete_btn').live(
								"click", function(e){
									var confirmalert = confirm("Are you want to remove it");
									if(confirmalert == true)
									{
										/* confirm remove client or supplier */
										var companyid = $(this).attr('id');
										var ajaxobj = {
											type:'post',
											url:'client_edit/supplier_delete',
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
														
							/* checkbox control
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
							*/
							//close the company detail screen
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
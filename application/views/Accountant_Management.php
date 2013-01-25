     <div class="content">
         <div class = "row" >
            <div class = "left-nav">
              <div class="navbar">
                <div class="navbar-inner" style="width:120px;">
                  <ul class="nav nav-stacked">
                    <li><a href="<?php echo base_url().'page?page=order_management' ?>">订单管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=delivery_view_search' ?>">送货管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=accountant_management' ?>">账目管理</a>
                    	<ul>
                        	<li><a href="#" id='viewpayment'>账目信息查询</a></li>
                            <li><a href="#" id='costpayment'>成本添加</a></li>
                            <li><a href="#" id='viewbalance'>余额查询</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=client_management' ?>">客户管理</a>
                    </li>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=supplier_management' ?>">供应商管理</a>
                    </li>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=product_management' ?>">商品管理</a>
                    </li>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=income_view' ?>">报表查看</a>
                    </li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class = "main-content">
            	<div class="viewpayment">
                	<p><h3>客户账户信息</h3></p>
                	<div class="titlebar">
                    	<div class="company" id="company">
                        	<h5>公司</h5>
                        </div>
                        <div class="retail" id="retail">
                        	<h5>零售</h5>
                        </div>
                    </div>
                    <div class="paymentcontrol">
                    	<div class="companypayment">
                        	<table>
                            	<tr><td><label>公司: <select id="company_name"></select></label></td></tr>
                                <tr><td><label>账户余额: <input id="balance" type='text' readonly="readonly" /></label></td></tr>
                                <tr><td><label>本次支付金额: <input id="payment_amount" type='text' /></label></td></tr>
                                <tr><td><label>支付方式: 
                                    <select id="payment_method">
                                        <option>Cash</option>
                                        <option>Cheque</option>
                                    </select>
                                </label></td></tr>
                                <tr><td><button id="company_submit" class="btn btn-primary">入账</button></td></tr>
                            </table> 
                        </div>
                        <div class="retailpayment">
                        	<table>
                            	<tr><td><label>零售金额：<input type="text" name="retailamount"  /></label></td></tr>
                                <tr><td><button id="retail_submit"  class="btn btn-primary">入账</button></td></tr>
                            </table>
                        </div>
                        <script language="javascript" type="text/javascript">
							//control the change from companypayment to retailpayment
							//control the change from retailpayment to companypayment
							$(document).ready(function(e) {
                                $('#company').click(function(e) {
									$('#company').attr('style','background:#000;color:#fff;');
									$('#retail').attr('style','background:#fff;color:#000;');
									$('.retailpayment').css('height','0px');
                                    $('.companypayment').css('height','216px');
                                });
								$('#retail').click(function(e) {
									$('#company').attr('style','background:#fff;color:#000;');
									$('#retail').attr('style','background:#000;color:#fff;');
									$('.companypayment').css('height','0px');
                                    $('.retailpayment').css('height','216px');
									
                                });
                            });
						</script>
                    </div>
                    <hr />
                    <div class="viewpaymentlist">
                    	<p><h5>明细查询</h5></p>
                        <div class="paymentlist">
                        	下单日期： <input class="datepicker" type="text" name='starttime' /> 到 <input class="datepicker" type="text" name='endtime' /><br />
                            <button id="profit_search" class="btn btn-primary">查询</button><br />
                            <hr />
                            <div class="listdetail">
                            	<table class="table table-striped table-hover">
                                    <thead>
                                        <th>PaymentID</th>
                                        <th>Date</th>
                                        <th>CompanyName</th>
                                        <th>Credit</th>
                                        <th>PayMethod</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="costpayment">
                	<p><h3>成本添加</h3></p>
                    <form method="post" id="costbalance" action="<?php echo base_url().'add_cost/add_cost_balance'; ?>" >
                      <fieldset>
                        <label>成本类型</label>
                        <select name='costtype' id='costtype'>
                            <option value="salary">Salary</option>
                            <option value="other">Other<option>
                        </select><br />
                        <label>金额</label>
                        <!-- the type of input needs to be validated at back-end or using ajax -->
                        <input type="number" name="balance" id="balance"></input><br />
                        <label>描述</label>
                        <textarea rows="5" name="comments" id="comments"></textarea><br />
                        <button type="button" id="confirm" class="btn btn-primary">确认</button>
                        <button type="reset" class="btn">清空</button>
                      </fieldset>
                    </form>
                </div>
                <script language="javascript" type="text/javascript">
					$(document).ready(function(e) {
                      	$('#confirm').click(function(e) {
                        	var costtype = $('#costtype').val();
							var balance = $('#balance').val();
							var comments = $('#comments').val();
							if(balance=="")
							{
								alert('请输入成本金额');
							}
							else
							{
								if(costtype=="other")
								{
									if(comments==""||comments==null)
									{
										alert('请输入成本描述');
									}
									else
									{
										$('form#costbalance').submit();
									}
								}
								else if(costtype=='salary')
								{
									$('form#costbalance').submit();
								}
							}
                    	});  
                    });
                </script>
                <div class="viewbalance">
                	<p><h3>客户账户余额查询</h3></p>
                    <div>
                     <form>
                      <fieldset>
                       <label><h5>公司</h5></label>
                        <select>
                            <option>test1</option>
                            <option>test2<option>
                        </select><br />
                        <button type="button" class="btn btn-primary">查询</button>
                      </fieldset>
                    </form>
                    </div>
                    <div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>公司名</th>
                                <th>描述</th>
                                <th>余额</th>
                                <th>注释</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                            </tr>
                            <tr>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                            </tr>
                            <tr>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                                <td>n/a</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
             <script language="javascript" type="text/javascript">
					$(document).ready(function(e) {
                        $('#viewpayment').click(function(e) {
							$('.viewbalance').animate({height:'0px'},"fast");
							$('.costpayment').animate({height:'0px'},"fast");
                            $('.viewpayment').animate({height:'100%'},"slow");					
                        });
						$('#costpayment').click(function(e) {
                            $('.viewpayment').animate({height:'0px'},"fast");
							$('.viewbalance').animate({height:'0px'},"fast");
                            $('.costpayment').animate({height:'100%'},"slow");
                        });
						$('#viewbalance').click(function(e) {
						    $('.viewpayment').animate({height:'0px'},"fast");
							$('.costpayment').animate({height:'0px'},"fast");
                            $('.viewbalance').animate({height:'100%'},"slow");
                        });

                        $(function() {
                            var calender = $(".datepicker").datepicker({dateFormat:"yy-mm-dd"});
                            calender.datepicker("setDate", new Date());
                        });

                        //retrieve all company names from database to display on page
                        $.getJSON("manage_order/get_company_name", function(data){

                            //loop through all items in the JSON array
                            for (var x = 0;x<data.length;x++){
                                var opt = $("<option>").appendTo("#company_name");
                                opt.text(data[x].companyname);
                            }
                            //set the selected item to blank
                            $("#company_name").get(0).selectedIndex = -1;
                        });
                    });

                    $("#company_name").change(function(){
                        var ajaxOpts={
                            type: "post",
                            dataType: "json",
                            url: "manage_accountant/get_balance",
                            data: {company_name : $("#company_name").val()},
                            success: function(data){
                                $("#balance").val(data);
                            }
                        };
                        $.ajax(ajaxOpts);
                    })

                    $("#company_submit").click(function(){
                        if ($("#company_name").val()==null){
                            alert("请选择公司");
                            return;
                        }
                        if (isNaN($("#payment_amount").val()) || $("#payment_amount").val()==""){
                            alert("请输入支付金额");
                            return;
                        }
                        var ajaxOpts={
                            type: "post",
                            dataType: "json",
                            url: "manage_accountant/add_profit",
                            data: {company_name : $("#company_name").val(),
                                    amount : $("#payment_amount").val(),
                                    method : $("#payment_method").val()},
                            success: function(data){
                                alert("入账成功！");
                                $("#balance").val(data);
                            }
                        };
                        $.ajax(ajaxOpts);
                    })
				</script>
         </div>
     </div>
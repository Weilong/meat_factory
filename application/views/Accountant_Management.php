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
                        	<form method="post">
                            	<table>
                                	<tr><td>公司： <select name="company">
                                    </select>
                                    </td></tr>
                                    <tr><td>账户余额： <input type='text' readonly="readonly" /></td></tr>
                                    <tr><td>本次支付金额： <input type='text' /></td></tr>
                                    <tr><td>支付方式： <select name="paymentoption"></select></td></tr>
                                    <tr><td><input type="button" class="btn btn-primary" id="companysubmit" value="入账" /></td></tr>
                                </table> 
                            </form>
                        </div>
                        <div class="retailpayment">
                        	<form method="post">
                            	<table>
                                	<tr><td>零售金额： <input type="text" name="retailamount"  /></td></tr>
                                    <tr><td><input type="button" class="btn btn-primary" id="retailsubmit" value="入账" /></td></tr>
                                </table>
                            </form>
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
                    <div class="viewpaymentlist">
                    	<p><h5>明细查询</h5></p>
                        <div class="paymentlist">
                        	<p><form method="post">
                            	下单日期： <input class="datepicker" type="text" name='starttime' /> 到 <input class="datepicker" type="text" name='endtime' /><br />
                                <button type="submit" class="btn btn-primary">明细查询</button><br />
                            </form></p>
                            <div class="listdetail">
                            	<table>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="costpayment">
                	<p><h3>成本预算</h3></p>
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
                    });

                    $(function() {
                        $( ".datepicker" ).datepicker();
                    });
				</script>
         </div>
     </div>
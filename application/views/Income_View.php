	<div class="content">
         <div class = "row" >
            <div class = "left-nav">
              <div class="navbar">
                <div class="navbar-inner" style="width:120px;">
                  <ul class="nav nav-stacked">
                    <li><a href="<?php echo base_url().'page?page=order_management' ?>">订单管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=delivery_view' ?>">送货管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=accountant_management' ?>">账目管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=client_management' ?>">客户管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=supplier_management' ?>">供应商管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=product_management' ?>">商品管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=income_view' ?>">报表查看</a>
                    	<ul>
                        	<li>账目信息查询</li>
                        </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class = "main-content">
            	<p><h3>公司收入支出账目信息查询</h3></p>
            	<div class="incomeview">
                	<form method="post">
                    	<table>
                        	<tr><td>产品名称 <select name="productname"></select></td>
                            	<td rowspan="2" width="30"></td><td colspan="2">日期 <input type="date" name="startdate" /> 到 <input type="date" name="enddate" /></td>
                            </tr>
                            <tr>
                            	<td>公司名称 <select name="companyname"></select></td>
                                <td>类型 <select name="incometype">
                                	<option value="0">ALL</option>
                                    <option value="1">收入</option>
                                    <option value="2">支出</option>
                                    </select>
                                </td>
                                <td>
                                	支付方式 <select name="paytype">
                                    <option value="0">ALL</option>
                                    <option value="1">Cash</option>
                                    <option value="2">Cheque</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="4" align="right">
                                	<input type="button" class="btn btn-primary" value="查询" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="searchresultview">
                	<table>
                    	<tr><th>ProductName</th><th width="10"></th>
                        	<th>CompanyName</th><th width="10"></th>
                            <th>PayMethod</th><th width="10"></th>
                            <th>Date</th><th width="10"></th>
                            <th>Debit</th><th width="10"></th>
                            <th>Credit</th><th width="10"></th>
                            <th>Comment</th>
                        </tr>
                    </table>
                </div>
            </div>
         </div>
         
     </div>
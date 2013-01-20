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
                        	<li>收入支出一览</li>
                        </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class = "main-content">
            	<p><h3>收入支出一览</h3></p>
            	<div class="incomeview">
                	<form class="form-inline" method="post">
                        <table border="0">
                            <tr>
                                <td>
                                    <label>公司名称</label> 
                                    <select name="companyname"></select>
                                    <label>日期</label> 
                                    <input class="datepicker" type="text" name="startdate" style="width:127px;" /> 
                                    到 
                                    <input class="datepicker" type="text" name="enddate" style="width:127px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>产品名称</label>
                                    <select name="productname"></select>
                                    <label>类型</label> 
                                    <select name="incometype" style="width:120px;">
                                        <option value="0">ALL</option>
                                        <option value="1">收入</option>
                                        <option value="2">支出</option>
                                    </select>
                                    <label>支付方式</label> 
                                    <select name="paytype" style="width:120px";>
                                        <option value="0">ALL</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Cheque</option>
                                    </select>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="right"><button type="submit" class="btn btn-primary">查询</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="searchresultview">
                    <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>ProductName</th>
                                        <th>CompanyName</th>
                                        <th>PayMethod</th>
                                        <th>Date</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Comment</th>
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
                </div>
                <script languange="javascript" type="text/javascript">
                    $(function() {
                        var calender = $(".datepicker").datepicker({dateFormat:"yy-mm-dd"});
                        calender.datepicker("setDate", new Date());
                    });
                </script>
            </div>
         </div>
         
     </div>
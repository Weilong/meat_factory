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
                    <li><a href="<?php echo base_url().'page?page=accountant_login' ?>">账目管理</a>
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
                                    <select id="company">
                                        <option>All</option>
                                    </select>
                                    <label>日期</label> 
                                    <input id="start_date" class="datepicker" type="text" style="width:127px;" /> 
                                    <label>到</label> 
                                    <input id="end_date" class="datepicker" type="text" style="width:127px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>产品名称</label>
                                    <select id="product">
                                        <option>All</option>
                                    </select>
                                    <label>类型</label> 
                                    <select id="income_type" style="width:120px;">
                                        <option>All</option>
                                        <option>Credit</option>
                                        <option>Debit</option>
                                    </select>
                                    <label>支付方式</label> 
                                    <select id="payment_method" style="width:120px";>
                                        <option>All</option>
                                        <option>Cash</option>
                                        <option>Cheque</option>
                                    </select>
                                    
                                </td>
                            </tr>
                        </table>
                    </form>
                    <div>
                        <button id="income_search" class="btn btn-primary">查询</button>
                        <?php $currentdate = date('Y_m_d');?>
                        <a href='<?php echo "downloadfiles/download?currenttime=".$currentdate ?>' id="downloadreportfile">导出报表</a>
                    </div>
                </div> 
                <hr />
                <div>
                    <div class="searchresultview">
                        <table id="income_table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ProductName</th>
                                    <th>CompanyName</th>
                                    <th>PayMethod</th>
                                    <th>Date</th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div align="right">
                        <label>收支总和：<input type="text" id="total_amount" class="input-small" readonly></label>
                    </div>
                </div>
                <script languange="javascript" type="text/javascript">
                    $(document).ready(function(){
                        $(function() {
                            var calender = $(".datepicker").datepicker({dateFormat:"yy-mm-dd"});
                            calender.datepicker("setDate", new Date());
                        });

                        //retrieve all company names from database to display on page
                        $.getJSON("manage_order/get_company_name", function(data){

                            //loop through all items in the JSON array
                            for (var x = 0;x<data.length;x++){
                                var opt = $("<option>").appendTo("#company");
                                opt.text(data[x].companyname);
                            }
                        });

                        $.getJSON("income_report/get_product_name", function(data){

                            //loop through all items in the JSON array
                            for (var x = 0;x<data.length;x++){
                                var opt = $("<option>").appendTo("#product");
                                opt.text(data[x].ProductName);
                            }
                        });
                       
                        $("#income_search").click(function(){

						var ajaxreport={
								 type: "post",
                                dataType: "json",
                                url:  "income_report/get_report",
                                data: {company:$("#company").val(),
                                        product:$("#product").val(),
                                        start: $("#start_date").val(),
                                        end: $("#end_date").val(),
                                        income_type: $("#income_type").val(),
                                        payment_method: $("#payment_method").val()},
							}; 
							$.ajax(ajaxreport);
                         	var ajaxOpts={
                                type: "post",
                                dataType: "json",
                                url:  "income_report/get_income",
                                data: {company:$("#company").val(),
                                        product:$("#product").val(),
                                        start: $("#start_date").val(),
                                        end: $("#end_date").val(),
                                        income_type: $("#income_type").val(),
                                        payment_method: $("#payment_method").val()},
                                success: function(data){
                                    $("#income_table tbody").empty();
                                    var income_list = data[0];
                                    var total_amount = data[1];
                                    if (income_list.length>0){
                                        $("#export").removeClass("disabled");
                                    }
                                    else{
                                        $("#export").addClass("disabled")
                                    }

                                    for (var i=0;i<income_list.length;i++){
                                        var tr=$("<tr>").appendTo($("#income_table tbody"));
                                        
                                        $("<td>").text(income_list[i].ProductName).appendTo(tr);
                                        $("<td>").text(income_list[i].CompanyName).appendTo(tr);
                                        $("<td>").text(income_list[i].PayMethod).appendTo(tr);
                                        $("<td>").text(income_list[i].Date).appendTo(tr);
                                        $("<td>").text(income_list[i].Credit).appendTo(tr);
                                        $("<td>").text(income_list[i].Debit).appendTo(tr);
                                        $("<td>").text(income_list[i].Comment).appendTo(tr);
                                    }
                                    $("#total_amount").val(total_amount);
									if(data[0]==''||data[0]==' '||data[0]==null)
									{
										$('a#downloadreportfile').attr('hidden',true);
									}
									else
									{
										$('a#downloadreportfile').attr('hidden',false);
									}
                                }
                            };
                            $.ajax(ajaxOpts); 
                        });
                    });
                </script>
            </div>
         </div>
         
     </div>
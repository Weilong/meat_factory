<div class="content">
 <div class = "row" >
    <div class = "left-nav">
      <div class="navbar">
        <div class="navbar-inner" style="width:120px;">
          <ul class="nav nav-stacked">
            <li><a href="<?php echo base_url().'page?page=order_management' ?>">订单管理</a>
                <ul>
                	<li><a href="#" id='add_order'>添加新订单</a></li>
                    <li><a href="#" id='order_view'>订单查询</a></li>
                </ul>
            </li>
            
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'page?page=delivery_view' ?>">送货管理</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'page?page=accountant_management' ?>">账目管理</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'page?page=client_management' ?>">客户管理</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'page?page=supplier_management' ?>">供应商管理</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'page?page=product_management' ?>">商品管理</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'page?page=income_view' ?>">报表查看</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class = "main-content">
        <div class="add_order">
        	<div>
            	<p><h3>添加新订单</h3></p>
            	<form method="post">
                    <fieldset>
                        <legend>订单信息</legend>
                            <div class="row">
                                <div class="span4">
                                    <label>公司</label>
                                    <select id="company_name">
                                        <option>All</option>
                                    </select>
                                    <label>送货日期</label>
                                    <input class="datepicker" type="text" >
                                    <label>产品分类</label>
                                    <select name="product_category"></select>
                                    <label>备注</label>
                                    <textarea name="comments" rows="10" cols="10"></textarea>
                                </div>
                                <div class="span5">
                                    <label>地区</label>
                                    <input type="text" id="suburb" readonly>
                                    <label>邮箱</label>
                                    <input type="text" id="email" readonly>
                                    <label>送货地址</label>
                                    <input type="text" id="delivery_address" readonly>
                                    <label>订单汇总</label>
                                    <label>总数量</label>
                                    <input type="text" id="qty" readonly>
                                    <label>总价格</label>
                                    <input type="text" id="amount" readonly>
                                    <br />
                                    <button type="submit" class="btn btn-primary">查看订单细节</button>
                                    <button type="submit" class="btn btn-primary">下单</button>
                                </div>
                            </div>
                    </fieldset>
            </div>
            <hr />
            <div>
                <form method="post">
                    <table class='client_name table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>产品ID</th><!-- click to view detail and edit -->
                            <th>产品名</th>
                            <th>单价</th>
                            <th>单位</th>
                            <th>种类</th>
                            <th>数量</th>
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
                    <!--
                        <button type="submit" class="btn btn-danger">删除</button>
                        <button type="submit" class="btn btn-primary">保存更改</button>
                    -->
                </form>
            </div>
        </div>
        <div class="order_view">
        	<p><h3>订单查询</h3></p>
        	<form class="form-inline" method="post"> 
            	<table>
                	<tr>
                        <td>下单日期 <input class="datepicker" type="text" name="start"> 到 <input class="datepicker" type="text" name="end"></td>
                    </tr>
                    <tr>
                        <td>公司 <select name="order_company"></select>  状态<select name="status"></select></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-primary">查询</button></td>
                    </tr>
                </table>
            </form>
            <table class="table table-striped">
            	<tr>
                    <th>订单号</th><th width="10"></th>
                	<th>下单日期</th><th width="10"></th>
                    <th>公司名字</th><th width="10"></th>
                    <th>送货日期</th><th width="10"></th>
                    <th>送货进程</th><th width="10"></th>
                    <th>总价</th><th width="10"></th>
                    <th>备注</th>
                </tr>
            </table>
        </div>
         <script language="javascript" type="text/javascript">
			$(document).ready(function(e) {
                $('#add_order').click(function(e) {
					$('.order_view').animate({height:'0px'},"fast");
				   	$('.add_order').animate({height:'100%'},"slow");					
                });
				$('#order_view').click(function(e) {
                    $('.add_order').animate({height:'0px'},"fast");
					$('.order_view').animate({height:'100%'},"slow");
                });

                //retrieve comments to display on page
                $.getJSON("customers/read_company_name?jsoncallback=?", function(data){
                    //loop through all items in the JSON array
                    for (var x = 0;x<data.length;x++){
                        //create a container for each comment
                        var div = $("<option>").appendTo("#company_name");
                        //add author name and comment to container
                        $("<label>").text(data[x].companyname).appendTo(div);
                        //$("<div>").addClass("comment").text(data[x].comment).appendTo(div);
                    }
                });
            });

            $(function(){
                $(".datepicker" ).datepicker();
            });

            $("#company_name").change(function(){
                var ajaxOpts={
                            type: "post",
                            dataType: "json",
                            url: "customers/read_company_information",
                            data: "&company_name="+$("#company_name").val(),
                            success: function(data){
                                $("#delivery_address").val(data.Address1);
                                $("#suburb").val(data.Suburb1);
                                $("#email").val(data.Email);
                            }
                        };
                $.ajax(ajaxOpts);
            });
		</script>
    </div>
 </div>
</div>

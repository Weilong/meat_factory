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
        	<p><h3>添加新订单</h3></p>
        	<form method="post">
            	<table>
                    <tr><td>公司 <select name="client_name"></select></td><td width="20" rowspan="4"></td>
                        <td>地区 <input type="text" name="region" readonly></td>
                    </tr>
                    <tr><td>送货日期 <input type="date" ></td><td>邮箱 <input type="text" name="email" readonly></td></tr>
                    <tr><td>产品分类 <select name="product_category"></select></td><td>送货地址 <input type="text" name="address" readonly></td></tr>
                    <tr><td>备注 <textarea name="comments" rows="10" cols="10"></textarea></td><td>
                        <table>
                            <tr><td>订单汇总</td></tr>
                            <tr><td>总数量 <input type="text" name="Qty" readonly></td></tr>
                            <tr><td>总价格 <input type="text" name="Amount" readonly></td></tr>
                            <tr><td><input type="button" class="btn btn-primary" value="查看订单细节"> <input type="button" class="btn btn-primary" value="下单"></td></tr>
                        </table>
                    </td></tr>
                </table>
            </form>
        </div>
        <div class="order_view">
        	<p><h3>订单查询</h3></p>
        	<form metho="post"> 
            	<table>
                	<tr><td>下单日期 <input type="date" name="start"> 到 <input type="date" name="end"></td><td rowspan="2"><input type="button" class="btn btn-primary" value="查询"></td></tr>
                    <tr><td>公司 <select name="order_company"></select>  状态<select name="status"></select></td></tr>
                </table>
            </form>
            <table class="table table-striped">
            	<tr><th>订单号</th><th width="10"></th>
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
            });
		</script>
    </div>
 </div>
</div>

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
            <li><a href="<?php echo base_url().'page?page=delivery_view_search' ?>">送货管理</a></li>
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
                <form>
                    <fieldset>
                        <legend>订单信息</legend>
                            <div class="row">
                                <div class="span4">
                                    <label>公司</label>
                                    <select id="company_name" name="company_name">
                                    </select>
                                    <label>送货日期</label>
                                    <input class="datepicker" type="text" name="delivery_date" >
                                    <label>产品分类</label>
                                    <select id="product_category">
                                        <option>All</option>
                                        <option>Pork</option>
                                        <option>Beef</option>
                                        <option>Lamb</option>
                                        <option>Chicken</option>
                                        <option>Duck</option>
                                        <option>Stock</option>
                                        <option>Others</option>
                                    </select>
                                    <label>备注</label>
                                    <textarea name="comments" rows="8" cols="10"></textarea>
                                </div>
                                <div class="span5">
                                    <label>地区</label>
                                    <input type="text" id="suburb" readonly>
                                    <label>邮编</label>
                                    <input type="text" id="email" readonly>
                                    <label>送货地址</label>
                                    <input type="text" id="delivery_address" readonly>
                                    <label>订单汇总</label>
                                    <label>总数量</label>
                                    <input type="text" id="total_qty" readonly>
                                    <label>总价格</label>
                                    <input type="text" id="total_price" readonly>
                                    <br />
                                    <!--<button type="submit" class="btn btn-primary">查看订单细节</button>-->
                                    <a href="#detailModal" role="button" id="detail_btn" class="btn btn-primary" data-toggle="modal">查看订单</a>
                                    <!-- Modal -->
                                    <div id="detailModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="detailModalLabel">订单细节</h3>
                                      </div>
                                      <div class="modal-body">
                                        <table  id="modal_table" class='table table-striped table-hover'>
                                            <thead>
                                                <tr>
                                                    <th>产品名</th><!-- click to view detail and edit -->
                                                    <th>描述</th>
                                                    <th>单价</th>
                                                    <th>单位</th>
                                                    <th>种类</th>
                                                    <th>数量</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                      </div>
                                      <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                      </div>
                                    </div>
                                    
                                </div>
                            </div>
                    </fieldset>
                </form>
                <div>
                    <button id="save_default" class="btn btn-primary">保存订单</button>
                    <button id="submit_order" class="btn btn-primary">下单</button>
                    <!--<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Well done!</strong>
                    </div>   -->            
                </div>
            </div>
            <hr />
            <div>
                <form method="post">
                    <table  id="results_table" class='table table-striped table-hover'>
                        <thead>
                            <tr>
                                <th>产品名</th><!-- click to view detail and edit -->
                                <th>描述</th>
                                <th>单价</th>
                                <th>单位</th>
                                <th>种类</th>
                                <th>数量</th>
                            </tr>
                        </thead>
                        <tbody>
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
                <thead>
                	<tr>
                        <th>订单号</th><th width="10"></th>
                    	<th>下单日期</th><th width="10"></th>
                        <th>公司名字</th><th width="10"></th>
                        <th>送货日期</th><th width="10"></th>
                        <th>送货进程</th><th width="10"></th>
                        <th>总价</th><th width="10"></th>
                        <th>备注</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
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

                //initialise the datepicker and set current date to the calendar
                $(function(){
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
                //autofill the related info by selecting different company
                var ajaxOpts={
                            type: "post",
                            dataType: "json",
                            url: "manage_order/get_company_data",
                            data: {company_name : $("#company_name").val()},
                            success: function(data){
                                $("#delivery_address").val(data.Address1);
                                $("#suburb").val(data.Suburb1);
                                $("#email").val(data.Postcode1);
                            }
                        };
                $.ajax(ajaxOpts);
                //filter products to display
                var ajaxOpts={
                            type: "post",
                            dataType: "json",
                            url: "manage_order/get_company_order",
                            data: {company_name : $("#company_name").val()},
                            success: function(data){
                                $("#results_table tbody").empty();
                                var total_qty = 0;
                                var total_price = 0;
                                $("#modal_table tbody").empty();
                                for (var x = 0;x<data.length;x++){

                                    var tr = $("<tr>").addClass(data[x].Category).appendTo($("#results_table tbody"));

                                    $("<td>").text(data[x].ProductName).appendTo(tr);
                                    $("<td>").text(data[x].Description).appendTo(tr);
                                    $("<td>").addClass("price").text(data[x].Price).appendTo(tr);
                                    $("<td>").text(data[x].Unit).appendTo(tr);
                                    $("<td>").text(data[x].Category).appendTo(tr);
                                    $("<input type=text>").addClass("qty_input").addClass("input-small").val(data[x].Qty).change(change_qty).appendTo($("<td>").appendTo(tr));
                                    
                                    if ($("#product_category").val()!="All"){
                                        if (!tr.hasClass($("#product_category").val())){
                                            tr.hide();
                                        }
                                    }
                                    
                                    if (data[x].Qty>0){
                                        var tr = $("<tr>").appendTo($("#modal_table tbody"));
                                        
                                        $("<td>").text(data[x].ProductName).appendTo(tr);
                                        $("<td>").text(data[x].Description).appendTo(tr);
                                        $("<td>").text(data[x].Price).appendTo(tr);
                                        $("<td>").text(data[x].Unit).appendTo(tr);
                                        $("<td>").text(data[x].Category).appendTo(tr);
                                        $("<td>").text(data[x].Qty).appendTo(tr);

                                        total_qty += parseFloat(data[x].Qty);   //Qty is float type in database
                                        total_price += (data[x].Price * data[x].Qty);
                                    }
                                }

                                $("#total_qty").val(total_qty);
                                $("#total_price").val(total_price);
                            }
                        };
                $.ajax(ajaxOpts);
            });

            $("#product_category").change(function(){
                if ($("#product_category").val()!="All"){
                    var category = $("#product_category").val();
                    //hide all tr and then show the tr with certain class
                    $("#results_table tbody tr").hide();
                    $("."+category).show();
                }
                else{
                    $("#results_table tbody tr").show();
                }
            });

            function change_qty(){
                //need validation: cant be negative, alphabet or other symbols
                if ($(this).val()=="" || $(this).val()<0){
                    $(this).val(0);
                }
                
                var total_qty=0,total_price=0;
                $("#modal_table tbody").empty();
                $("#results_table tbody tr").each(function(){
                    if ($(this).find("input").val()!=0){
                        var tr = $(this).clone();
                        var qty = parseFloat(tr.find("input").val());
                        var price = parseFloat(tr.find(".price").text());
                        total_qty += qty;
                        total_price += (price*qty);
                        tr.find("input").parent().text(qty);
                        tr.appendTo($("#modal_table tbody"));
                    }
                });

                $("#total_qty").val(total_qty);
                $("#total_price").val(total_price);
            }

            $("#save_default").click(function(){

                if ($("#company_name").val() ==null){
                    alert("请选择公司");
                    return;
                }
                var order = {},products = {};  //make it an object instead of array
                order["company_name"] = $("#company_name").val();
                $("#modal_table tbody tr").each(function(){
                    var childrens = $(this).children();
                    var product = {};

                    product["product_name"] = childrens.eq(0).text();
                    product["description"] = childrens.eq(1).text();
                    product["price"] = parseFloat(childrens.eq(2).text());
                    product["unit"] = childrens.eq(3).text();
                    product["qty"] = parseFloat(childrens.eq(5).text());
                    products[childrens.eq(0).text()] = product;
                    
                });
                order["products"] = products;
                var ajaxOpts={
                            type: "post",
                            dataType: "json",
                            url: "manage_order/save_default",
                            data: {order: JSON.stringify(order)},
                            success: function(data){
                                alert("订单已保存以备下次使用");
                            }
                    };
                $.ajax(ajaxOpts);
            });

            $("#submit_order").click(function(){
                var ajaxOpts={
                        type: "post",
                        dataType: "json",
                        url: "manage_order/add_order",
                        success: function(data){
                            
                        }
                };
            });
		</script>
    </div>
 </div>
</div>

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
            <li><a href="<?php echo base_url().'page?page=accountant_login' ?>">账目管理</a></li>
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
                                    <input class="datepicker" type="text" id="delivery_date" name="delivery_date" >
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
                                    <textarea id="comment" name="comment" rows="8" cols="10"></textarea>
                                </div>
                                <div class="span5">
                                    <label>地区</label>
                                    <input type="text" id="suburb" readonly>
                                    <label>邮编</label>
                                    <input type="text" id="postcode" readonly>
                                    <label>送货地址</label>
                                    <input type="text" id="delivery_address" readonly>
                                    <label>订单汇总</label>
                                    <label>总数量</label>
                                    <input type="text" id="total_qty" readonly>
                                    <label>总价格</label>
                                    <input type="text" id="total_price" readonly>
                                    <br />
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
                    <button id="order_confirm_btn" class="btn btn-primary">下单</button>
                    <!-- Modal -->
                    <div style="top:40%;" id="order_confirm_Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-header">
                      </div>
                      <div class="modal-body">
                        <span>确认添加新订单？</span>
                      </div>
                      <div class="modal-footer">
                        <button id="submit_order" class="btn btn-danger">确认</button>
                        <button id="submit_order_cancel" class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                      </div>
                    </div>          
                </div>
            </div>
            <hr />
            <div class="table-scrollable-wrapper">
                <table  id="results_table" class="table table-striped table-hover">
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
        </div>
        <div class="order_view">
        	<p><h3>订单查询</h3></p>
        	<form class="form-inline" method="post"> 
            	<table>
                	<tr>
                        <td><label>起始日</label>
                            <input id="start_date" class="datepicker" type="text">
                            <label>到</label>
                            <input id="end_date" class="datepicker" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label>公司</label>
                            <select id="search_company_name">
                                <option>All</option>
                            </select>
                            <label>状态</label>
                            <select id="status">
                                <option>All</option>
                                <option>New</option>
                                <option>Dispatching</option>
                                <option>Completed</option>
                            </select>
                        </td>
                    </tr>     
                </table>
            </form>
            <div>
                <button id="search_order" class="btn btn-primary">查询</button>
            </div>
            <hr />
            <div>
                <table id="search_result_table" class="table table-striped table-hover">
                    <thead>
                    	<tr>
                            
                            <th><input class="select-all" type="checkbox"></th>
                            <th>订单号</th>
                        	<th>下单日期</th>
                            <th>公司名</th>
                            <th>送货日期</th>
                            <th>送货进程</th>
                            <th>总价</th>
                            <th>备注</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div>
                <button id="order_delete" class="btn btn-danger">删除</button>
            </div>
            <!-- Modal -->
            <div id="orderModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="orderModalLabel">订单细节</h3>
              </div>
              <div class="modal-body">
                <table  id="modal_order_table" class='table table-striped table-hover'>
                    <thead>
                        <tr>
                            <th><input class="select-all" type="checkbox"></th>
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
                <button id="order_detail_delete" class="btn btn-danger">删除</button>
                <button id="order_detail_print" class="btn btn-primary">打印</button>
                <button id="order_detail_update" class="btn btn-primary">更新</button>
                <button id="order_detail_add" class="btn btn-primary">订单追加</button>
              </div>
            </div>
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
                        opt = $("<option>").appendTo("#search_company_name");
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
                                $("#postcode").val(data.Postcode1);
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
                if ($(this).val()=="" || $(this).val()<0 || isNaN($(this).val())){
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
                        tr.find("input").parent().text(qty);    //replace input by plain text
                        tr.appendTo($("#modal_table tbody"));
                    }
                });

                $("#total_qty").val(total_qty);
                $("#total_price").val(total_price);
            }

            $(".qty_input").live("focusin", function(){
                if ($(this).val()==0){
                    $(this).val("");
                }
            });

            $(".qty_input").live("focusout", function(){
                if ($(this).val()==""){
                    $(this).val(0);
                }
            });

            $("#save_default").click(function(){

                if ($("#company_name").val() ==null){
                    alert("请选择公司");
                    return;
                }
                var order = prepare_order($(this).attr("id"));
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
            /*
                click submit order button to add order
            */
            $("#order_confirm_btn").click(function(){
                var message = "";
                if ($("#company_name").val() ==null){
                    message += "请选择公司\n";
                }
                if (!isValidDate($("#delivery_date").val())){
                    message += "送货日期格式不正确\n";
                }
                if ($("#total_qty").val()==0){
                    message += "请添加产品\n";
                }
                if (message!=""){
                    alert(message);
                    return;
                }
                $("#order_confirm_Modal").modal({show:true});
            });

            $("#submit_order").click(function(){
                var order = prepare_order($(this).attr("id"));
                var ajaxOpts={
                        type: "post",
                        dataType: "json",
                        url: "manage_order/submit_order",
                        data: {order: JSON.stringify(order)},
                        success: function(data){
                            location.reload();
                        }
                };
                $.ajax(ajaxOpts);
            });
            
            /*
                click search button to get corresponding orders
            */
            $("#search_order").click(function(){
            	if (!isValidDate($("#start_date").val()) ||!isValidDate($("#end_date").val())){
                    alert("日期格式不正确\n");
                    return;
                }
                search_order()
            });
            
            $(".view_button").live("click", function(){
                var order_id = $(this).closest("tr").children().eq(1).text();
                view_order_detail(order_id);
                var status = $(this).closest("tr").children().eq(5).text()
                $("#order_detail_update").attr("disabled",false);
                $("#order_detail_delete").attr("disabled",false);
                $("#order_detail_add").attr("disabled",false);
                if (status=="Dispatching" || status=="Completed"){
                    $("#order_detail_update").attr("disabled",true);
                    $("#order_detail_delete").attr("disabled",true);
                    $("#order_detail_add").attr("disabled",true);
                }
                $("#orderModal").modal({show:true});               
            });
            //select or unselect all checkboxes
            $(".select-all").click(function(){
                    $(this).closest("table").find(":checkbox").attr('checked', this.checked)
            });

            $("#order_detail_delete").click(function(){
                var order_detail = {}, products = {};
                order_detail["order_id"] = $("#modal_order_table tbody").attr("id");
                var x=0;
                $("#modal_order_table tbody tr").each(function(){
                    var childrens = $(this).children();
                    var product_name = childrens.eq(1).text();
                    var checkbox = childrens.eq(0).children("input");

                    if (checkbox.prop("checked")){
                        products[x]=product_name;
                        x++;
                    }      
                });
                if ($.isEmptyObject(products)){
                    return;
                }
                order_detail["products"] = products;
                var ajaxOpts={
                        type: "post",
                        dataType: "json",
                        url: "manage_order/remove_order_detail",
                        data: {order_detail: JSON.stringify(order_detail)},
                        success: function(data){
                            alert("删除成功！");
                            view_order_detail(order_detail["order_id"]);
                            search_order();
                        }
                };
                $.ajax(ajaxOpts);
            });

			$("#order_delete").click(function(){
				
				var orders = {};
				var x = 0;
				$("#search_result_table tbody tr").each(function(){
                    var childrens = $(this).children();
                    var order_id = childrens.eq(1).text();
                    var checkbox = childrens.eq(0).children("input");

                    if (checkbox.prop("checked")){
                        orders[x]=order_id;
                        x++;
                    }      
                });
                if ($.isEmptyObject(orders)){
                    return;
                }
                var ajaxOpts={
                        type: "post",
                        dataType: "json",
                        url: "manage_order/remove_order",
                        data: {orders: JSON.stringify(orders)},
                        success: function(data){
                            alert("删除成功！");
                            search_order();
                        }
                };
                $.ajax(ajaxOpts);
			});
            
            $("#order_detail_update").click(function(){
                var order_detail = {}, products = {};
                order_detail["order_id"] = $("#modal_order_table tbody").attr("id");
                var x=0;
                $("#modal_order_table tbody tr").each(function(){
                    var childrens = $(this).children();
                    var product = {};
                    product["product_name"]=childrens.eq(1).text();
                    product["qty"]=childrens.eq(6).find("input").val();
                    products[x]=product;
                    x++;      
                });

                order_detail["products"] = products;
                var ajaxOpts={
                        type: "post",
                        dataType: "json",
                        url: "manage_order/update_order_detail",
                        data: {order_detail: JSON.stringify(order_detail)},
                        success: function(data){
                            alert("更新成功！");
                            view_order_detail(order_detail["order_id"]);
                            search_order();
                        }
                };
                $.ajax(ajaxOpts);
            });

            $("#order_detail_print").click(function(){
                    var order_id = $("#modal_order_table tbody").attr("id");
                    window.open("<?=base_url().'delivery_view/print_order_detail?orderid='?>"+order_id,'_blank');
            });

            function prepare_order(button){
                var order = {},products = {};  //make it an object instead of array
                order["company_name"] = $("#company_name").val();
                
                if (button=="submit_order"){
                    order["delivery_date"] = $("#delivery_date").val();
                    order["comment"] = $("#comment").val();
                    order["suburb"] = $("#suburb").val();
                    order["postcode"] = $("#postcode").val();
                    order["delivery_address"] = $("#delivery_address").val();
                    order["total_qty"] = $("#total_qty").val();
                    order["total_price"] = $("#total_price").val();
                }
                $("#modal_table tbody tr").each(function(){
                    var childrens = $(this).children();
                    var product = {};

                    product["product_name"] = childrens.eq(0).text();
                    product["description"] = childrens.eq(1).text();
                    product["price"] = parseFloat(childrens.eq(2).text());
                    product["unit"] = childrens.eq(3).text();
                    //children.eq(4) is category
                    product["qty"] = parseFloat(childrens.eq(5).text());
                    products[childrens.eq(0).text()] = product;
                    
                });
                order["products"] = products;
                return order;
            }

            function search_order(){
                var ajaxOpts={
                        type: "post",
                        dataType: "json",
                        url: "manage_order/search_order",
                        data: {start: $("#start_date").val(),
                                end: $("#end_date").val(), 
                                company: $("#search_company_name").val(), 
                                status: $("#status").val()},
                        success: function(data){
                            $("#search_result_table tbody").empty()
                            for (var i=0;i<data.length;i++){
                                var tr=$("<tr>").appendTo($("#search_result_table tbody"));
                                
                                $("<td>").append($("<input type='checkbox'>")).appendTo(tr);
                                $("<td>").text(data[i].OrderID).appendTo(tr);
                                $("<td>").text(data[i].OrderDate).appendTo(tr);
                                $("<td>").text(data[i].CompanyName).appendTo(tr);
                                $("<td>").text(data[i].DeliveryDate).appendTo(tr);
                                $("<td>").text(data[i].Status).appendTo(tr);
                                $("<td>").text(data[i].TotalPrice).appendTo(tr);
                                $("<td>").text(data[i].Comment).appendTo(tr);
                                $("<td>").append($("<a>").addClass("btn view_button").append($("<i>").addClass("icon-eye-open"))).appendTo(tr);   
                            }
                        }
                };
                $.ajax(ajaxOpts);
            }

            function view_order_detail(order_id){
                var ajaxOpts={
                        type: "post",
                        dataType: "json",
                        url: "manage_order/search_order_detail",
                        data: {order_id: order_id},
                        success: function(data){
                            $("#modal_order_table tbody").empty().attr("id",order_id);                          
                            for (var x=0;x<data.length;x++){
                                var tr = $("<tr>").appendTo($("#modal_order_table tbody"));
                                $("<td>").append($("<input type='checkbox'>")).appendTo(tr); 
                                $("<td>").text(data[x].ProductName).appendTo(tr);
                                $("<td>").text(data[x].Description).appendTo(tr);
                                $("<td>").text(data[x].Price).appendTo(tr);
                                $("<td>").text(data[x].Unit).appendTo(tr);
                                $("<td>").text(data[x].Category).appendTo(tr);
                                $("<td>").append($("<input type='text'>").val(data[x].Qty).addClass("input-small")).appendTo(tr);
                            }
                        }
                };
                $.ajax(ajaxOpts);
            }

            function isValidDate(date){
                return date.match(/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/)
            }
		</script>
    </div>
 </div>
</div>

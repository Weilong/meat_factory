     <div class="content">
         <div class = "row" >
            <div class = "left-nav">
              <div class="navbar">
                <div class="navbar-inner" style="width:120px;">
                  <ul class="nav nav-stacked">
                    <li><a href="<?php echo base_url().'page?page=order_management'; ?>">订单管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=delivery_view_search'; ?>">送货管理</a>
                    	<ul>
                        	<li>送货信息查询</li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=accountant_login'; ?>">账目管理</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=client_management'; ?>">客户管理</a>
                    </li>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=supplier_management'; ?>">供应商管理</a>
                    </li>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=product_management'; ?>">商品管理</a>
                    </li>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=income_view'; ?>">报表查看</a>
                    </li>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class = "main-content">
            	<div class="delivery_view">
                	<p><h3>送货情况预览</h3></p>
                    <form class="form-inline" method="post" action="<?php echo base_url().'delivery_view/load_delivery_detail'; ?>">
                    	<table>
                        	<tr>
                                <td>送货日期  <input class="datepicker" type="text" name="delivery_date" value='<?php echo date('Y-m-d'); ?>' /></td>
                            	<td width="10"></td><td><input type="button" class="btn btn-primary" id="searching" value="查询" /></td>
                            </tr>
                        </table>
                    </form>
                    <!-- delivery detail in current date -->
                    <table class='table table-striped table-hover'>
                    	<thead>
                            <th>OrderID</th>
                            <th>CompanyName</th>
                            <th>ContactName</th>
                        	<th>DeliveryDate</th>
                            <th>Driver</th>
                            <th>Suburb</th>
                            <th>Area</th>
                        	<th>Print</th>
                            <th>Complete</th>
                        </thead>
                        <tbody>
                        <?php 
							if($result!=NULL||$result!=(""))//if the array is not empty or null, then list the search result
							{
								foreach($result as $row)
								{
									$status = "Completed";
						?>
									<tr>
                                        <td id='driver<?php echo $row->id; ?>'><?php echo $row->id; ?></td>
                                        <td><?php echo $row->companyname; ?></td>
                                        <td><?php echo $row->contactname; ?></td>
                                        <td><?php echo $row->deliverydate; ?></td>

                                        <td><?php if($row->status==$status)
												{
													echo $row->driver;
												}
												else
												{
											?>

                                            		<select name='selectdriver' class="driver<?php echo $row->id; ?>">
                                        			<option value='<?php echo $row->driver; ?>'><?php echo $row->driver; ?></option>

                                        	<?php 
													foreach($drivers as $rows)
												  	{
														$delivery_drivers = $rows->driver;
														if($delivery_drivers!=$row->driver)
														{
											?>
                                                			<option value='<?php echo $delivery_drivers; ?>'><?php echo$delivery_drivers; ?></option>
                                            <?php
														}
													}
												}
											?>
                                            </select>
                                        </td>
                                        <td><?php echo $row->suburb; ?></td>
                                        <td><?php echo $row->area; ?></td>
                                        <td><!--<a href='<?=base_url().'delivery_view/print_order_detail?accountname='.$row->companyname.'&orderid='.$row->id; ?>' target="_blank">--><button class="btn print_btn"><i class='icon-print' id="<?php echo $row->id; ?>" title='print'></i></button><!--</a>--></td>
                                        <td><?php
                                            	if($row->status==$status)
												{
                                            	   echo "Completed";
												}
												else
												{
                                            ?>
                                            <button id='<?php echo $row->id; ?>' class="btn complete_btn">Complete</button>
                                            <?php
												}
											?></td>
									</tr>
                                    <script language="javascript" type="text/javascript">
										$(document).ready(function(e) {
                                            $('.driver<?php echo $row->id; ?>').change(function(){
                                              	var newdriver = $(".driver<?php echo $row->id; ?>").val();
												var order_id = <?php echo $row->id; ?>;
												var ajaxobj = 
												{
													type: "post",
													url: "delivery_driver_change",
													data: {drivername : newdriver, orderid: order_id},
													success:function()
													{
														alert('change success');
													}
												};
												$.ajax(ajaxobj);
                                            });
                                        });
									</script>
                        <?php
								}
							}
							else
							{
						?>
                        	<tr><td colspan="9"> 本日没有送货 </td></tr>
                        <?php
							}
						?>
                    </tbody>
                    </table>
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
                    <!-- Modal -->
                    <div id="order_detail_add_Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="order_detail_add_ModalLabel">追加产品</h3>
                      </div>
                      <div class="modal-body">
                        <table  id="modal_product_table" class='table table-striped table-hover'>
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
                        <button id="order_detail_add_confirm" class="btn btn-danger">确认追加</button>
                      </div>
                    </div>
                </div>
            </div>
            <script language="javascript" type="text/javascript">
                $(document).ready(function(e) {
                    $('#searching').click(function(e) {
                        $('.form-inline').submit();
                    });
                    $('.complete_btn').click(function() {
                                        var order_id = $(this).attr('id');
                                        var status = "Completed";
                                        var obj_status = {
                                            type: "post",
                                            url: "change_delivery_status",
                                            data: {complete_status : status, orderid: order_id},
                                            success:function()
                                            {
                                                alert('Delivery completed');
                                            }                                                   
                                        };
                                        $.ajax(obj_status);
                   });

                    load_product_list();
                });

                 $(function() {
                        var calender = $(".datepicker").datepicker({dateFormat:"yy-mm-dd"});
                        calender.datepicker("setDate", new Date());
                    });

                $(".print_btn").click(function(){
                    var order_id = $(this).closest("tr").children().eq(0).text();
                    view_order_detail(order_id);
                    
                    $("#order_detail_update").attr("disabled",true);
                    $("#order_detail_delete").attr("disabled",true);
                    $("#order_detail_add").attr("disabled",true);
                    if ($(this).closest("tr").children().eq(8).text()!="Completed"){
                        $("#order_detail_update").attr("disabled",false);
                        $("#order_detail_delete").attr("disabled",false);
                        $("#order_detail_add").attr("disabled",false);
                    }
                    $("#orderModal").modal({show:true});               
                });

                $("#order_detail_print").click(function(){
                    var order_id = $("#modal_order_table tbody").attr("id");
<<<<<<< HEAD
                    window.open("<?php echo base_url().'delivery_view/print_order_detail?orderid='; ?>"+order_id,'_blank');
=======
                    window.open("<?php echo base_url().'delivery_view/print_order_detail?orderid='?>"+order_id,'_blank');
>>>>>>> c12f8746bcaed508dabeb370d587d07865cc1611
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
                        url: "remove_order_detail",
                        data: {order_detail: JSON.stringify(order_detail)},
                        success: function(data){
                            alert("删除成功！");
                            view_order_detail(order_detail["order_id"]);
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
                        url: "update_order_detail",
                        data: {order_detail: JSON.stringify(order_detail)},
                        success: function(data){
                            alert("更新成功！");
                            view_order_detail(order_detail["order_id"]);
                        }
                };
                $.ajax(ajaxOpts);
            });

            $("#order_detail_add").click(function(){
                $("#orderModal").modal('hide');
                load_product_list()
                $("#order_detail_add_Modal").modal('show');
            });
            
            $("#order_detail_add_confirm").click(function(){
                var order_detail = {}, products = {};
                order_detail["order_id"] = $("#modal_order_table tbody").attr("id");

                $("#modal_product_table tbody tr").each(function(){
                    var childrens = $(this).children();
                    var product = {};
                    if (childrens.eq(5).find("input").val()!=0){
                        product["product_name"] = childrens.eq(0).text();
                        product["description"] = childrens.eq(1).text();
                        product["price"] = parseFloat(childrens.eq(2).text());
                        product["unit"] = childrens.eq(3).text();
                        //children.eq(4) is category
                        product["qty"] = parseFloat(childrens.eq(5).find("input").val());
                        products[childrens.eq(0).text()] = product;
                    } 
                });
                order_detail["products"] = products;
                var ajaxOpts={
                        type: "post",
                        dataType: "json",
                        url: "add_order_detail",
                        data: {order_detail: JSON.stringify(order_detail)},
                        success: function(data){
                            alert("追加成功！");
                            load_product_list();
                        }
                };
                $.ajax(ajaxOpts);
            });

                function view_order_detail(order_id){
                    var ajaxOpts={
                            type: "post",
                            dataType: "json",
                            url: "search_order_detail",
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
                                    $("<td>").append($("<input type='text'>").val(data[x].Qty).change(qtyValidation).addClass("input-small")).appendTo(tr);
                                }
                            }
                    };
                    $.ajax(ajaxOpts);
                }

                function qtyValidation(){
                    //need validation: cant be negative, alphabet or other symbols
                    if ($(this).val()=="" || $(this).val()<0 || isNaN($(this).val())){
                        alert("数目格式不正确！");
                        $(this).val(0);
                    }
                }

                function load_product_list(){
                var ajaxOpts={
                            type: "post",
                            dataType: "json",
                            url: "get_product_list",
                            data: {},
                            success: function(data){
                                $("#modal_product_table tbody").empty();
                                for (var x = 0;x<data.length;x++){

                                    var tr = $("<tr>").appendTo($("#modal_product_table tbody"));

                                    $("<td>").text(data[x].ProductName).appendTo(tr);
                                    $("<td>").text(data[x].Description).appendTo(tr);
                                    $("<td>").addClass("price").text(data[x].Price).appendTo(tr);
                                    $("<td>").text(data[x].Unit).appendTo(tr);
                                    $("<td>").text(data[x].Category).appendTo(tr);
                                    $("<input type=text>").addClass("qty_input").addClass("input-small").val(0).change(qtyValidation).appendTo($("<td>").appendTo(tr));
                                }
                            }
                        };
                $.ajax(ajaxOpts);
            }
            </script>
        </div>
    </div>    
</div>
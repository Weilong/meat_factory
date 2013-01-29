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
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=supplier_management' ?>">供应商管理</a>
                    </li>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'page?page=product_management' ?>">商品管理</a>
                    	<ul>
                        	<li><a href="#" id="intoproduct">入库商品管理</a></li>
                            <li><a href="#" id="addnewproduct">添加新商品</a></li>
                            <li><a href="#" id="productmanagement">管理商品</a></li>
                        </ul>
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
            	<div class="intoproduct">
                	<p><h3>入库商品管理</h3></p>
                	<div>
                          <fieldset>
                            <legend><h5>产品信息</h5></legend>
                                <div class="row">
                                    <div class="span4">
                                        <label>产品名称</label>
                                        <input name='goods' id='goods' type="text" />
                                        <label>供应商</label>
                                        <select name='supplier_name' id='supplier_name'>
                                        </select><br />
                                        <label>描述</label>
                                        <textarea rows="6" name="comments" id="comments"></textarea><br />
                                    </div>
                                    <script language="javascript" type="text/javascript">
										$(document).ready(function(e) {
                                            $.getJSON(
												'productlist/supplier',
												function(data){
													for (var x = 0;x<data.length;x++){
														var opt = $("<option>").appendTo("#supplier_name");
														opt.text(data[x].companyname);
														opt.val(data[x].companyname);
													}
												}
											);
                                        });
									</script>
                                    <div class="span5">
                                        <label>单价</label>
                                        <input type="number" id="goodsprice" name="goodsprice"></input>
                                        <label>数量</label>
                                        <input type="number" id="goodsqty" name="goodsqty"></input>
                                        <label>单位</label>
                                        <input type="text" id="goodsunits" name="goodsunits"></input>
                                        <label>总价</label>
                                        <input type="number" id="goodsamount" name="goodsamount" readonly="readonly"/>
                                        <br />
                                        <button id="confirm_btn" class="btn btn-primary">添加</button>
                                        <button id="reset_btn" class="btn btn-danger">清空</button> 
                                    </div>
                                </div>  
                          </fieldset>
                    </div>
                    <script language="javascript" type="text/javascript">
						$(document).ready(function(e) {
							$('button#confirm_btn').click(function(e) {
								var productsname = $('#goods').val();
								var companyname = $('#supplier_name').val();
								var comments = $('#comments').val();
								var qty = $('input#goodsqty').val();
								var units=$('input#goodsunits').val();
								var price = $('input#goodsprice').val();
								var amount = qty*price;
								amount = (amount/100)*100;
								$('input#goodsamount').val(amount);
								var txt = "{'product':'"+productsname+"', 'supplier':'"+companyname+"', 'comments':'"+comments+"', 'qty':'"+qty+"', 'price':'"+price+"', 'unit':'"+units+"', 'amountprice':'"+amount+"'}";
								var jsonArray = eval('('+txt+')');
								var confirm_message = confirm('总计：$'+amount);
								if(confirm_message == true)
								{
									var ajaxobj ={
										type:'post',
										datatype:'json',
										url:'productlist/savegoods',
										data:{newproduct:jsonArray}
									};
									$.ajax(ajaxobj);
								}
								else
								{
									window.location('<?php echo base_url().'page?page=product_management' ?>');
								}
                            });
							$('button#reset_btn').click(function(e) {
                                $('#goods').val('');
								$('#supplier_name').val('');
								$('#comments').val('');
								$('input#goodsqty').val('');
								$('input#goodsunits').val('');
								$('input#goodsprice').val('');
								$('#goodsamount').val('');
                            });
                        });
					</script>
                    <hr />
                    <div>
                        <div>
                                <label><h5>进货日期</h5></label>
                                <!-- the input for date needs to be improved so that user can 
                                select date from a drop-down calendar straight away -->
                                <input class="datepicker" id="startdate" type="text">
                                到
                                <input class="datepicker" id="enddate" type="text">
                                <button id="search_btn" class="btn btn-primary">搜索</button>
                        </div>
                        <div>
                            <table id="search_list" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>产品名</th>
                                        <th>供应商</th>
                                        <th>单价</th>
                                        <th>进货量</th>
                                        <th>单位</th>
                                        <th>总价</th>
                                        <th>进货日期</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <script language="javascript" type="text/javascript">
					$(document).ready(function(e) {
						$('button#search_btn').click(function(e) {
							var start_time=$('#startdate').val();
							var end_time= $('#enddate').val();
							var ajaxobj = {
								type:'post',
								url:'productlist/searchresult',
								data:{start_date:start_time,end_date:end_time},
								success:function(data){
									var goods = eval('('+data+')');
									$('#search_list td').remove();
									var i = 0;
									for(i=0;i<goods.length;i++)
									{
										var productid = goods[i].id;
										var productsname = goods[i].productordered;
										var productsupplier=goods[i].supplier;
										var productprice = goods[i].price;
										var productqty = goods[i].qty;
										var productunit = goods[i].units;
										var productamount=goods[i].amount;
										var productintodate=goods[i].intodate;
										var tr = $("<tr id='"+productid+"'>").appendTo($("#search_list tbody"));
										$("<td>").text(productsname).appendTo(tr);
										$("<td>").text(productsupplier).appendTo(tr);
										$("<td>").text(productprice).appendTo(tr);
										$("<td>").text(productqty).appendTo(tr);
										$("<td>").text(productunit).appendTo(tr);
										$("<td>").text(productamount).appendTo(tr);
										$("<td>").text(productintodate).appendTo(tr);
										$("<i title='delete'>").addClass("icon-trash").appendTo($("<button class='delete_btn' title='delete' id="+productid+">").appendTo($("<td>").appendTo(tr)));
									}
								}
							};
							$.ajax(ajaxobj);
						});	
						$('button.delete_btn').live(
							"click",function(e){
								var confirmalert = confirm("Are you want to remove it");
								if(confirmalert==true)
								{
									var companyid = $(this).attr('id');
									var ajaxobj = {
											type:'post',
											url:'productlist/searchdelete',
											data:{orderid:companyid},
											success:function(){
												$('tr#'+companyid+' td').remove();
											}
										};
										$.ajax(ajaxobj);
								}
							}
						);
					});
				</script>
                <div class="addnewproduct">
                	<p><h3>添加新商品</h3></p>
                    <form method="post" id="newproduct" action="add_new_product/add_product">
                        <fieldset>
                            <label>产品名称</label>
                            <input type="text" id="productname" name="productname" />
                            <label>产品描述</label>
                            <input type="text" id="productintro" name="productintro" />
                            <label>库存</label>
                            <input type="number" id="qty" name="qty" />
                            <label>单位</label>
                            <input type="text" id="unit" name="unit" />
                            <label>单价</label>
                            <input type="text" id="price" name="price" />
                            <label>分类</label>
                            <select name="category" id="category">
                                <option value="Beef">Beef</option>
                                <option value="Chicken">Chicken</option>
                                <option value="Lamb">Lamb</option>
                                <option value="Duck">Duck</option>
                                <option value="Pork">Pork</option>
                                <option value="Stock">Stock</option>
                                <option value="Other">Other</option>
                            </select>
                            <br />
                            <button type="button" id="add_new_product" class="btn btn-primary">添加</button>
                            <button type="reset" class="btn">清空</button>
                        </fieldset>
                    </form>
                </div>
                <script language="javascript" type="text/javascript">
					//new product entry 
					
				    $(document).ready(function(e) {
                        $('#category').change(function(e) {
							var category = $('#category').val();
                        });
						$('#add_new_product').click(function(e) {
                            var productname = document.getElementById('productname').value;
							var productintro = document.getElementById('productintro').value;
							var qty = document.getElementById('qty').value;
							var units=document.getElementById('unit').value;
							var price=document.getElementById('price').value;
							if(productname==""||productintro==""||qty==""||units==""||price=="")
							{
								alert('请填写完整产品信息（产品名，产品描述，产品数量，单位重量，产品单价）');
							}
							else
							{
								$('form#newproduct').submit();
							}
                        });
                    });
				</script>
                <div class="productmanagement">
                	<p><h3>商品管理</h3></p>
                    <div>
                        	<label>产品类型</label>
                            <select name="category_name" id="category_name">
                            	<option value="All">All</option>
                            	<option value="Beef">Beef</option>
                                <option value="Chicken">Chicken</option>
                                <option value="Duck">Duck</option>
                                <option value="Lamb">Lamb</option>
                                <option value="Pork">Pork</option>
                                <option value="Stock">Stock</option>
                                <option value="Other">Other</option>
                            </select> 
                            <button id="search_category" class="btn btn-primary"/>查询</button>
                    </div>
                    <hr />
                    <div>
                        <table id="category_search_result" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>产品名</th>
                                        <th>产品描述</th>
                                        <th>单价</th>
                                        <th>库存</th>
                                        <th>单位</th>
                                        <th>类别</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <script language="javascript" type="text/javascript">
					$(document).ready(function(e) {
                        $('#intoproduct').click(function(e) {
							$('.addnewproduct').animate({height:'0px'},"fast");
							$('.productmanagement').animate({height:'0px'},"fast");
                            $('.intoproduct').animate({height:'100%'},"slow");					
                        });
						$('#addnewproduct').click(function(e) {
                            $('.intoproduct').animate({height:'0px'},"fast");
							$('.productmanagement').animate({height:'0px'},"fast");
                            $('.addnewproduct').animate({height:'100%'},"slow");	
                        });
						$('#productmanagement').click(function(e) {
						    $('.intoproduct').animate({height:'0px'},"fast");
							$('.addnewproduct').animate({height:'0px'},"fast");
                            $('.productmanagement').animate({height:'100%'},"slow");	
                        });
						$('button#search_category').click(function(e) {
                            var category = $('select#category_name').val();
							var obj = {
								type:"post",
								url:"productlist/categorysearch",
								data:{product_category:category},
								success:function(result_data)
								{
									if(result_data.length==0)
									{
										$('#category_search_result td').remove();
									}
									else
									{
										var collection = eval('('+result_data+')');
										$('#category_search_result td').remove();
										var i=0;
										for(i=0;i<collection.length;i++)
										{
											var productid = collection[i].id;
											var productname=collection[i].name;
											var productdescription=collection[i].description;
											var productstock = collection[i].stock;
											var productunit = collection[i].productunits;
											var productprice = collection[i].price;
											var productcategory=collection[i].category;
											var tr = $("<tr id='"+productid+"'>").appendTo($("#category_search_result tbody"));
											$("<td>").text(productname).appendTo(tr);
											$("<td>").text(productdescription).appendTo(tr);
											$("<td>").text(productprice).appendTo(tr);
											$("<td>").text(productstock).appendTo(tr);
											$("<td>").text(productunit).appendTo(tr);
											$("<td>").text(productcategory).appendTo(tr);
											$("<i title='edit'>").addClass("icon-edit").appendTo($("<button class='product_edit_btn' title='edit' id='"+productid+"' data-toggle='modal' data-target='#myModal'>").appendTo($("<td>").appendTo(tr)));
											$("<i title='delete'>").addClass("icon-trash").appendTo($("<button class='product_delete_btn' title='delete' id="+productid+">").appendTo($("<td>").appendTo(tr)));
										}
									}
								}
							};
							$.ajax(obj);
                        });
                    });
					$('button.product_edit_btn').live(
						'click',function(e) {
							var productid = $(this).attr('id');
									var ajaxobj = {
										type:'post',
										url : 'productlist/info_product',
										data:{product:productid},
										success:function(data){
											//$('.product_edit').animate({width:'50%',height:'50%',opacity:'1'},'slow');
											//$('.product_edit').css('visibility','visible');
											if(data.length==0)
											{
												$('#mymodal').modal({show:true});
												alert('No any Data, Please remove this wrong product')
												$('.product_edit').animate({
								   				width:'0px',height:'0px',opacity:'0'},'slow');
											}
											else
											{
												$('#mymodal').modal({show:true});
												var collection = eval('('+data+')');
												var i=0;
												for(i=0;i<collection.length;i++)
												{
													var productid = collection[i].id;
													var productname=collection[i].name;
													var productdescription=collection[i].description;
													var productstock = collection[i].stock;
													var productunit = collection[i].productunits;
													var productprice = collection[i].price;
													var productcategory=collection[i].category;
													$('#pid').val(productid);
													$('#pn').val(productname);
													$('#intro').val(productdescription);
													$('#single_product_category').val(productcategory);
													$('#per_dollar').val(productprice);
													$('#pu').val(productunit);
													$('#st').val(productstock);
												}
											}
										}
									};
									$.ajax(ajaxobj);
						}
                    );
					$('button.product_delete_btn').live(
						'click',function() {
							var productid = $(this).attr('id');
                        	var confirmation = confirm('是否删除此项？(Remove it?)');
							if(confirmation==true)
							{
								$('#category_search_result td').remove();	
								var obj = {
									type:'post',
									url:'productlist/delete_product',
									data:{product:productid},
									success:function(data){
										alert(data);
									}
								};
								$.ajax(obj);
							}
						}
					);
					$(function() {
                        var calender = $(".datepicker").datepicker({dateFormat:"yy-mm-dd"});
                        calender.datepicker("setDate", new Date());
                    });
			</script>
         </div>
         
     </div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-body">
        <div class='product_edit'>
            <!-- <button class="close" ><i class="icon-remove"></i></button> -->
            <div class="product_edit_detail">
                <table class="product_edit_detail">
                    <thead>
                    </thead>
                    <tbody>
                        <tr><td>产品ID：</td><td><input type="text" name='pid' id="pid" readonly="readonly"/></td></tr>
                        <tr><td>产品名称：</td><td><input type="text" name='pn' id='pn' readonly="readonly"/></td></tr>
                        <tr><td>产品描述</td><td><textarea name='intro' id='intro'></textarea></td></tr>
                        <tr><td>类别：</td><td><select name="single_product_category" id="single_product_category">
                                                    <option value="Beef">Beef</option>
                                                    <option value="Chicken">Chicken</option>
                                                    <option value="Duck">Duck</option>
                                                    <option value="Lamb">Lamb</option>
                                                    <option value="Pork">Pork</option>
                                                    <option value="Stock">Stock</option>
                                                    <option value="Other">Other</option>
                                                </select> 
                                        </td></tr>
                        <tr><td>单价：</td><td><input type="text" name='per_dollar' id="per_dollar"/></td></tr>
                        <tr><td>单位：</td><td><input type="text" name='pu'id="pu" /></td></tr>
                        <tr><td>库存：</td><td><input type="text" name='st' id="st"/></td></tr>
                        <!-- <tr><td><button id="save_product_change" class="btn btn-primary">保存</button>&nbsp; &nbsp;<button id="close" class="btn btn-danger">关闭</button></td></tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer"> <button id="save_product_change" class="btn btn-primary">保存</button> </div>
</div>
<script language="javascript" type="text/javascript">
							$('button#save_product_change').click(function(e) {
                                var pid = $('#pid').val();
								var pn=	$('#pn').val();
								var intro=$('#intro').val();
								var spc=$('#single_product_category').val();
								var pd=	$('#per_dollar').val();
								var pu=	$('#pu').val();
								var st=	$('#st').val();
								var txt = "{'id':'"+pid+"','name':'" + pn+"','pintro':'" + intro+"','category':'" + spc+"','price':'" + pd+"','units':'" + pu+"','stocks':'" + st+"'}";
								var jsonArray = eval('('+txt+')');
								var ajaxobj={
										type:'post',
										datatype:'json',
										url:'productlist/save_edit',
										data:{product:jsonArray
											},
										success:function(data){
											//change succeed and close
											alert(data);
											$('.product_edit').animate({
								   					width:'0px',height:'0px',opacity:'0'},'slow'
											);
										}
									};
									$.ajax(ajaxobj);
                            });
							$('button.close').click(function(e) {
                               $('.product_edit').animate({
								   	width:'0px',height:'0px',opacity:'0'},'slow');
                            });
							$('button#close').click(function(e) {
                                $('.product_edit').animate({
									width:'0px',height:'0px',opacity:'0'},'slow');
                            });
</script>
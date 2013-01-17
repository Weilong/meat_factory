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
                      <form>
                          <fieldset>
                            <legend>产品信息</legend>
                                <div class="row">
                                    <div class="span4">
                                        <label>产品名称</label>
                                        <select>
                                            <option>test1</option>
                                            <option>test2<option>
                                        </select><br />
                                        <label>供应商</label>
                                        <select>
                                            <option>test1</option>
                                            <option>test2<option>
                                        </select><br />
                                        <label>描述</label>
                                        <textarea rows="6"></textarea><br />
                                    </div>
                                    <div class="span5">
                                        <label>单价</label>
                                        <input type="text"></input>
                                        <label>数量</label>
                                        <input type="text"></input>
                                        <label>单位</label>
                                        <input type="text"></input>
                                        <label>总价</label>
                                        <span class="uneditable-input"></span>
                                        <br />
                                        <button type="submit" class="btn btn-primary">添加</button>
                                        <button type="submit" class="btn">清空</button>
                                    </div>
                                </div>  
                          </fieldset>
                        </form>
                    </div>
                    <hr />
                    <div>
                        <div>
                            <form class="form-inline">
                                <label>进货日期</label>
                                <!-- the input for date needs to be improved so that user can 
                                select date from a drop-down calendar straight away -->
                                <input class="datepicker" type="text">
                                到
                                <input class="datepicker" type="text">
                                <button type="submit" class="btn btn-primary">搜索</button>
                            </form>
                        </div>
                        <div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
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
                        <div>
                            <!--<button type="submit" class="btn btn-primary">修改</button> -->
                            <button type="submit" class="btn btn-danger">删除</button>
                        </div>
                    </div>
                </div>
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
                    	<form class="form-inline" method="post">
                        	<label>产品名</label>
                            <select name="productname"></select> 
                            <button type="submit" class="btn btn-primary"/>查询</button>
                        </form>
                    </div>
                    <hr />
                    <div>
                        <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>产品名</th>
                                        <th>产品描述</th>
                                        <th>单价</th>
                                        <th>单位</th>
                                        <th>类别</th>
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
                                        <th><i class="icon-edit"></i><i class="icon-trash"></i></th>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
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
                                        <th><i class="icon-edit"></i><i class="icon-trash"></i></th>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger">删除</button>
                        <button type="submit" class="btn btn-primary">保存更改</button>
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
                    });

                    $(function() {
                        $( ".datepicker" ).datepicker();
                    });
			</script>
         </div>
         
     </div>

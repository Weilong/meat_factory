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
                                    <div class="span5">
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
                    <form method="post">
                    	<table>
                        	<tr><td>产品名称 <input type="text" name="newproductname" /></td></tr>
                            <tr><td>产品描述 <input type="text" name="productintro" /></td></tr>
                            <tr><td>库存 <input type="number" name="qty" /></td></tr>
                            <tr><td>单位 <input type="text" name="unit" /></td></tr>
                            <tr><td>单价 <input type="text" name="price" /></td></tr>
                            <tr><td>分类 <select name="category">
                            				<option vlaue="0"></option>
                            				<option value="1">Beef</option>
                                            <option value="2">Chicken</option>
                                            <option value="3">Lamb</option>
                                            <option value="4">Duck</option>
                                            <option value="5">Pork</option>
                                            <option value="6">Stock</option>
                                            <option value="7">Other</option>
                                        </select></td></tr>
                            <tr><td align="right"><input type="reset" value="清空" /> <input type="submit" value="入库" /></td></tr>
                        </table>
                    </form>
                </div>
                <div class="productmanagement">
                	<p><h3>商品管理</h3></p>
                    <div class="productview">
                    	<form metho="post">
                        	<p>产品名：<select name="productname"></select> <input type="button" value="查询" />
                            </p>
                      
                        <table>
                        	<tr><th>产品名称</th><th width="10"></th>
                                <th>产品描述</th><th width="10"></th>
                                <th>单位</th><th width="10"></th>
                                <th>单价</th><th width="10"></th>
                                <th>类别</th>
                            </tr>
                            <?php ?>
                            <tr><td colspan="9" align="right">
                            	<input type="button" id="updatebutton" value="更新"/>
                                <input type="button" id="deletebutton" value="删除"/>
                                </td></tr>
                            
                        </table>
                          </form>
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

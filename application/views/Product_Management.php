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
                    <form method="post">
                        <fieldset>
                            <label>产品名称</label>
                            <input type="text" name="productname" />
                            <label>产品描述</label>
                            <input type="text" name="productintro" />
                            <label>库存</label>
                            <input type="number" name="qty" />
                            <label>单位</label>
                            <input type="text" name="unit" />
                            <label>单价</label>
                            <input type="text" name="price" />
                            <label>分类</label>
                            <select name="category">
                                <option vlaue="0"></option>
                                <option value="1">Beef</option>
                                <option value="2">Chicken</option>
                                <option value="3">Lamb</option>
                                <option value="4">Duck</option>
                                <option value="5">Pork</option>
                                <option value="6">Stock</option>
                                <option value="7">Other</option>
                            </select>
                            <br />
                            <button type="submit" class="btn btn-primary">添加</button>
                            <button type="reset" class="btn">清空</button>
                        </fieldset>
                    </form>
                </div>
                <div class="productmanagement">
                	<p><h3>商品管理</h3></p>
                    <div>
                    	<form class="form-inline" method="post">
                        	<label>产品名:</label>
                            <select name="productname"></select> 
                            <button type="submit" class="btn btn-primary"/>查询</button>
                            
                      <!--
                        <table class="table-striped table-hover">
                        	<tr><th>产品名称</th><th width="10"></th>
                                <th>产品描述</th><th width="10"></th>
                                <th>单位</th><th width="10"></th>
                                <th>单价</th><th width="10"></th>
                                <th>类别</th>
                            </tr>
                            <?php ?>
                            <tr><td colspan="9" align="right">
                            	<input type="button" id="updatebutton" class="btn btn-primary" value="更新"/>
                                <input type="button" id="deletebutton" class="btn btn-danger" value="删除"/>
                                </td></tr>
                            
                        </table>-->
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

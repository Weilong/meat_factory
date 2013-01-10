     <div class="content">
         <div class = "row" >
            <div class = "span2">
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
            <div class = "span10">
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
                                <input type="text" placeholder="起始日期">
                                到
                                <input type="text" placeholder="截止日期">
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
                </div>
                <div class="productmanagement">
                	<p><h3>商品管理</h3></p>
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
			</script>
         </div>
         
     </div>

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
                    	<ul>
                        	<li>送货信息查询</li>
                        </ul>
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
            	<div class="delivery_view">
                	<p><h3>送货情况预览</h3></p>
                    <form class="form-inline" method="post">
                    	<table>
                        	<tr>
                                <td>送货日期  <input class="datepicker" type="text" name="delivery_date" /></td>
                            	<td width="10"></td><td><input type="button" class="btn btn-primary" value="查询" /></td>
                            </tr>
                        </table>
                    </form>
                    <!-- delivery detail in current date -->
                    <table>
                    </table>
                </div>
                <script language="javascript" type="text/javascript">
                    $(function() {
                        $( ".datepicker" ).datepicker();
                    });
                </script>
            </div>
         </div>    
     </div>
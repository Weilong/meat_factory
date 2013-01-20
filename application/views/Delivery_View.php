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
                    	<tr><th>OrderID</th><th>CompanyName</th><th>ContactName</th>
                        	<th>DeliveryDate</th><th>Driver</th><th>Suburb</th><th>Area</th>
                        	<th>Print</th><th>Complete</th>
                        </tr>
                        <?php 
							if($result!=NULL||$result!=(""))//if the array is not empty or null, then list the search result
							{
								foreach($result as $row)
								{
						?>
									<tr>
                                        <td id='a<? echo $row->id ?>'><? echo $row->id ?></td>
                                        <td><? echo $row->companyname ?></td>
                                        <td><? echo $row->contactname ?></td>
                                        <td><? echo $row->deliverydate ?></td>
                                        <td><select name='selectdriver'>
                                                <option value='<? echo $row->driver ?>'><? echo $row->driver ?></option>
                                            </select></td>
                                        <td><? echo $row->suburb ?></td>
                                        <td><? echo $row->area ?></td>
                                        <td><a href='#'>Print</a></td>
                                        <td><input type='button' class='a<? echo $row->id ?>' value='complete' /></td>
									</tr>
                                    <script language="javascript" type="text/javascript">
										$(document).ready(function(e) {
                                            $('.a<? echo $row->id ?>').click(function(e) {
                                                var orderid = "<? echo $row->id ?>";
												var deliverystatus = 'completed';
												
                                            });
                                        });
									</script>
                        <?
								}
							}
							else
							{
						?>
                        	<tr><td colspan="9"> 本日没有送货 </td></tr>
                        <?
							}
						?>
                    </table>
                    <script language="javascript" type="text/javascript">
						$(document).ready(function(e) {
							$('#searching').click(function(e) {
                               	$('.form-inline').submit();
                            });
                        });
					</script>
                </div>
                <script language="javascript" type="text/javascript">
                    $(function() {
                        $( ".datepicker" ).datepicker();
                    })
                </script>
            </div>
         </div>    
     </div>
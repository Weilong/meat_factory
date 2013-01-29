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
                    <form class="form-inline" method="post" action="<?=base_url().'delivery_view/load_delivery_detail'; ?>">
                    	<table>
                        	<tr>
                                <td>送货日期  <input class="datepicker" type="text" name="delivery_date" value='<?=date('Y-m-d'); ?>' /></td>
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
									$status = "completed";
						?>
									<tr>
                                        <td id='driver<?=$row->id ?>'><? echo $row->id ?></td>
                                        <td><?=$row->companyname ?></td>
                                        <td><?=$row->contactname ?></td>
                                        <td><?=$row->deliverydate ?></td>
                                        <td><? if($row->status==$status)
												{
													echo $row->driver;
												}
												else
												{
											?>
                                            		<select name='selectdriver' class="driver<?=$row->id ?>">
                                        			<option value='<?=$row->driver; ?>'><?=$row->driver; ?></option>
                                        	<? 
													foreach($drivers as $rows)
												  	{
														$delivery_drivers = $rows->driver;
														if($delivery_drivers!=$row->driver)
														{
											?>
                                                			<option value='<?=$delivery_drivers; ?>'><?=$delivery_drivers; ?></option>
                                            <?
														}
													}
												}
											?>
                                            </select>
                                        </td>
                                        <td><?=$row->suburb ?></td>
                                        <td><?=$row->area ?></td>
                                        <td><a href='<?=base_url().'delivery_view/print_order_detail?accountname='.$row->companyname.'&orderid='.$row->id ?>' target="_blank"><i class='icon-print' id="<?=$row->id ?>" title='print'></i></a></td>
                                        <td>
                                        	<?
                                            	if($row->status==$status)
												{
											?>
                                            	Completed
											<?
												}
												else
												{
                                            ?>
                                            <button id='<?=$row->id ?>' class="btn">Complete</button>
                                            <?
												}
											?>
                                        </td>
									</tr>
                                    <script language="javascript" type="text/javascript">
										$(document).ready(function(e) {
                                            $('.driver<?=$row->id ?>').change(function(){
                                              	var newdriver = $(".driver<?=$row->id ?>").val();
												var order_id = <?=$row->id ?>;
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
							$('button').click(function() {
												var order_id = $(this).attr('id');
												var status = "completed";
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
                        });
					</script>
                </div>
                <script language="javascript" type="text/javascript">
                    $(function() {
                        var calender = $(".datepicker").datepicker({dateFormat:"yy-mm-dd"});
                        calender.datepicker("setDate", new Date());
                    })
               </script>
            </div>
         </div>    
     </div>
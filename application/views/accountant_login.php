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
                    	<ul>
                        	<li><a href="#" id='viewpayment'>账目信息查询</a></li>
                            <li><a href="#" id='costpayment'>成本添加</a></li>
                            <li><a href="#" id='viewbalance'>余额查询</a></li>
                        </ul>
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
                <?php echo validation_errors(); ?>
                <?php echo form_open('manage_accountant/accountant_validation'); ?>
                    <fieldset>
                        <legend>请输入密码</legend>
                        <label>密码</label>
                        <input type="password" name="password"><br/>
                        <button type="submit" class="btn btn-primary">登录</button>
                    </fieldset>
                </form>
            </div>	
            <script language="javascript" type="text/javascript">
            </script>
         </div>
     </div>
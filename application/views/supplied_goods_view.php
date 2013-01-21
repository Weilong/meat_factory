<div class="main-content">
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
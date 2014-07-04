<form role="form" action='/store/add_post' method='post'>

    <input type='hidden' name='ol_table' value='stores' />

    <div class="form-group">
        <label>分店店名</label>
        <input type="text" class="form-control" name='ol_name' >
    </div>

    <div class="form-group">
        <label>負責人</label>
        <input type="text" class="form-control" name='ol_boss'>
    </div>

    <div class="form-group">
        <label>電話</label>
        <input type="text" class="form-control" name='ol_phone'>
    </div>

    <div class="form-group">
        <label>地址</label>
        <input type="text" class="form-control" name='ol_address' >
    </div>

    <div class="form-group">
        <label>後台帳號</label>
        <input type="text" class="form-control" name='ol_account' >
    </div>

    <div class="form-group">
        <label>後台密碼</label>
        <input type="password" class="form-control" name='ol_password' >
    </div>


<!--
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
-->
    <button type="submit" class="btn btn-default">確定新增</button>
</form>

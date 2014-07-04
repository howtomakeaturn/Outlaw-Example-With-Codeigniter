<form role="form" action='/store/edit_post' method='post'>

    <input type='hidden' name='ol_table' value='stores' /></p>
    <input type='hidden' name='ol_id' value='<?php echo $store->id ?>' />

    <input type='hidden' name='ol_table' value='stores' />

    <div class="form-group">
        <label>分店店名</label>
        <input type="text" class="form-control" name='ol_name' value='<?php echo $store->name ?>' >
    </div>

    <div class="form-group">
        <label>負責人</label>
        <input type="text" class="form-control" name='ol_boss' value='<?php echo $store->boss ?>'>
    </div>

    <div class="form-group">
        <label>電話</label>
        <input type="text" class="form-control" name='ol_phone' value='<?php echo $store->phone ?>'>
    </div>

    <div class="form-group">
        <label>地址</label>
        <input type="text" class="form-control" name='ol_address' value='<?php echo $store->address ?>' >
    </div>

    <div class="form-group">
        <label>後台帳號</label>
        <input type="text" class="form-control" name='ol_account' value='<?php echo $store->account ?>' >
    </div>

    <div class="form-group">
        <label>後台密碼</label>
        <input type="password" class="form-control" name='ol_password' value='<?php echo $store->password ?>' >
    </div>


<!--
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
-->
    <button type="submit" class="btn btn-default">確定修改</button>
</form>

<form role="form" action='/member/add_post' method='post'>

    <input type='hidden' name='ol_table' value='members' />

    <div class="form-group">
        <label>建檔店別</label>
        <select class="form-control" name='ol_store_id'>
            <?php foreach($stores as $store): ?>
                <option value='<?php echo $store->id ?>'><?php echo $store->name ?></option>
            <?php endforeach; ?>
        </select>        
    </div>

    <div class="form-group">
        <label>會員姓名</label>
        <input type="text" class="form-control" name='ol_name'>
    </div>

    <div class="form-group">
        <label>性別</label>
        <input type="text" class="form-control" name='ol_gender'>
    </div>

    <div class="form-group">
        <label>生日</label>
        <input type="text" class="form-control" name='ol_birthday' >
    </div>

    <div class="form-group">
        <label>電話</label>
        <input type="text" class="form-control" name='ol_phone' >
    </div>

    <div class="form-group">
        <label>E-mail</label>
        <input type="text" class="form-control" name='ol_email' >
    </div>

    <div class="form-group">
        <label>個人資訊</label>
        <input type="text" class="form-control" name='ol_info' >
    </div>

    <div class="form-group">
        <label>會員備註</label>
        <input type="text" class="form-control" name='ol_remark' >
    </div>

    <div class="form-group">
        <label>會員等級</label>
        <input type="text" class="form-control" name='ol_level' >
    </div>

    <button type="submit" class="btn btn-default">確定新增</button>
</form>

<form role="form" action='/card/add_post' method='post'>

    <input type='hidden' name='ol_table' value='cards' />

    <div class="form-group">
        <label>綁定分店</label>
        <select class="form-control" name='ol_belong_stores'>
            <?php foreach($stores as $store): ?>
                <option value='<?php echo $store->id ?>'><?php echo $store->name ?></option>
            <?php endforeach; ?>
        </select>        
    </div>
    
    <div class="form-group">
        <label>綁定會員</label>
        <select class="form-control" name='ol_belong_members'>
            <?php foreach($members as $member): ?>
                <option value='<?php echo $member->id ?>'><?php echo $member->name ?></option>
            <?php endforeach; ?>
        </select>        
    </div>    

    <div class="form-group">
        <label>卡片號碼</label>
        <input type="text" class="form-control" name='ol_number' >
    </div>

    <div class="form-group">
        <label>產生日期</label>
        <input type="text" class="form-control" name='ol_created_at'>
    </div>

    <div class="form-group">
        <label>變更日期</label>
        <input type="text" class="form-control" name='ol_updated_at'>
    </div>

    <button type="submit" class="btn btn-default">確定新增</button>
</form>

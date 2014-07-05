<form role="form" action='/card/add_post' method='post'>

    <input type='hidden' name='ol_table' value='cards' />

    <div class="form-group">
        <label>綁定分店</label>
        <select class="form-control" name='ol_belong_stores'>
            <?php foreach($stores as $store): ?>                
                <option value='<?php echo $store->id ?>' <?php if ($store->id === $card->stores->id) echo "selected='selected'" ?>><?php echo $store->name ?></option>
            <?php endforeach; ?>
        </select>        
    </div>
    
    <div class="form-group">
        <label>綁定會員</label>
        <select class="form-control" name='ol_belong_members'>
            <?php foreach($members as $member): ?>
                <option value='<?php echo $member->id ?>' <?php if ($member->id === $card->members->id) echo "selected='selected'" ?>><?php echo $member->name ?></option>
            <?php endforeach; ?>
        </select>        
    </div>    

    <div class="form-group">
        <label>卡片號碼</label>
        <input type="text" class="form-control" name='ol_number' value='<?php echo $card->number ?>' >
    </div>

    <div class="form-group">
        <label>產生日期</label>
        <input type="text" class="form-control" name='ol_created_at' value='<?php echo $card->created_at ?>'>
    </div>

    <div class="form-group">
        <label>變更日期</label>
        <input type="text" class="form-control" name='ol_updated_at' value='<?php echo $card->updated_at ?>'>
    </div>

    <button type="submit" class="btn btn-default">確定修改</button>
</form>

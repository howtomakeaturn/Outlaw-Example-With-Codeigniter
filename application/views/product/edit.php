<form role="form" action='/product/edit_post' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label>Year</label>
        <input type="text" class="form-control" name='ol_year' value='<?php echo $product->year ?>' >
    </div>

    <div class="form-group">
        <label>Month</label>
        <input type="text" class="form-control" name='ol_month' value='<?php echo $product->month ?>'>
    </div>

    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name='ol_title' value='<?php echo $product->title ?>'>
    </div>

    <div class="form-group">
        <label>Content</label>
        <input type="text" class="form-control" name='ol_content' value='<?php echo $product->content ?>'>
    </div>

    <div class="form-group">
        <label>Person</label>
        <input type="file" class="form-control" name='ol_person'>
        <img src='/upload/<?php echo $product->person ?>' width='100'/>
    </div>

    <div class="form-group">
        <label>Logo</label>
        <input type="file" class="form-control" name='ol_logo'>
        <img src='/upload/<?php echo $product->logo ?>' width='100'/>
    </div>

    <div class="form-group">
        <label>Photos</label>
        <input type="file" class="form-control" name='ol_photos[]' multiple>
        <?php foreach($product->ownPhotos as $p): ?>
            <img src='/upload/<?php echo $p->name ?>' width='100'/>        
        <?php endforeach; ?>
    </div>


    <button type="submit" class="btn btn-default">確定修改</button>
</form>

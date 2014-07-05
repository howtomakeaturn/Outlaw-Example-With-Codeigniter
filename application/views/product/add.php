<form role="form" action='/product/add_post' method='post' enctype="multipart/form-data">

    <input type='hidden' name='ol_table' value='cards' />

    <div class="form-group">
        <label>Year</label>
        <input type="text" class="form-control" name='ol_year' >
    </div>

    <div class="form-group">
        <label>Month</label>
        <input type="text" class="form-control" name='ol_month'>
    </div>

    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name='ol_title'>
    </div>

    <div class="form-group">
        <label>Content</label>
        <input type="text" class="form-control" name='ol_content'>
    </div>

    <div class="form-group">
        <label>Pic</label>
        <input type="file" class="form-control" name='ol_pic'>
    </div>

    <button type="submit" class="btn btn-default">確定新增</button>
</form>

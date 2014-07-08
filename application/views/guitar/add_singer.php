<form role="form" action='/guitar/add_singer_post' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label>歌手名稱</label>
        <input type="text" class="form-control" name='ol_name' >
    </div>

    <div class="form-group">
        <label>性別</label>
        <select class="form-control" name='ol_gender'>
            <option value='0'>女</option>
            <option value='1'>男</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>照片</label>
        <input type='file' name='ol_image' />
    </div>    

    <button type="submit" class="btn btn-default">確定</button>
</form>

<style>
.form-group p{
    color: white;
}

</style>

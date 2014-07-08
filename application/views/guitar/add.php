<form role="form" action='/guitar/add_post' method='post'>

    <div class="form-group">
        <label>歌名</label>
        <input type="text" class="form-control" name='ol_name' >
    </div>

    <div class="form-group">
        <label>Key</label>
        <input type="text" class="form-control" name='ol_key' >
    </div>

    <div class="form-group">
        <label>Play</label>
        <input type="text" class="form-control" name='ol_play' >
    </div>

    <div class="form-group">
        <label>Capo</label>
        <input type="text" class="form-control" name='ol_capo' >
    </div>

    <div class="form-group">
        <label>歌詞</label>
        <p class="help-block">
            每行歌詞可以放4個和弦。<br/>
            間奏的部份請多空幾行。
        </p>

        <textarea class='form-control' name='lyrics' rows=20></textarea>
    </div>


    <button type="submit" class="btn btn-default">確定</button>
</form>

<style>
.form-group p{
    color: white;
}

</style>

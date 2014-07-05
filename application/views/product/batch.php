<h3>批次產生卡號</h3>
<form role="form" action='/card/batch_post' method='post'>


    <div class="form-group">
        <label>產生數量</label>
        <input type="text" class="form-control" name='amount'>
    </div>

    <div class="form-group">
        <label>前綴字</label>
        <input type="text" class="form-control" name='prefix'>
    </div>


    <button type="submit" class="btn btn-default">確認產生</button>
</form>

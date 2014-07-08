<form role="form" action='/account/add_post' method='post'>
    <label for="ol_name">條目</label>
    <input type="text" name="ol_name" id="fname" placeholder="支出條目...">    

    <label for="ol_amount">金額</label>
    <input type="text" name="ol_amount" id="fname" placeholder="支出金額...">

    <label for="ol_description">說明</label>
    <textarea name="ol_description"></textarea>

    
    <h3>日期</h3>    
    <?php echo date('c') ?>
    
    <input type='submit' value='確定' />
</form>



<form action='/demo/update' method='post'>
    <input type='hidden' name='ol_id' value='<?php echo $article->id ?>' />
    <p>Title: <input type='text' name='ol_title' value='<?php echo $article->title ?>' /></p>
    <p>Content: <textarea name='ol_content'><?php echo $article->content ?></textarea></p>
    <p><input type='submit' value='SEND' /></p>
</form>

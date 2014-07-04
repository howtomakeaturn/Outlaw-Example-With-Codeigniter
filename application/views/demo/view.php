<p>Id: <?php echo $article->id ?></p>
<p>Title: <?php echo $article->title ?></p>
<pre><?php echo $article->content ?></pre>
<a href='/demo/edit?ol_table=articles&ol_id=<?php echo $article->id ?>' class='btn btn-warning'>Edit</a>
<a href='/demo/delete?ol_table=articles&ol_id=<?php echo $article->id ?>' class='btn btn-danger'>Delete</a>

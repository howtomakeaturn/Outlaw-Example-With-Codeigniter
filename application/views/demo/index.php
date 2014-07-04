<a href='/demo/create' class='btn btn-default'>New</a>
<?php foreach($articles as $article): ?>
    <h3><a href='/demo/view?ol_table=articles&ol_id=<?php echo $article->id ?>'><?php echo $article->title ?></a></h3>
    <pre><?php echo $article->content ?></pre>
    <a href='/demo/edit?ol_table=articles&ol_id=<?php echo $article->id ?>'>Edit</a>
    <a href='/demo/delete?ol_table=articles&ol_id=<?php echo $article->id ?>'>Delete</a>
<?php endforeach; ?>


<a href='/guitar/add' class='btn btn-default'>新增歌曲</a>

<?php foreach($songs as $song): ?>
    <h3><?php echo $song->name ?></h3>
    <small><a href='/guitar/edit_song/<?php echo $song->id ?>' class='btn btn-xs btn-warning'>編輯</a></small>
    <hr />
<?php endforeach; ?>

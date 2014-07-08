<div class='col-md-8'>
<a href='/guitar/add' class='btn btn-default'>新增歌曲</a>

<?php foreach($songs as $song): ?>
    <h4><a href='/guitar/view/<?php echo $song->id ?>'><?php echo $song->name ?></a></h4>
    <small><a href='/guitar/edit_song/<?php echo $song->id ?>' class='btn btn-xs btn-warning'>編輯</a></small>
    <hr />
<?php endforeach; ?>
</div>

<div class='col-md-4'>
<a href='/guitar/add_singer' class='btn btn-default'>新增歌手</a>
<?php foreach($singers as $singer): ?>
    <h3><a href='/guitar/singer/<?php echo $singer->id ?>'><?php echo $singer->name ?></a></h3>
    <img src='/upload/<?php echo $singer->image ?>'>
    <hr />
<?php endforeach; ?>
</div>
<style>
    a{
        color: white;
    }
    a:hover{
        color: white;
    }

</style>

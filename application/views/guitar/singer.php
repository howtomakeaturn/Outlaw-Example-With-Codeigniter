<div class='col-md-8'>
<h3><?php echo $singer->name ?>的吉他譜</h3>
<hr />
<?php foreach($singer->ownSongs as $song): ?>
    <p>
        <a href='/guitar/view/<?php echo $song->id ?>'> <?php echo $song->name ?></a>
    </p>
<?php endforeach; ?>

</div>
<div class='col-md-4'>
    <h1><?php echo $singer->name ?></h1>
    <img src='/upload/<?php echo $singer->image ?>'>
</div>




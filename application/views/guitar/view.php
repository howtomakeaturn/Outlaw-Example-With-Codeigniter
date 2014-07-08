<p>
    Key: <?php echo $song->key ?>
    Play: <?php echo $song->play ?>
    Capo: <?php echo $song->capo ?>
</p>
<hr />

<?php foreach($song->ownLyrics as $lyric): ?>
    <p>
        <div class='row chord chord-<?php echo $lyric->order ?>' data-order='<?php echo $lyric->order ?>'>
            
            <div class='col-md-3'><button>C</button></div>
            <div class='col-md-3'><button>G</button></div>
            <div class='col-md-3'><button>Em</button></div>
            <div class='col-md-3'><button>Am</button></div>
            
        </div>
    </p>
    <p><span class='lyric lyric-<?php echo $lyric->order ?>' data-order='<?php echo $lyric->order ?>'><?php echo $lyric->content ?></span></p>
<?php endforeach; ?>


<style>
    p{
        font-size: 20px;
    }
    .top{
          background-color: black;
          color: white;
    }
</style>

<script>
    $(document).ready(function(){
        $('.chord').each(function(index){
            var spanWidth = $('.lyric-' + index).width();
            spanWidth = (spanWidth > 200) ? spanWidth : 200;
            console.log(spanWidth);
            $(this).width(spanWidth);
        })
    });
</script>

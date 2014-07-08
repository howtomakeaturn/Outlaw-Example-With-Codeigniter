<a href='/account/add' class='ui-btn'>我又花一筆了</a>
<ul data-role="listview" data-inset="true">
<?php foreach($expenses as $e): ?>
    <li>
        
        <a href="#anylink" ><?php echo $e->name ?><span class="ui-li-count"><?php echo $e->amount ?></span></a>
    </li>
<?php endforeach; ?>
</ul>
